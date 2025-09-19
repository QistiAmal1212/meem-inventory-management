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
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        $exceptions->reportable(function (Throwable $e) {
            $message = '🚨 *Exception:* `'.class_basename($e)."`\n";
            $message .= '**Message:** '.$e->getMessage()."\n";
            $message .= '**File:** '.$e->getFile().':'.$e->getLine();

            \App\Jobs\SendDiscordWebhook::dispatch($message); // or dispatchSync() for testing
        });
    })->create();
