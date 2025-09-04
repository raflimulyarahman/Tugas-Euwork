<div align="center">
  <a href="#">
    </a>
  <h1 align="center">Shopmart E-Commerce</h1>
  <p align="center">
    Platform E-Commerce yang dibangun dengan framework PHP powerful, Laravel. <br /> Dirancang untuk memberikan pengalaman belanja yang mudah, cepat, dan aman.
    <br />
    <br />
    <a href="https://github.com/raflimulyarahman/ecommerce--shopmart/issues">Laporkan Bug</a>
    ·
    <a href="https://github.com/raflimulyarahman/ecommerce--shopmart/issues">Minta Fitur Baru</a>
  </p>
</div>

<div align="center">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/github/last-commit/raflimulyarahman/ecommerce--shopmart?style=for-the-badge" alt="Last Commit">
  <img src="https://img.shields.io/github/license/raflimulyarahman/ecommerce--shopmart?style=for-the-badge" alt="License">
</div>
<br/>

> **Saran Penting:** Ganti gambar di bawah ini dengan screenshot aplikasi Shopmart Anda! Ini akan membuat repository Anda jauh lebih menarik. Anda bisa menggunakan aplikasi seperti **ShareX** atau **ScreenToGif**.

<div align="center">
  <img src="https://placehold.co/800x450?text=Screenshot+Aplikasi+Shopmart+Anda" alt="Project Screenshot">
</div>

---

## 🛍️ Tentang Proyek

**Shopmart** adalah sebuah platform belanja online yang dirancang untuk memberikan pengalaman berbelanja yang mudah, cepat, dan aman. Dengan memanfaatkan kekuatan framework **Laravel**, Shopmart menyediakan fitur-fitur e-commerce esensial dalam sebuah paket yang solid dan mudah dikembangkan.

Proyek ini dibangun untuk mendemonstrasikan keahlian dalam pengembangan web backend menggunakan ekosistem PHP dan Laravel.

---

## ✨ Fitur Utama

-   **🔐 Autentikasi Bawaan Laravel**: Sistem login dan registrasi yang aman dan teruji.
-   **🎨 Template Engine Blade**: Tampilan antarmuka yang dinamis dan mudah dikelola.
-   **🛍️ Manajemen Produk**: Operasi CRUD (Create, Read, Update, Delete) untuk produk.
-   **🛒 Sistem Keranjang Belanja**: Fungsionalitas keranjang belanja berbasis session atau database.
-   **💳 Proses Checkout**: Alur untuk menyelesaikan pesanan dan memproses pembayaran.
-   **🗃️ Migrasi & Seeder Database**: Manajemen skema database yang terstruktur dengan Eloquent ORM.
-   **📜 Riwayat Pesanan**: Pengguna dapat melihat riwayat transaksi mereka.

---

## 🚀 Teknologi yang Digunakan

Berikut adalah teknologi utama yang menjadi fondasi dari proyek Shopmart:

| Teknologi                                                                                                             | Deskripsi                                 |
| --------------------------------------------------------------------------------------------------------------------- | ----------------------------------------- |
| <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">              | Bahasa Pemrograman Server-Side            |
| <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">    | Framework PHP untuk Pengembangan Web      |
| <img src="https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">          | Sistem Manajemen Database Relasional      |
| <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="Bootstrap"> | Framework CSS untuk Desain Responsif      |
| <img src="https://img.shields.io/badge/Blade-Laravel-FF2D20?style=for-the-badge" alt="Blade">                             | Template Engine Bawaan Laravel            |
| <img src="https://img.shields.io/badge/Composer-885610?style=for-the-badge&logo=composer&logoColor=white" alt="Composer"> | Manajer Dependensi untuk PHP              |

---

## ⚙️ Instalasi & Konfigurasi Lokal

### Prasyarat

Pastikan lingkungan pengembangan lokal Anda sudah terpasang:
* **PHP** (sesuai versi yang dibutuhkan di `composer.json`)
* **Composer**
* **Database Server** (contoh: MySQL, MariaDB)
* **Web Server** (contoh: Apache dari XAMPP, atau gunakan server bawaan Laravel)

### Langkah-langkah Instalasi

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/raflimulyarahman/ecommerce--shopmart.git](https://github.com/raflimulyarahman/ecommerce--shopmart.git)
    cd ecommerce--shopmart
    ```

2.  **Install Dependensi Composer**
    Perintah ini akan mengunduh semua library PHP yang dibutuhkan proyek.
    ```bash
    composer install
    ```

3.  **Konfigurasi Lingkungan**
    -   Salin file `.env.example` menjadi `.env`.
        ```bash
        cp .env.example .env
        ```
    -   Buat kunci aplikasi baru.
        ```bash
        php artisan key:generate
        ```
    -   Buka file `.env` dan sesuaikan konfigurasi database (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`, dll.) dengan pengaturan lokal Anda.

4.  **Migrasi Database**
    Perintah ini akan membuat semua tabel yang diperlukan di database Anda. Pastikan database sudah dibuat di MySQL/MariaDB.
    ```bash
    php artisan migrate
    ```
    *(Opsional) Jika Anda memiliki seeder untuk mengisi data awal:*
    ```bash
    php artisan db:seed
    ```

5.  **Jalankan Server Pengembangan**
    ```bash
    php artisan serve
    ```

6.  Buka browser dan akses **http://127.0.0.1:8000**.

---

## 📜 Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT. Lihat file `LICENSE` untuk informasi lebih lanjut.

---

## 📬 Kontak

**Rafli Mulya Rahman**
-   **GitHub**: [@raflimulyarahman](https://github.com/raflimulyarahman)
-   **LinkedIn**: [Kunjungi Profil](https://www.linkedin.com/in/raflimulyarahman/)

Dibuat dengan ❤️ menggunakan Laravel.
