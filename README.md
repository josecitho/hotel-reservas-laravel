# Sistema de Reservas de Hotel --- Laravel 12 + SQLite + Breeze

## Descripción General

Proyecto completo de reservas de hotel desarrollado en Laravel 12 con
autenticación Breeze y base de datos SQLite. Incluye página pública,
reservas y panel de administración.

## Tecnologías

-   Laravel 12
-   PHP 8.4
-   SQLite
-   Laravel Breeze
-   Blade Templates

## Instalación

1.  Crear proyecto Laravel\

``` bash
composer create-project laravel/laravel .
```

2.  Instalar Breeze\

``` bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run build
```

3.  Configurar SQLite\
    Crear archivo `database/database.sqlite`

Editar `.env`:

    DB_CONNECTION=sqlite
    DB_DATABASE=./database/database.sqlite

## Migraciones y Seeders

Crear modelos:

``` bash
php artisan make:model Room -m
php artisan make:model Reservation -m
```

Ejecutar migraciones:

``` bash
php artisan migrate --seed
```

## Panel Admin

Acceso protegido con login.\
Ruta:

    /admin/reservas

## Ejecutar proyecto

``` bash
php artisan serve
```

## Despliegue en Vercel

Usar `vercel-php` y archivo `vercel.json`.

## Autor

José Santos Valdebenito Olivares
