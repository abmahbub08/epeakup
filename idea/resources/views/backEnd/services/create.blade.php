@extends('backEnd.master')

@section('title', 'Add new Service')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Add new service
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Service add</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title text-center">Service add</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-body">
                                <form method="POST" action="{{ route('services.store') }}">
                                    @csrf
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">Service Name</label>
                                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus="" placeholder="Service Name">
                                        @if ($errors->has('name'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('service_charge') ? 'has-error' : '' }}">
                                        <label for="charge">Service Charge</label>
                                        <input id="charge" type="text" class="form-control"  name="service_charge" value="{{ old('service_charge') }}" required placeholder="e.g 035.5">
                                        @if ($errors->has('service_charge'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('service_charge') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                        <label for="country_id">Country for this Service</label>
                                        <select name="country_id" id="country_id" class="form-control" required>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('country_id'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('country_id') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">
                                            Add Service
                                        </button>

                                        <a href="{{ route('services.index') }}" class="btn btn-info btn-flat float-right">
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