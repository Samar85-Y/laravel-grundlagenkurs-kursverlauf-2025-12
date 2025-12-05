
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('CSS/style.css')}}">

    <title>@yield('title', 'Campusmanager')</title>
</head>
<body>
    <div class="page">
    
    <header class="page-header">
        <h1 class="page-title">Campusmanager</h1>
        <nav class="page-nav">
            
            <a href="{{ route('home') }}">Start</a>
            <a href="{{ route('students.index') }}">Studenten</a>
            <a href="{{ route('about') }}">Über uns</a>
             <a href="{{ route('courses.index') }}">Kurse</a>
            <a href="{{ route('students.filter') }}">Filter</a>


        </nav>
    </header>

    <main>
        <div class ="card"> @yield('content')
    </main>
    </div>
    <footer clas="page-footer">
        <hr>
        <small>@ {{ date('Y')}} Campusmanager</small>
    </footer>
    </div>
</body>
</html>