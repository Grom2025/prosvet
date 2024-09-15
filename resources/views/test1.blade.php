<!doctype html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Grom FlekBy, and contributors">
    <meta name="generator" content="">
    <meta name="yandex-verification" content="a97a41fb27d00c84" />

    <title>ProSvet
    @if(env('APP_DEBUG', false)) DEBUG @endif
    </title>

    <script src="{{ url('js/jquery-3.7.1.js') }}"></script>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jquery.ui.touch-punch.js') }}"></script>
    <link href="{{ url('js/jquery-ui.css') }}" rel="stylesheet">
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>



    <link rel="stylesheet" href="{{ url('css/flex.css') }}">

    <link rel="stylesheet" href="{{ url('js/magnific-popup.css') }}"/>
    <script src="{{ url('js/isotope.pkgd.js') }}"></script>
    <script src="{{ url('js/jquery.magnific-popup.js') }}"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <style>
        @import url(https://fonts.bunny.net/css?family=fira-sans:200,500|lato:900);

        @font-face {
            font-family: "IgraSans";
            font-style: normal;
            font-weight: 400;
            /* Браузер сначала попробует найти шрифт локально */
            src: local("Roboto"),
                /* Если не получилось, загрузит woff2 */
            url("{{url('/')}}/fonts/IgraSans.woff2") format("woff2"),
                /* Если браузер не поддерживает woff2, загрузит woff */
            url("{{url('/')}}/fonts/IgraSans.woff") format("woff");
        }



        @font-face {
            font-family: "Advent Pro";
            font-style: normal;
            font-weight: 400;
            /* Браузер сначала попробует найти шрифт локально */
            src: local("Roboto"),
                /* Если не получилось, загрузит woff2 */
            url("{{url('/')}}/fonts/AdventPro_Expanded-Bold.woff2") format("woff2"),
                /* Если браузер не поддерживает woff2, загрузит woff */
            url("{{url('/')}}/fonts/AdventPro_Expanded-Bold.woff") format("woff");
        }
        @font-face {
            font-family: "Lato";
            font-style: normal;
            font-weight: 400;
            /* Браузер сначала попробует найти шрифт локально */
            src: local("Roboto"),
                /* Если не получилось, загрузит woff2 */
            url("{{url('/')}}/fonts/Lato-Black.woff2") format("woff2"),
                /* Если браузер не поддерживает woff2, загрузит woff */
            url("{{url('/')}}/fonts/Lato-Black.woff") format("woff");
        }


        navbar-brand {
            font-family: 'Lato', sans-serif;
            font-weight: 900;
        }

        .montserrat-< uniquifier > {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: < weight >;
            font-style: normal;
        }

        body {

            font-family: 'IgraSans';
        }

        :root {
            --P-page: calc(40 * var(--scale-primary, var(--dynamic-X-primary, 1px)));
            --Width-mobile-min: 550;
            --Width-mobile-middle: 350;
            --Width-FullHD: 1920;
        }

        @media (max-width: 350px) {
            :root {
                --scale-primary: .5px;
            }
        }

        @media (max-width: 1920px) {
            :root {
                --dynamic-X-primary: calc(.5px + .5 * ((100vw - var(--Width-mobile-middle) * 1px) / (var(--Width-FullHD) - var(--Width-mobile-middle))));
            }
        }

        .gbutton {
            background-color: rgba(243, 158, 21, 0.75);
            border: #261903 1px solid;
            border-radius: 18px;
            color: black;
            text-decoration: none;
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.5rem);
            padding: .5em;
            margin: .5em;

        }

        .gbutton_n {
            background-color: rgba(255, 255, 255, 0.45);
            border: #261903 1px solid;
            border-radius: 18px;
            color: black;
            text-decoration: none;
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.5rem);
            padding: .5em;
            margin: .5em;

        }


        .g_cornerLT {
            border-top: 0.3em #f39e15 solid;
            border-left: 0.3em #f39e15 solid;
            width: var(--P-page);
            height: var(--P-page);
        }

        .g_cornerRT {
            border-top: 0.3em #f39e15 solid;
            border-right: 0.3em #f39e15 solid;
            width: var(--P-page);
            height: var(--P-page);
        }

        .g_cornerLB {
            border-bottom: 0.3em #f39e15 solid;
            border-left: 0.3em #f39e15 solid;
            width: var(--P-page);
            height: var(--P-page);
        }

        .g_cornerRB {
            border-bottom: 0.3em #f39e15 solid;
            border-right: 0.3em #f39e15 solid;
            width: var(--P-page);
            height: var(--P-page);
        }

        .m_flex_center h1 {
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1.1rem);
        }

        .m_flex_center p {
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.5rem);
        }

        @media (min-width: 432px) {
            .m_flex_center h1 {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1.6rem);
            }

            .m_flex_center p {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.7rem);
            }
        }

        @media (min-width: 568px) {
            .m_flex_center h1 {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1.8rem);
            }

            .m_flex_center p {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.8rem);
            }
        }

        @media (min-width: 960px) {
            .m_flex_center h1 {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 2.5rem);
            }

            .m_flex_center p {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1rem);
            }
        }
        @media (min-width: 1210px) {
            .m_flex_center h1 {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 3rem);
            }

            .m_flex_center p {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1rem);
            }
        }

        #mainHeaderWrapper {
            position: relative;
            background: no-repeat url({{url('img/bgimg.jpg')}}) 50% / 100%;
        }

        #mainHeaderWrapper > img {
            vertical-align: top;
            width: 100%; /* max width */
            opacity: 0; /* make it transparent */
        }

        #mainHeaderWrapper > div {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
        }
        table, th, td {
            border: 0px solid black;
        }
    </style>
</head>
<body class="bg-black">
<header>
    <div id="mainHeaderWrapper" class="m_flex_center">
        <img src="{{url('img/bgimg.jpg')}}"><!-- I'm invisible! -->
        <div>
            <table width="100%" height="100%">
                <tr>
                    <td width="5%">&nbsp;</td>
                    <td align="left" colspan="5"><a class="navbar-brand" style="font-family: 'Lato', sans-serif;"
                                        href="{{ url('/') }}">PRO<span style="
                                        font-size: 180%;
                                        -webkit-text-stroke: 1px black;
                                        color: white;">S</span>VET</a>
                    </td>

                    <td align="right" colspan="2">
                        <div class="btn-group dropstart">
                            <button type="button" class="btn btn-secondary dropdown-toggle bg-dark"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                     class="bi bi-list" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd"
                                          d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                                </svg>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark px-3">
                                <li><a class="dropdown-item active" href="{{ url('/') }}">Главная</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/portfolio' }}">Портфолио</a></li>
                                <li><a class="dropdown-item " href="{{ url('/').'/rental' }}">Оборудование</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/posts' }}">Блог</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/rooles' }}">Правила</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/contact' }}">Забронировать</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/contacts' }}">Контакты</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                                        </li>
                                    @endif

                                    @if (Route::has('register'))
                                        <li class="nav-item">
                                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                                        </li>
                                    @endif
                                @else
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            {{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ url('/').'/basket' }}">Корзина</a></li>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                    <li>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>

                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </td>

                    <td width="5%">&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td align="left">
                        <div class="g_cornerLT"></div>
                    </td>
                    <td align="center" colspan="5"><h1>Искусство освещения</h1></td>
                    <td align="right">
                        <div class="g_cornerRT"></div>
                    </td>

                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center" colspan="5"><p style="margin: 0;" class="montserrat-800">Закажите профессиональное освещение и пространство для
                            ваших событий</p></td>

                    <td align="right">                    </td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left" colspan="3">
                        <a href="{{url('/contact')}}" class="gbutton">Забронировать студию
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                            </svg>
                        </a></td>
                    <td align="right"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr valign="top">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left"  valign="top" colspan="3">
                        <a href="{{ url('/').'/rental' }}" class="gbutton_n">Выбрать оборудование
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                            </svg>
                        </a></td>
                    <td align="right"></td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>

                </tr>
                <tr valign="bottom" height="60%">
                    <td>&nbsp;</td>
                    <td align="left">
                        <div class="g_cornerLB">&nbsp;</div>
                    </td>
                    <td>&nbsp;</td>
                    <td align="left">
                    </td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="right"><div class="g_cornerRB">&nbsp;</div></td>
                    <td>&nbsp;</td>
                </tr>
                <tr valign="bottom" height="2%">
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="left"></td>
                    <td align="left">
                    </td>
                    <td>&nbsp;</td>
                    <td align="right"></td>

                    <td>&nbsp;</td>
                </tr>
            </table>
        </div>
    </div>
</header>
<main>
    <div class="container-fluid bg-black text-center">&nbsp;
        <h2 style="color: white;">Оборудование и пространство для проведения</h2>
        <h2 style="color: #F39E15FF;">фотосессий и видеосъёмок</h2></div>
    <div class="container bg-black">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');

            section {
                float: left;
                width: 100%;
                padding: 30px 0;
                position: relative;
                overflow: hidden;
            }

            section h4{ font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + .8rem);}
            section p{ font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + .6rem);}

        @media (max-width: 568px) {
            section h4{ font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1.2rem);}
            section p{ font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1rem);}

                        }
            section:before {
                content: "";
                position: absolute;
                width: 110%;
                height: 100%;
                filter: blur(10px);
                z-index: 0;
                transform: scale(2);
                -ms-transform: scale(2);
                -webkit-transform: scale(2);
            }

            .btn-default {
                background: #006EFF;
                width: 100%;
                color: #fff;
                font-weight: 700;
                text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.2);
                font-size: 14px;
            }

            .card {
                box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.3);
                border: none;
                margin-bottom: 30px;
            }

            .card:hover {
                transform: scale(1.05);
                transition: all 1s ease;
                z-index: 999;
            }

            .card-01 .card-body {
                position: relative;
                padding-top: 40px;
            }

            .card-01 .badge-box {
                position: absolute;
                top: -20px;
                left: 50%;
                width: 100px;
                height: 100px;
                margin-left: -50px;
                text-align: center;
            }

            .card-01 .badge-box i {
                background: #006EFF;
                color: #fff;
                border-radius: 50%;
                width: 50px;
                height: 50px;
                line-height: 50px;
                text-align: center;
                font-size: 20px;
            }

            .card-01 .height-fix {
                height: 455px;
                overflow: hidden;
            }

            .card-01 .height-fix .card-img-top {
                width: auto ! imporat;
            }

            .profile-box {
                background-size: cover;
                float: left;
                width: 100%;
                text-align: center;
                padding: 30px 0;
                position: relative;
                overflow: hidden;
            }

            .profile-box:before {
                filter: blur(10px);
                background: url("https://images.pexels.com/photos/195825/pexels-photo-195825.jpeg?h=350&auto=compress&cs=tinysrgb") no-repeat;
                background-size: cover;
                width: 120%;
                position: absolute;
                content: "";
                height: 120%;
                left: -10%;
                top: 0;
                z-index: 0;
            }

            .profile-box img {
                width: 170px;
                height: 170px;
                position: relative;
                border: 5px solid #fff;
            }

            .social-box i {
                border: 1px solid #006EFF;
                color: #006EFF;
                width: 30px;
                height: 30px;
                border-radius: 50%;
                line-height: 30px;
            }

            .social-box i:hover {
                background: #DFC717;
                color: #fff;
            }

            .social-box a {
                margin: 0 5px;
            }

            .video-foreground {
                float: left;
                width: 100%;
                height: 500px;
            }

            .card-01.height-fix .card-img-overlay {
                top: unset;
                color: #fff;
                background: -moz-linear-gradient(top, rgba(26, 96, 111, 0) 0%, rgba(26, 96, 111, 0) 1%, rgba(61, 65, 65, 0.91) 31%, rgba(31, 31, 33, 0.91) 100%); /* FF3.6-15 */
                background: -webkit-linear-gradient(top, rgba(26, 96, 111, 0) 0%, rgba(26, 96, 111, 0) 1%, rgba(59, 62, 63, 0.91) 31%, rgba(32, 34, 35, 0.91) 100%); /* Chrome10-25,Safari5.1-6 */
                background: linear-gradient(to bottom, rgba(26, 96, 111, 0) 0%, rgba(26, 96, 111, 0) 1%, rgba(79, 84, 86, 0.91) 31%, rgba(33, 35, 37, 0.91) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
                filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#001a606f', endColorstr='#e8154159', GradientType=0);
            }

            .card-01.height-fix .fa {
                color: #fff;
                font-size: 22px;
                margin-right: 18px;
            }

            ;

            /*flipper-card*/
            .card-flipper {
                position: relative;
                float: left;
                width: 100%;
                text-align: center;
            }

            .card__front,
            .card__back {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            .card__back .card {
                width: 100%;
                height: 65vh;
            }

            .card__front,
            .card__back {
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                -webkit-transition: -webkit-transform 0.3s;
                transition: transform 0.3s;
            }

            .card__front {
                background-color: #ff5078;
            }

            .card__back {
                background-color: #1e1e1e;
                -webkit-transform: rotateY(-180deg);
                transform: rotateY(-180deg);
            }

            .card-flipper.effect__hover {
                position: relative;
            }

            .card-flipper.effect__hover:hover .card__front {
                -webkit-transform: rotateY(-180deg);
                transform: rotateY(-180deg);
            }

            .card-flipper.effect__hover:hover .card__back {
                -webkit-transform: rotateY(0);
                transform: rotateY(0);
            }

            .card-flipper.effect__random.flipped .card__front {
                -webkit-transform: rotateY(-180deg);
                transform: rotateY(-180deg);
            }

            .card-flipper.effect__random.flipped .card__back {
                -webkit-transform: rotateY(0);
                transform: rotateY(0);
            }

        </style>
        <section>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col-md-4 text-center">
                    <a href="{{url('/portfolio')}}">
                    <div class="card card-01 height-fix">
                        <img class="card-img-top"
                             src="{{url('/img/cicle/1.jpg')}}"
                             alt="Card image cap">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><strong style="color: #f39e15;">Циклорама</strong></h4>
                            <p class="card-text">Предоставляем белую циклораму со всем необходимым оборудованием</p>

                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="{{url('/posts')}}">
                    <div class="card card-01 height-fix">
                        <img class="card-img-top"
                             src="{{url('/img/cicle/3.jpg')}}"
                             alt="Card image cap">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><strong style="color: #f39e15;">Новости</strong></h4>
                            <p class="card-text">Почитать наш блог</p>

                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-md-4 text-center">
                    <a href="{{url('/rental')}}">
                    <div class="card card-01 height-fix">
                        <img class="card-img-top"
                             src="{{url('/img/cicle/2.jpg')}}"
                             alt="Card image cap">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><strong style="color: #f39e15;">Оснащение</strong></h4>
                            <p class="card-text">Наша циклорама с фермой для гриповки оборудования, оснащена 4 мя
                                мощными
                                лебёдками</p>

                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </section>

    </div>


</main>
<footer class="container py-5 text-white">
    <div class="row">
        <div class="col-6 col-md">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                 stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img"
                 viewBox="0 0 24 24">
                <title>ProSvet</title>
                <circle cx="12" cy="12" r="10"/>
                <path
                    d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/>
            </svg>
            <small class="d-block mb-3 text-white">&copy; ProSvet 2024</small>
            <!-- Yandex.Metrika counter -->
            <script type="text/javascript" >
                (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                    m[i].l=1*new Date();
                    for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
                    k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
                (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

                ym(98263220, "init", {
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            </script>
            <noscript><div><img src="https://mc.yandex.ru/watch/98263220" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
            <!-- /Yandex.Metrika counter -->
        </div>
        <div class="col-auto">
            <small class="d-block mb-3 text-white">Москва, улица Правды, 24с3</small>
            <small class="d-block mb-3 text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg> +7(985)-033-51-86
            </small>
            <small class="d-block mb-3 text-white"><a href="https://vk.com/id871588700">VK::ID:871588700</a></small>
        </div>
    </div>
</footer>



</body>
</html>
