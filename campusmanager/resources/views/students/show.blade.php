@extends('layouts.app')

@section('title', 'Startseite')

@section('content')
    <h2>Infos über {{ $student->firstname }} {{ $student->lastname }}</h2>    

    <x-flash />
    
      <p>
        Matrikelnummer: <strong>{{ $student->matriculation_number }}</strong><br>
        E-Mail-Adresse: <strong>{{ $student->email }}</strong><br>
        Alter: <strong>{{ $student->age }}</strong><br>
        angelegt am: <strong>{{ $student->created_at }}</strong><br>
        geändert am: <strong>{{ $student->updated_at }}</strong><br>
      </p>
      <p>
        {{ $student->firstname }} {{ $student->lastname }}:<br>
        <a class="btn btn-primary" href="/students/{{ $student->id }}/edit">ändern</a>
        <form action="/students/{{ $student->id }}" method="post">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Löschen</button>
        </form>
      </p>
    
@endsection