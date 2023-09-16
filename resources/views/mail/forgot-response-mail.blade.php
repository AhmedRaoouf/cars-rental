@component('mail::message')
Please find yout OTP for logging into <strong>Drov Panel</strong>

<strong>{{$OTP}}</strong>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
