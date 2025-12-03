@extends('layout.app')

@section('title', 'Bücherliste')

@section('content')

<h2>Bücherliste</h2>
<p><a href="{{ route('books.create') }}">Neuen Buch anlegen</a></p>

@if($books->isEmpty())

    <p>Es sind noch keine Buch vorhanden.</p>
    @else
    
<table>
    <thead>
        <tr>
            <th>#</th>
            <th>title</th>
            <th>author</th>
            <th>isbn</th>
            <th>published_year</th>
            <th>category</th>
            <th>Aktion</th>
        </tr>
    </thead>
    <tbody>
       @foreach ($books as $b)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $b->title }}</td>
            <td>{{ $b->author }}</td>
            <td>{{ $b->isbn }}</td>
            <td>{{ $b->published_year }}</td>
            <td>{{ $b->category ?? '-' }}</td>
            <td>
                <a href="/books/{{ $b->id }}/edit">Bearbeiten</a>
                    <form action="/books/{{ $b->id }}" method="post">
                         @csrf
                         @method('DELETE')
                            <input type="hidden" name="book" value="{{ $b->id }}">
                            <button type="submit">Löschen</button>
                    </form>
            </td>
        </tr>
        @endforeach

    </tbody>
</table>
@endif

@endsection