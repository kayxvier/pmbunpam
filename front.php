<?php
/* =====================================================================
   PMB UNPAM - halaman publik (embed via iframe di CMS UNPAM)
   URL contoh deploy: https://simaba.my.id/front.php
   ===================================================================== */
require __DIR__ . '/config.php';

$PMB_SITE = pmb_settings();

$PMB = array(
    'highlights'   => pmb_load('highlights'),
    'instagram'    => pmb_load('instagram'),
    'testimonials' => pmb_load('testimonials'),
    'tiktok'       => pmb_load('tiktok'),
    'schedule'     => pmb_content('schedule'),
    'costs'        => pmb_content('biaya'),
    'locations'    => pmb_content('lokasi'),
);

$body = @file_get_contents(__DIR__ . '/assets/body.html');
if ($body === false) { $body = '<p style="padding:40px;text-align:center">assets/body.html tidak ditemukan.</p>'; }
?><!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="data:,">
<title><?php echo pmb_esc($PMB_SITE['site']['name'] . ' - ' . $PMB_SITE['site']['organization']); ?></title>
<meta name="description" content="<?php echo pmb_esc($PMB_SITE['site']['meta_description']); ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/style.css?v=<?php echo PMB_VER; ?>">
</head>
<body>
<?php echo $body; ?>
<script>window.PMB_SITE = <?php echo json_encode(pmb_public_settings(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>; window.PMB_DATA = <?php echo json_encode($PMB, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;</script>
<script src="assets/site.js?v=<?php echo PMB_VER; ?>"></script>
<script src="assets/app.js?v=<?php echo PMB_VER; ?>"></script>
</body>
</html>
