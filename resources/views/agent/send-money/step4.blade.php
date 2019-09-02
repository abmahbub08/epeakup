@extends('agent.layouts.app')

@section('title', 'Add Client ')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0 text-dark">Currency Converter</h1>
                </div><!-- /.col -->


            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card">

                        <div class="card-body" id="VueElement">
                            <form action="{{ route('sendMoney') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="payment_method" value="{{$details['payment_method']}}">
                                <input type="hidden" name="sender_name" value="{{$details['sender_name']}}">
                                <input type="hidden" name="australian_number" value="{{$details['australian_number']}}">
                                <input type="hidden" name="sender_email" value="{{$details['sender_email']}}">
                                <input type="hidden" name="receiver_name" value="{{$details['receiver_name']}}">
                                <input type="hidden" name="receiver_number" value="{{$details['receiver_number']}}">
                                <input type="hidden" name="confirm_receiver_number" value="{{$details['confirm_receiver_number']}}">
                                <input type="hidden" name="step" value="{{encrypt('4')}}">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="first_name">Currency Converter *</label>
                                        </div>
                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="phone">From : </label>

                                        <input  name="aud_amount" required onkeypress="return isNumberKey(event)" v-model="aud_amount" type="text"  placeholder="AUD">

                                    </div>
                                    <div class="col-md-6 text-right">
                                        <label for="phone">To : </label>

                                        <input  name="bdt_amount" onkeypress="return isNumberKey(event)" v-model="bdt_amount" type="text" placeholder="BDT">

                                    </div>
                                    <div class="col-md-12 text-center">
                                        <button v-on:click="currencyConvert" class="btn btn-primary" type="button">Calculate</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="phone">Amount (AUD) : <span id="aud_total_amount">0</span></label>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <label for="phone">{{$details['payment_method']}}</label>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone">Converted amount</label>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <label for="phone"><span id="bdt_total_amount" v-html="" >0</span> BDT</label>
                                    </div>
                                    <div class="col-md-6 ">
                                        <label for="phone">**Rate : 1 AUD = {{getAudCurrency()}} BDT</label>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <a href="{{route('PayBack')}}" class="btn btn-primary">Back</a>
                                        <button class="btn btn-primary" type="submit">Next</button>
                                    </div>


                                </div>




                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.10/vue.min.js" integrity="sha256-chlNFSVx3TdcQ2Xlw7SvnbLAavAQLO0Y/LBiWX04viY=" crossorigin="anonymous"></script>
    <script>
        new Vue({

            el:'#VueElement',

            data: {
            aud_amount: '',
            bdt_amount: '',
            currency_rate: "{{getAudCurrency()}}"
            },

            methods:{
                currencyConvert:function(){

                    if ((this.aud_amount.length == 0))
                        this.aud_amount = this.bdt_amount/this.currency_rate;
                    else
                        this.bdt_amount = this.aud_amount*this.currency_rate;
                    $('#bdt_total_amount').html(this.bdt_amount);
                    $('#aud_total_amount').html(this.aud_amount);

                }
            }
        });
        function isNumberKey(evt)
        {
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;

            return true;
        }
    </script>

@endsection