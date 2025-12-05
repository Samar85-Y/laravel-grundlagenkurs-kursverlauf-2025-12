@extends('layouts.app')

@section('title', 'Kurs anlegen')

@section('content')
    <h2>Neuen Kurs anlegen</h2>

    <x-flash />
    
    <form action="{{ route('courses.store') }}" method="post" novalidate>
        @csrf

        <div class="form-row cols-2">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="shortname">Kurzname:</label>
                <input type="text" name="shortname" id="shortname" value="{{ old('shortname') }}">
                @error('shortname')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
        </div>

        <div class="form-row cols-2">
            <div class="form-group">
                <label for="ects">ECTS:</label>
                <input type="number" name="ects" id="ects" min="2" max="10" value="{{ old('ects') }}">
                @error('ects')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
            
            <div class="form-group">
                
            </div>

        </div>

        <button type="submit">Speichern</button>
    </form>
@endsection