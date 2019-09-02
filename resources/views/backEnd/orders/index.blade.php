@extends('backEnd.master')

@section('title', 'Payments Order')

@push('styles')

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

@endpush

@section('body')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Orders

            </h1>

            <ol class="breadcrumb">

                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li class="active">Orders</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <div class="row">

                <div class="col-md-3 col-sm-6 col-xs-12">

                    <div class="info-box">

                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>



                        <div class="info-box-content">

                            <span class="info-box-text">Total Transaction</span>

                            <span class="info-box-number">
                                @if($totalOrders>0)
                                    {{ $totalOrders }}
                                @else
                                    0
                                @endif
                            </span>
                            <div class="progress"></div>
                            <div class="progress-bar"></div>
                            <span class="progress-description">
                                Complete:
                                @if($completeOrders>0)
                                    {{ $completeOrders }}
                                @else
                                0
                                @endif
                            </span>


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

                            <span class="info-box-number">
                                @if($orders->count()>0)
                                    {{ $orders->count() }}
                                @else
                                    0
                                @endif

                            </span>
                            <div class="progress"></div>
                            <div class="progress-bar"></div>
                            <span class="progress-description">
                                Amount: BDT TK{{ $orders->sum('recipient_amount')}}
                            </span>

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

                            <span class="info-box-number">
                                @if($users>0)
                                    {{ $users }}
                                @else
                                    0
                                @endif
                            </span>

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

                            <span class="info-box-number">
                                @if($issues>0)
                                    {{ $issues }}
                                @else
                                    0
                                @endif
                            </span>
                            <div class="progress"></div>
                            <div class="progress-bar"></div>
                            <span class="progress-description">
                                Complete:
                                @if($completedIssue>0)
                                    {{ $completedIssue }}
                                @else
                                    0
                                @endif
                            </span>

                        </div>

                        <!-- /.info-box-content -->

                    </div>

                    <!-- /.info-box -->

                </div>

                <!-- /.col -->

            </div>

            <div class="row">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title text-center">All Payment Request</h3>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table no-margin" id="orderTable">

                                <thead>

                                <tr>

                                    <th>Order ID</th>

                                    <th>Sender</th>

                                    <th>Recipent</th>

                                    <th>Services</th>

                                    <th>Methods</th>

                                    <th>Amount(BDT)</th>

                                    <th>Acount Number</th>

                                    <th>Status</th>

				                    <th>Date</th>

				                    <th>Time</th>

                                    <th>Confirmation</th>

                                </tr>

                                </thead>

                                <tbody>

                                @forelse($orders as $order)

                                    <tr>

                                        <td><a href="">{{ $order->orderId }}</a></td>

                                        <td>{{ $order->user->firstName }}</td>

                                        <td>{{ $order->recipient->first_name }}</td>

                                        <td>{{ $order->payment_network->service->name }}</td>

                                        <td>

                                            <div class="sparkbar" data-color="#00a65a" data-height="20">

                                                {{ $order->payment_network->name }}

                                            </div>

                                        </td>

                                        <td>TK {{ $order->recipient_amount }}</td>

                                        <td>{{ $order->recipient->account_number }}</td>

                                        <td>

                                            @if($order->status_id==1)

                                                <span class="label label-warning">

                                                    processing

                                                </span>

                                            @endif

                                        </td>

                                        <td style='white-space:nowrap;'>{{ $order->created_at->toDateString() }}</td>

					                    <td style='white-space:nowrap;'>{{ $order->created_at->format('h:i:s A') }}</td>

                                        <td>

                                            <button type="button" title="View Information" href="#" data-target="#modalView{{ $order->id }}"

                                                    class="btn btn-info btn-flat" data-toggle="modal">

                                                <i class="fa fa-eye"></i>

                                            </button>

                                            <div class="modal fade" id="modalView{{ $order->id }}"

                                                 style="display: none;">

                                                <div class="modal-dialog">

                                                    <div class="modal-content">

                                                        <div class="modal-header">

                                                            <button type="button" class="close" data-dismiss="modal"

                                                                    aria-label="Close">

                                                                <span aria-hidden="true">×</span></button>

                                                            <h4 class="modal-title text-center">

                                                                Order informations

                                                            </h4>

                                                        </div>

<div class="modal-body">


	       	<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-4">
					Payment Method:
					</div>
					<div class="col-md-8">
					<h4 style="margin: 0">
				<span class="bg-success" style="padding-left: 10px;padding-right: 10px;">
					{{ $order->payment_network->name }}
				</span>
					</h4>
					</div>
			</div>

			<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-4">
					Recipient Account:
					</div>
					<div class="col-md-8">
					<h4 style="margin: 0">
					<span class="bg-success" style="padding-left: 10px;padding-right: 10px;">
					{{ $order->recipient->account_number }}
					</span>
					</h4>
					</div>
			</div>

			<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-4">
					Received Amount:
					</div>
					<div class="col-md-8">
					<h4 style="margin: 0">
					<span class="bg-success"
					  style="padding-left: 10px;padding-right: 10px;">
					Tk. {{ $order->recipient_amount }}
					</span>
					</h4>
					</div>
			</div>

		    <div class="row" style="margin-bottom: 10px;{{ $order->agent_type == '' ? 'display: none' : '' }}">
					<div class="col-md-4">
					Recipient Account Type:
					</div>
					<div class="col-md-8">
					<h4 style="margin: 0">
					<span class="bg-success" style="padding-left: 10px;padding-right: 10px;">
					{{ $order->agent_type }}
					</span>
					</h4>
					</div>
			</div>

			<hr>

			<div class="row" style="margin-bottom: 10px;">

					<div class="col-md-4">
					Recipient Name:
					</div>
					<div class="col-md-8">
					<h4 style="margin: 0">
					{{ $order->recipient->first_name }} {{ $order->recipient->last_name }}
					</h4>
					</div>
			</div>


    		<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-4">
					Recipient Phone:
					</div>
					<div class="col-md-8">

					<h4 style="margin: 0">
					{{ $order->recipient->phone }}
					</h4>
					</div>
			</div>

			<div class="row" style="margin-bottom: 10px;">
					<div class="col-md-4">
					Recipient Email:
					</div>
					<div class="col-md-8">
					<h4 style="margin: 0">
					   {{ $order->recipient->email }}
					</h4>
					</div>
			</div>



              <hr>

			<div class="row" style="margin-bottom: 10px;">
				<div class="col-md-4">
				   Sender Name:
				</div>
				<div class="col-md-8">
					<h4 style="margin: 0">
					{{ $order->user->firstName }} {{ $order->user->lastName }}
					</h4>
				</div>
			</div>



</div>

                                                        <div class="modal-footer">

                                                            <button type="button"

                                                                    class="btn btn-default pull-left btn-flat"

                                                                    data-dismiss="modal">Close

                                                            </button>

                                                            <a href="{{ route('update.status',['id'=>$order->id]) }}" class="btn btn-success btn-flat" >Done</a>

                                                        </div>

                                                    </div>

                                                    <!-- /.modal-content -->

                                                </div>

                                                <!-- /.modal-dialog -->

                                            </div>



                                            <a href="{{ route('message.send',['id'=>$order->id]) }}"

                                               class="btn btn-success btn-flat">

                                                <i class=" fa fa-envelope"></i>

                                            </a>

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
            $('#orderTable').DataTable({
                "pageLength": 50,
                'order': [[8,'desc']],
                stateSave: true,
            });
		} );
	</script>
@endpush