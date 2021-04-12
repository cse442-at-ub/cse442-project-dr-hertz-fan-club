<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

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
            /*border: none;*/
            border-style: solid;
            border-radius: 5px;
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
        <form action="{{ route('forgotpassword') }}" method="post">
            @csrf
            <div> Please enter your '@buffalo.edu' to receive the link to reset your password. <div>
            <label for="useremail" class="sr-only">UB Email</label>
            <input type="email" name="useremail" id="useremail" placeholder="Email" value=""
                   class="@error('email') border-danger @enderror">
            @error('email')
            <div class="text-danger mt-2 text-sm">
                {{ $message }}
            </div>
            @enderror
            <button type="submit">Verify Email</button>
        </form>
    </div>

</div>

</body>
</html>
