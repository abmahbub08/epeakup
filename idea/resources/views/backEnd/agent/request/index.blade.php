@extends('backEnd.master')

@section('title', 'Agent Money Request')

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

@endpush

@section('body')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Agent Money Request

            </h1>

            <ol class="breadcrumb">

                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li class="active">Request</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <div class="row">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title text-center">Agent Money Request</h3>

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

                                    <th>Action</th>

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

                                            @if($data->status == 0)

                                                <span class="label label-warning">

                                                    processing

                                                </span>

                                            @endif

                                        </td>

                                        <td style='white-space:nowrap;'>{{ $data->created_at->toDateString() }}</td>
                                        <td>
                                            <a href="{{ route('agent.money.update', $data->id) }}" class="btn btn-primary" title="Approved">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="{{ route('agent.money.destroy',$data->id) }}"
                                               onclick="event.preventDefault();
                                                       confirm('Are you sure to delete this recipient?')?document.getElementById('delete{{$data->id}}').submit():''"
                                               class="btn btn-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                            <form id="delete{{$data->id}}" action="{{ route('agent.money.destroy',$data->id) }}" method="POST" style="display: none;">
                                                @csrf
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
            $('#agentOrderTable').DataTable({
                "pageLength": 50,
                stateSave: true,
            });
        } );
    </script>
@endpush