# Cara Memasang File Ini ke Project Laravel

Folder ini adalah "overlay": hanya berisi file yang dibuat atau diubah.
File inti Laravel (vendor, artisan, config, dsb.) tidak disertakan.

## A. Project Laravel sudah ada (C:\laragon\www\kursusku)

1. Salin seluruh isi folder ini ke root project, pilih **Replace** jika ditanya.
   File yang ditimpa: `routes/web.php`, `app/Providers/AppServiceProvider.php`,
   `database/seeders/DatabaseSeeder.php`, `resources/css/app.css`, `resources/js/app.js`.
2. Jika Anda sudah punya migration/model Course sendiri dari praktikum, jangan
   duplikasi: hapus migration lama yang bentrok, atau lewati file migration di sini.
3. Ikuti langkah di `README.md` mulai bagian database.

## B. Project Laravel baru

```bash
cd C:\laragon\www
composer create-project laravel/laravel kursusku
```

Salin isi folder ini ke `kursusku`, lalu ikuti `README.md`.

## C. Repo GitHub Kursusku-laravel

Repo sekarang berisi prototype PHP biasa (Pertemuan 2-6), bukan project Laravel.
Disarankan: pindahkan prototype ke folder `prototype/` atau repo terpisah,
lalu push project Laravel ke repo ini. Jangan commit file `.env`.
