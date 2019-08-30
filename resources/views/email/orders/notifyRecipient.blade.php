@component('mail::message')

Dear {{ $userdata->user->firstName.' '.$userdata->user->lastName }},

You send a money order to  
{{ $userdata->recipient->first_name.' '.$userdata->recipient->last_name }} .<br>

Amount (BDT) : {{ $userdata->recipient_amount }}TK  (${{ $userdata->amount }} AUD) <br>
Fees: ${{ $userdata->payment_network->service->service_charge }} AUD (For {{ $userdata->payment_network->service->name }})<br>
Total Deduce Amount: ${{ $userdata->totalpay}} AUD <br>
Excenge Rate : {{ $userdata->country->currency->rate }} BDT = $1 AUD<br>
Within 5-10 minute it will be paid to your sending account number.

Regards,
@endcomponent
