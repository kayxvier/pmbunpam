<?php
require_once __DIR__ . '/bootstrap.php';
header('Cache-Control: no-store');
header('Referrer-Policy: no-referrer');
header('Content-Type: text/html; charset=utf-8');

// ISI DARI AWSTATS. Semua angka nol berikut adalah placeholder, BUKAN data asli.
// Gunakan periode historis sebelum counter live mulai agar periode tidak tumpang tindih.
$seedVisitors = array('ID' => 0, 'MY' => 0, 'SG' => 0, 'TH' => 0, 'PH' => 0,
    'VN' => 0, 'JP' => 0, 'KR' => 0, 'IN' => 0, 'CN' => 0, 'BN' => 0, 'TL' => 0);
// ISI DARI AWSTATS: Pages per negara, bukan Hits. Biarkan 0 jika tidak ada data asli.
$seedPageviews = array('ID' => 0, 'MY' => 0, 'SG' => 0, 'TH' => 0, 'PH' => 0,
    'VN' => 0, 'JP' => 0, 'KR' => 0, 'IN' => 0, 'CN' => 0, 'BN' => 0, 'TL' => 0);

try {
    $config = pmb_counter_config();
    $token = (string)($config['seed_token'] ?? '');
    if (strlen($token) < 32) { http_response_code(403); exit('Seed dinonaktifkan.'); }
    if (($_SERVER['REQUEST_METHOD'] ?? '') === 'POST') {
        if (!hash_equals($token, (string)($_POST['token'] ?? ''))) {
            http_response_code(403); exit('Token tidak valid.');
        }
        pmb_counter_seed(pmb_counter_db($config), $seedVisitors, $seedPageviews);
        @unlink($config['cache_dir'] . '/asia.json');
        exit('Seed tersimpan. Hapus counter/seed.php sekarang dan kosongkan seed_token di config.php.');
    }
    if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'GET') { http_response_code(405); exit; }
} catch (Throwable $error) {
    http_response_code(400);
    exit('Seed tidak dijalankan. Pastikan konfigurasi valid, angka AWStats sudah diisi, dan seed belum pernah dijalankan.');
}
?>
<!doctype html><html lang="id"><meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Seed counter dari AWStats</title>
<h1>Seed counter dari AWStats</h1>
<p>Isi angka asli di file ini sebelum melanjutkan. Proses hanya dapat dijalankan satu kali.</p>
<form method="post"><label>Token seed <input name="token" type="password" required autocomplete="off"></label>
<button type="submit">Impor data AWStats</button></form>
<p>Hapus file ini setelah berhasil. Token dikirim melalui POST agar tidak masuk URL/log akses.</p></html>
