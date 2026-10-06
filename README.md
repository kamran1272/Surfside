# 🛍️ Surfside — E-Commerce Platform

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Blade](https://img.shields.io/badge/Blade-F05340?style=for-the-badge&logo=laravel&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap_5-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

A complete e-commerce platform built with **Laravel 12** — customer storefront with product catalog, cart, and checkout, plus a full admin panel for managing products, brands, categories, orders, sliders, and coupons.

> 🎮 **Live interactive demo:** https://kamran1272.github.io/portfolio/surfside-demo/
> (static preview with sample data — actions are disabled)

---

## 📸 Screenshots

![Surfside Homepage](https://kamran1272.github.io/portfolio/images/projects/surfside.png)

---

## 📖 About

Surfside is a full-featured online store with two distinct experiences:

**Storefront** — homepage with hero slider, product catalog with category filtering, product detail pages, shopping cart, checkout flow, wishlist, and customer accounts (orders, addresses, reviews).

**Admin panel** — dashboard, product management (with image uploads, SKU, pricing, stock status), brand & category management, order management with status tracking, homepage slider, coupons, and site settings.

---

## ✨ Features

- 🛍️ Product catalog with categories, brands, and search
- 🛒 Shopping cart with quantity management
- 💳 Checkout flow with order confirmation
- ❤️ Wishlist and customer accounts
- 🔐 Admin panel with full CRUD for products, brands, categories
- 📦 Order management with status tracking (pending → processing → delivered)
- 🎚️ Homepage slider management
- 🎟️ Coupon system
- 🖼️ Product image uploads (multiple images per product)
- 📱 Fully responsive design

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 12 (PHP 8.2+) |
| Database | MySQL (SQLite for local dev) |
| Frontend | Blade, Bootstrap 5, custom CSS/JS |
| Build | Vite |

---

## 📸 Screenshots

### Storefront Homepage
![Storefront homepage](screenshots/home.png)

### Shop Page
![Shop page](screenshots/shop.png)

### Admin — Product Management
![Admin products](screenshots/admin-products.png)

### Admin — Order Management
![Admin orders](screenshots/admin-orders.png)

---

## ⚡ Getting Started

### Prerequisites
- PHP 8.2+, Composer
- Node.js 18+, npm
- MySQL (or SQLite for quick local setup)

### Installation

```bash
# 1. Clone
git clone https://github.com/kamran1272/Surfside.git
cd Surfside

# 2. Install dependencies
composer install
npm install

# 3. Environment
cp .env.example .env
php artisan key:generate
# configure DB_CONNECTION and DB_DATABASE in .env

# 4. Database
php artisan migrate --seed
php artisan db:seed --class=DemoSeeder   # optional: sample products & orders

# 5. Frontend assets
npm run build

# 6. Serve
php artisan serve
```

Visit 👉 http://127.0.0.1:8000

> For product image uploads: `php artisan storage:link`

---

## 📁 Project Structure

```
app/
├── Http/Controllers/
│   ├── Admin/          # Product, Brand, Category, Order, Dashboard controllers
│   └── ContactController.php
├── Models/             # Product, ProductImage, Brand, Category, Order, User
database/
├── migrations/         # products, categories, brands, orders, contacts…
└── seeders/            # DemoSeeder (sample catalog data)
resources/views/
├── Admin/              # Admin panel (dashboard, CRUD pages)
├── Website/            # Storefront (home, shop, cart, checkout, account…)
└── components/         # Shared header/footer
routes/web.php          # Storefront routes + admin route group
```

---

## 👨‍💻 Author

**Kamran Khan** — Full-Stack Developer (Laravel + React.js)

- 🌐 Portfolio: https://kamran1272.github.io/portfolio/
- 💼 LinkedIn: https://www.linkedin.com/in/kamran-khan-dev
- 🐙 GitHub: https://github.com/kamran1272

## 📜 License

MIT — see [LICENSE](LICENSE).
