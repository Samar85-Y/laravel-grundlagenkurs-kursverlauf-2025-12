@extends('layouts.app')

@section('title', 'Startseite')

@section('content')
    <h2>Infos über {{ $student->firstname }} {{ $student->lastname }}</h2>

    <x-flash />

    <div class="form-row cols-2">
        <div>
            <h3>Persönliche Daten</h3>
            <p>
                Matrikelnummer: <strong>{{ $student->matriculation_number }}</strong><br>
                E-Mail-Adresse: <strong>{{ $student->email }}</strong><br>
                Alter: <strong>{{ $student->age }}</strong><br>
                angelegt am: <strong>{{ $student->created_at }}</strong><br>
                geändert am: <strong>{{ $student->updated_at }}</strong><br>
            </p>
        </div>
        <div>
            <h3>Belegte Kurse</h3>
            <p><strong>Hauptkurs:</strong> {{ $student->mainCourse?->name }}</p>
            <p>
                <strong>Alle Kurse:</strong><br>
                {{-- {{ $student->courses->pluck('shortname')->join(', ') }} --}}
                @foreach ($student->courses as $course)
                    <span class="badge">{{ $course->shortname }}</span>
                @endforeach
            </p>
        </div>
        
        <div>
            <h3>Anzahl Studierender im gleichen Haputkurses:</h3>
            <p>
                <strong>{{ $student->mainCourse?->students->count() ?? 0 }}</strong> Studierenden belegt denselben Haputkurs: <br>
                <strong>{{ $student->mainCourse?->name }}</strong>
            </p>
        </div>
           
        <div>
             <h3>Statistikblock</h3>
            <p>
                <strong>Anzahl aller belegter Kurse:</strong> {{ $student->courses->count() }}
            </p>
            @if(!$student->mainCourse)
            <p>
              Es ist kein Hauptkurs hinterlegt!
            </p>
            @endif
           
        </div>
        <p>
            {{ $student->firstname }} {{ $student->lastname }}:<br>
            <a class="btn btn-primary" href="{{ route('students.edit', $student) }}">ändern</a>
        <form action="{{ route('students.destroy', $student) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Löschen</button>
        </form>
        </p>

@endsection