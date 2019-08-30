@extends('frontEnd.master')

@section('title','Update your information')

@section('body')
    <div class="py-5"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 py-5">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">
                            Update: {{ auth()->user()->firstName }} {{ auth()->user()->lastName }}
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update',auth()->id()) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="custom-file">
                                <input type="file" class="custom-file-input{{ $errors->has('documents') ? ' is-invalid' : '' }}" id="customFile" name="documents">
                                <label class="custom-file-label" for="customFile">Choose file</label>

                                @if($errors->has('documents'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('documents') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="firstName" class="col-form-label">First Name</label>
                                <input id="firstName" type="text" class="form-control{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName')?old('firstName'):auth()->user()->firstName }}"  autocomplete="firstName" required="">

                                @if ($errors->has('firstName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('firstName') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="lastName" class="col-form-label">Last Name</label>
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName')?old('lastName'):auth()->user()->lastName }}" required="">

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('lastName') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Gender</label>
                                <div>
                                    <div class="form-check">
                                      <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio" name="gender" id="male" value="Male">
                                      <label class="form-check-label" for="male">Male</label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input{{ $errors->has('gender') ? ' is-invalid' : '' }}" type="radio" name="gender" id="female" value="Female">
                                      <label class="form-check-label" for="female">Female</label>
                                        @if ($errors->has('gender'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('gender') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone</label>
                                <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone')?old('phone'):auth()->user()->phone }}" required="">

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="buildingName" class="col-form-label">Building No./Name</label>
                                <input id="buildingName" type="text" class="form-control{{ $errors->has('buildingName') ? ' is-invalid' : '' }}" name="buildingName" value="{{ old('buildingName')?old('buildingName'):auth()->user()->buildingName }}" >

                                @if ($errors->has('buildingName'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('buildingName') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="street" class="col-form-label">Street</label>
                                <input id="street" type="text" class="form-control{{ $errors->has('street') ? ' is-invalid' : '' }}" name="street" value="{{ old('street')?old('street'):auth()->user()->street }}" >

                                @if ($errors->has('street'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('street') }}</strong>
                                </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="postcode" class="col-form-label">Postcode</label>
                                <input id="postcode" type="number" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ old('postcode')?old('postcode'):auth()->user()->postcode }}">

                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('postcode') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <label for="city" class="col-form-label">City/Town</label>
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city')?old('city'):auth()->user()->city_id }}" >

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                                @endif
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function () {
            bsCustomFileInput.init()
        })
    </script>
@endpush