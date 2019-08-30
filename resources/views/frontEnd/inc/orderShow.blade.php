@if(session('order'))
    <div class="payment-detail-sec">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">
                    Payment Details
                </h2>
                @php
                    extract(session('order'))
                @endphp
            </div>
            <div class="card-body">
                <div class="payment-detail-text">
                    <div class="row">
                        <div class="col-7">
                            <small>Send Amount: </small>
                        </div>
                        <div class="col-5">
                            <small>AUD {{ $amount  }}</small>
                        </div>
                        <hr>

                        <div class="w-100"></div>

                        <div class="col-7">
                            <small>Fees: </small>
                        </div>
                        <div class="col-5">
                            <small>AUD {{ $fees }}</small>
                        </div>
                        <hr>

                        <div class="w-100"></div>

                        <div class="col-7">
                            <small>Total to Pay: </small>
                        </div>
                        <div class="col-5">
                            <small>AUD {{ $totalpay }}</small>
                        </div>
                        <hr>
                        <div class="w-100"></div>

                        <div class="col-7">
                            <small>Your Recipient Gets: </small>
                        </div>
                        <div class="col-5">
                            <small>BDT {{ $reciAmount }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif