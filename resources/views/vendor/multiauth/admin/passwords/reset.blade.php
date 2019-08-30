@extends('backEnd.authorize.app')
@section('title', 'Reset Password')
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

        <form method="POST" action="{{ route('admin.password.request') }}"
              aria-label="{{ __('Admin Reset Password') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <div class="">
                    <input id="email" type="email" class="form-control" name="email"
                           value="{{ $email ?? old('email') }}" placeholder="Email"
                           required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" type="password" class="form-control" name="password" placeholder="New Password"
                           required>
                    @if ($errors->has('password'))
                        <span class="help-block" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <div class="">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           placeholder="Re-enter Password"
                           required>
                </div>
            </div>

            <div class="form-group text-center">
                <button type="submit" class="btn btn-primary btn-flat btn-block">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
@endsection