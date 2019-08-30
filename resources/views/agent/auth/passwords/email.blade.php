@extends('agent.layouts.apptwo')

@section('title', 'Reset Password')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="#"><b>Epeakup </b>Agent</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Reset your password</p>

                @if (session('status'))
                    <div class="alert alert-success text-center small" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('agent.password.email') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        <div class="input-group-append input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="input-group mb-3">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ __('Send Password Reset Link') }}
                        </button>
                    </div>
                </form>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection