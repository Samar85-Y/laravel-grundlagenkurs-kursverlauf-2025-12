@extends('layout.app')
@section('title', 'Bücherliste')
@section('content')
<h1>{{ $book->title ?? 'Kein Titel vorhanden' }}</h1>


    <ul>
        <li><strong>Autor:</strong> {{ $book->author }}</li>
        <li><strong>ISBN:</strong> {{ $book->isbn }}</li>
        <li><strong>Erscheinungsjahr:</strong> {{ $book->published_year }}</li>
        <li><strong>Kategorie:</strong> {{ $book->category }}</li>
    </ul>

    <a href="{{ route('books.index') }}">Zurück zur Liste</a> |
    <a href="{{ route('books.edit', $book) }}">Bearbeiten</a>
    @endsection
