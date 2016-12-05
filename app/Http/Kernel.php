<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
        ],

        'api' => [
            'throttle:60,1',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'authCheck' => \App\Http\Middleware\checkIfAuth::class,
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'can' => \Illuminate\Foundation\Http\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        //Permissions Middleware
        'stockAuth' => \App\Http\Middleware\stockAuth::class,
        'posAuth' => \App\Http\Middleware\posAuth::class,
        'orderAuth' => \App\Http\Middleware\orderAuth::class,
        'supplierAuth' => \App\Http\Middleware\supplierAuth::class,
        'usersAuth' => \App\Http\Middleware\usersAuth::class,
        'reportsAuth' => \App\Http\Middleware\reportsAuth::class,
        'productsAuth' => \App\Http\Middleware\productsAuth::class,
        'permissionsAuth' => \App\Http\Middleware\permissionsAuth::class,
    ];
}
