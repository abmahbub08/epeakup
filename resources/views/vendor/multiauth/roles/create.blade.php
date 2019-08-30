@extends('backEnd.master')

@section('title', 'Create New Role')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Create New Role
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{  route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Create Role</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="box-body margin">
                            @include('multiauth::message')
                            <form action="{{ route('admin.role.store') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="role">Role Name</label>
                                    <input type="text" placeholder="Give an awesome name for role" name="name"
                                           class="form-control" id="role" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat">Store</button>
                                <a href="{{ route('admin.roles') }}"
                                   class="btn btn-flat btn-danger float-right">Back</a>
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