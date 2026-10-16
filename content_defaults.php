<?php
/*
 * Konten terstruktur bawaan. Begitu administrator menyimpan dari admin.php,
 * data ini akan tersalin ke data/*.json dan menjadi sumber utama halaman.
 */

function pmb_default_schedule() {
    return array(
        array('no'=>1,'gel'=>'I','gel_label'=>'Gelombang Pertama','pendaftaran'=>'6 Maret – 5 Mei 2026','spmb_online'=>'8 Mei – 11 Mei 2026','pengumuman'=>'16 Mei 2026','registrasi'=>'16 Mei – 30 Mei 2026','pkkmb'=>'22 – 27 Agustus 2026','cetak_krs'=>'18 Agustus 2026','color'=>'blue'),
        array('no'=>2,'gel'=>'II','gel_label'=>'Gelombang Kedua','pendaftaran'=>'6 Mei – 22 Juni 2026','spmb_online'=>'26 Juni – 29 Juni 2026','pengumuman'=>'3 Juli 2026','registrasi'=>'3 Juli – 18 Juli 2026','pkkmb'=>'22 – 27 Agustus 2026','cetak_krs'=>'18 Agustus 2026','color'=>'indigo'),
        array('no'=>3,'gel'=>'III','gel_label'=>'Gelombang Ketiga','pendaftaran'=>'23 Juni – 3 Agustus 2026','spmb_online'=>'7 – 10 Agustus 2026','pengumuman'=>'13 Agustus 2026','registrasi'=>'13 Agustus – 24 Agustus 2026','pkkmb'=>'22 – 27 Agustus 2026','cetak_krs'=>'18 Agustus 2026','color'=>'sky'),
    );
}

function pmb_default_biaya() {
    return array(
        'tangsel-s1' => array(
            'name'=>'Sarjana (S-1) Tangsel','short'=>'S-1 Tangsel','icon'=>'lucide:building-2','color'=>'blue',
            'registrasi_awal'=>array('ab'=>'Rp 750.000','csck'=>'Rp 900.000'),
            'items'=>array(
                array('no'=>1,'uraian'=>'Formulir Pendaftaran','ab'=>'Rp 100.000','csck'=>'Rp 100.000','keterangan'=>'Gel. 1: Diskon 50%','discount'=>false,'gel1_price'=>'Rp 150.000'),
                array('no'=>2,'uraian'=>'Jaket Almamater + KTM','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setelah lulus SPMB'),
                array('no'=>3,'uraian'=>'Registrasi Awal Semester','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setiap awal semester'),
                array('no'=>4,'uraian'=>'Biaya Kuliah (per semester)','ab'=>'Rp 1.500.000','csck'=>'Rp 2.400.000','keterangan'=>'A&B: Rp 250rb/angsur<br>CS&CK: Rp 400rb/angsur','highlight'=>true),
                array('no'=>5,'uraian'=>'Angsuran Praktikum','ab'=>'Rp 200.000','csck'=>'Rp 300.000','keterangan'=>'Dilunasi Sebelum UAS','sub_note'=>'Angsuran Praktikum dikhusus-kan untuk Fakultas Teknik, MIPA, Ilmu Komputer, Ilmu Komunikasi & Desain, Serta Program Studi Pendidikan Jasmani'),
                array('no'=>6,'uraian'=>'Biaya UTS','ab'=>'Rp 300.000','csck'=>'Rp 400.000','keterangan'=>'Dilunasi Sebelum UTS'),
                array('no'=>7,'uraian'=>'Biaya UAS','ab'=>'Rp 300.000','csck'=>'Rp 400.000','keterangan'=>'Dilunasi Sebelum UAS'),
            ),
            'total_registrasi'=>'Termasuk KTM, Jaket, Registrasi Awal, dan Angsuran Kuliah Pertama'
        ),
        'serang-s1' => array(
            'name'=>'Sarjana (S-1) Serang','short'=>'S-1 Serang','icon'=>'lucide:landmark','color'=>'indigo',
            'registrasi_awal'=>array('ab'=>'Rp 700.000','cs'=>'Rp 800.000'),
            'items'=>array(
                array('no'=>1,'uraian'=>'Formulir Pendaftaran','ab'=>'Rp 100.000','csck'=>'Rp 100.000','keterangan'=>'Digratiskan','discount'=>true,'gel1_price'=>'GRATIS','is_free'=>true),
                array('no'=>2,'uraian'=>'Jaket Almamater + KTM','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setelah lulus SPMB'),
                array('no'=>3,'uraian'=>'Registrasi Awal Semester','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setiap awal semester'),
                array('no'=>4,'uraian'=>'Biaya Kuliah (per semester)','ab'=>'Rp 1.200.000','csck'=>'Rp 1.800.000','keterangan'=>'A&B: Rp 200rb/angsur<br>CS: Rp 300rb/angsur','highlight'=>true),
                array('no'=>5,'uraian'=>'Angsuran Praktikum','ab'=>'Rp 100.000','csck'=>'Rp 150.000','keterangan'=>'Dilunasi Sebelum UAS','sub_note'=>'Angsuran Praktikum dikhusus-kan untuk Fakultas Teknik, MIPA, & Ilmu Komputer'),
                array('no'=>6,'uraian'=>'Biaya UTS','ab'=>'Rp 200.000','csck'=>'Rp 300.000','keterangan'=>'Dilunasi Sebelum UTS'),
                array('no'=>7,'uraian'=>'Biaya UAS','ab'=>'Rp 200.000','csck'=>'Rp 300.000','keterangan'=>'Dilunasi Sebelum UAS'),
            ),
            'total_registrasi'=>'Termasuk KTM, Jaket, Registrasi Awal, dan Angsuran Kuliah Pertama'
        ),
        'tangsel-s2' => array(
            'name'=>'Pascasarjana (S-2) Tangsel','short'=>'S-2 Tangsel','icon'=>'lucide:award','color'=>'violet',
            'registrasi_awal'=>array('ab'=>'Rp 1.650.000','c'=>'Rp 2.000.000'),
            'items'=>array(
                array('no'=>1,'uraian'=>'Formulir Pendaftaran','ab'=>'Rp 200.000','csck'=>'Rp 200.000','keterangan'=>'Full (semua gelombang)','discount'=>false),
                array('no'=>2,'uraian'=>'Jaket Almamater + KTM','ab'=>'Rp 400.000','csck'=>'Rp 400.000','keterangan'=>'Setelah lulus SPMB'),
                array('no'=>3,'uraian'=>'Matrikulasi','ab'=>'Rp 400.000','csck'=>'Rp 400.000','keterangan'=>'Sekali saat registrasi'),
                array('no'=>4,'uraian'=>'Registrasi Awal Semester','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setiap awal semester'),
                array('no'=>5,'uraian'=>'Biaya Kuliah (per semester)','ab'=>'Rp 3.600.000','csck'=>'Rp 5.700.000','keterangan'=>'A&B: Rp 600rb/angsur<br>C: Rp 950rb/angsur','highlight'=>true),
                array('no'=>6,'uraian'=>'Biaya UTS','ab'=>'Rp 450.000','csck'=>'Rp 450.000','keterangan'=>'Dilunasi Sebelum UTS'),
                array('no'=>7,'uraian'=>'Biaya UAS','ab'=>'Rp 450.000','csck'=>'Rp 450.000','keterangan'=>'Dilunasi Sebelum UAS'),
            ),
            'total_registrasi'=>'Termasuk KTM, Jaket, Matrikulasi, Registrasi Awal, dan Angsuran Kuliah Pertama'
        ),
    );
}

function pmb_default_pkkmb() {
    return array(
        'instagram' => 'https://www.instagram.com/pmb.unpam',
        'show_posts' => false,
        'posts' => array(
            array('judul'=>'Twibbon OFFICIAL UNPAM','tanggal'=>'08 Agustus 2026','ringkasan'=>'Twibbon untuk meramaikan PKKMB Unpam','url'=>'https://www.instagram.com/p/DbxDpCPiexw/','gambar'=>'uploads/Twibbbonn.png'),
            array('judul'=>'Info Umum PKKMB UNPAM','tanggal'=>'19 - 29 Agustus 2026','ringkasan'=>'Lokasi, Waktu, dan lainnya lihat disini','url'=>'https://www.instagram.com/p/Db5mASvGih6/','gambar'=>'uploads/pkkmb.jpg'),
            array('judul'=>'Info PKKMB Reg A - Serang','tanggal'=>'19 Agustus 2026','ringkasan'=>'Lokasi, Waktu, dan lainnya lihat disini','url'=>'https://www.instagram.com/p/DcC6RInETCf/','gambar'=>'uploads/seranga.jpg','selesai'=>true),
            array('judul'=>'Info PKKMB Reg B CS - Serang','tanggal'=>'20 Agustus 2026','ringkasan'=>'Lokasi, Waktu, dan lainnya lihat disini','url'=>'https://www.instagram.com/p/DcFhksuEaXh/','gambar'=>'uploads/serangbcs.jpg','selesai'=>true),
            array('judul'=>'Info PKKMB Reg A - Tangsel','tanggal'=>'26 Agustus 2026','ringkasan'=>'Lokasi, Waktu, dan lainnya lihat disini','url'=>'https://www.instagram.com/p/DcU-6LDEXSx/','gambar'=>'uploads/rega.jpg'),
        ),
    );
}

function pmb_default_lokasi() {
    return array(
        'campuses' => array(
            array('id'=>'kampus-1','name'=>'Kampus 1','address'=>'Jl. Surya Kencana No. 1, Kota Tangerang Selatan','color'=>'blue','lat'=>-6.34368,'lng'=>106.73853,'faculties'=>array(
                array('name'=>'Fakultas Ekonomi dan Bisnis','programs'=>array(array('name'=>'Manajemen','level'=>'S-1'),array('name'=>'Akuntansi','level'=>'S-1'))),
            )),
            array('id'=>'kampus-2','name'=>'Kampus 2','address'=>'Jl. Raya Puspitek, Buaran, Kota Tangerang Selatan','color'=>'indigo','lat'=>-6.35566,'lng'=>106.68700,'faculties'=>array(
                array('name'=>'FKIP','programs'=>array(array('name'=>'Pend. Pancasila dan Kewarganegaraan','level'=>'S-1'),array('name'=>'Pend. Ekonomi','level'=>'S-1'),array('name'=>'Pend. Guru Sekolah Dasar','level'=>'S-1'),array('name'=>'Pend. Profesi Guru','level'=>'S-1'))),
                array('name'=>'Fakultas Komunikasi dan Desain','programs'=>array(array('name'=>'Ilmu Komunikasi','level'=>'S-1'),array('name'=>'Desain Komunikasi Visual','level'=>'S-1'))),
                array('name'=>'Fakultas Agama Islam','programs'=>array(array('name'=>'Manajemen Pendidikan Islam','level'=>'S-1'),array('name'=>'Ekonomi Syariah','level'=>'S-1'))),
                array('name'=>'Fakultas Ilmu Komputer','programs'=>array(array('name'=>'Teknik Informatika','level'=>'S-1'),array('name'=>'Sistem Informasi','level'=>'S-1'))),
                array('name'=>'Fakultas Sastra','programs'=>array(array('name'=>'Sastra Inggris','level'=>'S-1'),array('name'=>'Sastra Indonesia','level'=>'S-1'))),
                array('name'=>'Fakultas Hukum','programs'=>array(array('name'=>'Ilmu Hukum','level'=>'S-1'))),
                array('name'=>'Pascasarjana','programs'=>array(array('name'=>'Manajemen','level'=>'S-2'),array('name'=>'Akuntansi','level'=>'S-2'),array('name'=>'Ilmu Hukum','level'=>'S-2'),array('name'=>'Teknik Informatika','level'=>'S-2'),array('name'=>'Manajemen Pendidikan','level'=>'S-2'))),
            )),
            array('id'=>'kampus-3','name'=>'Kampus 3','address'=>'Jl. Witanaharja 18.B, Kota Tangerang Selatan','color'=>'violet','lat'=>-6.34247,'lng'=>106.73330,'faculties'=>array(
                array('name'=>'Fakultas Teknik','programs'=>array(array('name'=>'Teknik Mesin','level'=>'S-1'),array('name'=>'Teknik Industri','level'=>'S-1'),array('name'=>'Teknik Elektro','level'=>'S-1'),array('name'=>'Teknik Kimia','level'=>'S-1'))),
                array('name'=>'Fakultas Ekonomi dan Bisnis','programs'=>array(array('name'=>'Akuntansi Perpajakan','level'=>'Sarjana Terapan'),array('name'=>'Administrasi Perkantoran','level'=>'D-3'))),
                array('name'=>'FKIP','programs'=>array(array('name'=>'Pend. Jasmani','level'=>'S-1'))),
                array('name'=>'MIPA','programs'=>array(array('name'=>'Matematika','level'=>'S-1'))),
            )),
            array('id'=>'kampus-4','name'=>'Kampus 4 (Serang)','address'=>'Jl. Jakarta - Serang, Walantaka, Kota Serang','color'=>'emerald','lat'=>-6.11803,'lng'=>106.19620,'faculties'=>array(
                array('name'=>'Program Studi','programs'=>array(
                    array('name'=>'Administrasi Negara','level'=>'S-1'),array('name'=>'Ilmu Pemerintahan','level'=>'S-1'),array('name'=>'Matematika','level'=>'S-1'),array('name'=>'Biologi','level'=>'S-1'),array('name'=>'Kimia','level'=>'S-1'),array('name'=>'Ilmu Hukum','level'=>'S-1'),array('name'=>'Teknik Mesin','level'=>'S-1'),array('name'=>'Teknik Elektro','level'=>'S-1'),array('name'=>'Manajemen','level'=>'S-1'),array('name'=>'Akuntansi','level'=>'S-1'),array('name'=>'Sistem Komputer','level'=>'S-1'),array('name'=>'Sistem Informasi','level'=>'S-1'),
                )),
            )),
        ),
    );
}
