@extends('layouts.company')
@section('title')<title>Profile Edit</title>@endsection

@section('profile_image')
    <img src="{{asset('assets/images/faces/company.jpg')}}" alt="profile-user" class="avatar brround cover-image mb-1 ml-0">
@endsection

@section('profile_name')
    <a href="#" class="dropdown-item text-center font-weight-sembold user pt-0" data-toggle="dropdown">{{$user_data['name']}}</a>
    <span class="text-center user-semi-title ">{{$user_data['state']}}</span>
@endsection

@section('content')
    <!-- CONTAINER OPEN -->
    <div class="col col-login mx-auto">
        <div class="text-center">
            <img src="{{asset('assets/images/brand/logo.png')}}" class="h-8" alt="">
        </div>
    </div>

    <div class="container-1">
        <div class="access-container p-6" style="margin-left: 150px">

            <div class="col-lg-12">
                @if(session('errors') !== null && count(session('errors')) > 0)
                    @foreach(json_decode(session('errors'), true) as $error)
                        @foreach($error as $error_message)
                            <div class="alert alert-danger">
                                {{ $error_message }}
                            </div>
                        @endforeach
                    @endforeach
                @endif

                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                <form class="card" method="POST" action="{{route('company_edit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Company Edit Profile</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{--     First Row     --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Name</label>
                                    <input name="name" type="text" class="form-control"  placeholder="Company Name" value="{{$user_data['name']}}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Owner Name</label>
                                    <input name="owner_name" type="text" class="form-control"  placeholder="Company Owner Name" value="{{$user_data['owner_name']}}" required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email" value="{{$user_data['email']}}" required>
                                </div>
                            </div>

                            {{--     2nd Row     --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City Name</label>
                                    <input name="city" type="text" class="form-control"  placeholder="City Name" value="{{$user_data['city']}}" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Country Name</label>
                                    <input name="country" type="text" class="form-control"  placeholder="Country Name" value="{{$user_data['country']}}" required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Industry</label>
                                    <input name="industry" type="text" class="form-control" placeholder="Enter Industry Type" value="{{$user_data['industry']}}" required>
                                </div>
                            </div>

                            {{--     3rd Row     --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">phone</label>
                                    <input name="phone" type="number" class="form-control" placeholder="Company phone" min="0" oninput="validity.valid||(value='');" value="{{$user_data['phone']}}">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input name="website_url" class="form-control" placeholder="http://splink.com" value="{{$user_data['website_url']}}">
                                </div>
                            </div>


                            {{--     4th Row     --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">New Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>

                            {{--     5th Row     --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control" placeholder="Address" value="{{$user_data['name']}}">
                                </div>
                            </div>

                            {{--     6th Row     --}}
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Me</label>
                                    <textarea name="description" rows="5" class="form-control" placeholder="Enter About your description">{{$user_data['description']}}</textarea>
                                </div>
                            </div>

                            {{--    7th Row     --}}
{{--                            <div class="col-md-12">--}}
{{--                                <div class="form-group">--}}
{{--                                    <div class="form-label">Upload Your Company Docs</div>--}}
{{--                                    <div class="custom-file">--}}
{{--                                        <input type="file" class="custom-file-input" name="docs" accept=".pdf">--}}
{{--                                        <label class="custom-file-label">Choose file</label>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <button id="show_pdf" class="btn btn-primary-light btn-block">View Docs file</button>--}}
{{--                            </div>--}}

                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary-light btn-block">Update</button>
                    </div>

                </form>
{{--                    <button id="show_pdf" class="btn btn-primary-light btn-block">View Docs file</button>--}}

            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection

@section('script')
    <script>
    </script>
@endsection
