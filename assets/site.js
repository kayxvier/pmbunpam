(function () {
  'use strict';

  function get(obj, path, fallback) {
    var cur = obj;
    String(path || '').split('.').forEach(function (key) {
      if (cur && Object.prototype.hasOwnProperty.call(cur, key)) cur = cur[key];
      else cur = undefined;
    });
    return cur === undefined || cur === null ? fallback : cur;
  }

  function safeUrl(value) {
    var url = String(value || '').trim();
    if (!url) return '';
    if (url.charAt(0) === '#') return url;
    return /^(https?:\/\/|mailto:|tel:|\/|\.\/)/i.test(url) ? url : '';
  }

  function setText(el, value) {
    if (value === undefined || value === null || value === '') return;
    if (el.matches('input, textarea, select')) el.value = value;
    else el.textContent = value;
  }

  function applyTheme(settings) {
    var theme = settings.theme || {};
    var vars = {
      '--pmb-primary': theme.primary || '#0a1f4d',
      '--pmb-secondary': theme.secondary || '#13387a',
      '--pmb-accent': theme.accent || '#f6b40a',
      '--pmb-soft': theme.soft || '#f4f7fd'
    };
    var roots = [document.documentElement];
    var app = document.getElementById('pmb-app');
    if (app) roots.push(app);
    roots.forEach(function (root) {
      Object.keys(vars).forEach(function (key) { root.style.setProperty(key, vars[key]); });
    });
    if (app) {
      app.style.setProperty('--navy', vars['--pmb-primary']);
      app.style.setProperty('--navy2', vars['--pmb-secondary']);
      app.style.setProperty('--gold', vars['--pmb-accent']);
      app.style.setProperty('--gold2', vars['--pmb-accent']);
      app.style.setProperty('--soft', vars['--pmb-soft']);
    }
    var style = document.createElement('style');
    style.textContent = ':root{--pmb-primary:' + vars['--pmb-primary'] + ';--pmb-secondary:' + vars['--pmb-secondary'] + ';--pmb-accent:' + vars['--pmb-accent'] + ';--pmb-soft:' + vars['--pmb-soft'] + '}'
      + '.pmb-site-logo{max-width:150px;max-height:64px;width:auto;height:auto;object-fit:contain;display:block;margin:0 0 16px;border-radius:10px}'
      + '.pmb-page-disabled{min-height:100vh;display:grid;place-items:center;padding:30px;background:var(--pmb-soft,#f4f7fd);font-family:system-ui,sans-serif;color:#13203d;text-align:center}'
      + '.pmb-page-disabled .box{max-width:520px;background:#fff;border-radius:20px;padding:36px;box-shadow:0 20px 50px rgba(10,31,77,.12)}';
    document.head.appendChild(style);
  }

  function applyImages(settings) {
    var images = settings.images || {};
    document.querySelectorAll('[data-pmb-image]').forEach(function (el) {
      var src = images[el.getAttribute('data-pmb-image')];
      if (!src) return;
      if (el.tagName === 'IMG') el.src = src;
      else el.style.backgroundImage = 'url("' + String(src).replace(/"/g, '\\"') + '")';
    });
    document.querySelectorAll('[data-pmb-background]').forEach(function (el) {
      var src = images[el.getAttribute('data-pmb-background')];
      if (src) el.style.backgroundImage = 'url("' + String(src).replace(/"/g, '\\"') + '")';
    });
    var logo = get(settings, 'site.logo', '');
    if (logo) {
      document.querySelectorAll('[data-pmb-logo]').forEach(function (el) {
        if (el.tagName === 'IMG') {
          el.src = logo;
          el.alt = get(settings, 'site.logo_alt', el.alt || 'Logo');
          el.hidden = false;
        }
      });
      document.querySelectorAll('.phead').forEach(function (head) {
        if (head.querySelector('[data-pmb-logo]')) return;
        var img = document.createElement('img');
        img.className = 'pmb-site-logo';
        img.setAttribute('data-pmb-logo', '');
        img.src = logo;
        img.alt = get(settings, 'site.logo_alt', 'Logo');
        img.style.margin = '0 auto 14px';
        head.insertBefore(img, head.firstChild);
      });
    }
  }

  function applyTexts(settings) {
    var text = get(settings, 'home.text', {});
    document.querySelectorAll('[data-pmb-text]').forEach(function (el) {
      var key = el.getAttribute('data-pmb-text');
      setText(el, text[key]);
    });
  }

  function applyButtons(settings) {
    var buttons = get(settings, 'home.buttons', {});
    document.querySelectorAll('[data-pmb-button]').forEach(function (el) {
      var key = el.getAttribute('data-pmb-button');
      var cfg = buttons[key];
      if (!cfg) return;
      var enabled = cfg.enabled !== false;
      el.hidden = !enabled;
      el.setAttribute('aria-hidden', enabled ? 'false' : 'true');
      var label = el.querySelector('[data-pmb-label]');
      if (label) setText(label, cfg.label);
      else if (cfg.label && el.childElementCount === 0) setText(el, cfg.label);
      var url = safeUrl(cfg.url);
      if (el.tagName === 'A' && url) el.setAttribute('href', url);
    });
  }

  function applySections(settings) {
    var sections = get(settings, 'home.sections', {});
    var map = {
      services: ['.sec-button', '#pmb-portal'],
      stats: ['.pmb-stats-wrap', '.pmb-sebaran-wrap'],
      welcome: ['#sambutan', '#pmb-sambutan'],
      vision: ['#visi-misi', '#pmb-visi-misi'],
      spmb: ['.sec-spmb', '#pmb-spmb'],
      quiz: ['.sec-quiz', '#pmb-quiz'],
      schedule: ['.sec-jadwal', '#jadwal', '#pmb-jadwal'],
      cost: ['.sec-biaya', '#pmb-biaya'],
      roadmap: ['.sec-roadmap'],
      testimonials: ['#testimoni', '#pmb-testimoni'],
      campus: ['#kampus', '#pmb-kampus'],
      map: ['#pmb-map'],
      highlights: ['#highlights', '#pmb-highlights'],
      social: ['#sosmed', '#pmb-social'],
      tiktok: ['#pmb-tiktok'],
      cta: ['.sec-cta', '#pmb-cta']
    };
    Object.keys(map).forEach(function (key) {
      if (sections[key] !== false) return;
      map[key].forEach(function (selector) {
        document.querySelectorAll(selector).forEach(function (el) { el.hidden = true; });
      });
    });
  }

  function applyPageContent(settings) {
    var file = (location.pathname.split('/').pop() || 'index.php').toLowerCase();
    var key = file.replace(/\.php$/, '') || 'index';
    var pages = settings.page_content || {};
    var overrides = pages[key];
    if (!overrides || typeof overrides !== 'object') return;
    Object.keys(overrides).forEach(function (selector) {
      var cfg = overrides[selector];
      var elements;
      try { elements = document.querySelectorAll(selector); } catch (err) { return; }
      elements.forEach(function (el) {
        if (typeof cfg === 'string' || typeof cfg === 'number') {
          el.textContent = String(cfg);
          return;
        }
        if (!cfg || typeof cfg !== 'object') return;
        if (Object.prototype.hasOwnProperty.call(cfg, 'text')) el.textContent = String(cfg.text);
        if (Object.prototype.hasOwnProperty.call(cfg, 'html')) el.innerHTML = String(cfg.html);
        if (Object.prototype.hasOwnProperty.call(cfg, 'value')) el.value = String(cfg.value);
        if (cfg.attr && typeof cfg.attr === 'object') {
          Object.keys(cfg.attr).forEach(function (name) {
            var value = cfg.attr[name];
            if (value === null || value === false) el.removeAttribute(name);
            else el.setAttribute(name, String(value));
          });
        }
        if (cfg.visible === false) el.hidden = true;
        if (cfg.visible === true) el.hidden = false;
      });
    });
  }

  function applyPageVisibility(settings) {
    var file = (location.pathname.split('/').pop() || 'index.php').toLowerCase();
    var key = file.replace(/\.php$/, '') || 'index';
    if (key === 'site-config' || key === 'admin') return;
    var pages = settings.pages || {};
    if (pages[key] !== false) return;
    document.body.innerHTML = '<main class="pmb-page-disabled"><div class="box"><div style="font-size:42px">🔒</div><h1>Halaman sedang tidak tersedia</h1><p>Halaman ini disembunyikan sementara oleh administrator.</p></div></main>';
  }

  function apply(settings) {
    window.PMB_SITE = settings;
    applyTheme(settings);
    var name = get(settings, 'site.name', 'Penerimaan Mahasiswa Baru');
    var org = get(settings, 'site.organization', 'Universitas Pamulang');
    if (name && org && !/admin\.php$/i.test(location.pathname)) document.title = name + ' — ' + org;
    applyPageVisibility(settings);
    if (document.querySelector('.pmb-page-disabled')) return;
    applyImages(settings);
    applyTexts(settings);
    applyButtons(settings);
    applySections(settings);
    applyPageContent(settings);
  }

  if (window.PMB_SITE && typeof window.PMB_SITE === 'object') {
    apply(window.PMB_SITE);
  } else {
    fetch('site-config.php?v=3.5', { credentials: 'same-origin', cache: 'no-store' })
      .then(function (response) { return response.ok ? response.json() : null; })
      .then(function (settings) { if (settings) apply(settings); })
      .catch(function () { /* Situs tetap dapat dipakai dengan nilai bawaan. */ });
  }
})();

// Counter berjalan setelah load dan tidak menahan render halaman atau peta.
(function () {
  'use strict';
  var file = (location.pathname.split('/').pop() || 'index.php').toLowerCase();
  if (file === 'admin.php' || file === 'site-config.php') return;
  var script = document.currentScript;
  if (!script || !script.src) return;
  var base = new URL('../counter/', script.src);
  function render(data) {
    var panel = document.getElementById('pmbVisitorsData');
    if (!panel || !data || !data.available || !Array.isArray(data.countries)) return;
    var content = panel.querySelector('.pmb-counter-content');
    var format = new Intl.NumberFormat('id-ID');
    var countryNames = typeof Intl.DisplayNames === 'function' ? new Intl.DisplayNames(['id'], { type: 'region' }) : null;
    function appendGroup(target, countries, total, pageviews) {
      var list = document.createElement('ul');
      list.className = 'pmb-counter-list';
      countries.forEach(function (country) {
        if (!/^[A-Z]{2}$/.test(country.code) || !Number.isSafeInteger(country.n) || country.n < 0) return;
        var name = country.name;
        if ((!name || name === country.code) && countryNames) name = countryNames.of(country.code);
        name = name || country.code;
        var item = document.createElement('li');
        var flag = document.createElement('img');
        flag.src = 'https://flagcdn.com/24x18/' + country.code.toLowerCase() + '.png';
        flag.alt = name;
        flag.width = 24;
        flag.height = 18;
        flag.loading = 'lazy';
        flag.addEventListener('error', function () { this.style.visibility = 'hidden'; }, { once: true });
        var number = document.createElement('span');
        number.textContent = format.format(country.n);
        item.title = name + ': ' + number.textContent;
        item.appendChild(flag);
        item.appendChild(number);
        list.appendChild(item);
      });
      if (!list.children.length) {
        var empty = document.createElement('p');
        empty.className = 'pmb-counter-empty';
        empty.textContent = 'Data pengunjung belum tersedia';
        target.appendChild(empty);
        return;
      }
      var totals = document.createElement('p');
      totals.className = 'pmb-counter-totals';
      [['Total pengunjung', total], ['Pageviews', pageviews]].forEach(function (entry) {
        var line = document.createElement('span');
        line.textContent = entry[0] + ': ' + format.format(entry[1]);
        totals.appendChild(line);
      });
      target.appendChild(list);
      target.appendChild(totals);
    }
    var fragment = document.createDocumentFragment();
    appendGroup(fragment, data.countries.slice(0, 10), data.total, data.pageviews);
    var other = document.createElement('section');
    other.className = 'pmb-counter-other';
    other.setAttribute('aria-label', 'Pengunjung dari Benua Lain');
    var title = document.createElement('div');
    title.className = 'pmb-counter-label';
    title.textContent = 'Pengunjung dari Benua Lain';
    other.appendChild(title);
    var otherData = data.other || {};
    appendGroup(other, Array.isArray(otherData.countries) ? otherData.countries : [], otherData.total, otherData.pageviews);
    fragment.appendChild(other);
    content.replaceChildren(fragment);
  }
  function start() {
    // Satu POST untuk setiap navigasi halaman publik yang memuat site.js.
    fetch(new URL('track.php', base), { method: 'POST', credentials: 'same-origin', cache: 'no-store' })
      .catch(function () { /* Counter tidak boleh mengganggu halaman. */ })
      .then(function () {
        if (!document.getElementById('pmbVisitorsData')) return;
        return fetch(new URL('data.php', base), { credentials: 'same-origin', cache: 'no-store' })
          .then(function (response) { return response.ok ? response.json() : null; })
          .then(render);
      }).catch(function () { /* Teks fallback awal tetap ditampilkan. */ });
  }
  if (document.readyState === 'complete') start();
  else window.addEventListener('load', start, { once: true });
})();
