@extends("backEnd.master")

@section("title","Update slider")

@section("body")
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Update Slider Image
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ route('admin.home') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Slider edit</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title text-center">Update Image </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="box-body">
                                <form method="POST" action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group {{ $errors->has('button_text') ? 'has-error' : '' }}">
                                        <label for="button_text">Button Text</label>
                                        <input id="button_text" type="text" class="form-control" name="button_text" placeholder="E.g. Get Start" value="{{ old('button_text') ? old('button_text'): $slider->button_text }}">
                                        @if ($errors->has('button_text'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('button_text') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                                        <label for="image">Image</label>
                                        <div style="margin-bottom: 15px;">
                                            <img src="{{ asset('frontEnd/Slider/'.$slider->image) }}" alt="slider Image" width="120">
                                        </div>
                                        <input id="name" type="file" class="form-control" name="image">
                                        @if ($errors->has('image'))
                                            <div class="help-block" role="alert">
                                                <strong>{{ $errors->first('image') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-flat">
                                            Upload
                                        </button>
                                        <a href="{{ route('slider.index') }}" class="btn btn-info btn-flat">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection