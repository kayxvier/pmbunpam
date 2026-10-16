<?php header("X-Frame-Options: ALLOWALL"); ?>
<!doctype html>
<html lang="id"><head>
<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Ukuran Jas Almamater</title>
<link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
:root{--ink:#111827;--head:#0B1220;--muted:#6B7280;--faint:#9CA3AF;--line:#EDF0F4;--accent:#2563EB;--bg:#F6F8FC;--glass:rgba(255,255,255,.7);--shadow:0 1px 2px rgba(16,24,40,.04),0 10px 28px rgba(16,24,40,.06);--r:22px;--maxw:1080px}
*{box-sizing:border-box}html,body{margin:0;padding:0}
body{font-family:'Plus Jakarta Sans',system-ui,-apple-system,Segoe UI,Roboto,sans-serif;color:var(--ink);background:var(--bg);line-height:1.5;-webkit-font-smoothing:antialiased;position:relative;overflow-x:hidden}
.orb{position:fixed;border-radius:50%;filter:blur(70px);opacity:.5;z-index:0;pointer-events:none}
.orb.a{width:460px;height:460px;background:#DCE8FF;top:-160px;right:-120px}
.orb.b{width:400px;height:400px;background:#E0F2FE;bottom:-160px;left:-130px}
.wrap{position:relative;z-index:1;max-width:var(--maxw);margin:0 auto;padding:46px 22px 56px}
.phead{text-align:center;margin-bottom:22px}
.eyebrow{display:inline-block;font-size:12px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--accent);background:#EAF1FE;padding:6px 14px;border-radius:999px}
.title{font-size:clamp(27px,4.8vw,40px);font-weight:800;letter-spacing:-.02em;color:var(--head);margin:15px 0 6px}
.subtitle{color:var(--muted);font-size:clamp(14px,2.4vw,16px);margin:0}
.glass{background:var(--glass);backdrop-filter:blur(14px);-webkit-backdrop-filter:blur(14px);border:1px solid rgba(255,255,255,.7);box-shadow:var(--shadow)}
.card{border-radius:var(--r);overflow:hidden;margin-top:8px}
.cardtitle{display:flex;align-items:center;gap:10px;padding:18px 22px;border-bottom:1px solid var(--line)}
.cardtitle svg{width:20px;height:20px;color:var(--accent);flex:0 0 auto}
.cardtitle h2{margin:0;font-size:15px;font-weight:800;letter-spacing:.02em;text-transform:uppercase;color:var(--head)}
.cardtitle .unit{margin-left:auto;font-size:12px;font-weight:700;color:var(--accent);background:#EAF1FE;padding:4px 11px;border-radius:999px;white-space:nowrap}
.hint{display:none}
.scroll{overflow-x:auto}
table{width:100%;border-collapse:separate;border-spacing:0;min-width:840px;text-align:center}
thead th{background:#EAF1FE;color:#1E40AF;font-weight:800;font-size:13.5px;padding:13px 8px;border-bottom:1px solid #D7E3F7;white-space:nowrap}
thead .th-body{text-align:left;padding-left:22px;font-size:11.5px;letter-spacing:.05em;text-transform:uppercase;color:#334155}
.sz{width:64px}
tbody td{padding:12px 8px;border-bottom:1px solid var(--line);font-size:14px;color:#334155;font-variant-numeric:tabular-nums;white-space:nowrap}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover td{background:#F8FAFF}
.lbl{text-align:left;padding-left:22px !important;padding-right:16px;position:sticky;left:0;z-index:2;background:#FBFDFF;box-shadow:1px 0 0 var(--line)}
tbody tr:hover .lbl{background:#F4F8FF}
thead .th-body{position:sticky;left:0;z-index:3}
.code{display:inline-grid;place-items:center;width:23px;height:23px;border-radius:7px;background:#EAF1FE;color:#1E40AF;font-weight:800;font-size:11.5px;margin-right:10px;vertical-align:middle}
.code-dot{background:#EEF2F7;color:#94A3B8;font-size:15px}
.bn{font-weight:700;color:var(--head);vertical-align:middle}
.bsub{display:inline-block;font-weight:600;font-size:12px;color:var(--faint);margin-left:2px}
th.last{background:#DCEAFE}
td.last{background:#F3F8FF;font-weight:800;color:var(--head)}
tbody tr:hover td.last{background:#EAF2FF}
.divider td{background:#F0F5FB;color:#1E3A8A;font-weight:800;font-size:12px;letter-spacing:.06em;text-transform:uppercase;text-align:left;padding:11px 22px;position:sticky;left:0}
.note{margin-top:16px;display:flex;align-items:center;gap:9px;color:var(--muted);font-size:13px;padding-left:4px}
.note svg{width:16px;height:16px;color:var(--faint);flex:0 0 auto}
.legend{margin-top:14px;display:flex;flex-wrap:wrap;gap:8px 18px;padding:14px 18px;border-radius:16px;font-size:12.5px;color:#475569}
.legend b{color:var(--head)}
.legend .li{display:flex;align-items:center;gap:7px}
.legend .code{margin-right:0;width:20px;height:20px;font-size:10.5px}
@media(max-width:760px){.hint{display:flex;align-items:center;justify-content:center;gap:7px;color:var(--faint);font-size:12.5px;margin:0 0 10px}.hint svg{width:15px;height:15px}}
@media(max-width:520px){.wrap{padding:34px 15px 46px}.cardtitle .unit{display:none}}
</style></head>
<body>
<div class="orb a"></div><div class="orb b"></div>
<main class="wrap">
  <header class="phead">
    <span class="eyebrow">Panduan Ukuran</span>
    <h1 class="title">Ukuran Almamater</h1>
    <p class="subtitle">Pastikan Anda memilih ukuran yang tepat di bawah ini.</p>
  </header>
  <div class="hint"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="m5 12 14 0M5 12l4-4M5 12l4 4M19 12l-4-4M19 12l-4 4"/></svg><span>Geser tabel untuk melihat semua ukuran</span></div>
  <section class="card glass">
    <div class="cardtitle"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9 9 3l12 12-6 6z"/><path d="M8 8l2 2M11 5l2 2M5 11l2 2M14 8l2 2M8 14l2 2"/></svg><h2>Spesifikasi Ukuran Detail</h2><span class="unit">Satuan: cm</span></div>
    <div class="scroll">
      <table>
        <thead><tr><th class="th-body">Bagian Tubuh</th><th class="sz">S</th><th class="sz">M</th><th class="sz">L</th><th class="sz">XL</th><th class="sz">2XL</th><th class="sz">3XL</th><th class="sz">4XL</th><th class="sz">5XL</th><th class="sz">6XL</th><th class="sz last">7XL</th></tr></thead>
        <tbody>
<tr>
  <td class="lbl"><span class="code">A</span><span class="bn">Panjang badan</span></td>
  <td>69</td><td>71</td><td>73</td><td>75</td><td>77</td><td>79</td><td>80</td><td>82</td><td>82</td><td class="last">83</td>
</tr>
<tr>
  <td class="lbl"><span class="code">B</span><span class="bn">Lebar bahu</span></td>
  <td>42</td><td>44</td><td>46</td><td>48</td><td>50</td><td>51</td><td>52</td><td>54</td><td>55</td><td class="last">56</td>
</tr>
<tr>
  <td class="lbl"><span class="code">C</span><span class="bn">Panjang tangan</span></td>
  <td>58</td><td>60</td><td>62</td><td>64</td><td>66</td><td>67</td><td>68</td><td>69</td><td>70</td><td class="last">70</td>
</tr>
<tr>
  <td class="lbl"><span class="code">D</span><span class="bn">Lingkar badan</span></td>
  <td>98</td><td>104</td><td>108</td><td>112</td><td>118</td><td>122</td><td>126</td><td>130</td><td>134</td><td class="last">138</td>
</tr>
<tr>
  <td class="lbl"><span class="code">E</span><span class="bn">Lingkar pinggang</span></td>
  <td>96</td><td>102</td><td>106</td><td>110</td><td>116</td><td>120</td><td>124</td><td>128</td><td>132</td><td class="last">136</td>
</tr>
<tr>
  <td class="lbl"><span class="code">F</span><span class="bn">Lingkar pinggul</span></td>
  <td>108</td><td>114</td><td>118</td><td>122</td><td>128</td><td>132</td><td>136</td><td>140</td><td>144</td><td class="last">148</td>
</tr>
<tr>
  <td class="lbl"><span class="code">G</span><span class="bn">Lingkar ujung tangan</span></td>
  <td>28</td><td>30</td><td>32</td><td>34</td><td>36</td><td>36</td><td>36</td><td>38</td><td>38</td><td class="last">38</td>
</tr>
          <tr class="divider"><td colspan="11">Keterangan Tambahan</td></tr>
<tr>
  <td class="lbl"><span class="code code-dot">&bull;</span><span class="bn">Panjang kerah</span></td>
  <td>40</td><td>40</td><td>40</td><td>41</td><td>41</td><td>41</td><td>42</td><td>42</td><td>42</td><td class="last">43</td>
</tr>
<tr>
  <td class="lbl"><span class="code code-dot">&bull;</span><span class="bn">Lebar bobok kantong <span class="bsub">Bawah</span></span></td>
  <td>13</td><td>13</td><td>13</td><td>13,5</td><td>13,5</td><td>14</td><td>14</td><td>14</td><td>15</td><td class="last">15</td>
</tr>
<tr>
  <td class="lbl"><span class="code code-dot">&bull;</span><span class="bn">Lebar bobok kantong <span class="bsub">Atas</span></span></td>
  <td>9</td><td>9</td><td>9</td><td>9,5</td><td>9,5</td><td>10</td><td>10</td><td>10</td><td>11</td><td class="last">11</td>
</tr>
        </tbody>
      </table>
    </div>
  </section>
  <div class="legend glass">
    <span class="li"><span class="code">A</span> Panjang badan</span>
    <span class="li"><span class="code">B</span> Lebar bahu</span>
    <span class="li"><span class="code">C</span> Panjang tangan</span>
    <span class="li"><span class="code">D</span> Lingkar badan</span>
    <span class="li"><span class="code">E</span> Lingkar pinggang</span>
    <span class="li"><span class="code">F</span> Lingkar pinggul</span>
    <span class="li"><span class="code">G</span> Lingkar ujung tangan</span>
  </div>
  <div class="note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 11v5M12 8h.01"/></svg><span>* Toleransi ukuran jahit &plusmn; 1&ndash;2 cm.</span></div>
  <p class="note" style="color:var(--faint);justify-content:center;margin-top:22px">Universitas Pamulang &middot; Panduan Ukuran Jas Almamater</p>
</main>
<script src="assets/site.js?v=3.5"></script>
</body></html>
