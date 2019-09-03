@extends('agent.layouts.app')

@section('title', 'Add Client ')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Send Money</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sendMoneyStep',1) }}">step 1</a></li>
                        <li class="breadcrumb-item active">step 2</li>
                    </ol>
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
                            <form action="{{ route('sendMoney') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="step" value="{{encrypt('2')}}">
                                <input type="hidden" name="sender_name" value="{{$details['sender_name']}}">
                                <input type="hidden" name="australian_number" value="{{$details['australian_number']}}">
                                <input type="hidden" name="sender_email" value="{{$details['sender_email']}}">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <h3>Select Payment Method</h3>

                                        </div>
                                    </div>



                                    {{--<option value="bkash">bkash</option>--}}
                                    {{--<option value="Rocket">Rocket</option>--}}
                                    {{--<option value="GP Topup">GP Topup</option>--}}
                                    {{--<option value="Airtel Topup">Airtel Topup</option>--}}
                                    {{--<option value="Robi Topup">Robi Topup</option>--}}
                                    {{--<option value="Talitalk Topup">Talitalk Topup</option>--}}
                                    {{--<option value="Banglalink Topup">Banglalink Topup</option>--}}
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="paymentWrap">
                                            <div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
                                                <label class="btn paymentMethod active">
                                                    <div class="method visa">bkash</div>
                                                    <input type="radio" value="bkash" name="payment_method" checked>
                                                </label>
                                                <label class="btn paymentMethod">
                                                    <div class="method master-card">Rocket</div>
                                                    <input type="radio" value="Rocket" name="payment_method">
                                                </label>
                                                <label class="btn paymentMethod">
                                                    <div class="method amex">Topup</div>
                                                    <input type="radio" value="Topup" name="payment_method">
                                                </label>


                                            </div>
                                        </div>
                                    </div>


                                </div>



                                <div class="text-center">
                                    <a href="{{route('PayBack')}}" class="btn btn-primary">Back</a>
                                    <button class="btn btn-primary" type="submit">Next</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection