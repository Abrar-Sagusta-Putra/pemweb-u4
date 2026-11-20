<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->


# Portal Berita

Aplikasi Portal Berita berbasis Laravel yang menyediakan platform untuk membaca, membuat, mengelola, dan mempublikasikan artikel secara digital.

## Identitas Proyek

| Informasi | Keterangan |
|---|---|
| Nama Proyek | Portal Berita |
| Mata Kuliah | Pemrograman Web |
| Framework | Laravel |
| Bahasa Pemrograman | PHP |
| Database | MySQL |
| Frontend | HTML, CSS, JavaScript |
| Repository | [pemweb-u4](https://github.com/Abrar-Sagusta-Putra/pemweb-u4) |

## Fitur Aplikasi

- **Halaman Beranda:** Menampilkan artikel terbaru.
- **Autentikasi Pengguna:** Registrasi, login, dan logout.
- **Dashboard:** Menampilkan statistik dan aktivitas artikel pengguna.
- **Manajemen Artikel:** Membuat, melihat, mengubah, dan menghapus artikel.
- **Hak Akses Pengguna:** Pengelolaan artikel dibatasi berdasarkan kepemilikan artikel.
- **Desain Responsif:** Tampilan disesuaikan untuk berbagai ukuran layar.

## Teknologi yang Digunakan

- Laravel
- PHP
- MySQL
- HTML5
- CSS3
- JavaScript
- Vite
- Node.js dan NPM

## Persyaratan Sistem

Pastikan perangkat telah memiliki:

- PHP dan Composer
- MySQL
- Node.js dan NPM
- Git

## Instalasi dan Menjalankan Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/Abrar-Sagusta-Putra/pemweb-u4.git
```

### 2. Masuk ke Direktori Proyek

```bash
cd pemweb-u4
```

### 3. Instal Dependensi PHP

```bash
composer install
```

### 4. Instal Dependensi Frontend

```bash
npm install
```

### 5. Konfigurasi Environment

Salin file `.env.example` menjadi `.env`.

Pada Windows PowerShell:

```powershell
Copy-Item .env.example .env
```

### 6. Generate Application Key

```bash
php artisan key:generate
```

### 7. Konfigurasi Database

Buat database MySQL, kemudian sesuaikan konfigurasi berikut pada file `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan nama database, username, dan password dengan konfigurasi MySQL pada perangkat masing-masing.

### 8. Jalankan Migrasi Database

```bash
php artisan migrate
```

### 9. Build Aset Frontend

```bash
npm run build
```

### 10. Jalankan Aplikasi

```bash
php artisan serve
```

Buka aplikasi melalui browser:

```text
http://127.0.0.1:8000
```

## Struktur Direktori

```text
pemweb-u4/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   └── Models/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   ├── factories/
│   └── seeders/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│       ├── articles/
│       ├── auth/
│       ├── layouts/
│       ├── pages/
│       └── partials/
├── routes/
├── storage/
├── tests/
├── composer.json
├── package.json
└── vite.config.js
```

## Keamanan

File `.env` berisi konfigurasi sensitif aplikasi dan tidak disertakan dalam repository. Folder `vendor/` dan `node_modules/` juga tidak diunggah karena dapat dibuat kembali melalui proses instalasi dependensi.

## Repository

Source code proyek tersedia secara publik melalui GitHub:

[https://github.com/Abrar-Sagusta-Putra/pemweb-u4](https://github.com/Abrar-Sagusta-Putra/pemweb-u4)

---

**Portal Berita — Proyek Pemrograman Web**