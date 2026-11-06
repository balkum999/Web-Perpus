# Perpustakaan Digital Mini (E-Perpus) MODE GELAP

## 👨‍🎓 Identitas Mahasiswa
* **Nama**: Iqbal Khaqiqi
* **Program Studi**: Sistem Informasi
* **Mata Kuliah**: Pemrograman Web

## 📁 Struktur File Project
```text
project_perpustakaan/
├── config/
│   └── koneksi.php       # Koneksi ke database MySQL
├── uploads/              # Folder penampung file fisik sampul buku
├── index.php             # Halaman Login
├── proses_login.php      # Verifikasi autentikasi & Session/Cookie
├── logout.php            # Hapus Session & Cookie
├── dashboard.php         # Tampil Data (Read) & Akses Menu (Tabel)
├── tambah_buku.php       # Form Tambah Data
├── proses_tambah.php     # Query Insert & Operasi Upload File
├── edit_buku.php         # Form Edit Data
├── proses_edit.php       # Query Update & Penggantian File
├── hapus_buku.php        # Query Delete & Unlink File Gambar
└── db_perpustakaan.sql   # File export database MySQL
```

## 🚀 Panduan Instalasi
1. Clone repositori ini atau download source code.
2. Pindahkan folder `project_perpustakaan` ke dalam direktori `htdocs` (jika menggunakan XAMPP).
3. Buat database baru bernama `db_perpustakaan` di phpMyAdmin.
4. Lakukan *Import* file `db_perpustakaan.sql` ke dalam database tersebut.
5. Pastikan konfigurasi di `config/koneksi.php` sudah sesuai dengan server lokal Anda.
6. Buka browser dan jalankan aplikasi melalui `http://localhost/project_perpustakaan/`.
   * **Akun Admin:** Username `admin` | Password `admin123`

---

## 📸 Dokumentasi Singkat (Screenshots)

### 1. Halaman Login
<img width="1920" height="1080" alt="index" src="https://github.com/user-attachments/assets/7e68b2fb-c6a7-43b0-aaca-f115e4d7a800" />

### 2. Dashboard CRUD (Tampil Data)
<img width="1920" height="1080" alt="dashboard" src="https://github.com/user-attachments/assets/63f1ebad-0348-4361-a6ce-7c9ee65c2861" />

### 3. Form Tambah Data & Upload File
<img width="1920" height="1080" alt="tambah_buku" src="https://github.com/user-attachments/assets/889a070f-1731-46f0-8512-701bd5c956a6" />

### 4. Form Edit Data & Ganti File
<img width="1920" height="1080" alt="edit_buku" src="https://github.com/user-attachments/assets/aaa43cc6-a393-4aa6-a214-ad432b65ed80" />

### 5. Struktur Tabel Database MySQL
<img width="566" height="528" alt="image" src="https://github.com/user-attachments/assets/168ebfb1-55a4-4499-93b2-86c6c3d4ec23" />

---

## 🎥 Video Demo Aplikasi
**Tautan Video YouTube:**
[MASUKKAN_LINK_VIDEO_YOUTUBE_ANDA_DI_SINI]
