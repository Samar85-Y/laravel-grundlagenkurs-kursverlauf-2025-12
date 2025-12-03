@extends('layout.app')

@section('title', 'Buch bearbeiten')

@section('content')
    <h2>Buch bearbeiten</h2>

    @if ($errors->any())
        <div class="form-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! __($error) !!}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="/books/{{ $book->id }}" method="post" novalidate>
        @csrf
        @method('PUT')

        <div class="form-row cols-2">
            <div class="form-group">
                <label for="firstname">Title:</label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title) }}">
                @error('title')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" name="author" id="author" value="{{ old('author', $book->author) }}">
                @error('author')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
        </div>

        <div class="form-row email-age-mat">
            <div class="form-group">
                <label for="isbn">ISBN:</label>
                <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn) }}">
                @error('isbn')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            
            
            <div class="form-group">
                <label for="published_year">Erscheinungsjahr:</label>
                <input type="number" name="published_year" id="published_year" value="{{ old('published_year', $book->published_year) }}">
                @error('published_year')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Kategorie:</label>
                <input type="text" name="category" id="category" value="{{ old('category', $book->category) }}">
                @error('category')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>

        </div>

        <button type="submit">Speichern</button>
    </form>
@endsection