<?php
require_once __DIR__ . '/bootstrap.php';
header('Cache-Control: no-store');
header('Referrer-Policy: no-referrer');
header('Content-Type: text/html; charset=utf-8');

// Data visitor dan Pages sesuai angka yang diberikan pengguna.
// Gunakan periode historis sebelum counter live mulai agar periode tidak tumpang tindih.
$seedVisitors = array(
    'ID' => 3259, 'MY' => 1124, 'SG' => 364, 'PH' => 250, 'US' => 81,
    'IN' => 16, 'CA' => 1, 'PL' => 1, 'RO' => 1, 'AU' => 3,
);
// Pages per negara, bukan Hits. Nilai nol AU dipertahankan sesuai data pengguna.
$seedPageviews = array(
    'ID' => 3259, 'MY' => 1095, 'SG' => 355, 'PH' => 250, 'US' => 72,
    'IN' => 4, 'CA' => 1, 'PL' => 1, 'RO' => 1, 'AU' => 0,
);

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
