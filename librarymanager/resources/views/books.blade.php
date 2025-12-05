@extends('layout.app')

@section('title', 'Bücherliste')

@section('content')
<h2>{{ $headline }}</h2>

    <form action="/books" method="GET" style="margin-bottom: 20px;">
        <input
            type="text"
            name="q"
            placeholder="Suche nach Titel oder Autor"
            value="{{ $q ?? '' }}"
        >
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
