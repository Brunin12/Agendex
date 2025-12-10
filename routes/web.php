<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\AppointmentsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    // CLIENTES

    Route::get('/clientes', [ClientsController::class, 'index'])->name('clients');

    Route::get('/clientes/novo', [ClientsController::class, 'create'])->name('clients.register');
    Route::post('/clientes/salvar', [ClientsController::class, 'store'])->name('clients.store');

    Route::get('/clientes/{client}/editar', [ClientsController::class, 'edit'])->name('clients.edit');
    Route::put('/clientes/{client}', [ClientsController::class, 'update'])->name('clients.update');

    // SERVIÇOS

    Route::get('/servicos', [ServicesController::class, 'index'])->name('services');

    Route::get('/servicos/novo', [ServicesController::class, 'create'])->name('services.register');
    Route::post('/servicos/salvar', [ServicesController::class, 'store'])->name('services.store');

    Route::get('/servicos/{service}/editar', [ServicesController::class, 'edit'])->name('services.edit');
    Route::put('/servicos/{service}', [ServicesController::class, 'update'])->name('services.update');

    // Agendamentos

    Route::get('/agendamentos', [AppointmentsController::class, 'index'])->name('appointments');
    Route::get('/agendamentos/hoje', [AppointmentsController::class, 'today'])->name('appointments.today');

    Route::get('/agendamentos/novo', [AppointmentsController::class, 'create'])->name('appointments.register');
    Route::post('/agendamentos/salvar', [AppointmentsController::class, 'store'])->name('appointments.store');

    Route::get('/agendamentos/{appointment}/editar', [AppointmentsController::class, 'edit'])->name('appointments.edit');
    Route::put('/agendamentos/{appointment}', [AppointmentsController::class, 'update'])->name('appointments.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
