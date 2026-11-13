# KasKita

**KasKita** adalah aplikasi berbasis web yang digunakan untuk mengelola pembayaran kas kelas secara lebih terstruktur. Aplikasi ini dibuat menggunakan PHP dan MySQL/MariaDB dengan tujuan memudahkan bendahara dalam mengelola data mahasiswa, tagihan kas, pembayaran, dan transaksi kas.

## 📌 Tentang Project

KasKita dibuat sebagai project mata kuliah **Pemrograman Berorientasi Objek (PBO)**. Aplikasi ini memiliki dua jenis pengguna, yaitu:

- **Bendahara** — mengelola data mahasiswa, tagihan, pembayaran, dan transaksi kas.
- **Mahasiswa** — melihat tagihan kas, melakukan pembayaran, dan melihat riwayat pembayaran.

Dengan adanya KasKita, proses pencatatan kas kelas yang sebelumnya dapat dilakukan secara manual menjadi lebih mudah dikelola melalui satu sistem.

## ✨ Fitur

### Bendahara
- Login bendahara
- Dashboard pengelolaan kas
- Menambahkan data mahasiswa
- Melihat data mahasiswa
- Mengelola tagihan kas
- Melihat tagihan mahasiswa
- Memeriksa pembayaran mahasiswa
- Menyetujui atau menolak pembayaran
- Melihat transaksi kas
- Mencatat pemasukan dan pengeluaran

### Mahasiswa
- Login menggunakan NIM
- Membuat password sendiri untuk akun baru
- Melihat tagihan kas
- Melakukan pembayaran
- Mengirim bukti pembayaran
- Melihat status pembayaran
- Melihat riwayat pembayaran

## 🛠️ Teknologi yang Digunakan

- **PHP**
- **MySQL / MariaDB**
- **HTML**
- **CSS**
- **Laragon**
- **Visual Studio Code**

## 📂 Struktur Project

```text
KasKita/
├── assets/
│   └── css/
│       └── style.css
│
├── config/
│   └── Database.php
│
├── pages/
│   ├── dashboard.php
│   ├── dashboard_mahasiswa.php
│   ├── mahasiswa.php
│   ├── tambah_mahasiswa.php
│   ├── tagihan.php
│   ├── tambah_tagihan.php
│   ├── detail_tagihan.php
│   ├── tagihan_mahasiswa.php
│   ├── pembayaran.php
│   ├── pembayaran_mahasiswa.php
│   ├── periksa_pembayaran.php
│   ├── riwayat_pembayaran.php
│   ├── transaksi.php
│   └── buat_password.php
│
└── index.php
```

## 🗄️ Database

Nama database yang digunakan:

```text
db_kaskita
```

Tabel utama yang digunakan:

- `users`
- `mahasiswa`
- `bendahara`
- `tagihan_kas`
- `tagihan_mahasiswa`
- `pembayaran`
- `metode`
- `transaksi_kas`

### Relasi Utama

```text
users
  │
  ├── mahasiswa
  │       │
  │       └── tagihan_mahasiswa
  │                 │
  │                 ├── tagihan_kas
  │                 └── pembayaran
  │                              │
  │                              └── metode
  │
  └── bendahara
```

Pembayaran yang sudah disetujui juga dapat menghasilkan catatan pada tabel `transaksi_kas`.

## 🚀 Cara Menjalankan Project

### 1. Install Laragon

Pastikan Laragon sudah terinstall dan Apache serta MySQL/MariaDB dalam keadaan berjalan.

### 2. Simpan Project

Letakkan folder project pada:

```text
C:\laragon\www\KasKita
```

### 3. Buat Database

Buat database:

```sql
CREATE DATABASE db_kaskita;
```

Kemudian buat tabel sesuai struktur database project.

### 4. Konfigurasi Database

File konfigurasi berada di:

```text
config/Database.php
```

Sesuaikan bagian:

```php
private $host = "localhost";
private $username = "root";
private $password = "PASSWORD_DATABASE";
private $database = "db_kaskita";
```

Isi password sesuai password MariaDB yang digunakan pada Laragon.

### 5. Jalankan Project

Buka browser dan akses:

```text
http://localhost/kaskita
```

## 🔐 Login

### Bendahara

```text
Username : bendahara
Password : 12345
```

### Mahasiswa

Mahasiswa menggunakan **NIM sebagai username**.

Untuk mahasiswa baru yang belum memiliki password, mahasiswa dapat membuat password sendiri melalui halaman:

```text
pages/buat_password.php
```

Setelah password dibuat, mahasiswa dapat login menggunakan NIM dan password yang telah dibuat.

## 🔄 Alur Pembayaran

```text
Mahasiswa
    ↓
Melihat tagihan
    ↓
Melakukan pembayaran
    ↓
Mengirim bukti pembayaran
    ↓
Status: Menunggu
    ↓
Bendahara memeriksa pembayaran
    ↓
┌───────────────────┐
│                   │
Disetujui         Ditolak
│                   │
↓                   ↓
Transaksi Kas     Perbaikan /
                  pembayaran ulang
```

## 🎯 Tujuan Project

KasKita dibuat untuk membantu pengelolaan kas kelas agar data mahasiswa, tagihan, pembayaran, dan transaksi dapat tersimpan secara lebih terorganisir.

Selain sebagai aplikasi pengelolaan kas, project ini juga digunakan untuk menerapkan konsep **Pemrograman Berorientasi Objek**, seperti:

- Class dan Object
- Encapsulation
- Inheritance
- Method
- Attribute

## 👨‍💻 Pengembangan

Project ini dikembangkan untuk kebutuhan pembelajaran dan tugas perkuliahan **Teknik Informatika**.

**Nama Project:** KasKita  
**Platform:** Web  
**Bahasa:** PHP  
**Database:** MySQL/MariaDB  
**Environment:** Laragon
