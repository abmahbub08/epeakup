@extends('backEnd.master')

@section('title', 'Agent Complete Orders')

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

@endpush

@section('body')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Agent Complete Money Orders

            </h1>

            <ol class="breadcrumb">

                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li class="active">Complete Orders</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <div class="row">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title text-center">Agent Money Orders</h3>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table no-margin" id="agent_recipientOrderTable">

                                <thead>

                                <tr>

                                    <th>SL/NO</th>

                                    <th>Receiver Name</th>

                                    <th>Account Number</th>

                                    <th>Amount(BDT)</th>

                                    <th>Payment Method</th>

                                    <th>Account Type</th>

                                    <th>Sender Name</th>

                                    <th>Sender Phone</th>

                                    <th>Status</th>

                                    <th>Date</th>

                                </tr>

                                </thead>

                                <tbody>

                                @forelse($orders as $order)

                                    <tr>

                                        <td>{{ $loop->index+1 }}</td>

                                        <td>{{ $order->receiver->name() }}</td>

                                        <td>{{ $order->receiver->account_number }}</td>

                                        <td>{{ $order->amount }}</td>

                                        <td>{{ $order->receiver->payment_method }}</td>
                                        <td>{{ $order->receiver->account_type }}</td>
                                        <td>{{ $order->client->name() }}</td>
                                        <td>{{ $order->client->phone }}</td>

                                        <td>

                                            @if($order->status == 1)

                                                <span class="label label-success">

                                                    Success

                                                </span>
                                            @endif

                                        </td>

                                        <td style='white-space:nowrap;'>{{ $order->created_at->format('d/m/Y') }}</td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="10" class="text-center">

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
            $('#agent_recipientOrderTable').DataTable({
                "pageLength": 50,
                stateSave: true,
            });
        } );
    </script>
@endpush