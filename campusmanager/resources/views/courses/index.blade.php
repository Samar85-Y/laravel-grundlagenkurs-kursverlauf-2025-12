@extends('layouts.app')

@section('title', 'Kursliste')

@section('content')

    <h2>Kursliste</h2>

    <x-flash />

    <p><a href="{{ route('courses.create') }}">Neuen Kurs anlegen</a></p>

    @if($courses->isEmpty())
        <p>Es sind noch keine Kurs vorhanden.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Bezeichnung</th>
                    <th>Kurzname</th>
                    <th>ECTS</th>
                    <th>Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $c)
                    <tr>
                        <td>{{ $c->id }}</td>
                        <td>{{ $c->name }}</td>
                        <td>{{ $c->shortname }}</td>
                        <td>{{ $c->ects }}</td>
                        <td>
                            <p>
                                <a class="btn btn-primary" href="{{ route('courses.edit', $c) }}">Bearbeiten</a>
                            </p>
                            <form action="{{ route('courses.destroy', $c) }}" method="post">
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