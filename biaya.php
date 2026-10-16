<?php
require __DIR__ . '/config.php';
/**
 * Biaya Kuliah PMB Unpam 2026
 * Tahun Akademik 2026/2027 - Semester Ganjil
 * Desain selaras dengan jadwal.php
 */

// Data Biaya Kampus
$campusData = [
    'tangsel-s1' => [
        'name' => 'Sarjana (S-1) Tangsel',
        'short' => 'S-1 Tangsel',
        'icon' => 'lucide:building-2',
        'color' => 'blue',
        'registrasi_awal' => [
            'ab' => 'Rp 750.000',
            'csck' => 'Rp 900.000'
        ],
        'items' => [
            [
                'no' => 1,
                'uraian' => 'Formulir Pendaftaran',
                'ab' => 'Rp 100.000',
                'csck' => 'Rp 100.000',
                'keterangan' => 'Gel. 1: Diskon 50%',
                'discount' => false,
                'gel1_price' => 'Rp 150.000'
            ],
            [
                'no' => 2,
                'uraian' => 'Jaket Almamater + KTM',
                'ab' => 'Rp 250.000',
                'csck' => 'Rp 250.000',
                'keterangan' => 'Setelah lulus SPMB'
            ],
            [
                'no' => 3,
                'uraian' => 'Registrasi Awal Semester',
                'ab' => 'Rp 250.000',
                'csck' => 'Rp 250.000',
                'keterangan' => 'Setiap awal semester'
            ],
            [
                'no' => 4,
                'uraian' => 'Biaya Kuliah (per semester)',
                'ab' => 'Rp 1.500.000',
                'csck' => 'Rp 2.400.000',
                'keterangan' => 'A&B: Rp 250rb/angsur<br>CS&CK: Rp 400rb/angsur',
                'highlight' => true
            ],
            [
                'no' => 5,
                'uraian' => 'Angsuran Praktikum',
                'ab' => 'Rp 200.000',
                'csck' => 'Rp 300.000',
                'keterangan' => 'Dilunasi Sebelum UAS',
                'sub_note' => 'Angsuran Praktikum dikhusus-kan untuk Fakultas Teknik, MIPA, Ilmu Komputer, Ilmu Komunikasi & Desain, Serta Program Studi Pendidikan Jasmani'
            ],
            [
                'no' => 6,
                'uraian' => 'Biaya UTS',
                'ab' => 'Rp 300.000',
                'csck' => 'Rp 400.000',
                'keterangan' => 'Dilunasi Sebelum UTS'
            ],
            [
                'no' => 7,
                'uraian' => 'Biaya UAS',
                'ab' => 'Rp 300.000',
                'csck' => 'Rp 400.000',
                'keterangan' => 'Dilunasi Sebelum UAS'
            ]
        ],
        'total_registrasi' => 'Termasuk KTM, Jaket, Registrasi Awal, dan Angsuran Kuliah Pertama'
    ],
    'serang-s1' => [
        'name' => 'Sarjana (S-1) Serang',
        'short' => 'S-1 Serang',
        'icon' => 'lucide:landmark',
        'color' => 'indigo',
        'registrasi_awal' => [
            'ab' => 'Rp 700.000',
            'cs' => 'Rp 800.000'
        ],
        'items' => [
            [
                'no' => 1,
                'uraian' => 'Formulir Pendaftaran',
                'ab' => 'Rp 100.000',
                'csck' => 'Rp 100.000',
                'keterangan' => 'Digratiskan',
                'discount' => true,
                'gel1_price' => 'GRATIS', // Diubah dari Rp 50.000
                'is_free' => true // Flag penanda khusus Serang
            ],
            [
                'no' => 2,
                'uraian' => 'Jaket Almamater + KTM',
                'ab' => 'Rp 250.000',
                'csck' => 'Rp 250.000',
                'keterangan' => 'Setelah lulus SPMB'
            ],
            [
                'no' => 3,
                'uraian' => 'Registrasi Awal Semester',
                'ab' => 'Rp 250.000',
                'csck' => 'Rp 250.000',
                'keterangan' => 'Setiap awal semester'
            ],
            [
                'no' => 4,
                'uraian' => 'Biaya Kuliah (per semester)',
                'ab' => 'Rp 1.200.000',
                'csck' => 'Rp 1.800.000',
                'keterangan' => 'A&B: Rp 200rb/angsur<br>CS: Rp 300rb/angsur',
                'highlight' => true
            ],
            [
                'no' => 5,
                'uraian' => 'Angsuran Praktikum',
                'ab' => 'Rp 100.000',
                'csck' => 'Rp 150.000',
                'keterangan' => 'Dilunasi Sebelum UAS',
                'sub_note' => 'Angsuran Praktikum dikhusus-kan untuk Fakultas Teknik, MIPA, & Ilmu Komputer'
            ],
            [
                'no' => 6,
                'uraian' => 'Biaya UTS',
                'ab' => 'Rp 200.000',
                'csck' => 'Rp 300.000',
                'keterangan' => 'Dilunasi Sebelum UTS'
            ],
            [
                'no' => 7,
                'uraian' => 'Biaya UAS',
                'ab' => 'Rp 200.000',
                'csck' => 'Rp 300.000',
                'keterangan' => 'Dilunasi Sebelum UAS'
            ]
        ],
        'total_registrasi' => 'Termasuk KTM, Jaket, Registrasi Awal, dan Angsuran Kuliah Pertama'
    ],
    'tangsel-s2' => [
        'name' => 'Pascasarjana (S-2) Tangsel',
        'short' => 'S-2 Tangsel',
        'icon' => 'lucide:award',
        'color' => 'violet',
        'registrasi_awal' => [
            'ab' => 'Rp 1.650.000',
            'c' => 'Rp 2.000.000'
        ],
        'items' => [
            [
                'no' => 1,
                'uraian' => 'Formulir Pendaftaran',
                'ab' => 'Rp 200.000',
                'csck' => 'Rp 200.000',
                'keterangan' => 'Full (semua gelombang)',
                'discount' => false
            ],
            [
                'no' => 2,
                'uraian' => 'Jaket Almamater + KTM',
                'ab' => 'Rp 400.000',
                'csck' => 'Rp 400.000',
                'keterangan' => 'Setelah lulus SPMB'
            ],
            [
                'no' => 3,
                'uraian' => 'Matrikulasi',
                'ab' => 'Rp 400.000',
                'csck' => 'Rp 400.000',
                'keterangan' => 'Sekali saat registrasi'
            ],
            [
                'no' => 4,
                'uraian' => 'Registrasi Awal Semester',
                'ab' => 'Rp 250.000',
                'csck' => 'Rp 250.000',
                'keterangan' => 'Setiap awal semester'
            ],
            [
                'no' => 5,
                'uraian' => 'Biaya Kuliah (per semester)',
                'ab' => 'Rp 3.600.000',
                'csck' => 'Rp 5.700.000',
                'keterangan' => 'A&B: Rp 600rb/angsur<br>C: Rp 950rb/angsur',
                'highlight' => true
            ],
            [
                'no' => 6,
                'uraian' => 'Biaya UTS',
                'ab' => 'Rp 450.000',
                'csck' => 'Rp 450.000',
                'keterangan' => 'Dilunasi Sebelum UTS'
            ],
            [
                'no' => 7,
                'uraian' => 'Biaya UAS',
                'ab' => 'Rp 450.000',
                'csck' => 'Rp 450.000',
                'keterangan' => 'Dilunasi Sebelum UAS'
            ]
        ],
        'total_registrasi' => 'Termasuk KTM, Jaket, Matrikulasi, Registrasi Awal, dan Angsuran Kuliah Pertama'
    ]
];
$campusData = pmb_content('biaya', $campusData);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Biaya Kuliah PMB Unpam</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--accent:#2563EB;--accent-soft:#EAF1FE;--glass:rgba(255,255,255,.68);--card:rgba(255,255,255,.72);--shadow:0 1px 2px rgba(16,24,40,.04),0 10px 30px rgba(16,24,40,.06);--r:20px;--maxw:1080px}
*{box-sizing:border-box}
html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,'Segoe UI',Roboto,sans-serif;color:var(--ink);background:#FFFFFF;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);z-index:0;pointer-events:none}
.orb.a{width:440px;height:440px;background:rgba(37,99,235,.10);top:-150px;right:-120px}
.orb.b{width:380px;height:380px;background:rgba(124,92,252,.08);bottom:-170px;left:-120px}
.orb.c{width:300px;height:300px;background:rgba(14,165,160,.07);top:42%;left:56%}
</style>
<style>
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:48px clamp(16px,4vw,32px) 64px}
.phead{text-align:center;margin-bottom:26px}
.eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:.72rem;font-weight:700;letter-spacing:.14em;color:var(--accent);background:var(--accent-soft);border:1px solid rgba(37,99,235,.14);padding:6px 12px;border-radius:999px;text-transform:uppercase}
.title{font-size:clamp(1.7rem,4.4vw,2.5rem);font-weight:800;letter-spacing:-.02em;color:var(--head);margin:14px 0 4px}
.subtitle{color:var(--muted);font-size:1rem;margin:0}
.badges{display:flex;flex-wrap:wrap;gap:10px;justify-content:center;margin-top:16px}
.badge{display:inline-flex;align-items:center;gap:7px;font-size:.76rem;font-weight:600;padding:7px 13px;border-radius:999px;border:1px solid}
.badge svg{width:15px;height:15px}
.b-emerald{background:#E9F7F1;color:#0E7C66;border-color:#CDEEE2}
.b-blue{background:var(--accent-soft);color:#1D4ED8;border-color:#D5E3FD}

.tabs{display:flex;flex-wrap:wrap;justify-content:center;gap:10px;margin-bottom:22px}
.tab{display:inline-flex;align-items:center;gap:8px;font-family:inherit;font-size:.86rem;font-weight:700;color:var(--muted);background:var(--glass);border:1px solid var(--line);padding:11px 18px;border-radius:14px;cursor:pointer;transition:all .2s;backdrop-filter:blur(10px)}
.tab svg{width:18px;height:18px}
.tab:hover{color:var(--head);transform:translateY(-1px)}
.tab.tint-blue{color:#2563EB}.tab.tint-indigo{color:#4F46E5}.tab.tint-violet{color:#7C5CFC}
.tab.active{color:#fff!important;border-color:transparent;box-shadow:0 8px 20px -6px rgba(37,99,235,.35);transform:translateY(-1px)}
.tab.active.tint-blue{background:#2563EB}
.tab.active.tint-indigo{background:#4F46E5;box-shadow:0 8px 20px -6px rgba(79,70,229,.35)}
.tab.active.tint-violet{background:#7C5CFC;box-shadow:0 8px 20px -6px rgba(124,92,252,.35)}

.tabpane{display:none}
.tabpane.show{display:block;animation:fade .35s ease both}
@keyframes fade{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}

.card{border-radius:var(--r);box-shadow:var(--shadow);overflow:hidden}
.glass{background:var(--card);backdrop-filter:blur(16px);border:1px solid rgba(17,24,39,.06)}
.card-h{display:flex;align-items:center;gap:14px;padding:18px 20px;border-bottom:1px solid var(--line)}
.cbadge{width:44px;height:44px;border-radius:13px;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.cbadge svg{width:22px;height:22px}
.tint-blueb{background:#EAF1FE;color:#2563EB}.tint-indigob{background:#ECEBFE;color:#4F46E5}.tint-violetb{background:#F1ECFE;color:#7C5CFC}
.card-h .ct{flex:1;min-width:0}
.card-h h3{margin:0;font-size:1.05rem;font-weight:700;color:var(--head)}
.yearchip{font-size:.72rem;font-weight:600;color:var(--muted);background:#F3F4F6;border:1px solid var(--line);padding:6px 11px;border-radius:999px;white-space:nowrap}

.twrap{overflow-x:auto}
.twrap::-webkit-scrollbar{height:7px}
.twrap::-webkit-scrollbar-thumb{background:rgba(17,24,39,.16);border-radius:999px}
.ptable{width:100%;min-width:740px;border-collapse:collapse}
.ptable thead th{background:#F9FAFB;padding:14px;text-align:left;border-bottom:1px solid var(--line);vertical-align:middle}
.ptable thead .c-no{text-align:center;width:56px}
.ptable thead .c-ab,.ptable thead .c-ck{text-align:center}
.thlab{font-size:.7rem;font-weight:700;color:var(--faint);letter-spacing:.06em;text-transform:uppercase}
.hchip{display:inline-flex;align-items:center;gap:6px;padding:6px 11px;border-radius:9px;font-size:.7rem;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
.hchip svg{width:14px;height:14px}
.chip-blue{background:#EAF1FE;color:#1D4ED8}
.chip-violet{background:#F1ECFE;color:#6D28D9}
.ptable tbody td{padding:14px;border-bottom:1px solid var(--line);vertical-align:middle}
.ptable tbody tr.hl{background:rgba(37,99,235,.045)}
.ptable tbody tr:hover{background:rgba(37,99,235,.03)}
.ptable tbody tr.subrow:hover{background:none}
.c-no{text-align:center;width:56px}
.numb{display:inline-flex;align-items:center;justify-content:center;width:28px;height:28px;background:#F1F3F6;border-radius:9px;font-size:.76rem;font-weight:700;color:var(--muted)}
.c-ab,.c-ck{text-align:center;min-width:150px}
.urwrap{display:flex;align-items:center;gap:8px}
.urt{font-size:.9rem;font-weight:600;color:#374151}
.promo{flex-shrink:0;font-size:.62rem;font-weight:800;letter-spacing:.04em;text-transform:uppercase;color:#B45309;background:#FDF0DA;padding:3px 7px;border-radius:6px}
.price{font-size:.9rem;font-weight:700;color:#374151}
.price.hb{background:#EAF1FE;color:#1D4ED8;padding:5px 12px;border-radius:9px}
.price.hv{background:#F1ECFE;color:#6D28D9;padding:5px 12px;border-radius:9px}
.pcol{display:inline-flex;flex-direction:column;align-items:center;gap:4px}
.old{font-size:.76rem;color:var(--faint);text-decoration:line-through}
.old.red{color:#EF4444;text-decoration-color:#EF4444;opacity:.85}
.new{font-size:.86rem;font-weight:800;color:#0E7C66;background:#E9F7F1;border:1px solid #CDEEE2;padding:4px 11px;border-radius:9px}
.gel{font-size:.62rem;font-weight:700;color:#B45309}
.ket{font-size:.76rem;color:var(--muted);line-height:1.5}
.c-ket{min-width:180px}
.subrow td{padding:0 14px 10px!important;border-bottom:none!important}
.subnote{display:flex;align-items:flex-start;gap:8px;margin-left:36px;padding:10px 12px;background:#FDF7EC;border-left:3px solid #F0B429;border-radius:0 10px 10px 0}
.subnote svg{width:16px;height:16px;color:#D97706;flex-shrink:0;margin-top:1px}
.subnote span{font-size:.74rem;font-weight:500;color:#92610A;line-height:1.5}

.reg{display:flex;align-items:flex-start;gap:12px;padding:16px 20px;border-top:1px solid var(--line);background:linear-gradient(180deg,rgba(37,99,235,.02),rgba(37,99,235,0))}
.reg-i{width:32px;height:32px;border-radius:10px;background:var(--accent);color:#fff;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.reg-i svg{width:17px;height:17px}
.reg-b{flex:1;min-width:0}
.reg-b h4{margin:0 0 9px;font-size:.86rem;font-weight:700;color:var(--head)}
.reg-grid{display:grid;grid-template-columns:1fr 1fr;gap:10px}
.reg-item{display:flex;align-items:center;gap:8px;padding:9px 12px;background:#fff;border:1px solid var(--line);border-radius:11px;font-size:.82rem;color:var(--muted)}
.reg-item svg{width:16px;height:16px;color:#2563EB;flex-shrink:0}
.reg-item.alt svg{color:#7C5CFC}
.reg-item strong{color:var(--head);font-weight:700}
.reg-note{margin:9px 0 0;font-size:.72rem;font-style:italic;color:var(--faint)}

.notes{margin-top:22px;padding:20px 22px}
.notes-h{display:flex;align-items:center;gap:12px;margin-bottom:14px}
.notes-h .ni{width:38px;height:38px;border-radius:11px;background:#FEF3E2;color:#D97706;display:flex;align-items:center;justify-content:center;flex-shrink:0}
.notes-h .ni svg{width:19px;height:19px}
.notes-h h4{margin:0;font-size:1rem;font-weight:700;color:var(--head)}
.notes ul{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:10px}
.notes li{display:flex;align-items:flex-start;gap:9px;font-size:.86rem;color:var(--muted);line-height:1.55}
.notes li svg{width:17px;height:17px;flex-shrink:0;margin-top:2px}
.notes li.i-em svg{color:#10B981}.notes li.i-bl svg{color:#2563EB}.notes li.i-ro svg{color:#F43F5E}
.notes li strong{color:var(--head);font-weight:700}
.notes a{color:var(--accent);font-weight:700;text-decoration:none}
.notes a:hover{text-decoration:underline}

@media(max-width:560px){
  .reg-grid{grid-template-columns:1fr}
  .card-h{padding:16px}
  .yearchip{display:none}
}
</style>

<?php
$SVG='fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"';
$I_BUILDING='<svg viewBox="0 0 24 24" '.$SVG.'><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>';
$I_LAND='<svg viewBox="0 0 24 24" '.$SVG.'><path d="M3 22h18"/><path d="M6 18v-7M10 18v-7M14 18v-7M18 18v-7"/><path d="M12 2 21 7H3z"/></svg>';
$I_AWARD='<svg viewBox="0 0 24 24" '.$SVG.'><circle cx="12" cy="8" r="6"/><path d="M15.5 13.5 17 22l-5-3-5 3 1.5-8.5"/></svg>';
$I_USERS='<svg viewBox="0 0 24 24" '.$SVG.'><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>';
$I_CROWN='<svg viewBox="0 0 24 24" '.$SVG.'><path d="M2 18h20"/><path d="M4 18 2.5 8l5 3.5L12 5l4.5 6.5 5-3.5L20 18z"/></svg>';
$I_CHECK='<svg viewBox="0 0 24 24" '.$SVG.'><circle cx="12" cy="12" r="9"/><path d="m8.5 12 2.2 2.2 4.8-4.8"/></svg>';
$I_INFO='<svg viewBox="0 0 24 24" '.$SVG.'><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg>';
$I_ALERT='<svg viewBox="0 0 24 24" '.$SVG.'><path d="M10.3 3.3 1.8 18a2 2 0 0 0 1.7 3h17a2 2 0 0 0 1.7-3L13.7 3.3a2 2 0 0 0-3.4 0z"/><path d="M12 9v4M12 17h.01"/></svg>';
$I_SPARK='<svg viewBox="0 0 24 24" '.$SVG.'><path d="M12 3l1.6 4.6L18 9l-4.4 1.4L12 15l-1.6-4.6L6 9z"/><path d="M18.5 14l.9 2.4 2.6 1-2.6.9-.9 2.5-.9-2.5-2.6-.9 2.6-1z"/></svg>';
?>
<div class="orb a"></div><div class="orb b"></div><div class="orb c"></div>
<main class="wrap">
  <header class="phead">
    <h1 class="title">Biaya Kuliah UNPAM</h1>
    <p class="subtitle">Semester Ganjil 2026/2027</p>
    <div class="badges">
      <span class="badge b-emerald"><?= $I_CHECK ?>Diskon 50% Formulir Gelombang 1 (Khusus Sarjana &amp; Diploma)</span>
      <span class="badge b-blue"><?= $I_SPARK ?>3 Gelombang Pendaftaran</span>
    </div>
  </header>

  <nav class="tabs">
    <?php
      $tabIcon = ['tangsel-s1'=>$I_BUILDING,'serang-s1'=>$I_LAND,'tangsel-s2'=>$I_AWARD];
      $tabTint = ['tangsel-s1'=>'tint-blue','serang-s1'=>'tint-indigo','tangsel-s2'=>'tint-violet'];
      foreach ($campusData as $key => $campus):
    ?>
    <button class="tab <?= $tabTint[$key] ?> <?= $key==='tangsel-s1' ? 'active' : '' ?>" data-tab="<?= $key ?>">
      <?= $tabIcon[$key] ?><span><?= $campus['short'] ?></span>
    </button>
    <?php endforeach; ?>
  </nav>

  <div class="panes">
  <?php foreach ($campusData as $key => $campus):
        $label2 = $key==='tangsel-s2' ? 'Reguler C' : ($key==='serang-s1' ? 'Reguler CS' : 'Reguler CS & CK');
        $val2 = $key==='tangsel-s2' ? $campus['registrasi_awal']['c'] : ($key==='serang-s1' ? $campus['registrasi_awal']['cs'] : $campus['registrasi_awal']['csck']);
        $cbt = $campus['color']==='blue' ? 'tint-blueb' : ($campus['color']==='indigo' ? 'tint-indigob' : 'tint-violetb');
        $cicon = $campus['color']==='blue' ? $I_BUILDING : ($campus['color']==='indigo' ? $I_LAND : $I_AWARD);
  ?>
    <div class="tabpane <?= $key==='tangsel-s1' ? 'show' : '' ?>" data-pane="<?= $key ?>">
      <div class="card glass">
        <div class="card-h">
          <span class="cbadge <?= $cbt ?>"><?= $cicon ?></span>
          <div class="ct"><h3><?= $campus['name'] ?></h3></div>
          <span class="yearchip">Tahun Akademik 2026/2027</span>
        </div>
        <div class="twrap">
          <table class="ptable">
            <thead>
              <tr>
                <th class="c-no"><span class="thlab">No</span></th>
                <th class="c-ur"><span class="thlab">Uraian Biaya</span></th>
                <th class="c-ab"><span class="hchip chip-blue"><?= $I_USERS ?>Reguler A &amp; B</span></th>
                <th class="c-ck"><span class="hchip chip-violet"><?= $I_CROWN ?><?= $label2 ?></span></th>
                <th class="c-ket"><span class="thlab">Keterangan</span></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($campus['items'] as $item):
                    $disc = isset($item['discount']) && $item['discount'];
                    $hl = isset($item['highlight']) && $item['highlight'];
                    $free = isset($item['is_free']) && $item['is_free'];
              ?>
              <tr class="<?= $hl ? 'hl' : '' ?>">
                <td class="c-no"><span class="numb"><?= $item['no'] ?></span></td>
                <td class="c-ur">
                  <div class="urwrap">
                    <?php if ($disc): ?><span class="promo">Promo</span><?php endif; ?>
                    <span class="urt"><?= $item['uraian'] ?></span>
                  </div>
                </td>
                <td class="c-ab">
                  <?php if ($disc): ?>
                    <div class="pcol"><span class="old <?= $free ? 'red' : '' ?>"><?= $item['ab'] ?></span><span class="new"><?= $item['gel1_price'] ?></span></div>
                  <?php else: ?>
                    <span class="price <?= $hl ? 'hb' : '' ?>"><?= $item['ab'] ?></span>
                  <?php endif; ?>
                </td>
                <td class="c-ck">
                  <?php if ($disc): ?>
                    <div class="pcol"><span class="old <?= $free ? 'red' : '' ?>"><?= $item['csck'] ?></span><span class="new"><?= $item['gel1_price'] ?></span><span class="gel">Gel. 1</span></div>
                  <?php else: ?>
                    <span class="price <?= $hl ? 'hv' : '' ?>"><?= $item['csck'] ?></span>
                  <?php endif; ?>
                </td>
                <td class="c-ket"><span class="ket"><?= $item['keterangan'] ?></span></td>
              </tr>
              <?php if (isset($item['sub_note'])): ?>
              <tr class="subrow">
                <td colspan="5"><div class="subnote"><?= $I_INFO ?><span><?= $item['sub_note'] ?></span></div></td>
              </tr>
              <?php endif; ?>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <div class="reg">
          <span class="reg-i"><?= $I_INFO ?></span>
          <div class="reg-b">
            <h4>Biaya Registrasi Awal:</h4>
            <div class="reg-grid">
              <div class="reg-item"><?= $I_CHECK ?><span>Reguler A &amp; B: <strong><?= $campus['registrasi_awal']['ab'] ?></strong></span></div>
              <div class="reg-item alt"><?= $I_CHECK ?><span><?= $label2 ?>: <strong><?= $val2 ?></strong></span></div>
            </div>
            <p class="reg-note">*<?= $campus['total_registrasi'] ?></p>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </div>

  <section class="notes card glass">
    <div class="notes-h"><span class="ni"><?= $I_ALERT ?></span><h4>Catatan Penting:</h4></div>
    <ul>
      <li class="i-em"><?= $I_CHECK ?><span><strong>Bebas Uang Gedung</strong></span></li>
      <li class="i-bl"><?= $I_CHECK ?><span>Diskon 50% formulir hanya berlaku untuk <strong>Gelombang 1</strong> program Sarjana (S-1)</span></li>
      <li class="i-ro"><?= $I_CHECK ?><span>Detail biaya pendidikan persemester dapat diakses pada laman <a href="https://lak.unpam.ac.id" target="_blank" rel="noopener noreferrer">lak.unpam.ac.id</a></span></li>
    </ul>
  </section>
</main>
<script>
(function(){
  var tabs=document.querySelectorAll('.tab');
  var panes=document.querySelectorAll('.tabpane');
  function show(id){
    tabs.forEach(function(t){t.classList.toggle('active',t.getAttribute('data-tab')===id);});
    panes.forEach(function(p){p.classList.toggle('show',p.getAttribute('data-pane')===id);});
  }
  tabs.forEach(function(t){t.addEventListener('click',function(){show(t.getAttribute('data-tab'));});});
})();
</script>
<script src="assets/site.js?v=3.5"></script>
</body>
</html>
