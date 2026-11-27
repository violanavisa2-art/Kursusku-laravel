# Draft Artikel Ilmiah (kerangka)

> Kerangka ini hanya struktur. Isi dengan evidence proyek yang benar-benar Anda ukur.
> Jangan mengarang nilai performa, jumlah pengguna, persentase keberhasilan, atau referensi.

## 1. Judul sementara

Pola: [fokus sistem/fitur] + [pendekatan/teknologi] + [konteks].

Contoh pola: Pengembangan Sistem Pendaftaran Kursus Berbasis Laravel dengan Pencarian dan Pagination Server-Side.

Judul Anda: ...

## 2. Problem statement

Apa yang sulit ketika data Course semakin banyak? Mengapa daftar panjang tanpa search/pagination mengganggu penggunaan?

...

## 3. Gap sederhana

Kondisi awal (daftar tanpa search/pagination) dibandingkan kebutuhan yang belum terpenuhi.

...

## 4. Metode

Tulis hanya yang benar-benar dikerjakan:

- Identifikasi kebutuhan Course index
- Perancangan model/data (Course, Participant, Enrollment)
- Implementasi Laravel (search/filter server-side, pagination)
- Progressive enhancement Ajax (jika dilakukan)
- Pengujian skenario fungsional

## 5. Skenario uji

Salin hasil dari `docs/test-matrix-pertemuan-13.md` setelah pengujian dijalankan.

| Skenario | Input | Expected | Actual | Status |
|----------|-------|----------|--------|--------|
| 0 hasil | | Empty state | | |
| 1 hasil | | 1 record | | |
| >10 hasil | | Pagination | | |
| Keyword spasi | | Keyword terbaca | | |
| Filter + page 2 | | Query state tetap | | |

## 6. Hasil awal

Hanya hasil yang sudah diuji: jumlah skenario lulus, perilaku pagination, query string, hasil request Ajax.

...

## 7. Pembahasan awal

Mengapa hasil penting? (contoh arah: fallback GET menjaga akses tanpa JavaScript; pagination memudahkan penelusuran; debounce mengurangi request.)

...

## 8. Referensi awal

Gunakan sumber yang benar-benar dipakai (dokumentasi Laravel/PHP, artikel penelitian relevan).
Verifikasi penulis, tahun, judul, DOI/URL sebelum dicantumkan.

-
