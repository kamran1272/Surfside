# Surfside — E-Commerce Website

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-F05340?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap_5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

E-commerce website built with **Laravel 12**, featuring a product catalog,
shopping cart, and checkout flow.

## Features

- 🛍️ Product catalog with categories
- 🛒 Shopping cart
- 💳 Checkout flow
- 🔐 Authentication & user accounts
- 📱 Responsive design

## Tech stack

- **Backend:** Laravel 12 (PHP 8.2), Eloquent ORM
- **Database:** MySQL
- **Frontend:** Blade templates, Bootstrap 5 / Tailwind CSS

## Getting started

```bash
# Install dependencies
composer install
npm install

# Configure environment
cp .env.example .env
php artisan key:generate

# Run migrations (and seeders if available)
php artisan migrate --seed

# Start the server
php artisan serve
npm run dev
```

Then open http://localhost:8000.

## Project structure

- `app/Models` — Eloquent models (products, categories, orders, users)
- `app/Http/Controllers` — storefront and checkout controllers
- `database/migrations` — schema definitions
- `resources/views` — Blade templates

## License

MIT — see [LICENSE](LICENSE).
