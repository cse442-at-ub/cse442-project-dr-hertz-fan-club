@component('mail::message', ['link' => $link])
# Hello!

To verify this email, please click on the link below to complete your registration.<br>
This link is valid for 10 minutes.<br>

@component('mail::panel')
    {{ $link }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
