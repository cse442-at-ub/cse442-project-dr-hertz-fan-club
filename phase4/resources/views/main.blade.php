<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market - Main</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css?v=').time()}}" rel="stylesheet" type="text/css">


    <style>
        input[type=text] {
            width: 150px;
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

        input[type=text] {
            width: 20%;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background-image: url('https://inspirationhut.net/wp-content/uploads/2013/05/201.png');
            overflow: hidden;
        }

        #navbar {
            overflow: hidden;
            background-color: #3b3b3b;
            padding: 10px 20px;
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
            padding: 12px 20px;
            margin: 2px;
            border-radius: 4px;
            max-width: 100%;
        }


        .detail-page {
            width: 70vw;
        }

        .detail {
            height: 75vh;
            width: 58vw;
            border: none;
        }

        .wrapper {
            padding-top: 90px;
        }

        .col-s-5 {
            width: 40%;
        }

        .col-s-7 {
            width: 60%;
        }

        .card-img-top {
            width: 100%;
            height: 20vh;
            object-fit: cover;
        }

        @media screen and (max-width: 640px) {
            #wrapper {
                padding-top: 15vh;
            }
        }


        @media screen and (max-width: 580px) {
            #navbar {
                padding: 20px 10px !important;
            }

            #subtitle {
                height: 0%;
            }

            #navbar a {
                float: none;
                display: block;
                text-align: left;
            }

            #navbar-right {
                float: none;
            }

            .detail-page {
                display: none;
            }

            .cardlist {
                width: 100%;
            }


            #cards {
                width: 90vw;
                padding-left: 5%;
                /*margin-left: 7%;*/
                /*margin-right: auto;*/
            }

            .card-img-top {
                width: 100%;
                height: 15vh;
                object-fit: cover;
            }

            body {
                overflow-y: auto;
            }

            .announcement {
                position: fixed;
            }
        }

        @media screen and (min-width: 580px) {
            .phonenav {
                display: none;
            }
        }

        .overlay {
            overflow-x: hidden;
            transition: 0.5s;
        }

        .overlay a:hover, .overlay a:focus {
            color: #f1f1f1;
        }

        .overlay .closebtn {
            position: absolute;
            top: 20px;
            right: 45px;
            font-size: 60px;
        }

        @media screen and (max-height: 580px) {
            .overlay a {font-size: 20px}
            .overlay .closebtn {
                font-size: 40px;
                top: 15px;
                right: 35px;
            }
        }

    </style>
</head>


<body style="min-width: 320px" onload = "AutoRefresh(180000);">
<div class="col-md-12 announcement" style="z-index: 998">
    <div class="list-wrap">
        <div class="list-move">
            <div class="list-item">Notice:</div>  <!-- RIP my eyes -->
            <div class="list-item">1. We are not responsible for any transactions.</div>
            <div class="list-item">2. If you send a message through one of the posts listed in UB Market, your name
                and email will be given to the owner of the selected post.
            </div>
            <div class="list-item">3. If you notice any suspicious activity on your account, please change your
                password in your profile settings.
            </div>
            <div class="list-item">4. Please using Log out button if you want to exit the website.</div>
        </div>
    </div>

</div>

<div class="overlay" id="navbar" style="margin-top: 40px">

    <a href="javascript:void(0)" class="closebtn phonenav" onclick="closeNav()">&times;</a>

    <div class="overlay-content">
        <a class="phonenav" style="font-size:30px;cursor:pointer; margin-right: auto" onclick="openNav()">&#9776;</a>
        <a id="title" style="font-size: 35px" href="{{ route('landing') }}">
            UB Market
        </a>

        <a id="subtitle" style="font-size: 25px">
            @auth
                <p>Hello, {{ auth()->user()->name }}</p>
            @endauth
        </a>

        <div class="d-flex" id="navbar-right">

            <a class="btn btn-primary" href="{{route('post')}}">
                Post
            </a>

            <a class="btn btn-info" href="{{route('profile')}}">
                Profile
            </a>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class="btn btn-danger" style="padding: 12px 20px 13px 12px; margin: 2px; border-radius: 4px"
                        type="submit">
                    Log out
                </button>
            </form>

        </div>
    </div>
</div>
<div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            {{ Session::get('success') }}
        </div>
    @endif
</div>


<!--Break page into 2 parts, right for details of chosen post, left for all listing-->

<div class="wrapper" id="wrapper" style="height: 100%; width: 100%;">


    <div class="col-sm-12" id="searchbarstuff" style="padding-top: 10px">
        <form action="{{ route ('main') }}" method="GET">
            <select name="category" style="height: 50px; border-radius: 4px" id="category"
                    value="{{ request('category') }}">
                @if(request('category') == 'All')
                    <option value="All" selected>All</option>
                    <option value="Books">Books</option>
                    <option value="Housing">Housing</option>
                    <option value="Roommates">Roommates</option>
                    <option value="Others">Others</option>
                @elseif(request('category') == 'Books')
                    <option value="All">All</option>
                    <option value="Books" selected>Books</option>
                    <option value="Housing">Housing</option>
                    <option value="Roommates">Roommates</option>
                    <option value="Others">Others</option>
                @elseif(request('category') == 'Housing')
                    <option value="All">All</option>
                    <option value="Books">Books</option>
                    <option value="Housing" selected>Housing</option>
                    <option value="Roommates">Roommates</option>
                    <option value="Others">Others</option>
                @elseif(request('category') == 'Roommates')
                    <option value="All">All</option>
                    <option value="Books">Books</option>
                    <option value="Housing">Housing</option>
                    <option value="Roommates" selected>Roommates</option>
                    <option value="Others">Others</option>
                @elseif(request('category') == 'Others')
                    <option value="All">All</option>
                    <option value="Books">Books</option>
                    <option value="Housing">Housing</option>
                    <option value="Roommates">Roommates</option>
                    <option value="Others" selected>Others</option>
                @else
                    <option value="All">All</option>
                    <option value="Books">Books</option>
                    <option value="Housing">Housing</option>
                    <option value="Roommates">Roommates</option>
                    <option value="Others">Others</option>
                @endif
            </select>
            <input type="text" name="search" id="search" placeholder="Search..." value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit" style="height: 52px; border-radius: 4px">
                Search
            </button>
        </form>
    </div>

    <div class="col-md-12 flex flex-wrap" id="postwindow" style="padding-top: 25px">

        <div class="row">
            <div class="col-s-7 detail-page" id="detail-page" style="overflow-x: hidden">
                <iframe src="{{ route('detail') }}" class="detail" id="detail">
                </iframe>
            </div>

            <div class="col-s-5 cardlist" id="cardlist" style="overflow-x: hidden">
                <div class="container scroll">
                    <div class="row">
                        @if(!$posts->isempty())
                            @foreach($posts as $post)
                                @if(array_key_exists('course', $post))

                                    {{--                                textbook part--}}
                                    <div id="cards">
                                        <div class="card" style="background: #9fcdff">
                                            <img class="card-img-top"
                                                 src="{{ $url }}{{ $post->files[0] }}"
                                                 alt="x">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->course }}{{ $post->course_num }}</p>

                                                <script type="text/javascript">
                                                    if (window.innerWidth < 580) {
                                                        {{--document.write('<form id="mform" action="{{ route('post.textbook.detail.mobile', ['type'=>'textbook', 'id'=>$post->id]) }}" method="post">');--}}
                                                        {{--document.write('@csrf');--}}
                                                        {{--document.write('<a class="btn btn-outline-primary btn-large" target="_blank" onclick={{"document.getElementById('mform').submit()"}}> View Details </a>');--}}
                                                        {{--document.write('</form>');--}}
                                                        document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'textbook', 'id'=>$post->id]) }}"style="border-radius: 4px" target="_blank">View Details</a>')
                                                    } else {
                                                        {{--document.write('<form action="{{ route('post.textbook.detail', ['type'=>'textbook', 'id'=>$post->id]) }}" method="post">');--}}
                                                        {{--document.write('@csrf');--}}
                                                        {{--document.write('<button class="btn btn-outline-primary btn-large" type="submit"> View Details </button>');--}}
                                                        {{--document.write('</form>');--}}
                                                        {{--document.write('<a class="btn btn-info" href="{{route('post.detail', ['type'=>'textbook', 'id'=>$post->id])}}"style="border-radius: 4px">View Details</a>')--}}
                                                        document.write('<a class="btn btn-info" onclick="setRoute(1, {{$post->id}})">View Details</a>')
                                                    }
                                                </script>
                                                {{--                                                <form action="{{ route('post.textbook.detail', $post->textbook_id) }}"--}}
                                                {{--                                                      method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <button class="btn btn-outline-primary btn-large" type="submit">--}}
                                                {{--                                                        View Details--}}
                                                {{--                                                    </button>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                @elseif(array_key_exists('roommate_num', $post))

                                    {{--                                roommate part--}}
                                    <div id="cards">
                                        <div class="card" style="background: #8fd19e">
                                            <img class="card-img-top"
                                                 src="{{ $url }}{{ $post->files[0] }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->roommate_gen }}</p>
                                                <script type="text/javascript">
                                                    if (window.innerWidth < 580) {
                                                        document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'roommate', 'id'=>$post->id]) }}"style="border-radius: 4px" target="_blank" ">View Details</a>')
                                                    } else {
                                                        document.write('<a class="btn btn-info" onclick="setRoute(2, {{$post->id}})">View Details</a>')
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                @elseif(array_key_exists('house_type', $post))

                                    {{--                                house part--}}
                                    <div id="cards">
                                        <div class="card" style="background: #0c9970">
                                            <img class="card-img-top"
                                                 src="{{ $url }}{{ $post->files[0] }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->house_type }}</p>
                                                <script type="text/javascript">
                                                    if (window.innerWidth < 580) {
                                                        document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'house', 'id'=>$post->id]) }}"style="border-radius: 4px" target="_blank" ">View Details</a>')
                                                    } else {
                                                        document.write('<a class="btn btn-info" onclick="setRoute(3, {{$post->id}})">View Details</a>')
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    {{--                                general part--}}
                                    <div id="cards">
                                        <div class="card" style="background: #b3b7bb">
                                            <img class="card-img-top"
                                                 src="{{ $url }}{{ $post->files[0] }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->con }}</p>
                                                <script type="text/javascript">
                                                    if (window.innerWidth < 580) {
                                                        document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'general', 'id'=>$post->id]) }}"style="border-radius: 4px" target="_blank" ">View Details</a>')
                                                    } else {
                                                        document.write('<a class="btn btn-info" onclick="setRoute(4, {{$post->id}})">View Details</a>')
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                            @endforeach

                        @endif

                    </div>
                    <br>
                    <br>
                    <p class="text-center">----------You reach our bottom line----------</p>
                    <div class="row text-center" style="margin-top: 50px">
                        <div class="col-sm-12" style="align-content: center">


                            <h5>
                                About Us
                            </h5>
                            <p>
                                <a href="{{ route('aboutus') }}"> About Us </a>
                            </p>

                            <h5>
                                Resources
                            </h5>
                            <p>
                                <a href="https://laravel.com/docs/8.x/releases" target="_blank"> Laravel </a>
                            </p>

                            <h5>
                                Contact
                            </h5>
                            <p>
                                <a href="{{route('contactus')}}"> Contact Us</a>
                            </p>

                            <h5>
                                Help
                            </h5>
                            <p>
                                <a href="{{route('faq')}}"> FAQ </a>
                            </p>


                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <p>
                                Copyright © 2021 Power by Dr. Hertz Fan Club
                            </p>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

<script>
    // var prevScrollpos = window.pageYOffset;
    // window.onscroll = function () {
    //     scrollFunction()
    // };
    //
    // function scrollFunction() {
    //     var currentScrollPos = window.pageYOffset;
    //     var width = document.body.clientWidth;
    //     if (width <= 580) {
    //         if (prevScrollpos > currentScrollPos) {
    //             document.getElementById("navbar").style.top = "0";
    //         } else {
    //             document.getElementById("navbar").style.display = "-250px";
    //         }
    //         prevScrollpos = currentScrollPos;
    //
    //     }
        // if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        //
        //     document.getElementById("navbar").style.padding = "1px 1px";
        //     document.getElementById("title").style.fontSize = "35px";
        //     document.getElementById("subtitle").style.fontSize = "0px";
        //
        //
        // } else {
        //     document.getElementById("navbar").style.padding = "2px 2px";
        //     document.getElementById("title").style.fontSize = "45px";
        //     document.getElementById("subtitle").style.fontSize = "25px";
        //
        // }


    //}

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


    function setRoute(type, id) {
        let url = "";
        if (type === 1) {
            url = "{{ route('post.detail', ['type'=> 'textbook', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        } else if (type === 2) {
            url = "{{ route('post.detail', ['type'=> 'roommate', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        } else if (type === 3) {
            url = "{{ route('post.detail', ['type'=> 'house', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        } else if (type === 4) {
            url = "{{ route('post.detail', ['type'=> 'general', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        }
        document.getElementById('detail').src = url;
    }

    function openNav() {
        document.getElementById("navbar").style.height = "300px";
    }

    function closeNav() {
        document.getElementById("navbar").style.height = "70px";
    }

    function AutoRefresh( t ) {
        setTimeout("location.reload(true);", t);
    }

</script>
</body>
</html>
