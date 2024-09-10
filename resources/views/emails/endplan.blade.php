@component('mail::message')
<b>Greetings!</b>,

This is to notify you that your investment order ({{ $demo->receiver_plan }} plan)  has matured, you have received your final roi and has been added to your account for withdrawal or re-investment. <br>



<strong>Amount:</strong> {{ $demo->received_amount }} <br>

<strong>Date:</strong> {{ $demo->date }} <br>

Kind regards,<br>
{{ $demo->sender }}.
@endcomponent
