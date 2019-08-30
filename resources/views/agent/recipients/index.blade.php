@extends('agent.layouts.app')

@section('title', 'Recipients')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Recipients</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Recipients</li>
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
                                    <h2>Recipients</h2>
                                </div>
                                <div class="col-md-3 text-right">
                                    <a href="{{ route('recipients.create') }}" class="btn btn-info">
                                        Add Recipient
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table text-center">
                                <thead>
                                <tr>
                                    <th>NO/SL</th>
                                    <th>Name</th>
                                    <th>Account Number</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($recipients as $recipient)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        {{ $recipient->first_name.' '.$recipient->last_name }}
                                    </td>
                                    <td>{{ $recipient->account_number }}</td>
                                    <td>{{ $recipient->phone }}</td>
                                    <td>{{ $recipient->email }}</td>
                                    <td>{{ $recipient->address_one.' '.$recipient->city }}</td>
                                    <td style="white-space: nowrap;">
                                        <a href="{{route('recipients.edit',$recipient->id)}}" class="btn btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('recipients.destroy',$recipient->id) }}"
                                           onclick="event.preventDefault();
                                           confirm('Are you sure to delete this recipient?')?document.getElementById('delete{{$recipient->id}}').submit():''"
                                           class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <form id="delete{{$recipient->id}}" action="{{ route('recipients.destroy',$recipient->id) }}" method="POST" class="d-none" >
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">
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