@extends('frontEnd.master')

@section('title', 'Add Recipient')

@section('body')
    <div class="py-5"></div>
    <div style="background: #fafbfb;" class="mb-4">
        <div class="container ">
            <div class="row align-items-center ">
                <div class="col-md-3 text-center text-md-left">
                    <h2 class="m-0">Send Money</h2>
                </div>
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-4">
                            <div class="transaction-action-nav">choose account</div>
                        </div>
                        <div class="col-4">
                            <div class="transaction-action-nav bg-active">
                                Add Recepent
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="transaction-action-nav">Payment</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Recipient form-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="add-recipient-form-sec mb-5">
                    <form action="{{ route('recipient.store') }}" method="POST">
                        @csrf
                       {{--  <p>These are your recipients in Bangladesh</p> --}}
                        <div class="form-group row">
                            <label for="recipient" class="col-lg-4 col-form-label">{{-- Choose Recipient --}} 
                            </label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
{{--                                        <select name="" id="recipient" class="form-control">--}}
{{--                                            <option value="">New recipient</option>--}}
{{--                                        </select>--}}
                                        {{-- New Recipient --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <p><strong>Recipient Account Details</strong></p>
                        <div class="form-group row">
                            <label for="country" class="col-lg-4 col-form-label">Country</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" value="{{ $country->name }}" class="form-control" disabled>
                                    </div>
                                    <div class="col-1">*</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="account_number" class="col-lg-4 col-form-label">{{ $account->name }} Number :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+88</div>
                                            </div>
                                            <input type="text" name="account_number" id="account_number" value="{{ old('account_number') }}" class="form-control{{ $errors->has('account_number') ? ' is-invalid' : '' }}" required>
					                    
					                    @if ($errors->has('account_number'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('account_number') }}</strong>
                                    	    </span>
                                	    @endif
                                	    </div>
                                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="account_number_confirm" class="col-lg-4 col-form-label text-success">Confirm Number :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+88</div>
                                            </div>
                                            <input  type="text" name="account_number_confirmation" id="account_number_confirm" value="{{ old('account_number_confirmation') }}" class="form-control{{ $errors->has('account_number_confirmation') ? ' is-invalid' : '' }}" required>
										@if ($errors->has('account_number_confirmation'))
                                    	    <span class="invalid-feedback" role="alert">
                                        		<strong>{{ $errors->first('account_number_confirmation') }}</strong>
                                    	    </span>
                                		@endif
										</div>
										

                                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>
			            <div class="form-group row {{ $account->name == 'bKash'?  ' ' : $account->name == 'Rocket' ? ' ' : "d-none" }}">
                            <label for="agent_type" class="col-lg-4 col-form-label">{{ $account->name }} type :</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <select name="agent_type" id="agent_type" class="form-control{{ $errors->has('agent_type') ? ' is-invalid' : '' }}" >
                                                <option selected value=''>Select account type</option>
                                                <option value='Personal'>Personal</option>
                                                <option value='Agent'>Agent (added extra charge 2% of send amount)</option>
                                        </select>
					                    @if ($errors->has('agent_type'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('agent_type') }}</strong>
                                    	    </span>
                                	@endif
                             
				                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>

                        <p><strong>Receiver's Informations (Bangladesh) </strong></p>
                        <div class="form-group row">
                            <label for="first_name" class="col-lg-4 col-form-label">First Name</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" name="first_name" id="first_name" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"  value="{{ old('first_name') }}" required>
					                    @if ($errors->has('first_name'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('first_name') }}</strong>
                                    	    </span>
                                	    @endif

                                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="last_name" class="col-lg-4 col-form-label">Last Name</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" name="last_name" id="last_name" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"  value="{{ old('last_name') }}" required>
					                @if ($errors->has('last_name'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('last_name') }}</strong>
                                    	    </span>
                                	@endif

                                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-lg-4 col-form-label">City / Town</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <input type="text" name="city" id="city" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" value="{{ old('city') }}" required>
					                    @if ($errors->has('city'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('city') }}</strong>
                                    	    </span>
                                	    @endif

                                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-lg-4 col-form-label">Mobile Phone</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+88</div>
                                            </div>
                                            <input type="text" name="phone" id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" value="{{ old('phone') }}" required>

					                   @if ($errors->has('phone'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('phone') }}</strong>
                                    	    </span>
                                	    @endif
					                    </div>
                                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-lg-4 col-form-label">E-mail</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <input type="email" name="email" id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" required>
					                    @if ($errors->has('email'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('email') }}</strong>
                                    	    </span>
                                	    @endif

                                    </div>

                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reason" class="col-lg-4 col-form-label">Sending Reason</label>
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="col-11">
                                        <select name="reason_id" id="reason_id" class="form-control{{ $errors->has('reason_id') ? ' is-invalid' : '' }}" required>
                                            <option value="" selected disabled>Chose a Perfect Reason</option>
                                            @foreach($reasons as $reason)
                                                <option value="{{ $reason->id }}">{{ $reason->reason }}</option>
                                            @endforeach
                                        </select>
					@if ($errors->has('reason_id'))
                                    	    <span class="invalid-feedback" role="alert">
                                        	<strong>{{ $errors->first('reason_id') }}</strong>
                                    	    </span>
                                	@endif

                                    </div>
                                    <div class="col-1 text-danger">*</div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <i style="color: red;font-size:13px">
                                <b>[N.B</b> Please make sure your account and phone number is correct.For any kind of miss information Epeakup will not take any responsibilities.]
                            </i>

                            <p>
                               <input checked type="checkbox" name="terms_privacy" id="terms_privacy" class="form-check-input {{ $errors->has('terms_privacy') ? ' is-invalid' : '' }}"> I have read and agree to the <a class="text-capitalize" style="font-size: 16px;" href="{{route('tandc')}}">Terms & Privacy</a> of Epeakup.com.
                               @if ($errors->has('terms_privacy'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('terms_privacy') }}</strong>
                                    </span>
                               @endif
                            </p>
                        </div>


                        <div class="row">
                            <div class="col-lg-7 offset-lg-4">
                                <div class="row justify-content-center">
                                    <div class="col-11">
                                        <div class="row justify-content-between">
                                            <a href="{{ route('getStart') }}" class="btn btn-dark btn-lg">Back</a>
                                            <button type="submit" class="btn btn-primary btn-lg">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                {{-- Order information show --}}
                @include('frontEnd.inc.orderShow')
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
    
    	$('#account_number').bind("cut copy paste",function(e) {
           e.preventDefault();
          });
    
    </script>
    
@endpush