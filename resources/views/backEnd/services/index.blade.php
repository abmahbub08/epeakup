@extends('backEnd.master')
@section('title','Services')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Services
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Services</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">Services</h3>
                        <a href="{{ route('services.create') }}" class="btn btn-info pull-right">Add Service</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Name</th>
                                    <th>Charge</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($services as $service)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>${{ $service->service_charge }}</td>
                                        <td>{{ $service->country->name }}</td>
                                        <td>
                                            <a href="{{ route('services.edit',$service->id) }}" class="btn btn-info btn-flat">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('services.destroy',$service->id) }}" onclick="event.preventDefault();confirm('Are you sure to delete?')?document.getElementById('deleteService{{$service->id}}').submit():''" class="btn btn-danger btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteService{{$service->id}}" action="{{ route('services.destroy',$service->id) }}" method="POST" style="display: none;">
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