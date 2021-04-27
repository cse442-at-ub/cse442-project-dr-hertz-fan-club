<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css?v=').time()}}" rel="stylesheet" type="text/css">

    <style>

        * {
            box-sizing: border-box;
            overflow-x: hidden;
        }

        div.scroll {
            width: 100%;
            height: 80vh;
            overflow-x: hidden;
            overflow-y: auto;
            text-align: justify;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
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


    </style>
</head>
<body>

<div id="navbar">
    <div class="row">
        <a id="title">
            UB Market
        </a>

        <div class="d-flex" id="navbar-right">

            <a class="btn btn-info" onclick="self.close()">
                Close
            </a>
        </div>
    </div>

</div>


<div class="container flex-wrap">

    <div class="row" style="padding-top: 10vh">
        @if(!$detail->isempty())
            <div class="detail-info">
                <div style="word-break: break-word; margin-left: 10px">
                    <h2>{{ $detail[0]->title }}</h2>
                    @if(array_key_exists('course', $detail[0]))
                        <h4>Course: <small>{{ $detail[0]->course }} {{ $detail[0]->course_num }}</small></h4>
                        <h4>Condition: <small>{{ $detail[0]->con }}</small></h4>
                        <h4>Price: $ <small>{{ $detail[0]->price }}</small></h4>
                        <h4>Description:</h4>
                        <h5>{{ $detail[0]->description }}</h5>
                    @elseif(array_key_exists('roommate_num', $detail[0]))
                        <h4>Expected Number: <small>{{ $detail[0]->roommate_num }}</small></h4>
                        <h4>Expected Gender: <small>{{ $detail[0]->roommate_gen }}</small></h4>
                        <h4>Description:</h4>
                        <h5>{{ $detail[0]->description }}</h5>
                    @elseif(array_key_exists('address', $detail[0]))
                        <h4>House Type: <small>{{ $detail[0]->house_type }}</small></h4>
                        <h4>Bedroom Number: <small>{{ $detail[0]->bedroom_num }}</small></h4>
                        <h4>Bathroom Number: <small>{{ $detail[0]->bathroom_num }}</small></h4>
                        <h4>Address: <small>{{ $detail[0]->address }}</small></h4>
                        <h4>Description:</h4>
                        <h5>{{ $detail[0]->description }}</h5>
                    @else
                        <h4>Condition: <small>{{ $detail[0]->con }}</small></h4>
                        <h4>Price: $ <small>{{ $detail[0]->price }}</small></h4>
                        <h4>Description:</h4>
                        <h5>{{ $detail[0]->description }}</h5>
                    @endif
                </div>
                <div class="detail-image">
                @foreach($image as $image)
                    <a class="lightbox" href="#{{ $image[0] }}">
                        <img src="{{ $image[1] }}"/>
                    </a>
                    <div class="lightbox-target" id="{{ $image[0] }}">
                        <img src="{{ $image[1] }}"/>
                        <a class="lightbox-close" href="#"></a>
                    </div>
                @endforeach
                </div>
            </div>
        @else
            <div><img style="width: 100%"
                      src="https://www.ubcfa.org/etc/designs/ubcms/clientlibs-main/images/ub-social.png.img.512.auto.png/1615975625016.png">
            </div>
        @endif
    </div>


</div>
</body>
</html>
