<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\TokoController;
use App\Models\Toko;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/tokos', [TokoController::class, 'adminIndex'])->name('admin.tokos.index');
    Route::get('/admin/tokos/create', [TokoController::class, 'create'])->name('admin.tokos.create');
    Route::post('/admin/tokos', [TokoController::class, 'store'])->name('admin.tokos.store');
    Route::get('/admin/tokos/{toko}/edit', [TokoController::class, 'edit'])->name('admin.tokos.edit');
    Route::put('/admin/tokos/{toko}', [TokoController::class, 'update'])->name('admin.tokos.update');
    Route::delete('/admin/tokos/{toko}', [TokoController::class, 'destroy'])->name('admin.tokos.destroy');

    // MENU CRUD (per toko)
    Route::get('/admin/tokos/{toko}/menus', [MenuController::class, 'adminIndex'])->name('admin.menus.index');
    Route::get('/admin/tokos/{toko}/menus/create', [MenuController::class, 'create'])->name('admin.menus.create');
    Route::post('/admin/tokos/{toko}/menus', [MenuController::class, 'store'])->name('admin.menus.store');
    Route::get('/admin/menus/{menu}/edit', [MenuController::class, 'edit'])->name('admin.menus.edit');
    Route::put('/admin/menus/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');
    Route::delete('/admin/menus/{menu}', action: [MenuController::class, 'destroy'])->name('admin.menus.destroy');
});

Route::get('/beranda', function () {
    $tokos = Toko::take(3)->get();
    return view('pages.beranda', compact('tokos'));
})->name('beranda');

Route::view('about', 'pages.about')
    ->name('about');

Route::get('/toko', [TokoController::class, 'index'])->name('toko');
Route::get('/toko/{id}', [TokoController::class, 'show'])->name('toko.detail');
Route::get('/belanja', [MenuController::class, 'index'])->name('belanja');


Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';
