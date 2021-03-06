<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Document Manager</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

<main>
    @yield('content')
</main>
<footer class="footer text-center ">
    <div class="container footer-text">
        <span class="text-muted ">EdgarsJ @ 2020</span>
    </div>
</footer>
</body>
</html>
