@extends('backEnd.master')

@section('title', 'Add new Method')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add New Method
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Method add</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title text-center">Method add</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-body">
                                <form method="POST" action="{{ route('methods.store') }}">
                                    @csrf
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Method Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus="" placeholder="Method Name">
                                        @if ($errors->has('name'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('service_id') ? 'has-error' : '' }}">
                                        <label for="service_id">Service for this Method</label>
                                        <select name="service_id" id="service_id" class="form-control" required>
                                            @foreach($services as $service)
                                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('service_id'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('service_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">
                                            Add Method
                                        </button>

                                        <a href="{{ route('methods.index') }}" class="btn btn-info btn-flat float-right">
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