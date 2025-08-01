# SISEKOLAH - Aplikasi Manajemen Sekolah

Aplikasi web sederhana untuk manajemen data sekolah yang dibangun dengan framework Laravel dan Livewire. Aplikasi ini memiliki fitur dasar untuk mengelola data siswa, guru, dan kelas, serta menampilkan ringkasan data di dashboard.

## Fitur Aplikasi

-   **Otentikasi Pengguna:**
    -   Halaman login dan register.
    -   Sistem logout yang terintegrasi di sidebar dan topbar.

-   **Manajemen Kelas (CRUD):**
    -   Menambahkan, melihat, mengedit, dan menghapus data kelas.
    -   Validasi data yang lengkap.

-   **Manajemen Guru (CRUD):**
    -   Menambahkan, melihat, mengedit, dan menghapus data guru.
    -   Sistem filter data guru berdasarkan kelas (membutuhkan data di tabel pivot).

-   **Manajemen Siswa (CRUD):**
    -   Menambahkan, melihat, mengedit, dan menghapus data siswa.
    -   Dropdown untuk memilih kelas saat menambah/mengedit siswa.
    -   Sistem filter data siswa berdasarkan kelas.

-   **Dashboard:**
    -   Menampilkan ringkasan statistik total siswa, kelas, dan guru.
    -   Menampilkan daftar siswa, kelas, dan guru terbaru.

## Teknologi yang Digunakan

-   **Backend:** PHP 8.2+
-   **Framework:** Laravel
-   **Interaktivitas:** Livewire 3
-   **Database:** MySQL
-   **Dependency Management:** Composer & NPM
-   **Frontend:** Bootstrap 5 (menggunakan template SB Admin 2)
-   **Build Tool:** Vite

## Panduan Instalasi dan Penggunaan

Ikuti langkah-langkah di bawah ini untuk menjalankan proyek di lingkungan lokal Anda.

### 1. Klon Repositori dan Instal Dependensi

```bash
# Klon repositori (jika menggunakan Git)
# git clone <url-repository> sisekolah
# cd sisekolah

# Instal semua dependensi PHP dengan Composer
composer install

# Instal dependensi frontend dengan NPM
npm install
```
### 2. Konfigurasi Database dan Lingkungan

Salin file .env.example menjadi .env dan sesuaikan pengaturan database Anda.

```bash
# Salin file .env
cp .env.example .env

# Jalankan perintah untuk menghasilkan application key
php artisan key:generate
```
Buka file .env dan perbarui detail database Anda:

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database_anda
DB_USERNAME=root
DB_PASSWORD=
```
### 3. Migrasi Database dan Seed Data

Setelah konfigurasi database, jalankan migrasi untuk membuat semua tabel.

```bash

# Jalankan migrasi untuk membuat semua tabel
# Perintah ini akan membuat tabel users, guru, kelas, siswa, dan pivot guru_kelas
php artisan migrate
```

### 4. Kompilasi Aset Frontend
Jalankan perintah ini untuk mengkompilasi semua aset CSS dan JavaScript.

```bash
npm run dev
```
Biarkan terminal ini berjalan di latar belakang selama pengembangan.

### 5. Jalankan Aplikasi
Jalankan aplikasi dengan perintah berikut:

```bash
php artisan serve
```
Aplikasi Anda sekarang dapat diakses di http://127.0.0.1:8000.

### 6. Penggunaan
<ul>
<li>Akses URL utama (http://127.0.0.1:8000) untuk diarahkan ke halaman login.</li>
<li>Lakukan pendaftaran akun di halaman http://127.0.0.1:8000/register.</li>
<li>Setelah login, Anda akan masuk ke halaman dashboard yang berisi ringkasan data.</li>
<li>Gunakan menu navigasi di sidebar untuk mengakses fitur Manajemen Kelas, Guru, dan Siswa</li>
</ul>

## Lisensi
Proyek ini dilisensikan di bawah lisensi MIT.

## Kontributor
Dibuat oleh Nalindra Driyawan Thahai dengan bantuan Gemini.







