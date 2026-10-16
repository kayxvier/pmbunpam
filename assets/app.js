
(function(){
  var root = document.getElementById('pmb-app');
  if(!root) return;

  /* ---------- shared Leaflet loader (dipakai peta sebaran + peta kampus) ---------- */
  window.pmbEnsureLeaflet=function(cb){
    if(window.L){cb();return;}
    if(window.__pmbLLQ){window.__pmbLLQ.push(cb);return;}
    window.__pmbLLQ=[cb];
    function flush(){
      var q=window.__pmbLLQ||[];window.__pmbLLQ=null;
      q.forEach(function(f){
        try{ f(); }catch(e){}
      });
    }
    var css=document.createElement('link');css.rel='stylesheet';css.href='https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';document.head.appendChild(css);
    var s=document.createElement('script');s.src='https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
    s.onload=flush;s.onerror=flush;
    document.head.appendChild(s);
  };

  /* ---------- 1. HERO background carousel ---------- */
  (function(){
    var slides = root.querySelectorAll('#pmbHeroBg .slide');
    var dots = root.querySelectorAll('#pmbHeroDots i');
    if(!slides.length) return;
    var i = 0;
    function show(n){
      slides[i].classList.remove('on'); if(dots[i]) dots[i].classList.remove('on');
      i = (n+slides.length)%slides.length;
      slides[i].classList.add('on'); if(dots[i]) dots[i].classList.add('on');
    }
    dots.forEach(function(d,idx){ d.addEventListener('click',function(){ show(idx); reset(); }); });
    var t = setInterval(function(){ show(i+1); }, 4200);
    function reset(){ clearInterval(t); t = setInterval(function(){ show(i+1); }, 4200); }
  })();

  /* ---------- 2. KAMPUS carousel ---------- */
  (function(){
    var track = document.getElementById('pmbKmpTrack');
    if(!track) return;
    var locations = window.PMB_DATA && window.PMB_DATA.locations && Array.isArray(window.PMB_DATA.locations.campuses) ? window.PMB_DATA.locations.campuses : [];
    function esc(v){return String(v==null?'':v).replace(/[&<>"']/g,function(c){return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c];});}
    if(locations.length){
      track.innerHTML = locations.map(function(c,i){
        var name=c.name||('Kampus '+(i+1)), address=c.address||'', image=c.image||('https://simaba.my.id/assets/img/KAMPUS'+(i+1)+'.webp');
        return '<div class="pmb-kmp-slide"><img src="'+esc(image)+'" alt="'+esc(name)+'" loading="lazy"><div class="cap"><span class="badge">'+esc(name)+'</span><h4>'+esc(name)+'</h4><p>'+esc(address)+'</p></div></div>';
      }).join('');
      var dotWrap=document.getElementById('pmbKmpDots');
      if(dotWrap) dotWrap.innerHTML=locations.map(function(_,i){return '<i class="'+(i===0?'on':'')+'"></i>';}).join('');
      var thumbWrap=root.querySelector('.pmb-kmp-thumbs');
      if(thumbWrap) thumbWrap.innerHTML=locations.map(function(c,i){var name=c.name||('Kampus '+(i+1)),image=c.image||('https://simaba.my.id/assets/img/KAMPUS'+(i+1)+'.webp');return '<button class="pmb-kmp-thumb" data-i="'+i+'"><img src="'+esc(image)+'" alt="" loading="lazy"><div class="t">'+esc(name)+'<span>'+esc(c.address||'')+'</span></div></button>';}).join('');
    }
    var total = track.children.length, cur = 0;
    var dots = root.querySelectorAll('#pmbKmpDots i');
    var thumbs = root.querySelectorAll('.pmb-kmp-thumb');
    function go(n){
      cur = (n+total)%total;
      track.style.transform = 'translateX(-'+(cur*100)+'%)';
      dots.forEach(function(d,k){ d.classList.toggle('on', k===cur); });
    }
    var pn = document.getElementById('pmbKmpNext'), pp = document.getElementById('pmbKmpPrev');
    if(pn) pn.addEventListener('click',function(){ go(cur+1); rst(); });
    if(pp) pp.addEventListener('click',function(){ go(cur-1); rst(); });
    dots.forEach(function(d,k){ d.addEventListener('click',function(){ go(k); rst(); }); });
    thumbs.forEach(function(b){ b.addEventListener('click',function(){ go(parseInt(b.getAttribute('data-i'),10)); rst(); }); });
    var t = setInterval(function(){ go(cur+1); }, 5000);
    function rst(){ clearInterval(t); t = setInterval(function(){ go(cur+1); }, 5000); }
  })();

  /* ---------- 2b. Biaya dari dataset admin ---------- */
  (function(){
    var tabs=document.getElementById('pmbBiayaTabs');
    if(!tabs) return;
    var costs=window.PMB_DATA&&window.PMB_DATA.costs;
    if(!costs||typeof costs!=='object') return;
    var keys=Object.keys(costs);
    if(!keys.length) return;
    function esc(v){return String(v==null?'':v).replace(/[&<>"']/g,function(c){return {'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[c];});}
    function fmt(v){return esc(v).replace(/&lt;br\s*\/?&gt;/gi,'<br>');}
    tabs.innerHTML=keys.map(function(k,i){return '<button class="pmb-btab '+(i===0?'on':'')+'" data-p="'+esc(k)+'">'+esc((costs[k]||{}).name||k)+'</button>';}).join('');
    var holder=tabs.nextElementSibling;
    if(!holder) return;
    holder.innerHTML=keys.map(function(k,i){
      var c=costs[k]||{},reg=c.registrasi_awal||{},reg2=reg.csck||reg.cs||reg.c||'',items=Array.isArray(c.items)?c.items:[];
      var rows=items.map(function(item){var hi=item.highlight?' class="hl"':'';var a=item.ab||'',b=item.csck||item.cs||'';return '<tr'+hi+'><td><span class="u">'+fmt(item.uraian||'')+'</span>'+(item.sub_note?'<div class="kt">'+fmt(item.sub_note)+'</div>':'')+'</td><td><span class="pr">'+fmt(a)+'</span></td><td><span class="pr">'+fmt(b)+'</span></td><td class="kt">'+fmt(item.keterangan||'')+'</td></tr>';}).join('');
      return '<div class="pmb-bpane '+(i===0?'on':'')+'" data-p="'+esc(k)+'"><div class="pmb-btable-wrap"><div class="pmb-btable-cap">💰 '+esc(c.name||k)+'</div><div class="pmb-bscroll"><table class="pmb-btable"><thead><tr><th>Uraian Biaya</th><th>Reg. A &amp; B</th><th>Reguler lainnya</th><th>Keterangan</th></tr></thead><tbody>'+rows+'</tbody></table></div><div class="pmb-breg"><div class="ic">ℹ️</div><div class="tx"><h5>Biaya Registrasi Awal</h5><div class="rows"><span class="a">Reg. A &amp; B: <b>'+fmt(reg.ab||'')+'</b></span><span class="c">Reguler lainnya: <b>'+fmt(reg2)+'</b></span></div><p class="note">*'+fmt(c.total_registrasi||'')+'</p></div></div></div></div>';
    }).join('');
  })();

  /* ---------- 3. Horizontal scroll arrows (highlights + IG) ---------- */
  root.querySelectorAll('.pmb-arrow').forEach(function(btn){
    btn.addEventListener('click',function(){
      var el = document.getElementById(btn.getAttribute('data-t'));
      if(!el) return;
      var dir = parseInt(btn.getAttribute('data-d'),10) || 1;
      el.scrollBy({ left: dir*Math.max(280, el.clientWidth*0.8), behavior:'smooth' });
    });
  });

  /* ---------- Highlights (dynamic dari admin) ---------- */
  (function(){
    var wrap=document.getElementById('pmbHlScroll');
    if(!wrap) return;
    var items=(window.PMB_DATA&&window.PMB_DATA.highlights)||[];
    if(!items.length){ return; }
    items=items.slice().reverse(); /* terbaru ditambahkan tampil paling depan */
    var grads=['linear-gradient(135deg,#0a1f4d,#13387a)','linear-gradient(135deg,#0e7490,#06b6d4)','linear-gradient(135deg,#b45309,#f59e0b)','linear-gradient(135deg,#9333ea,#ec4899)','linear-gradient(135deg,#047857,#10b981)'];
    wrap.innerHTML=items.map(function(p,i){
      var link=p.link||'https://pmb.unpam.ac.id/informasi';
      var tag=p.tag?('<span class="tag">'+p.tag+'</span>'):'';
      var thumb=p.thumb?('<div class="thumb"><img src="'+p.thumb+'" alt="" loading="lazy">'+tag+'</div>'):('<div class="thumb" style="background:'+grads[i%grads.length]+'"><span class="em">'+(p.em||'\uD83D\uDCF0')+'</span>'+tag+'</div>');
      return '<a class="pmb-hl" href="'+link+'" target="_blank" rel="noopener">'+thumb+'<div class="bd"><span class="date">'+(p.date||'Terbaru')+'</span><span class="tt">'+(p.title||'')+'</span><span class="go">Baca selengkapnya \u2192</span></div></a>';
    }).join('');
  })();

  /* ---------- 4. Instagram cards ---------- */
  (function(){
    var wrap = document.getElementById('pmbIgScroll');
    if(!wrap) return;
    var IG_LINK = 'https://www.instagram.com/pmb.unpam';
    var posts = (window.PMB_DATA&&window.PMB_DATA.instagram)||[];
    var ACTS = '<div class="acts">'
      + '<svg viewBox="0 0 24 24" fill="none" stroke="#ed4956" stroke-width="2"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1-1.1a5.5 5.5 0 1 0-7.8 7.8l1.1 1L12 21l7.8-7.6 1-1a5.5 5.5 0 0 0 0-7.8z" fill="#ed4956"/></svg>'
      + '<svg viewBox="0 0 24 24" fill="none" stroke="#262626" stroke-width="2"><path d="M21 11.5a8.4 8.4 0 0 1-9 8.4 9 9 0 0 1-3.9-.9L3 20l1.1-4.1A8.4 8.4 0 0 1 3 11.5 8.4 8.4 0 0 1 12 3a8.4 8.4 0 0 1 9 8.5z"/></svg>'
      + '<svg viewBox="0 0 24 24" fill="none" stroke="#262626" stroke-width="2"><path d="M22 2 11 13"/><path d="M22 2 15 22l-4-9-9-4z"/></svg>'
      + '<span class="sp"></span>'
      + '<svg viewBox="0 0 24 24" fill="none" stroke="#262626" stroke-width="2"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"/></svg>'
      + '</div>';
    var html = posts.map(function(p){
      var link = p.link || IG_LINK;
      var media = p.image
        ? '<img src="'+p.image+'" alt="" loading="lazy">'
        : '<div class="ph" style="background:'+(p.grad||'linear-gradient(135deg,#7c3aed,#dc2743)')+'"><span class="em">\uD83D\uDCF7</span><span class="cp">'+p.caption+'</span></div>';
      return '<div class="pmb-igc">'
        + '<div class="h"><div class="ava"><img src="https://upload.wikimedia.org/wikipedia/commons/9/95/Instagram_logo_2022.svg" alt="ig"></div><div class="id"><b>pmb.unpam</b><span>Penerimaan Mahasiswa Baru UNPAM</span></div><a class="fl" href="'+IG_LINK+'" target="_blank" rel="noopener">Follow</a></div>'
        + '<a class="media" href="'+link+'" target="_blank" rel="noopener">'+media+'</a>'
        + '<div class="bd">'+ACTS+'<div class="likes">'+(p.likes||'0')+' suka</div><div class="cap"><b>pmb.unpam</b> '+p.caption+'</div></div>'
        + '</div>';
    }).join('');
    wrap.innerHTML = html;
  })();

  /* ---------- 3c. Smooth-scroll tombol anchor (#pmb-*) ---------- */
  (function(){
    var links=document.querySelectorAll('#pmb-app a[href^="#pmb-"]');
    if(!links.length) return;
    links.forEach(function(a){
      a.addEventListener('click',function(e){
        var id=a.getAttribute('href').slice(1);
        var el=document.getElementById(id);
        if(!el) return;
        e.preventDefault();
        try{ el.scrollIntoView({behavior:'smooth',block:'start'}); }catch(_){ el.scrollIntoView(); }
        if(window.parent!==window){
          try{
            var r=el.getBoundingClientRect();
            var y=r.top+(window.pageYOffset||document.documentElement.scrollTop||0);
            window.parent.postMessage({pmbScrollTo:y,pmbAnchor:id},'*');
          }catch(_){}
        }
      });
    });
  })();

  /* ---------- 4b. TikTok (render dari data admin + klik untuk memutar) ---------- */
  (function(){
    var wrap=document.getElementById('pmbTtScroll');
    if(!wrap) return;
    var vids=(window.PMB_DATA&&window.PMB_DATA.tiktok)||[];
    if(!vids.length){
      var sec=document.getElementById('pmb-tiktok');
      if(sec) sec.style.display='none';
      return;
    }
    var TIKICON='<svg viewBox="0 0 48 48" width="20" height="20" aria-hidden="true"><path fill="#fff" d="M33.2 6c.6 4 3 7.1 6.8 7.6v4.7c-2.4.1-4.7-.6-6.8-1.9v10.9c0 5.6-4 10.7-9.9 10.7-5.3 0-9.3-4.1-9.3-9.4 0-5.7 4.8-9.9 10.7-9v4.9c-.7-.2-1.4-.3-2-.3-2.6 0-4.6 2-4.6 4.5s2 4.5 4.4 4.5c2.6 0 4.3-2 4.3-4.6V6h6.4z"/></svg>';
    var PLAYICON='<svg viewBox="0 0 24 24" width="24" height="24" aria-hidden="true"><path fill="#0a1f4d" d="M8 5v14l11-7z"/></svg>';
    wrap.innerHTML=vids.map(function(v){
      var vid=String(v.vid||'').replace(/[^0-9]/g,'');
      var poster=v.thumb
        ? '<span class="pmb-tt-poster" style="background-image:url(&quot;'+String(v.thumb).replace(/&/g,'&amp;').replace(/"/g,'&quot;')+'&quot;)"></span>'
        : '<span class="pmb-tt-poster pmb-tt-noimg"></span>';
      return '<div class="pmb-tt-card" data-vid="'+vid+'">'
        + '<button class="pmb-tt-play" type="button" aria-label="Putar video TikTok">'
        + poster
        + '<span class="pmb-tt-brand">'+TIKICON+' TikTok</span>'
        + '<span class="pmb-tt-ic">'+PLAYICON+'</span>'
        + '<span class="pmb-tt-txt">Putar Video</span>'
        + '</button></div>';
    }).join('');
    wrap.querySelectorAll('.pmb-tt-card').forEach(function(card){
      card.addEventListener('click',function(){
        if(card.classList.contains('playing')) return;
        var vid=card.getAttribute('data-vid'); if(!vid) return;
        var fr=document.createElement('div');
        fr.className='pmb-tt-frame';
        var ifr=document.createElement('iframe');
        ifr.src='https://www.tiktok.com/embed/v2/'+vid+'?autoplay=1';
        ifr.title='TikTok PMB UNPAM';
        ifr.setAttribute('allow','autoplay; encrypted-media; fullscreen; picture-in-picture');
        ifr.setAttribute('allowfullscreen','');
        ifr.setAttribute('scrolling','no');
        ifr.setAttribute('frameborder','0');
        fr.appendChild(ifr);
        card.appendChild(fr);
        card.classList.add('playing');
      });
    });
  })();

  /* ---------- 5. Testimoni ---------- */
  (function(){
    var track = document.getElementById('pmbTestiTrack');
    if(!track) return;
    var data = (window.PMB_DATA&&window.PMB_DATA.testimonials)||[];
    function card(t){
      var ini = t.name.split(' ').slice(0,2).map(function(w){return w.charAt(0);}).join('').toUpperCase();
      return '<div class="pmb-tc"><div class="stars">\u2605\u2605\u2605\u2605\u2605</div>'
        + '<p>\u201C'+t.text+'\u201D</p>'
        + '<div class="who"><div class="av" style="background:'+(t.c||'#0a1f4d')+'">'+(t.photo?'<img src="'+t.photo+'" alt="">':ini)+'</div>'
        + '<div><b>'+t.name+'</b><span>'+t.prodi+'</span></div></div></div>';
    }
    var all = data.concat(data).map(card).join('');
    track.innerHTML = all;
  })();

  /* ---------- 6. Kalender jadwal + popup ---------- */
  (function(){
    var monthsEl = document.getElementById('pmbMonths');
    var pop = document.getElementById('pmbPop');
    if(!monthsEl || !pop) return;
    var MN = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    var DOW = ['Min','Sen','Sel','Rab','Kam','Jum','Sab'];
    var PH = [
      { key:'pendaftaran', label:'Pendaftaran', c:'#3b82f6' },
      { key:'spmb_online', label:'SPMB Online (Ujian)', c:'#6366f1' },
      { key:'pengumuman', label:'Pengumuman', c:'#f59e0b' },
      { key:'registrasi', label:'Registrasi', c:'#10b981' },
      { key:'pkkmb', label:'PKKMB', c:'#f43f5e' },
      { key:'cetak_krs', label:'Cetak KRS', c:'#06b6d4' }
    ];
    /* Jadwal SPMB Semester Genap TA 2026/2027 \u2013 2 gelombang */
    var SCHEDULE = (window.PMB_DATA && Array.isArray(window.PMB_DATA.schedule) && window.PMB_DATA.schedule.length ? window.PMB_DATA.schedule : [
      { gel:'I',  pendaftaran:'31 Agustus \u2013 17 November 2026', spmb_online:'20 November \u2013 23 November 2026', pengumuman:'26 November 2026', registrasi:'26 November \u2013 14 Desember 2026', pkkmb:'Reguler B & CS: 30 Januari 2027; Reguler A & CK: 4 Februari 2027', cetak_krs:'my.unpam.ac.id mulai tanggal: 27 & 28 Januari 2027' },
      { gel:'II', pendaftaran:'18 November 2026 \u2013 12 Januari 2027', spmb_online:'15 \u2013 18 Januari 2027', pengumuman:'21 Januari 2027', registrasi:'21 Januari \u2013 29 Januari 2027', pkkmb:'Reguler B & CS: 30 Januari 2027; Reguler A & CK: 4 Februari 2027', cetak_krs:'my.unpam.ac.id mulai tanggal: 27 & 28 Januari 2027' }
    ]);
    function monthIdx(name){ for(var i=0;i<MN.length;i++){ if(name.toLowerCase().indexOf(MN[i].toLowerCase())>-1) return i; } return -1; }
    // parse satu segmen: "17 November 2026", "31 Agustus", "27"
    function parseDay(seg, fbM, fbY){
      seg = String(seg).trim();
      var ym = seg.match(/(20\d{2})/);
      var body = seg.replace(/20\d{2}/g,' ');
      var dm = body.match(/(\d{1,2})/);
      var mi = monthIdx(body);
      return { d: dm?parseInt(dm[1],10):1, m: mi>-1?mi:fbM, y: ym?parseInt(ym[1],10):fbY };
    }
    // parse nilai jadwal -> daftar rentang tanggal. Mendukung rentang biasa
    // ("31 Agustus \u2013 17 November 2026"), rentang lintas tahun
    // ("18 November 2026 \u2013 12 Januari 2027"), tanggal ganda ("27 & 28 Januari 2027"),
    // beberapa keterangan dipisah ";" dan label sebelum ":".
    function parseRanges(str){
      var res = [];
      String(str).split(';').forEach(function(grp){
        var txt = grp.trim(); if(!txt) return;
        var val = txt.replace(/^[^:]*:/,'');
        var tail = val.split(/[\u2013\u2014-]/);
        var ref = parseDay(tail[tail.length-1], 0, 2026);
        val.split('&').forEach(function(sub){
          var parts = sub.split(/[\u2013\u2014-]/);
          var end = parseDay(parts[parts.length-1], ref.m, ref.y);
          var start = parts.length>1 ? parseDay(parts[0], end.m, end.y) : end;
          res.push({ s:new Date(start.y,start.m,start.d), e:new Date(end.y,end.m,end.d), raw:txt });
        });
      });
      return res;
    }
    // build intervals
    function buildIntervals(filter){
      var iv = [];
      SCHEDULE.forEach(function(row){
        if(filter!=='all' && row.gel!==filter) return;
        PH.forEach(function(p){
          if(!row[p.key]) return;
          parseRanges(row[p.key]).forEach(function(r){
            iv.push({ c:p.c, label:p.label, gel:row.gel, s:r.s, e:r.e, raw:r.raw||row[p.key] });
          });
        });
      });
      return iv;
    }
    function sameDay(a,b){ return a.getFullYear()===b.getFullYear() && a.getMonth()===b.getMonth() && a.getDate()===b.getDate(); }
    function inRange(d,iv){ var t=d.getTime(); return t>=new Date(iv.s.getFullYear(),iv.s.getMonth(),iv.s.getDate()).getTime() && t<=new Date(iv.e.getFullYear(),iv.e.getMonth(),iv.e.getDate()).getTime(); }

    // rentang bulan kalender dihitung otomatis dari seluruh jadwal (bisa lintas tahun)
    function monthSpan(){
      var iv = buildIntervals('all'); var list = [];
      if(!iv.length) return list;
      var min = iv[0].s, max = iv[0].e;
      iv.forEach(function(x){ if(x.s<min) min=x.s; if(x.e>max) max=x.e; });
      var y = min.getFullYear(), m = min.getMonth();
      while(y<max.getFullYear() || (y===max.getFullYear() && m<=max.getMonth())){
        list.push({ y:y, m:m });
        m++; if(m>11){ m=0; y++; }
      }
      return list;
    }
    var MONTHS = monthSpan();

    function render(filter){
      var iv = buildIntervals(filter);
      var out = '';
      MONTHS.forEach(function(mo){
        var y = mo.y, m = mo.m;
        var startDow = new Date(y,m,1).getDay();
        var daysIn = new Date(y,m+1,0).getDate();
        out += '<div class="pmb-month"><h4>'+MN[m]+' '+y+'</h4><div class="pmb-dow">'+DOW.map(function(x){return '<span>'+x+'</span>';}).join('')+'</div><div class="pmb-days">';
        for(var p=0;p<startDow;p++){ out += '<div class="pmb-day pad"></div>'; }
        for(var d=1; d<=daysIn; d++){
          var date = new Date(y,m,d);
          var rows = [];
          iv.forEach(function(x){ if(inRange(date,x)){ rows.push(x); } });
          if(rows.length){
            // dedupe by label+color
            var seen = {}; var uniq = [];
            rows.forEach(function(x){ var k=x.label+x.c; if(!seen[k]){ seen[k]=1; uniq.push(x); } });
            var dots = uniq.slice(0,4).map(function(x){ return '<i style="background:'+x.c+'"></i>'; }).join('');
            var info = { date:d+' '+MN[m]+' '+y, rows:uniq.map(function(x){ return { l:x.label, c:x.c, g:x.gel, raw:x.raw }; }) };
            out += '<div class="pmb-day on" data-info="'+encodeURIComponent(JSON.stringify(info))+'">'+d+'<div class="dots">'+dots+'</div></div>';
          } else {
            out += '<div class="pmb-day">'+d+'</div>';
          }
        }
        out += '</div></div>';
      });
      monthsEl.innerHTML = out;
    }

    /* popup */
    var activeCell = null;
    function renderPop(info){
      var h = '<div class="pt">\uD83D\uDCCC '+info.date+'</div>';
      info.rows.forEach(function(r){
        h += '<div class="row"><i style="background:'+r.c+'"></i><div><div class="lb">'+r.l+' <span style="opacity:.7;font-weight:600">(Gel '+r.g+')</span></div><div class="rg">'+r.raw+'</div></div></div>';
      });
      pop.innerHTML = h;
    }
    function place(x,y){
      pop.classList.add('show');
      var w = pop.offsetWidth, h = pop.offsetHeight;
      var nx = x+14, ny = y+14;
      if(nx+w > window.innerWidth-10) nx = x-w-14;
      if(ny+h > window.innerHeight-10) ny = y-h-14;
      if(nx<8) nx=8; if(ny<8) ny=8;
      pop.style.left = nx+'px'; pop.style.top = ny+'px';
    }
    function showFor(cell,x,y){
      var raw = cell.getAttribute('data-info'); if(!raw) return;
      try { renderPop(JSON.parse(decodeURIComponent(raw))); } catch(e){ return; }
      if(activeCell && activeCell!==cell) activeCell.classList.remove('act');
      activeCell = cell; cell.classList.add('act');
      place(x,y);
    }
    function hide(){ pop.classList.remove('show'); if(activeCell){ activeCell.classList.remove('act'); activeCell=null; } }

    monthsEl.addEventListener('mouseover',function(e){ var c=e.target.closest('.pmb-day.on'); if(c) showFor(c,e.clientX,e.clientY); });
    monthsEl.addEventListener('mousemove',function(e){ var c=e.target.closest('.pmb-day.on'); if(c && pop.classList.contains('show')) place(e.clientX,e.clientY); });
    monthsEl.addEventListener('mouseout',function(e){ var c=e.target.closest('.pmb-day.on'); if(c && !c.contains(e.relatedTarget)) hide(); });
    monthsEl.addEventListener('touchstart',function(e){ var c=e.target.closest('.pmb-day.on'); if(c){ var t=e.touches[0]; showFor(c,t.clientX,t.clientY); } },{passive:true});
    document.addEventListener('touchstart',function(e){ if(!e.target.closest('.pmb-day.on')) hide(); },{passive:true});
    window.addEventListener('scroll',hide,{passive:true});

    var tabs = root.querySelectorAll('#pmbCalTabs .pmb-cal-tab');
    tabs.forEach(function(b){ b.addEventListener('click',function(){ tabs.forEach(function(x){x.classList.remove('on');}); b.classList.add('on'); hide(); render(b.getAttribute('data-g')); }); });
    render('all');
  })();

  /* ---------- 7. Reveal on scroll ---------- */
  (function(){
    var els = root.querySelectorAll('.pmb-rv');
    root.classList.add('pmb-js');
    function reveal(el){ el.classList.add('in'); }
    if(!('IntersectionObserver' in window)){ els.forEach(reveal); return; }
    var io = new IntersectionObserver(function(ents){ ents.forEach(function(en){ if(en.isIntersecting){ reveal(en.target); io.unobserve(en.target); } }); }, { threshold:0.08 });
    els.forEach(function(el){ io.observe(el); });
    // safety: never leave content hidden if the observer does not fire
    setTimeout(function(){ els.forEach(reveal); }, 300);
    window.addEventListener('load', function(){ els.forEach(reveal); });
  })();


  /* ---------- 8. G-Form popup ---------- */
  window.pmbOpenGform=function(){var m=document.getElementById('pmbGform');if(m)m.classList.add('show');};
  window.pmbCloseGform=function(){var m=document.getElementById('pmbGform');if(m)m.classList.remove('show');};
  (function(){var m=document.getElementById('pmbGform');if(m)m.addEventListener('click',function(e){if(e.target===m)m.classList.remove('show');});})();

  /* ---------- 9. Quiz cocok prodi ---------- */
  (function(){
    var campus=null,current=0,scores={};
    var opts=[{t:'Setuju',s:2},{t:'Netral',s:1},{t:'Tidak Setuju',s:0}];
    var questions=[{"q": "Saya merasa tertantang ketika harus memecahkan masalah rumit yang butuh logika.", "mt": ["Teknik Informatika S1", "Sistem Informasi S1", "Matematika S1", "Teknik Industri S1"], "ms": ["Sistem Komputer S1 - Serang", "Matematika S1 - Serang", "Sistem Informasi S1 - Serang"]}, {"q": "Saya senang menganalisis data, angka, dan mencari pola yang tersembunyi.", "mt": ["Akuntansi S1", "Matematika S1", "Sistem Informasi S1"], "ms": ["Akuntansi S1 - Serang", "Matematika S1 - Serang"]}, {"q": "Saya lebih suka pekerjaan yang terstruktur, rapi, dan mengikuti aturan.", "mt": ["Administrasi Perkantoran D-3", "Akuntansi S1", "Ilmu Hukum S1"], "ms": ["Administrasi Negara S1 - Serang", "Ilmu Hukum S1 - Serang"]}, {"q": "Saya mudah memahami hubungan antara teori dan penerapannya di dunia nyata.", "mt": ["Teknik Industri S1", "Teknik Mesin S1", "Pend. Ekonomi S1"], "ms": ["Teknik Mesin S1 - Serang", "Manajemen S1 - Serang"]}, {"q": "Saya suka menjelaskan sesuatu agar orang lain paham.", "mt": ["Pend. Guru Sekolah Dasar S1", "Pend. Ekonomi S1", "Manajemen Pendidikan Islam S1", "Ilmu Komunikasi S1"], "ms": ["Administrasi Negara S1 - Serang"]}, {"q": "Saya senang berinteraksi, berdiskusi, dan bertukar pikiran dengan banyak orang.", "mt": ["Ilmu Komunikasi S1", "Manajemen S1", "Pend. Jasmani S1"], "ms": ["Manajemen S1 - Serang", "Ilmu Pemerintahan S1 - Serang"]}, {"q": "Saya cenderung berpikir logis dan sistematis dalam mengambil keputusan.", "mt": ["Teknik Informatika S1", "Akuntansi S1", "Manajemen S1"], "ms": ["Sistem Informasi S1 - Serang", "Manajemen S1 - Serang"]}, {"q": "Saya tertarik memahami bagaimana suatu organisasi berjalan dengan efektif.", "mt": ["Manajemen S1", "Manajemen Pendidikan Islam S1", "Teknik Industri S1"], "ms": ["Administrasi Negara S1 - Serang", "Ilmu Pemerintahan S1 - Serang"]}, {"q": "Saya suka kegiatan yang membutuhkan ketelitian dan fokus tinggi.", "mt": ["Akuntansi S1", "Teknik Kimia S1", "Administrasi Perkantoran D-3"], "ms": ["Kimia S1 - Serang", "Akuntansi S1 - Serang"]}, {"q": "Saya sering punya ide untuk membuat sesuatu lebih efisien atau lebih praktis.", "mt": ["Teknik Industri S1", "Teknik Informatika S1", "Sistem Informasi S1"], "ms": ["Sistem Informasi S1 - Serang", "Sistem Komputer S1 - Serang"]}, {"q": "Saya senang membantu orang lain memahami nilai-nilai moral dan kebangsaan.", "mt": ["Pend. Pancasila dan Kewarganegaraan S1", "Manajemen Pendidikan Islam S1"], "ms": ["Administrasi Negara S1 - Serang"]}, {"q": "Saya suka mencari tahu alasan di balik sebuah fenomena alam atau sosial.", "mt": ["Teknik Kimia S1", "Matematika S1", "Manajemen S1"], "ms": ["Biologi S1 - Serang", "Kimia S1 - Serang"]}, {"q": "Saya merasa nyaman saat harus berbicara di depan orang banyak.", "mt": ["Ilmu Komunikasi S1", "Pend. Guru Sekolah Dasar S1", "Sastra Inggris S1"], "ms": ["Administrasi Negara S1 - Serang"]}, {"q": "Saya tertarik dengan budaya dan cara orang berkomunikasi di berbagai tempat.", "mt": ["Sastra Inggris S1", "Sastra Indonesia S1", "Ilmu Komunikasi S1"], "ms": []}, {"q": "Saya cenderung berpikir terencana dan suka membuat daftar tugas.", "mt": ["Administrasi Perkantoran D-3", "Manajemen S1", "Akuntansi Perpajakan Sarjana Terapan"], "ms": ["Manajemen S1 - Serang"]}, {"q": "Saya suka hal-hal yang berhubungan dengan sistem listrik atau teknologi alat.", "mt": ["Teknik Elektro S1", "Teknik Mesin S1"], "ms": ["Teknik Elektro S1 - Serang", "Teknik Mesin S1 - Serang"]}, {"q": "Saya tertarik dengan dunia industri dan proses produksinya.", "mt": ["Teknik Industri S1", "Teknik Mesin S1"], "ms": ["Teknik Mesin S1 - Serang"]}, {"q": "Saya senang menganalisis perilaku manusia dan cara berpikir orang lain.", "mt": ["Ilmu Komunikasi S1", "Manajemen Pendidikan Islam S1", "Pend. Guru Sekolah Dasar S1"], "ms": ["Ilmu Pemerintahan S1 - Serang"]}, {"q": "Saya merasa puas jika pekerjaan saya membantu masyarakat atau banyak orang.", "mt": ["Pend. Jasmani S1", "Manajemen Pendidikan Islam S1", "Pend. Guru Sekolah Dasar S1"], "ms": ["Administrasi Negara S1 - Serang", "Ilmu Pemerintahan S1 - Serang"]}, {"q": "Saya tertarik dengan konsep keadilan dan peraturan yang mengatur kehidupan bersama.", "mt": ["Ilmu Hukum S1", "Pend. Pancasila dan Kewarganegaraan S1"], "ms": ["Ilmu Hukum S1 - Serang"]}, {"q": "Saya suka mengamati detail kecil yang mungkin terlewat oleh orang lain.", "mt": ["Akuntansi S1", "Administrasi Perkantoran D-3", "Teknik Kimia S1"], "ms": ["Kimia S1 - Serang", "Akuntansi S1 - Serang"]}, {"q": "Saya suka hal-hal yang bisa saya ukur, hitung, atau bandingkan secara jelas.", "mt": ["Matematika S1", "Akuntansi S1", "Teknik Industri S1"], "ms": ["Matematika S1 - Serang", "Sistem Informasi S1 - Serang"]}, {"q": "Saya menikmati pekerjaan yang membutuhkan ketekunan dan konsistensi tinggi.", "mt": ["Manajemen S1", "Administrasi Perkantoran D-3", "Akuntansi Perpajakan Sarjana Terapan"], "ms": ["Manajemen S1 - Serang", "Administrasi Negara S1 - Serang"]}, {"q": "Saya lebih suka pekerjaan yang menghasilkan sesuatu yang nyata dan bisa dilihat hasilnya.", "mt": ["Teknik Mesin S1", "Teknik Elektro S1", "Teknik Kimia S1"], "ms": ["Teknik Mesin S1 - Serang", "Teknik Elektro S1 - Serang", "Kimia S1 - Serang"]}, {"q": "Saya suka mengeksplorasi hal-hal baru yang bisa membuat hidup lebih efektif.", "mt": ["Teknik Informatika S1", "Sistem Informasi S1", "Manajemen S1"], "ms": ["Sistem Komputer S1 - Serang", "Manajemen S1 - Serang"]}, {"q": "Saya tertarik dengan sistem pendidikan dan bagaimana membentuk karakter manusia.", "mt": ["Manajemen Pendidikan Islam S1", "Pend. Guru Sekolah Dasar S1", "Pend. Ekonomi S1"], "ms": []}, {"q": "Saya suka bekerja sama dan memotivasi orang lain dalam satu kelompok.", "mt": ["Manajemen S1", "Pend. Jasmani S1", "Pend. Guru Sekolah Dasar S1"], "ms": ["Manajemen S1 - Serang", "Ilmu Pemerintahan S1 - Serang"]}, {"q": "Saya menikmati kegiatan yang membutuhkan kreativitas dalam penyampaian pesan.", "mt": ["Ilmu Komunikasi S1", "Sastra Indonesia S1", "Sastra Inggris S1"], "ms": []}, {"q": "Saya lebih suka pekerjaan yang membutuhkan analisis dan perencanaan jangka panjang.", "mt": ["Manajemen S1", "Akuntansi S1", "Teknik Industri S1"], "ms": ["Manajemen S1 - Serang", "Sistem Informasi S1 - Serang"]}, {"q": "Saya senang mencari solusi yang logis, efisien, dan bisa diterapkan langsung.", "mt": ["Teknik Informatika S1", "Teknik Industri S1", "Manajemen S1"], "ms": ["Sistem Komputer S1 - Serang", "Manajemen S1 - Serang"]}];
    window.pmbSelectCampus=function(c){campus=c;var n=document.getElementById('pmbCampusName');if(n)n.textContent='Unpam '+c;var p=document.getElementById('pmbQuizPick');if(p)p.style.display='block';};
    window.pmbStartQuiz=function(){if(!campus){alert('Pilih kampus dulu ya!');return;}current=0;scores={};document.getElementById('pmbQuizModal').classList.add('show');showQ();};
    function showQ(){
      var q=questions[current];
      document.getElementById('pmbQuizQ').textContent=(current+1)+'. '+q.q;
      var c=document.getElementById('pmbQuizOpts');c.innerHTML='';
      opts.forEach(function(o){var l=document.createElement('label');l.innerHTML='<input type="radio" name="pq'+current+'" value="'+o.s+'"> '+o.t;c.appendChild(l);});
      document.getElementById('pmbQuizBar').style.width=(((current+1)/questions.length)*100)+'%';
      document.getElementById('pmbQuizCount').textContent='Soal '+(current+1)+' dari '+questions.length;
    }
    window.pmbNextQ=function(){
      var sel=document.querySelector('input[name="pq'+current+'"]:checked');
      if(!sel){alert('Pilih jawaban dulu ya!');return;}
      var v=parseInt(sel.value,10);
      var map=(campus==='Tangsel')?questions[current].mt:questions[current].ms;
      map.forEach(function(p){scores[p]=(scores[p]||0)+v;});
      current++;
      if(current<questions.length){showQ();}else{finish();}
    };
    function finish(){
      document.getElementById('pmbQuizModal').classList.remove('show');
      var sorted=Object.keys(scores).map(function(k){return [k,scores[k]];}).sort(function(a,b){return b[1]-a[1];}).slice(0,3);
      var medal=['\uD83E\uDD47','\uD83E\uDD48','\uD83E\uDD49'],out='';
      if(!sorted.length){out='Lengkapi tes untuk melihat rekomendasi prodi.';}
      else sorted.forEach(function(s2,i){out+=medal[i]+' '+s2[0]+'<br>';});
      document.getElementById('pmbQuizOut').innerHTML=out;
      document.getElementById('pmbQuizResult').classList.add('show');
    }
    window.pmbCloseQuiz=function(){document.getElementById('pmbQuizResult').classList.remove('show');};
    ['pmbQuizModal','pmbQuizResult'].forEach(function(id){var m=document.getElementById(id);if(m)m.addEventListener('click',function(e){if(e.target===m)m.classList.remove('show');});});
  })();

  /* ---------- 10. Biaya tabs ---------- */
  (function(){
    var tabs=root.querySelectorAll('#pmbBiayaTabs .pmb-btab');
    var panes=root.querySelectorAll('#pmb-biaya .pmb-bpane');
    tabs.forEach(function(b){b.addEventListener('click',function(){
      tabs.forEach(function(x){x.classList.remove('on');});b.classList.add('on');
      var id=b.getAttribute('data-p');
      panes.forEach(function(p){p.classList.toggle('on',p.getAttribute('data-p')===id);});
    });});
  })();

  /* ---------- 11b. Sebaran mahasiswa Indonesia (Leaflet choropleth) ---------- */
  (function(){
    var el=document.getElementById('pmbSebaranMap');if(!el)return;
    var PROV=[
      {t:6,k:['BANTEN']},
      {t:5,k:['JAWABARAT','WESTJAVA']},
      {t:5,k:['JAKARTA']},
      {t:4,k:['JAWATENGAH','CENTRALJAVA']},
      {t:3,k:['JAWATIMUR','EASTJAVA']},
      {t:3,k:['LAMPUNG']},
      {t:3,k:['SUMATERAUTARA','SUMATRAUTARA','NORTHSUMATRA']},
      {t:3,k:['SUMATERASELATAN','SUMATRASELATAN','SOUTHSUMATRA']},
      {t:2,k:['SUMATERABARAT','SUMATRABARAT','WESTSUMATRA']},
      {t:2,k:['YOGYAKARTA']},
      {t:2,k:['KEPULAUANRIAU','RIAUISLANDS','KEPRIAU']},
      {t:2,k:['JAMBI']},
      {t:2,k:['BENGKULU']},
      {t:2,k:['SULAWESISELATAN','SOUTHSULAWESI']},
      {t:2,k:['RIAU']},
      {t:1,k:['ACEH','NANGGROE']},
      {t:1,k:['NUSATENGGARABARAT','WESTNUSATENGGARA']},
      {t:1,k:['KALIMANTANBARAT','WESTKALIMANTAN']},
      {t:1,k:['SULAWESIUTARA','NORTHSULAWESI']},
      {t:1,k:['NUSATENGGARATIMUR','EASTNUSATENGGARA']},
      {t:1,k:['PAPUABARATDAYA']},
      {t:1,k:['PAPUABARAT','WESTPAPUA']},
      {t:1,k:['PAPUA']},
      {t:1,k:['MALUKUUTARA','NORTHMALUKU']},
      {t:1,k:['MALUKU']},
      {t:1,k:['BALI']},
      {t:1,k:['KALIMANTANTIMUR','EASTKALIMANTAN']},
      {t:1,k:['BANGKA']},
      {t:1,k:['KALIMANTANSELATAN','SOUTHKALIMANTAN']},
      {t:1,k:['SULAWESITENGGARA','SOUTHEASTSULAWESI']},
      {t:1,k:['SULAWESITENGAH','CENTRALSULAWESI']},
      {t:1,k:['SULAWESIBARAT','WESTSULAWESI']},
      {t:1,k:['KALIMANTANUTARA','NORTHKALIMANTAN']},
      {t:1,k:['KALIMANTANTENGAH','CENTRALKALIMANTAN']},
      {t:1,k:['GORONTALO']}
    ];
    var COL=['#eaf0fb','#c9d8f2','#93b0e3','#5178cf','#274fa2','#12357a','#f6b40a'];
    function norm(s){return (s==null?'':String(s)).toUpperCase().replace(/[^A-Z]/g,'');}
    function tierOf(props){
      var vals=[];
      for(var kk in props){ if(props.hasOwnProperty(kk)) vals.push(norm(props[kk])); }
      for(var i=0;i<PROV.length;i++){
        var ks=PROV[i].k;
        for(var j=0;j<ks.length;j++){
          for(var v=0;v<vals.length;v++){ if(vals[v].indexOf(ks[j])>-1){ return PROV[i].t; } }
        }
      }
      return 0;
    }
    function nameOf(props){
      var cand=['Propinsi','PROVINSI','provinsi','Provinsi','state','NAME_1','name','NAME','Name','nama','kode'];
      for(var i=0;i<cand.length;i++){ if(props[cand[i]]){ return props[cand[i]]; } }
      for(var kk in props){ if(props.hasOwnProperty(kk) && typeof props[kk]==='string'){ return props[kk]; } }
      return '';
    }
    var URLS=['https://cdn.jsdelivr.net/gh/superpikar/indonesia-geojson@master/indonesia-province-simple.json','https://raw.githubusercontent.com/superpikar/indonesia-geojson/master/indonesia-province-simple.json','https://raw.githubusercontent.com/superpikar/indonesia-geojson/master/indonesia-province.json'];
    function fallback(){ el.innerHTML='<div class="pmb-idmap-fallback">Peta sebaran gagal dimuat. Pastikan koneksi internet aktif.</div>'; }
    function draw(map,geo){
      var layer=L.geoJSON(geo,{
        style:function(f){ return {fillColor:COL[tierOf(f.properties)],fillOpacity:.95,weight:.9,color:'#ffffff'}; },
        onEachFeature:function(f,lyr){
          var nm=nameOf(f.properties);
          if(nm){ lyr.bindTooltip(String(nm),{sticky:true}); }
          lyr.on('mouseover',function(){ lyr.setStyle({weight:2,color:'#0a1f4d'}); });
          lyr.on('mouseout',function(){ lyr.setStyle({weight:.9,color:'#ffffff'}); });
        }
      }).addTo(map);
      try{ map.fitBounds(layer.getBounds(),{padding:[2,2]}); }catch(e){}
    }
    function init(){
      if(!window.L){ fallback(); return; }
      var map=L.map(el,{zoomControl:false,attributionControl:false,dragging:false,scrollWheelZoom:false,doubleClickZoom:false,boxZoom:false,keyboard:false,touchZoom:false});
      (function tryUrl(i){
        if(i>=URLS.length){ fallback(); return; }
        fetch(URLS[i]).then(function(r){ if(!r.ok){ throw 0; } return r.json(); }).then(function(g){ draw(map,g); }).catch(function(){ tryUrl(i+1); });
      })(0);
    }
    window.pmbEnsureLeaflet(init);
  })();

  /* ---------- 11. Peta kampus (Leaflet) ---------- */
  (function(){
    var el=document.getElementById('pmbMap');if(!el)return;
    var configured=window.PMB_DATA&&window.PMB_DATA.locations&&Array.isArray(window.PMB_DATA.locations.campuses)?window.PMB_DATA.locations.campuses:[];
    var fallbackCoords=[[-6.34368,106.73853],[-6.35566,106.68700],[-6.34247,106.73330],[-6.11803,106.19620]];
    var campuses=configured.length?configured.map(function(c,i){var fc=fallbackCoords[i]||[0,0];return {n:c.name||('Kampus '+(i+1)),a:c.address||'',lat:parseFloat(c.lat)||fc[0],lng:parseFloat(c.lng)||fc[1]};}):[
      {n:'Kampus Pusat (Unpam 1)',a:'Jl. Surya Kencana No.1, Pamulang, Tangerang Selatan',lat:-6.34368,lng:106.73853},
      {n:'Kampus Viktor (Unpam 2)',a:'Jl. Raya Puspitek, Buaran, Serpong, Tangerang Selatan',lat:-6.35566,lng:106.68700},
      {n:'Kampus Witana Harja (Unpam 3)',a:'Jl. Witana Harja No.18B, Pamulang, Tangerang Selatan',lat:-6.34247,lng:106.73330},
      {n:'Kampus Serang (Unpam 4)',a:'Jl. Pantura No.6, Kalodran, Walantaka, Kota Serang',lat:-6.11803,lng:106.19620}
    ];
    function init(){
      var map=L.map(el,{scrollWheelZoom:false}).setView([-6.29,106.55],10);
      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',{maxZoom:19,attribution:'\u00A9 OpenStreetMap'}).addTo(map);
      var b=[];
      campuses.forEach(function(c,i){
        var icon=L.divIcon({className:'',html:'<div class="pmb-leaflet-pin"><span>'+(i+1)+'</span></div>',iconSize:[30,30],iconAnchor:[15,30],popupAnchor:[0,-28]});
        L.marker([c.lat,c.lng],{icon:icon}).addTo(map).bindPopup('<b>'+c.n+'</b><br>'+c.a);
        b.push([c.lat,c.lng]);
      });
      map.fitBounds(b,{padding:[45,45]});
    }
    function load(){
      window.pmbEnsureLeaflet(function(){
        if(window.L){ init(); }
        else { el.innerHTML='<div style="padding:48px 20px;text-align:center;color:#5d6b8c">Peta gagal dimuat. Pastikan koneksi internet aktif.</div>'; }
      });
    }
    load();
  })();

})();

/* iframe auto-height untuk deploy di CMS */
(function(){function ph(){try{var h=Math.max(document.body.scrollHeight,document.documentElement.scrollHeight);parent.postMessage({pmbHeight:h},'*');}catch(e){}}window.addEventListener('load',ph);window.addEventListener('resize',ph);setInterval(ph,1200);})();

