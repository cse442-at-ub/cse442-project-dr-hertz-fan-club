<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">

    @if(!$detail->isempty())
    <title>UB Market - {{ $detail[0]->title }} Details</title>
    @else
    <title>UB Market - UB Logo</title>
    @endif

    <meta name="description" content="UB CSE442 Project">
    <meta name="author" content="Dr. Hertz Fan Club">

    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/style.css?v=').time()}}" rel="stylesheet" type="text/css">
    <style>
        body {
            padding-bottom: 75px;
        }
    </style>
</head>
<body> 
<div>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            {{ Session::get('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert" style="z-index: 999">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="col-md-12">
    @if(!$detail->isempty())
        <div class="detail-info">
            <div style="word-break: break-word">
                <div class="wait-image">
                    <div class="lightbox-target" id="pleasewait">
                        <img src="https://3.bp.blogspot.com/-amlsCfTnRlU/XUrLOfm-HiI/AAAAAAAmhFE/2hJaAYslOtYOaBil3yHzq8RgM1eiY9uJwCLcBGAs/s1600/AW3966081_12.gif"/>
                    </div>
                </div>
                <h2>{{ $detail[0]->title }}</h2>
                @if(array_key_exists('course', $detail[0]))
                    <h4>Course: <small>{{ $detail[0]->course }} {{ $detail[0]->course_num }}</small></h4>
                    <h4>Condition: <small>{{ $detail[0]->con }}</small></h4>
                    <h4>Price: $ <small>{{ $detail[0]->price }}</small></h4>
                    <h4>Description:</h4>
                    <h5>{{ $detail[0]->description }}</h5>


                    <div class="detail-image">
                        @foreach($images as $index=>$image)
                            <a class="lightbox" href="#{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                            </a>
                            <div class="lightbox-target" id="{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                                <a class="lightbox-close" href="#"></a>
                            </div>
                        @endforeach
                    </div>
                    <br>

                    @if($detail[0]->user_id != auth()->user()->id)
                        <div class="row" >
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <h5> Interested in this post? You can contact the owner below! </h5>
                                <form action="{{ route('post.contact', ['type'=>'textbook', 'id'=>$detail[0]->id]) }}" method="post" onsubmit="return confirmWin('Are you sure you want to send this message to the post owner of {{ $detail[0]->title }}?')">
                                    @csrf
                                    <div class="form-group">
                                        @auth
                                        <label for="inputName" style="font-size:25px;" hidden>
                                            Name: {{ auth()->user()->name }}
                                        </label>
                                        <input class="form-control" id="inputName" name="inputName" value="{{ auth()->user()->name }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        @auth
                                        <label for="inputEmail" style="font-size:25px;" hidden>
                                            Email: {{ auth()->user()->email }}
                                        </label>
                                        <input class="form-control" id="inputEmail" name="inputEmail" value="{{ auth()->user()->email }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        <label for="topic" style="font-size:25px;" hidden>
                                            Topic: '{{ $detail[0]->title }}'
                                        </label>
                                        <input class="form-control" id="topic" name="topic" value="{{ $detail[0]->title }}" hidden readonly>
                                    </div>

                                    @auth
                                    <label for="contactDescription" style="font-size:20px;">Your Message to Post Owner of "{{ $detail[0]->title }}":</label>
                                    <textarea class="form-control" name="contactDescription" id="contactDescription" rows="15" placeholder="Required"
                                    required>Hello, my name is {{ auth()->user()->name }}! I am interested in your post "{{ $detail[0]->title }}" from {{ $currenturl }} !&#13;&#10;&#13;&#10;Please contact me at {{ auth()->user()->email }} so we can discuss details about your post.&#13;&#10;&#13;&#10;Thank you,&#13;&#10;&#13;&#10;{{ auth()->user()->name }}</textarea>
                                    @endauth
                                    @error('contactDescription')
                                    <div class="text-danger mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Send Message
                                    </button>
                                    <br>
                                    <br>
                                </form>

                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    @else

                        <h5> You are the owner of this post. </h5>

                    @endif




                @elseif(array_key_exists('roommate_num', $detail[0]))
                    <h4>Expected Number: <small>{{ $detail[0]->roommate_num }}</small></h4>
                    <h4>Expected Gender: <small>{{ $detail[0]->roommate_gen }}</small></h4>
                    <h4>Description:</h4>
                    <h5>{{ $detail[0]->description }}</h5>



                    <div class="detail-image">
                        @foreach($images as $index=>$image)
                            <a class="lightbox" href="#{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                            </a>
                            <div class="lightbox-target" id="{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                                <a class="lightbox-close" href="#"></a>
                            </div>
                        @endforeach
                    </div>
                    <br>


                    @if($detail[0]->user_id != auth()->user()->id)
                        <div class="row" >
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <h5> Interested in this post? You can contact the owner below! </h5>
                                <form action="{{ route('post.contact', ['type'=>'roommate', 'id'=>$detail[0]->id]) }}" method="post" onsubmit="return confirmWin('Are you sure you want to send this message to the post owner of {{ $detail[0]->title }}?')">
                                    @csrf
                                    <div class="form-group">
                                        @auth
                                        <label for="inputName" style="font-size:25px;" hidden>
                                            Name: {{ auth()->user()->name }}
                                        </label>
                                        <input class="form-control" id="inputName" name="inputName" value="{{ auth()->user()->name }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        @auth
                                        <label for="inputEmail" style="font-size:25px;" hidden>
                                            Email: {{ auth()->user()->email }}
                                        </label>
                                        <input class="form-control" id="inputEmail" name="inputEmail" value="{{ auth()->user()->email }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        <label for="topic" style="font-size:25px;" hidden>
                                            Topic: '{{ $detail[0]->title }}'
                                        </label>
                                        <input class="form-control" id="topic" name="topic" value="{{ $detail[0]->title }}" hidden readonly>
                                    </div>

                                    @auth
                                    <label for="contactDescription" style="font-size:20px;">Your Message to Post Owner of "{{ $detail[0]->title }}":</label>
                                    <textarea class="form-control" name="contactDescription" id="contactDescription" rows="15" placeholder="Required"
                                    required>Hello, my name is {{ auth()->user()->name }}! I am interested in your post "{{ $detail[0]->title }}" from {{ $currenturl }} !&#13;&#10;&#13;&#10;Please contact me at {{ auth()->user()->email }} so we can discuss details about your post.&#13;&#10;&#13;&#10;Thank you,&#13;&#10;&#13;&#10;{{ auth()->user()->name }}</textarea>
                                    @endauth
                                    @error('contactDescription')
                                    <div class="text-danger mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Send Message
                                    </button>
                                    <br>
                                    <br>
                                </form>

                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    @else

                        <h5> You are the owner of this post. </h5>

                    @endif
                    
                @elseif(array_key_exists('address', $detail[0]))
                    <h4>House Type: <small>{{ $detail[0]->house_type }}</small></h4>
                    <h4>Bedroom Number: <small>{{ $detail[0]->bedroom_num }}</small></h4>
                    <h4>Bathroom Number: <small>{{ $detail[0]->bathroom_num }}</small></h4>
                    <h4>Address: <small>{{ $detail[0]->address }}</small></h4>
                    <h4>Description:</h4>
                    <h5>{{ $detail[0]->description }}</h5>


                    <div class="detail-image">
                        @foreach($images as $index=>$image)
                            <a class="lightbox" href="#{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                            </a>
                            <div class="lightbox-target" id="{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                                <a class="lightbox-close" href="#"></a>
                            </div>
                        @endforeach
                    </div>
                    <br>


                    @if($detail[0]->user_id != auth()->user()->id)
                        <div class="row" >
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <h5> Interested in this post? You can contact the owner below! </h5>
                                <form action="{{ route('post.contact', ['type'=>'house', 'id'=>$detail[0]->id]) }}" method="post" onsubmit="return confirmWin('Are you sure you want to send this message to the post owner of {{ $detail[0]->title }}?')">
                                    @csrf
                                    <div class="form-group">
                                        @auth
                                        <label for="inputName" style="font-size:25px;" hidden>
                                            Name: {{ auth()->user()->name }}
                                        </label>
                                        <input class="form-control" id="inputName" name="inputName" value="{{ auth()->user()->name }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        @auth
                                        <label for="inputEmail" style="font-size:25px;" hidden>
                                            Email: {{ auth()->user()->email }}
                                        </label>
                                        <input class="form-control" id="inputEmail" name="inputEmail" value="{{ auth()->user()->email }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        <label for="topic" style="font-size:25px;" hidden>
                                            Topic: '{{ $detail[0]->title }}'
                                        </label>
                                        <input class="form-control" id="topic" name="topic" value="{{ $detail[0]->title }}" hidden readonly>
                                    </div>

                                    @auth
                                    <label for="contactDescription" style="font-size:20px;">Your Message to Post Owner of "{{ $detail[0]->title }}":</label>
                                    <textarea class="form-control" name="contactDescription" id="contactDescription" rows="15" placeholder="Required"
                                    required>Hello, my name is {{ auth()->user()->name }}! I am interested in your post "{{ $detail[0]->title }}" from {{ $currenturl }} !&#13;&#10;&#13;&#10;Please contact me at {{ auth()->user()->email }} so we can discuss details about your post.&#13;&#10;&#13;&#10;Thank you,&#13;&#10;&#13;&#10;{{ auth()->user()->name }}</textarea>
                                    @endauth
                                    @error('contactDescription')
                                    <div class="text-danger mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Send Message
                                    </button>
                                    <br>
                                    <br>
                                </form>

                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    @else

                        <h5> You are the owner of this post. </h5>

                    @endif



                @else
                    <h4>Condition: <small>{{ $detail[0]->con }}</small></h4>
                    <h4>Price: $ <small>{{ $detail[0]->price }}</small></h4>
                    <h4>Description:</h4>
                    <h5>{{ $detail[0]->description }}</h5>

                    <div class="detail-image">
                        @foreach($images as $index=>$image)
                            <a class="lightbox" href="#{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                            </a>
                            <div class="lightbox-target" id="{{ $index }}">
                                <img src="{{ $url }}{{ $image }}"/>
                                <a class="lightbox-close" href="#"></a>
                            </div>
                        @endforeach
                    </div>
                    <br>


                    @if($detail[0]->user_id != auth()->user()->id)
                        <div class="row" >
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <h5> Interested in this post? You can contact the owner below! </h5>
                                <form action="{{ route('post.contact', ['type'=>'everything', 'id'=>$detail[0]->id]) }}" method="post" onsubmit="return confirmWin('Are you sure you want to send this message to the post owner of {{ $detail[0]->title }}?')">
                                    @csrf
                                    <div class="form-group">
                                        @auth
                                        <label for="inputName" style="font-size:25px;" hidden>
                                            Name: {{ auth()->user()->name }}
                                        </label>
                                        <input class="form-control" id="inputName" name="inputName" value="{{ auth()->user()->name }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        @auth
                                        <label for="inputEmail" style="font-size:25px;" hidden>
                                            Email: {{ auth()->user()->email }}
                                        </label>
                                        <input class="form-control" id="inputEmail" name="inputEmail" value="{{ auth()->user()->email }}" hidden readonly>
                                        @endauth
                                    </div>

                                    <div class="form-group">
                                        <label for="topic" style="font-size:25px;" hidden>
                                            Topic: '{{ $detail[0]->title }}'
                                        </label>
                                        <input class="form-control" id="topic" name="topic" value="{{ $detail[0]->title }}" hidden readonly>
                                    </div>

                                    @auth
                                    <label for="contactDescription" style="font-size:20px;">Your Message to Post Owner of "{{ $detail[0]->title }}":</label>
                                    <textarea class="form-control" name="contactDescription" id="contactDescription" rows="15" placeholder="Required"
                                    required>Hello, my name is {{ auth()->user()->name }}! I am interested in your post "{{ $detail[0]->title }}" from {{ $currenturl }} !&#13;&#10;&#13;&#10;Please contact me at {{ auth()->user()->email }} so we can discuss details about your post.&#13;&#10;&#13;&#10;Thank you,&#13;&#10;&#13;&#10;{{ auth()->user()->name }}</textarea>
                                    @endauth
                                    @error('contactDescription')
                                    <div class="text-danger mt-2 text-sm">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                    <br>
                                    <button type="submit" class="btn btn-primary">
                                        Send Message
                                    </button>
                                    <br>
                                    <br>
                                </form>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    @else

                    <h5> You are the owner of this post. </h5>

                    @endif


                @endif
            </div>

            

        </div>
    @else
        <div><img style="width: 100%"
                  src="https://www.ubcfa.org/etc/designs/ubcms/clientlibs-main/images/ub-social.png.img.512.auto.png/1615975625016.png">
        </div>
    @endif

</div>

<script>
    function confirmWin(msg) {
        if(confirm(msg)){
            window.location.href = "#pleasewait";
        }
    }
</script>

</body>
</html>
