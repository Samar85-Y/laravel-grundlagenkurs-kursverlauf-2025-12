<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
{
    $headline = 'Wilkommen zu Librarymanager';
    
    return view('books');
}
}
