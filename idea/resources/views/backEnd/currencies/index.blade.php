@extends('backEnd.master')
@section('title','Currencies')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Currencies
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Currencies</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">Currencies</h3>
                        <a href="{{ route('currencies.create') }}" class="btn btn-info pull-right">Add Currency</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Exchange Rate</th>
                                    <th>Currency Full Name</th>
                                    <th>Short Name</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($currencies as $currency)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $currency->rate }}</td>
                                        <td>{{ $currency->currency }}</td>
                                        <td>{{ $currency->short_name }}</td>
                                        <td>{{ $currency->country->name }}</td>
                                        <td>
                                            <a href="{{ route('currencies.edit',$currency->id) }}" class="btn btn-info btn-flat">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('currencies.destroy',$currency->id) }}" onclick="event.preventDefault();confirm('Are you sure to delete?')?document.getElementById('deleteCurrency{{$currency->id}}').submit():''" class="btn btn-danger btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteCurrency{{$currency->id}}" action="{{ route('currencies.destroy',$currency->id) }}" method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No Service Yet
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
@endsection