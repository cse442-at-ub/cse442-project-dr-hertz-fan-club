<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market - Contact Us</title>

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
<body>
<! -- Nav Bar -->
<div id="navbar">
    <a id="title" style="font-size: 35px">
        UB Market
    </a>
    <div class="d-flex" id="navbar-right">

    </div>
</div>

<div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            {{ Session::get('success') }}
        </div>
    @endif
</div>

{{--<div>--}}
{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}

<div class="container" style="margin-top: 300px">

    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h3 class="text-center">
                Need Help? Contact Us!
            </h3>
            <br>
            <br>
            <form action="{{ route('contactus') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputName">
                        Name
                    </label>
                    <input class="form-control" id="inputName" name="inputName" placeholder="Required" required>
                </div>

                <div class="form-group">
                    <label for="inputEmail">
                        Email
                    </label>
                    <input class="form-control" id="inputEmail" name="inputEmail" placeholder="Required" required>
                </div>

                @error('inputEmail')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <div class="form-group">
                    <label for="inputPhoneNumber">
                        Phone Number
                    </label>
                    <input class="form-control" id="inputPhoneNumber" name="inputPhoneNumber" placeholder="Optional">
                </div>

                @error('inputPhoneNumber')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <div class="dropdown">
                    <label for="topic">
                        Topic:
                    </label>
                    <select class="dropdown-toggle" style="border-radius: 4px" id="topic" name="topic" type="button"
                            data-toggle="dropdown" required>
                        <option class="dropdown-item" value="" selected disabled> Please Select A Topic</option>
                        <option class="dropdown-item" value="Unable to sign up or log in"> Unable to sign up or log in
                        </option>
                        <option class="dropdown-item" value="Request to delete account"> Request to delete account
                        </option>
                        <option class="dropdown-item" value="Report a bug"> Report a bug</option>
                        <option class="dropdown-item" value="Feedback"> Feedback</option>
                        <option class="dropdown-item" value="Other"> Other</option>
                    </select>
                </div>

                @error('topic')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="contactDescription">Description:</label>
                <textarea class="form-control" name="contactDescription" id="contactDescription" rows="10"
                          placeholder="Required" required></textarea>

                @error('contactDescription')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <div class="form-group">

                    <label for="inputFile">
                        File input (Optional)
                    </label>
                    <input type="file" class="form-control-file" id="inputFile" name='inputFile'>
                    <p class="help-block">
                        Please attach all necessary files.
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">
                    Send
                </button>
                <br>
                <br>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>


<script src={{asset('js/app.js')}}></script>
<script>
    window.onscroll = function () {
        scrollFunction()
    };

    var prevScrollpos = window.pageYOffset;

    function scrollFunction() {
        var currentScrollPos = window.pageYOffset;
        var width = document.body.clientWidth;
        if (width <= 375) {
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-300px";
            }
            prevScrollpos = currentScrollPos;
        }
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {

            document.getElementById("navbar").style.padding = "20px 10px";
            document.getElementById("title").style.fontSize = "25px";
            document.getElementById("subtitle").style.fontSize = "0px";

        } else {
            document.getElementById("navbar").style.padding = "100px 10px";
            document.getElementById("title").style.fontSize = "35px";
            document.getElementById("subtitle").style.fontSize = "25px";
        }


    }

    window.setTimeout(function () {
        document.getElementById("alert").remove();
    }, 5000);

</script>
</body>
</html>
