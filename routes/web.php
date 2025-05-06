<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\AuteurController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 'Livres' CRUD
    Route::get('/livres', [LivreController::class, 'index'])->name('livres.index');
    Route::get('/livres/create', [LivreController::class, 'create'])->name('livres.create');
    Route::post('/livres', [LivreController::class, 'store'])->name('livres.store');

    // 'Auteurs' CRUD
    Route::get('/auteurs/search', [AuteurController::class, 'search'])->name('auteurs.search');
    Route::get('/auteurs', [AuteurController::class, 'index'])->name('auteurs.index');
    Route::get('/auteurs/create', [AuteurController::class, 'create'])->name('auteurs.create');
    Route::post('/auteurs', [AuteurController::class, 'store'])->name('auteurs.store');
});

require __DIR__.'/auth.php';
