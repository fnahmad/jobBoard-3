@extends('layouts.app')

@section('content')

<div class="text-wrapper">
    <div class="title" data-content="404">
        404
    </div>

    <div class="subtitle" data-content="Oops, the page you're looking for doesn't exist">
        Oops, the page you're looking for doesn't exist.
    </div>

    <div class="buttons">
        <a class="button" href="/">Go to homepage</a>
    </div>
</div>

@endsection

@section('css')
<style>
  body {
  background-size: cover;
  font-family: 'Raleway', sans-serif;
  background-color: #342643;
  height: 100%;
}

.text-wrapper {
  height: 100vh;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}

.title {
  font-size: 9em;
  font-weight: 700;
  color: white;
  position: relative;
}

.subtitle {
  font-size: 40px;
  font-weight: 700;
  color: white;
  position: relative;
}

.buttons {
  margin: 30px;
}
.buttons a.button {
  background-color: #342643;
  font-weight: 700;
  border: 2px solid white;
  text-decoration: none;
  padding: 15px;
  text-transform: uppercase;
  color: white;
  border-radius: 26px;
  transition: all 0.2s ease-in-out;
}
.buttons a.button:hover {
  background-color: #4d3864;
  color: white;
  transition: all 0.2s ease-in-out;
}

@-webkit-keyframes noise-anim {
  0% {
    clip: rect(25px, 9999px, 133px, 0);
  }
  5% {
    clip: rect(53px, 9999px, 111px, 0);
  }
  10% {
    clip: rect(183px, 9999px, 187px, 0);
  }
  15% {
    clip: rect(135px, 9999px, 98px, 0);
  }
  20% {
    clip: rect(112px, 9999px, 133px, 0);
  }
  25% {
    clip: rect(86px, 9999px, 123px, 0);
  }
  30% {
    clip: rect(98px, 9999px, 49px, 0);
  }
  35% {
    clip: rect(115px, 9999px, 76px, 0);
  }
  40% {
    clip: rect(47px, 9999px, 149px, 0);
  }
  45% {
    clip: rect(46px, 9999px, 88px, 0);
  }
  50% {
    clip: rect(110px, 9999px, 15px, 0);
  }
  55% {
    clip: rect(129px, 9999px, 118px, 0);
  }
  60% {
    clip: rect(120px, 9999px, 132px, 0);
  }
  65% {
    clip: rect(58px, 9999px, 79px, 0);
  }
  70% {
    clip: rect(110px, 9999px, 11px, 0);
  }
  75% {
    clip: rect(133px, 9999px, 24px, 0);
  }
  80% {
    clip: rect(162px, 9999px, 96px, 0);
  }
  85% {
    clip: rect(48px, 9999px, 194px, 0);
  }
  90% {
    clip: rect(121px, 9999px, 121px, 0);
  }
  95% {
    clip: rect(162px, 9999px, 21px, 0);
  }
  100% {
    clip: rect(26px, 9999px, 132px, 0);
  }
}

@keyframes noise-anim {
  0% {
    clip: rect(25px, 9999px, 133px, 0);
  }
  5% {
    clip: rect(53px, 9999px, 111px, 0);
  }
  10% {
    clip: rect(183px, 9999px, 187px, 0);
  }
  15% {
    clip: rect(135px, 9999px, 98px, 0);
  }
  20% {
    clip: rect(112px, 9999px, 133px, 0);
  }
  25% {
    clip: rect(86px, 9999px, 123px, 0);
  }
  30% {
    clip: rect(98px, 9999px, 49px, 0);
  }
  35% {
    clip: rect(115px, 9999px, 76px, 0);
  }
  40% {
    clip: rect(47px, 9999px, 149px, 0);
  }
  45% {
    clip: rect(46px, 9999px, 88px, 0);
  }
  50% {
    clip: rect(110px, 9999px, 15px, 0);
  }
  55% {
    clip: rect(129px, 9999px, 118px, 0);
  }
  60% {
    clip: rect(120px, 9999px, 132px, 0);
  }
  65% {
    clip: rect(58px, 9999px, 79px, 0);
  }
  70% {
    clip: rect(110px, 9999px, 11px, 0);
  }
  75% {
    clip: rect(133px, 9999px, 24px, 0);
  }
  80% {
    clip: rect(162px, 9999px, 96px, 0);
  }
  85% {
    clip: rect(48px, 9999px, 194px, 0);
  }
  90% {
    clip: rect(121px, 9999px, 121px, 0);
  }
  95% {
    clip: rect(162px, 9999px, 21px, 0);
  }
  100% {
    clip: rect(26px, 9999px, 132px, 0);
  }
}
.subtitle:after, .title:after {
  content: attr(data-content);
  position: absolute;
  left: 2px;
  text-shadow: -1px 0 red;
  top: 0;
  color: white;
  overflow: hidden;
  clip: rect(0, 900px, 0, 0);
  animation: noise-anim 2s infinite linear alternate-reverse;
}

@-webkit-keyframes noise-anim-2 {
  0% {
    clip: rect(196px, 9999px, 11px, 0);
  }
  5% {
    clip: rect(137px, 9999px, 52px, 0);
  }
  10% {
    clip: rect(69px, 9999px, 134px, 0);
  }
  15% {
    clip: rect(183px, 9999px, 108px, 0);
  }
  20% {
    clip: rect(85px, 9999px, 87px, 0);
  }
  25% {
    clip: rect(93px, 9999px, 28px, 0);
  }
  30% {
    clip: rect(138px, 9999px, 95px, 0);
  }
  35% {
    clip: rect(139px, 9999px, 110px, 0);
  }
  40% {
    clip: rect(137px, 9999px, 149px, 0);
  }
  45% {
    clip: rect(103px, 9999px, 118px, 0);
  }
  50% {
    clip: rect(119px, 9999px, 168px, 0);
  }
  55% {
    clip: rect(60px, 9999px, 63px, 0);
  }
  60% {
    clip: rect(44px, 9999px, 40px, 0);
  }
  65% {
    clip: rect(83px, 9999px, 149px, 0);
  }
  70% {
    clip: rect(138px, 9999px, 15px, 0);
  }
  75% {
    clip: rect(43px, 9999px, 20px, 0);
  }
  80% {
    clip: rect(122px, 9999px, 153px, 0);
  }
  85% {
    clip: rect(52px, 9999px, 160px, 0);
  }
  90% {
    clip: rect(17px, 9999px, 39px, 0);
  }
  95% {
    clip: rect(168px, 9999px, 6px, 0);
  }
  100% {
    clip: rect(50px, 9999px, 95px, 0);
  }
}

@keyframes noise-anim-2 {
  0% {
    clip: rect(196px, 9999px, 11px, 0);
  }
  5% {
    clip: rect(137px, 9999px, 52px, 0);
  }
  10% {
    clip: rect(69px, 9999px, 134px, 0);
  }
  15% {
    clip: rect(183px, 9999px, 108px, 0);
  }
  20% {
    clip: rect(85px, 9999px, 87px, 0);
  }
  25% {
    clip: rect(93px, 9999px, 28px, 0);
  }
  30% {
    clip: rect(138px, 9999px, 95px, 0);
  }
  35% {
    clip: rect(139px, 9999px, 110px, 0);
  }
  40% {
    clip: rect(137px, 9999px, 149px, 0);
  }
  45% {
    clip: rect(103px, 9999px, 118px, 0);
  }
  50% {
    clip: rect(119px, 9999px, 168px, 0);
  }
  55% {
    clip: rect(60px, 9999px, 63px, 0);
  }
  60% {
    clip: rect(44px, 9999px, 40px, 0);
  }
  65% {
    clip: rect(83px, 9999px, 149px, 0);
  }
  70% {
    clip: rect(138px, 9999px, 15px, 0);
  }
  75% {
    clip: rect(43px, 9999px, 20px, 0);
  }
  80% {
    clip: rect(122px, 9999px, 153px, 0);
  }
  85% {
    clip: rect(52px, 9999px, 160px, 0);
  }
  90% {
    clip: rect(17px, 9999px, 39px, 0);
  }
  95% {
    clip: rect(168px, 9999px, 6px, 0);
  }
  100% {
    clip: rect(50px, 9999px, 95px, 0);
  }
}
.subtitle:before, .title:before {
  content: attr(data-content);
  position: absolute;
  left: -2px;
  text-shadow: 1px 0 blue;
  top: 0;
  color: white;
  overflow: hidden;
  clip: rect(0, 900px, 0, 0);
  animation: noise-anim-2 3s infinite linear alternate-reverse;
}

</style>
@endsection