<?php
header('X-Frame-Options: ALLOWALL');
/**
 * Profil LPPMB — Universitas Pamulang
 * Ubah tautan tombol di bawah ini sesuai kebutuhan.
 */
$LINK_DAFTAR = 'https://pmb.unpam.ac.id/'; // TODO: ganti dengan URL halaman pendaftaran
$LINK_INFO   = 'https://pmb.unpam.ac.id/keunggulan-unpam'; // TODO: ganti dengan URL halaman info pendaftaran
function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Profil LPPMB — Universitas Pamulang</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--brand:#243994;--brand2:#0EA5E9;--bg:#F6F8FC;--glass:rgba(255,255,255,.72);--shadow:0 1px 2px rgba(16,24,40,.04),0 12px 34px rgba(16,24,40,.07);--shadow-sm:0 4px 15px rgba(15,23,42,.05);--r:24px;--maxw:1080px}
*{box-sizing:border-box}html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;color:var(--ink);background:var(--bg);line-height:1.6;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}
.orb.a{width:480px;height:480px;background:#DCE8FF;top:-170px;right:-120px}
.orb.b{width:420px;height:420px;background:#E0F2FE;bottom:-180px;left:-140px}
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:46px 22px 56px}
.phead{text-align:center;margin-bottom:26px}
.eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--brand);background:#EAF1FE;padding:6px 14px;border-radius:999px}
.title{font-size:clamp(30px,5.4vw,44px);font-weight:800;letter-spacing:-.02em;margin:15px 0 0;background:linear-gradient(90deg,#243994,#0ea5e9);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent;color:#243994}
.tline{width:92px;height:5px;border-radius:999px;background:linear-gradient(90deg,#243994,#0ea5e9);margin:16px auto 13px}
.subtitle{color:var(--muted);font-size:clamp(14px,2.4vw,16px);margin:0 auto;max-width:620px}
.glass{background:var(--glass);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.pcard{border-radius:var(--r);padding:44px 46px}
.lead{color:#334155;font-size:16.5px;line-height:1.85;text-align:justify;margin:0}
.lead strong{color:var(--head)}
.pgrid{display:grid;grid-template-columns:1fr 1fr;gap:22px;margin:28px 0}
.pbox{background:#fff;border:1px solid #E7ECF3;border-radius:18px;padding:24px 24px 22px;box-shadow:var(--shadow-sm)}
.pbox h3{margin:0 0 16px;font-size:17px;font-weight:800;color:var(--brand);letter-spacing:-.01em}
.plist{list-style:none;padding:0;margin:0;display:flex;flex-direction:column;gap:13px}
.plist li{position:relative;padding-left:34px;color:#475569;font-size:14.5px;line-height:1.5}
.chk{position:absolute;left:0;top:0;width:22px;height:22px;border-radius:50%;background:#E6F4FD;color:var(--brand2);display:grid;place-items:center}
.chk svg{width:13px;height:13px}
.pnote{margin:28px 0;padding:22px 26px;border-left:5px solid var(--brand2);background:linear-gradient(135deg,#F0F9FF,#E0F2FE);border-radius:16px}
.pnote p{margin:0;color:#0C4A6E;font-size:15px;line-height:1.8;text-align:justify}
.pfooter{margin-top:28px;padding-top:26px;border-top:1px solid #E7ECF3;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap}
.ftxt{color:var(--muted);font-size:13.5px;line-height:1.6;max-width:440px}
.cta-row{display:flex;gap:12px;flex-wrap:wrap}
.btn{position:relative;overflow:hidden;display:inline-flex;align-items:center;gap:9px;padding:13px 24px;border-radius:13px;font-size:14.5px;font-weight:700;text-decoration:none;background:linear-gradient(90deg,#243994,#0ea5e9);color:#fff;box-shadow:0 10px 24px rgba(36,57,148,.25);transition:transform .22s ease,box-shadow .22s ease}
.btn svg{width:18px;height:18px;transition:transform .22s ease}
.btn::before{content:"";position:absolute;top:0;left:0;width:45%;height:100%;background:linear-gradient(120deg,transparent,rgba(255,255,255,.55),transparent);transform:translateX(-160%) skewX(-20deg);animation:sheen 4s ease-in-out infinite}
.btn:hover{transform:translateY(-3px);box-shadow:0 16px 34px rgba(36,57,148,.34)}
.btn:hover svg{transform:translateX(4px)}
.btn:active{transform:translateY(-1px)}
@keyframes sheen{0%{transform:translateX(-160%) skewX(-20deg)}55%,100%{transform:translateX(340%) skewX(-20deg)}}
.btn-ghost{background:#fff;color:var(--brand);border:1.5px solid #D7E0F5;box-shadow:var(--shadow-sm)}
.btn-ghost::before{display:none}
.btn-ghost:hover{transform:translateY(-3px);border-color:var(--brand2);box-shadow:0 12px 26px rgba(14,165,233,.18)}
.pfoot{text-align:center;color:var(--faint);font-size:13px;margin-top:30px}
@media(max-width:768px){.pcard{padding:30px 24px}.pgrid{grid-template-columns:1fr;gap:16px}.pfooter{flex-direction:column;align-items:stretch}.cta-row{width:100%}.btn{flex:1;justify-content:center}}
@media(max-width:520px){.wrap{padding:34px 15px 44px}.pcard{padding:26px 20px}}
@media(prefers-reduced-motion:reduce){.btn::before{animation:none}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap">
  <header class="phead">
    <span class="eyebrow">Profil Lembaga</span>
    <h1 class="title">LPPMB Universitas Pamulang</h1>
    <div class="tline"></div>
    <p class="subtitle">Lembaga Pemasaran dan Penerimaan Mahasiswa Baru</p>
  </header>
  <div class="pcard glass">
    <p class="lead"><strong>LPPMB (Lembaga Pemasaran dan Penerimaan Mahasiswa Baru)</strong> Universitas Pamulang merupakan salah satu unit strategis yang berada di bawah struktur organisasi Universitas Pamulang. Lembaga ini memiliki peran penting dalam menjaga keberlanjutan pertumbuhan mahasiswa baru melalui proses pemasaran dan penerimaan yang terstruktur, profesional, serta selaras dengan arah kebijakan universitas.</p>

    <div class="pgrid">
      <div class="pbox">
        <h3>Tugas Utama LPPMB</h3>
        <ul class="plist">
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Perencanaan dan pelaksanaan strategi pemasaran kampus.</li>
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Promosi langsung maupun melalui media digital.</li>
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Sosialisasi ke sekolah-sekolah dan institusi pendidikan.</li>
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Mengikuti pameran pendidikan (Campus Fair).</li>
        </ul>
      </div>
      <div class="pbox">
        <h3>Aktivitas Strategis</h3>
        <ul class="plist">
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Penyebaran informasi melalui media sosial.</li>
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Pengelolaan komunikasi dengan calon mahasiswa.</li>
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Koordinasi dengan organisasi kemahasiswaan.</li>
          <li><span class="chk"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg></span>Kolaborasi dengan unit dan lembaga internal universitas.</li>
        </ul>
      </div>
    </div>

    <div class="pnote">
      <p>Tidak hanya berfokus pada promosi, LPPMB juga mengelola seluruh proses penerimaan mahasiswa baru mulai dari pendaftaran, verifikasi data, hingga penyampaian hasil seleksi. Seluruh layanan diselenggarakan secara daring maupun luring untuk memudahkan akses bagi calon mahasiswa dari berbagai wilayah. Kecepatan pelayanan, ketelitian proses, dan keterbukaan informasi menjadi prinsip utama dalam setiap layanan yang diberikan.</p>
    </div>

    <p class="lead">Sebagai unit yang pertama kali berinteraksi dengan calon mahasiswa, LPPMB menjadi representasi awal citra Universitas Pamulang. Oleh karena itu, lembaga ini terus berupaya meningkatkan kualitas layanan, memperluas jangkauan promosi, serta membangun hubungan yang harmonis dengan berbagai mitra eksternal, termasuk sekolah, lembaga pendidikan, dan masyarakat luas.</p>

    <div class="pfooter">
      <div class="ftxt">Ingin bergabung menjadi bagian dari Universitas Pamulang? Mulai proses pendaftaranmu sekarang.</div>
      <div class="cta-row">
        <a class="btn" href="<?php echo h($LINK_DAFTAR); ?>" target="_blank" rel="noopener">Daftar Sekarang <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M12 6l6 6-6 6"/></svg></a>
        <a class="btn btn-ghost" href="<?php echo h($LINK_INFO); ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 16v-4M12 8h.01"/></svg><span>Keunggulan UNPAM</span></a>
      </div>
    </div>
  </div>
  <p class="pfoot">&copy; <?php echo date('Y'); ?> Universitas Pamulang &middot; LPPMB</p>
</main>
<script src="assets/site.js?v=3.5"></script>
</body></html>
