<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Book;

class BookController extends Controller
{
   public function index(){
        //generiert eine DB-Abfrage z.B. SELECT 'FROM students ORDER BY lastname
        $books = Book::orderBy('title')->get();

        return view('books.index', [
            'books'=> $books, 
        ]);
    
}
        public function create(){
            return view('books.create');
}
}