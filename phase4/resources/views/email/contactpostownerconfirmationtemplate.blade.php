@component('mail::message', ['name' => $name])
@component('mail::message', ['topic' => $topic])
@component('mail::message', ['message' => $message])
@component('mail::message', ['posturl' => $posturl])
# Hello, {{ $name }}!<br>
<br>
You have sent a message through UB Market's Main page for <a href="{{ $posturl }}">{{ $topic }}!</a>
<br>
<br>
Below are the contents that were sent to the owner of that post. <br>
@component('mail::panel')
{{ $message }} <br>
@endcomponent
<br>
If you did not write this message, please change your password as soon as possible!<br>
<br>
From,<br>
Dr. Hertz Fan Club

@endcomponent