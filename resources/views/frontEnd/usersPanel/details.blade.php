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
                            <h2 class="mb-1">My Details <a href="{{ route('user.edit',['id'=>auth()->id()]) }}" class="btn btn-send-money float-right px-4">Edit
                                    my details</a>
                            </h2>
                            <small>Your account details are listed below. For security reasons,<br> some of these
                                details are hidden.</small>
                        </div>
                        <div class="card-body">
                            <div>
                                <img src="{{ asset('storage/documents/'.$user->documents) }}" alt="Picture" width="200">
                            </div>
                            <table class="table table-borderless table-responsive">
                                <tbody>
                                <tr>
                                    <th>Customer ID</th>
                                    <td>
                                        {{ empty($user->customerId) ? "No data ": $user->customerId }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>First name</th>
                                    <td>
                                        {{ empty($user->firstName) ? "No data ": $user->firstName }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Last name</th>
                                    <td>
                                        {{ empty($user->lastName) ? "No data ": $user->lastName }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>
                                        {{ empty($user->email) ? "No data ": $user->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>
                                        {{ empty($user->gender) ? "No data ": $user->gender }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>
                                        {{ empty($user->phone) ? "No data ": $user->phone }}
                                    </td>
                                </tr>
{{--                                <tr>--}}
{{--                                    <th>Identity Type</th>--}}
{{--                                    <td>--}}
{{--                                        {{ empty($user->customerId) ? "No data ": $user->customerId }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr>--}}
{{--                                    <th>ID Number</th>--}}
{{--                                    <td>--}}
{{--                                        {{ empty($user->customerId) ? "No data ": $user->customerId }}--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                <tr>
                                    <th>Country</th>
                                    <td>
                                        {{ empty($user->country_id) ? "No data ": $user->country->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Building No./Name</th>
                                    <td>
                                        {{ empty($user->buildingName) ? "No data" : $user->buildingName }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Street</th>
                                    <td>
                                        {{ empty($user->street) ? "No data" : $user->street }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Postcode</th>
                                    <td>
                                        {{ empty($user->postcode) ? "No data ": $user->postcode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>City/Town</th>
                                    <td>
                                        {{ empty($user->city_id) ? "No data ": $user->city_id }}
                                    </td>
                                </tr>
                                <!--<tr>-->
                                <!--    <th>State</th>-->
                                <!--    <td>-->
                                <!--        {{ empty($user->city_id) ? "No data ": $user->city_id }}-->
                                <!--    </td>-->
                                <!--</tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@endsection