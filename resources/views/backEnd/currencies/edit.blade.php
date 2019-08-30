@extends('backEnd.master')

@section('title', 'Currency update')

@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Update Currency
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Update Currency</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            Update: <h3 class="box-title text-center">{{ $currency->currency }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-body">
                                <form method="POST" action="{{ route('currencies.update',$currency->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
                                        <label for="currency">Currency Name</label>
                                        <input id="currency" type="text" class="form-control" name="currency" value="{{ old('currency')? old('currency') : $currency->currency }}" required autofocus="" placeholder="Currency Name">
                                        @if ($errors->has('currency'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('currency') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('short_name') ? 'has-error' : '' }}">
                                        <label for="charge">Currency Short Name</label>
                                        <input id="charge" type="text" class="form-control" name="short_name" value="{{ old('short_name')? old('short_name') : $currency->short_name }}" required placeholder="e.g 035.5">
                                        @if ($errors->has('short_name'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('short_name') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('rate') ? 'has-error' : '' }}">
                                        <label for="rate">Exchange Rate</label>
                                        <input id="rate" type="text" class="form-control"  name="rate" value="{{ old('rate') ? old('rate') : $currency->rate }}" required placeholder="e.g 4.00">
                                        @if ($errors->has('rate'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('rate') }}</strong>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : '' }}">
                                        <label for="country_id">Country for this Currency</label>
                                        <select name="country_id" id="country_id" class="form-control" required>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}"
                                                @if($currency->country->id == $country->id)
                                                    selected
                                                        @endif
                                                >{{ $country->name }}</option>
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
                                            Update Currency
                                        </button>

                                        <a href="{{ route('currencies.index') }}" class="btn btn-info btn-flat float-right">
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