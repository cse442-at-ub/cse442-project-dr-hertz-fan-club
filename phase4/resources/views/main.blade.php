<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market</title>

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
            overflow: hidden;
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

        @media screen and (max-width: 540px) {
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

            .iframe {
                display: none;
            }

            #cards {
                width: 40vh;
                margin-left: 8%;
                margin-right: auto;
            }

            body {
                padding-top: 15vh;
                overflow-y: auto;
            }

        }


    </style>
</head>


<body style="min-width: 320px">
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
           style="padding: 12px 20px; margin: 2px; border-radius: 4px">
            Post
        </a>

        <a class="btn btn-info" href="{{route('profile')}}"
           style="padding: 12px 20px; margin: 2px; border-radius: 4px">
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
<div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            {{ Session::get('success') }}
        </div>
    @endif
</div>


<!--Break page into 2 parts, right for details of chosen post, left for all listing-->

<div id="wrapper" style="height: 100%; width: 100%; padding-top: 88px">
    <div class="col-md-12 announcement">
        <div class="list-wrap">
            <div class="list-move">
                <div class="list-item">Notice:</div>
                <div class="list-item">1. We are not responsible for any transaction.</div>
                <div class="list-item">2.</div>
                <div class="list-item">3.</div>
                <div class="list-item">4. Please using Log out button if you want to exit the website.</div>
            </div>
        </div>

    </div>


    <div class="col-sm-12" id="searchbarstuff" style="padding-top: 10px">
        <form action="{{ route ('main') }}" method="GET">
            <select name="category" style="height: 50px; border-radius: 4px">
                <option value="All">All</option>
                <option value="Books">Books</option>
                <option value="Housing">Housing</option>
                <option value="Roommates">Roommates</option>
                <option value="Others">Others</option>
            </select>
            <input type="text" name="search" placeholder="Search...">
            <button class="btn btn-primary" type="submit" style="height: 52px; border-radius: 4px">
                Search
            </button>
        </form>
    </div>

    <div class="col-md-12" id="postwindow" style="padding-top: 25px">

        <div class="row">
            <div class="col-md-7 iframe" >
                {{--                @if(!$posts->isempty())--}}
                {{--                    <iframe src="{{ route('post.detail', ['type'=>'textbook', 'id'=>$posts[0]->id]) }}" style="height: 78vh; width: 60vw; border: none"></iframe>--}}
                {{--                @else--}}
                <iframe src="{{ route('detail') }}" id="detail-page" style="height: 78vh; width: 58vw; border: none;"></iframe>
                {{--                @endif--}}


            </div>

            <div class="col-md-5 cardlist" id="cardlist">
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
                                                        {{--document.write('<a class="btn btn-outline-primary btn-large" target="_blank" onclick={{"document.getElementById('mform').submit()"}}> Learn more </a>');--}}
                                                        {{--document.write('</form>');--}}
                                                        document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'textbook', 'id'=>$post->id]) }}"style="border-radius: 4px" target="_blank" ">Learn more</a>')
                                                    } else {
                                                        {{--document.write('<form action="{{ route('post.textbook.detail', ['type'=>'textbook', 'id'=>$post->id]) }}" method="post">');--}}
                                                        {{--document.write('@csrf');--}}
                                                        {{--document.write('<button class="btn btn-outline-primary btn-large" type="submit"> Learn more </button>');--}}
                                                        {{--document.write('</form>');--}}
                                                        {{--document.write('<a class="btn btn-info" href="{{route('post.detail', ['type'=>'textbook', 'id'=>$post->id])}}"style="border-radius: 4px">Learn more</a>')--}}
                                                        document.write('<a class="btn btn-info" onclick="setRoute(1, {{$post->id}})">Learn more</a>')
                                                    }
                                                </script>
                                                {{--                                                <form action="{{ route('post.textbook.detail', $post->textbook_id) }}"--}}
                                                {{--                                                      method="post">--}}
                                                {{--                                                    @csrf--}}
                                                {{--                                                    <button class="btn btn-outline-primary btn-large" type="submit">--}}
                                                {{--                                                        Learn more--}}
                                                {{--                                                    </button>--}}
                                                {{--                                                </form>--}}
                                            </div>
                                        </div>
                                    </div>
                                @elseif(array_key_exists('roommate_num', $post))

                                    {{--                                roommate part--}}
                                    <div id="cards">
                                        <div class="card" style="background: #1e7e34">
                                            <img class="card-img-top"
                                                 src="{{ $url }}{{ $post->files[0] }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->roommate_gen }}</p>
                                                <script type="text/javascript">
                                                    if (window.innerWidth < 580) {
                                                        document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'roommate', 'id'=>$post->id]) }}"style="border-radius: 4px">Learn more</a>')
                                                    } else {
                                                        document.write('<a class="btn btn-info" onclick="setRoute(2, {{$post->id}})">Learn more</a>')
                                                    }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                @elseif(array_key_exists('house_type', $post))

                                    {{--                                house part--}}
                                    <div id="cards">
                                        <div class="card" style="background: #005cbf">
                                            <img class="card-img-top"
                                                 src="{{ $url }}{{ $post->files[0] }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->house_type }}</p>
                                                <script type="text/javascript">
                                                if (window.innerWidth < 580) {
                                                document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'house', 'id'=>$post->id]) }}"style="border-radius: 4px">Learn more</a>')
                                                } else {
                                                document.write('<a class="btn btn-info" onclick="setRoute(3, {{$post->id}})">Learn more</a>')
                                                }
                                                </script>
                                            </div>
                                        </div>
                                    </div>
                                @else

                                    {{--                                general part--}}
                                    <div id="cards">
                                        <div class="card" style="background: #5a6268">
                                            <img class="card-img-top"
                                                 src="{{ $url }}{{ $post->files[0] }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $post->title }}</h5>
                                                <p class="card-text">{{ $post->con }}</p>
                                                <script type="text/javascript">
                                                    if (window.innerWidth < 580) {
                                                        document.write('<a class="btn btn-info" href="{{ route('post.detail.mobile', ['type'=>'general', 'id'=>$post->id]) }}"style="border-radius: 4px">Learn more</a>')
                                                    } else {
                                                        document.write('<a class="btn btn-info" onclick="setRoute(4, {{$post->id}})">Learn more</a>')
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
                </div>

            </div>
        </div>
    </div>

</div>

<script>
    var prevScrollpos = window.pageYOffset;
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        var currentScrollPos = window.pageYOffset;
        var width = document.body.clientWidth;
        if (width <= 580) {
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-250px";
            }
            prevScrollpos = currentScrollPos;

        }
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


    function setRoute(type, id) {
        let url = "";
        if (type === 1) {
            url = "{{ route('post.detail', ['type'=> 'textbook', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        }else if (type === 2) {
            url = "{{ route('post.detail', ['type'=> 'roommate', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        }else if (type === 3) {
            url = "{{ route('post.detail', ['type'=> 'house', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        }else if (type === 4) {
            url = "{{ route('post.detail', ['type'=> 'general', 'id'=>':id']) }}"
            url = url.replace(':id', id);
        }
        document.getElementById('detail-page').src = url;
    }

</script>
</body>
</html>
