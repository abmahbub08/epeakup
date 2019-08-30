@extends('agent.layouts.app')

@section('title', $receiver->name().'\'s Information')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Receiver</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Update Receiver</li>
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
                                    <h2>{{ $receiver->name().'\'s Information Update' }}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('receivers.update',$receiver->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="client_name">Sender or Client Name</label>

                                            <select name="client_name" id="client_name"
                                                    class="form-control{{ $errors->has('client_name')?' is-invalid':'' }}"
                                                    required>
                                                <option value="">Select Sender Name</option>
                                                @foreach($clients as $client)
                                                    <option value="{{ $client->id }}"
                                                            {{$receiver->client->id == $client->id ? 'selected':''}}
                                                    >{{ $client->name() }}</option>
                                                @endforeach
                                            </select>

                                            @if ($errors->has('client_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('client_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name *</label>
                                            <input name="first_name" id="first_name" type="text"
                                                   class="form-control {{ $errors->has('first_name')?' is-invalid':'' }}"
                                                   value="{{old('first_name') ? old('first_name') : $receiver->first_name}}"
                                                   placeholder="First Name" required>
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
                                            <input name="last_name" id="last_name" type="text"
                                                   class="form-control {{ $errors->has('last_name')?' is-invalid':'' }}"
                                                   value="{{old('last_name')? old('last_name') : $receiver->last_name }}"
                                                   placeholder="Last Name" required>
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
                                                <input type="text" name="account_number" id="account_number"
                                                       value="{{ old('account_number')? old('account_number') : $receiver->account_number }}"
                                                       class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}"
                                                       placeholder="Ex. 01xxxxxxxxx" required>

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
                                                <input type="text" name="account_number_confirmation"
                                                       id="account_number_confirmation"
                                                       value="{{ old('account_number_confirmation ') }}"
                                                       class="form-control{{ $errors->has('account_number_confirmation ') ? ' is-invalid' : '' }}"
                                                       placeholder="Ex. 01xxxxxxxxx" required>

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
                                            <select name="payment_method" id="payment_method"
                                                    class="form-control{{ $errors->has('payment_method')?' is-invalid':'' }}"
                                                    required>
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
                                            <label for="account_type">Account Type </label>

                                            <select name="account_type" id="account_type"
                                                    class="form-control{{ $errors->has('account_type')?' is-invalid':'' }}">
                                                <option value="">Select Type</option>
                                                <option value="Personal">Personal</option>
                                                <option value="Agent">Agent</option>
                                            </select>

                                            @if ($errors->has('account_type'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('account_type') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-8">
                                        <div class="form-group form-check">
                                            <input name="policy" type="checkbox"
                                                   class="form-check-input {{ $errors->has('policy')?" is-invalid":" " }}"
                                                   id="policy" checked required>
                                            <label class="form-check-label" for="policy">I read <a
                                                        href="#">Policy</a></label>
                                            @if ($errors->has('policy'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('policy') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="form-group form-check">
                                            <input name="agreement" type="checkbox"
                                                   class="form-check-input {{ $errors->has('agreement')?" is-invalid":" " }}"
                                                   id="agreement" checked required>
                                            <label class="form-check-label" for="agreement">I read Agreement</label>
                                            @if ($errors->has('agreement'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('agreement') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <button class="btn btn-primary btn-block" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection