<div align="center">
  <img src="public/images/logo-dishub.png" alt="Logo Dishub" width="120" style="margin-bottom: 20px;"/>
  <h1>Sistem Informasi Pengelolaan Surat (SIPS)</h1>
  <p><strong>Dinas Perhubungan Kota Bogor</strong></p>
  <p>Aplikasi manajemen arsip digital untuk mempermudah pelacakan dan pengelolaan Surat Masuk, Surat Keluar, serta Dokumen Standar Teknis secara efisien dan tersetruktur.</p>
</div>

---

## ✨ Fitur Utama

- 📥 **Manajemen Surat Masuk**
  Sistem pencatatan otomatis surat masuk dengan status pelacakan (*Masuk*, *Sedang Diproses*, *Selesai*), dilengkapi dengan indikator penanda surat yang belum dibaca.
- 📤 **Manajemen Surat Keluar**
  Pembuatan balasan surat keluar yang terintegrasi langsung (*linked*) ke basis data Surat Masuk. 
- 📄 **Arsip Standar Teknis (Cloud Integration)**
  Pengelolaan dokumen standar teknis. File PDF diunggah dan disimpan secara aman menggunakan integrasi **Cloudinary**.
- 🔍 **Pencarian Global (Unified Search)**
  Fitur pintar untuk melakukan pencarian kilat di seluruh modul (Surat Masuk, Surat Keluar, dan Standar Teknis) dari satu *search bar*.
- 📊 **Dashboard Interaktif**
  Ringkasan data instan yang menampilkan jumlah surat belum dibaca, rekap surat diproses, dan *quick actions*.

## 🚀 Teknologi yang Digunakan

Aplikasi ini dibangun menggunakan arsitektur modern berkinerja tinggi:
- **Framework:** Laravel 11/12 (PHP 8.x)
- **Frontend:** TailwindCSS, Blade Templating, Vite
- **Database:** MySQL / PostgreSQL
- **Cloud Storage:** Cloudinary (Untuk manajemen file raw/PDF)
- **Deployment:** Vercel (Serverless PHP via `vercel-php`)

---

## 🛠️ Panduan Instalasi Lokal

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi secara lokal di komputermu:

### Prasyarat:
- PHP >= 8.2
- Composer
- Node.js & npm
- Database (MySQL/MariaDB)

### Langkah Instalasi:

1. **Clone repositori ini:**
   ```bash
   git clone https://github.com/Qodarrz/SuratDishub.git
   cd SuratDishub
   ```

2. **Install dependensi PHP dan Node.js:**
   ```bash
   composer install
   npm install
   ```

3. **Duplikat file konfigurasi *Environment*:**
   ```bash
   cp .env.example .env
   ```

4. **Koneksikan ke Database & Cloudinary:**
   Buka file `.env` kamu dan isi konfigurasi Database serta Cloudinary.
   ```ini
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=surat_dishub
   DB_USERNAME=root
   DB_PASSWORD=

   # Kredensial Cloudinary (Wajib untuk modul Standar Teknis)
   CLOUDINARY_URL=cloudinary://<API_KEY>:<API_SECRET>@<CLOUD_NAME>
   ```

5. **Generate *App Key* dan Jalankan Migrasi Data:**
   ```bash
   php artisan key:generate
   php artisan migrate
   ```

6. **Jalankan *Development Server*:**
   ```bash
   # Jalankan build assets Tailwind & Vite di terminal kiri
   npm run dev

   # Jalankan server Laravel di terminal kanan
   php artisan serve
   ```
   Buka `http://localhost:8000` di dalam browsermu.

---

## 🌐 Deployment (Vercel)

Aplikasi ini sudah dioptimalkan untuk di-deploy di **Vercel** menggunakan arsitektur *Serverless*. Karena Vercel adalah *read-only filesystem*, project ini disesuaikan sepenuhnya:

1. Modul file *upload* tidak disimpan di `storage/app` lokal, melainkan langsung diteruskan ke **Cloudinary API**.
2. Framework Vite telah dikonfigurasi melalui rute statis regex khusus di dalam `vercel.json` dan `outputDirectory` berbasis `public` agar aset dapat disajikan lewat Vercel CDN.
3. Mendukung fitur *TrustProxies* (`bootstrap/app.php`) agar HTTPS dapat tersalurkan kembali dengan murni ke Laravel untuk memuat file CSS/JS secara mulus dan bebas *Mixed-Content Error*.

Saat melakukan deploy ke Vercel:
- **Framework Preset**: Pilih `Other`.
- **Build Command**: `npm run build`
- **Output Directory**: `public`
- **Environment Variables**: Masukkan seluruh isian `.env` seperti koneksi DB Cloud dan CLOUDINARY_URL.

---
<div align="center">
  <i>Dikembangkan oleh Savare'4 Solution untuk instansi internal</i>
</div>
