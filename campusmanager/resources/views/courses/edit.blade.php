@extends('layouts.app')

@section('title', 'Kurs bearbeiten')

@section('content')
    <h2>Kurs bearbeiten</h2>

    <x-flash />
    
    <form action="{{ route('courses.update', $course) }}" method="post" novalidate>
        @csrf
        @method('PUT')

        <div class="form-row cols-2">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}">
                @error('name')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="shortname">Kurzname:</label>
                <input type="text" name="shortname" id="shortname" value="{{ old('shortname', $course->shortname) }}">
                @error('shortname')
                    <span class="form-error">{!! __($message) !!}</span>
                @enderror
            </div>
        </div>

        <div class="form-row cols-2">
            <div class="form-group">
                <label for="etcs">ECTS:</label>
                <input type="number" name="ects" id="ects" min="2" max="10" value="{{ old('ects', $course->ects) }}">
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