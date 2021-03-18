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

    <style id="__web-inspector-hide-shortcut-style__">
        .__web-inspector-hide-shortcut__, .__web-inspector-hide-shortcut__ *, .__web-inspector-hidebefore-shortcut__::before, .__web-inspector-hideafter-shortcut__::after {
            visibility: hidden !important;
        }
    </style>
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
                <a href="main.blade.php">Home</a>
            </li>
            <li>
                <a href="login.blade.php">LOG IN</a>
            </li>
        </ul>
    </div>
    <!--        </div>-->
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
                    <a class="btn btn-primary btn-large" href="sign_up.blade.php">Sign up</a>
                </p>
            </div>
        </div>
        <div class="col-md-6 text-center">
            <h2>
                image here
            </h2>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center" style="font-size:60px;">Help</h1>
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            Help topic #1
                        </h3>
                        <p>
                        <div id="card-601895">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-601895"
                                       href="#card-element-341632">Help issue #1</a>
                                </div>
                                <div id="card-element-341632" class="collapse">
                                    <div class="card-body">
                                        Help info...
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-601895"
                                       href="#card-element-233132">Help issue #2</a>
                                </div>
                                <div id="card-element-233132" class="collapse">
                                    <div class="card-body">
                                        Help info...
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            Help topic #2
                        </h3>
                        <p>
                        <div id="card-158148">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link collapsed" data-toggle="collapse" data-parent="#card-158148"
                                       href="#card-element-422555">Help issue #1</a>
                                </div>
                                <div id="card-element-422555" class="collapse">
                                    <div class="card-body">
                                        Help info...
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" data-parent="#card-158148"
                                       href="#card-element-457852">Help issue #2</a>
                                </div>
                                <div id="card-element-457852" class="collapse">
                                    <div class="card-body">
                                        Help info...
                                    </div>
                                </div>
                            </div>
                        </div>
                        </p>
                    </div>
                </div>
            </div>
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
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        Contact
                    </h2>
                    <p>
                        <a href="contact_us.blade.php"> Contact Us </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>
                        Help
                    </h2>
                    <p>
                        <a href="help.blade.php"> Need Help? </a>
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

<script src={{asset('js/app.css')}}></script>

</body>
</html>
