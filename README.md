# Virtual Card App
This is a simple web application that you can register your links of LinkedIn and GitHub and get a Qr-code with direct access to the created virtual card.

You can check the full funcionality [here](https://virtual-card-app.herokuapp.com)
Builded with Laravel Sail, Laravel Livewire and PostgreSQL database.
*Autor: Pedro Benevides*

## Requirements
* PHP >= 8
* Composer >= 2

## Installation

1. Using Docker

You can use the docker-composer file to setup your enviroment using Laravel Sail
```
./vendor/bin/sail up
```
Or try 
```
bash ./vendor/laravel/sail/bin/sail up
```
**Obs: You can [develop within WSL2](https://laravel.com/docs/10.x/installation#getting-started-on-windows). Its recommended use [Remote Development](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.vscode-remote-extensionpack) VSCode extension. More about using sail: [Laravel Sail Docs](https://laravel.com/docs/10.x/sail)**

1. Install dependencies
```
composer install
```

Using sail:
```
sail composer install
```

3. Setup Environment Variables

Should be configured in a new .env file, following the .env.example pattern


4. Generate App Key
```
php artisan key:generate
```

Using sail:
```
sail artisan key:generate
```

5. Run the Migrations

```
php artisan migrate
```

Using sail:
```
sail artisan migrate
```

## Run the App

```
php artisan serve
```

**Obs: You dont need this using sail.**
