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
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8">
                <div class="payment-method-sec">
                    <form action="{{ route('checkOutPoli') }}" method="post">
                        @csrf
                        <p><strong>Internet Banking (Pay With POLi™)</strong></p>
                        <div class="mt-2 mb-4">
                            <img src="{{ asset('/') }}frontEnd/img/payment/poli_logo_transparent-150x68.gif" alt="POLi™">
                        </div>
                        <div class="form-group">
                            <label for="banks">Select Your Bank:</label>
                            <select class="custom-select col-md-4" id="banks" name="poliBank">
                                <option selected value="">Choose Bank</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>

                        <div class="form-group mt-5">
                            <a href="" class="btn btn-dark btn-lg">Back</a>
                            <button type="submit" class="btn btn-primary btn-lg">Next</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="payment-detail-sec">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="text-center">
                                Payment Details
                            </h2>
                            @php(extract(session('order')))
                        </div>
                        <div class="card-body">
                            <div class="payment-detail-text">
                                <div class="row">
                                    <div class="col-7">
                                        <span>Send Amount: </span>
                                    </div>
                                    <div class="col-5">
                                        <span>AUD ${{ $amount }}</span>
                                    </div>
                                    <hr>

                                    <div class="w-100"></div>

                                    <div class="col-7">
                                        <span>Fees: </span>
                                    </div>
                                    <div class="col-5">
                                        <span>AUD ${{ $fees }}</span>
                                    </div>
                                    <hr>

                                    <div class="w-100"></div>

                                    <div class="col-7">
                                        <span>Total to Pay: </span>
                                    </div>
                                    <div class="col-5">
                                        <strong>AUD ${{ $totalpay }}</strong>
                                    </div>
                                    <hr>
                                    <div class="w-100"></div>

                                    <div class="col-7">
                                        <span>Your Recipient Gets: </span>
                                    </div>
                                    <div class="col-5">
                                        <strong>BDT Tk. {{ $reciAmount }}</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection