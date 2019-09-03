@extends('agent.layouts.app')

@section('title', 'Agent Dashboard')

@section('content')
    <!-- Content Header (Page header) -->


            <div class="row">
                <div class="-check-circle">
                    <a href="{{route('agent.overview')}}">Overview</a>
                </div>

            </div>


@endsection
