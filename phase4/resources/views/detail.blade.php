<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    <title>UB Market</title>

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css?v=').time()}}" rel="stylesheet" type="text/css">

</head>
<body> 
<div class="col-md-12">
    @if(!$detail->isempty())
        <div class="detail-info">
            <div style="word-break: break-word">
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
                @foreach($image as $index=>$image)
                    <a class="lightbox" href="#{{ $index }}">
                        <img src="{{ $url }}{{ $image }}"/>
                    </a>
                    <div class="lightbox-target" id="{{ $index }}">
                        <img src="{{ $url }}{{ $image }}"/>
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
</body>
</html>
