@extends('backEnd.master')
@section('title','Sliders')
@section('body')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Sliders
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Sliders</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title text-center">Sliders</h3>
                        <a href="{{ route('slider.create') }}" class="btn btn-info pull-right">Add Image</a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Button Text</th>
                                    <th>Image</th>
                                    <th>Size (KB)</th>
                                    <th>File Type</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $slider->button_text }}</td>
                                        <td><img src="{{ asset('frontEnd/Slider/'.$slider->image) }}" alt="" width="100"></td>
                                        <td>{{ $slider->size }} kb</td>
                                        <td>{{ $slider->type }}</td>
                                        <td style="white-space: nowrap;">
                                            <a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-info btn-flat">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('slider.destroy',$slider->id) }}" onclick="event.preventDefault();confirm('Are you sure to delete?')?document.getElementById('deleteCountry{{$slider->id}}').submit():''" class="btn btn-danger btn-flat">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                            <form id="deleteCountry{{$slider->id}}" action="{{ route('slider.destroy',$slider->id) }}" method="POST" style="display: none;">
                                                @csrf()
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center">
                                            No Image Yet
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