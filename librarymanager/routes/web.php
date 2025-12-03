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


Route::get('/books/create', [BookController::class, 'index'])->name('books.index');

Route::get('/books/create', function () {
    return 'Create Form kommt später';
})->name('books.create');


//use App\Http\Controllers\PhotoController;
 
//Route::resource('photos', PhotoController::class);