<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\UserController;

// Page d'accueil - Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');  // Enforcer la connexion

// Dashboard - accessible seulement si l'utilisateur est connecté
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Toutes les routes suivantes seront accessibles uniquement si l'utilisateur est authentifié

Route::middleware('auth')->group(function () {
    // Routes utilisateur
    Route::get('/profile/borrowed-books', [BorrowController::class, 'index'])->name('profile.borrowed-books');

    // Affichage et gestion des livres
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::patch('/books/{book}', [BookController::class, 'update'])->name('books.update');

    // Emprunt et retour de livres
    Route::post('/books/{book}/borrow', [BorrowController::class, 'borrow'])->name('borrow.book');
    Route::put('/borrows/{borrow}/return', [BorrowController::class, 'returnBook'])->name('borrow.return');

    // Gestion des utilisateurs (si vous êtes admin par exemple)
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    // Routes pour le profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclusion des routes d'authentification Laravel
require __DIR__.'/auth.php';
