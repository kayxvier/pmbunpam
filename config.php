<?php
/* =====================================================================
   Konfigurasi PMB UNPAM front.php + admin.php
   ===================================================================== */

define('PMB_VER', '3.6');
define('PMB_DATA_DIR',   __DIR__ . '/data');
define('PMB_UPLOAD_DIR', __DIR__ . '/uploads');
define('PMB_UPLOAD_URL', 'uploads');
define('PMB_SETTINGS_FILE', PMB_DATA_DIR . '/site.json');

// Kredensial hanya berasal dari environment atau file lokal yang di-ignore.
$pmb_local_config_file = __DIR__ . '/config.local.php';
$pmb_local_config = is_file($pmb_local_config_file) ? require $pmb_local_config_file : array();
$pmb_admin_password = getenv('PMB_ADMIN_PASS');
if ($pmb_admin_password === false) {
    $pmb_admin_password = is_array($pmb_local_config) ? ($pmb_local_config['admin_password'] ?? '') : '';
}
define('PMB_ADMIN_PASS', (string)$pmb_admin_password);
unset($pmb_admin_password, $pmb_local_config, $pmb_local_config_file);

require_once __DIR__ . '/content_defaults.php';

function pmb_id() {
    return substr(md5(uniqid('', true)), 0, 10);
}

function pmb_load($name) {
    $f = PMB_DATA_DIR . '/' . $name . '.json';
    if (!file_exists($f)) return array();
    $j = json_decode(file_get_contents($f), true);
    return is_array($j) ? $j : array();
}

function pmb_save($name, $data) {
    if (!is_dir(PMB_DATA_DIR)) @mkdir(PMB_DATA_DIR, 0775, true);
    $data = array_values($data);
    file_put_contents(
        PMB_DATA_DIR . '/' . $name . '.json',
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    );
}

/* Pembaca/penyimpan JSON untuk konten terstruktur. Berbeda dengan pmb_save(),
   fungsi ini mempertahankan associative key seperti key kampus dan dokumen. */
function pmb_load_data($name, $fallback = array()) {
    $f = PMB_DATA_DIR . '/' . $name . '.json';
    if (!is_file($f)) return $fallback;
    $j = json_decode(@file_get_contents($f), true);
    return is_array($j) ? $j : $fallback;
}

function pmb_save_data($name, $data) {
    if (!is_dir(PMB_DATA_DIR)) @mkdir(PMB_DATA_DIR, 0775, true);
    return file_put_contents(
        PMB_DATA_DIR . '/' . $name . '.json',
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        LOCK_EX
    ) !== false;
}

function pmb_load_json_file($path, $fallback = array()) {
    if (!is_file($path)) return $fallback;
    $j = json_decode(@file_get_contents($path), true);
    return is_array($j) ? $j : $fallback;
}

function pmb_save_json_file($path, $data) {
    $dir = dirname($path);
    if (!is_dir($dir)) @mkdir($dir, 0775, true);
    return file_put_contents(
        $path,
        json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        LOCK_EX
    ) !== false;
}

function pmb_content($name, $fallback = null) {
    if ($fallback === null) {
        $fn = 'pmb_default_' . preg_replace('/[^a-z0-9_]/i', '', (string)$name);
        $fallback = function_exists($fn) ? call_user_func($fn) : array();
    }
    return pmb_load_data($name, $fallback);
}

/* ---------------------------------------------------------------------
   Pengaturan situs yang dipakai bersama oleh seluruh halaman.
   Disimpan sebagai JSON supaya deploy tetap sederhana tanpa database.
   --------------------------------------------------------------------- */
function pmb_settings_defaults() {
    return array(
        'site' => array(
            'name' => 'Penerimaan Mahasiswa Baru',
            'organization' => 'Universitas Pamulang',
            'tagline' => 'Informasi resmi Penerimaan Mahasiswa Baru Universitas Pamulang.',
            'meta_description' => 'Penerimaan Mahasiswa Baru Universitas Pamulang. Daftar online, cek jadwal, biaya, dan informasi PMB.',
            'logo' => '',
            'logo_alt' => 'Logo Universitas Pamulang',
        ),
        'theme' => array(
            'primary' => '#0a1f4d',
            'secondary' => '#13387a',
            'accent' => '#f6b40a',
            'soft' => '#f4f7fd',
        ),
        'home' => array(
            'sections' => array(
                'services' => true,
                'stats' => true,
                'welcome' => true,
                'vision' => true,
                'spmb' => true,
                'quiz' => true,
                'schedule' => true,
                'cost' => true,
                'roadmap' => true,
                'testimonials' => true,
                'campus' => true,
                'map' => true,
                'highlights' => true,
                'social' => true,
                'tiktok' => true,
                'cta' => true,
            ),
            'buttons' => array(
                'hero_register' => array('enabled' => true, 'label' => '🚀 Daftar Sekarang', 'url' => '#pmb-portal'),
                'hero_programs' => array('enabled' => true, 'label' => 'Lihat Program Studi →', 'url' => 'https://unpam.web.id/'),
                'portal_online' => array('enabled' => true, 'label' => 'Daftar Online', 'url' => 'https://rl-pmb.unpam.ac.id/'),
                'portal_gform' => array('enabled' => true, 'label' => 'Daftar G-Form', 'url' => ''),
                'portal_disability' => array('enabled' => true, 'label' => 'Daftar Disabilitas', 'url' => 'https://lld.unpam.ac.id/'),
                'portal_verify' => array('enabled' => true, 'label' => 'Cek Verifikasi', 'url' => 'https://pmbunpam.my.id/'),
                'portal_graduation' => array('enabled' => true, 'label' => 'Cek Kelulusan', 'url' => 'https://rl-pmb.unpam.ac.id/c_front/info_pmb'),
                'portal_exam_participants' => array('enabled' => true, 'label' => 'Peserta Ujian SPMB', 'url' => 'https://pmb.unpam.ac.id/daftar-peserta-ujian'),
                'portal_documents' => array('enabled' => true, 'label' => 'Unduh Dokumen', 'url' => 'https://pmb.unpam.ac.id/unduh-dokumen'),
                'portal_exam_login' => array('enabled' => true, 'label' => 'Login Ujian', 'url' => 'https://spmb.unpam.ac.id'),
                'spmb_exam_participants' => array('enabled' => true, 'label' => '🧾 Cek Peserta Ujian SPMB', 'url' => 'https://pmb.unpam.ac.id/daftar-peserta-ujian'),
                'quiz_register' => array('enabled' => true, 'label' => 'Daftar Online Sekarang', 'url' => 'https://rl-pmb.unpam.ac.id/'),
                'cta_register' => array('enabled' => true, 'label' => 'Daftar Sekarang →', 'url' => 'https://spmb.unpam.ac.id'),
            ),
            'text' => array(
                'hero_badge' => '🎓 Penerimaan Mahasiswa Baru 2026',
                'hero_title_main' => 'Penerimaan',
                'hero_title_highlight' => 'Mahasiswa Baru',
                'hero_title_org' => 'Universitas Pamulang',
                'hero_description' => 'Bergabung bersama ribuan mahasiswa dari Sabang sampai Merauke dan berbagai negara. Kuliah berkualitas, biaya terjangkau, dan jaringan alumni yang luas.',
                'portal_title' => 'Semua Kebutuhan PMB dalam Satu Tempat',
                'portal_subtitle' => 'Akses cepat ke layanan pendaftaran, verifikasi, dan informasi resmi PMB Universitas Pamulang.',
                'spmb_title' => 'Seleksi Penerimaan Mahasiswa Baru',
                'quiz_title' => 'Kamu Cocok di Prodi Apa?',
                'schedule_title' => 'Tanggal Penting SPMB 2026',
                'cost_title' => 'Rincian Biaya Pendidikan',
                'campus_title' => 'Empat Kampus Universitas Pamulang',
                'map_title' => 'Peta Kampus UNPAM',
                'highlights_title' => 'Highlights UNPAM',
                'testimonials_title' => 'Cerita Mahasiswa & Alumni',
                'social_title' => 'Ikuti Media Sosial Kami',
                'tiktok_title' => 'TikTok PMB UNPAM',
                'cta_title' => 'Pendaftaran UNPAM Telah Dibuka',
                'cta_subtitle' => 'Amankan kursi Anda sekarang juga.',
            ),
        ),
        'images' => array(
            'hero_1' => '',
            'hero_2' => '',
            'hero_3' => '',
            'hero_4' => '',
            'hero_person' => '',
            'spmb' => '',
            'sambutan' => '',
        ),
        'pages' => array(
            'index' => true,
            'front' => true,
            'almet' => true,
            'biaya' => true,
            'download' => true,
            'info' => true,
            'jadwal' => true,
            'lokasi' => true,
            'peserta' => true,
            'pkkmb' => true,
            'profil' => true,
            'sambutan' => true,
            'simaba' => true,
            'syarat' => true,
        ),
        'participants' => array(
            'mode' => 'manual',
            'show' => false,
            'ujian_selesai' => '2026-08-11 23:59',
            'gelombang' => 'Gelombang 4',
        ),
        /* Override selector untuk semua halaman. Nilai string mengganti text,
           sedangkan object dapat memakai html/attr bila diperlukan. */
        'page_content' => array(),
    );
}

function pmb_array_merge_recursive($base, $extra) {
    foreach ($extra as $key => $value) {
        if (isset($base[$key]) && is_array($base[$key]) && is_array($value)) {
            $base[$key] = pmb_array_merge_recursive($base[$key], $value);
        } else {
            $base[$key] = $value;
        }
    }
    return $base;
}

function pmb_settings() {
    $settings = pmb_settings_defaults();
    if (is_file(PMB_SETTINGS_FILE)) {
        $raw = json_decode(@file_get_contents(PMB_SETTINGS_FILE), true);
        if (is_array($raw)) $settings = pmb_array_merge_recursive($settings, $raw);
    }
    return $settings;
}

function pmb_save_settings($settings) {
    if (!is_dir(PMB_DATA_DIR)) @mkdir(PMB_DATA_DIR, 0775, true);
    return file_put_contents(
        PMB_SETTINGS_FILE,
        json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
        LOCK_EX
    ) !== false;
}

function pmb_public_settings() {
    $settings = pmb_settings();
    unset($settings['admin']);
    return $settings;
}

function pmb_upload($field) {
    if (empty($_FILES[$field]) || $_FILES[$field]['error'] !== UPLOAD_ERR_OK) return '';
    if (!is_dir(PMB_UPLOAD_DIR)) @mkdir(PMB_UPLOAD_DIR, 0775, true);
    $ext = strtolower(pathinfo($_FILES[$field]['name'], PATHINFO_EXTENSION));
    $allow = array('jpg', 'jpeg', 'png', 'webp', 'gif');
    if (!in_array($ext, $allow)) return '';
    if ($_FILES[$field]['size'] > 5 * 1024 * 1024) return '';
    $name = 'img_' . date('YmdHis') . '_' . substr(md5(uniqid('', true)), 0, 6) . '.' . $ext;
    $dest = PMB_UPLOAD_DIR . '/' . $name;
    if (move_uploaded_file($_FILES[$field]['tmp_name'], $dest)) {
        return PMB_UPLOAD_URL . '/' . $name;
    }
    return '';
}

/* Simpan gambar: utamakan hasil crop (base64 dari admin), fallback ke upload file biasa. */
function pmb_save_image($field) {
    $crop = isset($_POST[$field . '_crop']) ? $_POST[$field . '_crop'] : '';
    if ($crop && strpos($crop, 'data:image/') === 0 && preg_match('#^data:image/(png|jpeg|jpg|webp)#', $crop, $m)) {
        $ext = ($m[1] === 'jpeg') ? 'jpg' : $m[1];
        $comma = strpos($crop, ',');
        $bin = ($comma !== false) ? base64_decode(substr($crop, $comma + 1)) : false;
        if ($bin !== false && strlen($bin) > 0) {
            if (!is_dir(PMB_UPLOAD_DIR)) @mkdir(PMB_UPLOAD_DIR, 0775, true);
            $name = 'img_' . date('YmdHis') . '_' . substr(md5(uniqid('', true)), 0, 6) . '.' . $ext;
            if (file_put_contents(PMB_UPLOAD_DIR . '/' . $name, $bin) !== false) {
                return PMB_UPLOAD_URL . '/' . $name;
            }
        }
    }
    return pmb_upload($field);
}

function pmb_esc($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}
