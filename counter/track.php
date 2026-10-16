<?php
require_once __DIR__ . '/bootstrap.php';
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');
if (pmb_counter_skip($_SERVER)) { http_response_code(204); exit; }
if (($_SERVER['REQUEST_METHOD'] ?? '') !== 'POST') { http_response_code(405); header('Allow: POST, HEAD'); exit; }
try {
    $tracked = pmb_counter_track($_SERVER, pmb_counter_config());
    echo json_encode(array('tracked' => $tracked));
} catch (Throwable $error) {
    // Kegagalan konfigurasi/database tidak boleh mematahkan halaman publik.
    echo json_encode(array('tracked' => false));
}
