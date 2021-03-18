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
        input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            /*background-image: url();*/
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

        input[type=text]:focus {
            width: 50%;
        }

        iframe {
            height: 100vh;
            width: 100%;
        }

        select {
            box-sizing: border-box;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            /*background-image: url();*/
            background-position: 10px 10px;
            background-repeat: no-repeat;
            padding: 12px 10px 12px 10px;
        }

        .navbar-links ul ul {
            position: absolute;
            display: inline-block;
            opacity: 0;
            visibility: hidden;
            background-color: rgba(0, 0, 0, 0.767);
            color: white;
        }

        .navbar-links ul li:hover > ul {
            opacity: 1;
            visibility: visible;
            color: white;
        }

        .navbar-links ul ul li {
            display: list-item;
            position: relative;
            color: white;
        }
        .navbar-links ul ul li a {
            color: white;
        }

    </style>
</head>


<body>
<div class="container-fluid">

    <!-- Nav Bar -->
    <div class="col-md-12">
        <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark fixed-top">

            <div class="brand-title-main">
                UB Market
            </div>
            <a href="#" class="toggle-button">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </a>

                <!--                Searching component-->
                <div class="mr-auto">
                    <form class="form-inline">
                        <select name="category">
                            <option value="All">All</option>
                            <option value="Books">Books</option>
                            <option value="Housing">Housing</option>
                            <option value="Roommates">Roommates</option>
                            <option value="Others">Others</option>
                        </select>
                        <input type="text" name="search" placeholder="Search..">
                        <button class="btn btn-primary" type="submit" style="padding: 12px 20px; border-radius: 4px">
                            Search
                        </button>
                    </form>
                </div>
                <div class="navbar-links">
                    <ul>
    <!--                    Change to a real button in future version-->
                        <li>
                            <a class="btn btn-primary" href="{{route('post')}}" style="padding: 12px 20px; border-radius: 4px">
                            Post
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-dark" href="#" style="padding: 12px 20px; border-radius: 4px">Profile</a>
                            <ul>
                                <li><a class="dropdown-item" href="#">My Post</a></li>
                                <li><a class="dropdown-item" href="#">Change Name</a></li>
                                <li><a class="dropdown-item" href="#">Change Password</a></li>
                                <li><div class="dropdown-divider"></div></li>
                                <li><a class="dropdown-item" href="{{route('contactus')}}">Report Issue</a></li>
                            </ul>
                        </li>
                        <!--                    Change to a real button in future version-->
                        <li>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn-danger my-2 my-sm-0" style="padding: 12px 20px; border-radius: 4px" type="submit">
                                    Log out
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>

        </nav>
    </div>

    <!--Break page into 2 parts, left for all listing, right for details of chosen post-->
    <div class="row" style="margin-top: 60px">
        <div class="col-md-12">
            <div class="row" style="height: 100%">
                <div class="col-md-4">
                    <iframe src="{{route('cards')}}"></iframe>
                </div>
                <div class="col-md-8" style="height: 100%">
                    <iframe src="{{route('details')}}" id="detail"></iframe>
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
                        <a href="{{route('contactus')}}"> Contact Us </a>
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>
                        Help
                    </h2>
                    <p>
                        <a href="{{route('faq')}}"> Need Help? </a>
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

<script src={{asset('js/app.js')}}></script>
</body>
</html>
