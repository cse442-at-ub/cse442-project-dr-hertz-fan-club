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
        $rnum = $_POST['roommate_num'];
	$gen = $_POST['gender'];
        $des = $_POST['roommateDescription'];
$query = "INSERT INTO `roommate` (`roommate_id`, `title`, `roommate_num`, `roommate_gen`, `description`) 
				VALUES (NULL, '$title', '$rnum', '$gen', '$des')";
        
	$result =    mysqli_query($con,$query);

if($result) {
echo '<script type="text/javascript"> alert ("Data saved")</script>';
header("Location: https://www-student.cse.buffalo.edu/CSE442-542/2021-Spring/cse-442e/old-version/Main.html");

}else{
echo '<script type="text/javascript"> alert ("Data not saved")</script>';

}
?>
