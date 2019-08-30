@extends('agent.layouts.apptwo')

@section('title', 'Agent Registration')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="register-logo mt-4">
                    <a href="{{ route('index') }}"><b>Epeakup </b>Agent</a>
                </div>
                <div class="card">
                    <div class="card-body register-card-body">
                        <p class="login-box-msg">Become an Agent</p>

                        <form method="POST" action="{{ route('agent.register') }}" aria-label="{{ __('Register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input title="First Name" id="first_name" type="text"
                                               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                               name="first_name" value="{{ old('first_name') }}"
                                               placeholder="First Name" required autofocus>
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
                                        <input title="Last Name" id="last_name" type="text"
                                               class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                               name="last_name" value="{{ old('last_name') }}" placeholder="Last Name"
                                               required>
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
                                        <input title="Email" id="email" type="email"
                                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                               name="email" value="{{ old('email') }}" placeholder="Email" required>
                                        <div class="input-group-append input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3" style="border-left: 1px solid #ddd;
    border-top-left-radius: 3px;
    border-top-right-radius: 0px !important;
    border-bottom-left-radius: 3px;
    border-bottom-right-radius: 0px !important;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+61</span>
                                        </div>
                                        <input id="phone" title="Phone" type="tel"
                                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                                               name="phone" value="{{ old('phone') }}" placeholder="Phone Number"
                                               required>
                                        <div class="input-group-append ">
                                            <span class="input-group-text">
                                                <i class="fas fa-phone"></i>
                                            </span>
                                        </div>
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input id="password" title="Password" type="password"
                                               class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                               name="password" placeholder="Password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="showpass" style="cursor: pointer">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>

                                        @if ($errors->has('password'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input id="password-confirm" title="Confirm Password" type="password"
                                               class="form-control" name="password_confirmation"
                                               placeholder="Retype password" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="re-showpass" style="cursor:pointer;">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input id="address" type="text" title="Address"
                                               class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                               name="address" value="{{ old('address') }}" placeholder="Address"
                                               required>
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
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input id="city" type="text" title="City"
                                               class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"
                                               name="city" value="{{ old('city') }}" placeholder="City" required>
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
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <select title="State/Province" id="state"
                                                class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}"
                                                name="state" required>
                                            <option value="">Select State</option>
                                            <option value="ACT">ACT</option>
                                            <option value="NSW">NSW</option>
                                            <option value="NT">NT</option>
                                            <option value="QLD">QLD</option>
                                            <option value="SA">SA</option>
                                            <option value="TAS">TAS</option>
                                            <option value="VIC">VIC</option>
                                            <option value="WA">WA</option>
                                        </select>
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
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <input title="Zip-Code" id="zipcode" type="text"
                                               class="form-control{{ $errors->has('zipcode') ? ' is-invalid' : '' }}"
                                               name="zipcode" value="{{ old('zipcode') }}" placeholder="Zipcode"
                                               required>
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
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <input type="text" value="{{old('abn_number')}}"
                                               class="form-control{{ $errors->has('abn_number') ? ' is-invalid' : '' }}"
                                               name="abn_number" placeholder="Write your ABN Number">

                                        @if ($errors->has('abn_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('abn_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <select name="country"
                                                class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}"
                                                required>
                                            <option value="">Select Country</option>
                                            <option value="2">Australia</option>
                                        </select>

                                        @if ($errors->has('country'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('country') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-8">
                                    <div class="icheck-primary">
                                        <input class="{{ $errors->has('policy')?" is-invalid":" " }}" type="checkbox"
                                               id="policy" name="policy">
                                        <label for="policy">
                                            I read <a href="#">policy</a>
                                        </label>
                                        @if ($errors->has('policy'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('policy') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="icheck-primary">
                                        <input type="checkbox" id="agreement" name="agreement">
                                        <label for="agreement">
                                            I agree with agreement
                                        </label>
                                        @if ($errors->has('agreement'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('agreement') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-4">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                                </div>
                                <!-- /.col -->
                            </div>
                        </form>

                        <div class="text-center">
                            <p class="my-3">- OR -</p>
                            <a href="{{ route('agent.login') }}" class="text-center">I already have a membership</a>
                        </div>

                    </div>
                    <!-- /.form-box -->
                </div><!-- /.card -->
            </div>
        </div>

    </div>
    <!-- /.register-box -->

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
            $('#re-showpass').on('click', function () {
                var input = $('#password-confirm');
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