# 📝 Sistem Catatan

Aplikasi web manajemen catatan berbasis **PHP MVC** (Model-View-Controller) dengan fitur autentikasi admin, kategori, dan CRUD catatan.

## 🛠️ Tech Stack

- **Backend:** PHP 8.x (tanpa framework)
- **Database:** MySQL 8.x
- **Arsitektur:** MVC (Model-View-Controller)
- **Koneksi DB:** PDO (PHP Data Objects)
- **Server lokal:** Laragon / XAMPP / WAMP

---

## 📁 Struktur Direktori

```
sistemCatatan/
├── app/
│   ├── controllers/
│   │   ├── AdminController.php       # Login, register, dashboard, logout
│   │   ├── KategoriController.php    # CRUD kategori
│   │   └── CatatanController.php     # CRUD catatan
│   ├── models/
│   │   ├── AdminModel.php            # Query admin (login, register)
│   │   ├── KategoriModel.php         # Query kategori
│   │   └── CatatanModel.php          # Query catatan
│   └── views/
│       ├── auth/                     # Halaman login & register
│       ├── dashboard/                # Halaman dashboard
│       ├── kategori/                 # Halaman manajemen kategori
│       ├── catatan/                  # Halaman manajemen catatan
│       └── components/              # Komponen reusable (header, navbar, dll)
├── config/
│   └── database.php                 # Konfigurasi koneksi database
├── core/
│   ├── App.php
│   ├── Controller.php
│   └── Database.php
├── public/
│   ├── css/                         # Stylesheet
│   ├── js/                          # JavaScript
│   ├── images/                      # Aset gambar
│   └── fonts/                       # Font
├── db_catatan.sql                   # File dump database
├── index.php                        # Entry point & router utama
└── .htaccess                        # Konfigurasi Apache
```

---

## ✨ Fitur

- 🔐 **Autentikasi** — Register & Login admin dengan password ter-hash (bcrypt)
- 📂 **Kategori** — Tambah, lihat, edit, dan hapus kategori catatan
- 📝 **Catatan** — Tambah, lihat, edit, dan hapus catatan per kategori
- 🛡️ **Proteksi Session** — Halaman dashboard & manajemen hanya bisa diakses setelah login
- 🔄 **Routing berbasis query string** — Navigasi via `?act=...`

---

## ⚙️ Cara Instalasi

### 1. Clone / Salin Project

Salin folder `sistemCatatan` ke dalam direktori root server lokal kamu:
- **Laragon:** `C:\laragon\www\`
- **XAMPP:** `C:\xampp\htdocs\`

### 2. Import Database

1. Buka **phpMyAdmin** di browser: `http://localhost/phpmyadmin`
2. Buat database baru bernama `db_catatan`
3. Pilih database tersebut, lalu klik tab **Import**
4. Upload file `db_catatan.sql` dan klik **Go**

### 3. Konfigurasi Koneksi Database

Edit file `config/database.php` sesuai konfigurasi lokal kamu:

```php
private $host     = "localhost";
private $db_name  = "db_catatan";
private $username = "root";
private $password = "";       // Sesuaikan jika ada password
```

### 4. Jalankan Aplikasi

Buka browser dan akses:

```
http://localhost/mvc/sistemCatatan/
```

---

## 🗄️ Skema Database

### Tabel `admin`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | INT (PK, AI) | ID admin |
| `username` | VARCHAR(100) | Username unik |
| `password` | VARCHAR(100) | Password (bcrypt) |
| `created_at` | TIMESTAMP | Waktu dibuat |

### Tabel `kategori`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | INT (PK, AI) | ID kategori |
| `admin_id` | INT (FK) | Relasi ke tabel `admin` |
| `nama_kategori` | VARCHAR(100) | Nama kategori |
| `created_at` | TIMESTAMP | Waktu dibuat |

### Tabel `catatan`
| Kolom | Tipe | Keterangan |
|---|---|---|
| `id` | INT (PK, AI) | ID catatan |
| `admin_id` | INT (FK) | Relasi ke tabel `admin` |
| `kategori_id` | INT (FK) | Relasi ke tabel `kategori` |
| `judul` | VARCHAR(100) | Judul catatan |
| `isi` | VARCHAR(600) | Isi catatan |
| `created_at` | TIMESTAMP | Waktu dibuat |

---

## 🔗 Routing

Semua request masuk melalui `index.php` via parameter `?act=`:

| Action | Keterangan |
|---|---|
| `?act=login` | Halaman login (default) |
| `?act=register` | Halaman register |
| `?act=dashboard` | Dashboard (perlu login) |
| `?act=logout` | Logout |
| `?act=kategori` | Daftar kategori |
| `?act=kategori-tambah` | Form tambah kategori |
| `?act=kategori-edit&id=` | Form edit kategori |
| `?act=kategori-hapus&id=` | Hapus kategori |
| `?act=catatan` | Daftar catatan |
| `?act=catatan-tambah` | Form tambah catatan |
| `?act=catatan-edit&id=` | Form edit catatan |
| `?act=catatan-hapus&id=` | Hapus catatan |

---

## 🔒 Validasi

- Username dan password tidak boleh kosong
- Password minimal **5 karakter**
- Username tidak boleh duplikat saat register
- Semua halaman manajemen terproteksi session (redirect ke login jika belum auth)

---

## 👤 Akun Default (dari dump SQL)

| Username | Password |
|---|---|
| `admin` | `admin` |
| `rafa` | (sesuai hash di DB) |

> ⚠️ **Catatan:** Segera ganti password default setelah instalasi.
