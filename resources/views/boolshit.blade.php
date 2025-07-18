<x-layout>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700');

        section{
            float:left;
            width:100%;
            padding:30px 0;
            position:relative;
            overflow:hidden;
            background:#6F8D8A;
            margin: 30px;
        }

        section:before{
            content:"";
            position:absolute;
            width:110%;
            height:100%;
            background-color:#fff;
            filter: blur(10px);
            z-index:0;
            transform: scale(2);-ms-transform: scale(2);
            -webkit-transform: scale(2);
        }

        .btn-default{
            background:#006EFF; width: 100%; color:#fff; font-weight:700; text-shadow:1px 1px 0 rgba(0,0,0,0.2); font-size:14px;
        }
        .card{
            box-shadow:2px 2px 20px rgba(0,0,0,0.3); border:none; margin-bottom:30px;
        }
        .card:hover{
            transform: scale(1.05);
            transition: all 1s ease;
            z-index: 999;
        }
        .card-01 .card-body{
            position:relative; padding-top:40px;
        }
        .card-01 .badge-box{
            position:absolute;
            top:-20px; left:50%; width:100px; height:100px;margin-left:-50px; text-align:center;
        }
        .card-01 .badge-box i{
            background:#006EFF; color:#fff; border-radius:50%;  width:50px; height:50px; line-height:50px; text-align:center; font-size:20px;
        }
        .card-01 .height-fix{
            height:455px; overflow:hidden;
        }

        .card-01 .height-fix .card-img-top{width:auto!imporat;}

        .profile-box{
            background-size:cover; float:left; width:100%; text-align:center; padding:30px 0; position:relative; overflow:hidden;
        }

        .profile-box:before{
            filter: blur(10px);background:url("https://images.pexels.com/photos/195825/pexels-photo-195825.jpeg?h=350&auto=compress&cs=tinysrgb") no-repeat; background-size:cover; width:120%; position:absolute; content:""; height:120%; left:-10%;top:0;z-index:0;
        }

        .profile-box img{
            width:170px; height:170px; position:relative; border:5px solid #fff;
        }

        .social-box i {
            border:1px solid #006EFF; color:#006EFF; width:30px; height:30px; border-radius:50%;line-height:30px;
        }

        .social-box i:hover{
            background:#DFC717; color:#fff;
        }

        .social-box a{margin: 0 5px;}

        .video-foreground{float:left;width:100%; height:500px;}

        .card-01.height-fix .card-img-overlay{
            top:unset;
            color:#fff;
            background: -moz-linear-gradient(top, rgba(26,96,111,0) 0%, rgba(26,96,111,0) 1%, rgba(24,87,104,0.91) 31%, rgba(21,65,89,0.91) 100%); /* FF3.6-15 */
            background: -webkit-linear-gradient(top, rgba(26,96,111,0) 0%,rgba(26,96,111,0) 1%,rgba(24,87,104,0.91) 31%,rgba(21,65,89,0.91) 100%); /* Chrome10-25,Safari5.1-6 */
            background: linear-gradient(to bottom, rgba(26,96,111,0) 0%,rgba(26,96,111,0) 1%,rgba(24,87,104,0.91) 31%,rgba(21,65,89,0.91) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001a606f', endColorstr='#e8154159',GradientType=0 );
        }
        .card-01.height-fix .fa{color: #fff;font-size: 22px;margin-right: 18px;};

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

        .card__back .card{
            width:100%;
            height:65vh;
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
        .card-flipper.effect__hover{position:relative;}
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
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-01">
                        <img class="card-img-top"
                             src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg?h=350&auto=compress&cs=tinysrgb"
                             alt="Card image cap">
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-default text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card card-01">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active">
                                    <img class="d-block img-fluid"
                                         src="https://images.pexels.com/photos/534164/pexels-photo-534164.jpeg?h=350&auto=compress&cs=tinysrgb"
                                         alt="First slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                         src="https://images.pexels.com/photos/247599/pexels-photo-247599.jpeg?h=350&auto=compress&cs=tinysrgb"
                                         alt="Second slide">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block img-fluid"
                                         src="https://images.pexels.com/photos/66997/pexels-photo-66997.jpeg?h=350&auto=compress&cs=tinysrgb"
                                         alt="Third slide">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-user-circle-o"></i></span>
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-default text-uppercase">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-01">
                        <div class="profile-box">
                            <img class="card-img-top rounded-circle"
                                 src="https://avatars0.githubusercontent.com/u/2575262?s=460&v=4" alt="Card image cap">
                        </div>
                        <div class="card-body text-center">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">Caroline Rodrigues</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <span class="social-box">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-01">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                    src="https://www.youtube.com/embed/W0LHTWG-UmQ?controls=0&showinfo=0&rel=0&autoplay=1&loop=1&playlist=W0LHTWG-UmQ"></iframe>
                        </div>
                        <div class="card-body">
                            <span class="badge-box"><i class="fa fa-check"></i></span>
                            <h4 class="card-title">News title</h4>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                            <a href="#" class="btn btn-default text-uppercase">Explore</a>
                        </div>
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="card-flipper effect__hover" data-id="1">
                        <div class="card__front">
                            <div class="card card-01">
                                <div class="profile-box-01">
                                    <img class="card-img-top"
                                         src="https://images.pexels.com/photos/325531/pexels-photo-325531.jpeg?w=940&h=650&auto=compress&cs=tinysrgb"
                                         alt="Card image cap">
                                </div>
                                <div class="card-body text-center">
                                    <span class="badge-box"><i class="fa fa-check"></i></span>
                                    <h4 class="card-title">Maria Chiquinha</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-default text-uppercase">Explore</a>
                                </div>
                            </div>
                        </div>

                        <div class="card__back">
                            <div class="card card-01">
                                <div class="card-body text-center">
                                    <h4 class="card-title">Caroline Rodrigues</h4>
                                    <p class="card-text">Some quick example text to build on the card title and make up
                                        the bulk of the card's content.</p>
                                    <span class="social-box">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-google-plus"></i></a>
                <a href="#"><i class="fa fa-dribbble"></i></a>
                <a href="#"><i class="fa fa-behance"></i></a>
            </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card card-01 height-fix">
                        <img class="card-img-top"
                             src="http://res.cloudinary.com/amritvirk23/image/upload/v1506061057/poc.jpg"
                             alt="Card image cap">
                        <div class="card-img-overlay">
                            <h4 class="card-title"><strong>Pirates of the Caribbean V</strong></h4>
                            <p class="card-text">Captain Jack Sparrow searches for the trident of Poseidon.</p>
                            <p class="card-text"><a href="#" class="fa fa-bookmark-o"></a><a class="fa fa-heart-o"
                                                                                             href="#"></a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>
</x-layout>
