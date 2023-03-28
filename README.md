# Virtual Card App
This is a simple web application that you can register your links of LinkedIn and GitHub and get a Qr-code with direct access to the created virtual card.

Builded with Laravel Sail, Laravel Livewire and PostgreSQL database.
*Autor: Pedro Benevides*

## Requirements
* PHP >= 8
* Composer >= 2
* Docker

## Installation

1. Install dependencies

```
composer install
```

2. Setup Environment Variables
Should be configured in a new .env file following the .env.example pattern

3. Generate App Key
```
php artisan key:generate
```

4. Run the Migrations

```
php artisan migrate
```

## Run the App

```
php artisan serve
```
