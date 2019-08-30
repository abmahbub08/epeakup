@extends('backEnd.master')

@section('title', 'Create New Admin')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/') }}backEnd/bower_components/select2/dist/css/select2.min.css">
@endpush

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Register New {{ ucfirst(config('multiauth.prefix')) }}
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{  route('admin.home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">create admin</li>
            </ol>
        </section>
        <section class="content">
            <div class="box">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="box-body">
                            @include('multiauth::message')
                            <form method="POST" action="{{ route('admin.register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="text-right">Name</label>
                                    <input id="name" type="text"
                                           class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name"
                                           value="{{ old('name') }}"
                                           required autofocus>
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="text-right">E-Mail Address</label>
                                    <input id="email" type="email"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                           value="{{ old('email') }}"
                                           required>

                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' text-danger' : '' }}">
                                    <label for="password" class="text-right">Password</label>
                                    <input id="password" type="password"
                                           class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           name="password"
                                           required>

                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="text-right">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" required>

                                </div>

                                <div class="form-group">
                                    <label for="role_id" class="text-right">Assign Role</label>
                                    <select name="role_id[]" id="role_id"
                                            class="select2 form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}"
                                            multiple="multiple" data-placeholder="Select a Role">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        Register
                                    </button>

                                    <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">
                                        Back
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>

@endsection

@push('scripts')
    <script src="{{ asset('/') }}backEnd/bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush