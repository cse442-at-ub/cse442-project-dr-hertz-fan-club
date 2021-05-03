@component('mail::message', ['name' => $name])
@component('mail::message', ['topic' => $topic])
@component('mail::message', ['message' => $message])
@component('mail::message', ['attachment' => $attachment])
@component('mail::message', ['filemsg' => $filemsg])
# Hello, {{ $name }}!<br>
<br>
You have sent us an email throught the Contact Us page.<br>
Below are the contents that were sent to us. <br>
@component('mail::panel')
Topic: {{ $topic }}<br>
Message: {{ $message }} <br>
Attached File: {{ $filemsg }}<br>
@endcomponent
<br>
We will contact you as soon as we can!<br>
<br>
If you did not write this message, please change your password as soon as possible!<br>
<br>
From,<br>
Dr. Hertz Fan Club

@endcomponent