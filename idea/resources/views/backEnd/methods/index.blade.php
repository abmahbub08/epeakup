@extends('backEnd.master')
@section('title','Methods')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Methods
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Methods</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">Methods</h3>
                        <a href="{{ route('methods.create') }}" class="btn btn-info pull-right">Add Method</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Method Name</th>
                                    <th>Service for Method</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($methods as $method)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $method->name }}</td>
                                        <td>{{ $method->service->name }}</td>
                                        <td>{{ $method->service->country->name }}</td>
                                        <td>
                                            <a href="{{ route('methods.edit',$method->id) }}" class="btn btn-info btn-flat">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('methods.destroy',$method->id) }}" onclick="event.preventDefault();confirm('Are you sure to delete?')?document.getElementById('deleteMethod{{$method->id}}').submit():''" class="btn btn-danger btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteMethod{{$method->id}}" action="{{ route('methods.destroy',$method->id) }}" method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No Method Yet
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