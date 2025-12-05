@extends('layouts.app')

@section('title', 'Studentenliste')

@section('content')

    <h2>Studentenliste</h2>

    <x-flash />

    <p><a href="{{ route('students.create') }}">Neuen Studenten anlegen</a></p>

    @if($students->isEmpty())
        <p>Es sind noch keine Studenten vorhanden.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Vor- und Nachname</th>
                    <th>Hauptkurs</th>
                    <th>Email</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $s)
                    <tr>
                        <td>{{ $s->id }}</td>
                        <td>{{ $s->firstname }} {{ $s->lastname }}</td>
                        <td>
                            <span class="badge">{{ $s->mainCourse?->shortname }}</span>
                        </td>
                        <td>{{ $s->email }}</td>
                        <td>
                            <p>
                                <a class="btn btn-primary" href="{{ route('students.show', $s) }}">Anzeigen</a>
                                <a class="btn btn-primary" href="{{ route('students.edit', $s) }}">Bearbeiten</a>
                            </p>
                            <form action="{{ route('students.destroy', $s) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Löschen</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

@endsection