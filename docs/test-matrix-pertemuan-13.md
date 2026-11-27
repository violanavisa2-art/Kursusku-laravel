# Test Matrix Pertemuan 13 - Course Index

Isi kolom **Actual**, **Status**, dan **Bukti** setelah pengujian benar-benar dijalankan.
Jangan menulis Pass sebelum diuji.

Data uji: seeder `CourseSeeder` (24 kursus). Catat jumlah data aktual saat uji.

| No | Skenario | Langkah / URL | Expected | Actual | Status | Bukti |
|----|----------|---------------|----------|--------|--------|-------|
| 1 | 0 hasil | `/courses?q=tidak-ada-xyz-999` | Empty state tampil, tanpa error | | | |
| 2 | 1 hasil | `/courses?q=Kriptografi` | Tepat 1 Course tampil | | | |
| 3 | Lebih dari 10 hasil | `/courses?status=open` | Halaman 1 maksimal 10 data + pagination | | | |
| 4 | Keyword dengan spasi | `/courses?q=Web Modern` | Keyword terbaca benar | | | |
| 5 | Filter + page 2 | `/courses?status=open&page=2` | `q`/`status` tetap terjaga di link pagination | | | |

## Pengujian tambahan

| No | Skenario | Expected | Actual | Status |
|----|----------|----------|--------|--------|
| 6 | JavaScript dimatikan, cari lewat form | Hasil berubah lewat reload normal | | |
| 7 | JavaScript dimatikan, pindah page 2 | Pagination tetap berfungsi | | |
| 8 | `status=active` (nilai tidak valid) | Filter diabaikan, bukan 0 hasil | | |

## Jika Ajax dikerjakan

| No | Skenario | Expected | Actual | Status |
|----|----------|----------|--------|--------|
| 9 | Ketik cepat di kolom cari | Request dikirim setelah jeda sekitar 300 ms (cek tab Network) | | |
| 10 | Ubah filter status | Hasil diperbarui tanpa reload | | |
| 11 | Klik pagination | Hasil diperbarui tanpa reload penuh | | |

## Evidence yang dikumpulkan

- [ ] Screenshot Course index normal
- [ ] Screenshot 0 hasil
- [ ] Screenshot page 2 dengan q/filter tetap
- [ ] Screenshot hasil saat JavaScript dimatikan + URL yang dipakai
- [ ] `CourseController@index`
- [ ] Screenshot tab Network (jika Ajax dikerjakan)
