@extends('frontEnd.master')

@section('title', 'Debit or Credit card')

@section('body')
    <div class="py-5"></div>
    <div class="container">
        <div class="row justify-content-center my-3">
            <div class="col-md-9 col-lg-7">
                <div class="dc-card-sec">
                    <div class="card">
                        <div class="card-body mb-5">
                            <form action="{{ route('checkOutWithPoli') }}" method="post">
                                @csrf
                                <img src="{{ asset('frontEnd/img/payment/poli.png') }}" alt="" class="mb-4">

                                <h2 class="mb-3">You are paying</h2>
                                <p>Total to pay <strong>$ {{ session('order')['amount'] }} AUD</strong></p>
                                <p class="mb-0">
                                    <strong>Payment details <i class="fa fa-lock"></i></strong>
                                    <span class="float-right text-danger">* Required field</span>
                                </p>
                                <hr style="margin-top:.5rem">

                                <div class="form-group">
                                    <label for="email">Customer Login</label>
                                    <input name="poliemail" type="email" class="form-control" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="polipassword" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="text-center">
                                    <input type="submit" value="Logon" class="btn btn-primary d-block w-100">
                                </div>
                                <div class="my-2 text-center">
                                    <button>Cancel</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection