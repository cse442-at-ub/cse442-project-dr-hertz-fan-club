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

	$username = $_POST['username'];
    	$email = $_POST['email'];
    	$password = $_POST['password'];
	$query = "INSERT INTO `users` (`user_id`, `email`, `username`, `password`) VALUES (NULL,'$email','$username','$password')";
        mysqli_query($con,$query)

	
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>UB Market</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            font-family: sans-serif;
            height: 100vh;
            margin: -20px 0 50px;
            background: rgb(231, 233, 236);
        }

        h1 {
            margin: 0;
        }

        .container {
            overflow: hidden;
            max-width: 390px;
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 15px 20px rgba(0, 0, 0, 0.1);
        }

        .form-container form {
            background: white;
            display: flex;
            flex-direction: column;
            padding: 0 20px;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .form-container input {
            background: #eee;
            border: none;
            padding: 12px 15px;
            margin: 8px 0;
            width: 100%;
        }

        button {
            border-radius: 20px;
            border: 1px solid #0073e6;
            background: #0073e6;
            color: white;
            font-size: 14px;
            font-weight: bold;
            padding: 10px 30px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }

        button:active {
            transform: scale(0.90);
        }

        button:focus {
            outline: none;
        }

        .form-container .pass-link {
            margin-top: 10px;
        }

        .form-container .signup-link {
            text-align: center;
            margin: 10px;
        }

    </style>
</head>
<body>
<div class="container" id="container">
    <div class="form-container sign-in-container">
        <form method="post">
            <h1>Create Account</h1>
            <input type="text" placeholder="username" name="username" require>
            <input type="email" placeholder="email" name="email" require>
            <input type="password" placeholder="password" name="password" require>
            <input type="submit" value="Signup">
	    <div class="signup-link">Already a member? <a href="login.php">Login</a></div>
        </form>
    </div>

</div>
</body>
</html>