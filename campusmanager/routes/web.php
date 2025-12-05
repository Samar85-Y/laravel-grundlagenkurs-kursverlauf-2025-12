<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\CoursesController;

// Erste Beispiele
Route::get('/', function () {
    return view('welcome');
});

// Beispiel ohne View
Route::get('/hello', function(){
    return 'Hallo Laravel!';
});

// Routen für das Projekt
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [HomeController::class, 'about'])->name('about');

// REST-Routen für Studenten
/* Route::get('/students', [StudentsController::class, 'index'])
    ->name('students.index');

Route::get('/students/create', [StudentsController::class, 'create'])
    ->name('students.create');

Route::post('/students', [StudentsController::class, 'store'])
    ->name('students.store');

Route::get('/students/{student}', [StudentsController::class, 'show'])
    ->name('students.show');

Route::get('/students/{student}/edit', [StudentsController::class, 'edit'])
    ->name('students.edit');

Route::put('/students/{student}', [StudentsController::class, 'update'])
    ->name('students.update');

Route::delete('/students/{student}', [StudentsController::class, 'destroy'])
    ->name('students.destroy'); */

   Route::get('/students/filter', [StudentsController::class, 'filter'])
    ->name('students.filter');


Route::resource('students', StudentsController::class);

Route::resource('courses', CoursesController::class)->except(['show']);