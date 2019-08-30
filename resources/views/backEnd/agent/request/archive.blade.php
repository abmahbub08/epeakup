@extends('backEnd.master')

@section('title', 'Complete Money Request')

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

@endpush

@section('body')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Complete Money Request

            </h1>

            <ol class="breadcrumb">

                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li class="active">Complete Money Request</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <div class="row">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title text-center">Complete Money Request</h3>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table no-margin" id="agentOrderTable">

                                <thead>

                                <tr>

                                    <th>SL/NO</th>

                                    <th>Name</th>

                                    <th>Phone</th>

                                    <th>Email</th>

                                    <th>Address</th>

                                    <th>Amount</th>

                                    <th>Status</th>

                                    <th>Date</th>

                                </tr>

                                </thead>

                                <tbody>

                                @forelse($datas as $data)

                                    <tr>

                                        <td>{{ $loop->index+1 }}</td>

                                        <td>{{ $data->agent->fullName() }}</td>

                                        <td>{{ $data->agent->phone }}</td>
                                        <td>{{ $data->agent->email }}</td>
                                        <td>{{ $data->agent->fullAddress() }}</td>

                                        <td>{{ $data->amount }}</td>
                                        <td>

                                            @if($data->status == 1)

                                                <span class="label label-success">

                                                    Success

                                                </span>

                                            @endif

                                        </td>

                                        <td style='white-space:nowrap;'>{{ $data->created_at->toDateString() }}</td>

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
            $('#agentOrderTable').DataTable({
                "pageLength": 50,
                stateSave: true,
            });
        } );
    </script>
@endpush