# IPL Payment System - Cluster Botanica Grand Tenjo

Sistem Manajemen Pembayaran Iuran Pemeliharaan Lingkungan (IPL) berbasis Web yang dirancang untuk memudahkan warga dalam melakukan pembayaran dan pengelola dalam memantau status iuran secara *real-time*.

## 📌 Deskripsi Proyek
Proyek ini dikembangkan untuk mendigitalisasi sistem penagihan iuran di lingkungan Cluster Botanica Grand Tenjo. Sistem ini mencakup panel untuk warga (member) dan admin pengelola.

**Fitur Utama:**
* **Dashboard Warga:** Informasi status tagihan (Belum Lunas, Menunggu Approval, Lunas).
* **Riwayat Pembayaran:** Catatan transaksi yang pernah dilakukan oleh warga.
* **Panel Admin:** Pengelolaan data warga, rumah, dan verifikasi bukti pembayaran.
* **Notifikasi Status:** Update otomatis status pembayaran setelah diverifikasi admin.

## 🛠️ Teknologi yang Digunakan
* **Bahasa Pemrograman:** PHP 7.x/8.x
* **Database:** MySQL
* **Framework CSS:** Bootstrap 3 (AdminLTE 2.3.7 Template)
* **Library:** jQuery, IonIcons, FontAwesome

## 🚀 Cara Instalasi

1.  **Clone Repositori**
    ```bash
    git clone https://github.com/username/gtr-ipl.git
    ```
2.  **Pindahkan ke Direktori Server**
    Pindahkan folder `gtr-ipl` ke dalam folder `htdocs` (XAMPP) atau `www` (WampServer).
3.  **Konfigurasi Database**
    * Buka phpMyAdmin dan buat database baru bernama `db_ipl` (atau sesuaikan).
    * Import file `.sql` yang tersedia di folder `database/` (jika ada).
    * Sesuaikan konfigurasi koneksi di file `config/koneksi.php`:
    ```php
    $conn = mysqli_connect("localhost", "root", "", "nama_database_kamu");
    ```
4.  **Jalankan di Browser**
    Akses melalui URL: `http://localhost/gtr-ipl/`

## 📂 Struktur Folder Utama
* `config/` : Berisi file koneksi database dan navigasi.
* `dist/` & `plugins/` : File aset template AdminLTE (CSS, JS).
* `images/` : Penyimpanan aset gambar dan foto user.
* `rest/` : API/Endpoint untuk pemrosesan data (seperti fitur search).
