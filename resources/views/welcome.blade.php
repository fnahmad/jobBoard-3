<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/landing.css') }}">
    <script src="{{ asset('js/landing.js') }}" defer></script>
</head>

<body>
    <header class="header"></header>
</body>

</html>
<div class="home">
    <div class="home__bg">
        <div class="home__bg__gradient"></div>
        <div class="home__bg__angle"></div>
    </div>
    <div class="home__mockup"><img class="home__mockup__image" src="image/homeMock.png" alt=""></div>
    <div class="home__content">
        <p class="homeContent__text">Rejoins {{ config('app.name') }} et travaillons ensemble pour<span class="homeContent__effectWrapper"><span class="homeContent__effectMover"><span class="homeContent__effectWrapper__content">créer</span><span class="homeContent__effectWrapper__content">innover</span><span class="homeContent__effectWrapper__content">toi</span><span class="homeContent__effectWrapper__content">nous</span></span>
            </span>
        </p>
    <div class="home__buttonContainer"><a class="home__buttonContainer__sign" href="{{ route('register') }}">Inscris toi</a><a class="home__buttonContainer__log" href="{{ route('login') }}"> Connecte toi</a></div>
    </div>
</div>
<footer class="footer"></footer>