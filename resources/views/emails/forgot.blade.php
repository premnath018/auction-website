@component('mail::message')
<img src="{{ asset('images/logo1.png') }}" alt="Logo" width="150">

Hello {{ $user->name }},

We understand it happens.

@component('mail::button', ['url' => url('reset/' . $user->remember_token)])
Reset Your Password
@endcomponent

In case you have any issues recovering your password, please contact us.

Thanks,<br>
<hr>
{{ config('app.name') }}

@slot('subcopy')
    @isset($subcopy)
        {{ $subcopy }}
    @endisset
@endslot
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent
