@extends('backEnd.master')

@section('title', 'Users Information')

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

@endpush

@section('body')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Users

            </h1>

            <ol class="breadcrumb">

                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li class="active">Users</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <div class="row">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title text-center">Users Information</h3>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table no-margin" id="usersDetails">

                                <thead>

                                <tr>

                                    <th>SL/NO</th>

                                    <th>User Name</th>

                                    <th>Email</th>

                                    <th>Phone Number</th>

                                    <th>Gender</th>

                                    <th>Status</th>

                                    <th>Action</th>

                                </tr>

                                </thead>

                                <tbody>

                                @forelse($users as $user)

                                    <tr>

                                        <td>{{ $loop->index+1 }}</td>

                                        <td><a href="">{{ $user->firstName.' '.$user->lastName }}</a></td>

                                        <td>{{ $user->email }}</td>

                                        <td>{{ $user->phone }}</td>

                                        <td>{{ $user->gender }}</td>

                                        <td>

                                            @if($user->email_verified_at)

                                                <span class="label label-success">

                                                    Verified

                                                </span>

                                            @else

                                                <span class="label label-warning">

                                                    UnVerified

                                                </span>
                                            @endif

                                        </td>

                                        <td>


                                            <button type="button" title="View Information" href="#" data-target="#modalView{{ $user->id }}"

                                                    class="btn btn-info btn-flat" data-toggle="modal">

                                                <i class="fa fa-eye"></i>

                                            </button>

                                            <div class="modal fade" id="modalView{{ $user->id }}" style="display: none;">

                                                <div class="modal-dialog">

                                                    <div class="modal-content">

                                                        <div class="modal-header">

                                                            <button type="button" class="close" data-dismiss="modal"

                                                                    aria-label="Close">

                                                                <span aria-hidden="true">×</span></button>

                                                            <h4 class="modal-title text-center">

                                                                User Details

                                                            </h4>

                                                        </div>

                                                        <div class="modal-body">


                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Name:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $user->firstName .' '.$user->lastName }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Email:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $user->email }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Phone:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $user->phone }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Gender:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $user->gender }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Address:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $user->buildingName.', '.$user->street.', '.$user->city_id }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Postcode:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $user->postcode }}
                                                                    </h4>
                                                                </div>
                                                            </div>


                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Country:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $user->country->name }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button" class="btn btn-default pull-left btn-flat"

                                                                    data-dismiss="modal">Close

                                                            </button>
                                                        </div>

                                                    </div>

                                                    <!-- /.modal-content -->

                                                </div>

                                                <!-- /.modal-dialog -->

                                            </div>


                                            <a href="{{ route('usersDetails.destroy',$user->id) }}"
                                               onclick="event.preventDefault();confirm('Are you sure to delete?')?document.getElementById('deleteUser{{$user->id}}').submit():''" class="btn btn-danger btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteUser{{$user->id}}" action="{{ route('usersDetails.destroy',$user->id) }}" method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="8" class="text-center">

                                            No orders Yet

                                        </td>

                                    </tr>

                                @endforelse

                                </tbody>

                            </table>

                        </div>

                        <!-- /.table-responsive -->

                    </div>

                    <!-- /.box-body -->

                </div>

                <!-- /.col -->

            </div>



            <!-- /.row -->

        </section>

        <!-- /.content -->

    </div>

@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#usersDetails').DataTable({
                "pageLength": 50,
                stateSave: true,
            });
        } );
    </script>
@endpush