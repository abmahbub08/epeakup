@extends('frontEnd.master')

@section('title', 'Debit or Credit card')

@section('body')
    <div class="py-5"></div>
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-9 col-lg-7">
                <div class="dc-card-sec">
                    <div class="card">
                        <div class="card-body">

                            <form action="{{ route('cardCheckOut') }}" method="post" id="payment-form">
                                @csrf
                                <h2 class="mb-3">Pay with a debit or credit card</h2>
                                <p>Total to pay <strong>${{ session('order')['totalpay'] }} AUD</strong></p>
{{--                                <p class="mb-0"><strong>Payment details <i class="fa fa-lock"></i></strong><span class="float-right text-danger">* Required field</span></p>--}}

{{--                                <hr style="margin-top:.5rem">--}}
                                <script src="https://js.stripe.com/v3/"></script>
                                <div class="form-group">
                                    <div class="form-row">
                                        <label for="card-element">
                                            <strong>Credit or debit card</strong>
                                        </label>
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>

                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-info">Pay Now</button>
                                </div>

{{--                                <p class="mb-0"><label for="">Card type *</label></p><div class="row mb-4"><div class="col-6"><input type="radio" name="card" id="visa" value="visa" checked><label class="form-check-label" for="visa"><img src="{{asset('/')}}frontEnd/img/payment/visa.png" alt="Visa" width="40">Visa</label></div><div class="col-6"><input type="radio" name="card" id="mastercard" value="mastercard"><label class="form-check-label" for="mastercard"><img src="{{asset('/')}}frontEnd/img/payment/mastercard.png" alt="mastercard" width="40">Mastercard</label></div></div><div class="form-group"><label for="cardnumber">Card Number *</label><input type="number" name="card_number" id="" class="form-control"></div><div class="form-group"><label for="">Expiry date *</label><div class="row"><div class="col-3"><select name="exp_day" id="" class="form-control"><option value="01">01</option><option value="02">02</option><option value="03">03</option><option value="04">04</option></select></div><div class="col-3"><select name="exp_year" id="" class="form-control"><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option></select></div></div></div><div class="form-group"><label for="securitycode">Security Code</label><div class="row"><div class="col-3"><input type="number" name="security_code" class="form-control"></div></div><small class="form-text">This code is a three or four digit number printed on the back of front of credit card</small></div><div class="text-center"><input type="submit" value="Pay" class="btn btn-primary"></div>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection