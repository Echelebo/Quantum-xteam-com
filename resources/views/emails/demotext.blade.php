@component('mail::message')

# Hey, {{ $demo->receiver_name }}
Welcome,  I'm just dropping you a line to see how our trade is working out for you.

Welcome to {{ $demo->sender }}!
Your registration is successful and we are really excited to welcome you to {{ $demo->sender }} community! <br>

I want to make sure you get the most out of our platform.

Keep up with the latest trade from Crypteruim! We discuss the future of crypto currency for business, and highlight how investors can invest their coin.

If you have any questions about the trading or any feedback, just chat live with our support agents anytime. We are always available to help at Crypteruim


We built Crypteruim to not only be an affordable investment, but the best crypto currency investment platform! I hope you use our system to meet all of your needs and invest your crypto currency.

If you need any help, do not hesitate to reach out to us at <br> {{ $demo->contact_email }} <br><br>

Kind regards,<br>
{{ $demo->sender }}.
@endcomponent


