@extends('frontEnd.master')

@section('title', 'Add Recipient')

@section('body')
    <div class="py-5"></div>
    <div style="background: #fafbfb;" class="mb-4">
        <div class="container ">
            <div class="row align-items-center ">
                <div class="col-md-3 text-center text-md-left">
                    <h2 class="m-0">Send Money</h2>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-4">
                            <div class="transaction-action-nav">Chose account</div>
                        </div>
                        <div class="col-4">
                            <div class="transaction-action-nav">
                                Add Recepent
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="transaction-action-nav bg-active">Payment</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Recipient form-->
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="payment-method-sec">
                    <p><strong>Select Payment Method</strong></p>

                    <form action="{{ route('checkPaymentMethod') }}" method="post">
                        @csrf
                        <div class="custom-control custom-radio my-3 mr-sm-2">
                            <input type="radio" value="poli" class="custom-control-input" id="poli" name="payMethod" checked>
                            <label class="custom-control-label" for="poli">
                                Pay with POLi
                            </label>
                            <div class="my-2">
                                @if($discount>0)
                                    You will get {{ $discount }}% discount in
                                    <input type="hidden" name="discount" value="{{$discount}}">
                                @endif
                                <img style="width:150px" src="{{ asset('/') }}frontEnd/img/payment/poli.png" alt="Poli">
                            </div>
                        </div>
                        <div class="custom-control custom-radio my-3 mr-sm-2">
                            <input type="radio" value="paypal" class="custom-control-input" id="paypal" name="payMethod">
                            <label class="custom-control-label" for="paypal">
                                Pay with PayPal
                            </label>
                            <div class="my-2">
                                <img style="width:150px" src="{{ asset('/') }}frontEnd/img/payment/paypal.png" alt="Visa">

                            </div>
                        </div>
                        <div class="d-none custom-control custom-radio my-3 mr-sm-2">
                            <input type="radio" value="card" class="custom-control-input" id="dccard" name="payMethod">
                            <label class="custom-control-label" for="dccard">
                               Pay with stripe(Debit/Credit card)
                            </label><br>
                            <div class="payment-sec-text">
                                <div class="my-2">
                                    <img src="{{ asset('/') }}frontEnd/img/payment/visa.png" alt="Visa">
                                    <img src="{{ asset('/') }}frontEnd/img/payment/mastercard.png" alt="Visa">
                                    <img src="{{ asset('/') }}frontEnd/img/payment/maestro.png" alt="Visa">
                                </div>
                                <small class="form-text text-muted text-justify">
                                    The maximum amount you can send with a card is 5,000.00 AUD
                                </small>
                            </div>
                        </div>
                        
                             {{-- POLi Place --}}

                        <div class="form-group">
                            <a href="{{ route('recipientsAdd') }}" class="btn btn-dark btn-lg">Back</a>
                            <button type="submit" href="" class="btn btn-primary btn-lg">Next</button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="col-md-4">
                {{-- Order information show --}}
                @include('frontEnd.inc.orderShow')
            </div>
        </div>
    </div>

@endsection