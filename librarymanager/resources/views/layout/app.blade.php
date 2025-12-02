
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <title>@yield('title', 'Librarymanager')</title>
</head>
<body>
    <div class="page">
    
    <header class="page-header">
        <h1 class="page-title">Librarymanager</h1>
        <nav class="page-nav">
            
            <a href="{{ route('home') }}">Start</a>
            <a href="{{ route('books.index') }}">Books</a>
            
        </nav>
    </header>

    <main>
        <div class ="card"> @yield('content')
    </main>
    </div>
    <footer clas="page-footer">
        <hr>
        <small>@ {{ date('Y')}} Librarymanager</small>
    </footer>
    </div>
</body>
</html>