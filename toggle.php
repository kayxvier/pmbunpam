<?php
/* =====================================================================
   PENGATURAN TAMPILAN DATA PESERTA  (edit file ini saja)
   ---------------------------------------------------------------------
   - Untuk MENAMPILKAN data  : 'mode' => 'manual', 'show' => true
   - Untuk MENYEMBUNYIKAN    : 'mode' => 'manual', 'show' => false
   - Untuk OTOMATIS sembunyi setelah waktu ujian berakhir:
         'mode' => 'auto', 'ujian_selesai' => 'YYYY-MM-DD HH:MM'
   ===================================================================== */
return [
    // 'manual' = ikut nilai 'show' | 'auto' = otomatis berdasarkan waktu
    'mode' => 'manual',

    // Dipakai saat mode 'manual'
    'show' => false,

    // Dipakai saat mode 'auto' (zona waktu Asia/Jakarta / WIB)
    'ujian_selesai' => '2026-08-11 23:59',

    // Label gelombang yang sedang aktif (tampil di halaman)
    'gelombang' => 'Gelombang 4',
];
