<h1 align="center">Sistem Informasi Pelayanan Dan Pengelolaan Data Kependudukan Desa Laravel 10</h1>
<p align="center">* license : MIT</p>
<p align="center">* [Demo Web](https://desa.syarifsoden.my.id/)</p>

## Support / Donate

* [Syarif Soden Blog](https://syarifsoden.blogspot.com/)
* [Syarif Soden Portofolio Web](https://syarifsoden.my.id/)
* [![Paypal](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=53YUWXZTAV7C8)
* <a href="https://trakteer.id/syarifsoden/tip?open=true" target="_blank"><img id="wse-buttons-preview" src="https://cdn.trakteer.id/images/embed/trbtn-red-1.png?date=18-11-2023" height="40" style="border:0px;height:40px;" alt="Trakteer Saya"></a>

## About

Sistem Pelayanan dan Pengelolaan Data Kependudukan adalah sistem yang dibuat untuk keperluan pelayanan data kependudukan pada pada desa. sistem ini dibuat menggunakan framework Laravel versi 10.


## Requirements

* [Laravel v10.43.0](https://laravel.com/)
* [Composer v2.6.6](https://getcomposer.org/)
* PHP >= 8.2.12
* OpenSSL PHP Extension
* PDO PHP Extension
* Curl PHP Extension
* ftp PHP Extension
* fileinfo PHP Extension
* GD PHP Extension
* xsl PHP Extension

## Installation

clone project :

* Dengan https :

```
git clone https://github.com/soden46/sistem-informasi-pelayanan-dan-pengelolaan-data-kependudukan-desa.git
```

* Dengan ssh :

```
git clone git@github.com:soden46/sistem-informasi-pelayanan-dan-pengelolaan-data-kependudukan-desa.git
```

## Setup `.env`

Setelah clone project, pastikan terlebih dahulu mengatur konfigurasi di file `.env`

_Catatan:_ Jika belum ada file `.env`, copy file `.env.example` dan beri nama `.env`

Atur konfigurasi database

_Catatan:_ Pastikan sudah ada database yang siap digunakan
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD
```

## Install Dependensi

Setelah itu, install dependensi dengan menjalankan perintah berikut di folder project :

```
composer install
```
```
> @php artisan storage:link
The [public/storage] directory has been linked.
```

## Database Migration
```

```

## Menjalankan Server
```
Untuk menjalankan server, jalankan perintah `php artisan serve`

```
## How To Use / Testing

### User Testing

Anda bisa mencoba mengakses sistem dengan menggunakan akun yg sudah tersedia secara default :

- `[petugas/staff]` :  Admin|Admin123 
- `[warga/penduduk]` :  Warga|Warga123 


## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Mysql](https://www.mysql.com//) - Database
* [laravel-dompdf](https://github.com/barryvdh/laravel-dompdf) - PDF Renderer
* [maatwebsite-excel](https://github.com/SpartnerNL/Laravel-Excel.git) - Excel Renderer


## Authors

* **Syarif Soden** - *@soden46*

##

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

