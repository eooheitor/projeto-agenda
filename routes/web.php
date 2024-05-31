<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AgendamentoController;

Route::get('/', function () {
    return redirect()->route('agenda');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/agenda', function () {
    return view('agenda');
})->middleware(['auth', 'verified'])->name('agenda');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/agenda', [AgendaController::class, 'store'])->name('agenda.store');
});

Route::get('/agendamentos', [AgendamentoController::class, 'index'])->middleware(['auth', 'verified'])->name('agendamentos');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
