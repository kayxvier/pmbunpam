<?php
require __DIR__ . '/config.php';
$settings = pmb_settings();
$scheduleData = pmb_content('schedule');
$stage_map = array(
    'pendaftaran' => array('Pendaftaran', 'si-blue'),
    'spmb_online' => array('SPMB (Online)', 'si-indigo'),
    'pengumuman' => array('Pengumuman', 'si-amber'),
    'registrasi' => array('Registrasi', 'si-emerald'),
    'pkkmb' => array('PKKMB', 'si-rose'),
);
$color_map = array('blue'=>'gc-blue','indigo'=>'gc-indigo','sky'=>'gc-sky','violet'=>'gc-indigo','emerald'=>'gc-blue');
function jadwal_h($value) { return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8'); }
function jadwal_icon($key) {
    $icons = array(
        'pendaftaran'=>'<path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M19 8v6M22 11h-6"/>',
        'spmb_online'=>'<rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/><path d="m10 8 4 2.5-4 2.5z" fill="currentColor" stroke="none"/>',
        'pengumuman'=>'<path d="M4 10v4a1 1 0 0 0 1 1h2l4 4V5L7 9H5a1 1 0 0 0-1 1z"/><path d="M16 9a4 4 0 0 1 0 6"/>',
        'registrasi'=>'<path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><rect x="8" y="2" width="8" height="4" rx="1"/><path d="m9 14 2 2 4-4"/>',
        'pkkmb'=>'<path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12.5V17c0 1.1 2.7 2.5 6 2.5s6-1.4 6-2.5v-4.5"/>',
    );
    return isset($icons[$key]) ? $icons[$key] : '<circle cx="12" cy="12" r="9"/>';
}
?><!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo jadwal_h($settings['site']['name'] . ' — Jadwal'); ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--accent:#2563EB;--bg:#F6F8FC;--glass:rgba(255,255,255,.68);--shadow:0 1px 2px rgba(16,24,40,.04),0 10px 28px rgba(16,24,40,.06);--r:22px;--maxw:1080px}
*{box-sizing:border-box}html,body{margin:0;padding:0}body{font-family:'Plus Jakarta Sans',system-ui,sans-serif;color:var(--ink);background:var(--bg);line-height:1.5;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}.orb.a{width:460px;height:460px;background:#DCE8FF;top:-160px;right:-120px}.orb.b{width:400px;height:400px;background:#E0F2FE;bottom:-160px;left:-130px}.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:46px 22px 56px}.phead{text-align:center;margin-bottom:20px}.eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);background:#EAF1FE;padding:6px 14px;border-radius:999px}.title{font-size:clamp(27px,4.8vw,40px);font-weight:800;letter-spacing:-.02em;color:var(--head);margin:15px 0 6px}.subtitle{color:var(--muted);font-size:clamp(14px,2.4vw,16px);margin:0}.stats{display:flex;flex-wrap:wrap;justify-content:center;gap:12px;margin-top:18px}.stat{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.75);border:1px solid var(--line);border-radius:999px;padding:9px 16px;font-size:13.5px;font-weight:500;color:#374151;box-shadow:var(--shadow)}.stat strong{font-weight:700;color:var(--head)}.stat svg{width:17px;height:17px;color:var(--accent)}.grid{display:grid;grid-template-columns:repeat(2,1fr);gap:20px;margin-top:28px;max-width:840px;margin-left:auto;margin-right:auto}.gcard{background:var(--glass);backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow);border-radius:var(--r);overflow:hidden;display:flex;flex-direction:column}.gc-head{padding:18px 20px;display:flex;align-items:center;gap:14px;color:#fff}.gc-blue{background:linear-gradient(135deg,#2563EB,#3B82F6)}.gc-indigo{background:linear-gradient(135deg,#4F46E5,#6366F1)}.gc-sky{background:linear-gradient(135deg,#0284C7,#38BDF8)}.gc-badge{width:48px;height:48px;border-radius:14px;background:rgba(255,255,255,.2);border:1px solid rgba(255,255,255,.4);display:grid;place-items:center;font-weight:800;font-size:20px;flex:0 0 auto}.gc-k{font-size:11px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;opacity:.85}.gc-t h3{margin:2px 0 0;font-size:18px;font-weight:800}.stages{padding:6px 18px 16px}.stage{display:flex;align-items:center;gap:13px;padding:12px 2px;border-bottom:1px solid var(--line)}.stage:last-child{border-bottom:none}.si{width:38px;height:38px;border-radius:11px;display:grid;place-items:center;flex:0 0 auto}.si svg{width:19px;height:19px}.si-blue{background:#EAF1FE;color:#2563EB}.si-indigo{background:#ECEBFE;color:#4F46E5}.si-amber{background:#FDF0DA;color:#B45309}.si-emerald{background:#E9F7F1;color:#0E7C66}.si-rose{background:#FCE8EC;color:#E11D48}.si-cyan{background:#E0F2FE;color:#0891B2}.sx{display:flex;flex-direction:column;min-width:0}.sl{font-size:10.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;color:var(--faint)}.sd{font-size:14px;font-weight:700;color:var(--head);margin-top:1px;white-space:pre-line}.sn{font-size:11.5px;font-weight:500;color:var(--muted);margin-top:3px;line-height:1.45}.note{margin-top:22px;background:#FEF3F2;border:1px solid #FBD5D0;border-left:4px solid #F04438;border-radius:14px;padding:14px 16px;font-size:13.5px;color:#912018;line-height:1.55;display:flex;align-items:center;gap:11px}.note strong{color:#7A271A}.note+.note{margin-top:12px}.note.alt{background:#FFFBEB;border-color:#FDE68A;border-left-color:#F59E0B;color:#7C4A03;align-items:flex-start}.foot{text-align:center;color:var(--faint);font-size:12.5px;margin-top:26px}@media(max-width:860px){.grid{grid-template-columns:1fr;max-width:520px}}@media(max-width:520px){.wrap{padding:34px 16px 46px}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap" id="pmb-jadwal">
  <header class="phead">
    <span class="eyebrow">Jadwal SPMB Semester Genap</span>
    <h1 class="title" data-pmb-text="schedule_title">Tanggal-Tanggal Penting</h1>
    <p class="subtitle">Semester Genap Tahun Akademik 2026/2027</p>
    <div class="stats">
      <span class="stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 1.3 0 1.9-.5 2.5-1"/><path d="M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 1.3 0 1.9-.5 2.5-1"/><path d="M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.4-2 5-2 2.6 0 2.4 2 5 2 1.3 0 1.9-.5 2.5-1"/></svg><span>Total ada <strong><?php echo count($scheduleData); ?></strong> Gelombang!</span></span>
      <span class="stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg><span>SPMB Semester <strong>Genap</strong> 2026/2027</span></span>
    </div>
  </header>
  <div class="grid">
  <?php foreach ($scheduleData as $row): $color = isset($color_map[$row['color'] ?? '']) ? $color_map[$row['color']] : 'gc-blue'; ?>
    <article class="gcard glass">
      <div class="gc-head <?php echo $color; ?>"><span class="gc-badge"><?php echo jadwal_h($row['gel'] ?? ($row['no'] ?? '')); ?></span><div class="gc-t"><span class="gc-k">Gelombang <?php echo jadwal_h($row['gel'] ?? ''); ?></span><h3><?php echo jadwal_h($row['gel_label'] ?? 'Gelombang'); ?></h3></div></div>
      <div class="stages">
      <?php foreach ($stage_map as $key => $stage): if (!isset($row[$key]) || $row[$key] === '') continue; ?>
        <div class="stage"><span class="si <?php echo $stage[1]; ?>"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><?php echo jadwal_icon($key); ?></svg></span><div class="sx"><span class="sl"><?php echo $stage[0]; ?></span><span class="sd"><?php echo nl2br(jadwal_h($row[$key])); ?></span></div></div>
      <?php endforeach; ?>
      </div>
    </article>
  <?php endforeach; ?>
  </div>
  <div class="note"><span style="font-size:20px">ⓘ</span><span><strong>Catatan:</strong> Tidak ada perpanjangan waktu untuk setiap tahapan.</span></div>
  <div class="note alt"><span style="font-size:20px">✎</span><span><strong>*Catatan:</strong> Pendaftaran dan pindah program perkuliahan/Program Studi, paling lambat 4 hari sebelum terselenggaranya SPMB.</span></div>
  <p class="foot">Universitas Pamulang · Jadwal SPMB Semester Genap Tahun Akademik 2026/2027</p>
</main>
<script src="assets/site.js?v=<?php echo PMB_VER; ?>"></script>
</body></html>
