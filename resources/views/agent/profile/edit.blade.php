@extends('agent.layouts.app')

@section('title', 'Agent ' .$profile->first_name. '\'s Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$profile->first_name.' '.$profile->last_name}}'s Profile edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile Update</li>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body register-card-body">
                            <p class="login-box-msg">Edit your information</p>

                            <form method="POST" action="{{ route('agent.profile.update') }}" aria-label="{{ __('Register') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input title="First Name" id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name')? old('first_name'): $profile->first_name }}" placeholder="First Name" required autofocus>
                                            <div class="input-group-append input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input title="Last Name" id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name')? old('last_name'): $profile->last_name }}" placeholder="Last Name" required>
                                            <div class="input-group-append input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
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
                                        <div class="input-group mb-3">
                                            <input id="phone" title="Phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone')? old('phone'): $profile->phone }}" placeholder="Phone Number" required>
                                            <div class="input-group-append input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input id="address" type="text" title="Address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address')? old('address'): $profile->address }}" placeholder="Address" required>
                                            <div class="input-group-append input-group-text">
                                                <span class="fas fa-map-marker-alt"></span>
                                            </div>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input id="city" type="text" title="City" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city')? old('city'): $profile->city }}" placeholder="City" required>
                                            <div class="input-group-append input-group-text">
                                                <span class="fas fa-city"></span>
                                            </div>
                                            @if ($errors->has('city'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('city') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input title="State/Province" id="state" type="text" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state')? old('state'): $profile->state }}" placeholder="State or Province" required>
                                            <div class="input-group-append input-group-text">
                                                <span class="fas fa-location-arrow"></span>
                                            </div>
                                            @if ($errors->has('state'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('state') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group mb-3">
                                            <input title="Zip-Code" id="zipcode" type="text" class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}" name="zipcode" value="{{ old('zipcode')? old('zipcode'): $profile->zipcode }}" placeholder="Zipcode" required>
                                            <div class="input-group-append input-group-text">
                                                <span class="fas fa-qrcode"></span>
                                            </div>
                                            @if ($errors->has('zipcode'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('zipcode') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <select name="country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" required>
                                                <option value="">Select Country</option>
                                                <option value="1">Bangladesh</option>
                                            </select>

                                            @if ($errors->has('country'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="avatar" type="file" class="custom-file-input {{ $errors->has('avatar') ? ' is-invalid' : '' }}" id="avatar" >
                                                <label class="custom-file-label" for="avatar">Choose your photo</label>
                                                @if ($errors->has('avatar'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('avatar') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.form-box -->
                    </div><!-- /.card -->

                </div>
            </div>
        </div>
    </div>
@endsection
