@extends('frontEnd.master')

@section('title', 'Get Start page')

@section('body')
    <div class="py-5"></div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-11 money-bg" style="background-image: url({{ asset('/') }}frontEnd/img/bgimg.jpg);">
                <div class="col-md-7 text-center text-md-left align-self-md-end align-self-start ">
                    <h2 class="" style="color:white;"></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-md-last">
                <aside class="right-side-form">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="text-capitalize">send to
                                <span class="float-right">
                                    <img src="{{ asset('/') }}frontEnd/img/bd.svg" alt="">
                                </span>
                            </h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('send') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="country_id" class="sr-only">Send To</label>
                                    <select name="country_id" id="country_id" class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}">
                                        <option value="null" selected disabled>Select Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id.'-'.$country->currency['rate'] }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('country_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group d-none">
                                    <label for="service_id" class="sr-only">Service</label>
                                    <select name="service_id" id="service_id" class="form-control{{ $errors->has('service_id') ? ' is-invalid' : '' }}"></select>
                                    @if ($errors->has('service_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('service_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group d-none">
                                    <label for="payment_network_id" class="sr-only">Paymet Network</label>
                                    <select name="payment_network_id" id="payment_network_id" class="form-control{{ $errors->has('payment_network_id') ? ' is-invalid' : '' }}"></select>
                                    @if ($errors->has('payment_network_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('payment_network_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="row d-none">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select name="status" id="" class="form-control">
                                                <option value="Send">Send</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <select name="currency" id="" class="form-control">
                                                <option value="AUD">AUD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="amount" id="amount" min="1" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}">

                                            @if ($errors->has('amount'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <input type="hidden" value="" name="fees" id="charge">
                                        <input type="hidden" value="" name="totalpay" id="ftotalpay">
                                        <input type="hidden" value="" name="reciAmount" id="freciAmount">
                                    </div>
                                </div>
                                <div class="payment-transform-sec d-none" id="sendAmountInfo">
                                    <div class="payment-item row justify-content-between">
                                        <strong>Send amount</strong>
                                        <span id="sendAmount"> 100.00</span>
                                    </div>
                                    <div class="payment-item row justify-content-between">
                                        <strong>Fees</strong>
                                        <span id="fees"></span>
                                    </div>
                                    <hr>
                                    <div class="payment-item row justify-content-between">
                                        <strong>Total to pay</strong>
                                        <span id="totalpay"> 100.00</span>
                                    </div>
                                    <div class="payment-item row justify-content-between">
                                        <strong>Exchange Rate</strong>
                                        <span id="exchangeRate"> 100.00</span>
                                    </div>
                                    <div class="payment-item row justify-content-between">
                                        <strong>Your recipient gets</strong>
                                        <span id="reciAmount"> 100.00</span>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <input type="submit" value="Send" class="btn btn-info btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-md-7 my-5">
                <article class="article-featured">
                    <h3>Our Features</h3>
                    <ul>
                        <li>Free Registration from any part of the world</li>
                        <li>Easy payment option</li>
                        <li>Safe - Secure – Reliable</li>
                        <li>Best Exchange Rate Guaranteed</li>
                        <li>Free Sign up</li>
                        @forelse($services as $service)
                            <li>For <mark>{{ $service->name }}</mark> fees will be charged ${{ $service->service_charge }} AUD</li>
                            @empty
                            <li>No Service Yet</li>
                        @endforelse
                    </ul>
                </article>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{asset('/')}}frontEnd/js/unnamed.js"></script>
@endpush