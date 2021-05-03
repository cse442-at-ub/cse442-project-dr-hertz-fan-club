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
            background-image: url('https://inspirationhut.net/wp-content/uploads/2013/05/201.png');
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
                font-size: 20px;
                font-weight: bold;
                transition: 0.4s;
                width: 50vw;
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
                padding-top: 10px;
            }

            #navbar-right a {
                padding: 0 10px;

            }
        }
    </style>
</head>
<body onload="hideListings()">

<! -- Nav Bar -->
<div id="navbar">
    <a id="title" style="font-size: 35px" href="{{ route('landing') }}">
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

<div>
    @if (Session::has('danger'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            {{ Session::get('danger') }}
        </div>
    @endif
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
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('textbookListing'); location.href='#textbookListing'">
                        Textbook
                    </button>
                </div>
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('housingListing'); location.href='#housingListing'">
                        Housing
                    </button>
                </div>
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('roommateListing'); location.href='#roommateListing'">
                        Roommate
                    </button>
                </div>
                <div class="col-md-3">
                    <br>
                    <button type="button" class="btn btn-success" onclick="showListing('genericListing'); location.href='#genericListing'">
                        General Item
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
            <form role="form" action="{{ route('post.textbook')}}" method="post" enctype="multipart/form-data">
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
                        <option class="dropdown-item" value="Brand New" style="color:white;" {{ old('textbook_condition') == "Brand New" ? 'selected' : '' }}> Brand New </option>
                        <option class="dropdown-item" value="Like New" style="color:white;" {{ old('textbook_condition') == "Like New" ? 'selected' : '' }}> Like New </option>
                        <option class="dropdown-item" value="Very Good" style="color:white;" {{ old('textbook_condition') == "Very Good" ? 'selected' : '' }}> Very Good </option>
                        <option class="dropdown-item" value="Good" style="color:white;" {{ old('textbook_condition') == "Good" ? 'selected' : '' }}> Good </option>
                        <option class="dropdown-item" value="Poor" style="color:white;" {{ old('textbook_condition') == "Poor" ? 'selected' : '' }}> Poor </option>
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
                    <option class="dropdown-item" value="AAS" style="color:white;" {{ old('course') == "AAS" ? 'selected' : '' }}> AAS </option>
                        <option class="dropdown-item" value="ASL" style="color:white;" {{ old('course') == "ASL" ? 'selected' : '' }}> ASL </option>
                        <option class="dropdown-item" value="AMS" style="color:white;" {{ old('course') == "AMS" ? 'selected' : '' }}> AMS </option>
                        <option class="dropdown-item" value="APY" style="color:white;" {{ old('course') == "APY" ? 'selected' : '' }}> APY </option>
                        <option class="dropdown-item" value="ARI" style="color:white;" {{ old('course') == "ARI" ? 'selected' : '' }}> ARI </option>
                        <option class="dropdown-item" value="ARC" style="color:white;" {{ old('course') == "ARC" ? 'selected' : '' }}> ARC </option>
                        <option class="dropdown-item" value="ART" style="color:white;" {{ old('course') == "ART" ? 'selected' : '' }}> ART </option>
                        <option class="dropdown-item" value="AHI" style="color:white;" {{ old('course') == "AHI" ? 'selected' : '' }}> AHI </option>
                        <option class="dropdown-item" value="AS" style="color:white;" {{ old('course') == "AS" ? 'selected' : '' }}> AS </option>
                        <option class="dropdown-item" value="BCH" style="color:white;" {{ old('course') == "BCH" ? 'selected' : '' }}> BCH </option>
                        <option class="dropdown-item" value="BIO" style="color:white;" {{ old('course') == "BIO" ? 'selected' : '' }}> BIO </option>
                        <option class="dropdown-item" value="BE" style="color:white;" {{ old('course') == "BE" ? 'selected' : '' }}> BE </option>
                        <option class="dropdown-item" value="BMI" style="color:white;" {{ old('course') == "BMI" ? 'selected' : '' }}> BMI </option>
                        <option class="dropdown-item" value="BMS" style="color:white;" {{ old('course') == "BMS" ? 'selected' : '' }}> BMS </option>
                        <option class="dropdown-item" value="STA" style="color:white;" {{ old('course') == "STA" ? 'selected' : '' }}> STA </option>
                        <option class="dropdown-item" value="CE" style="color:white;" {{ old('course') == "CE" ? 'selected' : '' }}> CE </option>
                        <option class="dropdown-item" value="CHE" style="color:white;" {{ old('course') == "CHE" ? 'selected' : '' }}> CHE </option>
                        <option class="dropdown-item" value="CHI" style="color:white;" {{ old('course') == "CHI" ? 'selected' : '' }}> CHI </option>
                        <option class="dropdown-item" value="CIE" style="color:white;" {{ old('course') == "CIE" ? 'selected' : '' }}> CIE </option>
                        <option class="dropdown-item" value="CL" style="color:white;" {{ old('course') == "CL" ? 'selected' : '' }}> CL </option>
                        <option class="dropdown-item" value="COM" style="color:white;" {{ old('course') == "COM" ? 'selected' : '' }}> COM </option>
                        <option class="dropdown-item" value="CDS" style="color:white;" {{ old('course') == "CDS" ? 'selected' : '' }}> CDS </option>
                        <option class="dropdown-item" value="CHB" style="color:white;" {{ old('course') == "CHB" ? 'selected' : '' }}> CHB </option>
                        <option class="dropdown-item" value="COL" style="color:white;" {{ old('course') == "COL" ? 'selected' : '' }}> COL </option>
                        <option class="dropdown-item" value="CDA" style="color:white;" {{ old('course') == "CDA" ? 'selected' : '' }}> CDA </option>
                        <option class="dropdown-item" value="CSE" style="color:white;" {{ old('course') == "CSE" ? 'selected' : '' }}> CSE </option>
                        <option class="dropdown-item" value="CPM" style="color:white;" {{ old('course') == "CPM" ? 'selected' : '' }}> CPM </option>
                        <option class="dropdown-item" value="CEP" style="color:white;" {{ old('course') == "CEP" ? 'selected' : '' }}> CEP </option>
                        <option class="dropdown-item" value="DAC" style="color:white;" {{ old('course') == "DAC" ? 'selected' : '' }}> DAC </option>
                        <option class="dropdown-item" value="ECO" style="color:white;" {{ old('course') == "ECO" ? 'selected' : '' }}> ECO </option>
                        <option class="dropdown-item" value="ELP" style="color:white;" {{ old('course') == "ELP" ? 'selected' : '' }}> ELP </option>
                        <option class="dropdown-item" value="EE" style="color:white;" {{ old('course') == "EE" ? 'selected' : '' }}> EE </option>
                        <option class="dropdown-item" value="EAS" style="color:white;" {{ old('course') == "EAS" ? 'selected' : '' }}> EAS </option>
                        <option class="dropdown-item" value="ENG" style="color:white;" {{ old('course') == "ENG" ? 'selected' : '' }}> ENG </option>
                        <option class="dropdown-item" value="ESL" style="color:white;" {{ old('course') == "ESL" ? 'selected' : '' }}> ESL </option>
                        <option class="dropdown-item" value="EVS" style="color:white;" {{ old('course') == "EVS" ? 'selected' : '' }}> EVS </option>
                        <option class="dropdown-item" value="END" style="color:white;" {{ old('course') == "END" ? 'selected' : '' }}> END </option>
                        <option class="dropdown-item" value="ES" style="color:white;" {{ old('course') == "ES" ? 'selected' : '' }}> ES </option>
                        <option class="dropdown-item" value="FR" style="color:white;" {{ old('course') == "FR" ? 'selected' : '' }}> FR </option>
                        <option class="dropdown-item" value="MGG" style="color:white;" {{ old('course') == "MGG" ? 'selected' : '' }}> MGG </option>
                        <option class="dropdown-item" value="GEO" style="color:white;" {{ old('course') == "GEO" ? 'selected' : '' }}> GEO </option>
                        <option class="dropdown-item" value="GLY" style="color:white;" {{ old('course') == "GLY" ? 'selected' : '' }}> GLY </option>
                        <option class="dropdown-item" value="GER" style="color:white;" {{ old('course') == "GER" ? 'selected' : '' }}> GER </option>
                        <option class="dropdown-item" value="GGS" style="color:white;" {{ old('course') == "GGS" ? 'selected' : '' }}> GGS </option>
                        <option class="dropdown-item" value="GR" style="color:white;" {{ old('course') == "GR" ? 'selected' : '' }}> GR </option>
                        <option class="dropdown-item" value="GRE" style="color:white;" {{ old('course') == "GRE" ? 'selected' : '' }}> GRE </option>
                        <option class="dropdown-item" value="HEB" style="color:white;" {{ old('course') == "HEB" ? 'selected' : '' }}> HEB </option>
                        <option class="dropdown-item" value="HIN" style="color:white;" {{ old('course') == "HIN" ? 'selected' : '' }}> HIN </option>
                        <option class="dropdown-item" value="HIS" style="color:white;" {{ old('course') == "HIS" ? 'selected' : '' }}> HIS </option>
                        <option class="dropdown-item" value="HON" style="color:white;" {{ old('course') == "HON" ? 'selected' : '' }}> HON </option>
                        <option class="dropdown-item" value="IE" style="color:white;" {{ old('course') == "IE" ? 'selected' : '' }}> IE </option>
                        <option class="dropdown-item" value="ITA" style="color:white;" {{ old('course') == "ITA" ? 'selected' : '' }}> ITA </option>
                        <option class="dropdown-item" value="JPN" style="color:white;" {{ old('course') == "JPN" ? 'selected' : '' }}> JPN </option>
                        <option class="dropdown-item" value="JDS" style="color:white;" {{ old('course') == "JDS" ? 'selected' : '' }}> JDS </option>
                        <option class="dropdown-item" value="KOR" style="color:white;" {{ old('course') == "KOR" ? 'selected' : '' }}> KOR </option>
                        <option class="dropdown-item" value="LAT" style="color:white;" {{ old('course') == "LAT" ? 'selected' : '' }}> LAT </option>
                        <option class="dropdown-item" value="LLS" style="color:white;" {{ old('course') == "LLS" ? 'selected' : '' }}> LLS </option>
                        <option class="dropdown-item" value="LAW" style="color:white;" {{ old('course') == "LAW" ? 'selected' : '' }}> LAW </option>
                        <option class="dropdown-item" value="ULC" style="color:white;" {{ old('course') == "ULC" ? 'selected' : '' }}> ULC </option>
                        <option class="dropdown-item" value="LAI" style="color:white;" {{ old('course') == "LAI" ? 'selected' : '' }}> LAI </option>
                        <option class="dropdown-item" value="LIS" style="color:white;" {{ old('course') == "LIS" ? 'selected' : '' }}> LIS </option>
                        <option class="dropdown-item" value="LIN" style="color:white;" {{ old('course') == "LIN" ? 'selected' : '' }}> LIN </option>
                        <option class="dropdown-item" value="MGA" style="color:white;" {{ old('course') == "MGA" ? 'selected' : '' }}> MGA </option>
                        <option class="dropdown-item" value="MGE" style="color:white;" {{ old('course') == "MGE" ? 'selected' : '' }}> MGE </option>
                        <option class="dropdown-item" value="MGF" style="color:white;" {{ old('course') == "MGF" ? 'selected' : '' }}> MGF </option>
                        <option class="dropdown-item" value="MGI" style="color:white;" {{ old('course') == "MGI" ? 'selected' : '' }}> MGI </option>
                        <option class="dropdown-item" value="MGM" style="color:white;" {{ old('course') == "MGM" ? 'selected' : '' }}> MGM </option>
                        <option class="dropdown-item" value="MGO" style="color:white;" {{ old('course') == "MGO" ? 'selected' : '' }}> MGO </option>
                        <option class="dropdown-item" value="MGQ" style="color:white;" {{ old('course') == "MGQ" ? 'selected' : '' }}> MGQ </option>
                        <option class="dropdown-item" value="MGS" style="color:white;" {{ old('course') == "MGS" ? 'selected' : '' }}> MGS </option>
                        <option class="dropdown-item" value="MGT" style="color:white;" {{ old('course') == "MGT" ? 'selected' : '' }}> MGT </option>
                        <option class="dropdown-item" value="MDI" style="color:white;" {{ old('course') == "MDI" ? 'selected' : '' }}> MDI </option>
                        <option class="dropdown-item" value="MTH" style="color:white;" {{ old('course') == "MTH" ? 'selected' : '' }}> MTH </option>
                        <option class="dropdown-item" value="MAE" style="color:white;" {{ old('course') == "MAE" ? 'selected' : '' }}> MAE </option>
                        <option class="dropdown-item" value="DMS" style="color:white;" {{ old('course') == "DMS" ? 'selected' : '' }}> DMS </option>
                        <option class="dropdown-item" value="MT" style="color:white;" {{ old('course') == "MT" ? 'selected' : '' }}> MT </option>
                        <option class="dropdown-item" value="MCH" style="color:white;" {{ old('course') == "MCH" ? 'selected' : '' }}> MCH </option>
                        <option class="dropdown-item" value="MIC" style="color:white;" {{ old('course') == "MIC" ? 'selected' : '' }}> MIC </option>
                        <option class="dropdown-item" value="MLS" style="color:white;" {{ old('course') == "MLS" ? 'selected' : '' }}> MLS </option>
                        <option class="dropdown-item" value="MUS" style="color:white;" {{ old('course') == "MUS" ? 'selected' : '' }}> MUS </option>
                        <option class="dropdown-item" value="MTR" style="color:white;" {{ old('course') == "MTR" ? 'selected' : '' }}> MTR </option>
                        <option class="dropdown-item" value="NRS" style="color:white;" {{ old('course') == "NRS" ? 'selected' : '' }}> NRS </option>
                        <option class="dropdown-item" value="NMD" style="color:white;" {{ old('course') == "NMD" ? 'selected' : '' }}> NMD </option>
                        <option class="dropdown-item" value="NTR" style="color:white;" {{ old('course') == "NTR" ? 'selected' : '' }}> NTR </option>
                        <option class="dropdown-item" value="OT" style="color:white;" {{ old('course') == "OT" ? 'selected' : '' }}> OT </option>
                        <option class="dropdown-item" value="MGB" style="color:white;" {{ old('course') == "MGB" ? 'selected' : '' }}> MGB </option>
                        <option class="dropdown-item" value="PAS" style="color:white;" {{ old('course') == "PAS" ? 'selected' : '' }}> PAS </option>
                        <option class="dropdown-item" value="PHC" style="color:white;" {{ old('course') == "PHC" ? 'selected' : '' }}> PHC </option>
                        <option class="dropdown-item" value="PMY" style="color:white;" {{ old('course') == "PMY" ? 'selected' : '' }}> PMY </option>
                        <option class="dropdown-item" value="PHM" style="color:white;" {{ old('course') == "PHM" ? 'selected' : '' }}> PHM </option>
                        <option class="dropdown-item" value="PHI" style="color:white;" {{ old('course') == "PHI" ? 'selected' : '' }}> PHI </option>
                        <option class="dropdown-item" value="PHY" style="color:white;" {{ old('course') == "PHY" ? 'selected' : '' }}> PHY </option>
                        <option class="dropdown-item" value="PGY" style="color:white;" {{ old('course') == "PGY" ? 'selected' : '' }}> PGY </option>
                        <option class="dropdown-item" value="POL" style="color:white;" {{ old('course') == "POL" ? 'selected' : '' }}> POL </option>
                        <option class="dropdown-item" value="PS" style="color:white;" {{ old('course') == "PS" ? 'selected' : '' }}> PS </option>
                        <option class="dropdown-item" value="PSY" style="color:white;" {{ old('course') == "PSY" ? 'selected' : '' }}> PSY </option>
                        <option class="dropdown-item" value="PUB" style="color:white;" {{ old('course') == "PUB" ? 'selected' : '' }}> PUB </option>
                        <option class="dropdown-item" value="NBC" style="color:white;" {{ old('course') == "NBC" ? 'selected' : '' }}> NBC </option>
                        <option class="dropdown-item" value="REC" style="color:white;" {{ old('course') == "REC" ? 'selected' : '' }}> REC </option>
                        <option class="dropdown-item" value="RLL" style="color:white;" {{ old('course') == "RLL" ? 'selected' : '' }}> RLL </option>
                        <option class="dropdown-item" value="RUS" style="color:white;" {{ old('course') == "RUS" ? 'selected' : '' }}> RUS </option>
                        <option class="dropdown-item" value="SSC" style="color:white;" {{ old('course') == "SSC" ? 'selected' : '' }}> SSC </option>
                        <option class="dropdown-item" value="SW" style="color:white;" {{ old('course') == "SW" ? 'selected' : '' }}> SW </option>
                        <option class="dropdown-item" value="SOC" style="color:white;" {{ old('course') == "SOC" ? 'selected' : '' }}> SOC </option>
                        <option class="dropdown-item" value="SPA" style="color:white;" {{ old('course') == "SPA" ? 'selected' : '' }}> SPA </option>
                        <option class="dropdown-item" value="TH" style="color:white;" {{ old('course') == "TH" ? 'selected' : '' }}> TH </option>
                        <option class="dropdown-item" value="NBS" style="color:white;" {{ old('course') == "NBS" ? 'selected' : '' }}> NBS </option>
                        <option class="dropdown-item" value="UGC" style="color:white;" {{ old('course') == "UGC" ? 'selected' : '' }}> UGC </option>
                        <option class="dropdown-item" value="UE" style="color:white;" {{ old('course') == "UE" ? 'selected' : '' }}> UE </option>
                        <option class="dropdown-item" value="NSG" style="color:white;" {{ old('course') == "NSG" ? 'selected' : '' }}> NSG </option>
                        <option class="dropdown-item" value="YID" style="color:white;" {{ old('course') == "YID" ? 'selected' : '' }}> YID </option>
                    </select>
                </div>

                @error('course')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="course_num">Course Number:</label>
                <input id="course_num" name="course_num" class="form-control" placeholder="101" minlength="3" maxlength="3" value="{{old('course_num')}}" required>

                @error('course_num')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <label for="bookPrice">Textbook Price:</label>
                <input id="bookPrice" name="bookPrice" class="form-control" placeholder="&#36" value="{{old('bookPrice')}}" required>

                @error('bookPrice')
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
                    <input type="file" name='textbookfile[]' accept="image/*" class="form-control-file" id="textbookfile" onchange="return checkFileSize('textbookfile');" multiple required>
                    <p class="help-block">
                        Please attach picture(s) of the textbook.
                    </p>
                    <p class="help-block">
                        Each file must not be more than 2MB and the combined file size must not be more than 8MB.
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
            <form role="form" action="{{ route('post.house')}}" method="post" enctype="multipart/form-data">
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

                    <select class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                            id="housingType" name="housingType">
                        <option class="dropdown-item" value="" selected disabled> Select Housing Type</option>
                        <option class="dropdown-item" value="Whole House" style="color:white;"> Whole House</option>
                        <option class="dropdown-item" value="Upper Flat" style="color:white;"> Upper Flat</option>
                        <option class="dropdown-item" value="Lower Flat" style="color:white;"> Lower Flat</option>
                        <option class="dropdown-item" value="Apartment" style="color:white;"> Apartment</option>
                    </select>
                </div>


                <br>

                <label for="rentPrice">Rent Price: </label>
                <input id="rentPrice" name="rentPrice" class="form-control" value="{{old('rentPrice')}}" required>

                @error('rentPrice')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <br>

                <label for="bedrooms">Number of Bedrooms:</label>
                <input id="bedrooms" name="bedrooms" class="form-control" value="{{old('bedrooms')}}" required>

                @error('bedrooms')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <br>

                <h6> Number of Bathrooms:
                </h6>
                <input id="bathrooms" name="bathrooms" class="form-control" value="{{old('bathrooms')}}" required>

                @error('bathrooms')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

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
                    <input type="file" name='housingfile[]' accept="image/*" onchange="return checkFileSize('housingfile');" class="form-control-file" id="housingfile"  multiple required>
                    <p class="help-block">
                        Please attach picture(s) of the housing.
                    </p>
                    <p class="help-block">
                        Each file must not be more than 2MB and the combined file size must not be more than 8MB.
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
            <form role="form" action="{{ route('post.roommate')}}" method="post" enctype="multipart/form-data">
                @csrf
                <br>
                <h6> Title:
                </h6>
                <input name="roommate_title" type="text" class="form-control" placeholder="Required" required >
                <br>
                <h6> How many roommate(s) are you looking for?
                </h6>

                <input id="roommates" name="roommates" class="form-control" value="{{old('roommates')}}" required>

                @error('roommates')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror

                <br>
                <h6> Preference on gender of roommate(s)?
                </h6>
                <div class="dropdown">

                    <select class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                            id="preference" name="preference">
                        <option class="dropdown-item" value="" selected disabled> Select Preference</option>
                        <option class="dropdown-item" value="Female Only" style="color:white;" > Female Only</option>
                        <option class="dropdown-item" value="Male Only" style="color:white;" > Male Only</option>
                        <option class="dropdown-item" value="Any Gender" style="color:white;" > Any Gender</option>
                        <option class="dropdown-item" value="Other" style="color:white;" > Other</option>
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
                    <input type="file" name='roommatefile[]' accept="image/*" onchange="return checkFileSize('roommatefile');" class="form-control-file" id="roommatefile" multiple required>
                    <p class="help-block">
                        Please attach picture(s).
                    </p>
                    <p class="help-block">
                        Each file must not be more than 2MB and the combined file size must not be more than 8MB.
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
            <form role="form" action="{{ route('post.everything')}}" method="post" enctype="multipart/form-data">
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

                    <select class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown"
                            id="conditionGeneric" name="conditionGeneric">
                        <option class="dropdown-item" value="" selected disabled> Select Condition</option>
                        <option class="dropdown-item" value="Brand New" style="color:white;" > Brand New</option>
                        <option class="dropdown-item" value="Like New" style="color:white;" > Like New</option>
                        <option class="dropdown-item" value="Very Good" style="color:white;" > Very Good</option>
                        <option class="dropdown-item" value="Good" style="color:white;" > Good</option>
                        <option class="dropdown-item" value="Poor" style="color:white;" > Poor</option>
                    </select>
                </div>
                <br>

                <label for="itemPrice">Item Price: </label>
                <input id="itemPrice" name="itemPrice" class="form-control" value="{{old('itemPrice')}}" required>

                @error('itemPrice')
                <div class="text-danger mt-2 text-sm">
                    {{ $message }}
                </div>
                @enderror
                <br>

                <h6> Description:
                </h6>
                <textarea class="form-control" id="genericDescription" name="genericDescription" rows="10" placeholder="Required"></textarea>
                <br>
                <div class="form-group">
                    <label for="genericfile">
                        File input (Required)
                    </label>
                    <input type="file" name='genericfile[]' accept="image/*" onchange="return checkFileSize('genericfile');" class="form-control-file" id="genericfile" multiple required>
                    <p class="help-block">
                        Please attach picture(s) of the item.
                    </p>
                    <p class="help-block">
                        Each file must not be more than 2MB and the combined file size must not be more than 8MB.
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

    function checkFileSize(type) {
        var files = document.getElementById(type).files;
        var filetoobig = false;
        var combinedfilestoobig = false;
        var totalsize = 0;
        for (i = 0; i < files.length; i++) {
            if (files[i].size > 2000000){
                filetoobig = true;
            }
            totalsize = totalsize + files[i].size;
        }
        if (totalsize > 8000000) {
            combinedfilestoobig = true;
        }
        if (combinedfilestoobig && filetoobig){
            alert('One of your files is over 2MB and the combined file size is over 8MB!');
            document.getElementById(type).value = "";
            return false;
        } else if (filetoobig) {
            alert('One of your files is over 2MB!');
            document.getElementById(type).value = "";
            return false;
        } else if (combinedfilestoobig) {
            alert('The combined file size is over 8MB!');
            document.getElementById(type).value = "";
            return false;
        } else {
            return true;
        }
    }


</script>
</body>
</html>
