@extends('agent.layouts.app')

@section('title', 'Change password')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Change Password</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body login-card-body">

                            <form method="POST" action="{{ route('agent.change.password') }}" aria-label="{{ __('Reset Password') }}">
                                @csrf

                                <div class="input-group mb-3">
                                    <input type="password" class="form-control{{ $errors->has('oldpassword') ? ' is-invalid' : '' }}" name="oldpassword" placeholder="Old Password" required autofocus>
                                    <div class="input-group-append input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                    @if ($errors->has('oldpassword'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('oldpassword') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="New Password" required>
                                    <div class="input-group-append input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                    <div class="input-group-append input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                                        {{ __('Change Password') }}
                                    </button>
                                </div>
                            </form>

                        </div>
                        <!-- /.login-card-body -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
