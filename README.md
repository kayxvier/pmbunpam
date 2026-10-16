# PMB Universitas Pamulang

Website PHP dengan penyimpanan JSON, tanpa database, Composer, atau build Node.
Jalankan lokal dengan `php -S 127.0.0.1:8080`, lalu buka `/front.php`
untuk halaman dengan peta sebaran mahasiswa. `/index.php` adalah halaman utama
lain dengan desain berbeda. Hosting memerlukan PHP 7.4+ dan Apache/cPanel.

## Deploy otomatis

Setiap push ke `main` menjalankan `.github/workflows/deploy.yml`: pemeriksaan
sintaks PHP, validasi Secrets, lalu upload FTP. Tidak perlu SSH atau Node di hosting.
Workflow memakai [FTP-Deploy-Action v4.4.0](https://github.com/SamKirkland/FTP-Deploy-Action).

1. Buka [repository](https://github.com/kayxvier/pmbunpam), lalu **Settings →
   Secrets and variables → Actions → New repository secret**.
2. Tambahkan empat Secrets berikut. Jangan menaruh kredensial di kode, README,
   screenshot, atau log.

   | Secret | Isi |
   | --- | --- |
   | `FTP_SERVER` | Host FTP dari cPanel, tanpa awalan `ftp://` |
   | `FTP_USERNAME` | Username akun FTP untuk domain ini |
   | `FTP_PASSWORD` | Password akun FTP |
   | `FTP_SERVER_DIR` | Folder tujuan dilihat dari root akun FTP, wajib berakhir `/` |

3. Folder fisik domain adalah `/home/pmbs2545/public_html/simaba.my.id/`.
   Jika akun FTP dapat melihat path absolut tersebut, gunakan path itu untuk
   `FTP_SERVER_DIR`. Jika akun FTP dibatasi langsung ke folder domain tersebut,
   gunakan `./`; jika root FTP adalah `/home/pmbs2545/`, gunakan
   `public_html/simaba.my.id/`. Pastikan root akun melalui cPanel/FileZilla
   agar tidak membuat folder domain bertingkat di lokasi yang salah.
4. Sebelum deploy pertama, melalui File Manager cPanel salin `config.example.php`
   menjadi `config.local.php` di folder domain, lalu isi `admin_password` dengan
   password baru. Jangan memakai kembali password lama yang sebelumnya berada
   dalam kode. Alternatifnya gunakan environment `PMB_ADMIN_PASS` dari hosting.
   Tanpa password terpasang, halaman publik tetap berjalan dan login admin ditolak.
5. Data operasional hosting dipertahankan: `data/**/*.json`, `peserta.json`,
   `dokumen.json`, `toggle.php`, `uploads/`, sesi, dan `config.local.php` tidak
   di-upload maupun dihapus workflow. Untuk instalasi baru, salin data publik,
   dokumen, toggle dan gambar upload yang diperlukan melalui cPanel satu kali.
   Salin data peserta hanya ke hosting yang berwenang; data peserta tidak ada di Git.
   Untuk hosting yang sudah berjalan, pertahankan file yang sudah ada.
6. Buka **Actions → Deploy PMB via FTP → Run workflow → main**, atau push commit
   baru. Buka run tersebut untuk memeriksa log setiap step. Run hijau menandakan
   deploy sukses; kegagalan Secrets ditampilkan sebelum koneksi FTP dilakukan.
   Workflow yang gagal sebelum Secrets diisi dapat dijalankan ulang setelah setup.

Workflow mengabaikan metadata Git, `.github/`, README/Markdown, dependensi,
environment, konfigurasi lokal, data peserta/sesi, backup, cache, dan hasil
verifikasi. `dangerous-clean-slate` nonaktif. Jangan menghapus file state FTP
di hosting tanpa memahami dampak sinkronisasinya.

`.htaccess` melindungi file konfigurasi lokal dan JSON peserta dari download
langsung; `data/.htaccess` menolak file sesi dan directory listing. Setelah deploy,
pastikan permintaan langsung ke `/peserta.json` dan `/data/sessions/sess_*`
mendapat 403. Server PHP bawaan untuk pengembangan tidak menjalankan `.htaccess`.

## Audit awal, 16 Oktober 2026

- Inventaris awal: 93 file sekitar 60,8 MB, termasuk 7 file sesi. Semua file teks
  PHP/HTML/CSS/JS/JSON dan aturan Apache diperiksa; JSON valid. Aset raster
  diinventarisasi dan referensi path lokal diperiksa, tanpa ditemukan path hilang
  dalam referensi literal yang dapat diperiksa secara statis.
- Halaman sesuai referensi: `front.php` memuat `assets/body.html`,
  `assets/style.css`, `assets/site.js`, dan `assets/app.js`. `config.php` dan
  `content_defaults.php` menyediakan pengaturan serta konten JSON.
- Target: `.pmb-sebaran`, `.pmb-sebaran-top`, `.pmb-idmap-wrap`,
  `#pmbSebaranMap`, `.pmb-idmap-scale`. Leaflet 1.9.4 merender SVG GeoJSON
  provinsi yang diambil dari jsDelivr/GitHub, dengan tooltip dan warna kategori
  yang ditulis langsung di `assets/app.js`. Bukan data jumlah mahasiswa per provinsi.
- Poppins; navy `#0a1f4d`/`#13387a`, kuning `#f6b40a`/`#ffcb3d`, latar peta
  `#f4f8ff` ke `#eaf1fb`. Radius card 22px, peta 16px; shadow card
  `0 24px 60px rgba(10,31,77,.16)`. Container 92%, maksimal 1180px,
  padding card 26px, peta 340px atau 230px pada layar ≤620px.
  Breakpoint utama section 980px dan 620px; layout counter memakai 768px.
- Password admin hardcoded dipindahkan sebelum commit pertama ke konfigurasi
  lokal yang di-ignore. Password kosong ditolak. Peserta dan sesi tidak masuk Git.
  Data peserta lokal berisi 1.578 record dengan nama, username, program studi,
  waktu kuliah, dan status. Jangan membagikan JSON itu melalui repository.
- Ada 13 kandidat gambar tanpa referensi dalam kode/JSON, serta duplikasi nama
  `tiktok.png` di root dan `assets/img/`. Tidak dihapus karena CMS eksternal mungkin
  masih memakainya. Gambar PNG kampus berukuran besar berdampingan dengan WebP.

### Saran lanjutan

- Tambahkan CSRF token, pembatasan percobaan login, regenerasi session ID setelah
  login, serta penguatan cookie sesi admin. Rotasi password admin lama.
- Verifikasi sumber angka 110.000+/40+ dan kategori warna peta dengan pengelola.
- Pindahkan sesi ke luar document root bila konfigurasi hosting memungkinkan.
- Tinjau pengiriman seluruh data peserta ke browser saat halaman peserta diaktifkan;
  gunakan pencarian server dengan data minimum jika akses perlu dibatasi.
- Konsolidasikan `index.php`/`front.php`/`simaba.php` setelah memastikan halaman
  yang digunakan CMS; jangan mengalihkan beranda tanpa pemeriksaan integrasi.
- Pertimbangkan GeoJSON lokal dan optimasi aset PNG besar setelah mengonfirmasi
  pemakaiannya. Font, peta, gambar absolut domain, dan embed sosial saat ini
  bergantung pada layanan luar.

## Arah perubahan visual

Panel pengunjung mengikuti desain PMB yang ada: Poppins dan navy untuk identitas,
gradasi biru muda serta radius 16px untuk menyamakan kelompok dengan peta, dan
alas putih agar gambar Flag Counter menyatu. Peta tetap menjadi fokus dengan
rasio kolom 3:1; pada ≤768px counter ditempatkan di bawahnya. Tidak ada animasi
atau statistik buatan yang ditambahkan. ENERGY 2 / RHYTHM 2 / MOTION 1 untuk
komponen baru; animasi dan konten section lain dipertahankan sesuai lingkup tugas.

## Hasil verifikasi

| Lebar viewport | Hasil section sebaran |
| --- | --- |
| 1440px | Dua kolom 831px : 277px, tinggi panel sama 342px |
| 1024px | Dua kolom sekitar 653px : 218px, tinggi panel sama 342px |
| 390px | Satu kolom sekitar 329px, peta 232px, counter di bawah |

Pengujian browser juga mencakup batas 768/769px dan resize tanpa reload:
32 area provinsi tetap dirender, legenda berada di dalam peta, tidak ada overflow
horizontal, gambar widget termuat, dan link info mengembalikan HTTP 200.
Link dapat difokuskan dengan keyboard dan menampilkan outline. Pemeriksaan PHP
dan JavaScript lulus. Permintaan favicon otomatis yang sebelumnya 404 pada
`front.php` dihindari dengan favicon kosong eksplisit.
Setelah perbaikan tersebut, console tidak berisi error dan tidak ada respons
HTTP gagal dalam pengujian halaman. Pembatalan request tile saat resize/navigasi
merupakan pembatalan browser. Seluruh 16 endpoint halaman/API PHP publik/admin
yang diperiksa merespons HTTP 200 tanpa PHP warning/fatal error.

Pemeriksaan desain untuk komponen baru:

- Hard Gate PASS: lima viewport tanpa overflow, link berfungsi melalui Enter,
  fokus terlihat, dan tidak ada data/angka buatan baru.
- Purpose Gate PASS: warna, font, gradasi dan radius berasal dari komponen peta;
  alas putih menyatukan gambar widget, tanpa dekorasi atau animasi tambahan.
- Liveliness PASS: ENERGY 2 / RHYTHM 2 / MOTION 1; peta tetap fokus utama,
  counter pendukung, spacing 18px/14px memisahkan kedua fungsi.
- Craftsmanship PASS: gambar termuat, semua 32 area peta tetap terlihat saat
  resize, legenda tidak tertutup, dan komponen memakai identitas PMB yang ada.

DNS lokal komputer pengujian gagal me-resolve host Flag Counter. Pengujian
widget berhasil memakai alamat DNS publik pada browser uji saja, dengan hostname
dan HTTPS yang sama; URL widget dalam aplikasi tidak diubah. Jika widget tidak
tampil pada jaringan tertentu, periksa DNS atau pemblokir konten jaringan itu.
