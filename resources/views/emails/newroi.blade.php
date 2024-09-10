@component('mail::message')
<b>Greetings!</b>,

This is a notification of a new return on your investment. 
<br>


<strong>Amount: </strong> {{ $demo->received_amount }} <br>
<strong>Date: </strong> {{ $demo->date }} <br>

Thanks,<br>
{{ $demo->sender }}.
@endcomponent
