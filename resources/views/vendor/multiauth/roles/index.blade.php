@extends('backEnd.master')

@section('title', 'Admin Details')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Roles Details
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{  route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Role Details</li>
            </ol>
        </section>
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h2 style="margin: 0;">Role List
                        <span class="pull-right">
                            <a href="{{route('admin.role.create')}}"
                               class="btn btn-sm btn-success">New Role</a>
                        </span>
                    </h2>

                </div>
                <div class="box-body">
                    @include('multiauth::message')
                    <table class="table table-striped table-bordered text-center">
                        <thead>
                        <tr>
                            <th>SL/No</th>
                            <th>Role</th>
                            <th>Number of Admins</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    {{ $role->admins->count() }}
                                </td>

                                <td>
                                    @if($role->name !== 'super')
                                    <a href="#" class="btn btn-sm btn-danger"
                                       onclick="event.preventDefault(); document.getElementById('delete-form-{{ $role->id }}').submit();">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <form id="delete-form-{{ $role->id }}"
                                          action="{{ route('admin.role.delete',[$role->id]) }}" method="POST"
                                          style="display: none;">
                                        @csrf @method('delete')
                                    </form>

                                    <a href="{{route('admin.role.edit',[$role->id])}}" class="btn btn-sm btn-primary mr-3">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    @else
                                        No action
                                    @endif
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


