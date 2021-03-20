
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
    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];

        //read from database
        $query = "SELECT * FROM `users` WHERE `email` LIKE '$email' AND `password` LIKE '$password'";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {

                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {

                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: Main.html");
                    die;
                }
            }
        }
        


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <title>UB Market</title>
   </head>
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
<body>

<div class="container" id="container">
    <div class="form-container login-in-container">
        <form method="post">
            <h1>Login</h1>
            <input type="email" placeholder="Email" name="email" require>
            <input type="password" placeholder="Password" name="password" require>
            <div class="pass-link">Forgot your password?</div>
            <div class="signup-link">Not a member? <a href="sign_up.php">Signup now</a></div>
            <button><a">Login</a></button>
        </form>
    </div>

</div>

</body>
</html> 