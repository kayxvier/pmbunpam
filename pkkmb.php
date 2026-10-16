<?php
require __DIR__ . '/config.php';
header('X-Frame-Options: ALLOWALL');
/**
 * PKKMB — Universitas Pamulang
 * Cara menambah postingan Instagram: tambahkan satu entri baru ke array $POSTINGAN.
 * Tambahkan 'selesai' => true pada entri untuk kategori "Sudah Dilaksanakan"
 * (thumbnail jadi abu-abu + strip pojok merah bertuliskan "Sudah Dilaksanakan").
 */

/* Konten PKKMB sekarang dikelola sebagai dataset, termasuk toggle tampilkan
   postingan, akun Instagram, teks, tautan, gambar, dan status selesai. */
$PKKMB = pmb_content('pkkmb');
$INSTAGRAM = isset($PKKMB['instagram']) ? $PKKMB['instagram'] : 'https://www.instagram.com/pmb.unpam';
$TAMPILKAN_POSTINGAN = !empty($PKKMB['show_posts']);
$POSTINGAN = isset($PKKMB['posts']) && is_array($PKKMB['posts']) ? $PKKMB['posts'] : array();

$GRAD = [['#EAF1FE','#DCE8FF'],['#E0F2FE','#CFEBFD'],['#EDE9FE','#E0DBFB'],['#E0F5F1','#CFEEE6'],['#FEF0E7','#FBE3D3'],['#FCE8F1','#F8D6E6']];
$adaPost = $TAMPILKAN_POSTINGAN && count($POSTINGAN) > 0;
$IG_SVG = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.2" cy="6.8" r="1" fill="currentColor" stroke="none"/></svg>';
$CAL_SVG = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4.5" width="18" height="16" rx="2.5"/><path d="M3 9.5h18M8 2.5v4M16 2.5v4"/></svg>';
$ARR_SVG = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h13M12 6l6 6-6 6"/></svg>';
$CLK_SVG = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7.5v5l3 2"/></svg>';
function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>PKKMB — Universitas Pamulang</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--accent:#2563EB;--bg:#F6F8FC;--glass:rgba(255,255,255,.72);--shadow:0 1px 2px rgba(16,24,40,.04),0 10px 28px rgba(16,24,40,.06);--shadow-sm:0 1px 2px rgba(16,24,40,.05),0 4px 14px rgba(16,24,40,.05);--r:22px;--maxw:1080px;--ig:linear-gradient(45deg,#feda75 0%,#fa7e1e 26%,#d62976 52%,#962fbf 76%,#4f5bd5 100%)}
*{box-sizing:border-box}html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;color:var(--ink);background:var(--bg);line-height:1.6;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}
.orb.a{width:480px;height:480px;background:#DCE8FF;top:-170px;right:-120px}
.orb.b{width:420px;height:420px;background:#E0F2FE;bottom:-180px;left:-140px}
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:46px 22px 58px}
.phead{text-align:center;margin-bottom:26px}
.eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);background:#EAF1FE;padding:6px 14px;border-radius:999px}
.title{font-size:clamp(28px,5vw,42px);font-weight:800;letter-spacing:-.02em;color:var(--head);margin:15px 0 8px}
.subtitle{color:var(--muted);font-size:clamp(14px,2.4vw,16px);margin:0 auto;max-width:640px}
.glass{background:var(--glass);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.about{border-radius:var(--r);padding:30px 30px 26px;margin-bottom:34px}
.about h2{margin:0 0 12px;font-size:20px;font-weight:800;color:var(--head);letter-spacing:-.01em}
.about p{margin:0;color:#4B5563;font-size:15px;line-height:1.7;max-width:760px}
.abts{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:22px}
.abt{display:flex;gap:12px;align-items:flex-start;padding:16px;border-radius:16px;background:rgba(255,255,255,.6);border:1px solid var(--line)}
.abt .ic{flex:0 0 auto;width:40px;height:40px;border-radius:12px;background:#EAF1FE;color:var(--accent);display:grid;place-items:center}
.abt .ic svg{width:21px;height:21px}
.abt h3{margin:0 0 3px;font-size:14px;font-weight:700;color:var(--head);line-height:1.3}
.abt p{font-size:12.5px;color:var(--muted);line-height:1.45}
.sec-head{display:flex;align-items:baseline;justify-content:space-between;gap:14px;flex-wrap:wrap;margin:0 4px 18px}
.sec-head h2{margin:0;font-size:19px;font-weight:800;color:var(--head);letter-spacing:-.01em}
.sec-head .sub{color:var(--faint);font-size:13.5px}
.swipe-hint{display:none;align-items:center;gap:7px;color:var(--faint);font-size:12.5px;font-weight:600;margin:-4px 4px 16px}
.swipe-hint svg{width:16px;height:16px}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(288px,1fr));gap:20px}
.post{border-radius:20px;overflow:hidden;box-shadow:var(--shadow-sm)!important;display:flex;flex-direction:column;transition:transform .2s ease,box-shadow .2s ease}
.post:hover{transform:translateY(-3px);box-shadow:0 2px 6px rgba(16,24,40,.06),0 16px 34px rgba(16,24,40,.10)!important}
.post-media{position:relative;display:block;aspect-ratio:4/3;background:linear-gradient(135deg,var(--g1),var(--g2));overflow:hidden}
.post-media img{width:100%;height:100%;object-fit:cover;display:block}
.post-media .ph{position:absolute;inset:0;display:grid;place-items:center;color:#fff}
.post-media .ph svg{width:60px;height:60px;opacity:.9;color:#9db6e8}
.ig-chip{position:absolute;top:12px;left:12px;display:inline-flex;align-items:center;gap:6px;padding:5px 11px 5px 9px;border-radius:999px;background:rgba(255,255,255,.9);backdrop-filter:blur(6px);font-size:11.5px;font-weight:700;color:#3b1d5e}
.ig-chip svg{width:15px;height:15px}
.ig-chip span{background:var(--ig);-webkit-background-clip:text;background-clip:text;-webkit-text-fill-color:transparent}
.done-strip{position:absolute;top:32px;right:-64px;width:230px;padding:7px 0;text-align:center;transform:rotate(45deg);background:#DC2626;color:#fff;font-size:10px;font-weight:800;letter-spacing:.05em;text-transform:uppercase;box-shadow:0 3px 10px rgba(220,38,38,.35);z-index:3}
.post.done .post-media img{filter:grayscale(1) brightness(.95)}
.post.done .post-media .ph svg{color:#9CA3AF}
.post-body{padding:18px 18px 20px;display:flex;flex-direction:column;flex:1}
.post-meta{display:flex;align-items:center;gap:7px;color:var(--faint);font-size:12.5px;font-weight:600}
.post-meta svg{width:15px;height:15px}
.post-title{margin:9px 0 7px;font-size:16px;font-weight:800;color:var(--head);line-height:1.32;letter-spacing:-.01em}
.post-desc{margin:0 0 16px;font-size:13.5px;color:#4B5563;line-height:1.55;flex:1}
.post-cta{display:inline-flex;align-items:center;gap:7px;align-self:flex-start;padding:9px 16px;border-radius:11px;background:var(--accent);color:#fff;font-size:13px;font-weight:700;text-decoration:none;transition:background .2s,gap .2s}
.post-cta svg{width:16px;height:16px}
.post-cta:hover{background:#1D4ED8;gap:10px}
.soon{border-radius:var(--r);padding:52px 34px;text-align:center;display:flex;flex-direction:column;align-items:center}
.soon-ic{width:76px;height:76px;border-radius:22px;background:var(--ig);color:#fff;display:grid;place-items:center;box-shadow:0 10px 26px rgba(214,41,118,.28)}
.soon-ic svg{width:38px;height:38px}
.soon h2{margin:22px 0 10px;font-size:clamp(19px,3.2vw,24px);font-weight:800;color:var(--head);letter-spacing:-.01em}
.soon p{margin:0 auto 24px;max-width:460px;color:var(--muted);font-size:14.5px;line-height:1.6}
.soon-cta{display:inline-flex;align-items:center;gap:9px;padding:12px 22px;border-radius:13px;background:var(--ig);color:#fff;font-size:14px;font-weight:700;text-decoration:none;box-shadow:0 8px 22px rgba(214,41,118,.26);transition:transform .2s,box-shadow .2s}
.soon-cta svg{width:19px;height:19px}
.soon-cta:hover{transform:translateY(-2px);box-shadow:0 12px 28px rgba(214,41,118,.34)}
.soon-hint{margin-top:18px;display:inline-flex;align-items:center;gap:7px;color:var(--faint);font-size:12.5px;font-weight:600;padding:7px 14px;border-radius:999px;background:rgba(255,255,255,.55);border:1px solid var(--line)}
.soon-hint svg{width:15px;height:15px}
.pfoot{text-align:center;color:var(--faint);font-size:13px;margin-top:34px}
@media(max-width:720px){.abts{grid-template-columns:1fr}}
@media(max-width:520px){.wrap{padding:34px 15px 46px}.about{padding:24px 20px}.soon{padding:40px 22px}}
@media(max-width:640px){.swipe-hint{display:flex}.grid{display:flex;overflow-x:auto;scroll-snap-type:x mandatory;gap:16px;margin:0 -15px;padding:2px 15px 18px;-webkit-overflow-scrolling:touch;scrollbar-width:none}.grid::-webkit-scrollbar{display:none}.post{flex:0 0 85%;max-width:330px;scroll-snap-align:center}.post-media{aspect-ratio:16/10}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap">
  <header class="phead">
    <span class="eyebrow">Mahasiswa Baru</span>
    <h1 class="title">PKKMB</h1>
    <p class="subtitle">Pengenalan Kehidupan Kampus bagi Mahasiswa Baru — Universitas Pamulang.</p>
  </header>
  <section class="about glass">
    <h2>Apa itu PKKMB?</h2>
    <p>PKKMB (Pengenalan Kehidupan Kampus bagi Mahasiswa Baru) adalah kegiatan awal yang mengenalkan mahasiswa baru pada lingkungan, sistem akademik, kegiatan kemahasiswaan, serta nilai dan budaya kampus. Melalui PKKMB, mahasiswa baru diharapkan dapat beradaptasi dan siap menjalani kehidupan perkuliahan dengan baik.</p>
    <div class="abts">
      <div class="abt"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="3" width="16" height="18" rx="1.5"/><path d="M9 21v-4h6v4M8 7h.01M12 7h.01M16 7h.01M8 11h.01M12 11h.01M16 11h.01"/></svg></span><div><h3>Pengenalan Kampus</h3><p>Mengenal lingkungan, fasilitas, dan layanan kampus.</p></div></div>
      <div class="abt"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="9" cy="8" r="3"/><path d="M2.5 20a6.5 6.5 0 0 1 13 0M17 5.5a3 3 0 0 1 0 6M21.5 20a6.5 6.5 0 0 0-4-6"/></svg></span><div><h3>Akademik &amp; Organisasi</h3><p>Memahami sistem perkuliahan dan kegiatan kemahasiswaan.</p></div></div>
      <div class="abt"><span class="ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4.5A2 2 0 0 1 6 3h14v15H6a2 2 0 0 0-2 2z"/><path d="M4 4.5V21"/></svg></span><div><h3>Nilai &amp; Budaya</h3><p>Menanamkan etika, karakter, dan budaya akademik kampus.</p></div></div>
    </div>
  </section>
  <div class="sec-head"><h2>Informasi &amp; Pengumuman</h2><span class="sub">Postingan resmi seputar PKKMB</span></div>
<?php if ($adaPost): ?>
  <div class="swipe-hint">Geser kartu untuk melihat lainnya <?php echo $ARR_SVG; ?></div>
  <section class="grid">
<?php foreach ($POSTINGAN as $i => $p): $g = $GRAD[$i % count($GRAD)]; $done = !empty($p['selesai']); ?>
    <article class="post glass<?php echo $done ? ' done' : ''; ?>">
      <a class="post-media" href="<?php echo h($p['url']); ?>" target="_blank" rel="noopener" style="--g1:<?php echo $g[0]; ?>;--g2:<?php echo $g[1]; ?>">
        <?php if (!empty($p['gambar'])): ?>
          <img src="<?php echo h($p['gambar']); ?>" alt="<?php echo h($p['judul']); ?>" loading="lazy">
        <?php else: ?>
          <span class="ph"><?php echo $IG_SVG; ?></span>
        <?php endif; ?>
        <?php if ($done): ?><span class="done-strip">Sudah Dilaksanakan</span><?php endif; ?>
        <span class="ig-chip"><?php echo $IG_SVG; ?><span>Instagram</span></span>
      </a>
      <div class="post-body">
        <div class="post-meta"><?php echo $CAL_SVG; ?><span><?php echo h($p['tanggal']); ?></span></div>
        <h3 class="post-title"><?php echo h($p['judul']); ?></h3>
        <p class="post-desc"><?php echo h($p['ringkasan']); ?></p>
        <a class="post-cta" href="<?php echo h($p['url']); ?>" target="_blank" rel="noopener">Lihat Postingan <?php echo $ARR_SVG; ?></a>
      </div>
    </article>
<?php endforeach; ?>
  </section>
<?php else: ?>
  <section class="soon glass">
    <span class="soon-ic"><?php echo $IG_SVG; ?></span>
    <h2>Nantikan Info PKKMB di halaman ini</h2>
    <p>Pengumuman, jadwal, dan postingan resmi seputar PKKMB akan segera tampil di sini. Pantau terus halaman ini secara berkala.</p>
    <a class="soon-cta" href="<?php echo h($INSTAGRAM); ?>" target="_blank" rel="noopener"><?php echo $IG_SVG; ?><span>Ikuti Instagram Resmi</span></a>
    <div class="soon-hint"><?php echo $CLK_SVG; ?><span>Sedang dipersiapkan</span></div>
  </section>
<?php endif; ?>
  <p class="pfoot">Universitas Pamulang &middot; PKKMB Mahasiswa Baru</p>
</main>
<script src="assets/site.js?v=3.5"></script>
</body></html>
