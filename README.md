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

# Clone

git clone https://github.com/FVSoftwareDeveloper/TicketSystemBackend

# Access the bash folder

cd TicketSystemBackend

# Install postgresql

need to have postgresql already installed. if you need help to install see link bellow :
https://www.2ndquadrant.com/en/blog/pginstaller-install-postgresql/

# Add your file .env

cp env.example .env

# The .env file must has the following basic configurations:

```
APP_TIMEZONE=America/Santo_Domingo
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=tickets
DB_USERNAME=postgres
DB_PASSWORD=postgres
```
# Install PHP Version 7.4

## Windows
https://devanswers.co/install-composer-php-windows-10/

## Linux
https://www.digitalocean.com/community/tutorials/how-to-install-php-7-4-and-set-up-a-local-development-environment-on-ubuntu-18-04

## Mac OS
https://daily-dev-tips.com/posts/installing-php-on-your-mac/

# Composer need to be present. run command bellow:

composer update

# Generate Laravel key. run command bellow:

php artisan key:generate

# Migrate Databases. run command bellow:

php artisan migrate

# Run app on port 8000.

php artisan run serve

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
