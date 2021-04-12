@component('mail::message', ['link' => $link])
# Hello!

Please click on the link below to reset your password.<br>
This link is valid for 10 minutes.<br>

@component('mail::panel')
    {{ $link }}
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
