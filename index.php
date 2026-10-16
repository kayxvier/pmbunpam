<?php
require __DIR__ . '/config.php';
$PMB_SITE = pmb_settings();
$scheduleData = [
    ['no'=>1,'gel'=>'I','gel_label'=>'Gelombang Pertama','pendaftaran'=>'6 Maret – 5 Mei 2026','spmb_online'=>'8 Mei – 11 Mei 2026','pengumuman'=>'16 Mei 2026','registrasi'=>'16 Mei – 30 Mei 2026','pkkmb'=>'22 – 27 Agustus 2026','cetak_krs'=>'18 Agustus 2026','color'=>'blue'],
    ['no'=>2,'gel'=>'II','gel_label'=>'Gelombang Kedua','pendaftaran'=>'6 Mei – 22 Juni 2026','spmb_online'=>'26 Juni – 29 Juni 2026','pengumuman'=>'3 Juli 2026','registrasi'=>'3 Juli – 18 Juli 2026','pkkmb'=>'22 – 27 Agustus 2026','cetak_krs'=>'18 Agustus 2026','color'=>'indigo'],
    ['no'=>3,'gel'=>'III','gel_label'=>'Gelombang Ketiga','pendaftaran'=>'23 Juni – 3 Agustus 2026','spmb_online'=>'7 – 10 Agustus 2026','pengumuman'=>'13 Agustus 2026','registrasi'=>'13 Agustus – 24 Agustus 2026','pkkmb'=>'22 – 27 Agustus 2026','cetak_krs'=>'18 Agustus 2026','color'=>'sky'],
];

$campusData = [
    'tangsel-s1' => [
        'name'=>'Sarjana (S-1) Tangsel','short'=>'S-1 Tangsel','icon'=>'lucide:building-2','color'=>'blue',
        'registrasi_awal'=>['ab'=>'Rp 750.000','csck'=>'Rp 900.000'],
        'items'=>[
            ['no'=>1,'uraian'=>'Formulir Pendaftaran','ab'=>'Rp 100.000','csck'=>'Rp 100.000','keterangan'=>'Gel. 1: Diskon 50%','discount'=>false,'gel1_price'=>'Rp 150.000'],
            ['no'=>2,'uraian'=>'Jaket Almamater + KTM','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setelah lulus SPMB'],
            ['no'=>3,'uraian'=>'Registrasi Awal Semester','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setiap awal semester'],
            ['no'=>4,'uraian'=>'Biaya Kuliah (per semester)','ab'=>'Rp 1.500.000','csck'=>'Rp 2.400.000','keterangan'=>'A&B: Rp 250rb/angsur<br>CS&CK: Rp 400rb/angsur','highlight'=>true],
            ['no'=>5,'uraian'=>'Angsuran Praktikum','ab'=>'Rp 200.000','csck'=>'Rp 300.000','keterangan'=>'Dilunasi Sebelum UAS','sub_note'=>'Angsuran Praktikum dikhusus-kan untuk Fakultas Teknik, MIPA, Ilmu Komputer, Ilmu Komunikasi & Desain, Serta Program Studi Pendidikan Jasmani'],
            ['no'=>6,'uraian'=>'Biaya UTS','ab'=>'Rp 300.000','csck'=>'Rp 400.000','keterangan'=>'Dilunasi Sebelum UTS'],
            ['no'=>7,'uraian'=>'Biaya UAS','ab'=>'Rp 300.000','csck'=>'Rp 400.000','keterangan'=>'Dilunasi Sebelum UAS'],
        ],
        'total_registrasi'=>'Termasuk KTM, Jaket, Registrasi Awal, dan Angsuran Kuliah Pertama'
    ],
    'serang-s1' => [
        'name'=>'Sarjana (S-1) Serang','short'=>'S-1 Serang','icon'=>'lucide:landmark','color'=>'indigo',
        'registrasi_awal'=>['ab'=>'Rp 700.000','cs'=>'Rp 800.000'],
        'items'=>[
            ['no'=>1,'uraian'=>'Formulir Pendaftaran','ab'=>'Rp 100.000','csck'=>'Rp 100.000','keterangan'=>'Digratiskan','discount'=>true,'gel1_price'=>'GRATIS','is_free'=>true],
            ['no'=>2,'uraian'=>'Jaket Almamater + KTM','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setelah lulus SPMB'],
            ['no'=>3,'uraian'=>'Registrasi Awal Semester','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setiap awal semester'],
            ['no'=>4,'uraian'=>'Biaya Kuliah (per semester)','ab'=>'Rp 1.200.000','csck'=>'Rp 1.800.000','keterangan'=>'A&B: Rp 200rb/angsur<br>CS: Rp 300rb/angsur','highlight'=>true],
            ['no'=>5,'uraian'=>'Angsuran Praktikum','ab'=>'Rp 100.000','csck'=>'Rp 150.000','keterangan'=>'Dilunasi Sebelum UAS','sub_note'=>'Angsuran Praktikum dikhusus-kan untuk Fakultas Teknik, MIPA, & Ilmu Komputer'],
            ['no'=>6,'uraian'=>'Biaya UTS','ab'=>'Rp 200.000','csck'=>'Rp 300.000','keterangan'=>'Dilunasi Sebelum UTS'],
            ['no'=>7,'uraian'=>'Biaya UAS','ab'=>'Rp 200.000','csck'=>'Rp 300.000','keterangan'=>'Dilunasi Sebelum UAS'],
        ],
        'total_registrasi'=>'Termasuk KTM, Jaket, Registrasi Awal, dan Angsuran Kuliah Pertama'
    ],
    'tangsel-s2' => [
        'name'=>'Pascasarjana (S-2) Tangsel','short'=>'S-2 Tangsel','icon'=>'lucide:award','color'=>'violet',
        'registrasi_awal'=>['ab'=>'Rp 1.650.000','c'=>'Rp 2.000.000'],
        'items'=>[
            ['no'=>1,'uraian'=>'Formulir Pendaftaran','ab'=>'Rp 200.000','csck'=>'Rp 200.000','keterangan'=>'Full (semua gelombang)','discount'=>false],
            ['no'=>2,'uraian'=>'Jaket Almamater + KTM','ab'=>'Rp 400.000','csck'=>'Rp 400.000','keterangan'=>'Setelah lulus SPMB'],
            ['no'=>3,'uraian'=>'Matrikulasi','ab'=>'Rp 400.000','csck'=>'Rp 400.000','keterangan'=>'Sekali saat registrasi'],
            ['no'=>4,'uraian'=>'Registrasi Awal Semester','ab'=>'Rp 250.000','csck'=>'Rp 250.000','keterangan'=>'Setiap awal semester'],
            ['no'=>5,'uraian'=>'Biaya Kuliah (per semester)','ab'=>'Rp 3.600.000','csck'=>'Rp 5.700.000','keterangan'=>'A&B: Rp 600rb/angsur<br>C: Rp 950rb/angsur','highlight'=>true],
            ['no'=>6,'uraian'=>'Biaya UTS','ab'=>'Rp 450.000','csck'=>'Rp 450.000','keterangan'=>'Dilunasi Sebelum UTS'],
            ['no'=>7,'uraian'=>'Biaya UAS','ab'=>'Rp 450.000','csck'=>'Rp 450.000','keterangan'=>'Dilunasi Sebelum UAS'],
        ],
        'total_registrasi'=>'Termasuk KTM, Jaket, Matrikulasi, Registrasi Awal, dan Angsuran Kuliah Pertama'
    ]
];

/* Data ini tetap punya fallback bawaan, tetapi seluruh nilainya sekarang bisa
   diganti dari Admin > Data terstruktur. */
$scheduleData = pmb_content('schedule', $scheduleData);
$campusData = pmb_content('biaya', $campusData);
$lokasiData = pmb_content('lokasi');
$lokasiCampuses = isset($lokasiData['campuses']) && is_array($lokasiData['campuses']) ? $lokasiData['campuses'] : array();
$mapCampuses = array();
$default_map_coords = array(array(-6.34368,106.73853),array(-6.35566,106.68700),array(-6.34247,106.73330),array(-6.11803,106.19620));
foreach ($lokasiCampuses as $lokasi_map_index => $lokasi_map_item) {
    $fallback_coord = isset($default_map_coords[$lokasi_map_index]) ? $default_map_coords[$lokasi_map_index] : array(0, 0);
    $mapCampuses[] = array(
        'n' => isset($lokasi_map_item['name']) ? $lokasi_map_item['name'] : 'Kampus ' . ($lokasi_map_index + 1),
        'a' => isset($lokasi_map_item['address']) ? $lokasi_map_item['address'] : '',
        'lat' => isset($lokasi_map_item['lat']) ? (float)$lokasi_map_item['lat'] : $fallback_coord[0],
        'lng' => isset($lokasi_map_item['lng']) ? (float)$lokasi_map_item['lng'] : $fallback_coord[1],
        'c' => (($lokasi_map_item['color'] ?? '') === 'emerald') ? '#f5a524' : '#2f5bea',
    );
}


/* ================= TAMBAHAN FITUR (config) ================= */
if(!function_exists('e_pmb')){ function e_pmb($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); } }

/* ---- INSTAGRAM: postingan pilihan (EDIT MANUAL DI SINI) -------------------------
   - 'image' : URL gambar postingan (mis. hasil upload/CDN). Kalau dikosongkan,
               kartu tampil memakai latar gradient + caption (tetap rapi).
   - 'caption': teks singkat postingan.
   - 'likes' : jumlah suka (opsional, boleh dikosongkan).
   - 'link'  : URL postingan aslinya di Instagram.
   Tidak memakai iframe / embed script — jadi selalu tampil & cepat. ------------- */
$igPosts = [
    ['image'=>'', 'caption'=>'Pendaftaran Mahasiswa Baru UNPAM 2026 resmi dibuka — daftar online sekarang!', 'likes'=>'', 'link'=>'https://www.instagram.com/pmb.unpam', 'color'=>'linear-gradient(135deg,#6366f1,#8b5cf6,#ec4899)'],
    ['image'=>'', 'caption'=>'Biaya kuliah terjangkau tanpa uang gedung. Cek info lengkap di bio!', 'likes'=>'', 'link'=>'https://www.instagram.com/pmb.unpam', 'color'=>'linear-gradient(135deg,#06b6d4,#6366f1)'],
    ['image'=>'', 'caption'=>'Empat kampus UNPAM siap menyambut kamu di Tangerang Selatan & Serang.', 'likes'=>'', 'link'=>'https://www.instagram.com/pmb.unpam', 'color'=>'linear-gradient(135deg,#f59e0b,#ec4899)'],
    ['image'=>'', 'caption'=>'Jadwal & alur SPMB Online terbaru, jangan sampai kelewatan gelombangnya!', 'likes'=>'', 'link'=>'https://www.instagram.com/pmb.unpam', 'color'=>'linear-gradient(135deg,#10b981,#06b6d4)'],
];

/* ---- HIGHLIGHTS / BERITA: masukkan LINK BERITA TERTENTU (EDIT MANUAL) -----------
   - 'image' : URL thumbnail berita. Kalau kosong, dipakai latar gradient + emoji.
   - 'link'  : URL berita tujuannya. ---------------------------------------------- */
$highlights = [
    ['title'=>'ORBIT UNPAM Jadi Jembatan Siswa Menuju Dunia Kampus & Karier', 'date'=>'', 'tag'=>'Event', 'image'=>'', 'link'=>'https://pmb.unpam.ac.id/informasi', 'emoji'=>'🚀'],
    ['title'=>'UNPAM Hadir di Effatha Edufair 2025 Dukung Akses Pendidikan', 'date'=>'', 'tag'=>'Education Fair', 'image'=>'', 'link'=>'https://pmb.unpam.ac.id/informasi', 'emoji'=>'🎓'],
    ['title'=>'Bangga! Mahasiswa UNPAM Raih Emas di Kejuaraan Nasional Angkat Besi', 'date'=>'', 'tag'=>'Prestasi', 'image'=>'', 'link'=>'https://pmb.unpam.ac.id/informasi', 'emoji'=>'🏅'],
    ['title'=>'Langkah Kepedulian UNPAM untuk Keluarga Almarhumah Suheni Sintiasari', 'date'=>'', 'tag'=>'Agenda', 'image'=>'', 'link'=>'https://pmb.unpam.ac.id/informasi', 'emoji'=>'🤝'],
    ['title'=>'Jadwal & Alur SPMB Online UNPAM 2026 Selengkapnya', 'date'=>'', 'tag'=>'Info', 'image'=>'', 'link'=>'https://pmb.unpam.ac.id/informasi', 'emoji'=>'📅'],
];

/* Feed yang dikelola admin juga dipakai oleh index.php, bukan hanya front.php. */
$managed_ig = pmb_load('instagram');
if (!empty($managed_ig)) {
    $igPosts = array();
    foreach ($managed_ig as $ig) {
        $igPosts[] = array(
            'image' => isset($ig['image']) ? $ig['image'] : '',
            'caption' => isset($ig['caption']) ? $ig['caption'] : '',
            'likes' => isset($ig['likes']) ? $ig['likes'] : '',
            'link' => isset($ig['link']) ? $ig['link'] : 'https://www.instagram.com/pmb.unpam',
            'color' => isset($ig['grad']) ? $ig['grad'] : 'linear-gradient(135deg,#6366f1,#8b5cf6,#ec4899)',
        );
    }
}
$managed_highlights = pmb_load('highlights');
if (!empty($managed_highlights)) {
    $highlights = array();
    foreach ($managed_highlights as $hi) {
        $highlights[] = array(
            'title' => isset($hi['title']) ? $hi['title'] : '',
            'date' => isset($hi['date']) ? $hi['date'] : '',
            'tag' => isset($hi['tag']) ? $hi['tag'] : '',
            'image' => isset($hi['thumb']) ? $hi['thumb'] : '',
            'link' => isset($hi['link']) ? $hi['link'] : '',
            'emoji' => isset($hi['em']) ? $hi['em'] : '📰',
        );
    }
}

/* ---- Testimoni: dibaca dari data/testimonials.json (dikelola lewat admin.php) ---- */
$testimonials = pmb_load('testimonials');
if (!empty($testimonials)) {
    foreach ($testimonials as &$testi_item) {
        if (!isset($testi_item['color']) && isset($testi_item['c'])) $testi_item['color'] = $testi_item['c'];
    }
    unset($testi_item);
}
if(empty($testimonials)){
    $testimonials = [
        ['name'=>'Rani Aprilia','prodi'=>'Manajemen S1','text'=>'Kuliah sambil kerja jadi gampang. Jadwalnya fleksibel dan biayanya benar-benar terjangkau. Dosennya juga suportif banget!','color'=>'#6366f1','photo'=>''],
        ['name'=>'Dimas Prasetyo','prodi'=>'Teknik Informatika S1','text'=>'Fasilitas lab oke, materi update sama dunia industri. Proses pendaftarannya juga cepat dan jelas step-by-step-nya.','color'=>'#8b5cf6','photo'=>''],
        ['name'=>'Siti Nurhaliza','prodi'=>'Akuntansi S1','text'=>'Dari daftar online sampai ujian SPMB semuanya rapi. Bangga bisa jadi bagian dari keluarga besar UNPAM.','color'=>'#06b6d4','photo'=>''],
        ['name'=>'Bagus Santoso','prodi'=>'Ilmu Hukum S1','text'=>'Lokasi kampus strategis dan gampang dijangkau. Lingkungan belajarnya nyaman dan teman-temannya asik.','color'=>'#f59e0b','photo'=>''],
        ['name'=>'Putri Maharani','prodi'=>'Ilmu Komunikasi S1','text'=>'Banyak kegiatan & organisasi yang bikin soft skill berkembang. Rekomendasi buat kamu yang mau kuliah hemat!','color'=>'#ec4899','photo'=>''],
        ['name'=>'Andi Wijaya','prodi'=>'Sistem Informasi S1 - Serang','text'=>'Kampus Serang makin lengkap. Pendaftaran dibantu tim PMB yang ramah, jadi nggak bingung sama sekali.','color'=>'#10b981','photo'=>''],
    ];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo e_pmb($PMB_SITE['site']['name'] . ' — ' . $PMB_SITE['site']['organization']); ?></title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome (roadmap icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>


<!-- Tailwind CSS (jadwal & biaya) -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          brand: {
            50:'#EFF6FF',100:'#DBEAFE',200:'#BFDBFE',500:'#3B82F6',
            600:'#2563EB',700:'#1D4ED8',800:'#1E40AF',900:'#1E3A8A'
          }
        },
        fontFamily: { sans: ['Inter','sans-serif'] }
      }
    }
  }
</script>
<!-- Iconify (jadwal & biaya icons) -->
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
<style>
/* ===== GLOBAL BASE ===== */
html{scroll-behavior:smooth;}
body{margin:0;padding:0;background:#ffffff;}
.site-divider{width:100%;height:2px;background:#e5e7eb;margin:0;border-radius:2px;}

/* ===== SHARED KEYFRAMES ===== */
@keyframes fadeIn{from{opacity:0;}to{opacity:1;}}
@keyframes slideUp{from{transform:translateY(40px);opacity:0;}to{transform:translateY(0);opacity:1;}}
@keyframes fadeInUp{from{opacity:0;transform:translateY(20px);}to{opacity:1;transform:translateY(0);}}
@keyframes slideIn{from{opacity:0;transform:translateX(-10px);}to{opacity:1;transform:translateX(0);}}
@keyframes resultGradient{0%,100%{background-position:0% 50%;}50%{background-position:100% 50%;}}
@keyframes resultShine{0%{left:-130%;}60%{left:130%;}100%{left:130%;}}
@keyframes iconFloat{0%,100%{transform:translateY(0) rotate(0);}50%{transform:translateY(-5px) rotate(-6deg);}}
@keyframes pop{from{transform:scale(0.85);opacity:0;}to{transform:scale(1);opacity:1;}}

/* ===== SHARED (jadwal + biaya) CUSTOM CLASSES ===== */
.animate-fade-in-up{animation:fadeInUp 0.6s ease-out forwards;}
.animate-slide-in{animation:slideIn 0.3s ease-out forwards;}
.glass-card{background:rgba(255,255,255,0.95);backdrop-filter:blur(20px);border:1px solid rgba(59,130,246,0.1);}
.table-row-hover:hover{background:linear-gradient(90deg,rgba(59,130,246,0.04),rgba(59,130,246,0.01));}
.tab-button{transition:all 0.3s cubic-bezier(0.4,0,0.2,1);}
.tab-button.active{transform:translateY(-2px);box-shadow:0 10px 25px -5px rgba(59,130,246,0.3);}
.tab-content{display:none;opacity:0;}
.tab-content.active{display:block;animation:fadeInUp 0.4s ease-out forwards;}
.price-badge{position:relative;overflow:hidden;}
.price-badge::before{content:'';position:absolute;top:0;left:-100%;width:100%;height:100%;background:linear-gradient(90deg,transparent,rgba(255,255,255,0.3),transparent);transition:left 0.5s;}
.price-badge:hover::before{left:100%;}
.scrollbar-hide::-webkit-scrollbar{display:none;}
.scrollbar-hide{-ms-overflow-style:none;scrollbar-width:none;}
.discount-strike{text-decoration:line-through;opacity:0.5;}
.discount-strike-red{text-decoration:line-through;text-decoration-color:#EF4444;color:#EF4444;opacity:0.8;}

/* ===== SECTION: BUTTON ===== */
.sec-button{--blue:#3b82f6;--purple:#a855f7;--green:#22c55e;--yellow:#facc15;font-family:'Segoe UI',Arial,sans-serif;background:#f8fafc;padding:20px 0;position:relative;}
.sec-button .container{width:95%;max-width:1200px;margin:0 auto;}
.sec-button .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:16px;}
.sec-button .card{position:relative;background:#fff;border-radius:16px;padding:24px 22px;text-align:center;cursor:pointer;text-decoration:none;color:#111;box-shadow:0 6px 18px rgba(0,0,0,0.06);transition:transform .3s cubic-bezier(.2,.8,.2,1),box-shadow .3s ease;overflow:hidden;isolation:isolate;}
.sec-button .card::before{content:"";position:absolute;top:0;left:0;width:100%;height:5px;background:linear-gradient(90deg,#6366f1,#a855f7);transform:scaleX(0);transform-origin:left;transition:transform .35s ease;}
.sec-button .card::after{content:"";position:absolute;top:0;left:-120%;width:80%;height:100%;background:linear-gradient(120deg,transparent,rgba(255,255,255,0.55),transparent);transform:skewX(-20deg);transition:left .6s ease;z-index:1;}
.sec-button .card:hover{transform:translateY(-6px);box-shadow:0 14px 28px rgba(0,0,0,0.14);}
.sec-button .card:hover::before{transform:scaleX(1);}
.sec-button .card:hover::after{left:130%;}
.sec-button .icon{position:relative;z-index:2;width:62px;height:62px;margin:0 auto 12px auto;font-size:30px;display:flex;align-items:center;justify-content:center;border-radius:50%;background:linear-gradient(145deg,#eef2ff,#e0e7ff);transition:transform .3s ease;}
.sec-button .card:hover .icon{transform:scale(1.12) rotate(-6deg);}
.sec-button .title{position:relative;z-index:2;font-size:17px;font-weight:700;margin-bottom:6px;}
.sec-button .desc{position:relative;z-index:2;font-size:13px;line-height:1.4;color:#555;}
.sec-button .blue::before{background:linear-gradient(90deg,#3b82f6,#60a5fa);}
.sec-button .blue .icon{background:linear-gradient(145deg,#dbeafe,#bfdbfe);}
.sec-button .purple::before{background:linear-gradient(90deg,#a855f7,#c084fc);}
.sec-button .purple .icon{background:linear-gradient(145deg,#f3e8ff,#e9d5ff);}
.sec-button .green::before{background:linear-gradient(90deg,#22c55e,#4ade80);}
.sec-button .green .icon{background:linear-gradient(145deg,#dcfce7,#bbf7d0);}
.sec-button .yellow::before{background:linear-gradient(90deg,#facc15,#fde047);}
.sec-button .yellow .icon{background:linear-gradient(145deg,#fef9c3,#fef08a);}
.sec-button .neutral::before{background:linear-gradient(90deg,#94a3b8,#cbd5e1);}
.sec-button .neutral .icon{background:linear-gradient(145deg,#f1f5f9,#e2e8f0);}
.sec-button .result-wrapper{display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:16px;margin:26px 0 10px 0;}
.sec-button .btn-result{position:relative;display:flex;align-items:center;gap:18px;width:100%;padding:22px 26px;border-radius:18px;text-decoration:none;color:#fff;background:linear-gradient(135deg,#059669 0%,#10b981 45%,#34d399 100%);background-size:200% 200%;animation:resultGradient 6s ease infinite;box-shadow:0 10px 26px rgba(16,185,129,0.38);overflow:hidden;transition:transform .3s ease,box-shadow .3s ease;box-sizing:border-box;}
.sec-button .btn-result:hover{transform:translateY(-4px) scale(1.01);box-shadow:0 16px 34px rgba(16,185,129,0.5);}
.sec-button .btn-result::before{content:"";position:absolute;top:0;left:-130%;width:60%;height:100%;background:linear-gradient(120deg,transparent,rgba(255,255,255,0.5),transparent);transform:skewX(-20deg);animation:resultShine 3.5s ease-in-out infinite;}
.sec-button .result-icon{flex-shrink:0;width:58px;height:58px;border-radius:16px;background:rgba(255,255,255,0.2);border:1px solid rgba(255,255,255,0.35);display:flex;align-items:center;justify-content:center;font-size:30px;animation:iconFloat 2.5s ease-in-out infinite;z-index:2;}
.sec-button .result-text{z-index:2;text-align:left;flex:1;}
.sec-button .result-title{font-size:18px;font-weight:800;margin:0 0 4px 0;display:flex;align-items:center;gap:10px;flex-wrap:wrap;}
.sec-button .result-badge{font-size:11px;font-weight:700;letter-spacing:.5px;background:#fde047;color:#92400e;padding:3px 10px;border-radius:50px;text-transform:uppercase;}
.sec-button .result-desc{margin:0;font-size:13px;opacity:0.95;}
.sec-button .result-arrow{z-index:2;flex-shrink:0;font-size:22px;transition:transform .3s ease;}
.sec-button .btn-result:hover .result-arrow{transform:translateX(6px);}
.sec-button .btn-result.alt{background:linear-gradient(135deg,#1e3a8a 0%,#2563eb 45%,#3b82f6 100%);box-shadow:0 10px 26px rgba(37,99,235,0.38);}
.sec-button .btn-result.alt:hover{box-shadow:0 16px 34px rgba(37,99,235,0.5);}
.sec-button .result-badge.gel{background:rgba(255,255,255,0.22);color:#fff;border:1px solid rgba(255,255,255,0.55);}
.sec-button .divider{margin:30px 0 20px 0;text-align:center;position:relative;font-size:14px;color:#777;}
.sec-button .divider:before,.sec-button .divider:after{content:"";position:absolute;top:50%;width:40%;height:1px;background:#ddd;}
.sec-button .divider:before{left:0;}
.sec-button .divider:after{right:0;}
.sec-button .popup-overlay{position:absolute;inset:0;background:rgba(15,23,42,0.35);backdrop-filter:blur(3px);display:none;align-items:center;justify-content:center;z-index:50;}
.sec-button .popup-box{background:#fff;padding:28px 25px;border-radius:18px;width:90%;max-width:360px;text-align:center;animation:pop 0.3s ease;box-shadow:0 12px 40px rgba(0,0,0,0.25);}
.sec-button .popup-box h3{font-size:20px;font-weight:700;margin:0 0 12px;color:#111;}
.sec-button .btn-popup{position:relative;display:flex;align-items:center;justify-content:center;gap:8px;background:linear-gradient(135deg,#4f46e5,#6366f1);color:#fff;padding:13px;margin-top:14px;border-radius:12px;text-decoration:none;font-weight:600;overflow:hidden;transition:transform .2s ease,box-shadow .2s ease;}
.sec-button .btn-popup.green{background:linear-gradient(135deg,#059669,#16a34a);}
.sec-button .btn-popup:hover{transform:translateY(-2px);box-shadow:0 8px 18px rgba(0,0,0,0.18);}
.sec-button .btn-popup::before{content:"";position:absolute;top:0;left:-120%;width:60%;height:100%;background:linear-gradient(120deg,transparent,rgba(255,255,255,0.5),transparent);transform:skewX(-20deg);transition:left .5s ease;}
.sec-button .btn-popup:hover::before{left:130%;}
.sec-button .close-btn{margin-top:18px;background:#e2e8f0;border:none;padding:9px 18px;border-radius:8px;cursor:pointer;font-weight:600;color:#334155;transition:background .2s;}
.sec-button .close-btn:hover{background:#cbd5e1;}
@media (max-width:480px){.sec-button .btn-result{flex-direction:column;text-align:center;gap:12px;}.sec-button .result-text,.sec-button .result-title{text-align:center;justify-content:center;}.sec-button .result-arrow{display:none;}}

/* ===== SECTION: SPMB ===== */
.sec-spmb{--green-600:#0f6f3e;--green-500:#28a745;--blue-600:#16327a;--blue-500:#2b4ac9;--text:#111827;--muted:#6b7280;--max-w:1200px;font-family:Inter,Arial,Helvetica,sans-serif;color:var(--text);background:#fff;}
.sec-spmb .container{max-width:var(--max-w);margin:70px auto;padding:0 40px;display:flex;align-items:center;gap:60px;}
.sec-spmb .photo-side{width:48%;min-width:350px;}
.sec-spmb .photo-side img{width:100%;height:auto;display:block;}
.sec-spmb .content{width:52%;min-width:330px;}
.sec-spmb .kicker{text-transform:uppercase;font-size:13px;color:var(--blue-600);font-weight:600;letter-spacing:0.08em;display:flex;align-items:center;gap:12px;}
.sec-spmb .kicker .dash{width:42px;height:4px;background:linear-gradient(90deg,var(--blue-600),var(--blue-500));border-radius:2px;}
.sec-spmb h1{margin:16px 0 16px;font-size:34px;font-weight:700;line-height:1.1;}
.sec-spmb p{color:var(--muted);font-size:15px;line-height:1.75;margin:0 0 30px;max-width:60ch;}
.sec-spmb .btn{background:linear-gradient(90deg,var(--blue-600),var(--blue-500));color:white;font-weight:600;padding:13px 24px;border-radius:10px;text-decoration:none;display:inline-flex;box-shadow:0 10px 28px rgba(43,74,201,0.2);transition:.15s;margin:0 10px 10px 0;}
.sec-spmb .btn:hover{transform:translateY(-3px);box-shadow:0 18px 38px rgba(43,74,201,0.25);}
.sec-spmb .btn1{background:linear-gradient(90deg,var(--green-600),var(--green-500));color:white;font-weight:600;padding:13px 24px;border-radius:10px;text-decoration:none;display:inline-flex;box-shadow:0 10px 28px rgba(43,74,201,0.2);transition:.15s;margin:0 10px 10px 0;}
.sec-spmb .btn1:hover{transform:translateY(-3px);box-shadow:0 18px 38px rgba(43,74,201,0.25);}
@media(max-width:980px){.sec-spmb .container{flex-direction:column;text-align:center;gap:40px;margin:40px auto;}.sec-spmb .photo-side,.sec-spmb .content{width:100%;}.sec-spmb .kicker{justify-content:center;}}
@media(max-width:400px){.sec-spmb .photo-side{min-width:0;}.sec-spmb .content{min-width:0;}}

/* ===== SECTION: QUIZ ===== */
.sec-quiz{--blue-600:#16327a;--blue-500:#2b4ac9;font-family:Arial,sans-serif;background:linear-gradient(90deg,var(--blue-600),var(--blue-500));display:flex;justify-content:center;align-items:center;padding:55px 20px;color:white;box-sizing:border-box;position:relative;overflow:hidden;min-height:480px;}
.sec-quiz .content{padding:26px;width:100%;max-width:520px;text-align:center;background:rgba(255,255,255,0.12);backdrop-filter:blur(8px);border-radius:16px;box-shadow:0 10px 26px rgba(0,0,0,0.25);}
.sec-quiz .content h3{margin:0 0 10px;font-size:20px;font-weight:700;}
.sec-quiz .content p{margin:0 0 14px;font-size:15px;line-height:1.5;}
.sec-quiz img{display:inline-block;max-width:100%;}
.sec-quiz button{cursor:pointer;border:none;border-radius:10px;padding:10px 18px;margin:6px;font-weight:600;font-size:14px;color:#fff;transition:0.25s;box-shadow:0 4px 12px rgba(0,0,0,0.12);}
.sec-quiz button:hover{opacity:.9;}
.sec-quiz .btn-blue{background:#3b82f6;}
.sec-quiz .btn-green{background:#22c55e;}
.sec-quiz .btn-orange{background:#f97316;}
.sec-quiz #modal-quiz{position:absolute;inset:0;background:rgba(0,0,0,0.55);display:none;justify-content:center;align-items:center;padding:20px;z-index:50;animation:fadeIn .35s ease forwards;}
.sec-quiz .modal-box{width:100%;max-width:560px;background:white;color:black;border-radius:14px;padding:24px;box-shadow:0 10px 32px rgba(0,0,0,0.25);animation:slideUp .35s ease forwards;box-sizing:border-box;max-height:calc(100% - 24px);overflow-y:auto;}
.sec-quiz .modal-box h3{margin-top:0;font-size:19px;font-weight:700;}
.sec-quiz .modal-box p{margin:0 0 8px;}
.sec-quiz .options label{display:block;padding:12px;background:#f3f4f6;border-radius:6px;margin:8px 0;cursor:pointer;color:black;}
.sec-quiz .progress-bar{background:#e5e7eb;height:8px;border-radius:6px;overflow:hidden;margin-bottom:10px;}
.sec-quiz .progress{height:8px;width:0%;background:#2563eb;transition:.3s;}
.sec-quiz #modal-result{position:absolute;z-index:50;}

/* ===== SECTION: ROADMAP ===== */
.sec-roadmap{--blue-600:#16327a;--blue-500:#2b4ac9;font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;background:linear-gradient(90deg,var(--blue-600),var(--blue-500));color:white;padding-bottom:10px;}
.sec-roadmap header{text-align:center;padding:24px 10px 20px;}
.sec-roadmap header h1{font-size:28px;font-weight:bold;color:white;margin:0 0 8px;}
.sec-roadmap header p{font-size:15px;color:#f0f0f0;margin:0;}
.sec-roadmap .roadmap-wrapper{max-width:1300px;margin:auto;padding:20px;}
.sec-roadmap .roadmap-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:20px;}
.sec-roadmap .step{background:#fff;border-radius:12px;box-shadow:0 3px 8px rgba(0,0,0,0.08);padding:12px 15px;display:flex;align-items:center;position:relative;transition:transform .2s;min-height:70px;}
.sec-roadmap .step:hover{transform:translateY(-3px);box-shadow:0 5px 12px rgba(0,0,0,0.12);}
.sec-roadmap .icon{width:45px;height:45px;border-radius:50%;background:#008cff;color:#fff;display:flex;align-items:center;justify-content:center;font-size:18px;margin-right:12px;flex-shrink:0;}
.sec-roadmap .text{flex:1;}
.sec-roadmap .text h3{margin:0;font-size:14px;font-weight:bold;color:#222;}
.sec-roadmap .text p{margin:2px 0 0;font-size:12px;color:#555;}
.sec-roadmap .number{position:absolute;top:-8px;right:-8px;background:#00b894;color:#fff;font-size:12px;font-weight:bold;padding:3px 8px;border-radius:20px;box-shadow:0 2px 4px rgba(0,0,0,0.2);}
.sec-roadmap a{color:#008cff;font-weight:bold;text-decoration:none;}
.sec-roadmap a:hover{text-decoration:underline;}
@media (max-width:900px){.sec-roadmap .roadmap-grid{grid-template-columns:repeat(2,1fr);}}
@media (max-width:480px){.sec-roadmap .roadmap-grid{grid-template-columns:repeat(1,1fr);}}

/* ===== SECTION: TATACARA ===== */
.sec-tatacara{font-family:Arial,sans-serif;background:#f7f8fa;}
.sec-tatacara .container{display:flex;flex-wrap:wrap;gap:40px;padding:60px 20px;justify-content:center;}
.sec-tatacara .left-box{background:#1333d8;color:white;padding:30px;border-radius:10px;max-width:300px;flex:1;min-width:250px;}
.sec-tatacara .left-box p{margin:0;}
.sec-tatacara .left-box h2{margin:15px 0 25px;line-height:1.4;font-size:24px;font-weight:bold;}
.sec-tatacara .btn{display:inline-block;padding:12px 20px;background:linear-gradient(to right,#0a0a23,#314af3);color:white;text-decoration:none;font-weight:bold;border-radius:6px;transition:0.3s;}
.sec-tatacara .btn:hover{background:linear-gradient(to right,#314af3,#0a0a23);}
.sec-tatacara .steps{flex:2;max-width:600px;min-width:280px;}
.sec-tatacara .step{margin-bottom:20px;display:flex;align-items:flex-start;gap:12px;}
.sec-tatacara .icon{font-size:22px;line-height:1;width:30px;}
.sec-tatacara .step p{margin:0;color:#1f2937;}
.sec-tatacara .step strong{font-size:16px;color:#111827;}

/* ============ GLASS THEME TOKENS ============ */
:root{
  --pjs:'Plus Jakarta Sans','Inter',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;
  --ink:#141a3a; --muted:#4c5680; --line:rgba(255,255,255,.55);
  --brand:#6366f1; --brand-d:#4f46e5; --violet:#8b5cf6; --pink:#ec4899;
  --cyan:#06b6d4; --amber:#f59e0b; --emerald:#10b981; --rose:#f43f5e;
  --grad-brand:linear-gradient(135deg,#6366f1 0%,#8b5cf6 45%,#ec4899 100%);
  --grad-cool:linear-gradient(135deg,#06b6d4 0%,#6366f1 100%);
  --glass:rgba(255,255,255,.55);
  --glass-strong:rgba(255,255,255,.72);
  --glass-soft:rgba(255,255,255,.38);
  --blur:saturate(180%) blur(20px);
  --gshadow:0 10px 34px rgba(48,54,140,.16), 0 2px 8px rgba(48,54,140,.08);
  --gshadow-sm:0 6px 18px rgba(48,54,140,.14);
  --gborder:1px solid rgba(255,255,255,.6);
  --r-lg:26px; --r-md:18px; --r-sm:14px;
}

/* ============ COLORFUL ANIMATED BACKDROP ============ */
html{overflow-x:hidden;}
body{
  font-family:var(--pjs); color:var(--ink); overflow-x:hidden; max-width:100vw;
  background:linear-gradient(160deg,#eef2ff 0%,#f7edff 40%,#eafaff 100%);
  position:relative;
}
body::before{
  content:""; position:fixed; inset:-20%; z-index:-2; pointer-events:none;
  background:
    radial-gradient(42vw 42vw at 12% 8%, rgba(139,92,246,.42), transparent 60%),
    radial-gradient(40vw 40vw at 88% 12%, rgba(6,182,212,.38), transparent 60%),
    radial-gradient(46vw 46vw at 78% 88%, rgba(236,72,153,.34), transparent 62%),
    radial-gradient(40vw 40vw at 8% 92%, rgba(99,102,241,.40), transparent 60%);
  filter:blur(10px); animation:bgFloat 18s ease-in-out infinite alternate;
}
@keyframes bgFloat{0%{transform:translate3d(0,0,0) scale(1)}50%{transform:translate3d(0,-2%,0) scale(1.05)}100%{transform:translate3d(0,2%,0) scale(1)}}
.site-divider{display:none;}

/* ============ LAYOUT PRIMITIVES ============ */
.clay-section{position:relative; padding:66px 0; overflow:hidden;}
.clay-wrap{max-width:1200px; margin:0 auto; padding:0 22px; position:relative; z-index:2;}
.clay-blob{position:absolute; border-radius:50%; filter:blur(46px); opacity:.5; z-index:0; pointer-events:none;}
.clay-sec-head{text-align:center; max-width:760px; margin:0 auto 40px;}
.btnsec-head{text-align:center; max-width:820px; margin:0 auto 26px;}
.clay-eyebrow{display:inline-flex; align-items:center; gap:8px; font-size:12.5px; font-weight:800; letter-spacing:.14em; text-transform:uppercase;
  color:var(--brand-d); background:var(--glass-strong); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur);
  padding:8px 16px; border-radius:999px; border:var(--gborder); box-shadow:var(--gshadow-sm);}
.clay-title{font-family:var(--pjs); font-weight:800; letter-spacing:-.02em; line-height:1.08; margin:16px 0 10px; font-size:clamp(27px,3.6vw,42px);
  background:linear-gradient(120deg,#1e2350,#4f46e5 60%,#8b5cf6); -webkit-background-clip:text; background-clip:text; color:transparent;}
.clay-sub{color:var(--muted); font-size:clamp(15px,1.4vw,17px); line-height:1.65; margin:0 auto; max-width:640px;}

/* ============ GLASS CARD + BUTTON ============ */
.clay-card{background:var(--glass); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur);
  border:var(--gborder); border-radius:var(--r-lg); box-shadow:var(--gshadow);}
.clay-btn{position:relative; display:inline-flex; align-items:center; justify-content:center; gap:9px; cursor:pointer;
  font-family:var(--pjs); font-weight:800; font-size:15.5px; letter-spacing:.01em; color:#fff; text-decoration:none;
  padding:14px 26px; border:none; border-radius:var(--r-md); overflow:hidden;
  background:var(--grad-brand); background-size:180% 180%; background-position:0% 50%;
  box-shadow:0 10px 26px rgba(124,58,237,.36), inset 0 1px 0 rgba(255,255,255,.4);
  transition:transform .28s cubic-bezier(.2,.8,.2,1), box-shadow .28s, background-position .6s;}
.clay-btn::after{content:""; position:absolute; top:0; left:-120%; width:60%; height:100%;
  background:linear-gradient(100deg,transparent,rgba(255,255,255,.55),transparent); transform:skewX(-18deg); transition:left .7s;}
.clay-btn:hover{transform:translateY(-3px) scale(1.02); background-position:100% 50%; box-shadow:0 16px 36px rgba(124,58,237,.46);}
.clay-btn:hover::after{left:130%;}
.clay-btn:active{transform:translateY(-1px) scale(.99);}
.clay-btn.ghost{background:var(--glass-strong); color:var(--brand-d); border:var(--gborder); box-shadow:var(--gshadow-sm); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur);}
.clay-btn.ghost:hover{background:#fff; box-shadow:var(--gshadow);}
.clay-chip{display:inline-flex; align-items:center; gap:6px; padding:7px 14px; border-radius:999px; font-weight:700; font-size:12.5px;
  background:var(--glass-strong); border:var(--gborder); color:var(--brand-d); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur);}

/* ============ REVEAL ON SCROLL ============ */
.reveal{opacity:0; transform:translateY(26px); transition:opacity .7s ease, transform .7s cubic-bezier(.2,.8,.2,1);}
.reveal.in{opacity:1; transform:none;}
@media (prefers-reduced-motion: reduce){ .reveal{opacity:1 !important; transform:none !important;} body::before{animation:none;} }

/* ============ OVERRIDE ORIGINAL SECTIONS TO GLASS ============ */
.sec-spmb, .sec-quiz, .sec-jadwal, .sec-biaya, .sec-roadmap{position:relative;}
.glass-card{background:var(--glass) !important; -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur);
  border:var(--gborder) !important; box-shadow:var(--gshadow) !important; border-radius:var(--r-lg) !important;}

/* ============ BUTTON PAGE + CAMPUS COLLAGE BACKGROUND ============ */
.sec-button{position:relative; padding:64px 0 60px; overflow:hidden;}
.campus-collage{position:absolute; inset:0; z-index:0; display:grid; grid-template-columns:repeat(4,1fr);}
.campus-collage .cc{position:relative; overflow:hidden;}
.campus-collage .cc img{width:100%; height:100%; object-fit:cover; object-position:center; transform:scale(1.02); transition:transform 8s ease;}
.sec-button:hover .campus-collage .cc img{transform:scale(1.12);}
.campus-collage::after{content:""; position:absolute; inset:0;
  background:linear-gradient(180deg,rgba(238,242,255,.72),rgba(247,237,255,.66) 50%,rgba(234,250,255,.8)),
    radial-gradient(60% 60% at 50% 40%, rgba(99,102,241,.18), transparent 70%);
  -webkit-backdrop-filter:blur(3px); backdrop-filter:blur(3px);}
.sec-button .container{position:relative; z-index:2;}

/* ============ SAMBUTAN ============ */
.sambutan-grid{display:grid; grid-template-columns:340px 1fr; gap:34px; align-items:center;}
.sambutan-photo{position:relative;}
.sambutan-photo .frame{border-radius:var(--r-lg); overflow:hidden; border:var(--gborder); box-shadow:var(--gshadow); aspect-ratio:4/5; background:var(--glass-soft); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur);}
.sambutan-photo .frame img{width:100%; height:100%; object-fit:cover; display:block;}
.sambutan-photo .deco{position:absolute; top:-16px; right:-14px; width:60px; height:60px; display:grid; place-items:center; font-size:26px;
  background:var(--grad-brand); border-radius:18px; box-shadow:var(--gshadow); color:#fff;}
.sambutan-photo .badge{position:absolute; left:50%; bottom:-16px; transform:translateX(-50%); white-space:nowrap;
  background:var(--glass-strong); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder);
  color:var(--brand-d); font-weight:800; font-size:12.5px; padding:9px 18px; border-radius:999px; box-shadow:var(--gshadow-sm);}
.sambutan-card{position:relative; padding:34px 34px 30px; background:var(--glass); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); border-radius:var(--r-lg); box-shadow:var(--gshadow);}
.sambutan-card .qmark{position:absolute; top:6px; left:22px; font-size:74px; line-height:1; color:rgba(99,102,241,.24); font-family:Georgia,serif;}
.sambutan-card p{color:#3c456f; line-height:1.75; margin:0 0 14px; font-size:15.4px; position:relative;}
.sambutan-card p:first-of-type{margin-top:14px;}
.sambutan-sign{display:flex; align-items:center; gap:14px; margin-top:20px;}
.sambutan-sign .line{width:46px; height:4px; border-radius:4px; background:var(--grad-brand);}
.sambutan-sign b{display:block; color:var(--ink); font-size:15px;}
.sambutan-sign span{display:block; color:var(--muted); font-size:12.6px;}

/* ============ VISI MISI ============ */
.vm-grid{display:grid; grid-template-columns:1fr 1fr; gap:26px; align-items:start;}
.visi-card{position:relative; overflow:hidden; padding:34px 30px; border-radius:var(--r-lg); color:#fff;
  background:var(--grad-brand); box-shadow:0 16px 40px rgba(124,58,237,.34); border:1px solid rgba(255,255,255,.25);}
.visi-card .ring{position:absolute; width:220px; height:220px; border-radius:50%; border:26px solid rgba(255,255,255,.12); top:-70px; right:-60px;}
.visi-card .ic{font-size:34px; margin-bottom:12px;}
.visi-card h3{font-size:24px; font-weight:800; margin:0 0 12px;}
.visi-card p{line-height:1.7; font-size:15.4px; color:rgba(255,255,255,.94); margin:0; position:relative;}
.misi-list{display:flex; flex-direction:column; gap:14px;}
.misi-item{display:flex; gap:15px; align-items:flex-start; padding:18px 20px; background:var(--glass); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); border-radius:var(--r-md); box-shadow:var(--gshadow-sm); transition:transform .25s, box-shadow .25s;}
.misi-item:hover{transform:translateX(6px); box-shadow:var(--gshadow);}
.misi-item .num{flex:0 0 34px; width:34px; height:34px; border-radius:12px; display:grid; place-items:center; font-weight:800; color:#fff; background:var(--grad-cool); box-shadow:var(--gshadow-sm);}
.misi-item p{margin:0; color:#3c456f; line-height:1.6; font-size:14.6px;}

/* ============ CALENDAR ============ */
.cal-tabs{display:flex; flex-wrap:wrap; gap:10px; justify-content:center; margin-bottom:18px;}
.cal-tab{cursor:pointer; font-family:var(--pjs); font-weight:800; font-size:13.5px; color:var(--brand-d);
  padding:10px 20px; border-radius:999px; border:var(--gborder); background:var(--glass-strong); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); box-shadow:var(--gshadow-sm);
  transition:transform .2s, box-shadow .2s, color .2s;}
.cal-tab:hover{transform:translateY(-2px);}
.cal-tab.active{color:#fff; background:var(--grad-brand); border-color:transparent; box-shadow:0 10px 24px rgba(124,58,237,.36);}
.cal-legend{display:flex; flex-wrap:wrap; gap:14px; justify-content:center; margin-bottom:26px;}
.cal-legend .lg{display:inline-flex; align-items:center; gap:7px; font-size:12.8px; font-weight:700; color:var(--muted);}
.cal-legend .dot{width:12px; height:12px; border-radius:50%; box-shadow:0 0 0 3px rgba(255,255,255,.6);}
.cal-months{display:grid; grid-template-columns:repeat(auto-fill,minmax(230px,1fr)); gap:18px;}
.cal-month{background:var(--glass); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); border-radius:var(--r-md); box-shadow:var(--gshadow-sm); padding:16px 16px 18px;}
.cal-month h4{text-align:center; margin:0 0 12px; font-size:15px; font-weight:800; color:var(--ink);}
.cal-dow{display:grid; grid-template-columns:repeat(7,1fr); gap:2px; margin-bottom:6px;}
.cal-dow span{text-align:center; font-size:10.5px; font-weight:700; color:#9aa2c4;}
.cal-days{display:grid; grid-template-columns:repeat(7,1fr); gap:3px;}
.cal-day{position:relative; aspect-ratio:1/1; display:flex; align-items:center; justify-content:center; font-size:12.5px; font-weight:600; color:#5a6392; border-radius:10px;}
.cal-day.pad{visibility:hidden;}
.cal-day.on{cursor:pointer; color:#1e2350; font-weight:800; background:rgba(255,255,255,.55); box-shadow:inset 0 0 0 1px rgba(99,102,241,.18); transition:transform .18s, box-shadow .18s;}
.cal-day.on:hover{transform:scale(1.14); z-index:5; box-shadow:0 8px 20px rgba(48,54,140,.24);}
.cal-day .dots{position:absolute; bottom:3px; left:0; right:0; display:flex; gap:2px; justify-content:center;}
.cal-day .dots i{width:5px; height:5px; border-radius:50%;}
/* hover popup */
#calPopup{position:fixed; z-index:9999; pointer-events:none; min-width:190px; max-width:260px; padding:12px 14px;
  background:rgba(20,26,58,.86); -webkit-backdrop-filter:blur(10px); backdrop-filter:blur(10px); color:#fff; border-radius:14px;
  box-shadow:0 18px 40px rgba(10,14,40,.4); border:1px solid rgba(255,255,255,.14); opacity:0; transform:translateY(6px) scale(.96); transition:opacity .16s, transform .16s;}
#calPopup.show{opacity:1; transform:translateY(0) scale(1);}
#calPopup .pt{font-weight:800; font-size:13px; margin-bottom:7px; display:flex; align-items:center; gap:6px;}
#calPopup .row{display:flex; align-items:center; gap:8px; font-size:12px; margin:4px 0; color:#dfe3ff;}
#calPopup .row{align-items:flex-start;}
#calPopup .row i{width:9px; height:9px; border-radius:50%; flex:0 0 9px; margin-top:3px;}
#calPopup .row .tx{min-width:0;}
#calPopup .row .lb{font-weight:700; color:#fff;}
#calPopup .row .rg{font-size:11px; opacity:.82; margin-top:1px;}
#calPopup .gl{font-size:11px; opacity:.75; font-weight:600;}
.cal-note{display:flex; gap:12px; align-items:flex-start; margin-top:26px; padding:16px 18px; border-radius:var(--r-md);
  background:linear-gradient(135deg,rgba(245,158,11,.16),rgba(255,255,255,.4)); border:1px solid rgba(245,158,11,.4); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur);}
.cal-note .ic{font-size:20px;}
.cal-note p{margin:0; color:#6b4b12; font-size:13.6px; line-height:1.55;}
.cal-details{margin-top:20px;}
.cal-details summary{cursor:pointer; display:inline-flex; align-items:center; gap:8px; font-weight:800; color:var(--brand-d);
  background:var(--glass-strong); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); padding:11px 18px; border-radius:999px; box-shadow:var(--gshadow-sm); list-style:none;}
.cal-details summary::-webkit-details-marker{display:none;}
.cal-details[open] summary{margin-bottom:16px;}

/* ============ TESTIMONI ============ */
.testi-mask{position:relative; overflow:hidden; margin-top:8px; -webkit-mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent); mask-image:linear-gradient(90deg,transparent,#000 6%,#000 94%,transparent);}
.testi-track{display:flex; gap:20px; width:max-content; padding:14px 22px; animation:testiScroll 42s linear infinite;}
.testi-mask:hover .testi-track{animation-play-state:paused;}
@keyframes testiScroll{from{transform:translateX(0)}to{transform:translateX(-50%)}}
.testi-card{width:330px; flex:0 0 330px; padding:24px 24px 22px; border-radius:var(--r-lg); background:var(--glass); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); box-shadow:var(--gshadow);}
.testi-stars{color:#f5a524; font-size:15px; letter-spacing:2px; margin-bottom:10px;}
.testi-card p{color:#3c456f; line-height:1.65; font-size:14.6px; margin:0 0 18px;}
.testi-who{display:flex; align-items:center; gap:12px;}
.testi-av{width:46px; height:46px; border-radius:50%; display:grid; place-items:center; color:#fff; font-weight:800; font-size:15px; overflow:hidden; box-shadow:var(--gshadow-sm);}
.testi-av img{width:100%; height:100%; object-fit:cover;}
.testi-who b{display:block; color:var(--ink); font-size:14.6px;}
.testi-who span{display:block; color:var(--muted); font-size:12.4px;}

/* ============ KAMPUS + MAP ============ */
.kampus-grid{display:grid; grid-template-columns:1.05fr .95fr; gap:26px; align-items:stretch;}
.kolase{display:grid; grid-template-columns:1fr 1fr; gap:16px;}
.kmp{border-radius:var(--r-md); overflow:hidden; background:var(--glass); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); box-shadow:var(--gshadow-sm); transition:transform .28s, box-shadow .28s;}
.kmp:hover{transform:translateY(-5px); box-shadow:var(--gshadow);}
.kmp .ph{display:block; aspect-ratio:16/10; overflow:hidden; background:linear-gradient(135deg,#dbe4ff,#c7d2fe);}
.kmp .ph img{width:100%; height:100%; object-fit:cover; transition:transform .5s;}
.kmp:hover .ph img{transform:scale(1.08);}
.kmp .cap{padding:13px 15px 15px;}
.kmp .cap b{display:block; color:var(--ink); font-size:14.4px; margin-bottom:4px;}
.kmp .cap span{display:block; color:var(--muted); font-size:12.2px; line-height:1.5;}
.map-wrap{position:relative; border-radius:var(--r-lg); overflow:hidden; border:var(--gborder); box-shadow:var(--gshadow); min-height:360px; background:var(--glass);}
#campusMap{position:absolute; inset:0; width:100%; height:100%;}
.map-wrap .map-legend{position:absolute; z-index:600; left:12px; bottom:12px; display:flex; gap:12px; flex-wrap:wrap;
  background:var(--glass-strong); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); border-radius:12px; padding:8px 12px; box-shadow:var(--gshadow-sm);}
.map-legend .lg{display:inline-flex; align-items:center; gap:6px; font-size:11.5px; font-weight:700; color:var(--muted);}
.map-legend .dot{width:11px; height:11px; border-radius:50%;}
.clay-pin{width:30px; height:30px; border-radius:50% 50% 50% 2px; transform:rotate(45deg); display:grid; place-items:center; color:#fff; box-shadow:0 6px 14px rgba(20,26,58,.4); border:2px solid #fff;}
.clay-pin span{transform:rotate(-45deg); font-weight:800; font-size:13px;}
.leaflet-popup-content .pop b{color:var(--ink);} .leaflet-popup-content .pop a{color:var(--brand-d); font-weight:700;}

/* ============ SOCIAL LINKS ============ */
.social-grid{display:grid; grid-template-columns:repeat(auto-fit,minmax(160px,1fr)); gap:16px; margin-bottom:38px;}
.soc{display:flex; flex-direction:column; align-items:center; gap:4px; text-decoration:none; padding:22px 16px; border-radius:var(--r-lg);
  background:var(--glass); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); box-shadow:var(--gshadow-sm); transition:transform .28s, box-shadow .28s; position:relative; overflow:hidden;}
.soc:hover{transform:translateY(-6px); box-shadow:var(--gshadow);}
.soc .ic{width:54px; height:54px; border-radius:16px; display:grid; place-items:center; font-size:26px; margin-bottom:8px; color:#fff; box-shadow:var(--gshadow-sm);}
.soc b{color:var(--ink); font-size:15px;}
.soc span{color:var(--muted); font-size:12.4px;}
.soc .followers{margin-top:8px; font-weight:800; font-size:12px; color:#fff; padding:5px 14px; border-radius:999px;}
.soc.ig .ic{background:linear-gradient(45deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888);} .soc.ig .followers{background:#dc2743;}
.soc.tt .ic{background:linear-gradient(135deg,#25f4ee,#000,#fe2c55);} .soc.tt .followers{background:#000;}
.soc.yt .ic{background:#ff0000;} .soc.yt .followers{background:#ff0000;}
.soc.lc .ic{background:linear-gradient(135deg,#22c55e,#10b981);} .soc.lc .followers{background:#10b981;}

/* ============ HIGHLIGHTS + INSTAGRAM CAROUSEL ============ */
.hl-row,.ig-row{display:flex; gap:22px; align-items:stretch;}
.hl-intro,.ig-intro{flex:0 0 258px; max-width:258px; display:flex; flex-direction:column; align-items:center; justify-content:center; text-align:center; padding:34px 26px; border-radius:var(--r-lg); color:#fff; box-shadow:var(--gshadow); border:1px solid rgba(255,255,255,.22);}
.hl-intro{background:linear-gradient(160deg,#4f46e5,#7c3aed 55%,#ec4899);}
.ig-intro{background:linear-gradient(160deg,#7c3aed,#dc2743 60%,#f59e0b);}
.hl-intro-ic,.ig-intro-ic{width:70px; height:70px; border-radius:20px; background:rgba(255,255,255,.18); display:grid; place-items:center; font-size:32px; margin-bottom:18px;}
.hl-intro h3,.ig-intro h3{font-size:22px; font-weight:800; line-height:1.25; margin:0 0 12px;}
.hl-intro p,.ig-intro p{font-size:13px; line-height:1.6; color:rgba(255,255,255,.9); margin:0 0 22px;}
.hl-intro .clay-btn,.ig-intro .clay-btn{background:#fff; color:#4f46e5; box-shadow:0 8px 20px rgba(0,0,0,.18);}
.ig-intro .clay-btn{color:#c026a3;}
.hl-scroll-wrap,.ig-scroll-wrap{position:relative; flex:1; min-width:0;}
.hl-scroll,.ig-scroll{display:flex; gap:18px; overflow-x:auto; scroll-snap-type:x mandatory; padding:6px 4px 16px; scroll-behavior:smooth; scrollbar-width:none; -ms-overflow-style:none; -webkit-overflow-scrolling:touch;}
.hl-scroll::-webkit-scrollbar,.ig-scroll::-webkit-scrollbar{display:none;}
.hl-arrow{position:absolute; top:42%; z-index:6; width:40px; height:40px; border-radius:50%; border:var(--gborder); background:var(--glass-strong);
  -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); box-shadow:var(--gshadow-sm); color:var(--brand-d); font-size:22px; font-weight:800; cursor:pointer; display:grid; place-items:center; transition:transform .2s, background .2s; line-height:1;}
.hl-arrow:hover{transform:scale(1.1); background:#fff;}
.hl-arrow.left{left:-14px;} .hl-arrow.right{right:-14px;}
/* highlight card */
.hl-card{min-width:250px; max-width:250px; flex:0 0 250px; scroll-snap-align:start; display:flex; flex-direction:column; border-radius:var(--r-md); overflow:hidden; text-decoration:none;
  background:var(--glass-strong); -webkit-backdrop-filter:var(--blur); backdrop-filter:var(--blur); border:var(--gborder); box-shadow:var(--gshadow-sm); transition:transform .28s, box-shadow .28s;}
.hl-card:hover{transform:translateY(-6px); box-shadow:var(--gshadow);}
.hl-thumb{position:relative; height:150px; display:grid; place-items:center; overflow:hidden;}
.hl-thumb img{position:absolute; inset:0; width:100%; height:100%; object-fit:cover;}
.hl-emoji{font-size:44px;}
.hl-tag{position:absolute; top:10px; left:10px; z-index:2; font-size:11px; font-weight:800; color:#fff; background:rgba(20,26,58,.55); -webkit-backdrop-filter:blur(6px); backdrop-filter:blur(6px); padding:4px 11px; border-radius:999px;}
.hl-bd{padding:15px 16px 17px; display:flex; flex-direction:column; gap:8px; flex:1;}
.hl-date{font-size:11.5px; color:var(--muted); font-weight:600;}
.hl-title{font-size:14.4px; font-weight:800; color:var(--ink); line-height:1.4;}
.hl-go{margin-top:auto; color:var(--brand-d); font-weight:800; font-size:12.5px;}
/* instagram card */
.igc{min-width:280px; max-width:280px; flex:0 0 280px; scroll-snap-align:start; background:#fff; border-radius:var(--r-md); overflow:hidden; box-shadow:var(--gshadow-sm); border:var(--gborder); transition:transform .28s, box-shadow .28s;}
.igc:hover{transform:translateY(-6px); box-shadow:var(--gshadow);}
.igc-head{display:flex; align-items:center; gap:10px; padding:12px 14px 10px;}
.igc-ava{width:36px; height:36px; border-radius:50%; flex-shrink:0; display:grid; place-items:center; color:#fff; font-weight:800; font-size:12px; background:linear-gradient(45deg,#f09433,#dc2743,#bc1888);}
.igc-id{flex:1; min-width:0;}
.igc-id b{display:block; font-size:13px; color:#111827;}
.igc-id span{display:block; font-size:10.5px; color:#9ca3af; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;}
.igc-follow{flex-shrink:0; background:#eef2ff; color:#4f46e5; font-size:11px; font-weight:700; padding:6px 12px; border-radius:20px; text-decoration:none;}
.igc-media{display:block; text-decoration:none; position:relative; height:300px;}
.igc-media img{width:100%; height:100%; object-fit:cover; display:block; background:#f3f4f6;}
.igc-ph{width:100%; height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center; gap:14px; padding:24px; text-align:center; color:#fff;}
.igc-ph-ic{font-size:40px;}
.igc-ph-cap{font-size:13.5px; font-weight:700; line-height:1.5;}
.igc-body{padding:10px 14px 14px;}
.igc-acts{display:flex; align-items:center; gap:14px; margin-bottom:8px; color:#262626;}
.igc-acts svg{width:22px; height:22px;}
.igc-acts .sp{flex:1;}
.igc-likes{font-size:12.5px; color:#111827; margin-bottom:5px;}
.igc-likes b{font-weight:700;}
.igc-cap{font-size:12.8px; color:#262626; line-height:1.5;}
.igc-cap b{font-weight:700;}

/* ============ RESPONSIVE ============ */
@media (max-width: 900px){
  .sambutan-grid{grid-template-columns:1fr; gap:44px;}
  .sambutan-photo{max-width:320px; margin:0 auto;}
  .vm-grid{grid-template-columns:1fr;}
  .kampus-grid{grid-template-columns:1fr;}
  .map-wrap{min-height:320px;}
}
@media (max-width: 560px){
  .clay-section{padding:48px 0;}
  .campus-collage{grid-template-columns:repeat(2,1fr) !important; grid-auto-rows:1fr;}
  .kolase{grid-template-columns:1fr 1fr;}
  .testi-card{width:270px; flex-basis:270px;}
}
@media (max-width: 760px){
  .hl-row,.ig-row{flex-direction:column;}
  .hl-intro,.ig-intro{flex-basis:auto; max-width:none;}
  .hl-arrow{display:none;}
}

</style>
</head>
<body>

<!-- ================= 1. TOMBOL / BUTTON ================= -->
<div class="site-divider"></div>
<section class="sec-button" id="pmb-services">
  <div class="campus-collage" aria-hidden="true">
    <div class="cc"><img src="https://simaba.my.id/assets/img/KAMPUS1.png" alt="" loading="lazy"></div>
    <div class="cc"><img src="https://simaba.my.id/assets/img/KAMPUS2.png" alt="" loading="lazy"></div>
    <div class="cc"><img src="https://simaba.my.id/assets/img/KAMPUS3.png" alt="" loading="lazy"></div>
    <div class="cc"><img src="https://simaba.my.id/assets/img/KAMPUS4.png" alt="" loading="lazy"></div>
  </div>
  <div class="container">
    <div class="btnsec-head reveal">
      <img class="pmb-site-logo" data-pmb-logo src="" alt="Logo" hidden>
      <span class="clay-eyebrow">🎓 Selamat Datang Calon Mahasiswa</span>
      <h2 class="clay-title" data-pmb-text="portal_title">Penerimaan Mahasiswa Baru UNPAM</h2>
      <p class="clay-sub" data-pmb-text="portal_subtitle">Semua yang kamu butuhkan untuk mendaftar — pendaftaran online, cek kelulusan, hingga info biaya — ada di sini.</p>
    </div>

    <div class="grid">
      <a data-pmb-button="portal_online" href="https://rl-pmb.unpam.ac.id/" target="_blank" class="card blue">
        <div class="icon">🚀</div>
        <div class="title" data-pmb-label>Daftar Online</div>
        <div class="desc">Daftar Mahasiswa Baru melalui Website PMB.</div>
      </a>
      <div class="card purple" data-pmb-button="portal_gform" onclick="openPopup()">
        <div class="icon">📝</div>
        <div class="title" data-pmb-label>Daftar G-Form</div>
        <div class="desc">Klik untuk memilih lokasi Google Form.</div>
      </div>
      <a data-pmb-button="portal_disability" href="https://lld.unpam.ac.id/" target="_blank" class="card green">
        <div class="icon">♿</div>
        <div class="title" data-pmb-label>Daftar Disabilitas</div>
        <div class="desc">Daftar Mahasiswa Baru untuk Penyandang Disabilitas.</div>
      </a>
    </div>
    <div class="result-wrapper">
      <a data-pmb-button="portal_verify" href="https://pmbunpam.my.id/" target="_blank" class="btn-result">
        <div class="result-icon">🎓</div>
        <div class="result-text">
          <p class="result-title"><span data-pmb-label>Cek Hasil Verifikasi Pendaftaran</span>
            <span class="result-badge">Khusus Daftar GFORM</span>
            <span class="result-badge gel">Gelombang 3</span>
          </p>
          <p class="result-desc">Lihat hasil &amp; status verifikasi pendaftaran melalui Google Form di sini.</p>
        </div>
        <div class="result-arrow">➜</div>
      </a>
      <a data-pmb-button="portal_graduation" href="https://rl-pmb.unpam.ac.id/c_front/info_pmb" target="_blank" class="btn-result alt">
        <div class="result-icon">🏆</div>
        <div class="result-text">
          <p class="result-title"><span data-pmb-label>Cek Kelulusan Maba</span>
            <span class="result-badge gel">Semua Gelombang</span>
          </p>
          <p class="result-desc">Lihat pengumuman resmi kelulusan Mahasiswa Baru melalui Website PMB UNPAM.</p>
        </div>
        <div class="result-arrow">➜</div>
      </a>
    </div>
    <div class="divider">Layanan Lain</div>
    <div class="grid">
      <a data-pmb-button="portal_documents" href="https://pmb.unpam.ac.id/unduh-dokumen" target="_blank" class="card neutral">
        <div class="icon">📂</div>
        <div class="title">Unduh Dokumen</div>
        <div class="desc">Unduh dokumen-dokumen penting yang dibutuhkan.</div>
      </a>
      <a data-pmb-button="portal_exam_login" href="https://spmb.unpam.ac.id" target="_blank" class="card yellow">
        <div class="icon">🔐</div>
        <div class="title">Login Ujian</div>
        <div class="desc">Masuk ke sistem ujian PMB Unpam.</div>
      </a>
    </div>
  </div>

  <!-- POPUP G-FORM -->
  <div id="popup" class="popup-overlay" onclick="closePopup(event)">
    <div class="popup-box">
      <h3>Pilih Lokasi Pendaftaran</h3>
      <a href="https://forms.gle/3LVy23VRYXnr4xji6" target="_blank" class="btn-popup">📍 G-Form Unpam Tangerang Selatan</a>
      <a href="https://forms.gle/dppNMDyYYHa9m99s9" target="_blank" class="btn-popup green">📍 G-Form Unpam Kota Serang</a>
      <button class="close-btn" onclick="closePopup()">Tutup</button>
    </div>
  </div>
</section>


<!-- ================= SAMBUTAN KEPALA LEMBAGA ================= -->
<section class="clay-section" id="sambutan">
  <div class="clay-blob" style="width:320px;height:320px;background:#c4b5fd;top:8%;left:-70px;"></div>
  <div class="clay-wrap">
    <div class="clay-sec-head reveal">
      <span class="clay-eyebrow">👋 Sambutan</span>
      <h2 class="clay-title">Sambutan Kepala Lembaga PMB</h2>
    </div>
    <div class="sambutan-grid reveal">
      <div class="sambutan-photo">
        <div class="deco">🎓</div>
        <div class="frame"><img data-pmb-image="sambutan" src="https://simaba.my.id/assets/img/KepalaPMB.png" alt="Kepala Lembaga PMB UNPAM" loading="lazy"></div>
        <div class="badge">Kepala Lembaga PMB UNPAM</div>
      </div>
      <div class="sambutan-card">
        <div class="qmark">“</div>
        <p>Assalamu’alaikum warahmatullahi wabarakatuh. Salam sejahtera untuk kita semua. Selamat datang di laman resmi Penerimaan Mahasiswa Baru <b>Universitas Pamulang</b>.</p>
        <p>Universitas Pamulang hadir dengan komitmen menyediakan akses pendidikan tinggi yang <b>berkualitas dan terjangkau</b> bagi seluruh lapisan masyarakat, dijiwai nilai religiositas dan humanisme. Kami percaya setiap orang berhak mendapatkan pendidikan yang layak untuk membangun masa depan yang lebih baik.</p>
        <p>Melalui beragam jalur pendaftaran, fasilitas modern, serta biaya kuliah yang ringan tanpa uang gedung, kami mengajak Anda bergabung dan tumbuh bersama menuju peradaban yang gemilang. Sampai jumpa di kampus kebanggaan kita.</p>
        <div class="sambutan-sign">
          <span class="line"></span>
          <div><b>Kepala Lembaga PMB</b><span>Lembaga Pemasaran &amp; Penerimaan Mahasiswa Baru — UNPAM</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= VISI & MISI ================= -->
<section class="clay-section" id="visi-misi">
  <div class="clay-blob" style="width:300px;height:300px;background:#67e8f9;top:16%;right:-70px;"></div>
  <div class="clay-wrap">
    <div class="clay-sec-head reveal">
      <span class="clay-eyebrow">🎯 Arah &amp; Tujuan</span>
      <h2 class="clay-title">Visi &amp; Misi</h2>
      <p class="clay-sub">Landasan gerak Universitas Pamulang dalam menyediakan akses pendidikan tinggi bagi masyarakat luas.</p>
    </div>
    <div class="vm-grid reveal">
      <div class="visi-card">
        <div class="ring"></div>
        <div class="ic">🔭</div>
        <h3>Visi</h3>
        <p>Sebagai Universitas Pusat Pengembangan Peradaban yang Jaya dalam Menyediakan Akses Pendidikan Tinggi Bagi Masyarakat Luas dijiwai Religiositas dan Humanisme.</p>
      </div>
      <div class="misi-list">
        <div class="misi-item"><div class="num">1</div><p>Menyelenggarakan tata kelola pendidikan tinggi yang berkualitas dan terjangkau agar dapat diakses oleh masyarakat luas dijiwai religiositas dan humanisme.</p></div>
        <div class="misi-item"><div class="num">2</div><p>Menyelenggarakan pendidikan tinggi yang mengembangkan peradaban ilmu pengetahuan, teknologi, seni, dan budaya.</p></div>
        <div class="misi-item"><div class="num">3</div><p>Menyelenggarakan penelitian dan pengabdian kepada masyarakat yang memiliki inovasi, bernilai, dan berdampak bagi masyarakat.</p></div>
        <div class="misi-item"><div class="num">4</div><p>Menyelenggarakan kerja sama dengan para pemangku kepentingan untuk mendukung implementasi Tri Dharma Perguruan Tinggi.</p></div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 2. SPMB ================= -->
<section class="sec-spmb" id="pmb-spmb">
  <div class="container">
    <div class="photo-side">
      <img data-pmb-image="spmb" src="https://lppmb.web.id/p/assets/img/kolase2tr.png" alt="Kolase Mahasiswa">
    </div>
    <div class="content">
      <div class="kicker"><span class="dash"></span> TENTANG SPMB</div>
      <h1 data-pmb-text="spmb_title">Seleksi Penerimaan Mahasiswa Baru</h1>
      <p>
        Penerimaan Mahasiswa Baru (PMB) UNPAM Tahun Akademik 2025/2026 telah dibuka melalui beberapa jalur pendaftaran.<br>
        Calon mahasiswa dapat memilih Jalur Pendaftaran Online melalui Website, Online melalui G-Form, maupun Pendaftaran Offline secara langsung di kampus.<br>
        Selain itu, tersedia juga Jalur Bebas Tes Masuk bagi pendaftar yang memenuhi kriteria, yaitu memiliki nilai rata-rata ijazah (SMA/SMK/MA) di atas 88, pernah mengikuti SNBP, atau memiliki sertifikat prestasi perlombaan tingkat regional.
      </p>
      <a class="btn" data-pmb-button="spmb_exam_participants" href="https://pmb.unpam.ac.id/daftar-peserta-ujian" target="_blank"><span data-pmb-label>Cek Peserta Ujian SPMB</span></a>
     <!-- <a class="btn1" href="https://rl-pmb.unpam.ac.id/c_front/info_pmb" target="_blank">Cek Kelulusan Maba</a> -->
    </div>
  </div>
</section>

<!-- ================= 3. QUIZ ================= -->
<section class="sec-quiz" id="pmb-quiz">
  <div class="content" id="start-content">
    <img src="https://lppmb.web.id/p/assets/img/thinking.png" width="85" style="opacity:.9;margin-bottom:12px">
    <h3 data-pmb-text="quiz_title">🎓 Kamu cocoknya di prodi apa ya?</h3>
    <p>Pilih kampus terlebih dahulu sebelum memulai tes (30 soal psikologi).</p>
    <button class="btn-blue" onclick="selectCampus('Tangsel')">Unpam Tangsel</button>
    <button class="btn-green" onclick="selectCampus('Serang')">Unpam Serang</button>
    <div id="selected-campus" style="margin-top:12px;display:none;">
      <p style="margin-bottom:6px;">Kampus dipilih: <b id="campus-name"></b></p>
      <button class="btn-orange" onclick="startQuiz()">Mulai Quiz</button>
    </div>
  </div>

  <div id="modal-quiz">
    <div class="modal-box">
      <div class="progress-bar"><div id="progress-bar" class="progress"></div></div>
      <p id="progress-text" style="font-size:13px;text-align:right;color:#555;">Soal 0 dari 30</p>
      <h3 id="quiz-question" style="margin-top:0;"></h3>
      <div id="quiz-options" class="options"></div>
      <button class="btn-green" onclick="nextQuestion()" style="margin-top:12px;">Next ➜</button>
    </div>
  </div>

  <div id="modal-result" style="display:none; position:absolute; inset:0; background:rgba(0,0,0,0.55); justify-content:center; align-items:center; animation:fadeIn .35s ease;">
    <div class="modal-box">
      <h3>📊 Hasil Tes Kamu</h3>
      <p><b>Kamu cocok di prodi:</b></p>
      <div id="quiz-output" style="margin:10px 0; font-weight:700; font-size:16px;"></div>
      <a href="https://rl-pmb.unpam.ac.id/" target="_blank"><button class="btn-blue">Daftar Online PMB</button></a>
      <a href="https://docs.google.com/forms/d/e/1FAIpQLSc2h2we6UUAZgPRKoz0FFpThW14bGYqC-Q2L9YoJp_ZlEpTxQ/viewform" target="_blank"><button class="btn-orange">Daftar via Google Form</button></a>
    </div>
  </div>
</section>


<!-- ================= 4. JADWAL (KALENDER) ================= -->
<section class="sec-jadwal clay-section" id="jadwal">
  <div class="clay-blob" style="width:340px;height:340px;background:#c4b5fd;top:8%;right:-80px;"></div>
  <div class="clay-wrap">
    <div class="clay-sec-head reveal">
      <span class="clay-eyebrow">🗓️ Kalender PMB</span>
      <h2 class="clay-title" data-pmb-text="schedule_title">Tanggal-Tanggal Penting</h2>
      <p class="clay-sub">Tahun Akademik 2026/2027 — tersedia dalam <b>3 gelombang</b>. Arahkan kursor / sentuh tanggal berwarna untuk melihat keterangannya.</p>
    </div>
    <div class="cal-tabs reveal" id="calTabs"></div>
    <div class="cal-legend reveal" id="calLegend"></div>
    <div class="cal-months reveal" id="calMonths"></div>
    <div class="cal-note reveal">
      <div class="ic">⚠️</div>
      <p><b>Catatan:</b> Tidak ada perpanjangan waktu untuk setiap tahapan. Pastikan kamu mengikuti setiap jadwal tepat waktu.</p>
    </div>
    <details class="cal-details reveal">
      <summary>📋 Lihat tabel lengkap</summary>
      <div class="glass-card" style="overflow:hidden"><div class="overflow-x-auto scrollbar-hide"><table class="w-full min-w-[850px]">
            <thead>
              <tr class="bg-slate-50 border-b border-slate-100">
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider w-16">No</th>
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider w-24">Gel</th>
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider"><div class="flex flex-col items-center gap-1"><span class="iconify text-blue-500" data-icon="lucide:user-plus"></span> Pendaftaran</div></th>
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider"><div class="flex flex-col items-center gap-1"><span class="iconify text-indigo-500" data-icon="lucide:monitor-play"></span> SPMB (Online)</div></th>
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider"><div class="flex flex-col items-center gap-1"><span class="iconify text-amber-500" data-icon="lucide:megaphone"></span> Pengumuman</div></th>
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider"><div class="flex flex-col items-center gap-1"><span class="iconify text-emerald-500" data-icon="lucide:clipboard-check"></span> Registrasi</div></th>
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider"><div class="flex flex-col items-center gap-1"><span class="iconify text-rose-500" data-icon="lucide:users"></span> PKKMB</div></th>
                <th class="px-4 py-4 text-center text-xs font-bold text-slate-500 uppercase tracking-wider"><div class="flex flex-col items-center gap-1"><span class="iconify text-cyan-500" data-icon="lucide:printer"></span> Cetak KRS</div></th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
              <?php foreach ($scheduleData as $row): ?>
              <tr class="table-row-hover transition-colors duration-200">
                <td class="px-4 py-5 text-center"><span class="inline-flex items-center justify-center w-8 h-8 bg-slate-100 rounded-lg text-slate-600 font-bold text-sm"><?= $row['no'] ?></span></td>
                <td class="px-4 py-5 text-center"><div class="flex flex-col items-center gap-1"><span class="inline-flex items-center justify-center w-10 h-10 bg-gradient-to-br <?= $row['color'] === 'blue' ? 'from-blue-400 to-blue-600 shadow-blue-200' : ($row['color'] === 'indigo' ? 'from-indigo-400 to-indigo-600 shadow-indigo-200' : 'from-sky-400 to-sky-600 shadow-sky-200') ?> rounded-xl text-white font-bold text-sm shadow-lg"><?= $row['gel'] ?></span></div></td>
                <td class="px-4 py-4 text-center"><span class="text-sm font-semibold text-slate-700 bg-blue-50 px-3 py-1 rounded-lg border border-blue-100 inline-block"><?= $row['pendaftaran'] ?></span></td>
                <td class="px-4 py-4 text-center"><span class="text-sm font-semibold text-slate-700 bg-indigo-50 px-3 py-1 rounded-lg border border-indigo-100 inline-block"><?= $row['spmb_online'] ?></span></td>
                <td class="px-4 py-4 text-center"><span class="text-sm font-semibold text-slate-700 bg-amber-50 px-3 py-1 rounded-lg border border-amber-100 inline-block"><?= $row['pengumuman'] ?></span></td>
                <td class="px-4 py-4 text-center"><span class="text-sm font-semibold text-slate-700 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-100 inline-block"><?= $row['registrasi'] ?></span></td>
                <td class="px-4 py-4 text-center"><span class="text-sm font-semibold text-slate-700 bg-rose-50 px-3 py-1 rounded-lg border border-rose-100 inline-block"><?= $row['pkkmb'] ?></span></td>
                <td class="px-4 py-4 text-center"><span class="text-sm font-semibold text-slate-700 bg-cyan-50 px-3 py-1 rounded-lg border border-cyan-100 inline-block"><?= $row['cetak_krs'] ?></span></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table></div></div>
    </details>
  </div>
  <div id="calPopup"></div>
  <script>window.SCHEDULE = <?php echo json_encode($scheduleData); ?>;</script>
</section>


<!-- ================= 5. BIAYA ================= -->
<section class="sec-biaya bg-slate-50 font-sans relative overflow-hidden" id="pmb-biaya">
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-3xl transform translate-x-1/3 -translate-y-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-100/30 rounded-full blur-3xl transform -translate-x-1/3 translate-y-1/3"></div>
    <div class="absolute top-1/2 left-1/2 w-[300px] h-[300px] bg-violet-100/20 rounded-full blur-2xl transform -translate-x-1/2 -translate-y-1/2"></div>
  </div>
  <div class="relative z-10 py-8 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-10 animate-fade-in-up">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 tracking-tight mt-6" data-pmb-text="cost_title">Biaya Kuliah</h2>
        <p class="text-gray-500 mt-2">Semester Ganjil 2026/2027</p>
        <div class="flex flex-wrap items-center justify-center gap-3 mt-4">
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-emerald-50 border border-emerald-200 rounded-full text-xs font-medium text-emerald-700">Diskon 50% Formulir Gelombang 1 (Khusus Sarjana & Diploma)</span>
          <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 border border-blue-200 rounded-full text-xs font-medium text-blue-700"><span class="iconify" data-icon="lucide:sparkles"></span> 3 Gelombang Pendaftaran</span>
        </div>
      </div>
      <div class="flex flex-wrap justify-center gap-3 mb-8 animate-fade-in-up" style="animation-delay: 0.1s">
        <button onclick="switchTab('tangsel-s1')" id="tab-tangsel-s1" class="tab-button active group flex items-center gap-2 px-5 py-3 bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl font-semibold text-sm shadow-lg"><span class="iconify text-lg" data-icon="lucide:building-2"></span><span>S-1 Tangsel</span></button>
        <button onclick="switchTab('serang-s1')" id="tab-serang-s1" class="tab-button group flex items-center gap-2 px-5 py-3 bg-white border-2 border-gray-200 text-gray-600 rounded-xl font-semibold text-sm hover:border-indigo-300 hover:text-indigo-600"><span class="iconify text-lg" data-icon="lucide:landmark"></span><span>S-1 Serang</span></button>
        <button onclick="switchTab('tangsel-s2')" id="tab-tangsel-s2" class="tab-button group flex items-center gap-2 px-5 py-3 bg-white border-2 border-gray-200 text-gray-600 rounded-xl font-semibold text-sm hover:border-violet-300 hover:text-violet-600"><span class="iconify text-lg" data-icon="lucide:award"></span><span>S-2 Tangsel</span></button>
      </div>
      <?php foreach ($campusData as $key => $campus): ?>
      <div id="content-<?= $key ?>" class="tab-content <?= $key === 'tangsel-s1' ? 'active' : '' ?>">
        <div class="glass-card rounded-2xl shadow-xl shadow-blue-100/20 overflow-hidden">
          <div class="bg-gradient-to-r from-<?= $campus['color'] === 'blue' ? 'blue-600 via-blue-500 to-blue-600' : ($campus['color'] === 'indigo' ? 'indigo-600 via-indigo-500 to-indigo-600' : 'violet-600 via-violet-500 to-violet-600') ?> px-6 py-5">
            <div class="flex items-center justify-between">
              <div class="flex items-center gap-3">
                <div class="w-11 h-11 bg-white/20 rounded-xl flex items-center justify-center"><span class="iconify text-white text-xl" data-icon="<?= $campus['icon'] ?>"></span></div>
                <div><h3 class="text-white font-bold text-lg"><?= $campus['name'] ?></h3></div>
              </div>
              <div class="hidden sm:block"><span class="px-3 py-1 bg-white/20 rounded-lg text-white text-xs font-medium">Tahun Akademik 2026/2027</span></div>
            </div>
          </div>
          <div class="overflow-x-auto scrollbar-hide">
            <table class="w-full min-w-[800px]">
              <thead>
                <tr class="bg-slate-50 border-b border-slate-100">
                  <th class="px-4 py-4 text-center w-16"><span class="text-xs font-bold text-slate-500 uppercase">No</span></th>
                  <th class="px-4 py-4 text-left"><span class="text-xs font-bold text-slate-500 uppercase">Uraian Biaya</span></th>
                  <th class="px-4 py-4 text-center min-w-[140px]"><div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-blue-50 rounded-lg border border-blue-100"><span class="iconify text-blue-500" data-icon="lucide:users"></span><span class="text-xs font-bold text-blue-700 uppercase">Reguler A & B</span></div></th>
                  <th class="px-4 py-4 text-center min-w-[140px]"><div class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-violet-50 rounded-lg border border-violet-100"><span class="iconify text-violet-500" data-icon="lucide:crown"></span><span class="text-xs font-bold text-violet-700 uppercase"><?= $key === 'tangsel-s2' ? 'Reguler C' : ($key === 'serang-s1' ? 'Reguler CS' : 'Reguler CS & CK') ?></span></div></th>
                  <th class="px-4 py-4 text-left min-w-[180px]"><span class="text-xs font-bold text-slate-500 uppercase">Keterangan</span></th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-50">
                <?php foreach ($campus['items'] as $item): ?>
                <tr class="table-row-hover transition-all duration-200 <?= isset($item['highlight']) ? 'bg-blue-50/30' : '' ?>">
                  <td class="px-4 py-4 text-center"><span class="inline-flex items-center justify-center w-7 h-7 bg-slate-100 rounded-lg text-slate-600 font-bold text-xs"><?= $item['no'] ?></span></td>
                  <td class="px-4 py-4"><div class="flex items-center gap-2"><?php if (isset($item['discount']) && $item['discount']): ?><span class="flex-shrink-0 px-2 py-0.5 bg-amber-100 text-amber-700 text-[10px] font-bold rounded uppercase">Promo</span><?php endif; ?><span class="text-sm font-medium text-slate-700"><?= $item['uraian'] ?></span></div></td>
                  <td class="px-4 py-4 text-center"><?php if (isset($item['discount']) && $item['discount']): ?><div class="flex flex-col items-center gap-1"><span class="text-xs <?= isset($item['is_free']) ? 'discount-strike-red' : 'text-slate-400 discount-strike' ?>"><?= $item['ab'] ?></span><span class="price-badge text-sm font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-200"><?= $item['gel1_price'] ?></span></div><?php else: ?><span class="text-sm font-semibold text-slate-700 <?= isset($item['highlight']) ? 'bg-blue-100 px-3 py-1 rounded-lg' : '' ?>"><?= $item['ab'] ?></span><?php endif; ?></td>
                  <td class="px-4 py-4 text-center"><?php if (isset($item['discount']) && $item['discount']): ?><div class="flex flex-col items-center gap-1"><span class="text-xs <?= isset($item['is_free']) ? 'discount-strike-red' : 'text-slate-400 discount-strike' ?>"><?= $item['csck'] ?></span><span class="price-badge text-sm font-bold text-emerald-600 bg-emerald-50 px-3 py-1 rounded-lg border border-emerald-200"><?= $item['gel1_price'] ?></span><span class="text-[10px] text-amber-600 font-medium">Gel. 1</span></div><?php else: ?><span class="text-sm font-semibold text-slate-700 <?= isset($item['highlight']) ? 'bg-violet-100 px-3 py-1 rounded-lg' : '' ?>"><?= $item['csck'] ?></span><?php endif; ?></td>
                  <td class="px-4 py-4"><span class="text-xs text-slate-500 leading-relaxed"><?= $item['keterangan'] ?></span></td>
                </tr>
                <?php if (isset($item['sub_note'])): ?>
                <tr><td colspan="5" class="px-4 py-0"><div class="flex items-start gap-2 py-2.5 pl-9 border-l-2 border-amber-400 ml-3 bg-amber-50/60 rounded-r-lg"><span class="iconify text-amber-500 mt-0.5 flex-shrink-0" data-icon="lucide:info"></span><span class="text-xs text-amber-700 font-medium leading-relaxed"><?= $item['sub_note'] ?></span></div></td></tr>
                <?php endif; ?>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="bg-gradient-to-r from-slate-50 to-blue-50/50 px-6 py-4 border-t border-slate-100">
            <div class="flex items-start gap-3">
              <div class="flex-shrink-0 w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center"><span class="iconify text-white" data-icon="lucide:info"></span></div>
              <div class="flex-1">
                <h4 class="font-bold text-slate-800 text-sm mb-2">Biaya Registrasi Awal:</h4>
                <div class="grid sm:grid-cols-2 gap-3">
                  <div class="flex items-center gap-2 px-3 py-2 bg-white rounded-lg border border-blue-100"><span class="iconify text-blue-500" data-icon="lucide:check-circle-2"></span><span class="text-sm text-slate-600">Reguler A & B: <strong class="text-blue-700"><?= $campus['registrasi_awal']['ab'] ?></strong></span></div>
                  <div class="flex items-center gap-2 px-3 py-2 bg-white rounded-lg border border-violet-100"><span class="iconify text-violet-500" data-icon="lucide:check-circle-2"></span><span class="text-sm text-slate-600"><?= $key === 'tangsel-s2' ? 'Reguler C' : ($key === 'serang-s1' ? 'Reguler CS' : 'Reguler CS & CK') ?>: <strong class="text-violet-700"><?= $key === 'tangsel-s2' ? $campus['registrasi_awal']['c'] : ($key === 'serang-s1' ? $campus['registrasi_awal']['cs'] : $campus['registrasi_awal']['csck']) ?></strong></span></div>
                </div>
                <p class="text-xs text-slate-500 mt-2 italic">*<?= $campus['total_registrasi'] ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
      <div class="mt-8 glass-card rounded-2xl p-6 animate-fade-in-up" style="animation-delay: 0.3s">
        <div class="flex items-start gap-4">
          <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-amber-400 to-amber-500 rounded-xl flex items-center justify-center shadow-lg"><span class="iconify text-white text-xl" data-icon="lucide:alert-triangle"></span></div>
          <div>
            <h4 class="font-bold text-slate-800 mb-3">Catatan Penting:</h4>
            <ul class="space-y-2">
              <li class="flex items-start gap-2"><span class="iconify text-emerald-500 mt-0.5" data-icon="lucide:check-circle-2"></span><span class="text-sm text-slate-600"><strong class="text-slate-800">Bebas Uang Gedung</strong></span></li>
              <li class="flex items-start gap-2"><span class="iconify text-blue-500 mt-0.5" data-icon="lucide:check-circle-2"></span><span class="text-sm text-slate-600">Diskon 50% formulir hanya berlaku untuk <strong class="text-blue-700">Gelombang 1</strong> program Sarjana (S-1)</span></li>
              <li class="flex items-start gap-2"><span class="iconify text-rose-500 mt-0.5" data-icon="lucide:check-circle-2"></span><span class="text-sm text-slate-600">Detail biaya pendidikan persemester dapat diakses pada laman <a href="https://lak.unpam.ac.id" class="text-blue-700 font-semibold" target="_blank" rel="noopener noreferrer"> lak.unpam.ac.id </a></span></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 6. ROADMAP ================= -->
<section class="sec-roadmap" id="pmb-roadmap">
  <header>
    <h1>Alur Pendaftaran Mahasiswa Baru UNPAM</h1>
    <p>Dari pendaftaran akun hingga memperoleh Nomor Induk Mahasiswa (NIM)</p>
  </header>
  <div class="roadmap-wrapper">
    <div class="roadmap-grid">
      <div class="step"><div class="icon"><i class="fa fa-globe"></i></div><div class="text"><h3>Buka Website</h3><p><a href="https://pmb.unpam.ac.id" target="_blank">pmb.unpam.ac.id</a></p></div><div class="number">01</div></div>
      <div class="step"><div class="icon"><i class="fa fa-book"></i></div><div class="text"><h3>Baca Informasi</h3><p>Cermati informasi di website PMB UNPAM</p></div><div class="number">02</div></div>
      <div class="step"><div class="icon"><i class="fa fa-user-plus"></i></div><div class="text"><h3>Daftar Akun</h3><p><a href="https://rl-pmb.unpam.ac.id" target="_blank">Melalui Website PMB</a></p></div><div class="number">03</div></div>
      <div class="step"><div class="icon"><i class="fa fa-clipboard-list"></i></div><div class="text"><h3>Isi Formulir</h3><p>Isi data sesuai ijazah &amp; KTP</p></div><div class="number">04</div></div>
      <div class="step"><div class="icon"><i class="fa fa-upload"></i></div><div class="text"><h3>Unggah Berkas</h3><p>Upload KTP, KK, Ijazah, Transkrip, dll</p></div><div class="number">05</div></div>
      <div class="step"><div class="icon"><i class="fa fa-check-circle"></i></div><div class="text"><h3>Verifikasi</h3><p>Tunggu verifikasi PMB (bisa ke sekretariat PMB bila gagal)</p></div><div class="number">06</div></div>
      <div class="step"><div class="icon"><i class="fa fa-pen"></i></div><div class="text"><h3>Ujian SPMB</h3><p>Lakukan ujian sesuai tanggal yang ditentukan</p></div><div class="number">07</div></div>
      <div class="step"><div class="icon"><i class="fa fa-bullhorn"></i></div><div class="text"><h3>Pengumuman</h3><p>Cek hasil di website PMB UNPAM</p></div><div class="number">08</div></div>
      <div class="step"><div class="icon"><i class="fa fa-university"></i></div><div class="text"><h3>Registrasi &amp; Bayar</h3><p>Loket Keuangan / Bank BNI, BTN, Mandiri, BJB</p></div><div class="number">09</div></div>
      <div class="step"><div class="icon"><i class="fa fa-id-card"></i></div><div class="text"><h3>Dapat NIM</h3><p>Mahasiswa baru memperoleh Nomor Induk Mahasiswa</p></div><div class="number">10</div></div>
    </div>
  </div>
</section>



<!-- ================= TESTIMONI ================= -->
<section class="clay-section" id="testimoni">
  <div class="clay-blob" style="width:300px;height:300px;background:#f9a8d4;top:10%;left:-60px;"></div>
  <div class="clay-wrap">
    <div class="clay-sec-head reveal">
      <span class="clay-eyebrow">⭐ Kata Mereka</span>
      <h2 class="clay-title" data-pmb-text="testimonials_title">Cerita Mahasiswa &amp; Alumni</h2>
      <p class="clay-sub">Pengalaman nyata menempuh pendidikan di Universitas Pamulang.</p>
    </div>
  </div>
  <div class="testi-mask reveal">
    <div class="testi-track" id="testiTrack"><?php $__testi = array_merge($testimonials, $testimonials); foreach($__testi as $t):
    $__init = ''; $__parts = preg_split('/\s+/', trim($t['name'])); foreach(array_slice($__parts,0,2) as $__w){ $__init .= mb_substr($__w,0,1); }
    $__c = $t['color'] ?? '#6366f1'; ?>
  <div class="testi-card">
    <div class="testi-stars">★★★★★</div>
    <p>“<?= e_pmb($t['text']) ?>”</p>
    <div class="testi-who">
      <div class="testi-av" style="background:linear-gradient(145deg,<?= e_pmb($__c) ?>,<?= e_pmb($__c) ?>cc)"><?php if(!empty($t['photo'])): ?><img src="<?= e_pmb($t['photo']) ?>" alt="<?= e_pmb($t['name']) ?>"><?php else: ?><?= e_pmb(mb_strtoupper($__init)) ?><?php endif; ?></div>
      <div><b><?= e_pmb($t['name']) ?></b><span><?= e_pmb($t['prodi']) ?></span></div>
    </div>
  </div>
<?php endforeach; ?></div>
  </div>
</section>

<!-- ================= KAMPUS & PETA ================= -->
<section class="clay-section" id="kampus">
  <div class="clay-blob" style="width:320px;height:320px;background:#93c5fd;bottom:5%;left:-70px;"></div>
  <div class="clay-wrap">
    <div class="clay-sec-head reveal">
      <span class="clay-eyebrow">📍 Lokasi Kampus</span>
      <h2 class="clay-title" data-pmb-text="campus_title">Empat Kampus, Satu Keluarga Besar</h2>
      <p class="clay-sub">Temukan kampus UNPAM terdekat di Tangerang Selatan &amp; Kota Serang.</p>
    </div>
    <div class="kampus-grid reveal">
      <div class="kolase">
        <?php foreach ($lokasiCampuses as $lokasi_index => $lokasi_campus):
          $lokasi_name = isset($lokasi_campus['name']) ? $lokasi_campus['name'] : 'Kampus';
          $lokasi_address = isset($lokasi_campus['address']) ? $lokasi_campus['address'] : '';
          $lokasi_image = !empty($lokasi_campus['image']) ? $lokasi_campus['image'] : 'https://simaba.my.id/assets/img/KAMPUS' . ($lokasi_index + 1) . '.png';
          $lokasi_query = rawurlencode($lokasi_name . ' ' . $lokasi_address);
        ?>
        <div class="kmp"><a class="ph" href="https://maps.google.com/?q=<?php echo e_pmb($lokasi_query); ?>" target="_blank" rel="noopener"><img src="<?php echo e_pmb($lokasi_image); ?>" alt="<?php echo e_pmb($lokasi_name); ?>" loading="lazy"></a><div class="cap"><b><?php echo e_pmb($lokasi_name); ?></b><span><?php echo e_pmb($lokasi_address); ?></span></div></div>
        <?php endforeach; ?>
      </div>
      <div class="map-wrap">
        <div id="campusMap"></div>
        <div class="map-legend">
          <span class="lg"><span class="dot" style="background:#2f5bea"></span> Tangsel</span>
          <span class="lg"><span class="dot" style="background:#f5a524"></span> Serang</span>
          <span class="lg">🖱️ Klik pin untuk rute</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= HIGHLIGHTS (BERITA) ================= -->
<section class="clay-section" id="highlights">
  <div class="clay-blob" style="width:300px;height:300px;background:#a5b4fc;top:12%;right:-60px;"></div>
  <div class="clay-wrap">
    <div class="clay-sec-head reveal">
      <span class="clay-eyebrow">📰 Info Terbaru</span>
      <h2 class="clay-title" data-pmb-text="highlights_title">Highlights</h2>
      <p class="clay-sub">Berita, prestasi, dan info penting seputar PMB &amp; Universitas Pamulang.</p>
    </div>
    <div class="hl-row reveal">
      <div class="hl-intro">
        <div class="hl-intro-ic">📖</div>
        <h3>Baca Semua<br>Berita &amp; Info</h3>
        <p>Kumpulan kabar terbaru, tips, dan pengumuman resmi seputar Penerimaan Mahasiswa Baru UNPAM.</p>
        <a class="clay-btn" href="https://pmb.unpam.ac.id/informasi" target="_blank" rel="noopener">Berita Selengkapnya →</a>
      </div>
      <div class="hl-scroll-wrap">
        <button class="hl-arrow left" type="button" data-scroll="hlScroll" aria-label="Sebelumnya">‹</button>
        <div class="hl-scroll" id="hlScroll"><?php $__pal=[['#eef2ff','#dbe4ff'],['#ecfdf5','#d1fae5'],['#fff7ed','#ffedd5'],['#fdf2f8','#fce7f3'],['#eff6ff','#dbeafe']];
$__hi=0; foreach($highlights as $__h): $__pair=$__pal[$__hi % 5]; $__hi++;
  $__img=$__h['image'] ?? '';
  $__link=$__h['link'] ?? 'https://pmb.unpam.ac.id/informasi';
?>
  <a class="hl-card" href="<?= e_pmb($__link) ?>" target="_blank" rel="noopener">
    <div class="hl-thumb" style="background:linear-gradient(135deg,<?= $__pair[0] ?>,<?= $__pair[1] ?>)">
      <?php if($__img): ?><img src="<?= e_pmb($__img) ?>" alt="<?= e_pmb($__h['title']) ?>" loading="lazy"><?php else: ?><span class="hl-emoji"><?= $__h['emoji'] ?? '📰' ?></span><?php endif; ?>
      <span class="hl-tag"><?= e_pmb($__h['tag'] ?? 'Berita') ?></span>
    </div>
    <div class="hl-bd">
      <?php if(!empty($__h['date'])): ?><div class="hl-date"><?= e_pmb($__h['date']) ?></div><?php endif; ?>
      <div class="hl-title"><?= e_pmb($__h['title']) ?></div>
      <div class="hl-go">Baca selengkapnya →</div>
    </div>
  </a>
<?php endforeach; ?></div>
        <button class="hl-arrow right" type="button" data-scroll="hlScroll" aria-label="Berikutnya">›</button>
      </div>
    </div>
  </div>
</section>

<!-- ================= SOCIAL MEDIA + INSTAGRAM ================= -->
<section class="clay-section" id="sosmed">
  <div class="clay-blob" style="width:300px;height:300px;background:#f9a8d4;top:16%;left:-50px;"></div>
  <div class="clay-wrap">
    <div class="clay-sec-head reveal">
      <span class="clay-eyebrow">📲 Terhubung</span>
      <h2 class="clay-title" data-pmb-text="social_title">Ikuti Media Sosial Kami</h2>
      <p class="clay-sub">Info pendaftaran, tips, dan keseruan kampus — pantengin akun resmi <b>@pmb.unpam</b>.</p>
    </div>
    <div class="social-grid reveal">
      <a class="soc ig" href="https://www.instagram.com/pmb.unpam" target="_blank" rel="noopener"><div class="ic">📷</div><b>Instagram</b><span>@pmb.unpam</span><span class="followers">Follow</span></a>
      <a class="soc tt" href="https://www.tiktok.com/@pmb.unpam" target="_blank" rel="noopener"><div class="ic">🎵</div><b>TikTok</b><span>@pmb.unpam</span><span class="followers">Follow</span></a>
      <a class="soc yt" href="https://www.youtube.com/@officialpmbunpam" target="_blank" rel="noopener"><div class="ic">▶️</div><b>YouTube</b><span>@officialpmbunpam</span><span class="followers">Subscribe</span></a>
      <a class="soc lc" href="https://tanyapimbi.web.id/" target="_blank" rel="noopener"><div class="ic">💬</div><b>Live Chat</b><span>Tanya PMB</span><span class="followers">Chat</span></a>
    </div>
    <div class="clay-sec-head reveal" style="margin:8px auto 22px;">
      <span class="clay-chip">📸 Postingan Pilihan</span>
    </div>
    <div class="ig-row reveal">
      <div class="ig-intro">
        <div class="ig-intro-ic">📷</div>
        <h3>Postingan Pilihan<br>PMB UNPAM</h3>
        <p>Info paling update seputar pendaftaran langsung dari timeline Instagram kami.</p>
        <a class="clay-btn" href="https://www.instagram.com/pmb.unpam" target="_blank" rel="noopener">Follow Instagram →</a>
      </div>
      <div class="ig-scroll-wrap">
        <button class="hl-arrow left" type="button" data-scroll="igScroll" aria-label="Sebelumnya">‹</button>
        <div class="ig-scroll" id="igScroll"><?php foreach($igPosts as $__ig):
  $__img=$__ig['image'] ?? ''; $__link=$__ig['link'] ?? 'https://www.instagram.com/pmb.unpam';
  $__cap=$__ig['caption'] ?? ''; $__likes=$__ig['likes'] ?? '';
  $__grad=$__ig['color'] ?? 'linear-gradient(135deg,#f09433,#dc2743,#bc1888)';
?>
  <div class="igc">
    <div class="igc-head">
      <div class="igc-ava">PU</div>
      <div class="igc-id"><b>pmb.unpam</b><span>Penerimaan Mahasiswa Baru UNPAM</span></div>
      <a class="igc-follow" href="https://www.instagram.com/pmb.unpam" target="_blank" rel="noopener">Follow</a>
    </div>
    <a class="igc-media" href="<?= e_pmb($__link) ?>" target="_blank" rel="noopener">
      <?php if($__img): ?><img src="<?= e_pmb($__img) ?>" alt="<?= e_pmb($__cap) ?>" loading="lazy"><?php else: ?><span class="igc-ph" style="background:<?= $__grad ?>"><span class="igc-ph-ic">📷</span><span class="igc-ph-cap"><?= e_pmb($__cap) ?></span></span><?php endif; ?>
    </a>
    <div class="igc-body">
      <div class="igc-acts"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-1a5.5 5.5 0 1 0-7.8 7.8l1.1 1L12 21l7.7-7.6 1.1-1a5.5 5.5 0 0 0 0-7.8z"/></svg><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.5 8.5 0 0 1-11.9 7.8L3 21l1.7-6.1A8.5 8.5 0 1 1 21 11.5z"/></svg><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4 20-7z"/></svg><span class="sp"></span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg></div>
      <?php if($__likes!==''): ?><div class="igc-likes">Disukai oleh <b><?= e_pmb($__likes) ?></b> lainnya</div><?php endif; ?>
      <div class="igc-cap"><b>pmb.unpam</b> <?= e_pmb($__cap) ?></div>
    </div>
  </div>
<?php endforeach; ?></div>
        <button class="hl-arrow right" type="button" data-scroll="igScroll" aria-label="Berikutnya">›</button>
      </div>
    </div>
  </div>
</section>

<!-- ================= SCRIPTS ================= -->
<script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
<script>
/* ----- BUTTON popup ----- */
function openPopup(){document.getElementById("popup").style.display="flex";}
function closePopup(e){if(!e||e.target.id==="popup"){document.getElementById("popup").style.display="none";}}

/* ----- QUIZ ----- */
let campus=null, current=0, scores={};
const options=[{text:"Setuju",score:2},{text:"Netral",score:1},{text:"Tidak Setuju",score:0}];
const questions=[
  {q:"Saya merasa tertantang ketika harus memecahkan masalah yang rumit dan butuh logika.",mappingTangsel:["Teknik Informatika S1","Sistem Informasi S1","Matematika S1","Teknik Industri S1"],mappingSerang:["Sistem Komputer S1 - Serang","Matematika S1 - Serang","Sistem Informasi S1 - Serang"]},
  {q:"Saya senang menganalisis data, angka, dan mencari pola yang tersembunyi.",mappingTangsel:["Akuntansi S1","Matematika S1","Sistem Informasi S1"],mappingSerang:["Akuntansi S1 - Serang","Matematika S1 - Serang"]},
  {q:"Saya lebih suka pekerjaan yang terstruktur, rapi, dan mengikuti aturan.",mappingTangsel:["Administrasi Perkantoran D-3","Akuntansi S1","Ilmu Hukum S1"],mappingSerang:["Administrasi Negara S1 - Serang","Ilmu Hukum S1 - Serang"]},
  {q:"Saya mudah memahami hubungan antara teori dan penerapannya di dunia nyata.",mappingTangsel:["Teknik Industri S1","Teknik Mesin S1","Pend. Ekonomi S1"],mappingSerang:["Teknik Mesin S1 - Serang","Manajemen S1 - Serang"]},
  {q:"Saya suka menjelaskan sesuatu agar orang lain paham.",mappingTangsel:["Pend. Guru Sekolah Dasar S1","Pend. Ekonomi S1","Manajemen Pendidikan Islam S1","Ilmu Komunikasi S1"],mappingSerang:["Administrasi Negara S1 - Serang"]},
  {q:"Saya senang berinteraksi, berdiskusi, dan bertukar pikiran dengan banyak orang.",mappingTangsel:["Ilmu Komunikasi S1","Manajemen S1","Pend. Jasmani S1"],mappingSerang:["Manajemen S1 - Serang","Ilmu Pemerintahan S1 - Serang"]},
  {q:"Saya cenderung berpikir logis dan sistematis dalam mengambil keputusan.",mappingTangsel:["Teknik Informatika S1","Akuntansi S1","Manajemen S1"],mappingSerang:["Sistem Informasi S1 - Serang","Manajemen S1 - Serang"]},
  {q:"Saya tertarik memahami bagaimana suatu organisasi berjalan dengan efektif.",mappingTangsel:["Manajemen S1","Manajemen Pendidikan Islam S1","Teknik Industri S1"],mappingSerang:["Administrasi Negara S1 - Serang","Ilmu Pemerintahan S1 - Serang"]},
  {q:"Saya suka kegiatan yang membutuhkan ketelitian dan fokus tinggi.",mappingTangsel:["Akuntansi S1","Teknik Kimia S1","Administrasi Perkantoran D-3"],mappingSerang:["Kimia S1 - Serang","Akuntansi S1 - Serang"]},
  {q:"Saya sering punya ide untuk membuat sesuatu lebih efisien atau lebih praktis.",mappingTangsel:["Teknik Industri S1","Teknik Informatika S1","Sistem Informasi S1"],mappingSerang:["Sistem Informasi S1 - Serang","Sistem Komputer S1 - Serang"]},
  {q:"Saya senang membantu orang lain memahami nilai-nilai moral dan kebangsaan.",mappingTangsel:["Pend. Pancasila dan Kewarganegaraan S1","Manajemen Pendidikan Islam S1"],mappingSerang:["Administrasi Negara S1 - Serang"]},
  {q:"Saya suka mencari tahu alasan di balik sebuah fenomena alam atau sosial.",mappingTangsel:["Teknik Kimia S1","Matematika S1","Manajemen S1"],mappingSerang:["Biologi S1 - Serang","Kimia S1 - Serang"]},
  {q:"Saya merasa nyaman saat harus berbicara di depan orang banyak.",mappingTangsel:["Ilmu Komunikasi S1","Pend. Guru Sekolah Dasar S1","Sastra Inggris S1"],mappingSerang:["Administrasi Negara S1 - Serang"]},
  {q:"Saya tertarik dengan budaya dan cara orang berkomunikasi di berbagai tempat.",mappingTangsel:["Sastra Inggris S1","Sastra Indonesia S1","Ilmu Komunikasi S1"],mappingSerang:[]},
  {q:"Saya cenderung berpikir terencana dan suka membuat daftar tugas.",mappingTangsel:["Administrasi Perkantoran D-3","Manajemen S1","Akuntansi Perpajakan Sarjana Terapan"],mappingSerang:["Manajemen S1 - Serang"]},
  {q:"Saya suka hal-hal yang berhubungan dengan sistem listrik atau teknologi alat.",mappingTangsel:["Teknik Elektro S1","Teknik Mesin S1"],mappingSerang:["Teknik Elektro S1 - Serang","Teknik Mesin S1 - Serang"]},
  {q:"Saya tertarik dengan dunia industri dan proses produksinya.",mappingTangsel:["Teknik Industri S1","Teknik Mesin S1"],mappingSerang:["Teknik Mesin S1 - Serang"]},
  {q:"Saya senang menganalisis perilaku manusia dan cara berpikir orang lain.",mappingTangsel:["Ilmu Komunikasi S1","Manajemen Pendidikan Islam S1","Pend. Guru Sekolah Dasar S1"],mappingSerang:["Ilmu Pemerintahan S1 - Serang"]},
  {q:"Saya merasa puas jika pekerjaan saya membantu masyarakat atau banyak orang.",mappingTangsel:["Pend. Jasmani S1","Manajemen Pendidikan Islam S1","Pend. Guru Sekolah Dasar S1"],mappingSerang:["Administrasi Negara S1 - Serang","Ilmu Pemerintahan S1 - Serang"]},
  {q:"Saya tertarik dengan konsep keadilan dan peraturan yang mengatur kehidupan bersama.",mappingTangsel:["Ilmu Hukum S1","Pend. Pancasila dan Kewarganegaraan S1"],mappingSerang:["Ilmu Hukum S1 - Serang"]},
  {q:"Saya suka mengamati detail kecil yang mungkin terlewat oleh orang lain.",mappingTangsel:["Akuntansi S1","Administrasi Perkantoran D-3","Teknik Kimia S1"],mappingSerang:["Kimia S1 - Serang","Akuntansi S1 - Serang"]},
  {q:"Saya suka hal-hal yang bisa saya ukur, hitung, atau bandingkan secara jelas.",mappingTangsel:["Matematika S1","Akuntansi S1","Teknik Industri S1"],mappingSerang:["Matematika S1 - Serang","Sistem Informasi S1 - Serang"]},
  {q:"Saya menikmati pekerjaan yang membutuhkan ketekunan dan konsistensi tinggi.",mappingTangsel:["Manajemen S1","Administrasi Perkantoran D-3","Akuntansi Perpajakan Sarjana Terapan"],mappingSerang:["Manajemen S1 - Serang","Administrasi Negara S1 - Serang"]},
  {q:"Saya lebih suka pekerjaan yang bisa menghasilkan sesuatu yang nyata atau bisa dilihat hasilnya.",mappingTangsel:["Teknik Mesin S1","Teknik Elektro S1","Teknik Kimia S1"],mappingSerang:["Teknik Mesin S1 - Serang","Teknik Elektro S1 - Serang","Kimia S1 - Serang"]},
  {q:"Saya suka mengeksplorasi hal-hal baru yang bisa membuat hidup lebih efektif.",mappingTangsel:["Teknik Informatika S1","Sistem Informasi S1","Manajemen S1"],mappingSerang:["Sistem Komputer S1 - Serang","Manajemen S1 - Serang"]},
  {q:"Saya tertarik dengan sistem pendidikan dan bagaimana membentuk karakter manusia.",mappingTangsel:["Manajemen Pendidikan Islam S1","Pend. Guru Sekolah Dasar S1","Pend. Ekonomi S1"],mappingSerang:[]},
  {q:"Saya suka bekerja sama dan memotivasi orang lain dalam satu kelompok.",mappingTangsel:["Manajemen S1","Pend. Jasmani S1","Pend. Guru Sekolah Dasar S1"],mappingSerang:["Manajemen S1 - Serang","Ilmu Pemerintahan S1 - Serang"]},
  {q:"Saya menikmati kegiatan yang membutuhkan kreativitas dalam penyampaian pesan.",mappingTangsel:["Ilmu Komunikasi S1","Sastra Indonesia S1","Sastra Inggris S1"],mappingSerang:[]},
  {q:"Saya lebih suka pekerjaan yang membutuhkan analisis dan perencanaan jangka panjang.",mappingTangsel:["Manajemen S1","Akuntansi S1","Teknik Industri S1"],mappingSerang:["Manajemen S1 - Serang","Sistem Informasi S1 - Serang"]},
  {q:"Saya senang mencari solusi yang logis, efisien, dan bisa diterapkan langsung.",mappingTangsel:["Teknik Informatika S1","Teknik Industri S1","Manajemen S1"],mappingSerang:["Sistem Komputer S1 - Serang","Manajemen S1 - Serang"]}
];
function selectCampus(c){campus=c;document.getElementById("campus-name").innerText="Unpam "+campus;document.getElementById("selected-campus").style.display="block";}
function startQuiz(){document.getElementById("modal-quiz").style.display="flex";showQuestion();}
function showQuestion(){
  document.getElementById("quiz-question").innerText="Q"+(current+1)+". "+questions[current].q;
  const container=document.getElementById("quiz-options");container.innerHTML="";
  options.forEach(opt=>{const lbl=document.createElement("label");lbl.innerHTML=`<input type="radio" name="q${current}" value="${opt.score}"> ${opt.text}`;container.appendChild(lbl);});
  const progress=((current+1)/questions.length)*100;
  document.getElementById("progress-bar").style.width=progress+"%";
  document.getElementById("progress-text").innerText="Soal "+(current+1)+" dari "+questions.length;
}
function nextQuestion(){
  const selected=document.querySelector(`input[name="q${current}"]:checked`);
  if(!selected){alert("Pilih jawaban dulu!");return;}
  const value=parseInt(selected.value);
  const mapping=(campus==="Tangsel")?questions[current].mappingTangsel:questions[current].mappingSerang;
  mapping.forEach(prodi=>{if(!scores[prodi])scores[prodi]=0;scores[prodi]+=value;});
  current++;
  if(current<questions.length){showQuestion();}else{finishQuiz();}
}
function finishQuiz(){
  document.getElementById("modal-quiz").style.display="none";
  document.getElementById("modal-result").style.display="flex";
  let sorted=Object.entries(scores).sort((a,b)=>b[1]-a[1]).slice(0,3);
  let output="";const medal=["🥇","🥈","🥉"];
  sorted.forEach((s,i)=>{output+=`${medal[i]} ${s[0]}<br>`;});
  document.getElementById("quiz-output").innerHTML=output;
  confetti({particleCount:120,spread:90,origin:{y:0.6}});
}

/* ----- BIAYA tabs ----- */
function switchTab(tabId){
  document.querySelectorAll('.tab-button').forEach(btn=>{
    btn.classList.remove('active','bg-gradient-to-r','from-blue-500','to-blue-600','text-white','shadow-lg');
    btn.classList.add('bg-white','border-2','border-gray-200','text-gray-600');
  });
  document.querySelectorAll('.tab-content').forEach(c=>c.classList.remove('active'));
  const activeBtn=document.getElementById('tab-'+tabId);
  activeBtn.classList.remove('bg-white','border-2','border-gray-200','text-gray-600');
  if(tabId==='tangsel-s1'){activeBtn.classList.add('active','bg-gradient-to-r','from-blue-500','to-blue-600','text-white','shadow-lg');}
  else if(tabId==='serang-s1'){activeBtn.classList.add('active','bg-gradient-to-r','from-indigo-500','to-indigo-600','text-white','shadow-lg');}
  else{activeBtn.classList.add('active','bg-gradient-to-r','from-violet-500','to-violet-600','text-white','shadow-lg');}
  document.getElementById('content-'+tabId).classList.add('active');
}
document.querySelectorAll('.tab-button').forEach(btn=>{
  btn.addEventListener('mouseenter',function(){if(!this.classList.contains('active')){this.style.transform='translateY(-2px)';}});
  btn.addEventListener('mouseleave',function(){if(!this.classList.contains('active')){this.style.transform='translateY(0)';}});
});

/* ===================== REVEAL ON SCROLL ===================== */
(function(){
  const io=new IntersectionObserver((es)=>{es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');io.unobserve(e.target);}});},{threshold:.12});
  document.querySelectorAll('.reveal').forEach(el=>io.observe(el));
})();

/* ===================== TESTIMONIALS (offline QA fallback) ===================== */
(function(){
  const track=document.getElementById('testiTrack'); if(!track) return;
  if(track.children.length>0) return; // index.php fills via PHP; only build in QA
  const data=[
    {n:'Rani Aprilia',p:'Manajemen S1',t:'Kuliah sambil kerja jadi gampang. Jadwalnya fleksibel dan biayanya benar-benar terjangkau. Dosennya juga suportif banget!',c:'#6366f1'},
    {n:'Dimas Prasetyo',p:'Teknik Informatika S1',t:'Fasilitas lab oke, materi update sama dunia industri. Proses pendaftarannya juga cepat dan jelas step-by-step-nya.',c:'#8b5cf6'},
    {n:'Siti Nurhaliza',p:'Akuntansi S1',t:'Dari daftar online sampai ujian SPMB semuanya rapi. Bangga bisa jadi bagian dari keluarga besar UNPAM.',c:'#06b6d4'},
    {n:'Bagus Santoso',p:'Ilmu Hukum S1',t:'Lokasi kampus strategis dan gampang dijangkau. Lingkungan belajarnya nyaman dan teman-temannya asik.',c:'#f59e0b'},
    {n:'Putri Maharani',p:'Ilmu Komunikasi S1',t:'Banyak kegiatan dan organisasi yang bikin soft skill berkembang. Rekomendasi banget buat kamu yang mau kuliah hemat!',c:'#ec4899'},
    {n:'Andi Wijaya',p:'Sistem Informasi S1 - Serang',t:'Kampus Serang makin lengkap. Pendaftaran dibantu tim PMB yang ramah, jadi nggak bingung sama sekali.',c:'#10b981'}
  ];
  function card(d){
    const initials=d.n.split(' ').slice(0,2).map(w=>w[0]).join('').toUpperCase();
    return `<div class="testi-card"><div class="testi-stars">\u2605\u2605\u2605\u2605\u2605</div><p>\u201c${d.t}\u201d</p><div class="testi-who"><div class="testi-av" style="background:linear-gradient(145deg,${d.c},${d.c}cc)">${initials}</div><div><b>${d.n}</b><span>${d.p}</span></div></div></div>`;
  }
  const html=data.map(card).join('');
  track.innerHTML=html+html;
})();

/* ===================== CAROUSEL ARROWS ===================== */
(function(){
  document.querySelectorAll('.hl-arrow').forEach(btn=>{
    btn.addEventListener('click',function(){
      const el=document.getElementById(this.dataset.scroll); if(!el) return;
      const amt=Math.max(260, el.clientWidth*0.8);
      el.scrollBy({left:this.classList.contains('left')?-amt:amt, behavior:'smooth'});
    });
  });
})();

/* ===================== CAMPUS MAP (Leaflet) ===================== */
(function(){
  const el=document.getElementById('campusMap'); if(!el || typeof L==='undefined') return;
  const campuses=<?php echo json_encode($mapCampuses, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT); ?>;
  const map=L.map(el,{scrollWheelZoom:false,zoomControl:true}).setView([-6.28,106.47],9);
  L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png',{maxZoom:19,attribution:'&copy; OpenStreetMap &copy; CARTO'}).addTo(map);
  const group=[];
  campuses.forEach((c,i)=>{
    const icon=L.divIcon({className:'',html:`<div class="clay-pin" style="background:linear-gradient(145deg,${c.c},${c.c}bb)"><span>${i+1}</span></div>`,iconSize:[30,30],iconAnchor:[15,28],popupAnchor:[0,-26]});
    const m=L.marker([c.lat,c.lng],{icon}).addTo(map);
    const dir=`https://www.google.com/maps/dir/?api=1&destination=${c.lat},${c.lng}`;
    m.bindPopup(`<div class="pop"><b>${c.n}</b><br><small>${c.a}</small><br><a href="${dir}" target="_blank" rel="noopener">\u27a4 Lihat rute</a></div>`);
    group.push([c.lat,c.lng]);
  });
  try{map.fitBounds(group,{padding:[40,40]});}catch(e){}
  setTimeout(()=>map.invalidateSize(),300);
})();

/* ===================== KALENDER + POPUP TIPIS ===================== */
(function(){
  const monthsEl=document.getElementById('calMonths');
  if(!monthsEl || !window.SCHEDULE) return;
  const tabsEl=document.getElementById('calTabs');
  const legendEl=document.getElementById('calLegend');
  const pop=document.getElementById('calPopup');
  const MN=['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
  const MMAP={};MN.forEach((m,i)=>MMAP[m.toLowerCase()]=i);
  const DOW=['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
  const PHASES=[
    {k:'pendaftaran',l:'Pendaftaran',c:'#3b82f6'},
    {k:'spmb_online',l:'SPMB (Online)',c:'#6366f1'},
    {k:'pengumuman',l:'Pengumuman',c:'#f59e0b'},
    {k:'registrasi',l:'Registrasi',c:'#10b981'},
    {k:'pkkmb',l:'PKKMB',c:'#f43f5e'},
    {k:'cetak_krs',l:'Cetak KRS',c:'#06b6d4'}
  ];
  function parseDate(s){const t=s.trim().split(/\s+/);return new Date(parseInt(t[2],10),MMAP[t[1].toLowerCase()],parseInt(t[0],10));}
  function parseRange(str){
    str=str.replace(/[\u2013\u2014]/g,'-');
    const parts=str.split('-').map(s=>s.trim());
    const end=parseDate(parts[parts.length-1]);
    if(parts.length===1) return {start:new Date(end),end:end};
    const tk=parts[0].split(/\s+/);
    let day=parseInt(tk[0],10),mo=end.getMonth(),yr=end.getFullYear();
    if(tk[1]!==undefined && MMAP[tk[1].toLowerCase()]!==undefined) mo=MMAP[tk[1].toLowerCase()];
    if(tk[2]!==undefined) yr=parseInt(tk[2],10);
    return {start:new Date(yr,mo,day),end:end};
  }
  const GELS=window.SCHEDULE.map(r=>{
    const ph=PHASES.map(p=>({...p,raw:r[p.k],rng:parseRange(r[p.k])}));
    return {no:r.no,gel:r.gel,label:r.gel_label,color:r.color,phases:ph};
  });
  function stripT(d){return new Date(d.getFullYear(),d.getMonth(),d.getDate());}
  function build(sel){
    const active = sel===-1 ? GELS : [GELS[sel]];
    let intervals=[];
    active.forEach(g=>g.phases.forEach(p=>{intervals.push({c:p.c,l:p.l,s:p.rng.start,e:p.rng.end,gel:g.gel,raw:p.raw});}));
    let min=intervals[0].s, max=intervals[0].e;
    intervals.forEach(iv=>{if(iv.s<min)min=iv.s;if(iv.e>max)max=iv.e;});
    monthsEl.innerHTML='';
    let y=min.getFullYear(),m=min.getMonth();
    const endY=max.getFullYear(),endM=max.getMonth();
    while(y<endY || (y===endY && m<=endM)){
      monthsEl.appendChild(monthCard(y,m,intervals));
      m++; if(m>11){m=0;y++;}
    }
    legendEl.innerHTML=PHASES.map(p=>`<span class="lg"><span class="dot" style="background:${p.c}"></span>${p.l}</span>`).join('');
  }
  function monthCard(y,m,intervals){
    const wrap=document.createElement('div');wrap.className='cal-month';
    const first=new Date(y,m,1).getDay();
    const days=new Date(y,m+1,0).getDate();
    let dow=DOW.map(d=>`<span>${d}</span>`).join('');
    let cells='';
    for(let i=0;i<first;i++) cells+='<div class="cal-day pad"></div>';
    for(let d=1;d<=days;d++){
      const cur=new Date(y,m,d);
      const hits=intervals.filter(iv=>cur>=stripT(iv.s)&&cur<=stripT(iv.e));
      if(hits.length){
        const seen={}; const rows=[];
        hits.forEach(h=>{const key=h.l+'|'+h.gel; if(!seen[key]){seen[key]=1; rows.push({l:h.l,c:h.c,gel:h.gel,raw:h.raw});}});
        const colors=[...new Set(rows.map(r=>r.c))].slice(0,4);
        const dots=colors.map(c=>`<i style="background:${c}"></i>`).join('');
        const info=encodeURIComponent(JSON.stringify({date:`${d} ${MN[m]} ${y}`,rows}));
        cells+=`<div class="cal-day on" tabindex="0" data-info="${info}">${d}<div class="dots">${dots}</div></div>`;
      } else {
        cells+=`<div class="cal-day">${d}</div>`;
      }
    }
    wrap.innerHTML=`<h4>${MN[m]} ${y}</h4><div class="cal-dow">${dow}</div><div class="cal-days">${cells}</div>`;
    return wrap;
  }
  // ---- thin popup that follows cursor / finger ----
  let activeCell=null;
  function renderPop(el){
    let d; try{ d=JSON.parse(decodeURIComponent(el.getAttribute('data-info'))); }catch(e){ return false; }
    pop.innerHTML=`<div class="pt">\uD83D\uDCC5 ${d.date}</div>`+d.rows.map(r=>`<div class="row"><i style="background:${r.c}"></i><div class="tx"><div class="lb">${r.l} <span class="gl">\u00b7 Gel ${r.gel}</span></div><div class="rg">${r.raw}</div></div></div>`).join('');
    return true;
  }
  function place(x,y){
    const pw=pop.offsetWidth, ph=pop.offsetHeight, vw=window.innerWidth, vh=window.innerHeight;
    let nx=x+14, ny=y+16;
    if(nx+pw>vw-10) nx=x-pw-14;
    if(ny+ph>vh-10) ny=y-ph-16;
    if(nx<8)nx=8; if(ny<8)ny=8;
    pop.style.left=nx+'px'; pop.style.top=ny+'px';
  }
  function show(el,x,y){ if(renderPop(el)){ pop.classList.add('show'); el.classList.add('act'); place(x,y);} }
  function hide(){ pop.classList.remove('show'); if(activeCell){activeCell.classList.remove('act'); activeCell=null;} }
  monthsEl.addEventListener('mouseover',e=>{const c=e.target.closest('.cal-day.on'); if(c){activeCell=c; show(c,e.clientX,e.clientY);}});
  monthsEl.addEventListener('mousemove',e=>{const c=e.target.closest('.cal-day.on'); if(c&&pop.classList.contains('show')) place(e.clientX,e.clientY);});
  monthsEl.addEventListener('mouseout',e=>{const c=e.target.closest('.cal-day.on'); if(c){const to=e.relatedTarget; if(!to||!to.closest||!to.closest('.cal-day.on')) hide();}});
  monthsEl.addEventListener('focusin',e=>{const c=e.target.closest('.cal-day.on'); if(c){activeCell=c; const r=c.getBoundingClientRect(); show(c,r.left+r.width/2,r.bottom);}});
  monthsEl.addEventListener('focusout',hide);
  monthsEl.addEventListener('touchstart',e=>{const c=e.target.closest('.cal-day.on'); if(c){activeCell=c; const t=e.touches[0]; show(c,t.clientX,t.clientY);}},{passive:true});
  document.addEventListener('touchstart',e=>{if(!e.target.closest||!e.target.closest('.cal-day.on')) hide();},{passive:true});
  window.addEventListener('scroll',hide,{passive:true});
  // ---- tabs ----
  let tabs='<button class="cal-tab active" data-i="-1">Semua Gelombang</button>';
  GELS.forEach((g,i)=>{tabs+=`<button class="cal-tab" data-i="${i}">Gelombang ${g.gel}</button>`;});
  tabsEl.innerHTML=tabs;
  tabsEl.querySelectorAll('.cal-tab').forEach(btn=>{
    btn.addEventListener('click',function(){
      tabsEl.querySelectorAll('.cal-tab').forEach(b=>b.classList.remove('active'));
      this.classList.add('active'); hide();
      build(parseInt(this.dataset.i,10));
    });
  });
  build(-1);
})();
</script>
<script src="assets/site.js?v=<?php echo PMB_VER; ?>"></script>
</body>
</html>
