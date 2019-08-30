@extends('backEnd.authorize.app')
@section('title', 'Login')
@section('body')
    <!-- /.login-logo -->
    <div class="login-box-body">
{{--        <p class="login-box-msg"><i class="fa fa-thumbs-o-up fa-2x"></i></p>--}}
        <p class="login-box-msg"><i class="fa fa-hand-peace-o fa-2x"></i></p>

        <form action="{{ route('admin.login') }}" method="post">
            @csrf
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email" class="sr-only">Email</label>
                <input id="email" type="email" class="form-control"
                       name="email" value="{{ old('email') }}"
                       required autofocus>
                @if ($errors->has('email'))
                    <div class="help-block" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password" class="sr-only">Password</label>
                <input id="password" type="password" placeholder="Password" class="form-control" name="password"
                       required>
                @if ($errors->has('password'))
                    <div class="help-block" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <input type="checkbox" name="remember"
                               id="remember" {{ old( 'remember') ? 'checked' : '' }} value="1">

                        <label for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Login') }}
                    </button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <div class="social-auth-links text-center">
            <a href="{{ route('admin.password.request') }}">I forgot my password</a>
        </div>
        <!-- /.login-box-body -->
    </div>
@endsection