<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'verifyUserForEditAndDelete'=> \App\Http\Middleware\ValidateUserForEditAndDelete::class,
            'validateUserForAdminAccess'=>\App\Http\Middleware\ValidateUserForAdminAccess::class,
            'validateUserForAdminRevoke'=>\App\Http\Middleware\ValidateUserForAdminRevoke::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
