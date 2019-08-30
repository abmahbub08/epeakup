@extends('backEnd.master')
@section('title','Countries')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Countries
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Countries</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">Countries</h3>
                        <a href="{{ route('countries.create') }}" class="btn btn-info pull-right">Add Country</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($countries as $country)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>
                                            <a href="{{ route('countries.edit',$country->id) }}" class="btn btn-info btn-flat">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('countries.destroy',$country->id) }}" onclick="event.preventDefault();confirm('Are you sure to delete?')?document.getElementById('deleteCountry{{$country->id}}').submit():''" class="btn btn-danger btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteCountry{{$country->id}}" action="{{ route('countries.destroy',$country->id) }}" method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            No Country Yet
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