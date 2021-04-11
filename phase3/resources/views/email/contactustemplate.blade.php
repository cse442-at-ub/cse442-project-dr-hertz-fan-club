@component('mail::message', ['name' => $name])
@component('mail::message', ['email' => $email])
@component('mail::message', ['phone' => $phone])
@component('mail::message', ['topic' => $topic])
@component('mail::message', ['message' => $message])
@component('mail::message', ['attachment' => $attachment])
# Email Sent From Contact Us Page

User's Name: {{ $name }}<br>
User's Email: {{ $email }}<br>
User's Phone: {{ $phone }}<br>
User's Topic: {{ $topic }}<br>
User's Message: {{ $message }}<br>
Attached File: If there is no attachment below, then the user did not attach any files to this message.<br>

@endcomponent