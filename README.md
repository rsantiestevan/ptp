<h1 align="center">
  Prueba Técnica de Conexión con Paycomet usando DDD y Laravel.
</h1>

<p align="center">
    <a href="https://laravel.com/"><img src="https://img.shields.io/badge/Laravel-10-FF2D20.svg?style=flat&logo=laravel" alt="Laravel 10"/></a>
    <a href="https://www.php.net/"><img src="https://img.shields.io/badge/PHP-8.1-777BB4.svg?style=flat&logo=php" alt="PHP 8.1"/></a>
</p>

## 🚀 Funciones básicas
- Se incluye un Dockerización muy básica
- Usuarios creación basica
- Cursos creación, Listado vista detalle.
- Pagos alta y relación con usuarios y cursos.
- Integración con la Api de Paycomet (Xml y Rest)

## 🤔 Introducción
Solo quería comentar que esta es una base muy rápida de la implementación de la Arquitectura DDD.

## 📗 Primeros pasos
1. ```composer install```
2. ```cp .env.example .env```
3. ```php artisan key:generate```
4. Set database connection in the ```.env``` variables that start with ```DB_*```
5. ```php artisan migrate:fresh --seed```

## 📁 Structure particularities

Dentro del directorio "src/" mantenemos los Bounded Contexts, 

Also, I prefer to group the directory structure by domain, contrary to many examples I saw where some authors prefer grouping by layer. For example, a typical structure would be:

```
...
├── User
│   ├── Domain
│   │   ├── ValueObjects
│   │   ├── BoundedContexts
│   │   └── Contracts
│   ├── Application
│   │   └── UsesCases
│   ├── Infrastructure
│   │   ├── Repository
│   │   └── Models/Eloquents
│   └── ...
├── Courses
│   ├── Domain
│   │   ├── ValueObjects
│   │   ├── BoundedContexts
│   │   └── Contracts
│   ├── Application
│   │   └── UsesCases
│   ├── Infrastructure
│   │   ├── Repository
│   │   └── Models/Eloquents
│   └── ...
├── Payment
│   ├── Domain
│   │   ├── ValueObjects
│   │   ├── BoundedContexts
│   │   └── Contracts
│   ├── Application
│   │   └── UsesCases
│   ├── Infrastructure
│   │   ├── Repository
│   │   ├── PaymentMethods
│   │   └── Models/Eloquents
│   └── ...
```
Tengo que aclarar que CQRS no esta implementado, sobre todo por el tiempo y que llevo un poco desconectado de Laravel 10.
