<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // CLIENTES

    Route::get('/clientes', [ClientsController::class, 'list'])->name('clients');

    Route::get('/clientes/novo', [ClientsController::class, 'register'])->name('clients.register');
    Route::post('/clientes/salvar', [ClientsController::class, 'store'])->name('clients.store');

    Route::get('/clientes/{client}/editar', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/clientes/{client}', [ClientsController::class, 'update'])->name('clients.update');

    // SERVIÇOS

    Route::get('/servicos', [ServicesController::class, 'list'])->name('services');

    Route::get('/servicos/novo', [ServicesController::class, 'register'])->name('services.register');
    Route::post('/servicos/salvar', [ServicesController::class, 'store'])->name('services.store');

    Route::get('/servicos/{service}/editar', [ServicesController::class, 'edit'])->name('services.edit');
    Route::put('/servicos/{service}', [ServicesController::class, 'update'])->name('services.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
