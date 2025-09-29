<?php

use App\Http\Controllers\ExportExcelController;
use App\Http\Controllers\ExportPdfController;
use App\Jobs\SendDiscordWebhook;
use App\Livewire\AuditLog;
use App\Livewire\CreateProduct;
use App\Livewire\EditProduct;
use App\Livewire\Product;
use App\Livewire\Repository;
use App\Livewire\Stock;
use App\Livewire\ViewProduct;
use App\Models\User;
use Filament\Notifications\Notification;
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
    Route::get('/create-product', CreateProduct::class)->name('create.product');
    Route::get('/edit-product/{id}', EditProduct::class)->name('edit.product');
    Route::get('/view-product/{id}', ViewProduct::class)->name('view.product');
    Route::get('/stock', Stock::class)->name('stock');
    Route::get('/repository', Repository::class)->name('repository');
    Route::get('/audit-log', AuditLog::class)->name('audit-log');

    Route::get('product/export/', [ExportExcelController::class, 'exportProduct'])->name('product.export');
    Route::get('product/export/pdf', [ExportPdfController::class, 'exportProduct'])->name('product.export.pdf');
});

require __DIR__.'/auth.php';
