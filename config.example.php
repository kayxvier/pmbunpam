<?php
// Salin sebagai config.local.php jika ingin mengganti hash kata sandi bawaan.
// Buat hash dengan: php -r 'echo password_hash("kata-sandi-baru", PASSWORD_BCRYPT), PHP_EOL;'
// File config.local.php tidak masuk Git maupun deployment otomatis.
return array(
    'admin_password_hash' => '',
);
