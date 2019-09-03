<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
                {{--<span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>--}}

                <div class="info-box-content">
                    <span class="info-box-text " id="search_btn"><a onclick="openSearchBox()" href="javascript:">Search client</a></span>
                    <span class="info-box-number d-none" id="search_box">
                                   <form action="{{route('searchClient')}}">
                                       @csrf
                                       <input type="text" name="q" placeholder="search phone number">
                                       {{--{{ $balance->balance }}--}}
                                       <button class="btn btn-primary">Search</button>
                                   </form>
                            </span>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                {{--<span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>--}}

                <div class="info-box-content">
                    <a href="{{route('sendMoneyStep')}}"><span class="info-box-text">Send money</span></a>
                    {{--<span class="info-box-number">410 <small>($33)</small></span>--}}
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                {{--<span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>--}}

                <div class="info-box-content">
                    <span class="info-box-text"><a href="{{ route('agent.money-request') }}">Request for money</a></span>
                    {{--<span class="info-box-number">760 <small>($100)</small></span>--}}
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
                {{--<span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>--}}

                <div class="info-box-content">
                    <span class="info-box-text"><a href="{{route('contactUs')}}">Contact us</a></span>
                    {{--<span class="info-box-number">2,000 <small>($200)</small></span>--}}
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
