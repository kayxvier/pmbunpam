<?php

function pmb_counter_config() {
    $path = __DIR__ . '/config.php';
    if (!is_file($path)) throw new RuntimeException('Counter belum dikonfigurasi.');
    $config = require $path;
    if (!is_array($config) || strlen((string)($config['salt'] ?? '')) < 32) {
        throw new RuntimeException('Salt counter belum valid.');
    }
    $dbPath = (string)($config['db_path'] ?? '');
    if (!preg_match('~^(?:/|[A-Za-z]:[\\\\/])~', $dbPath) || substr($dbPath, -3) !== '.db') {
        throw new RuntimeException('Path database harus absolut dengan ekstensi .db.');
    }
    $config['cache_dir'] = $config['cache_dir'] ?? dirname($dbPath) . '/cache';
    return $config;
}

function pmb_counter_db(array $config) {
    $dir = dirname($config['db_path']);
    if (!is_dir($dir) && !@mkdir($dir, 0700, true) && !is_dir($dir)) {
        throw new RuntimeException('Penyimpanan counter tidak tersedia.');
    }
    $db = new PDO('sqlite:' . $config['db_path'], null, null, array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_TIMEOUT => 5,
    ));
    $db->exec('PRAGMA busy_timeout = 5000');
    $db->exec('CREATE TABLE IF NOT EXISTS visitors (ip_hash TEXT PRIMARY KEY, country TEXT NOT NULL)');
    $db->exec('CREATE TABLE IF NOT EXISTS pageviews (country TEXT PRIMARY KEY, n INTEGER NOT NULL DEFAULT 0)');
    $db->exec('CREATE TABLE IF NOT EXISTS seed (country TEXT PRIMARY KEY, n INTEGER NOT NULL DEFAULT 0, pageviews INTEGER NOT NULL DEFAULT 0)');
    $db->exec('CREATE TABLE IF NOT EXISTS meta (name TEXT PRIMARY KEY, value TEXT NOT NULL)');
    @chmod($config['db_path'], 0600);
    return $db;
}

function pmb_counter_country(array $server, array $config, $ip) {
    $country = strtoupper(trim((string)($server['HTTP_CF_IPCOUNTRY'] ?? '')));
    if (preg_match('/^[A-Z]{2}$/D', $country) && $country !== 'XX') return $country;
    $mmdb = (string)($config['mmdb_path'] ?? '');
    if ($mmdb !== '' && is_file($mmdb)) {
        try {
            $autoload = (string)($config['geoip_autoload'] ?? '');
            if ($autoload !== '' && is_file($autoload)) require_once $autoload;
            if (class_exists('GeoIp2\\Database\\Reader')) {
                $reader = new \GeoIp2\Database\Reader($mmdb);
                try { $country = strtoupper((string)$reader->country($ip)->country->isoCode); }
                finally { $reader->close(); }
                if (preg_match('/^[A-Z]{2}$/D', $country)) return $country;
            }
        } catch (Throwable $error) { /* Negara tidak diketahui jika database opsional gagal. */ }
    }
    return 'XX';
}

function pmb_counter_skip(array $server) {
    return strtoupper($server['REQUEST_METHOD'] ?? 'GET') === 'HEAD'
        || preg_match('/bot|crawl|spider|slurp|curl|wget|headless/i', (string)($server['HTTP_USER_AGENT'] ?? ''));
}

function pmb_counter_track(array $server, array $config) {
    if (pmb_counter_skip($server)) return false;
    $ip = (string)($server['HTTP_CF_CONNECTING_IP'] ?? $server['REMOTE_ADDR'] ?? '');
    if (!filter_var($ip, FILTER_VALIDATE_IP)) return false;
    // Normalisasi representasi IPv6 sebelum hashing; IP mentah tidak pernah ditulis.
    $hash = hash('sha256', $config['salt'] . "\0" . inet_pton($ip));
    $country = pmb_counter_country($server, $config, $ip);
    $db = pmb_counter_db($config);
    $db->exec('BEGIN IMMEDIATE');
    try {
        $q = $db->prepare('INSERT OR IGNORE INTO visitors (ip_hash, country) VALUES (?, ?)');
        $q->execute(array($hash, $country));
        $q = $db->prepare('INSERT INTO pageviews (country, n) VALUES (?, 1) ON CONFLICT(country) DO UPDATE SET n = n + 1');
        $q->execute(array($country));
        $db->exec('COMMIT');
    } catch (Throwable $error) {
        $db->exec('ROLLBACK');
        throw $error;
    }
    return true;
}

function pmb_counter_snapshot(PDO $db) {
    $names = require __DIR__ . '/countries.php';
    $rows = $db->query('SELECT country, SUM(n) AS visitors, SUM(views) AS pageviews FROM (
        SELECT country, COUNT(*) AS n, 0 AS views FROM visitors GROUP BY country
        UNION ALL SELECT country, 0 AS n, n AS views FROM pageviews
        UNION ALL SELECT country, n, pageviews AS views FROM seed
    ) GROUP BY country')->fetchAll();
    $countries = array();
    $other = array('countries' => array(), 'total' => 0, 'pageviews' => 0);
    $total = 0;
    $views = 0;
    foreach ($rows as $row) {
        $code = $row['country'];
        if (!isset($names[$code])) {
            if ($code !== 'XX' && preg_match('/^[A-Z]{2}$/D', $code)) {
                $n = (int)$row['visitors'];
                $other['total'] += $n;
                $other['pageviews'] += (int)$row['pageviews'];
                if ($n > 0 || (int)$row['pageviews'] > 0) {
                    $other['countries'][] = array('code' => $code, 'name' => $code, 'n' => $n);
                }
            }
            continue;
        }
        $n = (int)$row['visitors'];
        $total += $n;
        $views += (int)$row['pageviews'];
        if ($n > 0) $countries[] = array('code' => $code, 'name' => $names[$code], 'n' => $n);
    }
    $sort = function ($a, $b) {
        return ($b['n'] <=> $a['n']) ?: strcmp($a['code'], $b['code']);
    };
    usort($countries, $sort);
    usort($other['countries'], $sort);
    return array('available' => $total > 0 || count($other['countries']) > 0, 'scope' => 'Asia',
        'countries' => array_slice($countries, 0, 10), 'total' => $total, 'pageviews' => $views, 'other' => $other);
}

function pmb_counter_data(array $config) {
    $dir = $config['cache_dir'];
    if (!is_dir($dir) && !@mkdir($dir, 0700, true) && !is_dir($dir)) {
        throw new RuntimeException('Cache counter tidak tersedia.');
    }
    $file = $dir . '/asia.json';
    // Satu lock juga mencegah banyak request membangun ulang cache bersamaan.
    $lock = @fopen($dir . '/cache.lock', 'c');
    if (!$lock || !flock($lock, LOCK_EX)) throw new RuntimeException('Cache terkunci.');
    try {
        $cached = is_file($file) ? json_decode((string)@file_get_contents($file), true) : null;
        if (is_array($cached) && isset($cached['expires'], $cached['data']['other']) && $cached['expires'] > time()) {
            return $cached['data'];
        }
        $data = pmb_counter_snapshot(pmb_counter_db($config));
        $temp = tempnam($dir, 'counter-');
        if ($temp === false) throw new RuntimeException('Cache tidak dapat ditulis.');
        try {
            if (file_put_contents($temp, json_encode(array('expires' => time() + 300, 'data' => $data))) === false
                || !@rename($temp, $file)) throw new RuntimeException('Cache tidak dapat disimpan.');
        } finally { if (is_file($temp)) @unlink($temp); }
        return $data;
    } finally { flock($lock, LOCK_UN); fclose($lock); }
}

function pmb_counter_seed(PDO $db, array $visitors, array $views) {
    foreach (array($visitors, $views) as $items) {
        foreach ($items as $country => $n) {
            if (!preg_match('/^[A-Z]{2}$/D', $country) || !is_int($n) || $n < 0) {
                throw new InvalidArgumentException('Data AWStats harus berupa kode negara dan integer nonnegatif.');
            }
        }
    }
    if (array_sum($visitors) === 0 && array_sum($views) === 0) {
        throw new RuntimeException('ISI DARI AWSTATS: placeholder nol belum boleh dijalankan.');
    }
    $db->exec('BEGIN IMMEDIATE');
    try {
        if ($db->query("SELECT value FROM meta WHERE name = 'seed_applied'")->fetchColumn() !== false) {
            throw new RuntimeException('Seed sudah pernah dijalankan.');
        }
        $q = $db->prepare('INSERT INTO seed (country, n, pageviews) VALUES (?, ?, ?)');
        foreach (array_unique(array_merge(array_keys($visitors), array_keys($views))) as $code) {
            $q->execute(array($code, $visitors[$code] ?? 0, $views[$code] ?? 0));
        }
        $db->exec("INSERT INTO meta (name, value) VALUES ('seed_applied', '1')");
        $db->exec('COMMIT');
    } catch (Throwable $error) { $db->exec('ROLLBACK'); throw $error; }
}
