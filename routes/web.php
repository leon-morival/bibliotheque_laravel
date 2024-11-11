<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/borrowed-books', [BorrowController::class, 'index'])->name('profile.borrowed-books');
});
// Affichage et ajout de livres
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store'); 
Route::delete('/books/{book}', [BookController::class, 'destroy'])
    ->name('books.destroy')
    ->middleware(['auth']);  

// emprunt de livres
Route::post('/books/{book}/borrow', [BorrowController::class, 'borrow'])
    ->name('borrow.book')
    ->middleware('auth');  
Route::put('/borrows/{borrow}/return', [BorrowController::class, 'returnBook'])->name('borrow.return');

// Routes pour afficher et gérer les utilisateurs
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::patch('/users/{user}/update-role', [UserController::class, 'updateRole'])->name('users.updateRole');
});
// Route pour supprimer un utilisateur
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
