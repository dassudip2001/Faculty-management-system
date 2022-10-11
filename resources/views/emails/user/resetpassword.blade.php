@component('mail::message')
# Introduction

<h4>Hello!</h4>
<p>You are receiving this email because we received a password reset request for your account.</p>


<img src="{{ $image }}" alt="nothing">

@component('mail::button', ['url' => $url])
  Click to Google
@endcomponent

This password reset link will expire in 60 minutes.

If you did not request a password reset, no further action is required.

Regards,
Vidyasagar Universityr>
{{ config('app.name') }}
@endcomponent
