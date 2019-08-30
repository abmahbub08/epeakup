@extends('backEnd.master')

@section('title', 'Edit Admin information')

@push('styles')
    <link rel="stylesheet" href="{{ asset('/') }}backEnd/plugins/iCheck/all.css">
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
                        <div class="box-header">
                            <h3 class="box-title" style="margin: 0;">
                                Edit details of {{$admin->name}}
                            </h3>
                        </div>
                        <div class="box-body">
                            @include('multiauth::message')
                            <form action="{{route('admin.update',[$admin->id])}}" method="post">
                                @csrf @method('patch')
                                <div class="form-group">
                                    <label for="role">Name</label>
                                    <input type="text" value="{{ $admin->name }}" name="name" class="form-control" id="role">
                                </div>

                                <div class="form-group">
                                    <label for="role">Email</label>
                                    <input type="text" value="{{ $admin->email }}" name="email" class="form-control" id="role">
                                </div>

                                <div class="form-group">
                                    <label for="role_id">Assign Role</label>

                                    <select name="role_id[]" id="role_id" class="select2 form-control {{ $errors->has('role_id') ? ' is-invalid' : '' }}" multiple>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}"
                                                    @if (in_array($role->id,$admin->roles->pluck('id')->toArray()))
                                                    selected
                                                    @endif >{{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('role_id'))
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('role_id') }}</strong>
                                </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="active">Active</label>
                                    <div>
                                        <input type="checkbox" value="1" {{ $admin->active ? 'checked':'' }} name="activation" class="minimal" id="active">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        Change
                                    </button>
                                    <a href="{{ route('admin.show') }}" class="btn btn-danger btn-sm float-right">Back</a>
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
    <script src="{{ asset('/') }}backEnd/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            //iCheck for checkbox and radio inputs
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass   : 'iradio_minimal-blue'
            });
        });

    </script>
@endpush
