@extends('backEnd.master')

@section('title', 'Add new Offers')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Make Discount
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Make Discount</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title text-center">Make discount offer for a service</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-body">
                                <form method="POST" action="{{ route('discounts.store') }}">
                                    @csrf
                                    <div class="form-group {{ $errors->has('payment_method') ? 'has-error' : '' }}">
                                        <label for="payment_method">Payment Method </label>
                                        <input id="payment_method" type="text" class="form-control" name="payment_method" value="{{ old('payment_method') }}"  autofocus="" placeholder="E.g. Poli">
                                        @if ($errors->has('payment_method'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('payment_method') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
                                        <label for="discount">Discount (%) For This Method </label>
                                        <input id="discount" type="text" class="form-control" name="discount" value="{{ old('discount') }}" placeholder="E.g. 20">
                                        @if ($errors->has('discount'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('discount') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">
                                            Save
                                        </button>

                                        <a href="{{ route('discounts.index') }}" class="btn btn-danger btn-flat float-right">
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