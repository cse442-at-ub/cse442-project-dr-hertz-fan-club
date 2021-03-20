<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market - Contact Us</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
<body>

<div class="container-fluid" style="margin-top: 150px">
    <nav class="navbar fixed-top">
        <!-- Header -->
        <div class="brand-title">
            UB Market <small>A place for UB community</small>
        </div>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="navbar-links">
            <ul>
                <li>
                    <a href="{{route('main')}}">Home</a>
                </li>
                <li>
                    <a href="{{route('login')}}">LOG IN</a>
                </li>
            </ul>
        </div>
        <!--        </div>-->
    </nav>

    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <h3 class="text-center">
                Need Help? Contact Us!
            </h3>
            <br>
            <br>
            <form action="{{ route('landing') }}">

                <div class="form-group">
                    <label for="inputName">
                        Name
                    </label>
                    <input class="form-control" id="inputName" placeholder="Required" required>
                </div>

                <div class="form-group">
                    <label for="inputEmail">
                        Email
                    </label>
                    <input class="form-control" id="inputEmail" placeholder="Required" required>
                </div>

                <div class="form-group">
                    <label for="inputPhoneNumber">
                        Phone Number
                    </label>
                    <input class="form-control" id="inputPhoneNumber" placeholder="Optional">
                </div>
                <h6> Topic:
                </h6>
                <div class="dropdown">
                    <select class="btn btn-outline-primary dropdown-toggle" type="button" data-toggle="dropdown" required>
                        <option class="dropdown-item" value="" selected disabled> Please Select A Topic</option>
                        <option class="dropdown-item" value="Unable to sign up or log in"> Unable to sign up or log in</option>
                        <option class="dropdown-item" value="Request to delete account"> Request to delete account</option>
                        <option class="dropdown-item" value="Report a bug"> Report a bug</option>
                        <option class="dropdown-item" value="Feedback"> Feedback</option>
                        <option class="dropdown-item" value="Other"> Other</option>
                    </select>
                </div>
                <br>
                <h6> Description:
                </h6>
                <label for="contactDescription"></label><textarea class="form-control" id="contactDescription" rows="10" placeholder="Required" required></textarea>
                <br>
                <div class="form-group">

                    <label for="inputFile">
                        File input (Optional)
                    </label>
                    <input type="file" class="form-control-file" id="inputFile">
                    <p class="help-block">
                        Please attach all necessary files.
                    </p>
                </div>
                <button type="submit" class="btn btn-primary">
                    Send
                </button>
                <br>
                <br>
            </form>
        </div>
        <div class="col-md-3">
        </div>
    </div>
</div>


<script src={{asset('js/app.css')}}></script>
</body>
</html>
