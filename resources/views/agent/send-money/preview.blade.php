@extends('agent.layouts.app')

@section('title', 'Add Client ')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Currency Converter</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">

                        <div class="card-body">
                            <form action="{{ route('PayNow') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="step" value="{{encrypt('4')}}">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="first_name">Tracking Number : {{$request->traking_number}}</label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="phone">Sender Name : {{$request->sender_name}}</label>
                                        <br>
                                        <label for="phone">Mobile Number : +61{{$request->australian_number}}</label>
                                        <br>
                                        <label for="phone">Email Address: {{$request->sender_email}}</label>
                                        <br>
                                        <label for="phone">Payment Method : <span id="payment_method">{{$request->payment_method}}</span></label>

                                    </div>
                                    <div class="col-md-2">
                                        <label for="phone">Sent to</label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="phone">Receiver Name : {{$request->receiver_name}}</label>
                                        <br>
                                        <label for="phone">Account Number : {{$request->receiver_number}}</label>
                                        <br>
                                        <label for="phone">receiver Mobile Number : {{$request->receiver_number}}</label>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-8">
                                                @php
                                                $charge = ($request->payment_method == 'bkash') ? getCharge(1) : getCharge(2);

                                               // $cost = $request->aud_amount* ($charge/100);
                                                $total_pay = $request->aud_amount + $charge;
                                                @endphp
                                                <label>Aud Amount : ${{round($request->aud_amount,2)}} + Service charge (<span id="service_charge">{{$charge}}</span>) </label>
                                            </div>
                                            <div class="col-md-4">
                                                <label for_cost="">= Total Paid : ${{round($total_pay,2)}}</label>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">**Rate : {{getAudCurrency()}}</label>
                                            </div>
                                            <div class="col-md-4 offset-5">
                                                <label for="">Total BD Receive : {{round(getAudCurrency($request->aud_amount),2)}} BDT</label>
                                            </div>

                                        </div>
                                    </div>


                                </div>



                                <div class="text-center">
                                    <a href="{{route('PayBack')}}" class="btn btn-primary">Back</a>
                                    <button class="btn btn-primary" type="submit">Pay Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection