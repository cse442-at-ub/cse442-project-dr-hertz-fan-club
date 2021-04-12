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
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

</head>
<body>
<div class="col-md-12">
    <div class="column">

        @if(!$posts->isempty())
            @foreach($posts as $post)

                <div class="card">
                    <img class="card-img-top"
                         src="https://www.buffalo.edu/content/www/campusliving/about-us/employment-opportunities/how-to-apply/_jcr_content/par/image.img.447.260.jpg/1507045432762.jpg">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->course }}{{ $post->course_num }}</h5>
                        <p class="card-text">{{ $post->description }}</p>
                        <a class="btn btn-primary btn-large" onclick="render_detail(t)">Learn more</a>
                    </div>
                </div>
            @endforeach
        @else
            <p>You reach our bottom line.</p>

        @endif

    </div>

</div>
</body>
</html>
