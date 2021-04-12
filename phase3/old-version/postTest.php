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
        			VALUES (NULL,'$name','$cond','$course','$cnum','$des')";

	$result =    mysqli_query($con,$query);

if($result) {
echo '<script type="text/javascript"> alert ("Data saved")</script>';
}else{
echo '<script type="text/javascript"> alert ("Data not saved")</script>';

}
?>
