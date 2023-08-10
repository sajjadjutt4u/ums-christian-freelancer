@extends('layouts.auth')
@section('title')<title>Register</title>@endsection
@section('nav-button')<a href="{{route('user_register')}}" class="btn btn-outline-default mt-5 mr-5" style="float: right">User Register</a>@endsection

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

                    @if(session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                <form class="card" method="POST" action="{{route('company_store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Company Register</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{--     First Row     --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Name</label>
                                    <input name="name" type="text" class="form-control"  placeholder="Company Name" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Company Owner Name</label>
                                    <input name="owner_name" type="text" class="form-control"  placeholder="Company Owner Name" required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>

                            {{--     2nd Row     --}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">City Name</label>
                                    <input name="city" type="text" class="form-control"  placeholder="City Name" required>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Country Name</label>
                                    <input name="country" type="text" class="form-control"  placeholder="Country Name" required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Industry</label>
                                    <input name="industry" type="text" class="form-control" placeholder="Enter Industry Type" required>
                                </div>
                            </div>

                            {{--     3rd Row     --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">phone</label>
                                    <input name="phone" type="number" class="form-control" placeholder="Company phone" min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Website</label>
                                    <input name="website_url" class="form-control" placeholder="http://splink.com">
                                </div>
                            </div>


                            {{--     4th Row     --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
                                </div>
                            </div>

                            {{--     5th Row     --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control" placeholder="Address" required>
                                </div>
                            </div>

                            {{--     6th Row     --}}
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Me</label>
                                    <textarea name="description" rows="5" class="form-control" placeholder="Enter About your description" ></textarea>
                                </div>
                            </div>

                            {{--    7th Row     --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-label">Upload Your Company Docs</div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="docs" accept=".pdf">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary-light btn-block">Register</button>
                    </div>

                    <div class="card-footer text-center pt-3">
                        <p class="mb-0">Already have account?<a href="{{route('company_login')}}" class="text-primary ml-1">Sign In</a></p>
                    </div>

{{--                    <div class=" flex-c-m text-center col-md-4 mb-5" style="margin-left: 35%">--}}
{{--                        <p>Or</p>--}}
{{--                        <div class="social-icons">--}}
{{--                            <ul>--}}
{{--                                <li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus "></i> Sign up with Google</a></li>--}}
{{--                                <li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook"></i> Sign in with Facebook</a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                </form>

            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->

@endsection

