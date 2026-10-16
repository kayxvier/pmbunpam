# Counter pengunjung PHP

Counter menggantikan Flag Counter tanpa mengubah panel PMB yang ada. Penyimpanan
memakai PDO SQLite (`pdo_sqlite`), tanpa MySQL, Node, SSH, atau API GeoIP eksternal.
`track.php` menerima POST setelah halaman selesai dimuat melalui `assets/site.js`.
Satu navigasi halaman publik yang memuat script tersebut menghasilkan satu POST;
admin dan endpoint konfigurasi tidak dihitung. Membuka ulang halaman menambah
pageview, tetapi hash IP yang sama hanya menghasilkan satu visitor unik selamanya.

## Pengaturan manual di cPanel

1. Pada pemilih versi/ekstensi PHP, aktifkan **PDO** dan **pdo_sqlite**. Gunakan
   PHP yang didukung hosting, minimal 7.4 untuk kode counter ini.
2. Melalui File Manager, buat folder `/home/pmbs2545/pmb-counter/` dan subfolder
   `cache/` di luar `public_html`, dengan izin tulis hanya bagi akun hosting
   (misalnya direktori 0700 dan file 0600; jangan gunakan 0777).
3. Buat `counter/config.php` pada folder domain dengan menyalin isi
   `counter/config.example.php` dari repository/lokal. File contoh tidak di-upload
   workflow. Isi `salt` acak minimal 32 karakter dari password generator dan
   `seed_token` acak terpisah bila akan mengimpor AWStats. Salt tidak boleh diganti
   setelah pencatatan dimulai karena hash lama tidak bisa dipadankan dengan salt baru.
4. Default contoh mengarah ke `/home/pmbs2545/pmb-counter/counter.db` dan
   `/home/pmbs2545/pmb-counter/cache`. Sesuaikan path bila struktur akun berbeda.
   Database dibuat otomatis saat request valid pertama. Jika terpaksa di dalam
   domain, gunakan `__DIR__ . '/counter.db'` dan `__DIR__ . '/cache'` pada konfigurasi
   di folder `counter/`, sehingga berada dalam lingkup perlindungan `.htaccess`.
   Jangan meletakkannya dalam folder publik lain yang tidak terlindungi.
5. Jika domain melalui Cloudflare, aktifkan **IP Geolocation** agar header negara
   tersedia. IP berasal dari `CF-Connecting-IP` bila ada, selain itu `REMOTE_ADDR`.
   Header Cloudflare hanya dapat dipercaya bila origin memang dilayani melalui
   Cloudflare; batasi akses origin sesuai pengaturan hosting/Cloudflare.
6. Opsional tanpa header negara: siapkan library
   [GeoIP2 PHP](https://github.com/maxmind/GeoIP2-php) beserta dependensinya di
   komputer, lalu upload folder `vendor/` dan file **GeoLite2-Country.mmdb** yang
   diperoleh dari akun MaxMind ke folder privat tersebut melalui File Manager.
   Isi `geoip_autoload` dengan path `vendor/autoload.php` dan `mmdb_path` dengan
   path `.mmdb`. Tidak perlu Composer atau SSH di server. Jika header/library/DB
   tidak tersedia atau lookup gagal, negara `XX` dipakai tanpa memanggil API luar.
7. Buka halaman `/front.php` dengan browser normal. `/counter/data.php`
   mengembalikan agregat publik saja, tanpa IP atau hash. Perubahan angka tampil
   paling lambat lima menit karena cache. Jika semua kunjungan bernegara `XX`,
   panel Asia tetap kosong. Data kosong atau konfigurasi gagal memberi fallback
   “Data pengunjung belum tersedia”, bukan angka buatan atau halaman error.
8. Cek URL `/counter/counter.db`, `/counter/counter.db-wal`,
   `/counter/config.php`, dan `/counter/cache/asia.json`: semuanya harus ditolak
   (403), termasuk ketika konfigurasi menggunakan path privat di luar web root.
   Jika server mengabaikan `.htaccess`, simpan data di luar web root dan perbaiki
   aturan server sebelum menggunakan penyimpanan di dalam folder publik.

## Seed AWStats sekali pakai

`seed.php` sengaja **tidak di-upload oleh workflow**. Ini mencegah file muncul
lagi pada deploy berikutnya setelah dihapus.

1. Buka cPanel → **Metrics → AWStats → Countries** untuk periode historis yang
   selesai sebelum pencatatan live dimulai. Catat periode dan metrik yang dipakai.
2. Isi `$seedVisitors` dengan angka pengunjung per negara yang memang tersedia
   dari sumber tersebut. Semua nilai bawaan 0 diberi komentar **ISI DARI AWSTATS**.
   Jangan memakai **Pages** atau **Hits** sebagai angka visitor unik. Jika laporan
   Countries hanya menyediakan Pages/Hits, biarkan angka visitor 0 sampai ada
   sumber visitor per negara yang sah. Isi `$seedPageviews` dari **Pages** jika ada,
   selain itu tetap 0. Tidak ada perkiraan atau impor otomatis dari Flag Counter.
3. Negara tambahan dapat ditambahkan memakai kode dua huruf. Isi hanya data asli.
   Seed seluruhnya nol ditolak dan tidak mengunci impor berikutnya.
4. Upload file seed yang sudah diisi melalui cPanel ke `counter/seed.php`. Pasang
   `seed_token` minimal 32 karakter pada config, lalu buka halaman seed melalui
   HTTPS dan masukkan token pada form. Token dikirim POST, tidak melalui URL.
5. Setelah sukses, **hapus `counter/seed.php` dari hosting** dan kosongkan
   `seed_token`. Penanda pada database menolak impor kedua, walaupun file di-upload
   ulang. Jangan menghapus database untuk mencoba mengulang seed.

Tampilan memakai **seed + data live**. Seed historis tidak berisi hash, sehingga
pengunjung yang kembali dari periode historis tidak dapat dideduplikasi terhadap
seed. Hindari periode laporan yang tumpang tindih; total gabungan tetap bukan
ukuran orang unik lintas periode yang dapat diverifikasi melalui IP historis.

## Definisi dan batas data

- Visitor live adalah satu hash IP, bukan identitas orang. Satu jaringan bersama
  dapat dihitung sebagai satu visitor; perubahan IP dapat menjadi visitor baru.
- IP hanya dipakai di memori untuk hashing/lookup. Tabel `visitors` hanya berisi
  `ip_hash` dan `country`. Web server/cPanel dapat memiliki access log sendiri;
  pengaturan log hosting terpisah dari penyimpanan aplikasi ini.
- Bot dengan UA mengandung bot, crawl, spider, slurp, curl, wget, atau headless
  dan request HEAD tidak dicatat. Pengguna yang memblokir JavaScript tidak dihitung.
- Panel bertajuk **Pengunjung Website** memakai label **Pengunjung dari Asia**.
  Allowlist eksplisit berada di `countries.php`, termasuk ID, MY, SG, TH, PH, VN,
  JP, KR, IN, CN, BN, TL, dan negara/wilayah Asia lain yang tercantum di sana.
  Negara non-Asia dan XX tidak ditampilkan maupun masuk total panel.
- Top 10 diurutkan berdasarkan jumlah visitor gabungan menurun; nilai sama
  memakai urutan kode negara. **Total pengunjung** meliputi semua negara Asia,
  termasuk yang tidak masuk top 10. **Pageviews** juga terbatas pada Asia.
  Negara visitor unik mengikuti lokasi saat kunjungan pertama; pageview mengikuti
  negara request masing-masing.
- Cache lima menit memakai lock dan penggantian file, sedangkan pembaruan SQLite
  memakai transaksi sehingga request bersamaan tidak kehilangan hitungan.
- Backup database dan salt secara privat, bersama-sama. `.gitignore` dan exclude
  FTP melindungi konfigurasi, database beserta sidecar, cache, storage, vendor,
  dan seluruh `.mmdb`. `dangerous-clean-slate` tetap nonaktif.

## Pengujian

Jalankan `php tests/counter_test.php` dari root project. Data pengujian dibuat
sementara dalam `.verification/`, tidak memakai database produksi, dan tidak
di-upload. Pemeriksaan mencakup visitor berulang/baru, bot/HEAD, prioritas header,
normalisasi IPv6, privasi hash, filter Asia, urutan top 10, cache, seed, dan
konkurensi. Workflow menjalankan tes ini sebelum upload FTP.

Verifikasi lokal 16 Oktober 2026: 28 pemeriksaan backend dan 11 pemeriksaan
HTTP lulus; browser pada 1440, 1024, 390, 768, dan 769px tidak mencatat error
console. Daftar 10 negara diuji dengan fixture browser yang tidak disimpan ke
produksi. Peta, legenda, dan susunan responsif lulus; seluruh aturan CSS lama dan
markup section lain identik. Padding, radius, warna, dan font panel dibandingkan
melalui computed style dengan nilai sebelum perubahan.

Gate desain, hanya untuk komponen yang diganti:

- Hard Gate PASS: fallback tersedia, tidak ada overflow, tidak ada angka buatan
  pada seed, dan bendera memiliki dimensi tetap serta alt nama negara.
- Purpose Gate PASS: Poppins, navy, gradasi, padding, radius, dan border diwarisi
  dari panel PMB semula; CSS tambahan hanya berlaku pada isi counter.
- Liveliness PASS: ENERGY 2 / RHYTHM 2 / MOTION 1 dipertahankan; peta tetap
  dominan, angka counter menjadi pendukung, tanpa animasi tambahan.
- Craftsmanship PASS: tracking sekali per halaman, cache/transaksi teruji,
  daftar terurut dari data, serta error konfigurasi tidak merusak halaman.
