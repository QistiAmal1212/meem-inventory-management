<?php

namespace App\Providers;

use App\Events\BranchSelected;
use App\Jobs\SendDiscordWebhook;
use App\Listeners\StoreBranchIdInSession;
use Filament\Notifications\Livewire\DatabaseNotifications;
use Illuminate\Pagination\Paginator;
use Illuminate\Queue\Events\JobExceptionOccurred;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        DatabaseNotifications::trigger('filament.notifications.database-notifications-trigger');

        Event::listen(BranchSelected::class, StoreBranchIdInSession::class);

        Event::listen(JobExceptionOccurred::class, function ($event) {
            $e = $event->exception;

            $message = '🚨 *Exception:* `'.class_basename($e)."`\n";
            $message .= '**Message:** '.$e->getMessage()."\n";
            $message .= '**File:** '.$e->getFile().':'.$e->getLine();

            SendDiscordWebhook::dispatch($message);
            
            Paginator::defaultView('view-name');
        });

    }
}
