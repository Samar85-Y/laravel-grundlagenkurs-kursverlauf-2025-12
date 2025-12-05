<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title', 'LibraryManager')</title>
</head>
<body>
    <div class="page">
        <header class="page-header">
            <h1 class="page-title">LibraryManager</h1>
            <nav class="page-nav">
                <a href="{{ route('home') }}">Start</a>
                <a href="{{ route('books.index') }}">Books</a>
                <a href="{{ route('books.filter') }}">Suchen</a>
            </nav>
        </header>

        <main>
            <div class="card">
                @yield('content')
            </div>
        </main>

        <footer class="page-footer">
            <hr>
            <small>&copy; {{ date('Y') }} LibraryManager</small>
        </footer>
    </div>
</body>
</html>
