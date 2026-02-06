<!doctype html>
<html lang="hr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Studiranje')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<header class="site-header">
    <div class="container header-inner">
        <a class="logo" href="{{ route('home') }}">Studiranje</a>

        <nav class="nav">
            <a href="{{ route('home') }}" class="nav-link">Početna</a>
            <a href="{{ route('studenti.index') }}" class="nav-link">Studenti</a>
            <a href="{{ route('fakulteti.index') }}" class="nav-link">Fakulteti</a>
        </nav>
    </div>
</header>

<main class="site-main">
    <div class="container">
        <h1 class="page-title">@yield('page_title')</h1>

        <div class="card">
            @yield('content')
        </div>
    </div>
</main>

<footer class="site-footer">
    <div class="container footer-inner">
        <span>© {{ date('Y') }} Parcijalni ispit</span>
        <span>Laravel 10</span>
    </div>
</footer>

</body>
</html>
