@extends('frontEnd.master')

@section('title','Login')

@section('body')
    <div class="py-4"></div>
    <div class="container pt-4">
        <div class="row justify-content-center py-5">
            <div class="col-md-8 col-lg-5">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="form-section">
                        <div class="form-sec-header">
                            <h2>Login to Continue</h2>
                        </div>
                        <div class="form-sec-body">
                            <div class="form-item-groups">
                                <span class="form-item-icon">
                                  <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                </span>
                                <span class="form-item-input">
                                  <input type="email" name="email" id="email" placeholder="Your email address"
                                         class="form-items">
                                </span>
                            </div>
                            <div class="form-item-groups">
                                <span class="form-item-icon">
                                  <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                                <span class="form-item-input">
                                  <input type="password" name="password" id="" placeholder="Your password"
                                         class="form-items">
                                </span>

                            </div>
                            <div class="form-btn-sse">
                                <input type="submit" value="Login" class="form-btn">
                            </div>
                            @if (Route::has('password.request'))
                                <a class="form-forget" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                        <hr>
                        <div class="form-sec-footer">
                            <div class="form-sec-footer-text">
                                <h3>New to Epeakup?</h3>
                                <p>Signing up takes less than a minute</p>
                            </div>
                            <div class="form-sec-footer-link">
                                <a href="{{route('register')}}">Signup</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection