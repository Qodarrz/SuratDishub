<div align="center">
  <h1>📬 Sistem Informasi Manajemen Surat Dishub</h1>
  <p>Aplikasi modern berbasis web untuk mengelola dan mengarsipkan persuratan di lingkungan Dinas Perhubungan.</p>

  <!-- Badges -->
  <p>
    <img alt="Laravel" src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
    <img alt="TailwindCSS" src="https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" />
    <img alt="Alpine.js" src="https://img.shields.io/badge/Alpine.js-8BC0D0?style=for-the-badge&logo=alpine.js&logoColor=white" />
    <img alt="Cloudinary" src="https://img.shields.io/badge/Cloudinary-3448C5?style=for-the-badge&logo=Cloudinary&logoColor=white" />
    <img alt="Vercel" src="https://img.shields.io/badge/Vercel-000000?style=for-the-badge&logo=vercel&logoColor=white" />
  </p>
</div>

---

## 📖 Tentang Aplikasi

**Sistem Informasi Manajemen Surat (SIMS)** dikembangkan untuk memfasilitasi kebutuhan administrasi surat-menyurat di instansi pemerintahan (khususnya Dinas Perhubungan). Aplikasi ini dirancang agar pencatatan, pencarian, serta penyimpanan dokumen digital bisa dilakukan secara cepat, terintegrasi, dan mudah diakses dari mana saja.

## ✨ Fitur Utama

- 📥 **Manajemen Surat Masuk** – Mendata surat yang diterima lengkap dengan lampiran digital.
- 📤 **Manajemen Surat Keluar** – Menata arsip surat yang diterbitkan instansi ke pihak luar.
- 📋 **Standar Teknis** – Pengelolaan dokumen standar operasional dan teknis (SOP/Juknis).
- 🔍 **Pencarian Global Terpadu** – Mencari dokumen dengan cepat di seluruh kategori (Surat Masuk, Keluar, dan Standar Teknis) hanya dari satu halaman `/pencarian`.
- ☁️ **Penyimpanan Cloud** – Terintegrasi secara langsung dengan **Cloudinary** untuk memastikan file dan gambar aman disematkan di layanan cloud dan menghemat *storage* lokal.
- 🚀 **Siap Deploy di Serverless** – Konfigurasi penuh yang disesuaikan agar aplikasi dapat berjalan mulus di **Vercel** (`vercel.json` included).

## 🛠️ Teknologi yang Digunakan

| Kategori | Teknologi |
| :--- | :--- |
| **Backend Framework** | Laravel 12.x (PHP 8.2+) |
| **Frontend Styling** | Tailwind CSS v3 |
| **Frontend Interactions** | Alpine.js |
| **Database** | MySQL / PostgreSQL |
| **Cloud Storage** | Cloudinary SDK (`cloudinary-labs/cloudinary-laravel`) |
| **Deployment** | Vercel Serverless Functions |

## 🚀 Panduan Instalasi Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan project di lokal mesin Anda.

### Prasyarat Asisten
Pastikan Anda memiliki hal berikut ter-install di komputer:
* [PHP >= 8.2](https://www.php.net/downloads)
* [Composer](https://getcomposer.org/)
* [Node.js & NPM](https://nodejs.org/)
* Akun [Cloudinary](https://cloudinary.com) untuk koneksi API Storage.

### Langkah-langkah Lengkap

1. **Clone repository ini**
   ```bash
   git clone <url-repo-anda>
   cd surat_dishub
   ```

2. **Install dependensi PHP via Composer**
   ```bash
   composer install
   ```

3. **Install dependensi Node.js**
   ```bash
   npm install
   ```

4. **Kopi file environment (.env)**
   ```bash
   cp .env.example .env
   ```

5. **Generate App Key**
   ```bash
   php artisan key:generate
   ```

6. **Atur Database & Konfigurasi Cloudinary di `.env`**
   ```env
   DB_CONNECTION=mysql # Atau sesuai db anda
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=surat_dishub
   DB_USERNAME=root
   DB_PASSWORD=

   # Pengaturan Cloudinary
   CLOUDINARY_URL=cloudinary://API_KEY:API_SECRET@CLOUD_NAME
   ```

7. **Jalankan Migrasi Database dan Seeder**
   ```bash
   php artisan migrate --seed
   ```

8. **Kompilasi aset frontend (Vite)**
   ```bash
   npm run build
   # Untuk development mode, jalankan npm run dev
   ```

9. **Jalankan server lokal Laravel**
   ```bash
   php artisan serve
   ```
   Aplikasi sekarang dapat diakses secara lokal di `http://127.0.0.1:8000`. 🎉

## 🌍 Cara Deploy ke Vercel

Projek ini telah secara khusus disesuaikan supaya *deploy-friendly* di Vercel:
1. Hubungkan repo github ini ke akun Vercel Anda.
2. Di Vercel, *Framework Preset* biasanya akan otomatis terbaca `Laravel`. Pastikan Root Directory berada di `./` (default).
3. Tambahkan semua konfigurasi environment di *Environment Variables* Vercel (terutama kredensial *database remote* dan *Cloudinary URL*).
4. Klik **Deploy** dan biarkan file `vercel.json` dan `api/index.php` (otomatis atau bawaan dari setup) menjalankan sisanya. Semua asset statis akan di-*serve* dengan benar sesuai aturan `vercel.json`.

---

<div align="center">
  Dibuat dengan ❤️ untuk efisiensi birokrasi dan administrasi persuratan.
</div>
