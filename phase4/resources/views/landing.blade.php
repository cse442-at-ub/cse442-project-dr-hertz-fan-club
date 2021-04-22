<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        #navbar {
            overflow: hidden;
            background-color: #3b3b3b;
            padding: 90px 10px;
            transition: 0.4s;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 99;
        }

        #navbar a {
            float: left;
            color: white;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        #navbar #logo {
            font-size: 35px;
            font-weight: bold;
            transition: 0.4s;
        }

        #navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        #navbar a.active {
            background-color: dodgerblue;
            color: white;
        }

        #navbar-right {
            float: right;
        }

        @media screen and (max-width: 580px) {
            #navbar {
                padding: 20px 10px !important;
            }

            #navbar a {
                float: none;
                display: block;
                text-align: left;
            }

            #navbar-right {
                float: none;
            }
        }
    </style>
</head>
<body style="min-width: 320px">

<div id="navbar">
    <a id="title" style="font-size: 35px">
        UB Market
    </a>
    <a id="subtitle" style="font-size: 25px">A place for UB community</a>
    <div id="navbar-right">

        <a href="{{route('main')}}">Home</a>

        <a href="#features">Features</a>

        <a href="#restriction">Restriction</a>

        <a class="btn btn-primary" href="{{route('login')}}">LOG IN</a>

    </div>

</div>

<div class="container" style="margin-top: 400px">

    <!-- sign up -->
    <div class="row">
        <div class="col-md-6">
            <div id="header" class="text-container text-center">
                <h2>
                    Welcome to UB Market
                </h2>
                <p>
                    Do you want to sell or buy something from UB community? Come and join us!
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="{{route('verify')}}">Sign up</a>
                </p>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://www.buffalo.edu/content/www/campusliving/about-us/employment-opportunities/how-to-apply/_jcr_content/par/image.img.447.260.jpg/1507045432762.jpg">
        </div>
    </div>

    <!-- Features -->
    <div class="row" style="margin-top: 150px">
        <div class="col-md-12 text-center">
            <p>
                Features
            </p>
        </div>
    </div>
    <div id="features" class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <img class="img" style="width: 200px"
                         src="{{ asset('image/money-box.gif') }}"/>
                    <p style="padding-left: 5vh">Save Your Money</p>
{{--                    <div class="card" style="width:200px">--}}
{{--                        <img class="card-img-top" alt="Feature1"--}}
{{--                             src="{{ asset('image/photo.gif') }}">--}}
{{--                        <div class="card-block">--}}
{{--                            <h5 class="card-title">--}}
{{--                                Card title--}}
{{--                            </h5>--}}
{{--                            <p class="card-text">--}}

{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Feature2"
                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c9/UB_Ellicott_Complex.jpg/320px-UB_Ellicott_Complex.jpg">
                        <div class="card-block">
                            <h5 class="card-title">
                                Card title
                            </h5>
                            <p class="card-text">

                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" alt="Feature3"
                             src="https://www.buffalo.edu/content/www/campusliving/about-us/employment-opportunities/how-to-apply/_jcr_content/par/image.img.447.260.jpg/1507045432762.jpg">
                        <div class="card-block">
                            <h5 class="card-title">
                                Card title
                            </h5>
                            <p class="card-text">

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- restriction -->
    <div class="row" style="margin-top: 150px">
        <div class="col-md-12 text-center">
            <p>
                Restriction
            </p>
        </div>
    </div>
    <div id="restriction" class="row">
        <div class="col-md-6">
            <div class="media">
                <img class="mr-3" alt="User" width="50" height="50"
                     src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-ios7-contact-512.png">
                <div class="media-body">
                    <h5 class="mt-0">
                        Upcoming User
                    </h5> How can I use the service?
                    <div class="media mt-3">
                        <a class="pr-3" href="#"><img alt="User" width="50" height="50"
                                                      src="https://cdn4.iconfinder.com/data/icons/ionicons/512/icon-ios7-contact-512.png"></a>
                        <div class="media-body">
                            <h5 class="mt-0">
                                Dr. Hertz Fan Club
                            </h5> All you need is using your UB email to register!
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                Maybe tutorial video here?
            </h2>
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>

    <!-- footer -->
    <div class="row text-center" style="margin-top: 150px">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        About Us
                    </h2>
                    <p>
                        <a href="{{ route('aboutus') }}" target="_blank"> About Us </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>
                        Resources
                    </h2>
                    <p>
                        <a href="https://laravel.com/docs/8.x/releases" target="_blank"> Laravel </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        Contact
                    </h2>
                    <p>
                        <a href="{{ route('contactus') }}" target="_blank"> Contact Us </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>
                        Help
                    </h2>
                    <p>
                        <a href="{{ route('faq') }}" target="_blank"> FAQ </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p>
                Copyright © 2021 Power by Dr. Hertz Fan Club
            </p>

        </div>
    </div>
</div>
<script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function() {scrollFunction()};


    function scrollFunction() {
        var currentScrollPos = window.pageYOffset;
        var width = document.body.clientWidth;
        if (width <= 450 ){
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-400px";
            }
            prevScrollpos = currentScrollPos;
        }
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {

            document.getElementById("navbar").style.padding = "20px 10px";
            document.getElementById("title").style.fontSize = "25px";
            document.getElementById("subtitle").style.fontSize = "0px";

        } else {
            document.getElementById("navbar").style.padding = "100px 10px";
            document.getElementById("title").style.fontSize = "35px";
            document.getElementById("subtitle").style.fontSize = "25px";
        }


    }
</script>
<script src={{asset('js/app.js')}}></script>

</body>
</html>
