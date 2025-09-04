<div align="center">
  <a href="#">
    <img src="https-raw-githubusercontent-com-raflimulyarahman-ecommerce--shopmart-main-public-logo-png" alt="Shopmart Logo" width="120px" />
  </a>
  <h1 align="center">Shopmart E-Commerce</h1>
  <p align="center">
    Platform E-Commerce modern yang dibangun dengan Next.js, Prisma, dan Tailwind CSS. <br />Menyediakan pengalaman belanja yang cepat, aman, dan intuitif.
    <br />
    <br />
    <a href="https://github.com/raflimulyarahman/ecommerce--shopmart/issues">Laporkan Bug</a>
    ·
    <a href="https://github.com/raflimulyarahman/ecommerce--shopmart/issues">Minta Fitur Baru</a>
  </p>
</div>

<div align="center">
  <img src="https://img.shields.io/github/stars/raflimulyarahman/ecommerce--shopmart?style=for-the-badge" alt="GitHub Stars">
  <img src="https://img.shields.io/github/forks/raflimulyarahman/ecommerce--shopmart?style=for-the-badge" alt="GitHub Forks">
  <img src="https://img.shields.io/github/last-commit/raflimulyarahman/ecommerce--shopmart?style=for-the-badge" alt="Last Commit">
  <img src="https://img.shields.io/github/license/raflimulyarahman/ecommerce--shopmart?style=for-the-badge" alt="License">
</div>
<br/>

> **Catatan Penting:** Ganti gambar di bawah ini dengan screenshot atau GIF demo dari aplikasi Shopmart Anda! Ini akan membuat repository Anda jauh lebih menarik. Anda bisa menggunakan aplikasi seperti **ScreenToGif** atau **LiceCap** untuk merekam layar.

<div align="center">
  <img src="https://placehold.co/800x450?text=Screenshot+Aplikasi+Shopmart+Anda" alt="Project Screenshot">
</div>

---

## 🛍️ Tentang Proyek

**Shopmart** adalah sebuah platform belanja online yang dirancang untuk memberikan pengalaman berbelanja yang mudah, cepat, dan aman. Dengan antarmuka yang modern dan responsif, Shopmart memudahkan pengguna untuk menemukan, memilih, dan membeli produk yang mereka inginkan, lengkap dengan sistem autentikasi dan proses pembayaran yang aman.

Proyek ini dibangun sebagai portofolio untuk mendemonstrasikan implementasi arsitektur web modern full-stack menggunakan Next.js.

---

## ✨ Fitur Utama

-   **🔐 Autentikasi Pengguna**: Sistem login dan registrasi yang aman menggunakan NextAuth.
-   **🎨 Antarmuka Modern & Responsif**: Dibuat dengan Tailwind CSS untuk tampilan yang sempurna di semua perangkat.
-   **🛍️ Katalog Produk**: Tampilan produk yang dinamis dengan fitur pencarian dan filter.
-   **🛒 Keranjang Belanja**: Pengguna dapat menambah, mengubah jumlah, dan menghapus produk dari keranjang.
-   **💳 Proses Checkout**: Integrasi dengan payment gateway (contoh: Stripe/Midtrans) untuk pembayaran.
-   **🗃️ Database & ORM**: Manajemen data yang efisien menggunakan PostgreSQL dengan Prisma ORM.
-   **📜 Riwayat Pesanan**: Pengguna dapat melihat riwayat transaksi yang pernah dilakukan.

---

## 🚀 Teknologi yang Digunakan

Berikut adalah teknologi utama yang menjadi fondasi dari proyek Shopmart:

| Teknologi                                                                                                 | Deskripsi                                 |
| --------------------------------------------------------------------------------------------------------- | ----------------------------------------- |
| <img src="https://img.shields.io/badge/Next-black?style=for-the-badge&logo=next.js" alt="Next.js">          | Framework React untuk Full-Stack Web      |
| <img src="https://img.shields.io/badge/React-20232A?style=for-the-badge&logo=react&logoColor=61DAFB" alt="React"> | Library JavaScript untuk membangun UI     |
| <img src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="Tailwind CSS"> | Framework CSS Utility-First               |
| <img src="https://img.shields.io/badge/Prisma-3982CE?style=for-the-badge&logo=prisma&logoColor=white" alt="Prisma"> | ORM (Object-Relational Mapping) untuk Node.js & TypeScript |
| <img src="https://img.shields.io/badge/PostgreSQL-316192?style=for-the-badge&logo=postgresql&logoColor=white" alt="PostgreSQL"> | Database Relasional                     |
| <img src="https://img.shields.io/badge/NextAuth.js-000000?style=for-the-badge&logo=next-auth&logoColor=white" alt="NextAuth.js"> | Solusi Autentikasi untuk Next.js          |
| <img src="https://img.shields.io/badge/TypeScript-007ACC?style=for-the-badge&logo=typescript&logoColor=white" alt="TypeScript"> | Superset JavaScript yang menambahkan tipe statis |

---

## ⚙️ Instalasi & Konfigurasi Lokal

Ikuti langkah-langkah berikut untuk menjalankan proyek ini di lingkungan lokal Anda.

1.  **Clone Repository**
    ```bash
    git clone [https://github.com/raflimulyarahman/ecommerce--shopmart.git](https://github.com/raflimulyarahman/ecommerce--shopmart.git)
    cd ecommerce--shopmart
    ```

2.  **Install Dependencies**
    Disarankan menggunakan `pnpm` untuk efisiensi, namun `npm` atau `yarn` juga bisa digunakan.
    ```bash
    pnpm install
    # atau
    npm install
    ```

3.  **Konfigurasi Database & Lingkungan**
    -   Salin file `.env.example` menjadi `.env`.
        ```bash
        cp .env.example .env
        ```
    -   Buka file `.env` dan isi variabel yang diperlukan, terutama `DATABASE_URL`. Pastikan Anda memiliki server PostgreSQL yang sedang berjalan.
        ```env
        DATABASE_URL="postgresql://USERNAME:PASSWORD@HOST:PORT/DATABASE_NAME"
        NEXTAUTH_SECRET="your-super-secret-key"
        NEXTAUTH_URL="http://localhost:3000"
        # Tambahkan variabel lain seperti kunci API untuk payment gateway jika ada
        ```

4.  **Migrasi Database Prisma**
    Perintah ini akan membuat tabel-tabel di database Anda sesuai dengan skema yang ada di `prisma/schema.prisma`.
    ```bash
    npx prisma migrate dev
    ```

5.  **Jalankan Aplikasi**
    ```bash
    pnpm run dev
    # atau
    npm run dev
    ```

6.  Buka browser dan akses <http://localhost:3000>.

---

## 📜 Lisensi

Proyek ini dilisensikan di bawah Lisensi MIT. Lihat file `LICENSE` untuk informasi lebih lanjut.

---

## 📬 Kontak

**Rafli Mulya Rahman**
-   **GitHub**: [@raflimulyarahman](https://github.com/raflimulyarahman)
-   **LinkedIn**: [Kunjungi Profil](https://www.linkedin.com/in/raflimulyarahman/)

Dibuat dengan ❤️ oleh Rafli Mulya Rahman
