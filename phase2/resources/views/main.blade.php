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
            height: 80vh;
            width: 100%;
        }

        /*select {*/
        /*    box-sizing: border-box;*/
        /*    border-radius: 4px;*/
        /*    font-size: 16px;*/
        /*    background-color: white;*/
        /*    !*background-image: url();*!*/
        /*    background-position: 10px 10px;*/
        /*    background-repeat: no-repeat;*/
        /*    padding: 12px 10px 12px 10px;*/
        /*}*/

        /*.navbar-links ul ul {*/
        /*    position: absolute;*/
        /*    display: inline-block;*/
        /*    opacity: 0;*/
        /*    visibility: hidden;*/
        /*    background-color: rgba(0, 0, 0, 0.767);*/
        /*    color: white;*/
        /*}*/

        /*.navbar-links ul li:hover > ul {*/
        /*    opacity: 1;*/
        /*    visibility: visible;*/
        /*    color: white;*/
        /*}*/

        /*.navbar-links ul ul li {*/
        /*    display: list-item;*/
        /*    position: relative;*/
        /*    color: white;*/
        /*}*/

        /*.navbar-links ul ul li a {*/
        /*    color: white;*/
        /*}*/

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

        #navbar #title {
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
<div class="container-fluid">

    <div id="navbar">
            <a id="title" style="font-size: 35px">
                UB Market
            </a>
            <a id="subtitle" style="font-size: 25px">
                @auth
                    <p>Hello, {{ auth()->user()->name }}</p>
                @endauth
            </a>


        <div class="d-flex" id="navbar-right">

            {{--            <li class="nav-item">--}}
            {{--                <a class="btn btn-dark" href="#" style="padding: 12px 20px; border-radius: 4px">Profile</a>--}}
            {{--                <ul>--}}
            {{--                    <li><a class="dropdown-item" href="#">My Post</a></li>--}}
            {{--                    <li><a class="dropdown-item" href="#">Change Name</a></li>--}}
            {{--                    <li><a class="dropdown-item" href="#">Change Password</a></li>--}}
            {{--                    <li>--}}
            {{--                        <div class="dropdown-divider"></div>--}}
            {{--                    </li>--}}
            {{--                    <li><a class="dropdown-item" href="{{route('contactus')}}">Report Issue</a></li>--}}
            {{--                </ul>--}}
            {{--            </li>--}}

            <a class="btn btn-primary" href="{{route('post')}}"
               style="padding: 12px 20px; border-radius: 4px">
                Post
            </a>

            <button class="btn btn-info" style="padding: 12px 20px; border-radius: 4px">
                Profile
            </button>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger" style="padding: 12px 20px 13px 12px; border-radius: 4px"
                        type="submit">
                    Log out
                </button>
            </form>

        </div>
    </div>

{{--    <div class="header">--}}
{{--        <h2>Scroll Down</h2>--}}
{{--        <p>Scroll down to see the sticky effect.</p>--}}
{{--    </div>--}}
{{--    <!-- Nav Bar -->--}}
{{--    <div id="navbar">--}}
{{--        <div class="brand-title-main">--}}
{{--            UB Market--}}
{{--        </div>--}}
{{--        <!--                Searching component-->--}}
{{--        <div class="mr-auto">--}}
{{--            <form class="form-inline">--}}
{{--                <select name="category">--}}
{{--                    <option value="All">All</option>--}}
{{--                    <option value="Books">Books</option>--}}
{{--                    <option value="Housing">Housing</option>--}}
{{--                    <option value="Roommates">Roommates</option>--}}
{{--                    <option value="Others">Others</option>--}}
{{--                </select>--}}
{{--                <input type="text" name="search" placeholder="Search..">--}}
{{--                <button class="btn btn-primary" type="submit" style="padding: 12px 20px; border-radius: 4px">--}}
{{--                    Search--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--        <div id="navbar-right">--}}
{{--            <!--                    Change to a real button in future version-->--}}

{{--            <a class="btn btn-primary" href="{{route('post')}}"--}}
{{--               style="padding: 12px 20px; border-radius: 4px">--}}
{{--                Post--}}
{{--            </a>--}}


{{--            <li class="nav-item">--}}
{{--                <a class="btn btn-dark" href="#" style="padding: 12px 20px; border-radius: 4px">Profile</a>--}}
{{--                <ul>--}}
{{--                    <li><a class="dropdown-item" href="#">My Post</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Change Name</a></li>--}}
{{--                    <li><a class="dropdown-item" href="#">Change Password</a></li>--}}
{{--                    <li>--}}
{{--                        <div class="dropdown-divider"></div>--}}
{{--                    </li>--}}
{{--                    <li><a class="dropdown-item" href="{{route('contactus')}}">Report Issue</a></li>--}}
{{--                </ul>--}}
{{--            </li>--}}
<!--                    Change to a real button in future version-->

{{--            <form action="{{ route('logout') }}" method="post">--}}
{{--                @csrf--}}
{{--                <button class="btn btn-danger" style="padding: 12px 20px; border-radius: 4px"--}}
{{--                        type="submit">--}}
{{--                    Log out--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}

<!--Break page into 2 parts, left for all listing, right for details of chosen post-->

    <div class="col-md-12" style="padding-top: 400px">

        <div class="row" style="height: 100%">
            <div class="col-md-4">
                <form style="white-space: nowrap">
                    <div>
                        <select name="category" style="height: 50px; border-radius: 4px">
                            <option value="All">All</option>
                            <option value="Books">Books</option>
                            <option value="Housing">Housing</option>
                            <option value="Roommates">Roommates</option>
                            <option value="Others">Others</option>
                        </select>
                        <button class="btn btn-primary" type="submit" style="height: 52px; border-radius: 4px">
                            Search
                        </button>
                        <input type="text" name="search" placeholder="Search..">
                    </div>

                </form>
                <iframe style="height: 73vh" src="{{route('cards')}}"></iframe>
            </div>
            <div class="col-md-8" style="height: 100%">
                <iframe src="{{route('details')}}" id="detail"></iframe>
            </div>
        </div>
    </div>


    <!-- footer -->
    <div class="row text-center" style="margin-top: 50px">

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <h2>
                        About Us
                    </h2>
                    <p>
                        <a href="{{ route('aboutus') }}" target="_blank">About Us</a>
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
                        <a href="{{route('faq')}}" target="_blank"> FAQ </a>
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
<script src={{asset('js/app.js')}}></script>
<script>

    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
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

    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    window.onclick = function (event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }
</script>
</body>
</html>
