<x-layout>

    <x-slot:my_title>
        Магазин
    </x-slot:my_title>
    <x-slot:open_graph>
        <meta property="og:logo" content="{{url('/').'/apple-touch-icon.png'}}" />
        <meta property="og:title" content="ProSvet - Shop"/>
        <meta property="og:description" content="Магазин для светиков"/>
        <meta property="og:image" content="{{url('/').'/img/shop.jpg'}}"/>
        <meta property="og:type" content="profile"/>
        <meta property="og:url" content= "https://pravdaprosvet.ru/shop" />
    </x-slot:open_graph>

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

    <div class="container">
        <div><br>

        </div>
    </div>
    <div class="container">
        <div class="row">
            <h2>Магазин</h2>
        </div>
        <section>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach($r1 as $r)
                    <div class="col-md-4 text-center">
                        <div class="card card-01 height-fix">
                            <img class="card-img-top"
                                 src="{{url('/').'/img/shop/'.$r->id.'.jpg'}}"
                                 alt="Card image cap">
                            <div class="card-img-overlay">
                                <a href="{{ url('/').'/shops?product_group_id='.$r->id }}"><h4 class="card-title"><strong style="color: #f39e15;">{{$r->name}}</strong></h4></a>
                            </div>
                        </div>
                    </div>
        @endforeach
            </div>
        </section>
        <div class="row">{{ $r1->links() }}</div>
    </div>

</x-layout>
