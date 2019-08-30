@extends('frontEnd.master')



@section('title', 'Transactions')

@push('styles')

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">

@endpush

@section('body')

    <div class="py-5"></div>

    <div class="container">

        <div class="row justify-content-center">

            @include('frontEnd.inc.userPanelNav')

            <div class="col-lg-9 col-md-12 py-4">

                <aside class="account-right-section">

                    <div class="card">

                        <div class="card-header">

                            <h2 class="mb-1">

                                My Recipients

                                <a href="#" class="btn btn-send-money float-right px-4">

                                    Add new Recipient

                                </a>

                            </h2>

                        </div>

                        <div class="card-body">

                            <div class="table-responsive">

                                <table class="table table-bordered text-center table-striped" id='recipienTable'>

                                    <thead>

                                    <tr>
                                        <th>SL/NO</th>

                                        <th>Name</th>

                                        <th>Email</th>
                                        
                                        <th>Account Number</th>
                                        
                                        <th>Phone</th>

                                        <th>Country</th>

                                        <!--<th>Action</th>-->

                                    </tr>

                                    </thead>

                                    <tbody>

                                    @forelse($recipients as $rec)

                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>

                                            <td>{{ $rec->first_name." ". $rec->last_name  }}</td>

                                            <td>{{ $rec->email }}</td>
                                            
                                            <td>{{ $rec->account_number }}</td>

                                            <td>{{ $rec->phone }}</td>
                                            
                                            <td>{{ $rec->country->name }}</td>


                                            <!--<td style="white-space:nowrap;">-->
                                            <!--<img src="{{ asset('/') }}frontEnd/img/profiles/Green check.jpg" alt="">-->
                                            <!--    <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>-->

                                            <!--    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>-->

                                            <!--</td>-->

                                        </tr>

                                    @empty

                                        <tr>

                                            <td colspan="4" class="text-center text-danger">No Data Found!</td>

                                        </tr>

                                    @endforelse

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                </aside>

            </div>

        </div>

    </div>

@endsection

@push('scripts')
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready( function () {
    			$('#recipienTable').DataTable();
		} );
	</script>
@endpush