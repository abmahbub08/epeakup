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
            <div class="col-lg-9 col-md-12 pt-4 pb-5">
                @if($transections->count() == 0)
                    <aside class="account-right-section">
                        <div class="account-verification p-4">
                            <div class="row align-items-center">
                                <div class="col-lg-3 text-center">
                                    <img src="{{ asset('/') }}frontEnd/img/profiles/icon-activation.svg" alt=""
                                         width="120">
                                </div>
                                <div class="col-lg-6 text-center text-lg-left">
                                    <h3>Verify your account</h3>
                                    <p>
                                        In order to keep your information and transfers safe and secure, we need to
                                        verify your account!
                                    </p>
                                </div>
                                <div class="col-lg-3">
                                    <a href="" class="btn d-block d-md-inlene-block btn-verify">Verify my account</a>
                                </div>
                            </div>
                        </div>
                        <div class="send-money-sec py-5 mt-5">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-8">
                                    <div class="text-center">
                                        <img class="mb-5" src="{{ asset('/') }}frontEnd/img/profiles/my-transfers.svg"
                                             alt="">

                                        <h2>Transfer history</h2>
                                        <p>
                                            Your transfer history will be <br> saved here
                                        </p>
                                        <a href="{{ route('getStart') }}" class="btn btn-send-money px-5">
                                            Send money now
                                            <i class="fa fa-angle-right"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="account-footer-sec">
                            <hr>
                           
                        </div>
                    </aside>
                @else
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-1">Transections</h2>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-responsive-md text-center" id='transactionsTable'>
                                <thead>
                                <tr>
                                    <th>SL/No</th>
                                    <th>Recipient Name</th>
                                    <th>Recipient Email</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transections as $tran)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            {{ $tran->recipient->first_name.' '.$tran->recipient->last_name }}
                                        </td>
                                        <td>
                                            {{ $tran->recipient->email }}
                                        </td>
                                        <td>
                                            {{ $tran->amount }}
                                        </td>
                                        <td>
                                            @if($tran->status_id == 1)
                                                <span class="bg-warning py-1 px-3 text-light">Pending</span>
                                            @else
                                                <span class="bg-success py-1 px-3 text-light">Success</span>
                                            @endif
                                        </td>
                                        <td style="white-space: nowrap">
                                            {{ $tran->created_at->toDateString() }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
	<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready( function () {
    			$('#transactionsTable').DataTable();
		} );
	</script>
@endpush