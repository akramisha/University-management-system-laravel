<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
// bootstrap/app.php

use App\Http\Middleware\RoleManager; // Make sure to import your middleware

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // This registers the 'role' string you used in your routes
        $middleware->alias([
            'role' => RoleManager::class,
        ]);
    })
    ->withMiddleware(function (Middleware $middleware) {
    $middleware->web(append: [
        \App\Http\Middleware\UpdateUserLastSeen::class,
    ]);
})
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();