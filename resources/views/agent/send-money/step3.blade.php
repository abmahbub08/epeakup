@extends('agent.layouts.app')

@section('title', 'Add Client ')
@section('styles')
    <style>


        /*the container must be positioned relative:*/
        .autocomplete {
            position: relative;
            display: inline-block;
        }


        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            border-bottom: 1px solid #d4d4d4;
        }

        /*when hovering an item:*/
        .autocomplete-items div:hover {
            background-color: #e9e9e9;
        }

        /*when navigating through the items using the arrow keys:*/
        .autocomplete-active {
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
    </style>
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Send Money</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('agent.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sendMoneyStep',1) }}">step 1</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('sendMoneyStep',2) }}">step 2</a></li>
                        <li class="breadcrumb-item active">step 3</li>
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
                <div class="col-lg-10">
                    <div class="card">

                        <div class="card-body" id="VueElement">
                            <form action="{{ route('sendMoney') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="step" value="{{encrypt('3')}}">

                                <input type="hidden" name="payment_method" value="{{$details['payment_method']}}">
                                <input type="hidden" name="sender_name" value="{{$details['sender_name']}}">
                                <input type="hidden" name="australian_number" value="{{$details['australian_number']}}">
                                <input type="hidden" name="sender_email" value="{{$details['sender_email']}}">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="first_name">Search Receiver : </label>
                                        <div class="autocomplete" style="">
                                            <input autocomplete="off" name="" id="myInput" oninput="" type="text" class="form-control  {{ $errors->has('sender_name')?' is-invalid':'' }}" value="{{old('sender_name')}}" placeholder="Search By account number" >

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="first_name">Receiver Name *</label>
                                            <input  name="receiver_name" id="receiver_name" type="text" class="form-control {{ $errors->has('receiver_name')?' is-invalid':'' }}" value="{{old('receiver_name')}}" placeholder="Receiver Name" required>
                                            @if ($errors->has('receiver_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('receiver_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>




                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="phone">Receiver Mobile Number *</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+88</div>
                                            </div>
                                            <input  v-on:input="inputCheck" v-model="receiver_number" name="receiver_number" v-bind:style="bdrc" type="text" class="form-control {{ $errors->has('receiver_number')?' is-invalid':'' }}" value="{{old('receiver_number')}}" id="receiver_number" placeholder="Receiver Mobile Number">
                                            @if ($errors->has('receiver_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('receiver_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">

                                            <label for="email">Confirm receiver Number *</label>
                                            <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+88</div>
                                            </div>
                                            <input v-on:input="inputCheck"  v-model="confirm_receiver_number" name="confirm_receiver_number"  v-bind:style="Cbdrc" id="c_receiver_number" type="text" class="form-control {{ $errors->has('confirm_receiver_number')?' is-invalid':'' }}" value="{{old('confirm_receiver_number')}}" placeholder="Confirm receiver number" required>
                                            @if ($errors->has('confirm_receiver_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('confirm_receiver_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="text-center">
                                    <a href="{{route('PayBack')}}" class="btn btn-primary">Back</a>
                                    <button disabled id="submit" class="btn btn-primary" type="submit" >Next</button>
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
                confirm_receiver_number: '',
                receiver_number: '',
                bdrc:{borderColor:'#ced4da'},
                Cbdrc:{borderColor:'#ced4da'}

            },

            methods:{
                inputCheck:function(){
                    console.log(this.confirm_receiver_number);


                    $('#submit').attr('disabled',true);


                    if ((this.receiver_number.length == 0)) {

                        this.bdrc.borderColor = '#FF0000';

                    }else if ((this.confirm_receiver_number.length == 0) || ((this.confirm_receiver_number != this.receiver_number))) {
                        this.Cbdrc.borderColor = '#FF0000';

                    }else{
                        this.bdrc.borderColor = '#ced4da';
                        this.Cbdrc.borderColor = '#ced4da';
                        $('#submit').attr('disabled',false);
                    }




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
    <script>
        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        var xx = arr[i];
                        b.innerHTML += "<strong onclick='getExistClient("+xx+")'>" + arr[i]+ "</strong>";
                        // b.innerHTML += "<span onclick='getExistClient() >";
                        // b.innerHTML +=  arr[i].substr(val.length);
                        // b.innerHTML += "</span>";
                        // /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        // b.innerHTML += "</p>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");

            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }

            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }

            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);


            });

        }

        var countries = {!! \GuzzleHttp\json_encode($clients) !!};
        // console.log(countries,countries2);
        autocomplete(document.getElementById("myInput"), countries);


        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/

        function getExistClient(event) {
            $('#receiver_name').val('');
            $('#receiver_number').val('');
            $('#c_receiver_number').val('');
            $('#submit').attr('disabled',true);
            $.ajax({
                url: "{{route('searchReceiver')}}?q="+event,
                context: document.body
            }).done(function(data) {
                var data = data.data;
                console.log(data);

                $('#receiver_name').val(data.first_name+' '+data.last_name);
                $('#receiver_number').val(data.account_number);
                $('#c_receiver_number').val(data.account_number);
                $('#submit').attr('disabled',false);

            });
        }
    </script>

@endsection