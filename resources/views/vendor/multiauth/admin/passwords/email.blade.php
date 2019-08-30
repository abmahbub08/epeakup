@extends('backEnd.authorize.app')
@section('title', 'Forget Password')
@section('body')
    <div class="login-box-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <br>
        <p class="login-box-msg">
            Reset {{ ucfirst(config('multiauth.prefix')) }} Password
        </p>

        <form method="POST" action="{{ route('admin.password.email') }}"
              aria-label="{{ __('Reset Admin Password') }}">
            @csrf

            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email"
                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                           name="email" value="{{ old('email') }}"
                           required> @if ($errors->has('email'))
                        <div class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div> @endif
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-flat btn-block">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </form>
        <div class="text-center">
            <a href="{{ route('admin.login') }}" class="btn btn-warning btn-flat">
                <i class="fa fa-arrow-left"></i>
            </a>
        </div>
    </div>
@endsection