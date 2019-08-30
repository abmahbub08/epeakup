@extends('frontEnd.master')

@section('title', 'Signup')

@section('body')
    <div class="py-4"></div>
    <div class="container pt-4">
        <div class="row justify-content-center my-5">
            <div class="col-md-8 col-lg-7">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="form-section">
                        <div class="form-sec-header text-center">
                            <h2>Create an account. It’s free!</h2>
                            <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
                        </div>
                        <div class="form-sec-worning">
                            <p>At Epeakup, we respect your privacy and always treat your personal data securely in compliance with strict data protection regulations.</p></br>
                                <b style="color:red">After submit this form please go to your mail and verify your account.</b> </br>And never forget to update your profile.
                        </div>
                        <div class="form-sec-body">
                            <div class="form-item-groups">
                                <span class="form-item-input">
                                  <select name="country_id" id="" class="form-items">
                                    <option value="1">Bangladesh</option>
                                  </select>
                                </span>
                            </div>

                            <div class="form-bod-text">
                                <h2>Your Name</h2>
                            </div>
                            <div class="form-item-groups">
                                <span class="form-item-input">
                                  <input type="text" name="firstName" placeholder="Your first name" class="form-items">
                                </span>
                            </div>
                            <div class="form-item-groups">
                                <span class="form-item-input">
                                  <input type="text" name="lastName" placeholder="Your surname name" class="form-items">
                                </span>
                            </div>
                            <p style="font-size:15px;">Please input your full legal name as shown on your passport or
                                driving license
                            </p>

                            <div class="form-bod-text">
                                <h2>Login Details</h2>
                            </div>
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
                            <div class="form-item-groups">
                                <span class="form-item-icon">
                                  <i class="fa fa-lock" aria-hidden="true"></i>
                                </span>
                                <span class="form-item-input">
                                  <input type="password" name="password-confirm" id="" placeholder="Confirm password"
                                         class="form-items">
                                </span>
                            </div>
                            <p style="font-size: 15px;">Your password should be at least 8 characters
                            </p>
                            <div class="form-btn-sse">
                                <input type="submit" value="Signup" class="form-btn">
                            </div>
                        </div>
                        <hr>
                        <div class="form-sec-footer">
                            <div class="form-sec-footer-text text-center">
                                <p>By submitting this form, you accept Epeakup's
                                 
                                    <a class="text-capitalize" style="font-size: 16px;" href="{{route('tandc')}}">Terms & Privacy</a>.
                                </p>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection