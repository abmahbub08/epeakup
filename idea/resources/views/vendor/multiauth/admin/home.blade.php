@extends('backEnd.master')

@section('title', 'Dashboard')

@section('body')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion ion-ios-gear-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pending Orders</span>
                            <span class="info-box-number">{{ $pendingOrders->count() }}</span>

                            <div class="progress">
                                <div class="progress-bar" ></div>
                            </div>
                            <span class="progress-description">
                                Amount: AUD ${{ $pendingOrders->sum('amount') }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="ion ion-checkmark"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Success Order</span>
                            <span class="info-box-number">{{ $successOrders->count() }}</span>

                            <div class="progress">
                                <div class="progress-bar" ></div>
                            </div>
                            <span class="progress-description">
                                Amount: AUD ${{ $successOrders->sum('amount') }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="ion ion-arrow-swap"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Transaction</span>
                            <span class="info-box-number">{{ $successOrders->count() + $pendingOrders->count() }}</span>

                            <div class="progress">
                                <div class="progress-bar" ></div>
                            </div>
                            <span class="progress-description">
                                Amount: AUD ${{ $successOrders->sum('amount')+ $pendingOrders->sum('amount')}}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="ion ion-android-contacts"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Verified Users</span>
                            <span class="info-box-number">{{ $verifiedUsers }}</span>

                            <div class="progress">
                                <div class="progress-bar" ></div>
                            </div>
                            <span class="progress-description">
                                Total Users: {{ $users }}
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection