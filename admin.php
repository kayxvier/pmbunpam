<?php
/* =====================================================================
   PMB UNPAM - Admin panel (v3.5)
   Kelola: identitas/tema/visibilitas situs, button/link, aset gambar,
   peserta ujian, highlights, Instagram, testimoni, dan TikTok.
   ===================================================================== */
require __DIR__ . '/config.php';
/* Beberapa instalasi XAMPP membatasi C:\\xampp\\tmp. Simpan session admin
   di folder data proyek agar login tetap berjalan tanpa konfigurasi tambahan. */
$PMB_SESSION_DIR = PMB_DATA_DIR . '/sessions';
if (!is_dir($PMB_SESSION_DIR)) @mkdir($PMB_SESSION_DIR, 0775, true);
if (is_dir($PMB_SESSION_DIR) && is_writable($PMB_SESSION_DIR)) @session_save_path($PMB_SESSION_DIR);
session_start();

$login_err = '';
$msg = '';

/* ---- login / logout ---- */
if (isset($_GET['logout'])) { session_destroy(); header('Location: admin.php'); exit; }
if (isset($_POST['action']) && $_POST['action'] === 'login') {
    if (PMB_ADMIN_PASS !== '' && hash_equals(PMB_ADMIN_PASS, (string)(isset($_POST['pass']) ? $_POST['pass'] : ''))) {
        $_SESSION['pmb_admin'] = true;
        header('Location: admin.php'); exit;
    } else { $login_err = 'Password salah. Coba lagi.'; }
}
$IN = !empty($_SESSION['pmb_admin']);

/* ---- handle data actions ---- */
if ($IN && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $a = $_POST['action'];
    $P = $_POST;
    $g = function ($k) use ($P) { return isset($P[$k]) ? trim($P[$k]) : ''; };
    $valid_color = function ($value, $fallback) {
        return preg_match('/^#[0-9a-fA-F]{6}$/', (string)$value) ? strtolower($value) : $fallback;
    };

    if ($a === 'save_site') {
        $S = pmb_settings();
        $S['site']['name'] = $g('site_name') ?: $S['site']['name'];
        $S['site']['organization'] = $g('site_organization') ?: $S['site']['organization'];
        $S['site']['tagline'] = $g('site_tagline');
        $S['site']['meta_description'] = $g('site_meta_description');
        $S['site']['logo_alt'] = $g('site_logo_alt') ?: $S['site']['logo_alt'];
        $S['theme']['primary'] = $valid_color($g('color_primary'), $S['theme']['primary']);
        $S['theme']['secondary'] = $valid_color($g('color_secondary'), $S['theme']['secondary']);
        $S['theme']['accent'] = $valid_color($g('color_accent'), $S['theme']['accent']);
        $S['theme']['soft'] = $valid_color($g('color_soft'), $S['theme']['soft']);

        $section_keys = array('services','stats','welcome','vision','spmb','quiz','schedule','cost','roadmap','testimonials','campus','map','highlights','social','tiktok','cta');
        foreach ($section_keys as $section_key) {
            $S['home']['sections'][$section_key] = isset($P['section'][$section_key]);
        }
        $button_keys = array('hero_register','hero_programs','portal_online','portal_gform','portal_disability','portal_verify','portal_graduation','portal_exam_participants','portal_documents','portal_exam_login','spmb_exam_participants','quiz_register','cta_register');
        foreach ($button_keys as $button_key) {
            if (!isset($S['home']['buttons'][$button_key])) $S['home']['buttons'][$button_key] = array();
            $S['home']['buttons'][$button_key]['enabled'] = isset($P['button_enabled'][$button_key]);
            $S['home']['buttons'][$button_key]['label'] = isset($P['button_label'][$button_key]) ? trim($P['button_label'][$button_key]) : '';
            $S['home']['buttons'][$button_key]['url'] = isset($P['button_url'][$button_key]) ? trim($P['button_url'][$button_key]) : '';
        }
        $text_keys = array('hero_badge','hero_title_main','hero_title_highlight','hero_title_org','hero_description','portal_title','portal_subtitle','spmb_title','quiz_title','schedule_title','cost_title','campus_title','map_title','highlights_title','testimonials_title','social_title','tiktok_title','cta_title','cta_subtitle');
        foreach ($text_keys as $text_key) {
            $S['home']['text'][$text_key] = isset($P['text'][$text_key]) ? trim($P['text'][$text_key]) : '';
        }
        $page_keys = array('index','front','almet','biaya','download','info','jadwal','lokasi','peserta','pkkmb','profil','sambutan','simaba','syarat');
        foreach ($page_keys as $page_key) {
            $S['pages'][$page_key] = isset($P['page'][$page_key]);
        }
        $S['participants']['mode'] = ($g('participant_mode') === 'auto') ? 'auto' : 'manual';
        $S['participants']['show'] = isset($P['participant_show']);
        $S['participants']['ujian_selesai'] = $g('participant_deadline');
        $S['participants']['gelombang'] = $g('participant_wave');

        $image_fields = array('site_logo' => 'logo', 'image_hero_person' => 'hero_person', 'image_spmb' => 'spmb', 'image_sambutan' => 'sambutan', 'image_hero_1' => 'hero_1', 'image_hero_2' => 'hero_2', 'image_hero_3' => 'hero_3', 'image_hero_4' => 'hero_4');
        foreach ($image_fields as $upload_field => $setting_key) {
            $uploaded = pmb_save_image($upload_field);
            if ($uploaded) {
                if ($setting_key === 'logo') $S['site']['logo'] = $uploaded;
                else $S['images'][$setting_key] = $uploaded;
            }
        }
        pmb_save_settings($S);
        $msg = 'Pengaturan situs tersimpan.';
    } elseif ($a === 'save_dataset') {
        $dataset = preg_replace('/[^a-z0-9_]/i', '', $g('dataset'));
        $decoded = json_decode(isset($P['dataset_json']) ? $P['dataset_json'] : '', true);
        $dataset_files = array(
            'schedule' => PMB_DATA_DIR . '/schedule.json',
            'biaya' => PMB_DATA_DIR . '/biaya.json',
            'lokasi' => PMB_DATA_DIR . '/lokasi.json',
            'pkkmb' => PMB_DATA_DIR . '/pkkmb.json',
            'dokumen' => __DIR__ . '/dokumen.json',
            'peserta' => __DIR__ . '/peserta.json',
        );
        if ($dataset === 'page_content') {
            if (!is_array($decoded)) {
                $msg = 'Isi editor halaman tidak valid. Pastikan format JSON benar.';
            } else {
                $S = pmb_settings();
                $S['page_content'] = $decoded;
                $msg = pmb_save_settings($S) ? 'Override isi halaman tersimpan.' : 'Override isi halaman gagal disimpan.';
            }
        } elseif (!isset($dataset_files[$dataset])) {
            $msg = 'Dataset tidak dikenali.';
        } elseif (!is_array($decoded)) {
            $msg = 'JSON tidak valid. Periksa tanda koma, kurung, dan tanda kutip.';
        } else {
            $msg = pmb_save_json_file($dataset_files[$dataset], $decoded) ? 'Data ' . $dataset . ' tersimpan.' : 'Data ' . $dataset . ' gagal disimpan.';
        }
    } elseif ($a === 'save_highlight') {
        $items = pmb_load('highlights');
        $id  = $g('id');
        $img = pmb_save_image('thumb');
        $rec = array('id' => $id ?: pmb_id(), 'title' => $g('title'), 'date' => $g('date'),
                     'tag' => $g('tag'), 'link' => $g('link'), 'em' => $g('em'), 'thumb' => '');
        $found = false;
        foreach ($items as &$it) {
            if (($it['id'] ?? '') === $id && $id !== '') {
                $rec['thumb'] = $img ?: (isset($it['thumb']) ? $it['thumb'] : '');
                $it = $rec; $found = true; break;
            }
        }
        unset($it);
        if (!$found) { $rec['thumb'] = $img; $items[] = $rec; }
        pmb_save('highlights', $items); $msg = 'Highlight tersimpan.';
    } elseif ($a === 'del_highlight') {
        $id = $g('id'); $items = pmb_load('highlights');
        $items = array_filter($items, function ($x) use ($id) { return (isset($x['id']) ? $x['id'] : '') !== $id; });
        pmb_save('highlights', $items); $msg = 'Highlight dihapus.';

    } elseif ($a === 'save_ig') {
        $items = pmb_load('instagram');
        $id  = $g('id');
        $img = pmb_save_image('image');
        $rec = array('id' => $id ?: pmb_id(), 'caption' => $g('caption'), 'likes' => $g('likes'),
                     'grad' => $g('grad'), 'link' => $g('link') ?: 'https://www.instagram.com/pmb.unpam', 'image' => '');
        $found = false;
        foreach ($items as &$it) {
            if (($it['id'] ?? '') === $id && $id !== '') {
                $rec['image'] = $img ?: (isset($it['image']) ? $it['image'] : '');
                $it = $rec; $found = true; break;
            }
        }
        unset($it);
        if (!$found) { $rec['image'] = $img; $items[] = $rec; }
        pmb_save('instagram', $items); $msg = 'Highlight Instagram tersimpan.';
    } elseif ($a === 'del_ig') {
        $id = $g('id'); $items = pmb_load('instagram');
        $items = array_filter($items, function ($x) use ($id) { return (isset($x['id']) ? $x['id'] : '') !== $id; });
        pmb_save('instagram', $items); $msg = 'Highlight Instagram dihapus.';

    } elseif ($a === 'save_testi') {
        $items = pmb_load('testimonials');
        $id  = $g('id');
        $img = pmb_save_image('photo');
        $rec = array('id' => $id ?: pmb_id(), 'name' => $g('name'), 'prodi' => $g('prodi'),
                     'text' => $g('text'), 'c' => $g('c') ?: '#0a1f4d', 'photo' => '');
        $found = false;
        foreach ($items as &$it) {
            if (($it['id'] ?? '') === $id && $id !== '') {
                $rec['photo'] = $img ?: (isset($it['photo']) ? $it['photo'] : '');
                $it = $rec; $found = true; break;
            }
        }
        unset($it);
        if (!$found) { $rec['photo'] = $img; $items[] = $rec; }
        pmb_save('testimonials', $items); $msg = 'Testimoni tersimpan.';
    } elseif ($a === 'del_testi') {
        $id = $g('id'); $items = pmb_load('testimonials');
        $items = array_filter($items, function ($x) use ($id) { return (isset($x['id']) ? $x['id'] : '') !== $id; });
        pmb_save('testimonials', $items); $msg = 'Testimoni dihapus.';
    } elseif ($a === 'save_tt') {
        $items = pmb_load('tiktok');
        $id  = $g('id');
        $img = pmb_save_image('thumb');
        $raw = $g('vid');
        if (preg_match('/(\d{6,})/', $raw, $mm)) { $vid = $mm[1]; } else { $vid = preg_replace('/[^0-9]/', '', $raw); }
        $rec = array('id' => $id ?: pmb_id(), 'vid' => $vid, 'thumb' => '');
        $found = false;
        foreach ($items as &$it) {
            if (($it['id'] ?? '') === $id && $id !== '') {
                $rec['thumb'] = $img ?: (isset($it['thumb']) ? $it['thumb'] : '');
                $it = $rec; $found = true; break;
            }
        }
        unset($it);
        if (!$found) { $rec['thumb'] = $img; $items[] = $rec; }
        pmb_save('tiktok', $items); $msg = 'Video TikTok tersimpan.';
    } elseif ($a === 'del_tt') {
        $id = $g('id'); $items = pmb_load('tiktok');
        $items = array_filter($items, function ($x) use ($id) { return (isset($x['id']) ? $x['id'] : '') !== $id; });
        pmb_save('tiktok', $items); $msg = 'Video TikTok dihapus.';
    }
}

$highlights   = pmb_load('highlights');
$instagram    = pmb_load('instagram');
$testimonials = pmb_load('testimonials');
$tiktok       = pmb_load('tiktok');
$settings     = pmb_settings();
$dataset_values = array(
    'schedule' => pmb_content('schedule'),
    'biaya' => pmb_content('biaya'),
    'lokasi' => pmb_content('lokasi'),
    'pkkmb' => pmb_content('pkkmb'),
    'dokumen' => pmb_load_json_file(__DIR__ . '/dokumen.json', array()),
    'peserta' => pmb_load_json_file(__DIR__ . '/peserta.json', array()),
    'page_content' => isset($settings['page_content']) && is_array($settings['page_content']) ? $settings['page_content'] : array(),
);
function v($arr, $k) { return pmb_esc(isset($arr[$k]) ? $arr[$k] : ''); }
function sv($arr, $k, $fallback = '') { return pmb_esc(isset($arr[$k]) ? $arr[$k] : $fallback); }
function json_editor_value($value) {
    return pmb_esc(json_encode($value, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
}

/* render field gambar + cropper */
function crop_field($type, $id, $field, $rw, $rh, $ow, $oh, $current, $label) {
    $key = $type . '_' . ($id !== '' ? $id : 'new') . '_' . $field;
    $hid = 'crop_' . $key;
    $pid = 'prev_' . $key;
    $show = $current ? 'block' : 'none';
    echo '<label>' . $label . ' &middot; rasio ' . $rw . ':' . $rh . '</label>';
    echo '<img id="' . $pid . '" class="thumbprev" src="' . pmb_esc($current) . '" alt="" style="display:' . $show . '">';
    echo '<input type="hidden" name="' . $field . '_crop" id="' . $hid . '">';
    echo '<input type="file" class="cropfile" accept="image/*" name="' . $field . '"';
    echo ' data-rw="' . $rw . '" data-rh="' . $rh . '" data-ow="' . $ow . '" data-oh="' . $oh . '"';
    echo ' data-hidden="' . $hid . '" data-preview="' . $pid . '">';
}
?><!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin PMB UNPAM</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0}
body{font-family:'Poppins',system-ui,sans-serif;background:#eef2fb;color:#0f1c3f;padding:0 0 60px}
.top{background:linear-gradient(120deg,#0a1f4d,#13387a);color:#fff;padding:20px 26px;display:flex;align-items:center;justify-content:space-between;box-shadow:0 8px 26px rgba(10,31,77,.28)}
.top h1{font-size:19px;font-weight:700}
.top .badge{font-size:12px;background:rgba(255,255,255,.16);padding:4px 10px;border-radius:20px;margin-left:10px}
.top a.out{background:#f6b40a;color:#3a2600;font-weight:700;padding:9px 16px;border-radius:12px;text-decoration:none;font-size:13px}
.wrap{max-width:1060px;margin:26px auto;padding:0 18px}
.msg{background:#dcfce7;border:1px solid #86efac;color:#166534;padding:12px 16px;border-radius:12px;margin-bottom:18px;font-size:14px;font-weight:500}
.tabs{display:flex;gap:8px;margin-bottom:20px;flex-wrap:wrap}
.tabs button{border:0;background:#fff;color:#5d6b8c;font-weight:600;font-family:inherit;padding:11px 18px;border-radius:12px;cursor:pointer;font-size:14px;box-shadow:0 4px 14px rgba(10,31,77,.06);transition:.18s}
.tabs button.on{background:linear-gradient(120deg,#0a1f4d,#13387a);color:#fff;box-shadow:0 10px 24px rgba(10,31,77,.24)}
.panel{display:none}
.panel.on{display:block}
.grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:16px}
.card{background:#fff;border-radius:18px;padding:16px;box-shadow:0 8px 26px rgba(10,31,77,.08);border:1px solid #e6ebf5}
.card.new{border:2px dashed #b9c6e6;background:#fbfcff}
.card h3{font-size:14px;font-weight:700;margin-bottom:12px;color:#0a1f4d;display:flex;align-items:center;gap:8px}
.card h3 .dot{width:8px;height:8px;border-radius:50%;background:#f6b40a}
label{display:block;font-size:12px;font-weight:600;color:#5d6b8c;margin:9px 0 4px}
input[type=text],input[type=url],textarea,select{width:100%;border:1px solid #d9e1f2;border-radius:10px;padding:9px 11px;font-family:inherit;font-size:13px;color:#0f1c3f;background:#fff}
input:focus,textarea:focus,select:focus{outline:none;border-color:#13387a;box-shadow:0 0 0 3px rgba(19,56,122,.12)}
textarea{resize:vertical;min-height:70px}
.json-editor{min-height:250px;font-family:Consolas,'Courier New',monospace;font-size:12px;line-height:1.45;background:#fbfcff;color:#17264d;tab-size:2}
code{font-family:Consolas,'Courier New',monospace;font-size:11px;color:#304165;word-break:break-word}
input[type=file]{font-size:12px;margin-top:4px;width:100%}
input[type=color]{width:42px;height:34px;border:1px solid #d9e1f2;border-radius:8px;background:#fff;cursor:pointer}
.thumbprev{width:100%;max-height:170px;object-fit:cover;border-radius:12px;margin-bottom:6px;border:1px solid #e6ebf5;background:#f4f7fd}
.row2{display:flex;gap:10px}
.row2>div{flex:1}
.btns{display:flex;gap:8px;margin-top:14px}
.btns .save{flex:1;border:0;font-family:inherit;font-weight:700;font-size:13px;padding:10px;border-radius:11px;cursor:pointer;background:linear-gradient(120deg,#0a1f4d,#13387a);color:#fff}
.btns .save:hover{filter:brightness(1.1)}
.btns .del{border:0;font-family:inherit;font-weight:700;font-size:13px;padding:10px 14px;border-radius:11px;cursor:pointer;background:#fee2e2;color:#b91c1c}
.btns .del:hover{background:#fecaca}
.hint{font-size:12px;color:#8a97b5;margin-top:6px;line-height:1.5}
.sec-title{font-size:15px;font-weight:700;color:#0a1f4d;margin:22px 0 12px}
.login{max-width:380px;margin:9vh auto;background:#fff;border-radius:22px;padding:34px 30px;box-shadow:0 20px 50px rgba(10,31,77,.16);text-align:center}
.login .logo{width:64px;height:64px;border-radius:18px;background:linear-gradient(135deg,#0a1f4d,#13387a);color:#f6b40a;display:flex;align-items:center;justify-content:center;font-size:30px;margin:0 auto 14px}
.login h2{font-size:19px;margin-bottom:4px}
.login p{font-size:13px;color:#5d6b8c;margin-bottom:20px}
.login input{margin-bottom:14px;text-align:center}
.login button{width:100%;border:0;background:linear-gradient(120deg,#0a1f4d,#13387a);color:#fff;font-weight:700;font-family:inherit;padding:12px;border-radius:12px;cursor:pointer;font-size:14px}
.err{background:#fee2e2;color:#b91c1c;padding:9px;border-radius:10px;font-size:13px;margin-bottom:14px}
.settings-grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:16px}
.setting-block{background:#fff;border-radius:18px;padding:18px;border:1px solid #e6ebf5;box-shadow:0 8px 26px rgba(10,31,77,.06);margin-bottom:18px}
.setting-block h3{font-size:15px;color:#0a1f4d;margin-bottom:4px}
.setting-block>p{font-size:12px;color:#8a97b5;margin-bottom:12px;line-height:1.5}
.checks{display:grid;grid-template-columns:repeat(auto-fit,minmax(210px,1fr));gap:8px}
.check{display:flex;align-items:center;gap:9px;background:#f8faff;border:1px solid #e6ebf5;border-radius:10px;padding:10px;font-size:12px;color:#304165;font-weight:600;cursor:pointer}
.check input{accent-color:#13387a;width:16px;height:16px}
.mini-table{display:grid;gap:8px}
.mini-row{display:grid;grid-template-columns:24px minmax(160px,1fr) minmax(160px,1fr);gap:8px;align-items:center;background:#f8faff;border:1px solid #e6ebf5;border-radius:10px;padding:8px}
.mini-row .check{background:transparent;border:0;padding:0}
.mini-row input[type=text],.mini-row input[type=url]{padding:8px;font-size:12px}
.save-wide{width:100%;border:0;font-family:inherit;font-weight:700;font-size:14px;padding:12px;border-radius:12px;cursor:pointer;background:linear-gradient(120deg,#0a1f4d,#13387a);color:#fff;margin-top:2px}
.asset-preview{max-width:170px;max-height:84px;object-fit:contain;border-radius:10px;border:1px solid #e6ebf5;background:#f8faff;padding:5px;display:block;margin:7px 0}
.muted-box{font-size:12px;color:#5d6b8c;background:#f8faff;border:1px dashed #ccd7ec;border-radius:10px;padding:11px;line-height:1.5}
/* cropper modal */
.cropm{display:none;position:fixed;inset:0;background:rgba(6,20,47,.75);z-index:99;align-items:center;justify-content:center;padding:16px}
.cropm.on{display:flex}
.cropbox{background:#fff;border-radius:20px;padding:20px;width:360px;max-width:100%;box-shadow:0 30px 70px rgba(0,0,0,.4)}
.cropbox h3{font-size:15px;margin-bottom:14px;color:#0a1f4d}
.cropframe{position:relative;width:300px;max-width:100%;margin:0 auto;overflow:hidden;background:#0a1f4d;border-radius:12px;touch-action:none;cursor:move}
.cropframe img{position:absolute;top:0;left:0;-webkit-user-drag:none;user-select:none;max-width:none}
.cropgrid{position:absolute;inset:0;pointer-events:none;background-image:linear-gradient(rgba(255,255,255,.35) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.35) 1px,transparent 1px);background-size:33.33% 33.33%}
.cropctrl{display:flex;align-items:center;gap:10px;margin:16px 0 6px;font-size:13px;color:#5d6b8c;font-weight:600}
.cropctrl input{flex:1}
.cropbtns{display:flex;gap:10px;margin-top:10px}
.cbtn{flex:1;border:0;font-family:inherit;font-weight:700;font-size:13px;padding:11px;border-radius:11px;cursor:pointer}
.cbtn.cancel{background:#eef2fb;color:#5d6b8c}
.cbtn.ok{background:linear-gradient(120deg,#0a1f4d,#13387a);color:#fff}
.crophint{font-size:12px;color:#8a97b5;margin-top:10px;text-align:center}
@media (max-width:640px){
  .grid{grid-template-columns:1fr}
  .mini-row{grid-template-columns:24px 1fr}
  .mini-row input{grid-column:2}
}
</style>
</head>
<body>

<?php if (!$IN): ?>
<div class="login">
  <div class="logo">&#127891;</div>
  <h2>Admin PMB UNPAM</h2>
  <p>Masuk untuk mengatur konten halaman.</p>
  <?php if ($login_err): ?><div class="err"><?php echo pmb_esc($login_err); ?></div><?php endif; ?>
  <form method="post">
    <input type="hidden" name="action" value="login">
    <input type="password" name="pass" placeholder="Password" required autofocus>
    <button type="submit">Masuk</button>
  </form>
</div>

<?php else: ?>
<div class="top">
  <div><h1 style="display:inline">Admin PMB UNPAM</h1><span class="badge">CMS situs</span></div>
  <a class="out" href="admin.php?logout=1">Keluar</a>
</div>
<div class="wrap">
  <?php if ($msg): ?><div class="msg">&#10003; <?php echo pmb_esc($msg); ?></div><?php endif; ?>

  <div class="tabs">
    <button class="on" data-p="p-site">&#9881; Tampilan Situs</button>
    <button data-p="p-data">&#128221; Data Semua Halaman</button>
    <button data-p="p-hl">&#128240; Highlights</button>
    <button data-p="p-ig">&#128247; Highlight Instagram</button>
    <button data-p="p-ts">&#128172; Testimoni</button>
    <button data-p="p-tt">&#127909; Video TikTok</button>
  </div>

  <!-- ============ TAMPILAN SITUS ============ -->
  <div class="panel on" id="p-site">
    <form method="post" enctype="multipart/form-data">
      <input type="hidden" name="action" value="save_site">
      <div class="setting-block">
        <h3>Identitas situs</h3>
        <p>Dipakai sebagai judul browser, metadata, dan identitas umum seluruh halaman.</p>
        <div class="settings-grid">
          <div><label>Nama situs</label><input type="text" name="site_name" value="<?php echo sv($settings['site'],'name'); ?>" required></div>
          <div><label>Nama organisasi</label><input type="text" name="site_organization" value="<?php echo sv($settings['site'],'organization'); ?>" required></div>
          <div><label>Tagline</label><input type="text" name="site_tagline" value="<?php echo sv($settings['site'],'tagline'); ?>"></div>
          <div><label>Alt text logo</label><input type="text" name="site_logo_alt" value="<?php echo sv($settings['site'],'logo_alt'); ?>"></div>
        </div>
        <label>Deskripsi mesin pencari</label>
        <textarea name="site_meta_description" rows="2"><?php echo sv($settings['site'],'meta_description'); ?></textarea>
      </div>

      <div class="setting-block">
        <h3>Warna dan aset gambar</h3>
        <p>Upload bersifat opsional. Jika kosong, gambar bawaan halaman tetap digunakan.</p>
        <div class="settings-grid">
          <div><label>Warna utama</label><input type="color" name="color_primary" value="<?php echo sv($settings['theme'],'primary','#0a1f4d'); ?>"></div>
          <div><label>Warna sekunder</label><input type="color" name="color_secondary" value="<?php echo sv($settings['theme'],'secondary','#13387a'); ?>"></div>
          <div><label>Warna aksen</label><input type="color" name="color_accent" value="<?php echo sv($settings['theme'],'accent','#f6b40a'); ?>"></div>
          <div><label>Warna latar lembut</label><input type="color" name="color_soft" value="<?php echo sv($settings['theme'],'soft','#f4f7fd'); ?>"></div>
          <div>
            <label>Logo situs</label>
            <?php if (!empty($settings['site']['logo'])): ?><img class="asset-preview" src="<?php echo pmb_esc($settings['site']['logo']); ?>" alt=""><?php endif; ?>
            <input type="file" name="site_logo" accept="image/*">
          </div>
          <div>
            <label>Foto utama / hero</label>
            <?php if (!empty($settings['images']['hero_person'])): ?><img class="asset-preview" src="<?php echo pmb_esc($settings['images']['hero_person']); ?>" alt=""><?php endif; ?>
            <input type="file" name="image_hero_person" accept="image/*">
          </div>
          <div>
            <label>Gambar SPMB</label>
            <?php if (!empty($settings['images']['spmb'])): ?><img class="asset-preview" src="<?php echo pmb_esc($settings['images']['spmb']); ?>" alt=""><?php endif; ?>
            <input type="file" name="image_spmb" accept="image/*">
          </div>
          <div>
            <label>Foto sambutan</label>
            <?php if (!empty($settings['images']['sambutan'])): ?><img class="asset-preview" src="<?php echo pmb_esc($settings['images']['sambutan']); ?>" alt=""><?php endif; ?>
            <input type="file" name="image_sambutan" accept="image/*">
          </div>
        </div>
        <div class="muted-box" style="margin-top:12px">Gambar hero carousel dapat diubah satu per satu melalui empat kolom upload berikut.</div>
        <div class="settings-grid" style="margin-top:10px">
          <?php for ($hi = 1; $hi <= 4; $hi++): $hk = 'hero_' . $hi; $hf = 'image_hero_' . $hi; ?>
          <div><label>Hero carousel <?php echo $hi; ?></label><?php if (!empty($settings['images'][$hk])): ?><img class="asset-preview" src="<?php echo pmb_esc($settings['images'][$hk]); ?>" alt=""><?php endif; ?><input type="file" name="<?php echo $hf; ?>" accept="image/*"></div>
          <?php endfor; ?>
        </div>
      </div>

      <div class="setting-block">
        <h3>Bagian halaman depan</h3>
        <p>Centang bagian yang ingin ditampilkan. Pengaturan berlaku untuk index.php dan front.php selama bagian tersebut tersedia di halaman.</p>
        <div class="checks">
          <?php $section_labels = array('services'=>'Portal layanan','stats'=>'Statistik / peta sebaran','welcome'=>'Sambutan','vision'=>'Visi &amp; misi','spmb'=>'Tentang SPMB','quiz'=>'Quiz minat prodi','schedule'=>'Jadwal','cost'=>'Biaya kuliah','roadmap'=>'Alur pendaftaran','testimonials'=>'Testimoni','campus'=>'Kampus','map'=>'Peta kampus','highlights'=>'Highlights','social'=>'Media sosial','tiktok'=>'TikTok','cta'=>'CTA pendaftaran'); foreach ($section_labels as $sk => $sl): ?>
          <label class="check"><input type="checkbox" name="section[<?php echo $sk; ?>]" <?php echo !empty($settings['home']['sections'][$sk]) ? 'checked' : ''; ?>> <span><?php echo $sl; ?></span></label>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="setting-block">
        <h3>Teks utama</h3>
        <p>Field ini mengubah teks yang sudah ditandai di halaman utama. Teks lain yang lebih spesifik tetap dapat disunting langsung di file halaman.</p>
        <div class="settings-grid">
          <?php $text_labels = array('hero_badge'=>'Badge hero','hero_title_main'=>'Judul hero bagian 1','hero_title_highlight'=>'Judul hero bagian 2','hero_title_org'=>'Judul hero organisasi','hero_description'=>'Deskripsi hero','portal_title'=>'Judul portal','portal_subtitle'=>'Subjudul portal','spmb_title'=>'Judul SPMB','quiz_title'=>'Judul quiz','schedule_title'=>'Judul jadwal','cost_title'=>'Judul biaya','campus_title'=>'Judul kampus','map_title'=>'Judul peta','highlights_title'=>'Judul highlights','testimonials_title'=>'Judul testimoni','social_title'=>'Judul media sosial','tiktok_title'=>'Judul TikTok','cta_title'=>'Judul CTA','cta_subtitle'=>'Subjudul CTA'); foreach ($text_labels as $tk => $tl): ?>
          <div><label><?php echo $tl; ?></label><?php if (in_array($tk, array('hero_description','portal_subtitle','cta_subtitle'), true)): ?><textarea name="text[<?php echo $tk; ?>]" rows="2"><?php echo sv($settings['home']['text'],$tk); ?></textarea><?php else: ?><input type="text" name="text[<?php echo $tk; ?>]" value="<?php echo sv($settings['home']['text'],$tk); ?>"><?php endif; ?></div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="setting-block">
        <h3>Button dan link</h3>
        <p>Matikan checkbox untuk menyembunyikan button. Label dan URL bisa diganti tanpa mengedit HTML.</p>
        <div class="mini-table">
          <?php $button_labels = array('hero_register'=>'Hero: Daftar sekarang','hero_programs'=>'Hero: Program studi','portal_online'=>'Portal: Daftar online','portal_gform'=>'Portal: Daftar G-Form','portal_disability'=>'Portal: Disabilitas','portal_verify'=>'Portal: Verifikasi','portal_graduation'=>'Portal: Kelulusan','portal_exam_participants'=>'Portal: Peserta ujian','portal_documents'=>'Portal: Dokumen','portal_exam_login'=>'Portal: Login ujian','spmb_exam_participants'=>'SPMB: Peserta ujian','quiz_register'=>'Quiz: Daftar online','cta_register'=>'CTA: Daftar sekarang'); foreach ($button_labels as $bk => $bl): $bc = isset($settings['home']['buttons'][$bk]) ? $settings['home']['buttons'][$bk] : array(); ?>
          <div class="mini-row">
            <label class="check" title="Tampilkan button"><input type="checkbox" name="button_enabled[<?php echo $bk; ?>]" <?php echo !isset($bc['enabled']) || !empty($bc['enabled']) ? 'checked' : ''; ?>></label>
            <div><label><?php echo $bl; ?></label><input type="text" name="button_label[<?php echo $bk; ?>]" value="<?php echo sv($bc,'label'); ?>"></div>
            <div><label>URL</label><input type="text" name="button_url[<?php echo $bk; ?>]" value="<?php echo sv($bc,'url'); ?>" placeholder="#pmb-portal atau https://..."></div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="setting-block">
        <h3>Halaman dan data peserta</h3>
        <p>Halaman yang tidak dicentang akan menampilkan pesan bahwa halaman sedang disembunyikan.</p>
        <div class="checks">
          <?php $page_labels = array('index'=>'index.php','front'=>'front.php','almet'=>'almet.php','biaya'=>'biaya.php','download'=>'download.php','info'=>'info.php','jadwal'=>'jadwal.php','lokasi'=>'lokasi.php','peserta'=>'peserta.php','pkkmb'=>'pkkmb.php','profil'=>'profil.php','sambutan'=>'sambutan.php','simaba'=>'simaba.php','syarat'=>'syarat.php'); foreach ($page_labels as $pk => $pl): ?>
          <label class="check"><input type="checkbox" name="page[<?php echo $pk; ?>]" <?php echo !empty($settings['pages'][$pk]) ? 'checked' : ''; ?>> <span><?php echo $pl; ?></span></label>
          <?php endforeach; ?>
        </div>
        <div class="settings-grid" style="margin-top:14px">
          <div><label>Mode tampil peserta ujian</label><select name="participant_mode"><option value="manual" <?php echo $settings['participants']['mode'] === 'manual' ? 'selected' : ''; ?>>Manual</option><option value="auto" <?php echo $settings['participants']['mode'] === 'auto' ? 'selected' : ''; ?>>Otomatis berdasarkan deadline</option></select></div>
          <div><label>Label gelombang</label><input type="text" name="participant_wave" value="<?php echo sv($settings['participants'],'gelombang'); ?>"></div>
          <div><label>Deadline mode otomatis</label><input type="text" name="participant_deadline" value="<?php echo sv($settings['participants'],'ujian_selesai'); ?>" placeholder="YYYY-MM-DD HH:MM"></div>
          <label class="check" style="align-self:end"><input type="checkbox" name="participant_show" <?php echo !empty($settings['participants']['show']) ? 'checked' : ''; ?>> <span>Tampilkan data peserta (mode manual)</span></label>
        </div>
      </div>

      <button class="save-wide" type="submit">Simpan semua pengaturan situs</button>
    </form>
  </div>

  <!-- ============ DATA TERSTRUKTUR ============ -->
  <div class="panel" id="p-data">
    <div class="setting-block">
      <h3>Data semua halaman</h3>
      <p>Di sini nilai yang sebelumnya tertanam di file halaman sudah dipusatkan. Anda bisa mengubah biaya, jadwal, kampus, postingan PKKMB, dokumen, dan peserta tanpa membuka kode. Format editor menggunakan JSON agar jumlah item dan field tetap fleksibel.</p>
      <div class="muted-box">Tips: ubah nilai di dalam tanda kutip, jangan hapus koma/kurung. Setelah menyimpan, buka ulang halaman publik untuk melihat hasilnya. Data bawaan tetap dipakai sampai dataset tersebut disimpan.</div>
    </div>
    <?php
      $dataset_labels = array(
        'schedule' => array('Jadwal SPMB', 'Gelombang, tanggal pendaftaran, SPMB, pengumuman, registrasi, PKKMB, dan KRS.'),
        'biaya' => array('Biaya kuliah', 'Daftar kampus/program, biaya registrasi, item biaya, keterangan, diskon, dan total.'),
        'lokasi' => array('Lokasi & program studi', 'Kampus, alamat, fakultas, serta daftar program studi per kampus.'),
        'pkkmb' => array('PKKMB & postingan', 'Toggle postingan, akun Instagram, judul, tanggal, ringkasan, link, gambar, dan status selesai.'),
        'dokumen' => array('Dokumen unduhan', 'Daftar dokumen yang tampil pada halaman unduh dokumen.'),
        'peserta' => array('Daftar peserta ujian', 'Data peserta yang dipakai oleh halaman peserta. Toggle tampil/sembunyinya ada di Tampilan Situs.'),
        'page_content' => array('Override isi halaman lanjutan', 'Atur teks/HTML/atribut elemen spesifik dengan selector CSS. Berguna untuk halaman profil, info, syarat, sambutan, dan halaman lain yang memiliki teks panjang.'),
      );
      foreach ($dataset_labels as $dataset_key => $dataset_info):
    ?>
    <div class="setting-block">
      <h3><?php echo pmb_esc($dataset_info[0]); ?></h3>
      <p><?php echo pmb_esc($dataset_info[1]); ?></p>
      <?php if ($dataset_key === 'page_content'): ?>
      <div class="muted-box" style="margin-bottom:10px"><b>Contoh format:</b> <code>{"profil":{".hero h1":"Judul baru",".hero p":{"text":"Deskripsi baru"},"a.daftar":{"attr":{"href":"https://contoh.test"}}}}</code>. Kunci pertama adalah nama file halaman tanpa .php. Nilai string mengganti teks; gunakan <code>html</code> untuk HTML tepercaya atau <code>attr</code> untuk atribut.</div>
      <?php endif; ?>
      <form method="post">
        <input type="hidden" name="action" value="save_dataset">
        <input type="hidden" name="dataset" value="<?php echo pmb_esc($dataset_key); ?>">
        <textarea class="json-editor" name="dataset_json" rows="16" spellcheck="false"><?php echo json_editor_value($dataset_values[$dataset_key]); ?></textarea>
        <div class="btns"><button class="save" type="submit">Simpan <?php echo pmb_esc($dataset_info[0]); ?></button></div>
      </form>
    </div>
    <?php endforeach; ?>
  </div>

  <!-- ============ HIGHLIGHTS ============ -->
  <div class="panel" id="p-hl">
    <div class="sec-title">&#10133; Tambah Highlight Baru</div>
    <div class="card new">
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_highlight">
        <label>Judul berita / info</label>
        <textarea name="title" required placeholder="cth: Jadwal dan Alur SPMB Online UNPAM 2026"></textarea>
        <div class="row2">
          <div><label>Tanggal / label</label><input type="text" name="date" placeholder="cth: 2026 / Terbaru"></div>
          <div><label>Tag</label><input type="text" name="tag" placeholder="cth: Info"></div>
        </div>
        <label>Link berita</label>
        <input type="url" name="link" placeholder="https://pmb.unpam.ac.id/informasi">
        <label>Emoji (dipakai jika tanpa thumbnail)</label>
        <input type="text" name="em" placeholder="cth: 📰" maxlength="4">
        <?php crop_field('hl', '', 'thumb', 16, 9, 1280, 720, '', 'Thumbnail'); ?>
        <div class="btns"><button class="save" type="submit">Simpan Highlight</button></div>
        <p class="hint">Pilih gambar &rarr; atur crop rasio 16:9. Jika kosong dipakai gradient + emoji.</p>
      </form>
    </div>
    <div class="sec-title">&#128203; Daftar Highlight (<?php echo count($highlights); ?>)</div>
    <div class="grid">
      <?php foreach ($highlights as $it): $id = v($it,'id'); ?>
      <div class="card">
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="action" value="save_highlight">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <h3><span class="dot"></span>Edit Highlight</h3>
          <label>Judul</label>
          <textarea name="title"><?php echo v($it,'title'); ?></textarea>
          <div class="row2">
            <div><label>Tanggal</label><input type="text" name="date" value="<?php echo v($it,'date'); ?>"></div>
            <div><label>Tag</label><input type="text" name="tag" value="<?php echo v($it,'tag'); ?>"></div>
          </div>
          <label>Link</label>
          <input type="url" name="link" value="<?php echo v($it,'link'); ?>">
          <label>Emoji</label>
          <input type="text" name="em" value="<?php echo v($it,'em'); ?>" maxlength="4">
          <?php crop_field('hl', v($it,'id'), 'thumb', 16, 9, 1280, 720, v($it,'thumb'), 'Thumbnail'); ?>
          <div class="btns">
            <button class="save" type="submit">Simpan</button>
            <button class="del" type="submit" form="del_hl_<?php echo $id; ?>" formnovalidate onclick="return confirm('Hapus highlight ini?')">Hapus</button>
          </div>
        </form>
        <form id="del_hl_<?php echo $id; ?>" method="post" style="display:none">
          <input type="hidden" name="action" value="del_highlight">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ============ INSTAGRAM ============ -->
  <div class="panel" id="p-ig">
    <div class="sec-title">&#10133; Tambah Highlight Instagram</div>
    <div class="card new">
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_ig">
        <label>Caption</label>
        <textarea name="caption" required placeholder="Tulis caption postingan Instagram"></textarea>
        <div class="row2">
          <div><label>Jumlah likes</label><input type="text" name="likes" placeholder="cth: 1.204"></div>
          <div><label>Gradient (jika tanpa foto)</label>
            <select name="grad">
              <option value="linear-gradient(135deg,#7c3aed,#dc2743)">Ungu - Merah</option>
              <option value="linear-gradient(135deg,#0e7490,#06b6d4)">Toska</option>
              <option value="linear-gradient(135deg,#b45309,#f59e0b)">Oranye</option>
              <option value="linear-gradient(135deg,#047857,#10b981)">Hijau</option>
              <option value="linear-gradient(135deg,#0a1f4d,#13387a)">Navy</option>
            </select>
          </div>
        </div>
        <label>Link postingan</label>
        <input type="url" name="link" placeholder="https://www.instagram.com/pmb.unpam">
        <?php crop_field('ig', '', 'image', 1, 1, 640, 640, '', 'Foto postingan'); ?>
        <div class="btns"><button class="save" type="submit">Simpan Postingan</button></div>
      </form>
    </div>
    <div class="sec-title">&#128203; Daftar Postingan IG (<?php echo count($instagram); ?>)</div>
    <div class="grid">
      <?php foreach ($instagram as $it): $id = v($it,'id'); ?>
      <div class="card">
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="action" value="save_ig">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <h3><span class="dot"></span>Edit Postingan</h3>
          <label>Caption</label>
          <textarea name="caption"><?php echo v($it,'caption'); ?></textarea>
          <div class="row2">
            <div><label>Likes</label><input type="text" name="likes" value="<?php echo v($it,'likes'); ?>"></div>
            <div><label>Gradient</label>
              <select name="grad">
                <?php $gs=array('linear-gradient(135deg,#7c3aed,#dc2743)'=>'Ungu - Merah','linear-gradient(135deg,#0e7490,#06b6d4)'=>'Toska','linear-gradient(135deg,#b45309,#f59e0b)'=>'Oranye','linear-gradient(135deg,#047857,#10b981)'=>'Hijau','linear-gradient(135deg,#0a1f4d,#13387a)'=>'Navy'); $cur=isset($it['grad'])?$it['grad']:''; foreach($gs as $val=>$lab){ echo '<option value="'.pmb_esc($val).'"'.($cur===$val?' selected':'').'>'.$lab.'</option>'; } ?>
              </select>
            </div>
          </div>
          <label>Link</label>
          <input type="url" name="link" value="<?php echo v($it,'link'); ?>">
          <?php crop_field('ig', v($it,'id'), 'image', 1, 1, 640, 640, v($it,'image'), 'Foto postingan'); ?>
          <div class="btns">
            <button class="save" type="submit">Simpan</button>
            <button class="del" type="submit" form="del_ig_<?php echo $id; ?>" formnovalidate onclick="return confirm('Hapus postingan ini?')">Hapus</button>
          </div>
        </form>
        <form id="del_ig_<?php echo $id; ?>" method="post" style="display:none">
          <input type="hidden" name="action" value="del_ig">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- ============ TESTIMONI ============ -->
  <div class="panel" id="p-ts">
    <div class="sec-title">&#10133; Tambah Testimoni</div>
    <div class="card new">
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_testi">
        <label>Isi testimoni</label>
        <textarea name="text" required placeholder="Tulis pengalaman mahasiswa / alumni"></textarea>
        <div class="row2">
          <div><label>Nama</label><input type="text" name="name" required placeholder="cth: Rani Aprilia"></div>
          <div><label>Program studi</label><input type="text" name="prodi" placeholder="cth: Manajemen S1"></div>
        </div>
        <label>Warna avatar (jika tanpa foto)</label>
        <input type="color" name="c" value="#0a1f4d">
        <?php crop_field('ts', '', 'photo', 1, 1, 600, 600, '', 'Foto penestimoni'); ?>
        <div class="btns"><button class="save" type="submit">Simpan Testimoni</button></div>
        <p class="hint">Pilih foto &rarr; atur crop rasio 1:1. Jika kosong dipakai inisial nama.</p>
      </form>
    </div>
    <div class="sec-title">&#128203; Daftar Testimoni (<?php echo count($testimonials); ?>)</div>
    <div class="grid">
      <?php foreach ($testimonials as $it): $id = v($it,'id'); ?>
      <div class="card">
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="action" value="save_testi">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <h3><span class="dot"></span>Edit Testimoni</h3>
          <label>Isi</label>
          <textarea name="text"><?php echo v($it,'text'); ?></textarea>
          <div class="row2">
            <div><label>Nama</label><input type="text" name="name" value="<?php echo v($it,'name'); ?>"></div>
            <div><label>Prodi</label><input type="text" name="prodi" value="<?php echo v($it,'prodi'); ?>"></div>
          </div>
          <label>Warna avatar</label>
          <input type="color" name="c" value="<?php echo v($it,'c') ?: '#0a1f4d'; ?>">
          <?php crop_field('ts', v($it,'id'), 'photo', 1, 1, 600, 600, v($it,'photo'), 'Foto penestimoni'); ?>
          <div class="btns">
            <button class="save" type="submit">Simpan</button>
            <button class="del" type="submit" form="del_ts_<?php echo $id; ?>" formnovalidate onclick="return confirm('Hapus testimoni ini?')">Hapus</button>
          </div>
        </form>
        <form id="del_ts_<?php echo $id; ?>" method="post" style="display:none">
          <input type="hidden" name="action" value="del_testi">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

  <!-- ============ VIDEO TIKTOK ============ -->
  <div class="panel" id="p-tt">
    <div class="sec-title">&#10133; Tambah Video TikTok</div>
    <div class="card new">
      <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="save_tt">
        <label>Link atau ID video TikTok</label>
        <input type="text" name="vid" required placeholder="https://www.tiktok.com/@pmb.unpam/video/7571436526647872776">
        <?php crop_field('tt', '', 'thumb', 9, 16, 540, 960, '', 'Thumbnail video (9:16)'); ?>
        <div class="btns"><button class="save" type="submit">Simpan Video</button></div>
        <p class="hint">Tempel link video TikTok (atau cukup ID angkanya). Upload thumbnail supaya kartu tidak kosong &mdash; video tetap diputar langsung dari TikTok saat diklik.</p>
      </form>
    </div>
    <div class="sec-title">&#128203; Daftar Video TikTok (<?php echo count($tiktok); ?>)</div>
    <div class="grid">
      <?php foreach ($tiktok as $it): $id = v($it,'id'); ?>
      <div class="card">
        <form method="post" enctype="multipart/form-data">
          <input type="hidden" name="action" value="save_tt">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <h3><span class="dot"></span>Edit Video</h3>
          <label>Link atau ID video TikTok</label>
          <input type="text" name="vid" value="<?php echo v($it,'vid'); ?>">
          <?php crop_field('tt', v($it,'id'), 'thumb', 9, 16, 540, 960, v($it,'thumb'), 'Thumbnail video (9:16)'); ?>
          <div class="btns">
            <button class="save" type="submit">Simpan</button>
            <button class="del" type="submit" form="del_tt_<?php echo $id; ?>" formnovalidate onclick="return confirm('Hapus video ini?')">Hapus</button>
          </div>
        </form>
        <form id="del_tt_<?php echo $id; ?>" method="post" style="display:none">
          <input type="hidden" name="action" value="del_tt">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
        </form>
      </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- CROPPER MODAL -->
<div class="cropm" id="cropm">
  <div class="cropbox">
    <h3 id="cropTitle">Atur Gambar</h3>
    <div class="cropframe" id="cropframe">
      <img id="cropimg" alt="">
      <div class="cropgrid"></div>
    </div>
    <div class="cropctrl"><span>Zoom</span><input type="range" id="cropzoom" min="100" max="300" value="100"></div>
    <div class="cropbtns">
      <button type="button" class="cbtn cancel" id="cropcancel">Batal</button>
      <button type="button" class="cbtn ok" id="cropok">Terapkan</button>
    </div>
    <p class="crophint" id="crophint"></p>
  </div>
</div>

<script>
(function(){
  var tabs=document.querySelectorAll('.tabs button');
  var panels=document.querySelectorAll('.panel');
  tabs.forEach(function(b){
    b.addEventListener('click',function(){
      tabs.forEach(function(x){ x.classList.remove('on'); });
      panels.forEach(function(x){ x.classList.remove('on'); });
      b.classList.add('on');
      document.getElementById(b.getAttribute('data-p')).classList.add('on');
    });
  });
})();

(function(){
  var modal=document.getElementById('cropm');
  var frame=document.getElementById('cropframe');
  var cimg=document.getElementById('cropimg');
  var zoom=document.getElementById('cropzoom');
  var title=document.getElementById('cropTitle');
  var hint=document.getElementById('crophint');
  var FW=300;
  var st=null;

  function clamp(v,lo,hi){
    if(v>hi){ return hi; }
    if(v<lo){ return lo; }
    return v;
  }

  function apply(){
    if(!st){ return; }
    var s=st.base*st.zoom;
    var dw=st.nw*s;
    var dh=st.nh*s;
    st.x=clamp(st.x, st.FW-dw, 0);
    st.y=clamp(st.y, st.FH-dh, 0);
    cimg.style.width=dw+'px';
    cimg.style.height=dh+'px';
    cimg.style.left=st.x+'px';
    cimg.style.top=st.y+'px';
  }

  function openCrop(fileInput, dataUrl){
    var rw=parseFloat(fileInput.getAttribute('data-rw'))||1;
    var rh=parseFloat(fileInput.getAttribute('data-rh'))||1;
    var ow=parseInt(fileInput.getAttribute('data-ow'),10)||600;
    var oh=parseInt(fileInput.getAttribute('data-oh'),10)||600;
    var FH=Math.round(FW*rh/rw);
    frame.style.width=FW+'px';
    frame.style.height=FH+'px';
    var im=new Image();
    im.onload=function(){
      var nw=im.naturalWidth, nh=im.naturalHeight;
      var base=Math.max(FW/nw, FH/nh);
      st={ fileInput:fileInput, hidden:document.getElementById(fileInput.getAttribute('data-hidden')), prev:document.getElementById(fileInput.getAttribute('data-preview')), nw:nw, nh:nh, base:base, zoom:1, FW:FW, FH:FH, ow:ow, oh:oh, src:dataUrl, x:0, y:0 };
      cimg.src=dataUrl;
      st.x=(FW-nw*base)/2;
      st.y=(FH-nh*base)/2;
      zoom.value=100;
      title.textContent='Atur Gambar ('+rw+':'+rh+')';
      hint.textContent='Geser gambar untuk atur posisi, pakai slider untuk zoom.';
      apply();
      modal.classList.add('on');
    };
    im.src=dataUrl;
  }

  document.addEventListener('change',function(e){
    var f=e.target;
    if(!f.classList || f.classList.contains('cropfile')===false){ return; }
    var file=f.files && f.files[0];
    if(!file){ return; }
    var rd=new FileReader();
    rd.onload=function(){ openCrop(f, rd.result); };
    rd.readAsDataURL(file);
  });

  var dragging=false, psx=0, psy=0, pox=0, poy=0;
  frame.addEventListener('pointerdown',function(e){
    if(!st){ return; }
    dragging=true; psx=e.clientX; psy=e.clientY; pox=st.x; poy=st.y;
    try{ frame.setPointerCapture(e.pointerId); }catch(err){}
  });
  frame.addEventListener('pointermove',function(e){
    if(!dragging || !st){ return; }
    st.x=pox+(e.clientX-psx);
    st.y=poy+(e.clientY-psy);
    apply();
  });
  frame.addEventListener('pointerup',function(){ dragging=false; });
  frame.addEventListener('pointercancel',function(){ dragging=false; });

  zoom.addEventListener('input',function(){
    if(!st){ return; }
    var cx=st.FW/2, cy=st.FH/2;
    var oldS=st.base*st.zoom;
    var rx=(cx-st.x)/oldS, ry=(cy-st.y)/oldS;
    st.zoom=parseInt(zoom.value,10)/100;
    var nS=st.base*st.zoom;
    st.x=cx-rx*nS;
    st.y=cy-ry*nS;
    apply();
  });

  function closeM(){
    modal.classList.remove('on');
    if(st && st.fileInput){ st.fileInput.value=''; }
    st=null;
  }
  document.getElementById('cropcancel').addEventListener('click', closeM);
  modal.addEventListener('click',function(e){ if(e.target===modal){ closeM(); } });

  document.getElementById('cropok').addEventListener('click',function(){
    if(!st){ return; }
    var s=st.base*st.zoom;
    var sxp=(-st.x)/s, syp=(-st.y)/s;
    var sw=st.FW/s, sh=st.FH/s;
    var cv=document.createElement('canvas');
    cv.width=st.ow; cv.height=st.oh;
    var ctx=cv.getContext('2d');
    ctx.fillStyle='#ffffff';
    ctx.fillRect(0,0,cv.width,cv.height);
    var out=new Image();
    var target=st;
    out.onload=function(){
      ctx.drawImage(out, sxp, syp, sw, sh, 0, 0, cv.width, cv.height);
      var data=cv.toDataURL('image/jpeg', 0.85);
      if(target.hidden){ target.hidden.value=data; }
      if(target.prev){ target.prev.src=data; target.prev.style.display='block'; }
      if(target.fileInput){ target.fileInput.value=''; }
      modal.classList.remove('on');
      st=null;
    };
    out.src=st.src;
  });
})();
</script>
<?php endif; ?>
</body>
</html>
