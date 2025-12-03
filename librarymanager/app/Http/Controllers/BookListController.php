<?php

namespace App\Http\Controllers;

use App\Models\Book;

class BookListController extends Controller
{
    public function index()
    {
        $books = Book::orderBy('title')->get();

        return view('books.index', compact('books'));
    }
}
