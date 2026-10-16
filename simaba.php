<?php
require __DIR__ . '/config.php';
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
$scheduleData = pmb_content('schedule', $scheduleData);
$campusData = pmb_content('biaya', $campusData);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PMB UNPAM — Informasi Pendaftaran Mahasiswa Baru</title>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- Font Awesome (roadmap icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
</style>
</head>
<body>

<!-- ================= 1. TOMBOL / BUTTON ================= -->
<div class="site-divider"></div>
<section class="sec-button">
  <div class="container">
    <div class="grid">
      <a href="https://rl-pmb.unpam.ac.id/" target="_blank" class="card blue">
        <div class="icon">🚀</div>
        <div class="title">Daftar Online</div>
        <div class="desc">Daftar Mahasiswa Baru melalui Website PMB.</div>
      </a>
      <div class="card purple" onclick="openPopup()">
        <div class="icon">📝</div>
        <div class="title">Daftar G-Form</div>
        <div class="desc">Klik untuk memilih lokasi Google Form.</div>
      </div>
      <a href="https://lld.unpam.ac.id/" target="_blank" class="card green">
        <div class="icon">♿</div>
        <div class="title">Daftar Disabilitas</div>
        <div class="desc">Daftar Mahasiswa Baru untuk Penyandang Disabilitas.</div>
      </a>
    </div>
    <div class="result-wrapper">
      <a href="https://pmbunpam.my.id/" target="_blank" class="btn-result">
        <div class="result-icon">🎓</div>
        <div class="result-text">
          <p class="result-title">Cek Hasil Verifikasi Pendaftaran
            <span class="result-badge">Khusus Daftar GFORM</span>
            <span class="result-badge gel">Gelombang 3</span>
          </p>
          <p class="result-desc">Lihat hasil &amp; status verifikasi pendaftaran melalui Google Form di sini.</p>
        </div>
        <div class="result-arrow">➜</div>
      </a>
      <a href="https://rl-pmb.unpam.ac.id/c_front/info_pmb" target="_blank" class="btn-result alt">
        <div class="result-icon">🏆</div>
        <div class="result-text">
          <p class="result-title">Cek Kelulusan Maba
            <span class="result-badge gel">Semua Gelombang</span>
          </p>
          <p class="result-desc">Lihat pengumuman resmi kelulusan Mahasiswa Baru melalui Website PMB UNPAM.</p>
        </div>
        <div class="result-arrow">➜</div>
      </a>
    </div>
    <div class="divider">Layanan Lain</div>
    <div class="grid">
      <a href="https://pmb.unpam.ac.id/unduh-dokumen" target="_blank" class="card neutral">
        <div class="icon">📂</div>
        <div class="title">Unduh Dokumen</div>
        <div class="desc">Unduh dokumen-dokumen penting yang dibutuhkan.</div>
      </a>
      <a href="https://spmb.unpam.ac.id" target="_blank" class="card yellow">
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

<!-- ================= 2. SPMB ================= -->
<section class="sec-spmb">
  <div class="container">
    <div class="photo-side">
      <img src="https://lppmb.web.id/p/assets/img/kolase2tr.png" alt="Kolase Mahasiswa">
    </div>
    <div class="content">
      <div class="kicker"><span class="dash"></span> TENTANG SPMB</div>
      <h1>Seleksi Penerimaan Mahasiswa Baru</h1>
      <p>
        Penerimaan Mahasiswa Baru (PMB) UNPAM Tahun Akademik 2025/2026 telah dibuka melalui beberapa jalur pendaftaran.<br>
        Calon mahasiswa dapat memilih Jalur Pendaftaran Online melalui Website, Online melalui G-Form, maupun Pendaftaran Offline secara langsung di kampus.<br>
        Selain itu, tersedia juga Jalur Bebas Tes Masuk bagi pendaftar yang memenuhi kriteria, yaitu memiliki nilai rata-rata ijazah (SMA/SMK/MA) di atas 88, pernah mengikuti SNBP, atau memiliki sertifikat prestasi perlombaan tingkat regional.
      </p>
      <a class="btn" href="https://pmb.unpam.ac.id/daftar-peserta-ujian" target="_blank">Cek Peserta Ujian SPMB</a>
     <!-- <a class="btn1" href="https://rl-pmb.unpam.ac.id/c_front/info_pmb" target="_blank">Cek Kelulusan Maba</a> -->
    </div>
  </div>
</section>

<!-- ================= 3. QUIZ ================= -->
<section class="sec-quiz">
  <div class="content" id="start-content">
    <img src="https://lppmb.web.id/p/assets/img/thinking.png" width="85" style="opacity:.9;margin-bottom:12px">
    <h3>🎓 Kamu cocoknya di prodi apa ya?</h3>
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

<!-- ================= 4. JADWAL ================= -->
<section class="sec-jadwal bg-slate-50 font-sans relative overflow-hidden">
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-3xl transform translate-x-1/3 -translate-y-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-sky-100/30 rounded-full blur-3xl transform -translate-x-1/3 translate-y-1/3"></div>
  </div>
  <div class="relative z-10 py-8 px-4 sm:px-6">
    <div class="max-w-7xl mx-auto">
      <div class="text-center mb-8 animate-fade-in-up">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 tracking-tight mt-6">Tanggal-Tanggal Penting</h2>
        <p class="text-gray-500 mt-2">Tahun Akademik 2026/2027</p>
      </div>
      <div class="flex flex-wrap items-center justify-center gap-4 mb-8 animate-fade-in-up" style="animation-delay: 0.2s">
        <div class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-sm border border-gray-100">
          <span class="iconify text-blue-500" data-icon="lucide:waves"></span>
          <span class="text-sm font-medium text-gray-700">Total ada <strong>Tiga</strong> Gelombang!</span>
        </div>
        <div class="flex items-center gap-2 px-4 py-2 bg-white rounded-full shadow-sm border border-gray-100">
          <span class="iconify text-blue-500" data-icon="lucide:calendar"></span>
          <span class="text-sm font-medium text-gray-700">PMB Akademik <strong>2026</strong></span>
        </div>
      </div>
      <div class="glass-card rounded-2xl shadow-xl shadow-blue-100/20 overflow-hidden animate-fade-in-up" style="animation-delay: 0.3s">
        <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-4 border-b border-blue-400/30">
          <h3 class="text-white font-bold text-lg flex items-center gap-2">
            <span class="iconify" data-icon="lucide:calendar-check"></span> TANGGAL-TANGGAL PENTING
          </h3>
        </div>
        <div class="overflow-x-auto scrollbar-hide">
          <table class="w-full min-w-[850px]">
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
          </table>
        </div>
        <div class="bg-slate-50 px-6 py-3 border-t border-slate-100">
          <div class="flex items-center gap-2 text-slate-600">
            <span class="iconify text-red-500" data-icon="lucide:alert-circle"></span>
            <p class="text-xs font-medium"><strong>Catatan:</strong> Tidak ada perpanjangan waktu untuk setiap tahapan</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= 5. BIAYA ================= -->
<section class="sec-biaya bg-slate-50 font-sans relative overflow-hidden">
  <div class="absolute inset-0 overflow-hidden pointer-events-none">
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-100/40 rounded-full blur-3xl transform translate-x-1/3 -translate-y-1/3"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-indigo-100/30 rounded-full blur-3xl transform -translate-x-1/3 translate-y-1/3"></div>
    <div class="absolute top-1/2 left-1/2 w-[300px] h-[300px] bg-violet-100/20 rounded-full blur-2xl transform -translate-x-1/2 -translate-y-1/2"></div>
  </div>
  <div class="relative z-10 py-8 px-4 sm:px-6">
    <div class="max-w-6xl mx-auto">
      <div class="text-center mb-10 animate-fade-in-up">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 tracking-tight mt-6">Biaya Kuliah</h2>
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
<section class="sec-roadmap">
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
</script>
<script src="assets/site.js?v=3.5"></script>
</body>
</html>
