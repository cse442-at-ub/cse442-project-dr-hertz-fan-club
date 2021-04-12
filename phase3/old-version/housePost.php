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

        $title = $_POST['title'];
	$house_type = $_POST['house'];
        $bednum = $_POST['bedNum'];
	$bathNum = $_POST['bathNum'];
        $des = $_POST['aptDescription'];
	$add = $_POST['address'];
	$input = $_POST['inputfile'];
	$query = "INSERT INTO `house` (`house_id`, `title`, `house_type`, `bedroom_num`, `bathroom_num`, `description`, `address`, `file`) 
			VALUES (NULL, '$title', '$house_type', '$bednum', '$bathNum', '$des', '$add', '$input')";
        
	$result =    mysqli_query($con,$query);

if($result) {
echo '<script type="text/javascript"> alert ("Data saved")</script>';
}else{
echo '<script type="text/javascript"> alert ("Data not saved")</script>';
}

?>
