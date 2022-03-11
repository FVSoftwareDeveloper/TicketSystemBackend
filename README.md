<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

# API Documentation (POSTMAN)

https://documenter.getpostman.com/view/17067607/UVsHSSqh

# 1 - Clone

git clone https://github.com/FVSoftwareDeveloper/TicketSystemBackend

# 2 - Access the bash folder

cd TicketSystemBackend

# 3 - Install postgresql

need to have postgresql already installed. if you need help to install see link bellow :
https://www.2ndquadrant.com/en/blog/pginstaller-install-postgresql/

# 4 - Install pgAdmin 4

https://www.pgadmin.org/download/

# 5 - Create new database with nam tickets

see link bellow:
https://www.guru99.com/postgresql-create-database.html

# 6 - Add your file .env

cp env.example .env

# 7 - The .env file must has the following basic configurations:

```
APP_TIMEZONE=America/Santo_Domingo
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tickets
DB_USERNAME=postgres
DB_PASSWORD=postgres
```
# 8 - Install PHP Version 7.4

## Windows
https://devanswers.co/install-composer-php-windows-10/

## Linux
https://www.digitalocean.com/community/tutorials/how-to-install-php-7-4-and-set-up-a-local-development-environment-on-ubuntu-18-04

## Mac OS
https://daily-dev-tips.com/posts/installing-php-on-your-mac/

# 9 - php.ini changes

for connections to postgres databases you need to make php driver extension available to do that going to your php installation path (php\php7\php.ini)
and uncomment the following extension 

$ By Default comes like this

;extension=pdo_pgsql

$ remove initial semicolon

extension=pdo_pgsql

# 10 - Composer need to be present. run command bellow:

composer update

# 11 - Generate Laravel key. run command bellow:

php artisan key:generate

# 12 - Generate JWT key. run command bellow:

php artisan jwt:generate

# 13 - if you would like to have fake data to be insert go to step 15 or if you like to start clean and let laravel create table go to step 14

# 14 - Migrate Databases. run command bellow:

php artisan migrate

# 15 - import bckTickets.bak file into postgresql

https://www.pgadmin.org/docs/pgadmin4/6.3/restore_dialog.html

# 16 - Run app on port 8000.

php artisan serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
