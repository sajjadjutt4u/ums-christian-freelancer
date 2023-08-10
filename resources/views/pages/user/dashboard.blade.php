@extends('layouts.user')
@section('title')<title>Dashboard</title>@endsection

@section('profile_image')
    <img  src="{{ $user_data['personal_image'] ? asset($user_data['personal_image']) : asset('assets/images/faces/profile.jpg') }}" alt="profile-user" class="avatar brround cover-image mb-1 ml-0">
@endsection

@section('profile_name')
    <a href="#" class="dropdown-item text-center font-weight-sembold user pt-0" data-toggle="dropdown">{{$user_data['name']}}</a>
    <span class="text-center user-semi-title ">{{$user_data['state']}}</span>
@endsection

@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row" id="user-profile">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="wideget-user">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="wideget-user-desc d-flex">
                                    <div class="wideget-user-img">
{{--                                        <img class="" src="{{asset('assets/images/faces/profile.jpg')}}" alt="img">--}}
                                        <img style="height: 175px" src="{{ $user_data['personal_image'] ? asset($user_data['personal_image']) : asset('assets/images/faces/profile.jpg') }}" alt="img">

                                    </div>
                                    <div class="user-wrap">
                                        <h4>{{$user_data['name']}}</h4>
                                        <h6 class="text-muted mb-3">Member Since: {{$user_data['created_at']->format('d F Y') }}</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="wideget-user-info">
                                    <div class="wideget-user-warap">
                                        <div class="wideget-user-warap-l">
                                            <h4 class="text-danger">System</h4>
                                            <p>{{$metadata['device']}}</p>
                                        </div>
                                        <div class="wideget-user-warap-r">
                                            <h4 class="text-danger">IP Address</h4>
                                            <p>{{$metadata['ip']}}</p>
                                        </div>
                                    </div>
                                    <div class="wideget-user-warap">
                                        <div class="wideget-user-warap-l">
                                            <h4 class="text-danger">Browser</h4>
                                            <p>{{$metadata['browser']}}</p>
                                        </div>
                                        <div class="wideget-user-warap-r">
                                            <h4 class="text-danger">Last Login</h4>
                                            <p>{{ \Carbon\Carbon::parse($user_data['last_login_time'])->format('d F Y \& h:i A') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="border-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-51">
                                <div id="profile-log-switch">
                                    <div class="media-heading">
                                        <h5><strong>Personal Information</strong></h5>
                                    </div>
                                    <div class="table-responsive ">
                                        <table class="table row table-borderless">
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Full Name : </strong>{{$user_data['name']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Your Sate : </strong> {{$user_data['state']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Phone : </strong> {{$user_data['phone']}} </td>
                                            </tr>
                                            </tbody>
                                            <tbody class="col-lg-12 col-xl-6 p-0">
                                            <tr>
                                                <td><strong>Address : </strong>{{$user_data['address']}}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Email : </strong>{{$user_data['email']}}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row profie-img">
                                        <div class="col-md-12">
                                            <div class="media-heading">
                                                <h5><strong>Biography</strong></h5>
                                            </div>
                                            <p>{{$user_data['description']}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <div style="margin-bottom: 24%"></div>
    <!-- ROW-1 CLOSED -->
@endsection

@section('script')
@endsection
