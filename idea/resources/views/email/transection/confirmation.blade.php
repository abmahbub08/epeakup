@component('mail::message')

Dear {{ $recipient->recipient->first_name.' '.$recipient->recipient->last_name }},<br>
You have a money order from  
{{ $recipient->user->firstName.' '.$recipient->user->lastName }}<br>

Details are below:<br>
Order No : {{$recipient->orderId}}<br>
Methods : {{ $recipient->payment_network->name }}<br>
Country : {{ $recipient->country->name }}<br>
Received Amount : {{ $recipient->recipient_amount }} BDT (${{ $recipient->amount }} AUD) <br>
Within 5-10 minute it will be paid to your sending account number.

Regards,<br>

@endcomponent
