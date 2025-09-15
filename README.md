![rentalwire](https://socialify.git.ci/barsch123/rentalwire/image?custom_description=A+modern+Livewire+web+application%2C+originally+named+%27Template1%27+for+convenience%2C+but+built+as+a+soon+complete+project&custom_language=Laravel&description=1&font=Raleway&language=1&name=1&owner=1&pattern=Solid&stargazers=1&theme=Dark)

# Rentalwire

Rentalwire is a modern web application for equipment rental, built with Laravel, Livewire, TailwindCSS, and Vite. It features a dynamic cart, checkout flow, user authentication, admin dashboard, newsletter, blog, and more.

## Features

-   Equipment rental listing and filtering
-   Dynamic cart and order summary (Livewire)
-   Checkout and payment flow
-   User authentication and profile management
-   Admin dashboard for managing rentals, blogs, users, and settings
-   Newsletter subscription and email system
-   Blog management and tagging
-   Responsive UI with TailwindCSS
-   Real-time updates with Livewire events
-   Comprehensive test suite (Pest, PHPUnit)

## Tech Stack

-   **Backend:** Laravel 12, Livewire, PHP 8.3
-   **Frontend:** TailwindCSS, Vite
-   **Database:** SQLite (default), migrations for users, products, rentals, blogs, tags, newsletter, jobs
-   **Testing:** Pest, PHPUnit

## Installation

```bash
# Clone the repository
git clone https://github.com/barsch123/rentalwire.git
cd rentalwire

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Copy and configure environment variables
cp .env.example .env
# Edit .env with your database and mail settings

# Run database migrations
php artisan migrate

# (Optional) Seed the database
php artisan db:seed

# Start the development server
php artisan serve
# In another terminal, start Vite for frontend assets
npm run dev
```

## Usage

-   Access the app at `http://localhost:8000`
-   Register or log in to manage your rentals and orders
-   Use the admin dashboard for advanced management (requires admin account)


## Screenshots

Below are some screenshots of the application:

<p align="center">
	<img src="screenshots/image.png" alt="Main UI" width="600" />
	<img src="screenshots/image1.png" alt="Feature 1" width="600" />
	<img src="screenshots/image2.png" alt="Feature 2" width="600" />
	<img src="screenshots/image3.png" alt="Feature 3" width="600" />
</p>

## Project Structure

-   `app/Livewire/` — Livewire components (Cart, OrderSummary, Filters, Admin, etc.)
-   `resources/views/` — Blade views for pages and components
-   `routes/` — Route definitions (`web.php`, `auth.php`, `console.php`)
-   `database/migrations/` — Database schema
-   `public/` — Public assets (images, icons, CSS, JS)
-   `tests/` — Feature and unit tests
-   `config/` — Laravel configuration files

## License

MIT
