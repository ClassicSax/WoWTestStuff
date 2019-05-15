<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'WoW test')</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <style>
        .is-complete {
            text-decoration: line-through;
        }
    </style>
</head>
<body>
<ul>
    <li>
        <a href="/">
            Home
        </a>
    </li>
    <li>
        <a href="/about">
            About us
        </a>
    </li>
    <li>
        <a href="/contact">
            Contact
        </a>
    </li>
</ul>
<hr>
<div class="container">
    @yield('content')
</div>
<hr>
</body>
</html>
