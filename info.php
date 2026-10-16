<?php header("X-Frame-Options: ALLOWALL"); ?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Keunggulan SDM Dosen — Universitas Pamulang</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--accent:#2563EB;--bg:#F6F8FC;--glass:rgba(255,255,255,.72);--shadow:0 1px 2px rgba(16,24,40,.04),0 10px 28px rgba(16,24,40,.06);--r:22px;--maxw:1080px}
*{box-sizing:border-box}html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;color:var(--ink);background:var(--bg);line-height:1.6;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}
.orb.a{width:480px;height:480px;background:#DCE8FF;top:-170px;right:-120px}
.orb.b{width:420px;height:420px;background:#E0F2FE;bottom:-180px;left:-140px}
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:46px 22px 58px}
.phead{text-align:center;margin-bottom:26px}
.eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);background:#EAF1FE;padding:6px 14px;border-radius:999px}
.title{font-size:clamp(27px,4.8vw,40px);font-weight:800;letter-spacing:-.02em;color:var(--head);margin:15px 0 8px}
.subtitle{color:var(--muted);font-size:clamp(14px,2.4vw,16px);margin:0 auto;max-width:640px}
.stats{display:flex;flex-wrap:wrap;justify-content:center;gap:12px;margin-top:24px}
.stat{display:flex;align-items:center;gap:12px;padding:14px 20px;border-radius:16px}
.stat .n{font-size:24px;font-weight:800;color:var(--accent);letter-spacing:-.02em;line-height:1}
.stat .l{font-size:12.5px;color:var(--muted);font-weight:600;text-align:left;line-height:1.25}
.glass{background:var(--glass);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.toolbar{max-width:560px;margin:28px auto 6px}
.search{position:relative}
.search svg{position:absolute;left:16px;top:50%;transform:translateY(-50%);width:18px;height:18px;color:var(--faint)}
.search input{width:100%;padding:14px 16px 14px 46px;border:1px solid var(--line);border-radius:14px;background:rgba(255,255,255,.85);font:inherit;font-size:15px;color:var(--ink);outline:none;transition:border-color .2s,box-shadow .2s}
.search input::placeholder{color:var(--faint)}
.search input:focus{border-color:var(--accent);box-shadow:0 0 0 4px rgba(37,99,235,.12)}
.rescount{text-align:center;color:var(--faint);font-size:13px;margin:12px 0 22px}
.grid{column-count:2;column-gap:20px}
.fac{break-inside:avoid;margin:0 0 20px;border-radius:var(--r);padding:24px;display:inline-block;width:100%}
.fac-top{display:flex;gap:14px;align-items:flex-start}
.fac-ic{flex:0 0 auto;width:48px;height:48px;border-radius:14px;background:var(--cbg);color:var(--c);display:grid;place-items:center}
.fac-ic svg{width:24px;height:24px}
.fac-h h3{margin:0;font-size:17px;font-weight:800;color:var(--head);letter-spacing:-.01em;line-height:1.25}
.fac-h .tag{margin:5px 0 0;font-size:13px;font-weight:700;color:var(--c);font-style:italic;line-height:1.35}
.desc{margin:16px 0 4px;font-size:14px;color:#4B5563;line-height:1.65}
.block{margin-top:16px}
.block h4{margin:0 0 10px;font-size:11.5px;font-weight:800;letter-spacing:.06em;text-transform:uppercase;color:#64748B;display:flex;align-items:center;gap:8px}
.dot{width:6px;height:6px;border-radius:50%;background:var(--c);flex:0 0 auto}
.poin{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:8px}
.poin li{display:flex;gap:9px;align-items:flex-start;font-size:13.5px;color:#3F4A5A;line-height:1.5}
.poin li svg{width:16px;height:16px;color:var(--c);flex:0 0 auto;margin-top:2px}
.pills{display:flex;flex-wrap:wrap;gap:7px}
.pill{display:inline-block;padding:5px 12px;border-radius:999px;font-size:12.5px;font-weight:600;line-height:1.3}
.pill.pr{background:var(--cbg);color:var(--c);border:1px solid var(--cbd)}
.pill.kr{background:#F1F4F9;color:#475569}
.catatan{margin:18px 0 0;padding-top:15px;border-top:1px solid var(--line);display:flex;gap:9px;align-items:flex-start;font-size:12.5px;color:var(--muted);line-height:1.55;font-style:italic}
.catatan svg{width:15px;height:15px;color:var(--faint);flex:0 0 auto;margin-top:2px}
.empty{display:none;text-align:center;padding:50px 20px;color:var(--faint);font-size:15px}
.pfoot{text-align:center;color:var(--faint);font-size:13px;margin-top:26px}
@media(max-width:820px){.grid{column-count:1}}
@media(max-width:520px){.wrap{padding:34px 15px 46px}.fac{padding:20px}.stat{flex:1 1 100%;justify-content:center}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap">
  <header class="phead">
    <span class="eyebrow">Universitas Pamulang</span>
    <h1 class="title">Keunggulan SDM Dosen</h1>
    <p class="subtitle">Dosen dari kalangan akademisi dan praktisi yang menghadirkan pembelajaran aplikatif dan relevan dengan dunia nyata di setiap fakultas.</p>
    <div class="stats">
      <div class="stat glass"><span class="n">11</span><span class="l">Fakultas &amp;<br>Pascasarjana</span></div>
      <div class="stat glass"><span class="n">33</span><span class="l">Program<br>Studi</span></div>
      <div class="stat glass"><span class="n">40+</span><span class="l">Prospek<br>Karier</span></div>
    </div>
    <div class="toolbar"><div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg><input id="q" type="text" placeholder="Cari fakultas, program studi, atau karier..." autocomplete="off"></div></div>
    <div class="rescount" id="rc">Menampilkan 11 fakultas</div>
  </header>
  <div class="grid" id="grid">
<article class="fac glass" data-search="fakultas ekonomi dan bisnis dari ruang kelas menuju dunia bisnis nyata manajemen akuntansi administrasi perkantoran akuntansi perpajakan entrepreneur business analyst finance officer auditor konsultan bisnis" style="--c:#1565C0;--cbg:#e3edf7;--cbd:#c2d7ef">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="7" width="18" height="13" rx="2"/><path d="M8 7V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2M3 12h18"/></svg></span>
    <div class="fac-h"><h3>Fakultas Ekonomi dan Bisnis</h3><p class="tag">Dari Ruang Kelas Menuju Dunia Bisnis Nyata</p></div>
  </div>
  <p class="desc">Dosen tidak hanya mengajarkan teori manajemen dan akuntansi, tetapi juga membawa pengalaman praktik bisnis, pengelolaan keuangan, hingga kewirausahaan.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Belajar menyusun strategi bisnis berbasis kondisi pasar nyata</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Memahami laporan keuangan seperti yang digunakan di Perusahaan</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengembangkan ide usaha yang bisa langsung dijalankan</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Manajemen</span><span class="pill pr">Akuntansi</span><span class="pill pr">Administrasi Perkantoran</span><span class="pill pr">Akuntansi Perpajakan</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Entrepreneur</span><span class="pill kr">Business Analyst</span><span class="pill kr">Finance Officer</span><span class="pill kr">Auditor</span><span class="pill kr">Konsultan Bisnis</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Didukung oleh dosen dari kalangan akademisi dan praktisi di bidang Sumber Daya Manusia, Keuangan, dan Pemasaran, pembelajaran dirancang aplikatif dan sesuai dengan kebutuhan dunia bisnis modern.</span></p>
</article>
<article class="fac glass" data-search="fakultas hukum memahami hukum, menganalisis kasus, menjadi praktisi ilmu hukum advokat legal officer jaksa hakim konsultan hukum" style="--c:#0D47A1;--cbg:#e2e9f4;--cbd:#c0cfe7">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 4v16M8 20h8M5 7h14"/><path d="M5 7 2.5 13.5a3 3 0 0 0 6 0L5 7zM19 7l-2.5 6.5a3 3 0 0 0 6 0L19 7z"/></svg></span>
    <div class="fac-h"><h3>Fakultas Hukum</h3><p class="tag">Memahami Hukum, Menganalisis Kasus, Menjadi Praktisi</p></div>
  </div>
  <p class="desc">Dosen menghadirkan pembelajaran hukum yang tidak berhenti pada pasal, tetapi berkembang ke praktik hukum yang sesungguhnya.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Menganalisis kasus hukum nyata</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Berlatih menyusun argumentasi hukum seperti praktisi</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Memahami dinamika penegakan hukum di lapangan</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Ilmu Hukum</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Advokat</span><span class="pill kr">Legal Officer</span><span class="pill kr">Jaksa</span><span class="pill kr">Hakim</span><span class="pill kr">Konsultan Hukum</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen berasal dari akademisi dan praktisi hukum, menghadirkan pembelajaran berbasis teori dan praktik kasus nyata.</span></p>
</article>
<article class="fac glass" data-search="fakultas sastra bahasa sebagai keterampilan global sastra inggris sastra indonesia translator content writer diplomat public relations profesional komunikasi" style="--c:#1976D2;--cbg:#e3effa;--cbd:#c3dbf3">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M3 12h18M12 3c2.6 2.7 2.6 15.3 0 18M12 3c-2.6 2.7-2.6 15.3 0 18"/></svg></span>
    <div class="fac-h"><h3>Fakultas Sastra</h3><p class="tag">Bahasa sebagai Keterampilan Global</p></div>
  </div>
  <p class="desc">Dosen dengan pengalaman di bidang bahasa dan komunikasi global membimbing mahasiswa untuk tidak hanya fasih berbahasa, tetapi juga memahami konteks budaya.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Berlatih komunikasi profesional lintas Bahasa</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengembangkan kemampuan penerjemahan</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Memahami komunikasi dalam konteks global</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Sastra Inggris</span><span class="pill pr">Sastra Indonesia</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Translator</span><span class="pill kr">Content Writer</span><span class="pill kr">Diplomat</span><span class="pill kr">Public Relations</span><span class="pill kr">Profesional Komunikasi</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen berpengalaman di bidang bahasa dan budaya, membekali mahasiswa dengan kemampuan komunikasi global.</span></p>
</article>
<article class="fac glass" data-search="fakultas teknik mengubah konsep menjadi solusi nyata teknik mesin teknik industri teknik elektro teknik kimia engineer project manager industrial specialist teknisi profesional" style="--c:#0277BD;--cbg:#e1eff7;--cbd:#bddcee">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3.2"/><path d="M12 2v3M12 19v3M2 12h3M19 12h3M4.9 4.9l2.1 2.1M17 17l2.1 2.1M19.1 4.9 17 7M7 17l-2.1 2.1"/></svg></span>
    <div class="fac-h"><h3>Fakultas Teknik</h3><p class="tag">Mengubah Konsep Menjadi Solusi Nyata</p></div>
  </div>
  <p class="desc">Dosen membawa pengalaman rekayasa dan teknologi ke dalam kelas, sehingga mahasiswa terbiasa menyelesaikan masalah teknis secara langsung.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mendesain sistem Teknik</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Menghadapi simulasi masalah industry</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengembangkan solusi berbasis teknologi</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Teknik Mesin</span><span class="pill pr">Teknik Industri</span><span class="pill pr">Teknik Elektro</span><span class="pill pr">Teknik Kimia</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Engineer</span><span class="pill kr">Project Manager</span><span class="pill kr">Industrial Specialist</span><span class="pill kr">Teknisi Profesional</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen dari kalangan akademisi dan praktisi teknik menghadirkan pembelajaran berbasis proyek dan solusi nyata.</span></p>
</article>
<article class="fac glass" data-search="fakultas ilmu komputer menciptakan teknologi, bukan sekadar menggunakannya teknik informatika sistem informasi sistem komputer software developer data analyst ai engineer it consultant" style="--c:#00838F;--cbg:#e0f0f2;--cbd:#bddfe2">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="7" y="7" width="10" height="10" rx="1.5"/><path d="M9 2v3M15 2v3M9 19v3M15 19v3M2 9h3M2 15h3M19 9h3M19 15h3"/></svg></span>
    <div class="fac-h"><h3>Fakultas Ilmu Komputer</h3><p class="tag">Menciptakan Teknologi, Bukan Sekadar Menggunakannya</p></div>
  </div>
  <p class="desc">Dosen aktif dalam dunia teknologi digital, sehingga mahasiswa belajar langsung teknologi yang digunakan industri saat ini.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Membuat aplikasi dan sistem digital</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengolah data dan membangun solusi berbasis AI</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengembangkan produk teknologi</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Teknik Informatika</span><span class="pill pr">Sistem Informasi</span><span class="pill pr">Sistem Komputer</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Software Developer</span><span class="pill kr">Data Analyst</span><span class="pill kr">AI Engineer</span><span class="pill kr">IT Consultant</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen aktif di bidang teknologi digital, membimbing mahasiswa dalam pengembangan sistem dan inovasi teknologi.</span></p>
</article>
<article class="fac glass" data-search="fakultas keguruan dan ilmu pendidikan menjadi pendidik yang adaptif dan inspiratif ppkn pendidikan ekonomi pgsd penjas ppg guru profesional trainer konsultan pendidikan" style="--c:#283593;--cbg:#e5e7f2;--cbd:#c7cae3">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="13" height="9.5" rx="1.5"/><circle cx="18.5" cy="9" r="2"/><path d="M15 20a3.5 3.5 0 0 1 7 0"/></svg></span>
    <div class="fac-h"><h3>Fakultas Keguruan dan Ilmu Pendidikan</h3><p class="tag">Menjadi Pendidik yang Adaptif dan Inspiratif</p></div>
  </div>
  <p class="desc">Dosen dengan pengalaman pendidikan membimbing mahasiswa untuk menjadi guru yang tidak hanya mengajar, tetapi juga menginspirasi.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Merancang pembelajaran kreatif</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Menggunakan teknologi dalam Pendidikan</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengelola kelas secara profesional</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">PPKn</span><span class="pill pr">Pendidikan Ekonomi</span><span class="pill pr">PGSD</span><span class="pill pr">Penjas</span><span class="pill pr">PPG</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Guru Profesional</span><span class="pill kr">Trainer</span><span class="pill kr">Konsultan Pendidikan</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen berpengalaman dalam dunia pendidikan membentuk tenaga pendidik profesional dan adaptif.</span></p>
</article>
<article class="fac glass" data-search="fakultas mipa ilmu sebagai dasar inovasi matematika biologi kimia peneliti analis laboratorium data scientist akademisi" style="--c:#1565C0;--cbg:#e3edf7;--cbd:#c2d7ef">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M9 3h6M10 3v6l-5 8a2 2 0 0 0 1.7 3h10.6a2 2 0 0 0 1.7-3l-5-8V3M7.5 14h9"/></svg></span>
    <div class="fac-h"><h3>Fakultas MIPA</h3><p class="tag">Ilmu sebagai Dasar Inovasi</p></div>
  </div>
  <p class="desc">Dosen mengintegrasikan riset dan praktik ilmiah dalam pembelajaran, sehingga mahasiswa terbiasa berpikir kritis dan sistematis.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Melakukan eksperimen ilmiah</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Menganalisis data secara logis</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengembangkan solusi berbasis sains</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Matematika</span><span class="pill pr">Biologi</span><span class="pill pr">Kimia</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Peneliti</span><span class="pill kr">Analis Laboratorium</span><span class="pill kr">Data Scientist</span><span class="pill kr">Akademisi</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen mengintegrasikan riset dan praktik ilmiah dalam pembelajaran.</span></p>
</article>
<article class="fac glass" data-search="fakultas agama islam ilmu dan nilai dalam kehidupan nyata manajemen pendidikan islam ekonomi syariah pendidik islam konsultan syariah praktisi ekonomi syariah" style="--c:#00695C;--cbg:#e0edeb;--cbd:#bdd8d5">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2c2 2.5 4 3.5 4 6H8c0-2.5 2-3.5 4-6z"/><path d="M5 21v-9M19 21v-9M5 12a7 7 0 0 1 14 0M3.5 21h17M9.5 21v-3.5a2.5 2.5 0 0 1 5 0V21"/></svg></span>
    <div class="fac-h"><h3>Fakultas Agama Islam</h3><p class="tag">Ilmu dan Nilai dalam Kehidupan Nyata</p></div>
  </div>
  <p class="desc">Dosen mengintegrasikan ilmu keislaman dengan praktik kehidupan modern.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Memahami nilai Islam secara kontekstual</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengaplikasikan dalam kehidupan dan profesi</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengembangkan perspektif etis dalam bekerja</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Manajemen Pendidikan Islam</span><span class="pill pr">Ekonomi Syariah</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Pendidik Islam</span><span class="pill kr">Konsultan Syariah</span><span class="pill kr">Praktisi Ekonomi Syariah</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen mengintegrasikan nilai keislaman dengan pendekatan akademik modern.</span></p>
</article>
<article class="fac glass" data-search="fakultas ilmu komunikasi komunikasi yang mempengaruhi dan menginspirasi ilmu komunikasi desain komunikasi visual public relations content creator media strategist broadcaster" style="--c:#0277BD;--cbg:#e1eff7;--cbd:#bddcee">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="9" r="2"/><path d="M12 11v10M8.5 21h7M6.5 5.5a7 7 0 0 0 0 7M17.5 5.5a7 7 0 0 1 0 7M4.5 3.5a10 10 0 0 0 0 11M19.5 3.5a10 10 0 0 1 0 11"/></svg></span>
    <div class="fac-h"><h3>Fakultas Ilmu Komunikasi</h3><p class="tag">Komunikasi yang Mempengaruhi dan Menginspirasi</p></div>
  </div>
  <p class="desc">Dosen dengan pengalaman industri komunikasi membimbing mahasiswa memahami dunia media dan komunikasi digital.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengelola komunikasi public</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Membuat konten kreatif</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Menguasai strategi komunikasi digital</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Ilmu Komunikasi</span><span class="pill pr">Desain Komunikasi Visual</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Public Relations</span><span class="pill kr">Content Creator</span><span class="pill kr">Media Strategist</span><span class="pill kr">Broadcaster</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Didukung dosen akademisi dan praktisi di bidang media dan industri kreatif.</span></p>
</article>
<article class="fac glass" data-search="fakultas ilmu sosial dan ilmu politik memahami sistem, mengelola kebijakan administrasi negara ilmu pemerintahan asn analis kebijakan konsultan pemerintahan" style="--c:#1A237E;--cbg:#e4e5f0;--cbd:#c3c6dd">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M4 21v-9M9 21v-9M15 21v-9M20 21v-9M12 3 3.5 8h17z"/></svg></span>
    <div class="fac-h"><h3>Fakultas Ilmu Sosial dan Ilmu Politik</h3><p class="tag">Memahami Sistem, Mengelola Kebijakan</p></div>
  </div>
  <p class="desc">Dosen menghadirkan pembelajaran berbasis praktik pemerintahan dan kebijakan publik.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Menganalisis kebijakan public</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Memahami sistem birokrasi</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Mengelola administrasi pemerintahan</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Administrasi Negara</span><span class="pill pr">Ilmu Pemerintahan</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">ASN</span><span class="pill kr">Analis Kebijakan</span><span class="pill kr">Konsultan Pemerintahan</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen memahami praktik pemerintahan dan kebijakan publik.</span></p>
</article>
<article class="fac glass" data-search="program pascasarjana dari pembelajaran menuju kontribusi ilmiah hukum manajemen informatika akuntansi pendidikan akademisi peneliti konsultan profesional senior" style="--c:#01579B;--cbg:#e1ebf3;--cbd:#bdd3e5">
  <div class="fac-top">
    <span class="fac-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3 2 8l10 5 10-5-10-5zM6 10.5V15c0 1.7 2.7 3 6 3s6-1.3 6-3v-4.5M22 8v5"/></svg></span>
    <div class="fac-h"><h3>Program Pascasarjana</h3><p class="tag">Dari Pembelajaran Menuju Kontribusi Ilmiah</p></div>
  </div>
  <p class="desc">Dosen dengan pengalaman riset dan praktik membimbing mahasiswa menghasilkan karya ilmiah yang berdampak.</p>
  <div class="block"><h4><span class="dot"></span>Yang Dipelajari</h4><ul class="poin"><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Melakukan penelitian mendalam</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Menghasilkan publikasi ilmiah</span></li><li><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg><span>Berkontribusi pada pengembangan ilmu</span></li></ul></div>
  <div class="block"><h4><span class="dot"></span>Program Studi</h4><div class="pills"><span class="pill pr">Hukum</span><span class="pill pr">Manajemen</span><span class="pill pr">Informatika</span><span class="pill pr">Akuntansi</span><span class="pill pr">Pendidikan</span></div></div>
  <div class="block"><h4><span class="dot"></span>Prospek Karier</h4><div class="pills"><span class="pill kr">Akademisi</span><span class="pill kr">Peneliti</span><span class="pill kr">Konsultan</span><span class="pill kr">Profesional Senior</span></div></div>
  <p class="catatan"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Dosen berpengalaman dalam riset dan praktik profesional tingkat lanjut.</span></p>
</article>
  </div>
  <div class="empty" id="empty">Tidak ada fakultas atau program studi yang cocok dengan pencarian Anda.</div>
  <p class="pfoot">Universitas Pamulang &middot; Keunggulan Sumber Daya Manusia Dosen</p>
</main>
<script>
(function(){var q=document.getElementById('q'),grid=document.getElementById('grid'),rc=document.getElementById('rc'),empty=document.getElementById('empty');var cards=[].slice.call(grid.querySelectorAll('.fac'));var t;
function run(){var v=q.value.trim().toLowerCase();var n=0;cards.forEach(function(c){var ok=!v||c.getAttribute('data-search').indexOf(v)>-1;c.style.display=ok?'':'none';if(ok)n++;});rc.textContent=v?('Menampilkan '+n+' dari '+cards.length+' fakultas'):('Menampilkan '+cards.length+' fakultas');empty.style.display=n?'none':'block';grid.style.display=n?'':'none';}
q.addEventListener('input',function(){clearTimeout(t);t=setTimeout(run,140);});})();
</script>
<script src="assets/site.js?v=3.5"></script>
</body></html>
