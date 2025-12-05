@extends('layout.app')

@section('title', 'Buch filtern')

@section('content')

<h2>{{ $headline }}</h2>

<form action="{{ route('books.filter') }}" method="GET">
    <input type="text" name="q" placeholder="Suche nach Titel oder Autor" value="{{ $q ?? '' }}">
    <button type="submit">Suchen</button>
</form>

<ul>
    @foreach ($books as $book)
        <li>
            {{ $book->title }} – {{ $book->author }} 
            @if($book->year)
                ({{ $book->year }})
            @endif
        </li>
    @endforeach
</ul>

<div>
    {{ $books->links() }}
</div>

@endsection
