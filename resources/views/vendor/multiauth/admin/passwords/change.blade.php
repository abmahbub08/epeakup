@extends('backEnd.master')

@section('title', 'Change Password')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/') }}backEnd/bower_components/select2/dist/css/select2.min.css">
@endpush

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Change Password
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{  route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Change Password</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="box-body">
                            @include('multiauth::message')
                            <form method="POST" action="{{ route('admin.password.change') }}"
                                  aria-label="{{ __('Admin Change Password') }}">
                                @csrf
                                <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
                                    <label for="oldPassword">{{ __('Old Password') }}</label>

                                    <div class="">
                                        <input id="oldPassword" type="password"
                                               class="form-control" name="oldPassword"
                                               value="{{ $oldPassword ?? old('oldPassword') }}" placeholder="Old Password"
                                               required autofocus>
                                        @if ($errors->has('oldPassword'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('oldPassword') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <label for="password">{{ __('Password') }}</label>

                                    <div class="">
                                        <input id="password" type="password"
                                               class="form-control" name="password" placeholder="New Password"
                                               required>
                                        @if ($errors->has('password'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm">{{ __('Confirm Password') }}</label>

                                    <div class="">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" placeholder="Re-enter Password"
                                               required>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary btn-flat">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection