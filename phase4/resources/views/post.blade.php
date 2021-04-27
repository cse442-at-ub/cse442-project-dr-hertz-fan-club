<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market - Create A Post</title>

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
            padding: 10px;
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
/*
        select {
            border-radius: 4px;
            height: 3vh;
        }
*/
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
<body onload="hideListings()">

<! -- Nav Bar -->
<div id="navbar">
    <a id="title" style="font-size: 35px">
        UB Market
    </a>

    <div class="d-flex" id="navbar-right">
        <a class="btn btn-danger" href="{{ route('main') }}" style="padding: 12px 20px 13px 12px; border-radius: 4px">
            Cancel
        </a>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container-fluid" style="margin-top: 300px">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h3 class="text-center">
                Create A Post
            </h3>
            <br>
            <h4 class="text-center">
                Select Listing Type
            </h4>
            <br>
            <div class="row">
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('textbookListing')">
                        Textbook Listing
                    </button>
                </div>
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('housingListing')">
                        Housing Listing
                    </button>
                </div>
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('roommateListing')">
                        Roommate Listing
                    </button>
                </div>
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('genericListing')">
                        General Listing
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="textbookListing">
            <form role="form" action="{{ route('post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <h4 class="text-center">
                    Textbook Listing
                </h4>

                <br>
                <label for="textbook_title">Textbook Name:</label>
                <input id="textbook_title" name="textbook_title" type="text" class="form-control" maxlength="50" placeholder="Required" value="{{old('textbook_title')}}" required >

                @error('textbook_title')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="textbook_condition">Textbook Condition:</label>
                <div class="dropdown">
                    <select id="textbook_condition" name= "textbook_condition" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" required >
                        <option class="dropdown-item" value="Brand New" {{ old('textbook_condition') == "Brand New" ? 'selected' : '' }}> Brand New </option>
                        <option class="dropdown-item" value="Like New" {{ old('textbook_condition') == "Like New" ? 'selected' : '' }}> Like New </option>
                        <option class="dropdown-item" value="Very Good" {{ old('textbook_condition') == "Very Good" ? 'selected' : '' }}> Very Good </option>
                        <option class="dropdown-item" value="Good" {{ old('textbook_condition') == "Good" ? 'selected' : '' }}> Good </option>
                        <option class="dropdown-item" value="Poor" {{ old('textbook_condition') == "Poor" ? 'selected' : '' }}> Poor </option>
                    </select>
                </div>

                @error('textbook_condition')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="course">Course:</label>
                <div class="dropdown">
                    <select id="course" name="course" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" required>
                        <option class="dropdown-item" value="AAS"> AAS </option>
                        <option class="dropdown-item" value="ASL"> ASL </option>
                        <option class="dropdown-item" value="AMS"> AMS </option>
                        <option class="dropdown-item" value="APY"> APY </option>
                        <option class="dropdown-item" value="ARI"> ARI </option>
                        <option class="dropdown-item" value="ARC"> ARC </option>
                        <option class="dropdown-item" value="ART"> ART </option>
                        <option class="dropdown-item" value="AHI"> AHI </option>
                        <option class="dropdown-item" value="AS"> AS </option>
                        <option class="dropdown-item" value="BCH"> BCH </option>
                        <option class="dropdown-item" value="BIO"> BIO </option>
                        <option class="dropdown-item" value="BE"> BE </option>
                        <option class="dropdown-item" value="BMI"> BMI </option>
                        <option class="dropdown-item" value="BMS"> BMS </option>
                        <option class="dropdown-item" value="STA"> STA </option>
                        <option class="dropdown-item" value="CE"> CE </option>
                        <option class="dropdown-item" value="CHE"> CHE </option>
                        <option class="dropdown-item" value="CHI"> CHI </option>
                        <option class="dropdown-item" value="CIE"> CIE </option>
                        <option class="dropdown-item" value="CL"> CL </option>
                        <option class="dropdown-item" value="COM"> COM </option>
                        <option class="dropdown-item" value="CDS"> CDS </option>
                        <option class="dropdown-item" value="CHB"> CHB </option>
                        <option class="dropdown-item" value="COL"> COL </option>
                        <option class="dropdown-item" value="CDA"> CDA </option>
                        <option class="dropdown-item" value="CSE"> CSE </option>
                        <option class="dropdown-item" value="CPM"> CPM </option>
                        <option class="dropdown-item" value="CEP"> CEP </option>
                        <option class="dropdown-item" value="DAC"> DAC </option>
                        <option class="dropdown-item" value="ECO"> ECO </option>
                        <option class="dropdown-item" value="ELP"> ELP </option>
                        <option class="dropdown-item" value="EE"> EE </option>
                        <option class="dropdown-item" value="EAS"> EAS </option>
                        <option class="dropdown-item" value="ENG"> ENG </option>
                        <option class="dropdown-item" value="ESL"> ESL </option>
                        <option class="dropdown-item" value="EVS"> EVS </option>
                        <option class="dropdown-item" value="END"> END </option>
                        <option class="dropdown-item" value="ES"> ES </option>
                        <option class="dropdown-item" value="FR"> FR </option>
                        <option class="dropdown-item" value="MGG"> MGG </option>
                        <option class="dropdown-item" value="GEO"> GEO </option>
                        <option class="dropdown-item" value="GLY"> GLY </option>
                        <option class="dropdown-item" value="GER"> GER </option>
                        <option class="dropdown-item" value="GGS"> GGS </option>
                        <option class="dropdown-item" value="GR"> GR </option>
                        <option class="dropdown-item" value="GRE"> GRE </option>
                        <option class="dropdown-item" value="HEB"> HEB </option>
                        <option class="dropdown-item" value="HIN"> HIN </option>
                        <option class="dropdown-item" value="HIS"> HIS </option>
                        <option class="dropdown-item" value="HON"> HON </option>
                        <option class="dropdown-item" value="IE"> IE </option>
                        <option class="dropdown-item" value="ITA"> ITA </option>
                        <option class="dropdown-item" value="JPN"> JPN </option>
                        <option class="dropdown-item" value="JDS"> JDS </option>
                        <option class="dropdown-item" value="KOR"> KOR </option>
                        <option class="dropdown-item" value="LAT"> LAT </option>
                        <option class="dropdown-item" value="LLS"> LLS </option>
                        <option class="dropdown-item" value="LAW"> LAW </option>
                        <option class="dropdown-item" value="ULC"> ULC </option>
                        <option class="dropdown-item" value="LAI"> LAI </option>
                        <option class="dropdown-item" value="LIS"> LIS </option>
                        <option class="dropdown-item" value="LIN"> LIN </option>
                        <option class="dropdown-item" value="MGA"> MGA </option>
                        <option class="dropdown-item" value="MGE"> MGE </option>
                        <option class="dropdown-item" value="MGF"> MGF </option>
                        <option class="dropdown-item" value="MGI"> MGI </option>
                        <option class="dropdown-item" value="MGM"> MGM </option>
                        <option class="dropdown-item" value="MGO"> MGO </option>
                        <option class="dropdown-item" value="MGQ"> MGQ </option>
                        <option class="dropdown-item" value="MGS"> MGS </option>
                        <option class="dropdown-item" value="MGT"> MGT </option>
                        <option class="dropdown-item" value="MDI"> MDI </option>
                        <option class="dropdown-item" value="MTH"> MTH </option>
                        <option class="dropdown-item" value="MAE"> MAE </option>
                        <option class="dropdown-item" value="DMS"> DMS </option>
                        <option class="dropdown-item" value="MT"> MT </option>
                        <option class="dropdown-item" value="MCH"> MCH </option>
                        <option class="dropdown-item" value="MIC"> MIC </option>
                        <option class="dropdown-item" value="MLS"> MLS </option>
                        <option class="dropdown-item" value="MUS"> MUS </option>
                        <option class="dropdown-item" value="MTR"> MTR </option>
                        <option class="dropdown-item" value="NRS"> NRS </option>
                        <option class="dropdown-item" value="NMD"> NMD </option>
                        <option class="dropdown-item" value="NTR" id=> NTR </option>
                        <option class="dropdown-item" value="OT" id=> OT </option>
                        <option class="dropdown-item" value="MGB" id=> MGB </option>
                        <option class="dropdown-item" value="PAS" id=> PAS </option>
                        <option class="dropdown-item" value="PHC" id=> PHC </option>
                        <option class="dropdown-item" value="PMY" id=> PMY </option>
                        <option class="dropdown-item" value="PHM" id=> PHM </option>
                        <option class="dropdown-item" value="PHI" id=> PHI </option>
                        <option class="dropdown-item" value="PHY" id=> PHY </option>
                        <option class="dropdown-item" value="PGY" id=> PGY </option>
                        <option class="dropdown-item" value="POL" id=> POL </option>
                        <option class="dropdown-item" value="PS" id=> PS </option>
                        <option class="dropdown-item" value="PSY" id=> PSY </option>
                        <option class="dropdown-item" value="PUB" id=> PUB </option>
                        <option class="dropdown-item" value="NBC" id=> NBC </option>
                        <option class="dropdown-item" value="REC" id=> REC </option>
                        <option class="dropdown-item" value="RLL" id=> RLL </option>
                        <option class="dropdown-item" value="RUS" id=> RUS </option>
                        <option class="dropdown-item" value="SSC" id=> SSC </option>
                        <option class="dropdown-item" value="SW" id=> SW </option>
                        <option class="dropdown-item" value="SOC" id=> SOC </option>
                        <option class="dropdown-item" value="SPA" id=> SPA </option>
                        <option class="dropdown-item" value="TH" id=> TH </option>
                        <option class="dropdown-item" value="NBS" id=> NBS </option>
                        <option class="dropdown-item" value="UGC" id=> UGC </option>
                        <option class="dropdown-item" value="UE" id=> UE </option>
                        <option class="dropdown-item" value="NSG" id=> NSG </option>
                        <option class="dropdown-item" value="YID" id="YID"> YID </option>
                    </select>
                </div>

                @error('course')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="course_num">Course Number:</label>
                <input id="course_num" name="course_num" class="form-control" placeholder="101" minlength="3" maxlength="3" value="{{old('course_num')}}"required>

                @error('course_num')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="price">Price:</label>
                <input id="price" name="price" class="form-control" placeholder="&#36" value="{{old('price')}}" required>

                @error('price')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="textbookDescription">Description:</label>
                <textarea class="form-control" id="textbookDescription" name="textbookDescription" rows="10" maxlength="255" required>{{{ old('textbookDescription') }}}</textarea>

                @error('textbookDescription')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <br>
                <div class="form-group">
                    <label for="textbookfile">
                        File input (Required)
                    </label>
                    <input type="file" name='textbookfile[]' accept="image/*" class="form-control-file" id="textbookfile" multiple required>
                    <p class="help-block">
                        Please attach picture(s) of the textbook.
                    </p>
                </div>
                <br>
                <input type="submit" name="create" class="btn btn-success btn-block" value= "Post">
                <br>
                <br>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="housingListing">
            <form role="form" action="{{ route('post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <h4 class="text-center">
                    Off-Campus Housing Listing
                </h4>
                <br>
                <h6> Title:
                </h6>
                <input name="house_title" type="text" class="form-control" placeholder="Required" required >
                <br>
                <h6> Housing Type:
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="housingType" name="housingType">
                        <option class="dropdown-item" value="" selected disabled> Select Housing Type</option>
                        <option class="dropdown-item" value="Whole House"> Whole House</option>
                        <option class="dropdown-item" value="Upper Flat"> Upper Flat</option>
                        <option class="dropdown-item" value="Lower Flat"> Lower Flat</option>
                        <option class="dropdown-item" value="Apartment"> Apartment</option>
                    </select>
                </div>
                <br>
                <h6> Number of Bedrooms:
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="bedrooms" name="bedrooms">
                        <option class="dropdown-item" value="" selected disabled> Select A Number</option>
                        <option class="dropdown-item" value="1"> 1</option>
                        <option class="dropdown-item" value="2"> 2</option>
                        <option class="dropdown-item" value="3"> 3</option>
                        <option class="dropdown-item" value="4"> 4</option>
                        <option class="dropdown-item" value="5"> 5</option>
                        <option class="dropdown-item" value="6"> 6</option>
                        <option class="dropdown-item" value="7"> 7</option>
                        <option class="dropdown-item" value="8"> 8</option>
                        <option class="dropdown-item" value="9"> 9</option>
                        <option class="dropdown-item" value="10"> 10</option>
                        <option class="dropdown-item" value="11"> 11</option>
                        <option class="dropdown-item" value="12"> 12</option>
                    </select>
                </div>
                <br>
                <h6> Number of Bathrooms:
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="bathrooms" name="bathrooms">
                        <option class="dropdown-item" value="" selected disabled> Select A Number</option>
                        <option class="dropdown-item" value="1"> 1</option>
                        <option class="dropdown-item" value="2"> 2</option>
                        <option class="dropdown-item" value="3"> 3</option>
                        <option class="dropdown-item" value="4"> 4</option>
                        <option class="dropdown-item" value="5"> 5</option>
                        <option class="dropdown-item" value="6"> 6</option>
                        <option class="dropdown-item" value="7"> 7</option>
                        <option class="dropdown-item" value="8"> 8</option>
                        <option class="dropdown-item" value="9"> 9</option>
                        <option class="dropdown-item" value="10"> 10</option>
                        <option class="dropdown-item" value="11"> 11</option>
                        <option class="dropdown-item" value="12"> 12</option>
                    </select>
                </div>
                <br>
                <h6> Description:
                </h6>
                <textarea class="form-control" id="housingDescription" name="housingDescription" placeholder="Required" rows="10"></textarea>
                <br>
                <h6> Address:
                </h6>
                <textarea class="form-control" id="address" name="address" rows="5" placeholder="Required" required></textarea>
                <br>
                <div class="form-group">
                    <label for="housingfile">
                        File input (Required)
                    </label>
                    <input type="file" name='housingfile[]' accept="image/*" class="form-control-file" id="housingfile" multiple required>
                    <p class="help-block">
                        Please attach picture(s) of the housing.
                    </p>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-block">
                    Create A Housing Post
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="roommateListing">
            <h4 class="text-center">
                Roommate Listing
            </h4>
            <form role="form" action="{{ route('post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <h6> Title:
                </h6>
                <input name="roommate_title" type="text" class="form-control" placeholder="Required" required >
                <br>
                <h6> How many roommate(s) are you looking for?
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="roommates" name="roommates">
                        <option class="dropdown-item" value="" selected disabled> Select A Number</option>
                        <option class="dropdown-item" value="1"> 1</option>
                        <option class="dropdown-item" value="2"> 2</option>
                        <option class="dropdown-item" value="3"> 3</option>
                        <option class="dropdown-item" value="4"> 4</option>
                        <option class="dropdown-item" value="5"> 5</option>
                        <option class="dropdown-item" value="6"> 6</option>
                        <option class="dropdown-item" value="7"> 7</option>
                        <option class="dropdown-item" value="8"> 8</option>
                        <option class="dropdown-item" value="9"> 9</option>
                        <option class="dropdown-item" value="10"> 10</option>
                        <option class="dropdown-item" value="11"> 11</option>
                        <option class="dropdown-item" value="12"> 12</option>
                    </select>
                </div>
                <br>
                <h6> Preference on gender of roommate(s)?
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="preference" name="preference">
                        <option class="dropdown-item" value="" selected disabled> Select Preference</option>
                        <option class="dropdown-item" value="Female Only"> Female Only</option>
                        <option class="dropdown-item" value="Male Only"> Male Only</option>
                        <option class="dropdown-item" value="Any Gender"> Any Gender</option>
                        <option class="dropdown-item" value="Other"> Other</option>
                    </select>
                </div>
                <br>
                <h6> Description:
                </h6>
                <label for="roommateDescription"></label><textarea class="form-control"
                                                                   id="roommateDescription" name="roommateDescription"  rows="10" placeholder="Required" required></textarea>
                <br>
                <div class="form-group">
                    <label for="roommatefile">
                        File input (Required)
                    </label>
                    <input type="file" name='roommatefile[]' accept="image/*" class="form-control-file" id="roommatefile" multiple required>
                    <p class="help-block">
                        Please attach picture(s).
                    </p>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-block">
                    Create A Roommate Post
                </button>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="genericListing">
            <form role="form" action="{{ route('post')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <h4 class="text-center">
                    General Listing
                </h4>
                <br>
                <h6> Title:
                </h6>
                <input name="generic_title" type="text" class="form-control" placeholder="Required" required >
                <br>
                <h6> Item Condition:
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="conditionGeneric" name="conditionGeneric">
                        <option class="dropdown-item" value="" selected disabled> Select Condition</option>
                        <option class="dropdown-item" value="Brand New"> Brand New</option>
                        <option class="dropdown-item" value="Like New"> Like New</option>
                        <option class="dropdown-item" value="Very Good"> Very Good</option>
                        <option class="dropdown-item" value="Good"> Good</option>
                        <option class="dropdown-item" value="Poor"> Poor</option>
                    </select>
                </div>
                <br>
                <h6> Description:
                </h6>
                <textarea class="form-control" id="genericDescription" name="genericDescription" rows="10" placeholder="Required"></textarea>
                <br>
                <div class="form-group">
                    <label for="genericfile">
                        File input (Required)
                    </label>
                    <input type="file" name='genericfile[]' accept="image/*" class="form-control-file" id="genericfile" multiple required>
                    <p class="help-block">
                        Please attach picture(s) of the item.
                    </p>
                </div>
                <br>
                <button type="submit" class="btn btn-success btn-block">
                    Create a Post
                </button>
            </form>
        </div>
    </div>
    <br>
    <br>
</div>


<script type="text/javascript">
    function hideListings() {
        document.getElementById("textbookListing").style.display = "none";
        document.getElementById("housingListing").style.display = "none";
        document.getElementById("roommateListing").style.display = "none";
        document.getElementById("genericListing").style.display = "none";
    }


    function showListing(type) {
        document.getElementById(type).style.display = "block";
        if (type === "textbookListing") {
            document.getElementById("housingListing").style.display = "none";
            document.getElementById("roommateListing").style.display = "none";
            document.getElementById("genericListing").style.display = "none";
        } else if (type === "housingListing") {
            document.getElementById("textbookListing").style.display = "none";
            document.getElementById("roommateListing").style.display = "none";
            document.getElementById("genericListing").style.display = "none";
        } else if (type === "roommateListing") {
            document.getElementById("textbookListing").style.display = "none";
            document.getElementById("housingListing").style.display = "none";
            document.getElementById("genericListing").style.display = "none";
        } else if (type === "genericListing") {
            document.getElementById("textbookListing").style.display = "none";
            document.getElementById("housingListing").style.display = "none";
            document.getElementById("roommateListing").style.display = "none";
        }


    }

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
                document.getElementById("navbar").style.top = "-30px";
            }
            prevScrollpos = currentScrollPos;
        }
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {

            document.getElementById("navbar").style.padding = "	0px 10px";
            document.getElementById("title").style.fontSize = "25px";
            document.getElementById("subtitle").style.fontSize = "15px";

        } else {
            document.getElementById("navbar").style.padding = "10px 10px";
            document.getElementById("title").style.fontSize = "35px";
            document.getElementById("subtitle").style.fontSize = "15px";
        }


    }

    window.setTimeout(function () {
        document.getElementById("alert").remove();
    }, 5000);
</script>
</body>
</html>
