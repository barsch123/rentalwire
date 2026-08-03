![Rentalwire](https://socialify.git.ci/barsch123/rentalwire/image?custom_language=Laravel&description=1&font=Raleway&language=1&name=1&owner=1&pattern=Solid&stargazers=1&theme=Dark)

# RentalWire – Open Source Solar Company Platform

RentalWire is an **open-source solar company web application** built with **Laravel, Livewire, TailwindCSS, and Vite**.  
It provides a complete workflow including **solar product listings, availability tracking, cart and checkout**, user authentication, and an **admin dashboard** for managing products, users, and content.

---

## 🚀 Features

- Solar product listings with availability tracking
- Dynamic cart and checkout flow powered by Livewire
- User authentication and profile management
- Admin dashboard for managing products, users, blogs, and settings
- Blog and newsletter system with tagging and email support
- Responsive UI built with TailwindCSS
- Real-time UI updates using Livewire events
- Automated testing with Pest and PHPUnit

---

## 🧰 Tech Stack

- **Backend:** Laravel 13, Livewire, PHP 8.3  
- **Frontend:** TailwindCSS, Vite  
- **Database:** SQLite (default), Laravel migrations  
- **Testing:** Pest, PHPUnit  

---

## ⚙️ Installation

```bash
# Clone the repository
git clone https://github.com/barsch123/rentalwire.git
cd rentalwire

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Configure environment variables
cp .env.example .env

# Generate application key
php artisan key:generate

# Run database migrations
php artisan migrate

# (Optional) Seed the database
php artisan db:seed

# Start the application
php artisan serve

# In another terminal, start Vite
npm run dev
```

### Alternative: run all local development services

```bash
composer run dev
```

## ✅ Running Tests

```bash
composer run test
```
