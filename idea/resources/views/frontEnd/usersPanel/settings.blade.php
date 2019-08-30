@extends('frontEnd.master')

@section('title', 'Transactions')

@section('body')
    <div class="py-5"></div>
    <div class="container">
        <div class="row justify-content-center">
            @include('frontEnd.inc.userPanelNav')
            <div class="col-lg-9 col-md-12 py-4">
                <aside class="account-right-section">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="mb-2">
                                Settings
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <p><strong>Notification Settings</strong></p>
                                <p class="mb-2">Would you like to receive WhatsApp notifications from us about the
                                    status of your
                                    money transfer?</p>
                                <p class="mb-2">All notifications will be sent to the mobile number that’s
                                    registered with your
                                    account</p>
                                <p class="mb-4">(to change this, please contact Customer Service).</p>
                                <div class="custom-control custom-checkbox my-1 mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="poli" name="payMethod">
                                    <label class="custom-control-label" for="poli">
                                        <img src="{{ asset('/') }}frontEnd/img/profiles/notification-message.png" alt="">
                                        via <strong>SMS</strong> (free)
                                    </label>
                                </div>
                                <div class="custom-control custom-checkbox my-3 mr-sm-2">
                                    <input type="checkbox" class="custom-control-input" id="dccard"
                                           name="payMethod">

                                    <label class="custom-control-label" for="dccard">
                                        <img src="{{ asset('/') }}frontEnd/img/profiles/icon-whatsapp.png" alt="">
                                        via <strong>WhatsApp</strong> (free)
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a href="" class="btn btn-primary btn-lg">Save Changes</a>
                                    <a href="" class="btn btn-dark btn-lg">cancel</a>
                                </div>
                                <small>Please note: while this option is in beta testing, we’ll also send
                                    notifications to you via SMS to make sure you don’t
                                    miss any important notifications while we improve our service</small>
                            </form>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection