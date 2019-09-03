@extends('agent.layouts.app')

@section('title', 'Add Client ')
@section('styles')

@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Contact us</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Contact us</li>
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

                        <div class="card-body">
                            <form action="{{ route('contactUs') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="first_name">Name *</label>


                                            <input autocomplete="off" name="name" id="sender_name" oninput="" type="text" class="form-control  {{ $errors->has('name')?' is-invalid':'' }}" value="{{old('name')}}" placeholder="Name" required>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="first_name">Subject *</label>


                                            <input autocomplete="off" name="subject" id="" oninput="" type="text" class="form-control  {{ $errors->has('subject')?' is-invalid':'' }}" value="{{old('subject')}}" placeholder="Subject" required>

                                            @if ($errors->has('subject'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('subject') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">

                                            <label for="first_name">Message *</label>

                                            <textarea class="form-control" name="message" id="" cols="30" rows="10"></textarea>

                                            @if ($errors->has('message'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>




                                </div>


                                <div class="text-center">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

@endsection