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
                <div class="col-md-4">

                    <button type="button" class="btn btn-success" onclick="showListing('textbookListing')">
                        Textbook Listing
                    </button>
                </div>
                <div class="col-md-4">

                    <button type="button" class="btn btn-success" onclick="showListing('housingListing')">
                        Off-Campus Listing
                    </button>
                </div>
                <div class="col-md-4">

                    <button type="button" class="btn btn-success" onclick="showListing('roommateListing')">
                        Roommate Listing
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
            <h4 class="text-center">
                Textbook Contact Information
            </h4>
            <form role="form">
                <div class="form-group">

                    <label for="inputNameTextbook">
                        Name
                    </label>
                    <input class="form-control" id="inputNameTextbook" placeholder="Required">
                </div>
                <div class="form-group">

                    <label for="inputEmailTextbook">
                        Email
                    </label>
                    <input class="form-control" id="inputEmailTextbook" placeholder="Required">
                </div>
                <div class="form-group">

                    <label for="inputPhoneNumberTextbook">
                        Phone Number
                    </label>
                    <input class="form-control" id="inputPhoneNumberTextbook" placeholder="Required">
                </div>

                <br>
                <h4 class="text-center">
                    Textbook Description
                </h4>
                <br>
                <h6> Textbook Condition:
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="condition">
                        <option class="dropdown-item" value="" selected disabled> Select Condition</option>
                        <option class="dropdown-item" value="Brand New"> Brand New</option>
                        <option class="dropdown-item" value="Like New"> Like New</option>
                        <option class="dropdown-item" value="Very Good"> Very Good</option>
                        <option class="dropdown-item" value="Good"> Good</option>
                        <option class="dropdown-item" value="Poor"> Poor</option>
                    </select>
                </div>
                <br>
                <h6> Course
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="course">
                        <option class="dropdown-item" value="None"> None</option>
                        <option class="dropdown-item" value="AAS"> AAS</option>
                        <option class="dropdown-item" value="ASL"> ASL</option>
                        <option class="dropdown-item" value="AMS"> AMS</option>
                        <option class="dropdown-item" value="APY"> APY</option>
                        <option class="dropdown-item" value="ARI"> ARI</option>
                        <option class="dropdown-item" value="ARC"> ARC</option>
                        <option class="dropdown-item" value="ART"> ART</option>
                        <option class="dropdown-item" value="AHI"> AHI</option>
                        <option class="dropdown-item" value="AS"> AS</option>
                        <option class="dropdown-item" value="BCH"> BCH</option>
                        <option class="dropdown-item" value="BIO"> BIO</option>
                        <option class="dropdown-item" value="BE"> BE</option>
                        <option class="dropdown-item" value="BMI"> BMI</option>
                        <option class="dropdown-item" value="BMS"> BMS</option>
                        <option class="dropdown-item" value="STA"> STA</option>
                        <option class="dropdown-item" value="CE"> CE</option>
                        <option class="dropdown-item" value="CHE"> CHE</option>
                        <option class="dropdown-item" value="CHI"> CHI</option>
                        <option class="dropdown-item" value="CIE"> CIE</option>
                        <option class="dropdown-item" value="CL"> CL</option>
                        <option class="dropdown-item" value="COM"> COM</option>
                        <option class="dropdown-item" value="CDS"> CDS</option>
                        <option class="dropdown-item" value="CHB"> CHB</option>
                        <option class="dropdown-item" value="COL"> COL</option>
                        <option class="dropdown-item" value="CDA"> CDA</option>
                        <option class="dropdown-item" value="CSE"> CSE</option>
                        <option class="dropdown-item" value="CPM"> CPM</option>
                        <option class="dropdown-item" value="CEP"> CEP</option>
                        <option class="dropdown-item" value="DAC"> DAC</option>
                        <option class="dropdown-item" value="ECO"> ECO</option>
                        <option class="dropdown-item" value="ELP"> ELP</option>
                        <option class="dropdown-item" value="EE"> EE</option>
                        <option class="dropdown-item" value="EAS"> EAS</option>
                        <option class="dropdown-item" value="ENG"> ENG</option>
                        <option class="dropdown-item" value="ESL"> ESL</option>
                        <option class="dropdown-item" value="EVS"> EVS</option>
                        <option class="dropdown-item" value="END"> END</option>
                        <option class="dropdown-item" value="ES"> ES</option>
                        <option class="dropdown-item" value="FR"> FR</option>
                        <option class="dropdown-item" value="MGG"> MGG</option>
                        <option class="dropdown-item" value="GEO"> GEO</option>
                        <option class="dropdown-item" value="GLY"> GLY</option>
                        <option class="dropdown-item" value="GER"> GER</option>
                        <option class="dropdown-item" value="GGS"> GGS</option>
                        <option class="dropdown-item" value="GR"> GR</option>
                        <option class="dropdown-item" value="GRE"> GRE</option>
                        <option class="dropdown-item" value="HEB"> HEB</option>
                        <option class="dropdown-item" value="HIN"> HIN</option>
                        <option class="dropdown-item" value="HIS"> HIS</option>
                        <option class="dropdown-item" value="HON"> HON</option>
                        <option class="dropdown-item" value="IE"> IE</option>
                        <option class="dropdown-item" value="ITA"> ITA</option>
                        <option class="dropdown-item" value="JPN"> JPN</option>
                        <option class="dropdown-item" value="JDS"> JDS</option>
                        <option class="dropdown-item" value="KOR"> KOR</option>
                        <option class="dropdown-item" value="LAT"> LAT</option>
                        <option class="dropdown-item" value="LLS"> LLS</option>
                        <option class="dropdown-item" value="LAW"> LAW</option>
                        <option class="dropdown-item" value="ULC"> ULC</option>
                        <option class="dropdown-item" value="LAI"> LAI</option>
                        <option class="dropdown-item" value="LIS"> LIS</option>
                        <option class="dropdown-item" value="LIN"> LIN</option>
                        <option class="dropdown-item" value="MGA"> MGA</option>
                        <option class="dropdown-item" value="MGE"> MGE</option>
                        <option class="dropdown-item" value="MGF"> MGF</option>
                        <option class="dropdown-item" value="MGI"> MGI</option>
                        <option class="dropdown-item" value="MGM"> MGM</option>
                        <option class="dropdown-item" value="MGO"> MGO</option>
                        <option class="dropdown-item" value="MGQ"> MGQ</option>
                        <option class="dropdown-item" value="MGS"> MGS</option>
                        <option class="dropdown-item" value="MGT"> MGT</option>
                        <option class="dropdown-item" value="MDI"> MDI</option>
                        <option class="dropdown-item" value="MTH"> MTH</option>
                        <option class="dropdown-item" value="MAE"> MAE</option>
                        <option class="dropdown-item" value="DMS"> DMS</option>
                        <option class="dropdown-item" value="MT"> MT</option>
                        <option class="dropdown-item" value="MCH"> MCH</option>
                        <option class="dropdown-item" value="MIC"> MIC</option>
                        <option class="dropdown-item" value="MLS"> MLS</option>
                        <option class="dropdown-item" value="MUS"> MUS</option>
                        <option class="dropdown-item" value="MTR"> MTR</option>
                        <option class="dropdown-item" value="NRS"> NRS</option>
                        <option class="dropdown-item" value="NMD"> NMD</option>
                        <option class="dropdown-item" value="NTR"> NTR</option>
                        <option class="dropdown-item" value="OT"> OT</option>
                        <option class="dropdown-item" value="MGB"> MGB</option>
                        <option class="dropdown-item" value="PAS"> PAS</option>
                        <option class="dropdown-item" value="PHC"> PHC</option>
                        <option class="dropdown-item" value="PMY"> PMY</option>
                        <option class="dropdown-item" value="PHM"> PHM</option>
                        <option class="dropdown-item" value="PHI"> PHI</option>
                        <option class="dropdown-item" value="PHY"> PHY</option>
                        <option class="dropdown-item" value="PGY"> PGY</option>
                        <option class="dropdown-item" value="POL"> POL</option>
                        <option class="dropdown-item" value="PS"> PS</option>
                        <option class="dropdown-item" value="PSC"> PSC</option>
                        <option class="dropdown-item" value="PSY"> PSY</option>
                        <option class="dropdown-item" value="PUB"> PUB</option>
                        <option class="dropdown-item" value="NBC"> NBC</option>
                        <option class="dropdown-item" value="REC"> REC</option>
                        <option class="dropdown-item" value="RLL"> RLL</option>
                        <option class="dropdown-item" value="RUS"> RUS</option>
                        <option class="dropdown-item" value="SSC"> SSC</option>
                        <option class="dropdown-item" value="SW"> SW</option>
                        <option class="dropdown-item" value="SOC"> SOC</option>
                        <option class="dropdown-item" value="SPA"> SPA</option>
                        <option class="dropdown-item" value="TH"> TH</option>
                        <option class="dropdown-item" value="NBS"> NBS</option>
                        <option class="dropdown-item" value="UGC"> UGC</option>
                        <option class="dropdown-item" value="UE"> UE</option>
                        <option class="dropdown-item" value="NSG"> NSG</option>
                        <option class="dropdown-item" value="YID"> YID</option>
                    </select>
                </div>
                <br>
                <h6> Course Number:
                </h6>
                <input class="form-control" id="inputCourseNumber" placeholder="Optional">
                <br>
                <h6> Description:
                </h6>
                <textarea class="form-control" id="textbookDescription" rows="10" placeholder="Required"></textarea>
                <br>
                <button type="submit" class="btn btn-success btn-block">
                    Create A Textbook Post
                </button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="housingListing">
            <h4 class="text-center">
                Housing Contact Information
            </h4>
            <form role="form">
                <div class="form-group">

                    <label for="inputNameHousing">
                        Name
                    </label>
                    <input class="form-control" id="inputNameHousing" placeholder="Required">
                </div>
                <div class="form-group">

                    <label for="inputEmailHousing">
                        Email
                    </label>
                    <input class="form-control" id="inputEmailHousing" placeholder="Required">
                </div>
                <div class="form-group">

                    <label for="inputPhoneNumberHousing">
                        Phone Number
                    </label>
                    <input class="form-control" id="inputPhoneNumberHousing" placeholder="Required">
                </div>

                <br>
                <h4 class="text-center">
                    Off-Campus Housing Description
                </h4>
                <br>
                <h6> Housing Type:
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="housingType">
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
                            id="bedrooms">
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
                            id="bathrooms">
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
                <textarea class="form-control" id="housingDescription" placeholder="Required" rows="10"></textarea>
                <br>
                <h6> Address:
                </h6>
                <textarea class="form-control" id="address" rows="5" placeholder="Required"></textarea>
                <br>
                <div class="form-group">

                    <label for="inputFile">
                        File input (Required)
                    </label>
                    <input type="file" class="form-control-file" id="inputFile"/>
                    <p class="help-block">
                        Please attach pictures of the housing.
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
                Roommate Contact Information
            </h4>
            <form role="form">
                <div class="form-group">

                    <label for="inputNameRoommate">
                        Name
                    </label>
                    <input class="form-control" id="inputNameRoommate" placeholder="Required">
                </div>
                <div class="form-group">

                    <label for="inputEmailRoommate">
                        Email
                    </label>
                    <input class="form-control" id="inputEmailRoommate" placeholder="Required">
                </div>
                <div class="form-group">

                    <label for="inputPhoneNumberRoommate">
                        Phone Number
                    </label>
                    <input class="form-control" id="inputPhoneNumberRoommate" placeholder="Required">
                </div>

                <br>
                <h4 class="text-center">
                    Roommate Description
                </h4>
                <br>
                <h6> How many roommate(s) are you looking for?
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown"
                            id="roommates">
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
                            id="preference">
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
                <label for="roommateDescription"></label><textarea class="form-control" id="roommateDescription"
                                                                   rows="10" placeholder="Required"></textarea>
                <br>
                <button type="submit" class="btn btn-success btn-block">
                    Create A Roommate Post
                </button>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <br>
    <br>
</div>


<script src={{asset('js/app.css')}}></script>
<script type="text/javascript">
    function hideListings() {
        document.getElementById("textbookListing").style.display = "none";
        document.getElementById("housingListing").style.display = "none";
        document.getElementById("roommateListing").style.display = "none";
    }

    function resetRequired() {
        /* Textbooks */
        document.getElementById("inputNameTextbook").required = false;
        document.getElementById("inputEmailTextbook").required = false;
        document.getElementById("inputPhoneNumberTextbook").required = false;
        document.getElementById("condition").required = false;
        document.getElementById("course").required = false;
        document.getElementById("textbookDescription").required = false;

        /* Housing */
        document.getElementById("inputNameHousing").required = false;
        document.getElementById("inputEmailHousing").required = false;
        document.getElementById("inputPhoneNumberHousing").required = false;
        document.getElementById("housingType").required = false;
        document.getElementById("bedrooms").required = false;
        document.getElementById("bathrooms").required = false;
        document.getElementById("housingDescription").required = false;
        document.getElementById("address").required = false;
        document.getElementById("inputFile").required = false;

        /* Roommates */
        document.getElementById("inputNameRoommate").required = false;
        document.getElementById("inputEmailRoommate").required = false;
        document.getElementById("inputPhoneNumberRoommate").required = false;
        document.getElementById("roommates").required = false;
        document.getElementById("preference").required = false;
        document.getElementById("roommateDescription").required = false;

    }

    function showListing(type) {
        document.getElementById(type).style.display = "block";
        resetRequired();
        if (type === "textbookListing") {
            document.getElementById("housingListing").style.display = "none";
            document.getElementById("roommateListing").style.display = "none";
            document.getElementById("inputNameTextbook").required = true;
            document.getElementById("inputEmailTextbook").required = true;
            document.getElementById("inputPhoneNumberTextbook").required = true;
            document.getElementById("condition").required = true;
            document.getElementById("course").required = true;
            document.getElementById("textbookDescription").required = true;
        } else if (type === "housingListing") {
            document.getElementById("textbookListing").style.display = "none";
            document.getElementById("roommateListing").style.display = "none";
            document.getElementById("inputNameHousing").required = true;
            document.getElementById("inputEmailHousing").required = true;
            document.getElementById("inputPhoneNumberHousing").required = true;
            document.getElementById("housingType").required = true;
            document.getElementById("bedrooms").required = true;
            document.getElementById("bathrooms").required = true;
            document.getElementById("housingDescription").required = true;
            document.getElementById("address").required = true;
            document.getElementById("inputFile").required = true;
        } else if (type === "roommateListing") {
            document.getElementById("textbookListing").style.display = "none";
            document.getElementById("housingListing").style.display = "none";
            document.getElementById("inputNameRoommate").required = true;
            document.getElementById("inputEmailRoommate").required = true;
            document.getElementById("inputPhoneNumberRoommate").required = true;
            document.getElementById("roommates").required = true;
            document.getElementById("preference").required = true;
            document.getElementById("roommateDescription").required = true;
        }


    }

    window.onscroll = function () {
        scrollFunction()
    };

    var prevScrollpos = window.pageYOffset;

    function scrollFunction() {
        var currentScrollPos = window.pageYOffset;
        var width = document.body.clientWidth;
        if (width <= 450) {
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-300px";
            }
            prevScrollpos = currentScrollPos;
        }
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

</script>
</body>
</html>
