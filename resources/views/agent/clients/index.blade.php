@extends('agent.layouts.app')

@section('title', 'Clients')

@push('styles')
    <link rel="stylesheet" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Clients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Clients</li>
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
                                    <h2>Clients</h2>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('clients.create') }}" class="btn btn-info">
                                        Add Client
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table text-center" id="dataTable">
                                <thead>
                                <tr>
                                    <th>NO/SL</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>NID</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($clients as $client)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            {{ $client->name() }}
                                        </td>
                                        <td>{{ $client->phone }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->address() }}</td>
                                        <td>
                                            <img src="{{ asset('boomboom/nid/'.$client->nid) }}" alt="{{ $client->name() }}" class="rounded" style="width: 80px;">
                                        </td>
                                        <td style="white-space: nowrap;">
                                            <div class="btn-group rounded-pill overflow-hidden">
                                                <a href="{{route('clients.edit',$client->id)}}"
                                                   class="btn btn-primary pl-4 pr-3">
                                                    <i class="fas fa-edit"></i>
                                                </a>

                                                <!-- Button trigger modal -->
                                                <button title="View" type="button" class="btn btn-info px-3" data-toggle="modal"
                                                   data-target="#modal-default{{ $client->id }}">
                                                    <i class="fas fa-eye"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="modal-default{{ $client->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">{{ $client->name().'\'s Information' }}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body overflow-hidden text-wrap text-left">

                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        Name:
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $client->name() }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        Phone Number:
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $client->phone }}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        Email:
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $client->email }}
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        Address:
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        {{ $client->address() }}
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->

                                                <a href="{{ route('clients.destroy',$client->id) }}"
                                                   onclick="event.preventDefault(); confirm('Are you sure to delete this recipient?')?document.getElementById('delete{{$client->id}}').submit():''"
                                                   class="btn btn-danger text-center pr-4 pl-3">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                            <form id="delete{{$client->id}}"
                                                  action="{{ route('clients.destroy',$client->id) }}"
                                                  method="POST" class="d-none">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
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
        $(document).ready(function () {
            $('#dataTable').DataTable({
                stateSave: true
            });
        });
    </script>
@endpush