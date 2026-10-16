<?php
require_once __DIR__ . '/bootstrap.php';
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
header('X-Content-Type-Options: nosniff');
try { $data = pmb_counter_data(pmb_counter_config()); }
catch (Throwable $error) {
    $data = array('available' => false, 'scope' => 'Asia', 'countries' => array(), 'total' => 0, 'pageviews' => 0);
}
echo json_encode($data, JSON_UNESCAPED_UNICODE);
