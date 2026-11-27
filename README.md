# KursusKu

Project praktikum Pemrograman Web III (Laravel). Gabungan hasil Pertemuan 7 sampai 13.

## Fitur

| Pertemuan | Fitur |
|-----------|-------|
| 7  | Route -> Controller -> Blade (HomeController) |
| 9  | Master layout Blade, navbar, Bootstrap + jQuery via Vite, Ajax cek sisa kursi |
| 10 | Database MySQL, migration, model Course, index/create/store |
| 11 | Show, Form Request (Store/Update), edit, update, delete |
| 12 | Participant + Enrollment, foreign key, composite unique, laporan relasional |
| 13 | Search `q`, filter status, pagination 10/halaman, empty state, Ajax opsional |

## Requirement

- PHP 8.3+, Composer, Node.js + npm
- MySQL (Laragon)

## Cara Menjalankan

```bash
composer install
copy .env.example .env        # Windows (Mac/Linux: cp)
php artisan key:generate
```

Buat database `kursusku` di phpMyAdmin/HeidiSQL, lalu atur `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kursusku
DB_USERNAME=root
DB_PASSWORD=
```

Lanjutkan:

```bash
npm install
npm install bootstrap @popperjs/core jquery
php artisan migrate --seed
npm run dev          # terminal 1 (biarkan berjalan)
php artisan serve    # terminal 2
```

Seeder mengisi 24 kursus (status open/closed/draft) dan 3 peserta dummy.
Seeder aman dijalankan ulang: `php artisan db:seed`.

## Halaman

| URL | Fungsi |
|-----|--------|
| `/` | Beranda + ringkasan jumlah data |
| `/courses` | Daftar kursus (search, filter, pagination) |
| `/courses/create` | Tambah kursus |
| `/enrollments/create` | Form pendaftaran + cek kursi (Ajax) |
| `/enrollments` | Laporan peserta-kursus |

## Catatan Desain

- Status kursus memakai `draft / open / closed`. Panduan Pertemuan 12 menyebut `active`;
  di project ini diganti `open` agar konsisten dengan Pertemuan 10, 11, dan 13.
  Dropdown pendaftaran hanya menampilkan kursus berstatus `open`.
- Search dan filter memakai method GET + `withQueryString()`. Form tetap bekerja tanpa JavaScript.
- Ajax live search (debounce 300 ms) ada di `resources/js/app.js` sebagai peningkatan UX.
- Sisa kursi = `quota` dikurangi jumlah enrollment.

## Evidence

Letakkan screenshot dan catatan pengujian di folder `evidence/week-XX/`.
Template tabel uji ada di `docs/`.
