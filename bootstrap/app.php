<?php
use App\Http\Middleware\AdminMiddleWare;
use App\Http\Middleware\CheckVerificationStatus;
use App\Http\Middleware\EmployerMiddleware;
use App\Http\Middleware\EnsureEmployerSetupCompleted;
use App\Http\Middleware\RedirectIfNotCompleted;
use App\Http\Middleware\PreventAccessFromPendingApproval;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'userMiddleware' => UserMiddleware::class,
            'adminMiddleware' => AdminMiddleWare::class,
            'employerMiddleware' => EmployerMiddleware::class,
            'checkVerificationStatus' => CheckVerificationStatus::class,
            'redirectIfNotCompleted' => RedirectIfNotCompleted::class,
            'ensureEmployerSetupCompleted' => EnsureEmployerSetupCompleted::class,
            'preventAccessFromPendingApproval' => PreventAccessFromPendingApproval::class

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
