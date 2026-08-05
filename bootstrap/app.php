<?php

use App\Http\Middleware\AdminCheck;
use App\Http\Middleware\UserCheck;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Routing\Middleware\SubstituteBindings;
use NielsNumbers\LaravelLocalizer\Middleware\RedirectLocale;
use NielsNumbers\LaravelLocalizer\Middleware\SetLocale;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(remove: [
            SubstituteBindings::class,
        ]);

        $middleware->web(append: [
            SetLocale::class,
            RedirectLocale::class,
            SubstituteBindings::class,
        ]);

        $middleware->alias([
            'admin' => AdminCheck::class,
            'user' => UserCheck::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
