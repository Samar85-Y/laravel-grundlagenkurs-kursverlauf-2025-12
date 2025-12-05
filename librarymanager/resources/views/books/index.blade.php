@extends('layout.app')

@section('title', 'Bücherliste')

@section('content')

<h2>Bücherliste</h2>

{{-- SEARCH FORM --}}
<form action="{{ route('books.filter') }}" method="GET">
    <input type="text" name="q" placeholder="Suche nach Titel oder Autor" value="{{ $q ?? '' }}">
    <button type="submit">Suchen</button>
</form>

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
                <a href="{{ route('books.edit', $b) }}">Bearbeiten</a><br>

                <form action="{{ route('books.destroy', $b) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Löschen</button><br>
                    <a class="btn btn-primary" href="{{ route('books.show', $b) }}">Anzeigen</a><br>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif

@endsection
