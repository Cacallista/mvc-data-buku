# MVC PHP Native - Data Buku

Aplikasi CRUD sederhana untuk mempelajari pola Model-View-Controller pada PHP Native.

## Kebutuhan
- PHP 8.0 atau lebih baru
- MySQL/MariaDB
- Web server lokal seperti XAMPP atau Laragon
- Git

## Instalasi
1. Clone atau salin project ke folder web server (`htdocs` / `www`).
2. Import `database/perpustakaan.sql`.
3. Sesuaikan koneksi pada `config/database.php`.
4. Buka `http://localhost/mvc-data-buku/public/index.php`.

## Struktur MVC
- `app/models/` : akses dan operasi data.
- `app/controllers/` : alur request dan pemanggilan Model/View.
- `app/views/` : tampilan HTML.
- `config/` : konfigurasi koneksi database.
- `database/` : skema dan data awal SQL.
- `public/` : entry point aplikasi.

## Fitur
- Menampilkan data buku
- Menambah data buku
- Mengubah data buku
- Menghapus data buku
- Validasi input dan pesan berhasil/gagal

## Histori Git
Gunakan `git log --oneline --graph --decorate` untuk melihat tahapan pengembangan.

```
(tempel hasil git log --oneline di sini)
```