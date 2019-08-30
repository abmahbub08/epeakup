@extends('backEnd.master')

@section('title', 'User issues')

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

@endpush

@section('body')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Issues

            </h1>

            <ol class="breadcrumb">

                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li class="active">Issues</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <div class="row">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title text-center">All issues</h3>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table no-margin" id="issuesTable">

                                <thead>

                                <tr>

                                    <th>SL/NO</th>

                                    <th>Full Name</th>

                                    <th>Email</th>

                                    <th>Subject</th>

                                    <th>Message</th>

                                    <th>Date</th>

                                    <th>Actions</th>

                                </tr>

                                </thead>

                                <tbody>

                                @forelse($issues as $issue)

                                    <tr>

                                        <td>{{ $loop->index+1 }}</td>

                                        <td>{{ $issue->name }}</td>

                                        <td>{{ $issue->email }}</td>

                                        <td>{{ $issue->subject }}</td>

                                        <td>{{ $issue->message }}</td>

                                        <td style='white-space:nowrap'>{{ $issue->created_at->toDateString() }}</td>

                                        <td>

                                            <button type="button" title="View Informaiton" href="#" data-target="#modalView{{ $issue->id }}"

                                                    class="btn btn-info btn-flat" data-toggle="modal">

                                                <i class="fa fa-eye"></i>

                                            </button>

                                            <div class="modal fade" id="modalView{{ $issue->id }}"

                                                 style="display: none;">

                                                <div class="modal-dialog">

                                                    <div class="modal-content">

                                                        <div class="modal-header">

                                                            <button type="button" class="close" data-dismiss="modal"

                                                                    aria-label="Close">

                                                                <span aria-hidden="true">×</span></button>

                                                            <h4 class="modal-title text-center">

                                                                Issue Details

                                                            </h4>

                                                        </div>

                                                        <div class="modal-body">


                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Full Name:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        <span class="bg-success" style="padding-left: 10px;padding-right: 10px;">
                                                                            {{ $issue->name }}
                                                                        </span>
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Email:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        <span class="bg-success" style="padding-left: 10px;padding-right: 10px;">
                                                                        {{ $issue->email }}
                                                                        </span>
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Subject:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        <span class="bg-success" style="padding-left: 10px;padding-right: 10px;">
                                                                         {{ $issue->subject }}
                                                                        </span>
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <hr>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Message:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $issue->message }}
                                                                    </h4>
                                                                </div>
                                                            </div>

                                                            <hr>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Date:
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <h4 style="margin: 0">
                                                                        {{ $issue->created_at->toDateString() }}
                                                                    </h4>
                                                                </div>
                                                            </div>



                                                        </div>

                                                        <div class="modal-footer">

                                                            <button type="button"

                                                                    class="btn btn-default pull-left btn-flat"

                                                                    data-dismiss="modal">Close

                                                            </button>

                                                            <a href="" class="btn btn-success btn-flat" >Done</a>

                                                        </div>

                                                    </div>

                                                    <!-- /.modal-content -->

                                                </div>

                                                <!-- /.modal-dialog -->

                                            </div>



{{--                                            <a href=""--}}

{{--                                               class="btn btn-success btn-flat">--}}

{{--                                                <i class=" fa fa-envelope"></i>--}}

{{--                                            </a>--}}

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="8" class="text-center">

                                            No Issues Yet

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
            $('#issuesTable').DataTable({
                'order': [[5,'desc']],
                "pageLength": 50,
                stateSave: true,
            });
        } );
    </script>
@endpush