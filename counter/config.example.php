<?php
// Salin manual menjadi counter/config.php di server. Jangan commit file asli.
return array(
    'salt' => '', // Isi acak minimal 32 karakter. Jangan diganti setelah mulai mencatat.
    // Pada struktur cPanel saat ini, dirname(__DIR__, 3) adalah /home/pmbs2545.
    'db_path' => dirname(__DIR__, 3) . '/pmb-counter/counter.db',
    'cache_dir' => dirname(__DIR__, 3) . '/pmb-counter/cache',
    'seed_token' => '', // Token acak terpisah, minimal 32 karakter; kosong = seed nonaktif.
    // Opsional: library dan database lokal, bukan layanan web GeoIP.
    'geoip_autoload' => '', // Contoh /home/pmbs2545/pmb-counter/vendor/autoload.php
    'mmdb_path' => '', // Contoh /home/pmbs2545/pmb-counter/GeoLite2-Country.mmdb
);
