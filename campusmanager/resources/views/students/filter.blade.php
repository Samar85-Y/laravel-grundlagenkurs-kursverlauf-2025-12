@extends('layouts.app')

@section('title', 'Student filtern')

@section('content')

<h2>Nach Kurs filtern</h2>


        
            <!--<option value="">-- Bitte Kurs auswählen --</option>

            <option value="PHP-Grundlagen" {{ request('course') == 'PHP-Grundlagen' ? 'selected' : '' }}>PHP-Grundlagen</option>
            <option value="Web Development mit JavaScript" {{ request('course') == 'WebDevelopment-1' ? 'selected' : '' }}>Web Development mit JavaScrip</option>
            <option value="Web Development mit HTML und CSS" {{ request('course') == 'WebDevelopment-2' ? 'selected' : '' }}>Web Development mit HTML und CSS</option>
            <option value="Frontend Development" {{ request('course') == 'FrontendDevelopment' ? 'selected' : '' }}>Frontend Development</option>
            -->

<form action="{{ route('students.filter') }}" method="GET">
    <label for="course_id">Kurs auswählen:</label>
    <select name="course_id" id="course_id" required>
        <option value="">-- Bitte Kurs auswählen --</option>
        @foreach($courses as $course)
            <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                {{ $course->name }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-primary">Filtern</button>
</form>

<hr>

<h3>Gefilterte Studierende:</h3>

<ul>
    @forelse ($students as $student)
        <li>
            <strong>{{ $student->firstname }} {{ $student->lastname }}</strong><br>
            – Hauptkurs: {{ $student->mainCourse->name ?? 'Nicht zugewiesen' }}<br>
            – Belegte Kurse: 
            {{ $student->courses->pluck('name')->join(', ') ?: 'Keine Kurse' }}
        </li>
    @empty
        <li>Keine Studierenden gefunden.</li>
    @endforelse
</ul>

@endsection
