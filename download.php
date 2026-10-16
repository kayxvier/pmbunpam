<?php
// ===== Data & pengelompokan (struktur dokumen.json: kategori, nama, link) =====
$jsonData  = @file_get_contents("dokumen.json");
$documents = json_decode($jsonData, true);

$kategori_urutan = [
    "Dokumen Administrasi Mahasiswa Baru",
    "Informasi & Pengumuman SPMB",
    "Panduan Sistem Mahasiswa",
    "Panduan Pembayaran Kuliah",
    "Media Informasi Kampus"
];

$grouped = [];
if ($documents) {
    foreach ($documents as $doc) {
        $cat = isset($doc['kategori']) ? $doc['kategori'] : 'Lainnya';
        $grouped[$cat][] = $doc;
    }
}

function catStyle($kat){
    if (strpos($kat,'Administrasi')!==false) return ['t-blue','<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6M9 13h6M9 17h6"/>'];
    if (strpos($kat,'Informasi')!==false || strpos($kat,'Pengumuman')!==false) return ['t-violet','<path d="M3 11l18-5v12L3 14v-3zM11.6 16.8a3 3 0 0 1-5.8-1.1"/>'];
    if (strpos($kat,'Sistem')!==false) return ['t-teal','<circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.7 1.7 0 0 0 .3 1.9l.1.1a2 2 0 1 1-2.8 2.8l-.1-.1a1.7 1.7 0 0 0-2.9 1.2V21a2 2 0 1 1-4 0v-.1A1.7 1.7 0 0 0 7 19.4a1.7 1.7 0 0 0-1.9.3l-.1.1a2 2 0 1 1-2.8-2.8l.1-.1a1.7 1.7 0 0 0-1.2-2.9H1a2 2 0 1 1 0-4h.1A1.7 1.7 0 0 0 2.6 7"/>'];
    if (strpos($kat,'Pembayaran')!==false) return ['t-amber','<rect x="2" y="5" width="20" height="14" rx="2"/><path d="M2 10h20"/>'];
    if (strpos($kat,'Media')!==false) return ['t-rose','<rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>'];
    return ['t-blue','<path d="M3 7a2 2 0 0 1 2-2h4l2 2h8a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Download Dokumen — SIMABA UNPAM</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{
  --ink:#111827; --head:#0B1220; --muted:#6B7280; --faint:#9CA3AF;
  --accent:#2563EB; --accent-soft:#EAF1FE;
  --line:rgba(17,24,39,.07);
  --glass:rgba(255,255,255,.62);
  --glass-strong:rgba(255,255,255,.82);
  --stroke:rgba(255,255,255,.9);
  --shadow:0 1px 2px rgba(16,24,40,.04), 0 8px 24px rgba(16,24,40,.06);
  --shadow-lg:0 2px 6px rgba(16,24,40,.05), 0 18px 44px rgba(16,24,40,.10);
  --r:20px; --r-sm:12px;
  --maxw:1080px;
  --ff:'Plus Jakarta Sans',-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,Helvetica,Arial,sans-serif;
}
*{box-sizing:border-box}
html,body{margin:0;padding:0}
body{
  font-family:var(--ff);color:var(--ink);background:#FFFFFF;
  -webkit-font-smoothing:antialiased;text-rendering:optimizeLegibility;
  min-height:100%;position:relative;overflow-x:hidden;
}
/* orbs sangat halus — hanya untuk memberi kedalaman pada kaca, tetap putih & minimalis */
.orbs{position:fixed;inset:0;z-index:0;pointer-events:none;overflow:hidden}
.orb{position:absolute;border-radius:50%;filter:blur(90px);opacity:.16}
.orb.a{width:520px;height:520px;background:#3b82f6;top:-200px;left:-120px}
.orb.b{width:440px;height:440px;background:#8b5cf6;bottom:-220px;right:-120px;opacity:.12}
.orb.c{width:360px;height:360px;background:#14b8a6;top:35%;right:22%;opacity:.08}

.sec{position:relative;z-index:1;padding:clamp(26px,4vw,52px) clamp(16px,4vw,36px)}
.wrap{max-width:var(--maxw);margin:0 auto}
.center{text-align:center}

.glass{background:var(--glass);border:1px solid var(--stroke);border-radius:var(--r);box-shadow:var(--shadow);-webkit-backdrop-filter:blur(20px) saturate(160%);backdrop-filter:blur(20px) saturate(160%);position:relative}
.glass::before{content:"";position:absolute;inset:0;border-radius:inherit;padding:1px;background:linear-gradient(150deg,rgba(255,255,255,.95),rgba(255,255,255,0) 45%,rgba(17,24,39,.05));-webkit-mask:linear-gradient(#000 0 0) content-box,linear-gradient(#000 0 0);-webkit-mask-composite:xor;mask-composite:exclude;pointer-events:none}

.eyebrow{display:inline-flex;align-items:center;gap:7px;font-size:.74rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);background:var(--accent-soft);border:1px solid rgba(37,99,235,.12);padding:6px 13px;border-radius:999px}
.eyebrow svg{width:13px;height:13px}
h1.title{font-size:clamp(1.55rem,3.4vw,2.3rem);line-height:1.14;font-weight:800;letter-spacing:-.02em;color:var(--head);margin:.5em 0 .3em}
.subtitle{font-size:clamp(.98rem,1.5vw,1.08rem);line-height:1.6;color:var(--muted);margin:0 auto;max-width:56ch}

@media (prefers-reduced-motion:reduce){*{scroll-behavior:auto!important}}
</style>
</head>
<body>
<div class="orbs" aria-hidden="true"><span class="orb a"></span><span class="orb b"></span><span class="orb c"></span></div>
<style>
  .dl-head{display:flex;justify-content:center;margin:26px 0 30px}
  .search{position:relative;width:100%;max-width:440px}
  .search input{width:100%;font-family:inherit;font-size:.95rem;padding:15px 18px 15px 48px;border-radius:999px;border:1px solid var(--line);background:var(--glass-strong);-webkit-backdrop-filter:blur(16px);backdrop-filter:blur(16px);color:var(--ink);outline:none;box-shadow:var(--shadow);transition:border .18s,box-shadow .18s}
  .search input::placeholder{color:var(--faint)}
  .search input:focus{border-color:var(--accent);box-shadow:0 0 0 4px rgba(37,99,235,.12)}
  .search svg{position:absolute;left:18px;top:50%;transform:translateY(-50%);width:19px;height:19px;color:var(--faint)}

  .dl-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(330px,1fr));gap:18px;align-items:start}
  .cat{border-radius:var(--r);overflow:hidden;display:flex;flex-direction:column;transition:transform .2s ease,box-shadow .2s ease}
  .cat:hover{transform:translateY(-4px);box-shadow:var(--shadow-lg)}
  .cat-h{display:flex;align-items:center;gap:13px;padding:18px 20px;border-bottom:1px solid var(--line)}
  .ibadge{width:42px;height:42px;flex-shrink:0;border-radius:12px;display:grid;place-items:center}
  .ibadge svg{width:21px;height:21px}
  .t-blue{background:#EAF1FE;color:#2563EB}
  .t-violet{background:#F1ECFE;color:#7C5CFC}
  .t-teal{background:#E4F5F1;color:#0EA5A0}
  .t-amber{background:#FCF1E2;color:#D97706}
  .t-rose{background:#FCEAF0;color:#E5487D}
  .cat-h .ct{flex:1;font-weight:700;color:var(--head);font-size:.98rem;line-height:1.25}
  .cat-h .badge{font-size:.72rem;font-weight:700;color:var(--muted);background:#F3F4F6;padding:5px 11px;border-radius:999px;white-space:nowrap}

  .files{list-style:none;margin:0;padding:8px;display:flex;flex-direction:column;gap:2px;max-height:320px;overflow-y:auto}
  .files::-webkit-scrollbar{width:6px}
  .files::-webkit-scrollbar-thumb{background:rgba(17,24,39,.14);border-radius:999px}
  .file{display:flex;align-items:center;gap:12px;padding:11px 12px;border-radius:12px;transition:background .16s}
  .file:hover{background:#F7F8FA}
  .file .fi{width:32px;height:32px;flex-shrink:0;border-radius:9px;display:grid;place-items:center;background:#F3F4F6;color:#6B7280}
  .file .fi svg{width:17px;height:17px}
  .file .fn{flex:1;font-size:.88rem;color:var(--ink);font-weight:500;line-height:1.35;min-width:0;overflow:hidden;text-overflow:ellipsis}
  .dlbtn{display:inline-flex;align-items:center;gap:6px;font-size:.78rem;font-weight:700;color:var(--accent);background:var(--accent-soft);border:1px solid rgba(37,99,235,.14);padding:8px 14px;border-radius:999px;text-decoration:none;white-space:nowrap;flex-shrink:0;transition:all .16s}
  .dlbtn:hover{color:#fff;background:var(--accent);border-color:var(--accent);box-shadow:0 6px 14px rgba(37,99,235,.28);transform:translateY(-1px)}
  .dlbtn svg{width:14px;height:14px}
  .na{font-size:.74rem;color:var(--faint);font-style:italic;flex-shrink:0;padding-right:6px}

  .noresult{display:none;text-align:center;padding:44px 20px;color:var(--muted)}
  .noresult svg{width:42px;height:42px;color:var(--faint);margin-bottom:10px}
  @media(max-width:560px){.dl-grid{grid-template-columns:1fr}}
</style>
<section class="sec">
  <div class="wrap">
    <div class="center">
      <span class="eyebrow"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5M12 15V3"/></svg> Pusat Unduhan</span>
      <h1 class="title">Download Dokumen SPMB</h1>
      <p class="subtitle">Formulir, panduan, dan pengumuman resmi dalam satu tempat. Ketik untuk mencari dokumen dengan cepat.</p>
    </div>
    <div class="dl-head">
      <div class="search">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.3-4.3"/></svg>
        <input type="text" id="searchInput" placeholder="Cari dokumen...">
      </div>
    </div>
    <div class="dl-grid" id="dlGrid">
      <?php foreach ($kategori_urutan as $kategori):
            $docs = isset($grouped[$kategori]) ? $grouped[$kategori] : [];
            if (count($docs) == 0) continue;
            list($cls,$icon) = catStyle($kategori);
      ?>
      <div class="cat glass">
        <div class="cat-h">
          <span class="ibadge <?= $cls ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><?= $icon ?></svg></span>
          <span class="ct"><?= htmlspecialchars($kategori) ?></span>
          <span class="badge"><?= count($docs) ?> File</span>
        </div>
        <ul class="files">
          <?php foreach ($docs as $doc): ?>
          <li class="file">
            <span class="fi"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><path d="M14 2v6h6"/></svg></span>
            <span class="fn"><?= htmlspecialchars($doc["nama"]) ?></span>
            <?php if (!empty($doc["link"])): ?>
              <a href="<?= htmlspecialchars($doc["link"]) ?>" target="_blank" class="dlbtn"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><path d="M7 10l5 5 5-5M12 15V3"/></svg>Unduh</a>
            <?php else: ?>
              <span class="na">N/A</span>
            <?php endif; ?>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>

    </div>
    <div class="noresult" id="noResult">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="12" r="9"/><path d="M8 15s1.5-2 4-2 4 2 4 2M9 9h.01M15 9h.01"/></svg>
      <div>Dokumen tidak ditemukan.</div>
    </div>
  </div>
</section>
<script>
(function(){
  var input=document.getElementById('searchInput');
  var nores=document.getElementById('noResult');
  var cats=document.querySelectorAll('.cat');
  input.addEventListener('input',function(){
    var k=this.value.toLowerCase().trim(),total=0;
    cats.forEach(function(cat){
      var items=cat.querySelectorAll('.file'),vis=0;
      items.forEach(function(it){
        var t=it.querySelector('.fn').innerText.toLowerCase();
        if(t.indexOf(k)>-1){it.style.display='flex';vis++;total++;}else{it.style.display='none';}
      });
      cat.style.display=vis===0?'none':'flex';
    });
    nores.style.display=total===0?'block':'none';
  });
})();
</script>
<script>
(function(){
  function reportHeight(){
    var h=Math.max(document.body.scrollHeight,document.documentElement.scrollHeight,document.body.offsetHeight);
    parent.postMessage({simabaFrame:true,id:(window.name||'download'),height:h},'*');
  }
  window.addEventListener('load',reportHeight);
  window.addEventListener('resize',reportHeight);
  if(window.ResizeObserver){new ResizeObserver(reportHeight).observe(document.body);}
  setTimeout(reportHeight,400);setTimeout(reportHeight,1200);
})();
</script>
<script src="assets/site.js?v=3.5"></script>
</body>
</html>
