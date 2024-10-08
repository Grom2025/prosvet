<!doctype html>
<html lang="ru" data-bs-theme="dark" xmlns:fb="http://ogp.me/ns/fb#">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Grom FlekBy, and contributors">
    <meta name="generator" content="">
    <meta name="yandex-verification" content="a97a41fb27d00c84" />

    <title>{{'ProSvet '.($my_title??'')}}
        @if(env('APP_DEBUG', false)) DEBUG @endif
    </title>

    {{$open_graph ?? ' '}}

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
            src: local("IgraSans"),
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
            src: local("Advent Pro"),
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
            src: local("Lato"),
                /* Если не получилось, загрузит woff2 */
            url("{{url('/')}}/fonts/Lato-Black.woff2") format("woff2"),
                /* Если браузер не поддерживает woff2, загрузит woff */
            url("{{url('/')}}/fonts/Lato-Black.woff") format("woff");
        }

        navbar-brand {
            font-family: 'Lato', sans-serif;
            font-weight: 900;
            color: #18181b;
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
            background-color: #f39e15;
            border: #261903 1px solid;
            border-radius: 18px;
            color: black;
            text-decoration: none;
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.5rem);
            padding: .4em;

        }

        .gbutton_n {
            background-color: #ffffff;
            border: #261903 1px solid;
            border-radius: 18px;
            color: black;
            text-decoration: none;
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.5rem);
            padding: .4em;

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
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.4rem);
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

        #mainHeaderWrapper {
            position: relative;
            background: no-repeat url({{url('img/bgimg1.jpg')}}) 50% / 100%;
        }

        #mainHeaderWrapper > img {
            vertical-align: top;
            width: 100%; /* max width */
            opacity: 0; /* make it transparent */
            height: 3em;
        }

        #mainHeaderWrapper > div {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body class="bg-black">
<header>
    <div id="mainHeaderWrapper" class="m_flex_center">
        <img src="{{url('img/bgimg1.jpg')}}"><!-- I'm invisible! -->
        <div>
            <table width="100%" height="100%">
                <tr>
                    <td width="5%">&nbsp;</td>
                    <td align="left"><a class="navbar-brand" style="font-family: 'Lato', sans-serif; color: black;"
                                        href="{{ url('/') }}">PRO<span style="
                                        font-size: 180%;
                                        -webkit-text-stroke: 1px black;
                                        color: white;">S</span>VET</a>
                    </td>
                    <td align="center"></td>
                    <td align="right">
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
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item " href="{{ url('/').'/rental' }}">Оборудование</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item " href="{{ url('/').'/shop' }}">Магазин</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/posts' }}">Блог</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/rooles' }}">Правила</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/contact' }}">Забронировать</a></li>
                                <li><a class="dropdown-item" href="{{ url('/').'/contacts' }}">Контакты</a></li>
                                <li><hr class="dropdown-divider"></li>
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
            </table>
        </div>
    </div>
</header>
<main>

    {{ $slot }}

</main>

<footer class="container py-5">
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
            <small class="d-block mb-3 text-body-secondary">&copy; ProSvet 2024</small>
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
            <small class="d-block mb-3 text-body-secondary">Москва, улица Правды, 24с3</small>
            <small class="d-block mb-3 text-body-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                </svg> +7(985)-033-51-86
            </small>
            <small class="d-block mb-3 text-body-secondary"><a href="https://vk.com/id871588700">VK::ID:871588700</a></small>
        </div>
    </div>
</footer>


</body>
</html>
