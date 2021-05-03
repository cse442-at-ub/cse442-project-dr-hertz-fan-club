@component('mail::message', ['name' => $name])
@component('mail::message', ['email' => $email])
@component('mail::message', ['topic' => $topic])
@component('mail::message', ['message' => $message])
@component('mail::message', ['posturl' => $posturl])
# Email Sent From UB Market Main Page

Interested User's Name: {{ $name }}<br>
Interested User's Email: {{ $email }}<br>
User is intersted in your post <a href="{{ $posturl }}">{{ $topic }}!</a> <br>
<br>
Below are the contents that were sent to the post owner. <br>
@component('mail::panel')
{{ $message }} <br>
@endcomponent

@endcomponent