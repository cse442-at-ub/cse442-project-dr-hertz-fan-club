<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market - Help</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <style>
        .collapsible {
            background-color: #5a6268;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
        }

        .active, .collapsible:hover {
            background-color: #0062cc;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;

        }
    </style>

</head>
<body style="min-width: 320px">

<nav class="navbar fixed-top">
    <div class="brand-title">
        UB Market
    </div>
</nav>

<div class="container" style="padding-top: 100px">
    <h1 class="text-center" style="font-size:60px;">Help</h1>

{{--    for buyer--}}

    <h3>Purchase</h3>
    <div class="row">
        <button type="button" class="collapsible">How to contact with seller?</button>
        <div class="content">
            <p>When looking at the post, check the detailed information and there will be contact method on it.</p>
        </div>
        <button type="button" class="collapsible">How to purchase an item?</button>
        <div class="content">
            <p>You have to discuss with seller, we are not responsible for transaction between buyer and seller.</p>
        </div>
        <button type="button" class="collapsible">Where can I see the post?</button>
        <div class="content">
            <p>Once you login, you will enter the page where shows you all the post.</p>
        </div>
        <button type="button" class="collapsible">More</button>
        <div class="content">
            <p></p>
        </div>
    </div>

{{--    for seller--}}

    <h3>Sell</h3>
    <div class="row">
        <button type="button" class="collapsible">How to post my item?</button>
        <div class="content">
            <p>You will need an account to post. Once you login, click the "POST" button, fill in required information and click "Post". Then your post will be created</p>
        </div>
        <button type="button" class="collapsible">waiting to add</button>
        <div class="content">
            <p></p>
        </div>
        <button type="button" class="collapsible">waiting to add</button>
        <div class="content">
            <p></p>
        </div>
        <button type="button" class="collapsible">waiting to add</button>
        <div class="content">
            <p></p>
        </div>
    </div>

<!-- footer -->
        <div class="row text-center" style="padding-top: 5%">
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
                            <a href="{{ route('contactus') }}"> Contact Us </a>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h2>
                            Help
                        </h2>
                        <p>
                            <a href="{{ route('faq') }}"> FAQ </a>
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
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</body>
</html>
