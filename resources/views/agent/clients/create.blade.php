@extends('agent.layouts.app')

@section('title', 'Add Client ')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Add Client</li>
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
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <h2>Add Client</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name *</label>
                                            <input name="first_name" id="first_name" type="text" class="form-control {{ $errors->has('first_name')?' is-invalid':'' }}" value="{{old('first_name')}}" placeholder="First Name" required>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name *</label>
                                            <input name="last_name" id="last_name" type="text" class="form-control {{ $errors->has('last_name')?' is-invalid':'' }}" value="{{old('last_name')}}" placeholder="Last Name" required>
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
                                        <label for="phone">Phone Number *</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+61</div>
                                            </div>
                                            <input name="phone" type="text" class="form-control {{ $errors->has('phone')?' is-invalid':'' }}" value="{{old('phone')}}" id="phone" placeholder="Phone Number">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email *</label>
                                            <input name="email" id="email" type="email" class="form-control {{ $errors->has('email')?' is-invalid':'' }}" value="{{old('email')}}" placeholder="Email" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="address">Address *</label>
                                            <input name="address" id="address" type="text" class="form-control {{ $errors->has('address')?' is-invalid':'' }}" value="{{old('address')}}" placeholder="Address" required>
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="state">State *</label>
                                            <input name="state" id="state" type="text" class="form-control {{ $errors->has('state')?' is-invalid':'' }}" value="{{old('state')}}" placeholder="State" required>
                                            @if ($errors->has('state'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('state') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <label>National ID Card</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="nid" type="file" class="custom-file-input {{ $errors->has('nid') ? ' is-invalid' : '' }}" id="nid" >
                                                <label class="custom-file-label" for="nid">National Identity Card's Photo</label>
                                                @if ($errors->has('nid'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('nid') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection