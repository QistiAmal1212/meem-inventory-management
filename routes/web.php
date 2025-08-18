<?php

use App\Events\BranchSelected;
use App\Jobs\SendDiscordWebhook;
use App\Livewire\AuditLog;
use App\Livewire\Product;
use App\Livewire\Repository;
use App\Livewire\Stock;
use App\Models\User;
use App\Notifications\TestNotification;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;


Route::get('/send-test-notification', function () {
    Notification::make()
    ->title('Berjaya')
    ->body('Test berjaya. Ini ditunjukkan dalam UI Filament.')
    ->sendToDatabase(auth()->user());

    return 'Notification sent!';
});

Route::get('/', function () {
    // SendDiscordWebhook::dispatchSync('📢 Hi Dayana, ni log sistem meem');
    // dd(auth()->user()->unreadNotifications);

    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile')->name('settings');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');

    Route::get('/product', Product::class)->name('product');
    Route::get('/stock', Stock::class)->name('stock');
    Route::get('/repository', Repository::class)->name('repository');
    Route::get('/audit-log', AuditLog::class)->name('audit-log');
});

require __DIR__.'/auth.php';
