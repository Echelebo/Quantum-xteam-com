@component('mail::message')
# Greetings!

Hello, {{ $demo->name }}
<br />
<br />
This is to inform you that a successful withdrawal has just occured on your account.
<br />
<br />
<b>Amount: </b>{{ $demo->amount }} <br />
<b>Crypto: </b>{{ $demo->mode }} <br />
<b>Wallet: </b>{{ $demo->wallet }} <br />
<b>Hash: </b>{{ $demo->hash }} <br />

<br>
Kind regards,<br>
{{ $demo->sender }}.
@endcomponent
