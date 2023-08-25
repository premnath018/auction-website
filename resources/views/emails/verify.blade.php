@component('mail::message')
<img src="{{ asset('images/logo1.png') }}" alt="Logo" width="150">

Hello {{ $user->name }},

Welcome to {{ config('app.name') }}! To get started, please verify your email address by clicking the button below:

@component('mail::button', ['url' => url('verifyEmail/' . $user->remember_token)])
Verify Email Address
@endcomponent

If you didn't create an account, you can safely ignore this email.

Thanks,<br>
{{ config('app.name') }}

@slot('subcopy')
    @isset($subcopy)
        {{ $subcopy }}
    @endisset
@endslot
        © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
@endcomponent

