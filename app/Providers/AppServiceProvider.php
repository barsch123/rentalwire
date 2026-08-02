<?php

namespace App\Providers;

use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\UserCheck;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local') && class_exists(\Laravel\Telescope\TelescopeServiceProvider::class)) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::addPersistentMiddleware([
            AdminCheck::class,
            UserCheck::class,
        ]);

        Model::preventLazyLoading();
        Model::automaticallyEagerLoadRelationships();
    }
}
