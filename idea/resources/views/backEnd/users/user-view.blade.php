@extends('backEnd.master')

@section('title', 'View User')

@section('body')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Payments</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pending Payments</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total user</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Issues</span>
                            <span class="info-box-number">0000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">All Payment Request</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table no-margin">
                                <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Sender</th>
                                    <th>Recipent</th>
                                    <th>Methods</th>
                                    <th>Amount</th>
                                    <th>Acount Number</th>
                                    <th>Status</th>
                                    <th>Confirmation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Md.Imtiaz Khandoker</td>
                                    <td>Rabinch Sheikh</td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">Bkash</div>
                                    </td>
                                    <td>1200 BDT</td>
                                    <td>01739972425</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <span class="label label-success">View Details</span>|<span
                                                class="label label-danger">Send Mail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Md.Imtiaz Khandoker</td>
                                    <td>Rabinch Sheikh</td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">Bkash</div>
                                    </td>
                                    <td>1200 BDT</td>
                                    <td>01739972425</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <span class="label label-success">View Details</span>|<span
                                                class="label label-danger">Send Mail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Md.Imtiaz Khandoker</td>
                                    <td>Rabinch Sheikh</td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">Bkash</div>
                                    </td>
                                    <td>1200 BDT</td>
                                    <td>01739972425</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <span class="label label-success">View Details</span>|<span
                                                class="label label-danger">Send Mail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Md.Imtiaz Khandoker</td>
                                    <td>Rabinch Sheikh</td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">Bkash</div>
                                    </td>
                                    <td>1200 BDT</td>
                                    <td>01739972425</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <span class="label label-success">View Details</span>|<span
                                                class="label label-danger">Send Mail</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Md.Imtiaz Khandoker</td>
                                    <td>Rabinch Sheikh</td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">Bkash</div>
                                    </td>
                                    <td>1200 BDT</td>
                                    <td>01739972425</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <span class="label label-success">View Details</span>|<span
                                                class="label label-danger">Send Mail</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="pages/examples/invoice.html">OR9842</a></td>
                                    <td>Md.Imtiaz Khandoker</td>
                                    <td>Rabinch Sheikh</td>
                                    <td>
                                        <div class="sparkbar" data-color="#00a65a" data-height="20">Bkash</div>
                                    </td>
                                    <td>1200 BDT</td>
                                    <td>01739972425</td>
                                    <td><span class="label label-warning">Pending</span></td>
                                    <td>
                                        <span class="label label-success">View Details</span>|<span
                                                class="label label-danger">Send Mail</span>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix">
                        <ul class="pagination pull-right">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>

@endsection