@extends('backEnd.master')
@section('title','Discounts')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Discounts
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Discounts</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">Discounts</h3>
                        <a href="{{ route('discounts.create') }}" class="btn btn-info pull-right">Create Offer</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Payment Method</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($discounts as $discount)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $discount->payment_method }}</td>
                                        <td>{{ $discount->discount }}</td>
                                        <td>
                                            <a href="{{ route('discounts.edit',$discount->id) }}" class="btn btn-info btn-flat">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('discounts.destroy',$discount->id) }}" onclick="event.preventDefault();confirm('Are you sure to delete?')?document.getElementById('deleteCountry{{$discount->id}}').submit():''" class="btn btn-danger btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteCountry{{$discount->id}}" action="{{ route('discounts.destroy',$discount->id) }}" method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            No Payment Method Discount Yet
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </section>
    </div>
@endsection