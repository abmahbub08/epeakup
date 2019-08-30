@extends('backEnd.master')

@section('title', 'Edit Rule')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Role: <strong>{{ $role->name }}</strong>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{  route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Edit Role</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="box-body margin">
                            <form action="{{ route('admin.role.update', $role->id) }}" method="post">
                                @csrf @method('patch')
                                <div class="form-group">
                                    <label for="role">Role Name</label>
                                    <input type="text" value="{{ $role->name }}" name="name" class="form-control"
                                           id="role">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm">Change</button>
                                <a href="{{ route('admin.roles') }}" class="btn btn-danger btn-sm float-right">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

@endsection