<!doctype html>
<html lang="ru" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Grom FlekBy, and contributors">
    <meta name="generator" content="">

    <title>ProSvet</title>

    <script src="{{ url('js/jquery-3.7.1.js') }}"></script>
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="{{ url('js/jquery-ui.js') }}"></script>
    <script src="{{ url('js/jquery.ui.touch-punch.js') }}"></script>
    <link href="{{ url('js/jquery-ui.css') }}" rel="stylesheet">
    <script src="{{ url('js/bootstrap.bundle.min.js') }}"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Advent+Pro:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
          rel="stylesheet">

    <link rel="stylesheet" href="{{ url('css/flex.css') }}">

    <link rel="stylesheet" href="{{ url('js/magnific-popup.css') }}"/>
    <script src="{{ url('js/isotope.pkgd.js') }}"></script>
    <script src="{{ url('js/jquery.magnific-popup.js') }}"></script>
    <style>
        @import url(https://fonts.bunny.net/css?family=fira-sans:200,500|lato:900);

        navbar-brand {
            font-family: 'Lato', sans-serif;
        }

        .montserrat-< uniquifier > {
            font-family: "Montserrat", sans-serif;
            font-optical-sizing: auto;
            font-weight: < weight >;
            font-style: normal;
        }

        body {

            font-family: 'Montserrat';
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

        .gbg {
            background-image: url({{url('img/bgimg.jpg')}});
            background-position: top;
            background-size: 100%;
            background-repeat: no-repeat;
        }

        .gbg1 {
            padding: 1em;
            height: calc(9 / 16 * 100%);

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

        h1 {
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1.4rem);
        }

        p {
            font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.6rem);
        }

        @media (min-width: 768px) {
            h1 {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1.8rem);
            }

            p {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 0.8rem);
            }
        }

        @media (min-width: 1280px) {
            h1 {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 2.4rem);
            }

            p {
                font-size: calc((100vw - 30rem) / (80 - 30) * (1.5 - 1) + 1.1rem);
            }
        }

        .m_flex {
            display: flex;
            flex: 1 0 0%;
            align-items: flex-end;
            justify-content: flex-end;
        }

        .g_img {
            width: calc((100vw - 480px) / (1280 - 480) * (24 - 16) + 220px);
            border: #3a3a3a solid 3px;
            border-radius: 5px;
        }

        .g_margins1 {
            margin: 0;
        }

        .g_margins {
            height: calc(var(--P-page) * 2.7);
        }

        @media (min-width: 430px) {
            .g_margins {
                height: calc(var(--P-page) * 4);
            }
        }

        @media (min-width: 540px) {
            .g_margins {
                height: calc(var(--P-page) * 6);
            }
        }

        @media (min-width: 622px) {
            .g_margins {
                height: calc(var(--P-page) * 8);
            }
        }

        @media (min-width: 768px) {
            .g_margins {
                height: calc(var(--P-page) * 10);
            }

            .g_margins1 {
                margin: .5em;
            }
        }

        @media (min-width: 768px) {
            .g_margins {
                height: calc(var(--P-page) * 11);
            }
        }

        @media (min-width: 1024px) {
            .g_margins {
                height: calc(var(--P-page) * 15);
            }

            .g_margins1 {
                margin: 1em;
            }
        }

        @media (min-width: 1280px) {
            .g_margins {
                height: calc(var(--P-page) * 16);
            }

            .g_margins1 {
                margin: 2em;
            }
        }
    </style>
</head>
<body class="gbg">
<header>
    <div class="container-md menu">
        <div class="row">
            <div class="col"><a class="navbar-brand" style="font-family: 'Lato', sans-serif;"
                                href="{{ url('/') }}">PRO<span style="font-size: 180%;">S</span>VET</a></div>
            <div class="col-auto text-end">
                <button>Zakaz</button>
            </div>
        </div>
    </div>

</header>
<main>
    <div class="container-md gbg1">

        <div class="row">
            <div class="col">
                <div class="g_cornerLT">&nbsp;</div>
            </div>
            <div class="col-auto"><h1 class="montserrat-500">Искусство освещения</h1></div>
            <div class="col ms-auto">
                <div class="m_flex">
                    <div class="g_cornerRT">&nbsp;</div>
                </div>
            </div>
        </div>
        <div class="row text-center">

            <p class="montserrat-500">Закажите профессиональное освещение и пространство для ваших событий.</p>

        </div>
        <div class="row g_margins1">

            <div class="col-1">
                <div class="">&nbsp;</div>
            </div>
            <div class="col">
                <a href="{{url('/')}}" class="gbutton">Посмотреть
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                    </svg>
                </a></div>
            <div class="col">
                <div class="">&nbsp;</div>
            </div>

        </div>
        <div class="row g_margins1">

            <div class="col-1">
                <div class="">&nbsp;</div>
            </div>
            <div class="col">
                <a href="{{url('/')}}" class="gbutton_n">Заказать
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8"/>
                    </svg>
                </a></div>
            <div class="col">
                <div class="">&nbsp;</div>
            </div>

        </div>
        <div class="row g_margins"></div>
        <div class="row">
            <div class="col">
                <div class="g_cornerLB">&nbsp;</div>
            </div>
            <div class="col-auto"><h1 class="montserrat-500"></h1></div>
            <div class="col ms-auto">
                <div class="m_flex">
                    <div class="g_cornerRB">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <div class="container bg-black">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c" image-rendering="{{url('/img/cicle/1.jpg')}}"></rect></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card shadow-sm">
                    <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-black justify-content-center py-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-auto justify-content-center">
                <div class="row justify-content-center mx-auto">
                    <div class="col"><img src="{{url('/img/cicle/1.jpg')}}" class="rounded mx-auto d-block g_img"></div>
                    <div class="col"><img src="{{url('/img/cicle/2.jpg')}}" class="rounded mx-auto d-block g_img"></div>
                    <div class="col"><img src="{{url('/img/cicle/3.jpg')}}" class="rounded mx-auto d-block g_img"></div>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

</main>
<footer>

</footer>

</body>
</html>
