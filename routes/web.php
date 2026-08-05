<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\RentalController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Welcome;
use App\Livewire\Admin\Adminblog;
use App\Livewire\Admin\Adminupload;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\SupportCenter;
use App\Livewire\User\Dashboard as UserDashboard;
use Illuminate\Support\Facades\Route;

Route::localize(function (): void {
    Route::get('/', [Welcome::class, 'index'])->name('welcome');
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/projects', [ProjectsController::class, 'index'])->name('projects');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/support', SupportCenter::class)->name('support');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.details');
    Route::get('/solutions', [RentalController::class, 'index'])->name('solutions');
    Route::get('/solutions/{slug}', [RentalController::class, 'show'])->name('solution-details');
    Route::get('/careers', [CareersController::class, 'index'])->name('careers');
    Route::get('/estimate', [CheckoutController::class, 'index'])->name('checkout');
});

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::redirect('/rentals', '/solutions');
Route::redirect('/solution', '/solutions');
Route::post('/solutions/{slug}/estimate', [RentalController::class, 'addToEstimate'])->name('solutions.estimate.store');
Route::redirect('/checkout', '/estimate');
Route::post('/estimate/complete', [CheckoutController::class, 'complete'])->name('checkout.complete');

Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('admin.dashboard');
    Route::redirect('/rental', '/admin/solutions');
    Route::get('/solutions', Adminupload::class)->name('solutions.index');
    Route::get('/blogs', Adminblog::class)->name('adminblog.index');
});

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('/dashboard', UserDashboard::class)->name('dashboard');
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
