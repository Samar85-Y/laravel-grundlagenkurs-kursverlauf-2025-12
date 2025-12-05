<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;

class BookApiController extends Controller
{
   public function index(){
        $books = Book::all();

        return response()->json([
            'success' => true,
            'data' => $books
        ]);

   }

   public function show(Book $book){

            return response()->json([
                'success' =>true,
                'data' =>$book
    ]);


   }

  public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'year' => 'nullable|integer',
        ]);

        $book = Book::create($validated);

        return response()->json([
            'success' => true,
            'data' => $book
        ], 201); // 201 = Created
    }


 // Buch aktualisieren
    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|string',
            'author' => 'sometimes|required|string',
            'year' => 'nullable|integer',
        ]);

        $book->update($validated);

        return response()->json([
            'success' => true,
            'data' => $book
        ]);
    }
   

   public function destroy(Book $book){

        $book->delete();

        return response()->json([
            'success' => true,
            'data'   => $book
    ]);

   }
}

 
   
