@extends('backEnd.master')

@section('title', 'Agents')

@push('styles')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css">

@endpush

@section('body')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>

                Agents List

            </h1>

            <ol class="breadcrumb">

                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>

                <li class="active">Agents List</li>

            </ol>

        </section>

        <!-- Main content -->

        <section class="content">

            <div class="row">

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title text-center">Agents List</h3>

                    </div>

                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="table-responsive">

                            <table class="table no-margin" id="agent_recipientOrderTable">

                                <thead>

                                <tr>

                                    <th>SL/NO</th>

                                    <th>Name</th>

                                    <th>Number</th>

                                    <th>Email</th>

                                    <th>Address</th>

                                    <th>Status</th>

                                    <th>Date</th>

                                    <th>Action</th>

                                </tr>

                                </thead>

                                <tbody>

                                @forelse($agents as $agent)

                                    <tr>

                                        <td>{{ $loop->index+1 }}</td>

                                        <td>{{ $agent->fullName() }}</td>

                                        <td>{{ $agent->phone }}</td>

                                        <td>{{ $agent->email }}</td>

                                        <td>{{ $agent->fullAddress() }}</td>


                                        <td>

                                            @if($agent->active == 0)

                                                <span class="label label-warning">

                                                    Not Active

                                                </span>
                                            @else
                                                <span class="label label-success">

                                                    Active

                                                </span>

                                            @endif

                                        </td>

                                        <td style='white-space:nowrap;'>{{ $agent->created_at->format('d/m/Y') }}</td>

                                        <td>
                                            <!-- Agent Details show button -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#myModal_{{$agent->id}}">
                                                <i class="fa fa-eye"></i>
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal_{{$agent->id}}" tabindex="-1"
                                                 role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title"
                                                                id="myModalLabel">{{ $agent->fullName().'\'s Details' }}</h4>
                                                        </div>
                                                        <div class="modal-body text-left">
                                                            <div>
                                                                <img src="{{ asset('boomboom/avatar/'.$agent->avatar) }}"
                                                                     alt="{{ $agent->fullName() }}"
                                                                     style="width: 120px;height: 120px;">
                                                            </div>
                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Name :
                                                                </div>
                                                                <div class="col-md-8">
                                                                    {{ $agent->fullName() }}
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Phone Number :
                                                                </div>
                                                                <div class="col-md-8">
                                                                    {{ $agent->phone }}
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Email Address :
                                                                </div>
                                                                <div class="col-md-8">
                                                                    {{ $agent->email }}
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Gender :
                                                                </div>
                                                                <div class="col-md-8">
                                                                    {{ $agent->gender }}
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Date of Birth :
                                                                </div>
                                                                <div class="col-md-8">
                                                                    {{ $agent->date_of_birth }}
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Address :
                                                                </div>
                                                                <div class="col-md-8">
                                                                    {{ $agent->fullAddress() }}
                                                                </div>
                                                            </div>

                                                            <div class="row" style="margin-bottom: 10px;">
                                                                <div class="col-md-4">
                                                                    Account Status :
                                                                </div>
                                                                <div class="col-md-8">
                                                                    @if($agent->active)
                                                                        <span class="label label-success">

                                                                            Active

                                                                        </span>
                                                                    @else
                                                                        <span class="label label-warning">

                                                                            Not Active

                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default"
                                                                    data-dismiss="modal">Close
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.Agent Details show button -->
                                            <!-- Agent Approved button -->
                                            <a href="{{ route('agents.approved', $agent->id) }}" class="btn btn-success"
                                               title="Approved" onclick="event.preventDefault();
                                                    confirm('Are you sure to approve this Agent?')?document.getElementById('approved{{$agent->id}}').submit():''">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <form id="approved{{$agent->id}}"
                                                  action="{{ route('agents.approved',$agent->id) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('PUT')
                                            </form>
                                            <!-- /.Agent Approved button -->
                                            <!-- Agent Delete button -->
                                            <a href="{{ route('agents.destroy', $agent->id) }}" class="btn btn-danger"
                                               title="Delete" onclick="event.preventDefault();
                                                    confirm('Are you sure to delete this Agent?')?document.getElementById('delete{{$agent->id}}').submit():''">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="delete{{$agent->id}}"
                                                  action="{{ route('agents.destroy',$agent->id) }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <!-- /.Agent Delete button -->

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
        $(document).ready(function () {
            $('#agent_recipientOrderTable').DataTable({
                "pageLength": 50,
                stateSave: true,
            });
        });
    </script>
@endpush