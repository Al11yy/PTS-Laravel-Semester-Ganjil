# 🏀 Peminjaman Alat Olahraga  

Aplikasi **Peminjaman Alat Olahraga** berbasis Laravel untuk mempermudah proses peminjaman, pengembalian, dan manajemen alat olahraga.  
Dilengkapi dengan fitur **CRUD Produk**, **Form Peminjaman**, serta sistem **Approval & Decline** untuk admin.  

---

## 🚀 Fitur Utama  

✅ **Halaman Utama** – menampilkan daftar alat olahraga yang tersedia  
✅ **Form Peminjaman (Public)** – siapa saja bisa mengajukan peminjaman tanpa login  
✅ **Sistem Approval (Admin)** – admin bisa menyetujui atau menolak peminjaman  
✅ **CRUD Produk (Admin)** – tambah, ubah, hapus alat olahraga  
✅ **Autentikasi User** – login/register untuk admin dan pengelola  

---

## 🛠️ Teknologi yang Digunakan  

- [Laravel 11](https://laravel.com/) – Backend & Routing  
- [Blade Template](https://laravel.com/docs/blade) – Templating engine  
- [TailwindCSS](https://tailwindcss.com/) – Styling modern dan responsif  
- [MySQL / MariaDB](https://www.mysql.com/) – Database  
- [Laravel Breeze](https://laravel.com/docs/starter-kits#breeze) – Autentikasi  

---


## Instalasi
```bash

# 1️⃣ Clone repo
git clone https://github.com/Al11yy/PTS-Laravel-Semester-Ganjil.git
cd onlycars

# 2️⃣ Install dependencies
composer install
npm install

# 3️⃣ Konfigurasi environment
cp .env.example .env
php artisan key:generate

# 4️⃣ Migrasi database
php artisan migrate
