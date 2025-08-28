<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareersController;
use App\Livewire\Checkout;
use App\Http\Controllers\Welcome;
use App\Livewire\Admin\Adminblog;
use App\Livewire\Settings\Profile;
use App\Livewire\Admin\Adminupload;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Appearance;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ServicesController;
use App\Livewire\User\Dashboard as userDashboard;
use App\Livewire\Admin\Dashboard;



Route::get('/', [Welcome::class, 'index'])->name('welcome');
Route::get('/services', [ServicesController::class, 'index'])->name('services');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.details');


Route::get('/rentals', [RentalController::class, 'index'])->name('equipment-rentals');
Route::get('/rentals/{slug}', [RentalController::class, 'show'])->name('equipment.details');


Route::get('/careers', [CareersController::class, 'index'])->name('careers');
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');


Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::get('/rental', Adminupload::class)->name('rental.index');
    Route::get('/blogs', Adminblog::class)->name('adminblog.index');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('dashboard');
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
