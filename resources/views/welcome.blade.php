<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    </head>
    <body>
    <h1>Welcome</h1>
    @guest
    <a href="{{ route('login') }}">Login</a>
    <a href="{{ route('register') }}">Register</a>
    @else
    <a href="{{ route('works.index') }}">Offres</a>
    @endif
    </body>
</html>
