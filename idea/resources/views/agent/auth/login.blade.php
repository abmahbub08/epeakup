@extends('agent.layouts.apptwo')

@section('title', 'Agent Login')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('index') }}"><b>Epeakup </b>Agent</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form method="POST" action="{{ route('agent.login') }}" aria-label="{{ __('Login') }}">
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
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                        <div class="input-group-append">
                            <span class="input-group-text" id="showpass">
                                <i class="fas fa-eye"></i>
                            </span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="text-center mb-3">
                    <p>- OR -</p>
                    <p class="mb-1">
                        <a class="btn btn-link" href="{{ route('agent.password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </p>
                    <p class="mb-0">
                        <a  href="{{ route('agent.register') }}" class="text-center btn btn-success">Signup now for Agent </a>
                    </p>
                </div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function () {
            $('#showpass').on('click', function () {
                var input = $('#password');
                var type = input.attr('type');
                if (type == 'password') {
                    input.attr('type', 'text');
                    $(this).children().removeClass('fa-eye');
                    $(this).children().addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    $(this).children().addClass('fa-eye');
                    $(this).children().removeClass('fa-eye-slash');
                }
            });
        });
    </script>
@endpush