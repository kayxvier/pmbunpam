<?php
header('X-Frame-Options: ALLOWALL');
/**
 * Sambutan Kepala LPPMB — Universitas Pamulang
 * Ganti $FOTO dengan path/URL foto Kepala LPPMB.
 */
$FOTO = 'https://simaba.my.id/assets/img/KepalaPMB.png'; // ganti dengan path/URL foto lain bila perlu
function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sambutan Kepala LPPMB — Universitas Pamulang</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--brand:#243994;--brand2:#3554d1;--gold:#FCB302;--bg:#F6F8FC;--glass:rgba(255,255,255,.72);--shadow:0 1px 2px rgba(16,24,40,.04),0 12px 34px rgba(16,24,40,.07);--shadow-sm:0 4px 15px rgba(15,23,42,.05);--r:24px;--maxw:1100px}
*{box-sizing:border-box}html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;color:var(--ink);background:var(--bg);line-height:1.6;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}
.orb.a{width:480px;height:480px;background:#DCE8FF;top:-170px;right:-120px}
.orb.b{width:420px;height:420px;background:#FFF0D2;bottom:-180px;left:-140px;opacity:.45}
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:46px 22px 56px}
.phead{text-align:center;margin-bottom:34px}
.eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--brand);background:#EAF1FE;padding:6px 14px;border-radius:999px}
.title{font-size:clamp(28px,5.2vw,44px);font-weight:800;letter-spacing:-.02em;margin:15px 0 0;background:linear-gradient(90deg,#243994,#fcb302);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;color:#243994}
.tline{width:84px;height:5px;border-radius:999px;background:linear-gradient(90deg,#243994,#fcb302);margin:16px auto 12px}
.subtitle{color:var(--muted);font-size:clamp(14px,2.4vw,16px);margin:0 auto;max-width:560px}
.glass{background:var(--glass);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.sgrid{display:grid;grid-template-columns:330px 1fr;gap:36px;align-items:start}
.person{border-radius:var(--r);padding:26px 26px 28px;text-align:center;align-self:start;position:relative;overflow:hidden}
.person .glow{position:absolute;width:180px;height:180px;border-radius:50%;background:radial-gradient(circle,rgba(252,179,2,.28),transparent 70%);top:-30px;right:-30px;filter:blur(8px);animation:float 6s ease-in-out infinite}
.frame{position:relative;z-index:1;width:100%;max-width:250px;margin:6px auto 0;aspect-ratio:3/4;border-radius:104px 20px 104px 20px;overflow:hidden;border:6px solid #fff;box-shadow:0 18px 40px rgba(36,57,148,.20);background:linear-gradient(160deg,#EAF1FE,#DCE8FF);transition:transform .3s ease,box-shadow .3s ease}
.person:hover .frame{transform:translateY(-4px);box-shadow:0 24px 50px rgba(36,57,148,.28)}
.ph-fallback{position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:2px;color:#9db6e8}
.ph-fallback .sil{width:92px;height:92px;opacity:.85}
.ph-init{font-size:34px;font-weight:800;color:#B7C6E8;letter-spacing:.06em}
.frame img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 15%;display:block}
.pname{font-size:21px;font-weight:800;color:var(--brand);margin:20px 0 0;line-height:1.3;letter-spacing:-.01em}
.prole{display:inline-block;margin-top:10px;font-size:13px;font-weight:700;color:#8a6300;background:linear-gradient(90deg,#FFF3D6,#FFE7AE);padding:6px 14px;border-radius:999px;border:1px solid #F5D98A}
.pchip{margin-top:14px;display:inline-flex;align-items:center;gap:7px;font-size:12px;font-weight:600;color:var(--muted);background:rgba(255,255,255,.6);border:1px solid var(--line);padding:6px 13px;border-radius:999px}
.pchip b{color:var(--brand);font-weight:800}
.speech{border-radius:var(--r);padding:40px 42px}
.salam{font-size:17px;font-weight:800;color:var(--brand);margin:0 0 4px}
.speech .body{display:flex;flex-direction:column;gap:15px;margin-top:16px}
.speech .body p{margin:0;color:#4b5563;font-size:15.5px;line-height:1.85;text-align:justify}
.squote{position:relative;margin:8px 0;padding:26px 28px 26px 30px;background:linear-gradient(135deg,#243994,#3554d1);border-left:6px solid var(--gold);border-radius:16px;color:#fff;box-shadow:0 14px 32px rgba(36,57,148,.26)}
.squote .qic{position:absolute;top:16px;right:18px;width:40px;height:40px;color:rgba(255,255,255,.22)}
.speech .body .squote p{margin:0;font-size:16.5px;font-style:italic;line-height:1.7;color:#fff !important;text-align:left}
.salam-end{font-size:17px;font-weight:800;color:var(--brand);margin:22px 0 0}
.sign{margin-top:14px;padding-top:16px;border-top:1px dashed #DBE3F1}
.sign .n{font-size:15px;font-weight:800;color:var(--head)}
.sign .r{font-size:13px;color:var(--gold);font-weight:700;margin-top:2px}
.pfoot{text-align:center;color:var(--faint);font-size:13px;margin-top:32px}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-12px)}}
@media(max-width:880px){.sgrid{grid-template-columns:1fr;gap:24px}.person{max-width:420px;margin:0 auto;width:100%}.frame{max-width:230px}}
@media(max-width:520px){.wrap{padding:34px 15px 44px}.speech{padding:28px 22px}.person{padding:22px 20px 24px}}
@media(prefers-reduced-motion:reduce){.person .glow{animation:none}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap">
  <header class="phead">
    <span class="eyebrow">Kepala Lembaga</span>
    <h1 class="title">Sambutan Kepala LPPMB</h1>
    <div class="tline"></div>
    <p class="subtitle">Lembaga Pemasaran dan Penerimaan Mahasiswa Baru — Universitas Pamulang</p>
  </header>
  <section class="sgrid">
  <aside class="person glass">
    <div class="glow"></div>
    <div class="frame">
      <div class="ph-fallback"><svg class="sil" viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4.4 3.6-8 8-8s8 3.6 8 8z"/></svg><span class="ph-init">RP</span></div>
      <img src="<?php echo h($FOTO); ?>" alt="Rafik Priyono, S.Kom" loading="lazy">
    </div>
    <h2 class="pname">Rafik Priyono, S.Kom</h2>
    <span class="prole">Kepala LPPMB Universitas Pamulang</span>
  </aside>
  <div class="speech glass">
    <h3 class="salam">Assalamu’alaikum Warahmatullahi Wabarakatuh,</h3>
    <div class="body">
      <p>Salam sejahtera bagi kita semua.</p>
      <p>Segala puji syukur kita panjatkan ke hadirat Allah SWT atas nikmat dan kesempatan yang telah diberikan kepada kita semua, terutama dalam upaya bersama memajukan pendidikan di tanah air.</p>
      <p>Sebagai Kepala LPPMB Universitas Pamulang, saya menyampaikan terima kasih dan apresiasi kepada seluruh pihak yang telah mendukung proses penerimaan mahasiswa baru di Universitas Pamulang.</p>
      <p>LPPMB hadir bukan hanya sebagai pintu masuk ke lingkungan akademik, tetapi juga sebagai langkah awal bagi para calon mahasiswa untuk meraih cita-cita dan membangun masa depan. Kami percaya bahwa setiap individu memiliki potensi besar yang dapat tumbuh jika diberikan ruang, dukungan, dan kesempatan yang tepat.</p>
      <p>Melalui LPPMB, kami berkomitmen memberikan pelayanan yang ramah, cepat, dan terpercaya agar setiap langkah menuju dunia perkuliahan menjadi lebih mudah dan menyenangkan.</p>
      <p>Transformasi dari PMB menjadi LPPMB sejak September 2024 merupakan langkah strategis untuk memperkuat fungsi lembaga dalam bidang pemasaran kampus dan pelayanan penerimaan mahasiswa.</p>
      <p>Kini, kami tidak hanya fokus pada administrasi pendaftaran, tetapi juga aktif memperkenalkan Universitas Pamulang ke berbagai penjuru melalui program-program kreatif dan kolaboratif.</p>
      <p>Universitas Pamulang kini telah menjadi jawaban nyata dari masa depan anak-anak bangsa. Mahasiswa tak lagi hanya datang dari Tangerang dan sekitarnya, tetapi juga dari NTB, NTT, Maluku, Kalimantan, hingga Makassar.</p>
      <p>Citra Unpam tidak lagi sekadar kampus biasa, melainkan telah diakui sebagai kampus berkualitas dengan biaya yang terjangkau.</p>
      <p>Di bawah kepemimpinan luar biasa dari Dr. (H.C) H. Darsono dan Yayasan Sasmita Jaya, kampus ini tidak hanya mendidik secara akademik, tetapi juga membentuk karakter, kompetensi, dan pengalaman kerja melalui kolaborasi dengan UMKM, industri, serta penguatan kegiatan riset dan publikasi ilmiah.</p>
      <p>Kami percaya bahwa pendidikan bukan sekadar formalitas, tetapi sahabat sejati dalam perjalanan hidup.</p>
      <div class="squote"><span class="qic"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M7.5 6C5 6 3 8 3 10.5S5 15 7.5 15c.2 0 .4 0 .6-.1C7.6 16.7 6 18 4 18.4c-.3.1-.5.4-.4.7 0 .3.3.5.6.5 3.6-.2 6.3-3.2 6.3-7.1V10.5C11 8 9 6 7.5 6zm9 0C14 6 12 8 12 10.5S14 15 16.5 15c.2 0 .4 0 .6-.1-.5 1.8-2.1 3.1-4.1 3.5-.3.1-.5.4-.4.7 0 .3.3.5.6.5 3.6-.2 6.3-3.2 6.3-7.1V10.5C20 8 18 6 16.5 6z"/></svg></span><p>“Jangan pernah ragu untuk bermimpi besar. Karena setiap langkah kecil yang kamu ambil hari ini bisa menjadi awal dari perubahan besar di masa depan.”</p></div>
      <p>Selamat datang bagi calon mahasiswa yang telah memilih Universitas Pamulang sebagai tempat untuk belajar, berkembang, dan berkontribusi. Kami siap menyambut dan mendampingi perjalanan akademik kalian dengan sepenuh hati.</p>
    </div>
    <h3 class="salam-end">Wassalamu’alaikum Warahmatullahi Wabarakatuh.</h3>
    <div class="sign"><div class="n">Rafik Priyono, S.Kom</div><div class="r">Kepala LPPMB Universitas Pamulang</div></div>
  </div>
  </section>
  <p class="pfoot">&copy; <?php echo date('Y'); ?> Universitas Pamulang &middot; LPPMB</p>
</main>
<script src="assets/site.js?v=3.5"></script>
</body></html>
