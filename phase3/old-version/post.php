<?php
session_start();
$dbhost = "oceanus.cse.buffalo.edu";
$dbuser = "hjoshi3";
$dbpass = "50342192";
$dbname = "cse442_2021_spring_team_e_db";
if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
    die("failed to connect!");
}

        $name = $_POST['textbook_name'];
        $cond = $_POST['textbook_condition'];
        $course = $_POST['course'];
        $cnum = $_POST['course_num'];
        $des = $_POST['textbookDescription'];
        $query = "INSERT INTO `textbook` (`textbook_id`, `name`, `textbook_condition`, `course`, `course_num`, `description`) 
        			VALUES (NULL,'324','dsf','asdf','12','hello')";

	$result =    mysqli_query($con,$query);

if($result) {
echo '<script type="text/javascript"> alert ("Data saved")</script>';
}else{
echo '<script type="text/javascript"> alert ("Data not saved")</script>';

}
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UB Market</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body onload="hideListings()">

<! -- Nav Bar -->
<div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-light navbar-dark bg-dark fixed-top">

        <h1 class="page-header" style="color: white; margin-right: 20px">UB Market</h1>
        <div class="collapse navbar-collapse">
                <!--                    Change to a real button in future version-->
                <a class="btn btn-danger my-2 my-sm-0 ml-auto"
                   style="margin-left: 10px; padding: 12px 20px; border-radius: 4px" href="Main.html">
                    Cancel
                </a>
        </div>
    </nav>
</div>
<div class="container-fluid" style="margin-top: 150px">
    <form action="postTest.php"method="POST">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h3 class="text-center">
                Create A Listing
            </h3>
            <br>
            <br>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6" id="textbookListing">
            <p></p>
            <h4 class="text-center">
                Textbook Description
            </h4>
            <br>
            <h6> Textbook Name:
            </h6>
            <input name="textbook_name" type="text" class="form-control" >
            <br>
            <h6> Textbook Condition:
            </h6>
            <div class="dropdown">

                <select name= "textbook_condition" class="btn btn-outline-primary dropdown-toggle"  data-toggle="dropdown">
                    <option class="dropdown-item" value="Brand New" id="Brand New"> Brand New </option>
                    <option class="dropdown-item" value="Like New" id="Like New"> Like New </option>
                    <option class="dropdown-item" value="Very Good" id=> Very Good </option>
                    <option class="dropdown-item" value="Good" id=> Good </option>
                    <option class="dropdown-item" value="Poor" id=> Poor </option>
                </select>
            </div>
            <br>
            <h6> Course
            </h6>
            <div class="dropdown">

                <select name="course" class="btn btn-outline-primary dropdown-toggle"  data-toggle="dropdown">
                    <option class="dropdown-item" value="None"> None </option>
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
            <br>
            <h6> Course Number:
            </h6>
            <input name="course_num" class="form-control" >
            <br>
            <h6> Description:
            </h6>
            <textarea class="form-control" name="textbookDescription" rows="10" required></textarea>
        </div>
    </div>
 
    <br>
    <br>
            <input name="create" type="submit" class="btn btn-success btn-block" value= "Post" \>
            <br>
<br>

    </form>
</div>

</body>
</html>










