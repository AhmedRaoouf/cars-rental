@component('mail::message')
# Welcome to Drov
Dear {{$email}},
Please find your OTP for logging into <strong>Drov</strong>

<strong>{{$otp}}</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent