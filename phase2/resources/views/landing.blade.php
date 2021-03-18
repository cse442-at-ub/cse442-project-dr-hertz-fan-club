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

</head>
<body>
<nav class="navbar fixed-top">
    <!-- Header -->
    <div class="brand-title">
        UB Market <small>A place for UB community</small>
    </div>
    <a href="#" class="toggle-button">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </a>
    <div class="navbar-links">
        <ul>
            <li>
                <a href="{{route('main')}}">Home</a>
            </li>
            <li>
                <a href="#features">Features</a>
            </li>
            <li>
                <a href="#restriction">Restriction</a>
            </li>
            <li>
                <a href="{{route('login')}}">LOG IN</a>
            </li>
        </ul>
    </div>

</nav>

<div class="container-fluid" style="margin-top: 15%">

    <!-- sign up -->
    <div class="row">
        <div class="col-md-6">
            <div id="header" class="text-container text-center">
                <h2>
                    Welcome to UB Market
                </h2>
                <p>
                    Do you want to sell or buy from UB community? Come and join us!
                </p>
                <p>
                    <a class="btn btn-primary btn-large" href="{{route('signup')}}">Sign up</a>
                </p>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <h2>
                image here
            </h2>
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
                    <div class="card">
                        <img class="card-img-top" alt="Feature1"
                             src="https://grad.buffalo.edu/content/grad/explore/about/visit/_jcr_content/par/image.img.680.244.jpg/1586178528306.jpg">
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
                                Registered Member
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
            <iframe width="560" height="315" src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
        </div>
    </div>

    <!-- footer -->
    <div class="row" style="margin-top: 150px">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        About Us
                    </h2>
                    <p>
                        information here.
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>
                        Resources
                    </h2>
                    <p>
                        information here.
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h2>
                Contact
            </h2>
            <p>
                information here.
            </p>
            <a href="{{route('faq')}}">Go somewhere</a>
        </div>
        <!--        <div class="col-md-6">-->
        <!--            <div class="row">-->
        <!--                <div class="col-md-6">-->
        <!--                    <h2>-->
        <!--                        Heading-->
        <!--                    </h2>-->
        <!--                    <p>-->
        <!--                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,-->
        <!--                        tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem-->
        <!--                        malesuada magna mollis euismod. Donec sed odio dui.-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--                <div class="col-md-6">-->
        <!--                    <h2>-->
        <!--                        Contact-->
        <!--                    </h2>-->
        <!--                    <p>-->
        <!--						information here.-->
        <!--                    </p>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <p>
                Copyright © 2021 Power by Dr. Hertz Fan Club
            </p>

        </div>
    </div>
</div>

<script src={{asset('js/app.js')}}></script>

</body>
</html>
