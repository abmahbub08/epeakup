@extends('agent.layouts.app')

@section('title', 'Transactions')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Balance Transfer</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Balance Transfer</li>
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
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-header">
                            <h2>Send Money</h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('agent.transfer.balance') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sender_name">Sender Name *</label>
                                            <select name="sender_name" id="sender_name" class="form-control {{ $errors->has('sender_name')?' is-invalid':'' }}" required>
                                                <option value="">Select Name</option>
                                                @foreach($clients as $client)
                                                    <option value="{{$client->id}}">{{ $client->name() }}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('sender_name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('sender_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="receiver_name">Receiver Name *</label>
                                            <select name="receiver_name" id="receiver_name" class="form-control {{ $errors->has('receiver_name')?' is-invalid':'' }}" required>

                                            </select>
                                            @if($errors->has('receiver_name'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('receiver_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="amount">Send Amount *</label>
                                            <input name="amount" id="amount" type="text" class="form-control{{ $errors->has('amount')? ' is-invalid':'' }}" placeholder="Ex. 200" required>
                                            @if($errors->has('amount'))
                                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('amount') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-4">
                                        <button class="btn btn-primary btn-block btn-flat">Send</button>
                                    </div>
                                </div>
{{--                                {{$clients->find(3)->receivers}}--}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#sender_name').change(function () {
                var id = $(this).find('option:selected').val();
                var receiver = $('#receiver_name');
                $.get('/agent/get-receivers/' + id,function (data) {
                    receiver.find('option').remove();
                    receiver.append('<option value="" selected>Select Receiver Name</option>');
                    $.each(data, function (index,value) {
                        $('<option>').val(value.id ).text(value.first_name+' '+value.last_name).appendTo(receiver);
                    })
                });

            });
        });
    </script>
@endpush