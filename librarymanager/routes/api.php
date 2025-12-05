<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookListController;

use App\Http\Controllers\BookApiController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [BookApiController::class, 'index'])->name('home');


Route::get('/api/books', [BookLiBookApiController::class, 'index'])->name('books.index');

Route::get('/api/books/{book}', [BookApiController::class, 'show'])
    ->name('books.show');

Route::post('/api/books', [BookApiController::class, 'store'])
    ->name('books.store');

Route::put('/api/students/{book}', [BookApiController::class, 'update'])
    ->name('books.update');


Route::delete('/api/books/{book}', [BookApiController::class, 'destroy'])
    ->name('books.destroy');




    
Route::get('/api/books/create', [BookApiController::class, 'create'])->name('books.create');


Route::get('/api/books/{book}/edit', [BookApiController::class, 'edit'])
    ->name('books.edit');




