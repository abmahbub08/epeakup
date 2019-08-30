@extends('agent.layouts.app')

@section('title', 'Transactions')

@push('styles')
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transactions</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Transactions</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <h2>Transactions</h2>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table text-center" id="dataTable">
                                <thead>
                                <tr>
                                    <th>NO/SL</th>
                                    <th>Receiver Name</th>
                                    <th>Account Number</th>
                                    <th>Sender Name</th>
                                    <th>Sender Phone</th>
                                    <th>Sender Email</th>
                                    <th>Sender Address</th>
                                    <th>Status</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $transaction->receiver->name() }}</td>
                                        <td>{{ $transaction->receiver->account_number }}</td>
                                        <td>{{ $transaction->client->name() }}</td>
                                        <td>{{ $transaction->client->phone }}</td>
                                        <td>{{ $transaction->client->email }}</td>
                                        <td>{{ $transaction->client->address()}}</td>
                                        <td>
                                            @if($transaction->status)
                                                <small class="bg-success py-1 px-2">Success</small>
                                                @else
                                                <small class="py-1 px-2 bg-warning rounded">Pending</small>
                                            @endif
                                        </td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">
                                            No Data found!
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable({
                stateSave: true
            });
        } );
    </script>
@endpush