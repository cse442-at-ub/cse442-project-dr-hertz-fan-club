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
            padding: 10px 10px;
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

        #navbar-right a {
            padding: 0px 10px;
        }

        @media screen and (max-width: 775px) {
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


<body>


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

        <a class="btn btn-primary" href="{{route('post')}}"
           style="padding: 12px 20px; border-radius: 4px">
            Post
        </a>

        <a class="btn btn-warning" href="{{route('reset.password')}}"
           style="padding: 12px 20px; border-radius: 4px; color: black">
            Change Password
        </a>

        <a class="btn btn-info" href="{{route('main')}}"
           style="padding: 12px 20px; border-radius: 4px">
            Back
        </a>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="btn btn-danger" style="padding: 12px 20px 13px 12px; border-radius: 4px"
                    type="submit">
                Log out
            </button>
        </form>

    </div>
</div>
<div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            {{ Session::get('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="container-fluid align-content-center">
    <div style="padding-top: 100px" id="main">

        <ul class="list-group">
            <li class="list-group-item" style="background: #7abaff">TextBook</li>
            @if(!$textbooks->isempty())
                <div class="row">
                    @foreach($textbooks as $textbook)
                        <div class="column float-left" style="padding-left: 17px">
                            <div class="card" style="width:350px">
                                <img class="card-img-top"
                                     src="{{ $url }}{{ $textbook->files[0] }}"
                                     alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $textbook->title }}</h4>
                                    <p class="card-text">{{ $textbook->course }}{{ $textbook->course_num }}</p>
                                    <div class="row" style="justify-content: space-evenly">
                                        {{--                                        <form id="mform"--}}
                                        {{--                                              action="{{ route('post.detail.mobile', ['type'=>'textbook', 'id'=>$textbook->id]) }}"--}}
                                        {{--                                              method="post">--}}
                                        {{--                                            @csrf--}}
                                        {{--                                            <a class="btn btn-outline-primary btn-large" target="_blank"--}}
                                        {{--                                               onclick="document.getElementById('mform').submit()"> Detail </a>--}}
                                        {{--                                        </form>--}}

                                        <a class="btn btn-outline-primary btn-large" target="_blank"
                                           href="{{ route('post.detail.mobile', ['type'=>'textbook', 'id'=>$textbook->id]) }}">
                                            Detail </a>
                                        <form id="editform"
                                              action="{{ route('post.edit', ['type'=>'textbook', 'id'=>$textbook->id]) }}"
                                              method="post">
                                            @csrf
                                            <button class="btn btn-outline-warning btn-large" type="submit"> Edit
                                            </button>
                                        </form>

                                        <form id="deleteform"
                                              action="{{ route('post.delete', ['type'=>'textbook', 'id'=>$textbook->id]) }}"
                                              method="post"
                                              onsubmit="return confirm('Are you sure you want to delete the post?')">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-large" type="submit"> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    <strong>Oops!</strong> You don't have any post yet.
                </div>
            @endif
            <br>
            <li class="list-group-item" style="background: #7abaff">Roommate</li>
            @if(!$roommates->isempty())
                <div class="row">
                    @foreach($roommates as $roommate)
                        <div class="column float-left" style="padding-left: 17px">
                            <div class="card" style="width:350px">
                                <img class="card-img-top"
                                     src="{{ $url }}{{ $roommate->files[0] }}"
                                     alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $roommate->title }}</h4>
                                    <p class="card-text">{{ $roommate->roommate_gen }}</p>
                                    <div class="row" style="justify-content: space-evenly">
                                        <a class="btn btn-outline-primary btn-large" target="_blank"
                                           href="{{ route('post.detail.mobile', ['type'=>'roommate', 'id'=>$roommate->id]) }}">
                                            Detail </a>

                                        <form id="editform"
                                              action="{{ route('post.edit', ['type'=>'roommate', 'id'=>$roommate->id]) }}"
                                              method="post">
                                            @csrf
                                            <button class="btn btn-outline-warning btn-large" type="submit"> Edit
                                            </button>
                                        </form>

                                        <form id="deleteform"
                                              action="{{ route('post.delete', ['type'=>'roommate', 'id'=>$roommate->id]) }}"
                                              method="post"
                                              onsubmit="return confirm('Are you sure you want to delete the post?')">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-large" type="submit"> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    <strong>Oops!</strong> You don't have any post yet.
                </div>
            @endif
            <br>
            <li class="list-group-item" style="background: #7abaff">House</li>
            @if(!$houses->isempty())
                <div class="row">
                    @foreach($houses as $house)
                        <div class="column float-left" style="padding-left: 17px">
                            <div class="card" style="width:350px">
                                <img class="card-img-top"
                                     src="{{ $url }}{{ $house->files[0] }}"
                                     alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $house->title }}</h4>
                                    <p class="card-text">{{ $house->house_type }}</p>
                                    <div class="row" style="justify-content: space-evenly">
                                        <a class="btn btn-outline-primary btn-large" target="_blank"
                                           href="{{ route('post.detail.mobile', ['type'=>'house', 'id'=>$house->id]) }}">
                                            Detail </a>

                                        <form id="editform"
                                              action="{{ route('post.edit', ['type'=>'house', 'id'=>$house->id]) }}"
                                              method="post">
                                            @csrf
                                            <button class="btn btn-outline-warning btn-large" type="submit"> Edit
                                            </button>
                                        </form>

                                        <form id="deleteform"
                                              action="{{ route('post.delete', ['type'=>'house', 'id'=>$house->id]) }}"
                                              method="post"
                                              onsubmit="return confirm('Are you sure you want to delete the post?')">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-large" type="submit"> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    <strong>Oops!</strong> You don't have any post yet.
                </div>
            @endif
            <br>
            <li class="list-group-item" style="background: #7abaff">Others</li>
            @if(!$everything->isempty())
                <div class="row">
                    @foreach($everything as $other)
                        <div class="column float-left" style="padding-left: 17px">
                            <div class="card" style="width:350px">
                                <img class="card-img-top"
                                     src="{{ $url }}{{ $other->files[0] }}"
                                     alt="Card image">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $other->title }}</h4>
                                    <p class="card-text">{{ $other->description }}</p>
                                    <div class="row" style="justify-content: space-evenly">
                                        <a class="btn btn-outline-primary btn-large" target="_blank"
                                           href="{{ route('post.detail.mobile', ['type'=>'general', 'id'=>$other->id]) }}">
                                            Detail </a>

                                        <form id="editform"
                                              action="{{ route('post.edit', ['type'=>'general', 'id'=>$other->id]) }}"
                                              method="post">
                                            @csrf
                                            <button class="btn btn-outline-warning btn-large" type="submit"> Edit
                                            </button>
                                        </form>

                                        <form id="deleteform"
                                              action="{{ route('post.delete', ['type'=>'general', 'id'=>$other->id]) }}"
                                              method="post"
                                              onsubmit="return confirm('Are you sure you want to delete the post?')">
                                            @csrf
                                            <button class="btn btn-outline-danger btn-large" type="submit"> Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info">
                    <strong>Oops!</strong> You don't have any post yet.
                </div>
            @endif
        </ul>
    </div>
</div>

<!-- footer -->
<div class="row text-center" style="margin-top: 100px">

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
                    <a href="{{route('contactus')}}" target="_blank"> Contact Us </a>
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

<script type="text/javascript">
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
        scrollFunction()
    };


    function scrollFunction() {
        var currentScrollPos = window.pageYOffset;
        var width = document.body.clientWidth;
        if (width <= 775) {
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
                document.getElementbyId("main").style.padding = "180px"

            } else {
                document.getElementById("navbar").style.top = "-300px";
            }
            prevScrollpos = currentScrollPos;
        }
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {

            document.getElementById("navbar").style.padding = "1px 10px";
            document.getElementById("title").style.fontSize = "25px";
            document.getElementById("subtitle").style.fontSize = "0px";

        } else {
            document.getElementById("navbar").style.padding = "10px 10px";
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

    window.setTimeout(function () {
        document.getElementById("alert").remove();
    }, 5000);


</script>
</body>
</html>
