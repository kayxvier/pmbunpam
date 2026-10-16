<?php
require_once dirname(__DIR__) . '/counter/bootstrap.php';

if (($argv[1] ?? '') === '--worker') {
    $config = json_decode(file_get_contents($argv[2]), true);
    for ($i = 0; $i < 3; $i++) pmb_counter_track(array('REQUEST_METHOD' => 'POST',
        'HTTP_USER_AGENT' => 'Mozilla/5.0', 'REMOTE_ADDR' => '203.0.113.200', 'HTTP_CF_IPCOUNTRY' => 'SG'), $config);
    exit;
}

$dir = dirname(__DIR__) . '/.verification/pmb-counter-test-' . bin2hex(random_bytes(8));
mkdir($dir, 0700, true);
$config = array('salt' => str_repeat('test-only-salt-', 4), 'db_path' => $dir . '/counter.db', 'cache_dir' => $dir . '/cache');
$checks = 0;
function check_counter($condition, $label) {
    global $checks;
    if (!$condition) throw new RuntimeException('FAIL: ' . $label);
    $checks++;
    echo 'PASS: ' . $label . PHP_EOL;
}
function counter_request($ip, $country = 'ID') {
    return array('REQUEST_METHOD' => 'POST', 'REMOTE_ADDR' => $ip,
        'HTTP_USER_AGENT' => 'Mozilla/5.0', 'HTTP_CF_IPCOUNTRY' => $country);
}

try {
    $server = counter_request('192.0.2.1');
    check_counter(pmb_counter_track($server, $config), 'first visitor tracked');
    pmb_counter_track($server, $config);
    $db = pmb_counter_db($config);
    $data = pmb_counter_snapshot($db);
    check_counter($data['total'] === 1 && $data['pageviews'] === 2, 'same IP: one unique visitor, two pageviews');
    pmb_counter_track(counter_request('192.0.2.2'), $config);
    check_counter(pmb_counter_snapshot($db)['total'] === 2, 'new IP adds one visitor');
    foreach (array('Googlebot', 'crawler', 'Spider', 'slurp', 'curl/8', 'Wget', 'HeadlessChrome') as $ua) {
        $bot = $server; $bot['HTTP_USER_AGENT'] = $ua;
        check_counter(!pmb_counter_track($bot, $config), 'ignored user agent: ' . $ua);
    }
    $head = $server; $head['REQUEST_METHOD'] = 'HEAD';
    check_counter(!pmb_counter_track($head, $config), 'HEAD ignored');
    check_counter(pmb_counter_snapshot($db)['pageviews'] === 3, 'ignored requests add no pageviews');
    $cf = counter_request('192.0.2.99', 'MY'); $cf['HTTP_CF_CONNECTING_IP'] = '198.51.100.1';
    pmb_counter_track($cf, $config);
    $cf['REMOTE_ADDR'] = '192.0.2.100'; pmb_counter_track($cf, $config);
    check_counter((int)$db->query("SELECT COUNT(*) FROM visitors WHERE country = 'MY'")->fetchColumn() === 1, 'Cloudflare IP takes precedence');
    pmb_counter_track(counter_request('2001:db8::1'), $config);
    pmb_counter_track(counter_request('2001:0db8:0:0:0:0:0:1'), $config);
    check_counter((int)$db->query("SELECT COUNT(*) FROM visitors WHERE country = 'ID'")->fetchColumn() === 3, 'IPv6 representation normalized');
    $bad = counter_request('invalid');
    check_counter(!pmb_counter_track($bad, $config), 'invalid IP ignored');
    check_counter(pmb_counter_country(array(), $config, '192.0.2.1') === 'XX', 'no header/database falls back to XX');
    check_counter(pmb_counter_country(array('HTTP_CF_IPCOUNTRY' => '<script>'), $config, '192.0.2.1') === 'XX', 'invalid country rejected');
    pmb_counter_track(counter_request('192.0.2.55', 'US'), $config);
    pmb_counter_track(counter_request('192.0.2.56', 'XX'), $config);
    check_counter(!in_array('US', array_column(pmb_counter_snapshot($db)['countries'], 'code'), true), 'non-Asia and XX excluded from display');
    $columns = array_column($db->query('PRAGMA table_info(visitors)')->fetchAll(), 'name');
    $hashes = $db->query('SELECT ip_hash FROM visitors')->fetchAll(PDO::FETCH_COLUMN);
    check_counter($columns === array('ip_hash', 'country') && count(array_filter($hashes, function ($h) {
        return preg_match('/^[a-f0-9]{64}$/D', $h);
    })) === count($hashes), 'visitors table contains only SHA-256 hash and country');
    check_counter(strpos(file_get_contents($config['db_path']), '192.0.2.1') === false, 'raw test IP absent from database bytes');

    $cached = pmb_counter_data($config);
    pmb_counter_track(counter_request('192.0.2.3'), $config);
    check_counter(pmb_counter_data($config) === $cached, 'cache reused after live update');
    $cacheFile = $config['cache_dir'] . '/asia.json';
    $cache = json_decode(file_get_contents($cacheFile), true);
    check_counter($cache['expires'] - time() >= 298 && $cache['expires'] - time() <= 300, 'cache expires after five minutes');
    $cache['expires'] = time() - 1; file_put_contents($cacheFile, json_encode($cache));
    check_counter(pmb_counter_data($config)['total'] === $cached['total'] + 1, 'expired cache rebuilt');
    $rejected = false;
    try { pmb_counter_seed($db, array('ID' => 0), array('ID' => 0)); }
    catch (RuntimeException $e) { $rejected = true; }
    check_counter($rejected, 'all-zero AWStats placeholder cannot be imported');
    $before = pmb_counter_snapshot($db);
    pmb_counter_seed($db, array('ID' => 7, 'MY' => 3, 'US' => 500), array('ID' => 11, 'MY' => 5, 'US' => 800));
    $after = pmb_counter_snapshot($db);
    check_counter($after['total'] === $before['total'] + 10 && $after['pageviews'] === $before['pageviews'] + 16,
        'test seed plus live totals limited to Asia');
    $rejected = false;
    try { pmb_counter_seed($db, array('ID' => 7), array()); } catch (RuntimeException $e) { $rejected = true; }
    check_counter($rejected && pmb_counter_snapshot($db) === $after, 'repeat seed rejected without modifying totals');
    $rankConfig = $config; $rankConfig['db_path'] = $dir . '/rank.db';
    $rankDb = pmb_counter_db($rankConfig);
    $fixture = array(); $i = 1;
    foreach (array_keys(require dirname(__DIR__) . '/counter/countries.php') as $code) $fixture[$code] = $i++;
    pmb_counter_seed($rankDb, $fixture, array());
    $rank = pmb_counter_snapshot($rankDb);
    $counts = array_column($rank['countries'], 'n'); $sorted = $counts; rsort($sorted);
    check_counter(count($counts) === 10 && $counts === $sorted && $rank['total'] === array_sum($fixture), 'top ten sorted by data, totals include all Asia');

    if (function_exists('proc_open')) {
        $parallel = $config; $parallel['db_path'] = $dir . '/parallel.db';
        pmb_counter_db($parallel);
        $workerFile = $dir . '/worker.json'; file_put_contents($workerFile, json_encode($parallel));
        $workers = array();
        for ($i = 0; $i < 8; $i++) {
            $pipes = array();
            $process = proc_open(array(PHP_BINARY, __FILE__, '--worker', $workerFile),
                array(0 => array('pipe', 'r'), 1 => array('pipe', 'w'), 2 => array('pipe', 'w')), $pipes);
            $workers[] = array($process, $pipes);
        }
        foreach ($workers as $worker) {
            fclose($worker[1][0]);
            $output = stream_get_contents($worker[1][1]) . stream_get_contents($worker[1][2]);
            fclose($worker[1][1]); fclose($worker[1][2]);
            if (proc_close($worker[0]) !== 0) throw new RuntimeException('Concurrent worker failed: ' . $output);
        }
        $result = pmb_counter_snapshot(pmb_counter_db($parallel));
        check_counter($result['total'] === 1 && $result['pageviews'] === 24, 'eight concurrent requests: no lost updates or duplicate visitors');
    }
    echo 'Counter checks passed: ' . $checks . PHP_EOL;
} finally {
    unset($e);
    $db = null; $rankDb = null;
    gc_collect_cycles();
    $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS), RecursiveIteratorIterator::CHILD_FIRST);
    foreach ($files as $file) { if ($file->isDir()) rmdir($file->getPathname()); else unlink($file->getPathname()); }
    rmdir($dir);
}
