@extends('backEnd.master')

@section('title', 'Country update')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Update Country
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Update Country</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            Update: <h3 class="box-title text-center">{{ $country->name }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-body">
                                <form method="POST" action="{{ route('countries.update',$country->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Country Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name')? old('name'): $country->name }}" required autofocus="" placeholder="Country Name">
                                        @if ($errors->has('name'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">
                                            Update
                                        </button>

                                        <a href="{{ route('countries.index') }}" class="btn btn-danger btn-flat float-right">
                                            Back
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>


@endsection