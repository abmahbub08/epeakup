@extends('agent.layouts.app')

@section('title', 'Agent ' .$profile->first_name. '\'s Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{$profile->first_name.' '.$profile->last_name}}'s Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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

                <div class="col-md-8">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header text-white" style="background: url('{{ asset('boomboom') }}/dist/img/photo1.png') center center;">
                            <h3 class="widget-user-username">
                                {{ $profile->first_name.' '.$profile->last_name }}
                            </h3>
                            <h5 class="widget-user-desc">Agent</h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" style="width: 90px;height: 90px;" src="{{ asset('boomboom/avatar/'.$profile->avatar) }}" alt="User Avatar" >
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">3,200</h5>
                                        <span class="description-text">Balance</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 border-right">
                                    <div class="description-block">
                                        <h5 class="description-header">13,000</h5>
                                        <span class="description-text">Complete Transaction</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4">
                                    <div class="description-block">
                                        <h5 class="description-header">35</h5>
                                        <span class="description-text">Recipients</span>
                                    </div>
                                    <!-- /.description-block -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-footer p-4">
                            
                            <p class="m-0 text-right">
                                <a href="{{ route('agent.profile.edit') }}" title="Edit your information ">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </p>
                            
                            <div class="row mb-2">
                                <div class="col-md-6">Name :</div>
                                <div class="col-md-6">{{ $profile->first_name.' '.$profile->last_name }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">Phone :</div>
                                <div class="col-md-6">{{ $profile->phone }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">Email :</div>
                                <div class="col-md-6">{{ $profile->email }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">Address :</div>
                                <div class="col-md-6">{{ $profile->address }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">Date of Birth :</div>
                                <div class="col-md-6">{{ $profile->date_of_birth }}</div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-6">Gender :</div>
                                <div class="col-md-6">{{ $profile->gender }}</div>
                            </div>

                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
        </div>
    </div>
@endsection
