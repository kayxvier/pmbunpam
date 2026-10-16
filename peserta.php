<?php
require __DIR__ . '/config.php';
$PMB_SITE = pmb_settings();
// ===================== KONFIGURASI TAMPILAN =====================
// Semua pengaturan tampil/sembunyi data ada di file: toggle.php
$cfg = @include __DIR__ . '/toggle.php';
if (!is_array($cfg)) { $cfg = ['mode'=>'manual','show'=>true]; }
if (is_file(PMB_SETTINGS_FILE) && !empty($PMB_SITE['participants'])) {
    $cfg = pmb_array_merge_recursive($cfg, $PMB_SITE['participants']);
}
date_default_timezone_set('Asia/Jakarta');
$mode = isset($cfg['mode']) ? $cfg['mode'] : 'manual';
if ($mode === 'auto') {
    // Otomatis sembunyi setelah waktu ujian gelombang berakhir
    $deadline = isset($cfg['ujian_selesai']) ? strtotime($cfg['ujian_selesai']) : null;
    $show = $deadline ? (time() <= $deadline) : true;
} else {
    // Mode manual: ikut nilai 'show'
    $show = !empty($cfg['show']);
}
// Muat data peserta
$peserta = [];
$raw = @file_get_contents(__DIR__ . '/peserta.json');
if ($raw !== false) { $tmp = json_decode($raw, true); if (is_array($tmp)) $peserta = $tmp; }
header('X-Frame-Options: ALLOWALL');
?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tracing Peserta Ujian — <?php echo pmb_esc(isset($cfg['gelombang']) ? $cfg['gelombang'] : ''); ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--accent:#2563EB;--bg:#F6F8FC;--glass:rgba(255,255,255,.68);--shadow:0 1px 2px rgba(16,24,40,.04),0 10px 28px rgba(16,24,40,.06);--r:22px;--maxw:1080px}
*{box-sizing:border-box}html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;color:var(--ink);background:var(--bg);line-height:1.5;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}
.orb.a{width:460px;height:460px;background:#DCE8FF;top:-160px;right:-120px}
.orb.b{width:400px;height:400px;background:#E0F2FE;bottom:-160px;left:-130px}
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:46px 22px 56px}
.phead{text-align:center;margin-bottom:20px}
.eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);background:#EAF1FE;padding:6px 14px;border-radius:999px}
.title{font-size:clamp(26px,4.6vw,38px);font-weight:800;letter-spacing:-.02em;color:var(--head);margin:15px 0 6px}
.subtitle{color:var(--muted);font-size:clamp(14px,2.4vw,16px);margin:0}
.glass{background:var(--glass);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.info{border-radius:18px;padding:18px 20px;margin-top:24px;font-size:13.6px;line-height:1.65;color:#374151}
.info .ih{display:flex;align-items:center;gap:9px;font-weight:800;color:var(--head);margin-bottom:8px;font-size:14.5px}
.info .ih svg{width:19px;height:19px;color:var(--accent);flex:0 0 auto}
.info b{color:var(--head);font-weight:700}
.info a{color:var(--accent);font-weight:700;text-decoration:none}
.info a:hover{text-decoration:underline}
.info .tag{display:inline-block;background:#EAF1FE;color:#1E40AF;font-weight:700;padding:1px 8px;border-radius:6px;font-size:12.5px}
.toolbar{border-radius:16px;padding:14px 16px;margin-top:22px;display:flex;flex-wrap:wrap;align-items:center;gap:12px}
.toolbar label{font-weight:700;color:var(--head);font-size:14px}
.search{position:relative;flex:1 1 260px;min-width:0}
.search svg{position:absolute;left:12px;top:50%;transform:translateY(-50%);width:17px;height:17px;color:var(--faint)}
.search input{width:100%;padding:11px 14px 11px 36px;border:1px solid var(--line);border-radius:11px;background:#fff;font:inherit;font-size:14px;color:var(--ink);outline:none;transition:border-color .15s,box-shadow .15s}
.search input:focus{border-color:var(--accent);box-shadow:0 0 0 3px rgba(37,99,235,.12)}
.count{font-size:13px;color:var(--muted);font-weight:600;white-space:nowrap}
.count b{color:var(--head)}
.tablewrap{border-radius:18px;margin-top:14px;overflow:hidden}
.scroll{overflow-x:auto}
table{width:100%;border-collapse:collapse;min-width:760px}
thead th{background:#F3F6FB;color:#475569;font-size:11px;font-weight:800;letter-spacing:.05em;text-transform:uppercase;text-align:left;padding:14px 16px;border-bottom:1px solid var(--line);white-space:nowrap}
tbody td{padding:13px 16px;border-bottom:1px solid var(--line);font-size:13.5px;color:#334155;vertical-align:middle}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover{background:#F8FAFF}
.c-no{width:56px;color:var(--faint);font-weight:700}
.c-user{font-variant-numeric:tabular-nums;font-weight:700;color:var(--head);white-space:nowrap}
.c-nama{font-weight:700;color:var(--head)}
.c-prodi{color:#475569}
.wk{display:inline-block;background:#F1F5F9;color:#475569;font-weight:700;font-size:12px;padding:3px 9px;border-radius:7px;white-space:nowrap}
.pill{display:inline-flex;align-items:center;gap:6px;font-weight:700;font-size:12px;padding:4px 11px;border-radius:999px;white-space:nowrap}
.pill svg{width:13px;height:13px}
.pill-green{background:#E6F6EF;color:#0E7C66}
.pill-blue{background:#EAF1FE;color:#1E40AF}
.pill-amber{background:#FDF0DA;color:#B45309}
.subtag{display:inline-block;margin-top:5px;background:#FEECEC;color:#B42318;font-weight:700;font-size:10.5px;padding:2px 7px;border-radius:6px;white-space:nowrap}
.empty{text-align:center;color:var(--muted);padding:34px 16px;font-size:14px}
.pagination{display:flex;flex-wrap:wrap;justify-content:center;gap:6px;margin-top:20px;list-style:none;padding:0}
.pagination button{min-width:38px;height:38px;padding:0 12px;border:1px solid var(--line);background:#fff;color:#475569;font:inherit;font-size:13.5px;font-weight:700;border-radius:10px;cursor:pointer;transition:all .15s}
.pagination button:hover:not(:disabled){border-color:var(--accent);color:var(--accent)}
.pagination button.active{background:var(--accent);border-color:var(--accent);color:#fff}
.pagination button:disabled{opacity:.45;cursor:not-allowed}
.notice-state{border-radius:var(--r);margin-top:30px;padding:52px 28px;text-align:center;display:flex;flex-direction:column;align-items:center}
.ns-ic{width:76px;height:76px;border-radius:22px;background:linear-gradient(135deg,#EAF1FE,#E0F2FE);display:grid;place-items:center;color:var(--accent);margin-bottom:20px}
.ns-ic svg{width:36px;height:36px}
.notice-state h2{margin:0 0 10px;font-size:clamp(20px,3.4vw,26px);font-weight:800;letter-spacing:-.01em;color:var(--head)}
.notice-state p{margin:0 auto;max-width:440px;color:var(--muted);font-size:14.5px;line-height:1.6}
.ns-tag{margin-top:18px;display:inline-flex;align-items:center;gap:7px;background:#EAF1FE;color:#1E40AF;font-weight:700;font-size:13px;padding:8px 16px;border-radius:999px}
.ns-tag svg{width:15px;height:15px}
.foot{text-align:center;color:var(--faint);font-size:12.5px;margin-top:28px}
@media(max-width:520px){.wrap{padding:34px 15px 46px}.toolbar label{width:100%}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap">
  <header class="phead">
    <span class="eyebrow">Data Peserta Ujian</span>
    <h1 class="title">Tracing Peserta Ujian</h1>
    <p class="subtitle">Penerimaan Mahasiswa Baru · Gelombang 4</p>
  </header>
<?php if ($show): ?>
<div class="info glass">
  <div class="ih"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg><span>Informasi Validasi Data Peserta <span class="tag">Gelombang 4</span></span></div>
  Bagi peserta yang namanya tercantum pada tabel, status data Saudara/i telah berhasil <b>divalidasi</b> pada sistem kami.<br>
  Apabila nama Saudara/i tidak tercantum, maka status verifikasi dinyatakan <b>gagal</b>, dan diharapkan dapat melakukan konfirmasi ke <b>Bagian Penerimaan Mahasiswa Baru UNPAM Pusat atau Viktor</b>.<br>
  Untuk peserta yang memperoleh keterangan <b>“WAJIB MENGIKUTI UJIAN ONLINE”</b>, silakan login menggunakan username yang tertera dan password berupa tanggal lahir dengan format <b>DDMMYY</b> (contoh: 20-10-2008 &rarr; <b>201008</b>).<br>
  Ujian dapat diakses melalui <b><a href="https://spmb.unpam.ac.id/" target="_top" rel="noopener">spmb.unpam.ac.id</a></b>, dan tata cara ujian dapat dilihat pada <b><a href="https://instagram.com/p/DLXfWpBJxTi" target="_blank" rel="noopener">Postingan Instagram</a></b> ini.
</div>
  <div class="toolbar glass">
    <label for="searchInput">Cari Peserta</label>
    <div class="search"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg><input type="text" id="searchInput" placeholder="Ketik nama, username, atau program studi..." autocomplete="off"></div>
    <span class="count" id="count"></span>
  </div>
  <div class="tablewrap glass"><div class="scroll"><table>
    <thead><tr><th>No</th><th>Username</th><th>Nama</th><th>Program Studi</th><th>Waktu Kuliah</th><th>Status Peserta</th></tr></thead>
    <tbody id="tableBody"></tbody>
  </table></div></div>
  <nav class="pagination" id="pagination"></nav>
<?php else: ?>
<div class="notice-state glass">
    <div class="ns-ic"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12a9 9 0 1 1-3-6.7L21 8"/><path d="M21 3v5h-5"/></svg></div>
    <h2>Proses Update Data Gelombang Selanjutnya</h2>
    <p>Waktu ujian untuk gelombang ini telah berakhir. Data peserta sedang diperbarui untuk gelombang berikutnya. Silakan cek kembali beberapa saat lagi.</p>
    <span class="ns-tag"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/></svg>Menunggu pembaruan data</span>
  </div>
<?php endif; ?>
  <p class="foot">Universitas Pamulang · Data Peserta Gelombang 4</p>
</main>
<?php if ($show): ?>
<script>window.PESERTA = <?php echo json_encode($peserta, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES); ?>;</script>
<script>
(function(){
  var DATA = window.PESERTA || [];
  var PER = 10;
  var page = 1;
  var filtered = DATA;
  var body = document.getElementById('tableBody');
  var pag = document.getElementById('pagination');
  var input = document.getElementById('searchInput');
  var countEl = document.getElementById('count');

  function esc(s){return String(s==null?'':s).replace(/[&<>"']/g,function(c){return{'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c];});}

  var CHECK='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="m20 6-11 11-5-5"/></svg>';
  var PEN='<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 8v5M12 16h.01"/><circle cx="12" cy="12" r="9"/></svg>';

  function statusCell(status){
    var s=String(status||'');
    var belum=/BELUM BAYAR FORMULIR/i.test(s);
    var base=s.replace(/\s*-\s*BELUM BAYAR FORMULIR/i,'').trim();
    var cls,ic;
    if(/BEBAS TES TULIS/i.test(base)){cls='pill-green';ic=CHECK;}
    else if(/WAJIB UJIAN TES TERTULIS/i.test(base)){cls='pill-blue';ic=PEN;}
    else {cls='pill-amber';ic=PEN;}
    var html='<span class="pill '+cls+'">'+ic+esc(base)+'</span>';
    if(belum) html+='<br><span class="subtag">Belum Bayar Formulir</span>';
    return html;
  }

  function render(){
    var total=filtered.length;
    var pages=Math.max(1,Math.ceil(total/PER));
    if(page>pages)page=pages;
    var start=(page-1)*PER;
    var slice=filtered.slice(start,start+PER);
    if(countEl)countEl.innerHTML='Menampilkan <b>'+(total?start+1:0)+'\u2013'+(start+slice.length)+'</b> dari <b>'+total.toLocaleString('id-ID')+'</b> peserta';
    if(!slice.length){
      body.innerHTML='<tr><td colspan="6" class="empty">Tidak ada peserta ditemukan.</td></tr>';
      pag.innerHTML='';
      return;
    }
    var h='';
    for(var i=0;i<slice.length;i++){
      var r=slice[i];
      h+='<tr>'+
        '<td class="c-no">'+(start+i+1)+'</td>'+
        '<td class="c-user">'+esc(r.username)+'</td>'+
        '<td class="c-nama">'+esc(r.nama)+'</td>'+
        '<td class="c-prodi">'+esc(r.program_studi)+'</td>'+
        '<td><span class="wk">'+esc(r.waktu_kuliah)+'</span></td>'+
        '<td>'+statusCell(r.status)+'</td>'+
      '</tr>';
    }
    body.innerHTML=h;
    renderPag(pages);
  }

  function btn(label,p,opts){
    opts=opts||{};
    var b=document.createElement('button');
    b.innerHTML=label;
    if(opts.active)b.className='active';
    if(opts.disabled)b.disabled=true;
    else b.addEventListener('click',function(){page=p;render();scrollTop();});
    pag.appendChild(b);
  }
  function scrollTop(){var t=document.querySelector('.toolbar');if(t)t.scrollIntoView({behavior:'smooth',block:'start'});}

  function renderPag(pages){
    pag.innerHTML='';
    if(pages<=1)return;
    btn('\u2039 Prev',page-1,{disabled:page===1});
    var max=7,sp=Math.max(1,page-Math.floor(max/2)),ep=sp+max-1;
    if(ep>pages){ep=pages;sp=Math.max(1,ep-max+1);}
    if(sp>1){btn('1',1,{});if(sp>2){var d=document.createElement('button');d.textContent='\u2026';d.disabled=true;pag.appendChild(d);}}
    for(var i=sp;i<=ep;i++)btn(String(i),i,{active:i===page});
    if(ep<pages){if(ep<pages-1){var d2=document.createElement('button');d2.textContent='\u2026';d2.disabled=true;pag.appendChild(d2);}btn(String(pages),pages,{});}
    btn('Next \u203a',page+1,{disabled:page===pages});
  }

  function doSearch(){
    var k=input.value.trim().toLowerCase();
    filtered=!k?DATA:DATA.filter(function(r){
      return String(r.nama||'').toLowerCase().indexOf(k)>-1||
             String(r.username||'').toLowerCase().indexOf(k)>-1||
             String(r.program_studi||'').toLowerCase().indexOf(k)>-1;
    });
    page=1;render();
  }
  var t;
  input.addEventListener('input',function(){clearTimeout(t);t=setTimeout(doSearch,180);});
  render();
})();

</script>
<?php endif; ?>
<script src="assets/site.js?v=<?php echo PMB_VER; ?>"></script>
</body></html>
