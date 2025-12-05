<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookListController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/books', [BookListController::class, 'index'])->name('books.index');


Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

Route::post('/books', [BookListController::class, 'store'])
    ->name('books.store');

Route::get('/books/{book}', [BookListController::class, 'show'])
    ->name('books.show');

Route::get('/books/{book}/edit', [BookListController::class, 'edit'])
    ->name('books.edit');

Route::put('/books/{book}', [BookListController::class, 'update'])
    ->name('books.update');

Route::delete('/books/{book}', [BookListController::class, 'destroy'])
    ->name('books.destroy');


Route::get('/books/filter', [BookController::class, 'filter'])
    ->name('books.filter');


Route::resource('books', BookController::class);