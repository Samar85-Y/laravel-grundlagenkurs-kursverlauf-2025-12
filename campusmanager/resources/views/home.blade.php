@extends('layouts.app')

@section('title', 'Startseite')

@section('content')
<h2>{{ $headline }}</h2>
<p>Heutiges Datum: {{ $heute}}</p>
<p>Dies ist die erste Seite deines Laravel-Projekts.</p>
@endsection

