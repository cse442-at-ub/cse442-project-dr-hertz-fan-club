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
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
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

<nav class="navbar fixed-top">
    <div class="brand-title">
        UB Market
    </div>
</nav>

<div class="container" style="padding-top: 100px">
    <h1 class="text-center" style="font-size:60px;">About Us</h1>

    <div class="row">
        <button type="button" class="collapsible">Who are we?</button>
        <div class="content">
            <p>We are students from the University at Buffalo. We are currently taking CSE 442: Software Engineering.
			<br>
			Below, you will see a picture of our team.</p>
			<img src="https://cdn.discordapp.com/attachments/163096545984643072/822316616636301352/aboutus.gif" alt="Dr. Hertz Fan Club">
        </div>
        <button type="button" class="collapsible">What made us create this website?</button>
        <div class="content">
            <p>We wanted to create a community for students of University at Buffalo where people can buy and sell their textbooks, find off-campus housing, and search for potential roommates with ease.</p>
        </div>
        <button type="button" class="collapsible">What makes us different from Facebook Marketplace and Craigslist?</button>
        <div class="content">
            <p>Unlike Facebook Marketplace and Craigslist, we only allow people from the University at Buffalo to register an account. To ensure that everyone in our community is from University at Buffalo, we only allow people with an email ending with "@buffalo.edu".</p>
        </div>
        <button type="button" class="collapsible">Is there a way to contact us?</button>
        <div class="content">
            <p>Yes! Feel free to contact us through <a href="{{ route('contactus') }}"> this page</a>.</p>
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
                            <a href="{{ route('aboutus') }}"> About Us </a>
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
