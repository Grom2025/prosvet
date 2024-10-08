<x-layout>
    <x-slot:my_title>
        Галерея
    </x-slot:my_title>
    <x-slot:open_graph>
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:site" content="@" />
        <meta name="twitter:title" content="Фото студии и оборудования" />
        <meta name="twitter:url" content="https://pravdaprosvet.ru/portfolio" />
        <meta name="twitter:domain" content="pravdaprosvet.ru" />

        <meta name="twitter:description" content="" />

        <meta name="twitter:image" content="{{url('/').'/img/shop.jpg'}}" />

        <meta property="article:author" content="https://www.facebook.com/pikabu.ru">
        <meta property="article:publisher" content="https://www.facebook.com/pikabu.ru">

        <meta property="og:logo" content="{{url('/').'/apple-touch-icon.png'}}" />
        <meta property="og:title" content="ProSvet - Галерея"/>
        <meta property="og:description" content="Фото студии и оборудования"/>
        <meta property="og:image" content="{{url('/').'/img/shop.jpg'}}"/>
        <meta property="og:type" content="profile"/>
        <meta property="og:url" content= "https://pravdaprosvet.ru/portfolio" />
    </x-slot:open_graph>

    <div class="container"><br><br><br></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center my-2">
                <h4>Портфолио</h4>
            </div>
        </div>
        <div class="portfolio-menu mt-2 mb-4">
            <ul>
                <li class="btn btn-outline-dark active" style="border-color: #F39E15FF; border-radius: 15px;" data-filter="*">Все</li>
                <li class="btn btn-outline-dark" style="border-color: #F39E15FF; border-radius: 15px;" data-filter=".gts">Циклорама</li>
                <li class="btn btn-outline-dark" style="border-color: #F39E15FF; border-radius: 15px;" data-filter=".lap">Технические</li>
                <li class="btn btn-outline-dark text" style="border-color: #F39E15FF; border-radius: 15px;" data-filter=".selfie">Художественные</li>
            </ul>
        </div>
        <div class="portfolio-item row">
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/1.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/1.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/2.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/2.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/3.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/3.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/4.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/4.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/5.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/5.jpg') }}" alt="">
                </a>
            </div>

            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/7.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/7.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/8.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/8.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/9.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/9.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/10.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/10.jpg') }}" alt="">
                </a>
            </div>

            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/12.png') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/12.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/13.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/13.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/14.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/14.jpg') }}" alt="">
                </a>
            </div>

            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/16.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/16.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/17.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/17.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/18.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/18.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/19.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/19.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/20.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/20.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/21.png') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/21.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/22.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/22.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/23.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/23.jpg') }}" alt="">
                </a>
            </div>
            <div class="item gts col-lg-3 col-md-4 col-6 col-sm">
                <a href="{{ url('/img/galery/24.jpg') }}" class="fancylight popup-btn" data-fancybox-group="light">
                    <img class="img-fluid" src="{{ url('/img/galery/24.jpg') }}" alt="">
                </a>
            </div>

        </div>
    </div>


    <script>
        // $('.portfolio-item').isotope({
        //  	itemSelector: '.item',
        //  	layoutMode: 'fitRows'
        //  });
        $('.portfolio-menu ul li').click(function () {
            $('.portfolio-menu ul li').removeClass('active');
            $(this).addClass('active');

            var selector = $(this).attr('data-filter');
            $('.portfolio-item').isotope({
                filter: selector
            });
            return false;
        });
        $(document).ready(function () {
            var popup_btn = $('.popup-btn');
            popup_btn.magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        });
    </script>
</x-layout>
