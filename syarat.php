<?php header("X-Frame-Options: ALLOWALL"); ?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Persyaratan Pendaftaran - Universitas Pamulang</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--accent:#2563EB;--bg:#F6F8FC;--glass:rgba(255,255,255,.66);--shadow:0 1px 2px rgba(16,24,40,.04),0 10px 28px rgba(16,24,40,.06);--r:22px;--maxw:1000px;--teal:#0D9488;--teal-s:#E3F5F1;--blue-s:#EAF1FE;--violet-s:#F1ECFE}
*{box-sizing:border-box}html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;color:var(--ink);background:var(--bg);line-height:1.5;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}
.orb.a{width:440px;height:440px;background:#DCE8FF;top:-150px;right:-120px}
.orb.b{width:400px;height:400px;background:#EDE8FF;bottom:-150px;left:-130px}
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:44px 22px 56px}
.phead{text-align:center;margin-bottom:8px}
.brand{display:inline-flex;align-items:center;gap:10px;background:rgba(255,255,255,.72);border:1px solid var(--line);border-radius:999px;padding:5px 15px 5px 5px;box-shadow:var(--shadow);margin-bottom:14px}
.brand .up{width:28px;height:28px;border-radius:50%;background:var(--accent);color:#fff;font-weight:800;font-size:11px;display:grid;place-items:center}
.brand b{font-size:13px;font-weight:600;color:var(--head)}
.title{font-size:clamp(26px,4.6vw,38px);font-weight:800;letter-spacing:-.02em;color:var(--head);margin:6px 0 6px}
.subtitle{color:var(--muted);font-size:clamp(13px,2.4vw,15px);margin:0 auto;max-width:520px}
.tabwrap{display:flex;justify-content:center;margin-top:22px}
.tabs{display:inline-flex;gap:6px;background:rgba(255,255,255,.6);border:1px solid var(--line);padding:6px;border-radius:16px;box-shadow:var(--shadow);flex-wrap:wrap;justify-content:center}
.tab{display:inline-flex;align-items:center;gap:8px;padding:10px 18px;border:none;background:transparent;border-radius:11px;font:inherit;font-size:13.5px;font-weight:700;color:var(--muted);cursor:pointer;transition:all .18s}
.tab.active{background:#fff;color:var(--accent);box-shadow:var(--shadow)}
.tab .flag{font-size:16px;line-height:1}
.glass{background:var(--glass);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.panel{display:none}.panel.show{display:block}
.card{border-radius:var(--r);padding:24px 24px 22px;margin-top:24px}
.sec{display:flex;align-items:center;gap:10px;font-size:12px;font-weight:700;letter-spacing:.06em;text-transform:uppercase;color:var(--accent);margin:0 0 16px}
.sec::after{content:'';flex:1;height:1px;background:var(--line)}
.seci{width:26px;height:26px;border-radius:8px;background:var(--blue-s);color:var(--accent);display:grid;place-items:center;flex:0 0 auto}
.seci svg{width:15px;height:15px}
.req-list{display:grid;grid-template-columns:repeat(2,1fr);gap:10px;align-items:start;list-style:none;padding:0;margin:0}
.req{display:flex;gap:12px;align-items:flex-start;background:rgba(255,255,255,.7);border:1px solid var(--line);border-radius:14px;padding:13px 15px;transition:transform .12s,box-shadow .12s,border-color .12s}
.req:hover{transform:translateY(-1px);border-color:#DBE3EF;box-shadow:0 4px 12px rgba(16,24,40,.06)}
.num{width:26px;height:26px;border-radius:8px;background:var(--accent);color:#fff;font-weight:800;font-size:12px;display:grid;place-items:center;flex:0 0 auto;margin-top:1px}
.rt{font-size:13.5px;line-height:1.55;color:#1F2937}
.rt strong{font-weight:700;color:var(--head)}
.rt a{color:var(--accent);font-weight:700;text-decoration:none}.rt a:hover{text-decoration:underline}
.muted{color:var(--faint);font-size:12px}
.badge{display:inline-block;font-size:10.5px;font-weight:800;padding:2px 9px;border-radius:999px;margin-left:5px;vertical-align:middle;white-space:nowrap}
.b-s2{background:var(--teal-s);color:var(--teal)}
.b-sp{background:#FDF0DA;color:#B45309}
.sub{margin:7px 0 0;padding:0;list-style:none;display:flex;flex-direction:column;gap:4px}
.sub li{font-size:12.5px;color:var(--muted);padding-left:14px;position:relative;line-height:1.5}
.sub li::before{content:'–';position:absolute;left:0;color:var(--faint)}
.note{margin-top:16px;background:#FDF7EC;border:1px solid #F3E2C0;border-left:4px solid #F0B429;border-radius:12px;padding:14px 16px;font-size:13px;color:#92610A;line-height:1.6;display:flex;gap:10px}
.note svg{width:18px;height:18px;flex:0 0 auto;margin-top:1px;color:#B45309}
.note .nt{display:block;color:#7a5c00;text-transform:uppercase;letter-spacing:.04em;font-size:11.5px;font-weight:800;margin-bottom:3px}.note strong{font-weight:700;color:#7a5c00}
.cta{margin-top:24px;border-radius:var(--r);padding:28px 24px;text-align:center;background:linear-gradient(135deg,#EAF1FE 0%,#F1ECFE 100%);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.cta p{margin:0 0 14px;color:#374151;font-size:14px;font-weight:500}
.cta a{display:inline-flex;align-items:center;gap:8px;background:var(--accent);color:#fff;font-weight:700;font-size:14px;padding:12px 26px;border-radius:999px;text-decoration:none;box-shadow:0 8px 20px rgba(37,99,235,.25);transition:transform .15s,box-shadow .15s}
.cta a:hover{transform:translateY(-2px);box-shadow:0 12px 26px rgba(37,99,235,.3)}
.cta a svg{width:17px;height:17px}
.foot{text-align:center;color:var(--faint);font-size:12px;margin-top:26px;padding-top:16px;border-top:1px solid var(--line)}
@media(max-width:680px){.req-list{grid-template-columns:1fr}.card{padding:20px 18px}.wrap{padding:34px 16px 46px}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap">
  <header class="phead">
    <h1 class="title">Persyaratan Pendaftaran</h1>
    <p class="subtitle">Lengkapi dokumen berikut untuk memulai perjalanan akademik Anda.</p>
    <div class="tabwrap"><div class="tabs"><button class="tab active" data-tab="id"><span class="flag">🇮🇩</span><span>Mahasiswa Indonesia</span></button><button class="tab" data-tab="int"><span class="flag">🌍</span><span>Foreign Student</span></button></div></div>
  </header>
  <div class="panel show" data-panel="id">
    <div class="card glass">
      <p class="sec"><span class="seci"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5"/></svg></span>Dokumen Wajib</p>
      <ul class="req-list"><li class="req"><span class="num">1</span><div class="rt">Berwarganegara Indonesia</div></li><li class="req"><span class="num">2</span><div class="rt">Lulusan <strong>SMA / SMK / MA</strong> atau sederajat</div></li><li class="req"><span class="num">3</span><div class="rt">Bukti terdata lulus di <strong>SIVIL &amp; PDDIKTI</strong><span class="badge b-s2">Khusus S2</span></div></li><li class="req"><span class="num">4</span><div class="rt">Pas foto berwarna ukuran <strong>3 × 4 cm</strong></div></li><li class="req"><span class="num">5</span><div class="rt">Fotokopi identitas diri — <strong>KTP</strong> atau Resi KTP</div></li><li class="req"><span class="num">6</span><div class="rt">Fotokopi <strong>Akta Kelahiran</strong> / Kartu Keluarga</div></li><li class="req"><span class="num">7</span><div class="rt">Surat Pernyataan &amp; Pakta Integritas <a href="#" target="_top">(unduh di sini)</a></div></li><li class="req"><span class="num">8</span><div class="rt">Surat Kerja / ID Card<span class="badge b-sp">Khusus Reguler Kelas CS</span></div></li><li class="req"><span class="num">9</span><div class="rt">Surat Keterangan Buta Warna<span class="badge b-sp">Khusus DKV S-1</span></div></li></ul>
      <div class="note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg><div><span class="nt">Catatan Penting</span>Persyaratan berlabel <strong>Khusus</strong> hanya berlaku untuk program studi atau jalur tertentu. Periksa kembali program studi yang Anda pilih sebelum melengkapi dokumen.</div></div>
    </div>
  </div>
<div class="panel" data-panel="int">
    <div class="card glass">
      <p class="sec"><span class="seci"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M14 3H7a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V8z"/><path d="M14 3v5h5"/></svg></span>Required Documents</p>
      <ul class="req-list"><li class="req"><span class="num">1</span><div class="rt">Two recent <strong>passport-sized photos</strong> (3 × 4 cm)</div></li><li class="req"><span class="num">2</span><div class="rt"><strong>Financial Guarantee Letter</strong></div></li><li class="req"><span class="num">3</span><div class="rt"><strong>Health Certificate</strong></div></li><li class="req"><span class="num">4</span><div class="rt">Photocopy / Scan of <strong>Passport</strong> <span class="muted">(identity &amp; visa pages)</span></div></li><li class="req"><span class="num">5</span><div class="rt">Photocopy of <strong>Diploma / Report Card / Academic Transcript</strong></div></li><li class="req"><span class="num">6</span><div class="rt">Signed <strong>Academic Rules &amp; Integrity Pact</strong></div></li><li class="req"><span class="num">7</span><div class="rt"><strong>Personal Declaration</strong> — stating that you will:<ul class="sub"><li>Not engage in political activities in the Republic of Indonesia</li><li>Not work in the Republic of Indonesia</li><li>Comply with Indonesian law</li></ul></div></li><li class="req"><span class="num">8</span><div class="rt"><strong>Student Visa</strong> (Visa Pendidikan)</div></li><li class="req"><span class="num">9</span><div class="rt">Colour Blindness Certificate<span class="badge b-sp">DKV S-1 only</span></div></li></ul>
      <div class="note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg><div><span class="nt">Important Note</span>All documents must be complete and valid before submission. Incomplete applications may result in delays or rejection of enrollment.</div></div>
    </div>
  </div>
  <div class="cta"><p>Siap mendaftar? Kunjungi portal resmi Universitas Pamulang</p><a href="https://pmb.unpam.ac.id" target="_top">Daftar Sekarang <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a></div>
  <p class="foot">&copy; <?php echo date("Y"); ?> Universitas Pamulang &middot; pmb.unpam.ac.id</p>
</main>
<script>
(function(){
  var tabs=[].slice.call(document.querySelectorAll('.tab'));
  var panels=[].slice.call(document.querySelectorAll('.panel'));
  tabs.forEach(function(t){t.addEventListener('click',function(){
    var id=t.getAttribute('data-tab');
    tabs.forEach(function(x){x.classList.toggle('active',x===t)});
    panels.forEach(function(p){p.classList.toggle('show',p.getAttribute('data-panel')===id)});
  })});
})();
</script>
<script src="assets/site.js?v=3.5"></script>
</body></html>
