@extends('agent.layouts.app')

@section('title', 'Add Recipient ')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Recipients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Recipient</li>
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
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <h2>Add Recipient</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('recipients.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name *</label>
                                            <input name="first_name" id="first_name" type="text" class="form-control {{ $errors->has('first_name')?' is-invalid':'' }}" value="{{old('first_name')}}" placeholder="First Name" required>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name *</label>
                                            <input name="last_name" id="last_name" type="text" class="form-control {{ $errors->has('last_name')?' is-invalid':'' }}" value="{{old('last_name')}}" placeholder="Last Name" required>
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_number">Account Number *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+88</div>
                                                </div>
                                                <input type="text" name="account_number" id="account_number" value="{{ old('account_number') }}" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" placeholder="Ex. 01xxxxxxxxx" required>

                                                @if ($errors->has('account_number'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('account_number') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_number_confirmation ">Confirm Account Number *</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">+88</div>
                                                </div>
                                                <input type="text" name="account_number_confirmation" id="account_number_confirmation" value="{{ old('account_number_confirmation ') }}" class="form-control{{ $errors->has('account_number_confirmation ') ? ' is-invalid' : '' }}" placeholder="Ex. 01xxxxxxxxx" required>

                                                @if ($errors->has('account_number_confirmation '))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('account_number_confirmation ') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="payment_method">Payment Method *</label>
                                            <select name="payment_method" id="payment_method" class="form-control{{ $errors->has('payment_method')?' is-invalid':'' }} ">
                                                <option value="">Select Method</option>
                                                <option value="bkash">bkash</option>
                                                <option value="Rocket">Rocket</option>
                                                <option value="GP Topup">GP Topup</option>
                                                <option value="Airtel Topup">Airtel Topup</option>
                                                <option value="Robi Topup">Robi Topup</option>
                                                <option value="Talitalk Topup">Talitalk Topup</option>
                                                <option value="Banglalink Topup">Banglalink Topup</option>
                                            </select>

                                            @if ($errors->has('payment_method'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('payment_method') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="account_type">Account Type *</label>

                                            <select name="account_type" id="account_type" class="form-control{{ $errors->has('account_type')?' is-invalid':'' }} ">
                                                <option value="">Select Type</option>
                                                <option value="Personal">Personal</option>
                                                <option value="Agent">Agent</option>
                                            </select>

                                            @if ($errors->has('account_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('payment_method') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Phone *</label>
                                            <input name="phone" id="phone" type="text" class="form-control {{ $errors->has('phone')?' is-invalid':'' }}" value="{{old('phone')}}" placeholder="Ex: 01xxxxxxxxx" required>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input name="email" id="email" type="email" class="form-control {{ $errors->has('email')?' is-invalid':'' }}" value="{{old('email')}}" placeholder="Email" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address *</label>
                                            <input name="address" id="address" type="text" class="form-control {{ $errors->has('address')?' is-invalid':'' }}" value="{{old('address')}}" placeholder="Address" required>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="city">City *</label>
                                            <input name="city" id="city" type="text" class="form-control {{ $errors->has('city')?' is-invalid':'' }}" value="{{old('city')}}" placeholder="City" required>
                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection