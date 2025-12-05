<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Models\Book;

class BookController extends Controller
{
   public function index()
{
    //generiert eine DB-Abfrage z.B. SELECT 'FROM students ORDER BY lastname
        $books = Book::orderBy('title')->get();

        return view('books.index', [
            'books'=> $books, 
        ]);
}
        public function create(){
            return view('books.create');
        }

        public function store( StoreBookRequest $request ){
        $book = Book::create($request->validated());

        return redirect()
            ->route('books.index')
            ->with('success', 'Buch wurde angelegt');
    }
    
    public function show(Book $book)
{
    return view('books.show', compact('book'));
}

    
    public function edit(Book $book){
        return view('books.edit', [
            'book' => $book,
        ]);
    }
    
    public function update( Request $request , Book $book ){
            $data = $request->validate([
            'title' => ['required', 'string', 'min:3'],
            'author' => ['required', 'string', 'min:3'],
            'isbn' => ['required', 'string', 'size:13', 'unique:books,isbn,' . $book->id],
            'published_year' => ['nullable', 'integer', 'between:1900,' . date('Y')],
            'category' => ['nullable', 'string'],
        ]);


        $book->update($data);

        return redirect()
            ->route('books.index')
            ->with('success', 'Buch wurde erfolgreich geändert.');
    }
    
    public function destroy(Book $book){

        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Das Buch wurde gelöscht');
    }

    public function filter(Request $request)
{
    $query = Book::query();

    if ($request->filled('q')) {
        $q = $request->input('q');

        $query->where(function ($sub) use ($q) {
            $sub->where('title', 'like', '%' . $q . '%')
                ->orWhere('author', 'like', '%' . $q . '%');
        });
    }

    $books = $query->orderBy('title')->paginate(5)->withQueryString();

    return view('books.index', [
        'books' => $books,
        'q' => $request->input('q'),
        'headline' => 'LibraryManager – Bücherliste',
    ]);
}

}