@extends('backEnd.master')

@section('title', 'Admin Details')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Admin Details
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{  route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Admin Details</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Payments</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pending Payments</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total user</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Issues</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h2 style="margin: 0;">Admin List
                        <span class="pull-right">
                            <a href="{{route('admin.register')}}"
                               class="btn btn-sm btn-success">New {{ ucfirst(config('multiauth.prefix')) }}</a>
                        </span>
                    </h2>

                </div>
                <div class="box-body">
                    @include('multiauth::message')
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL/No</th>
                            <th>Admin Name</th>
                            <th>Admin Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($admins as $admin)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $admin->name }}</td>
                                <td>
                                    @foreach ($admin->roles as $role)
                                        <span class="badge-warning badge-pill ml-2">
                                        {{ $role->name }}
                                    </span>
                                    @endforeach
                                </td>
                                <td>
                                    {{ $admin->active? 'Active' : 'Inactive' }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $admin->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $admin->id }}"
                                          action="{{ route('admin.delete',[$admin->id]) }}" method="POST"
                                          style="display: none;">
                                        @csrf @method('delete')
                                    </form>

                                    <a href="{{route('admin.edit',[$admin->id])}}" class="btn btn-sm btn-primary mr-3">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p>No {{ config('multiauth.prefix') }} created Yet, only
                                        super {{ config('multiauth.prefix') }} is available.</p>
                                </td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->

                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection


