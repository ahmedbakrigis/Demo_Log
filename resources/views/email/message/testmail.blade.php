@component('mail::message')
# Introduction

The body of your message.
The Laravel Msg
<hr>
{!! $message !!}
@component('mail::button', ['url' =>url('/')])
My Application
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
