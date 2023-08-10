@extends('layouts.user')
@section('title')<title>Profile Edit</title>@endsection

@section('profile_image')
    <img src="{{asset('assets/images/faces/female/16.jpg')}}" alt="profile-user" class="avatar brround cover-image mb-1 ml-0">
@endsection

@section('profile_name')
    <a href="#" class="dropdown-item text-center font-weight-sembold user pt-0" data-toggle="dropdown">Joyce Stewart</a>
    <span class="text-center user-semi-title ">web designer</span>
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

                <form class="card" method="POST" action="{{route('user_edit')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">User Edit Profile</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">

                            {{--     First Row     --}}
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-label">User Name</label>
                                    <input name="name" type="text" class="form-control" placeholder="User Name"
                                           required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-3">
                                <div class="form-group">
                                    <label class="form-label">phone</label>
                                    <input name="phone" type="number" class="form-control" placeholder="User phone"
                                           min="0" oninput="validity.valid||(value='');">
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-4">
                                <div class="form-group">
                                    <label class="form-label">Email address</label>
                                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                                </div>
                            </div>

                            {{--     2nd Row     --}}
                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input name="password" type="password" class="form-control" placeholder="Password"
                                           required>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Confirm Password</label>
                                    <input name="password_confirmation" type="password" class="form-control"
                                           placeholder="Confirm Password" required>
                                </div>
                            </div>

                            {{--     3rd Row     --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Address</label>
                                    <input name="address" type="text" class="form-control" placeholder="Address"
                                           required>
                                </div>
                            </div>

                            {{--     4th Row     --}}
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">About Me</label>
                                    <textarea name="description" rows="5" class="form-control"
                                              placeholder="Enter About your description"></textarea>
                                </div>
                            </div>

                            {{--    5th Row     --}}

                            <div class="col-lg-6 mt-5">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">CNIC Front Side image</h3>
                                    </div>
                                    <div class="card-body">
                                        <input name="cnic_front_image" type="file" class="dropify" data-height="300" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-5">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">CNIC Back Side image</h3>
                                    </div>
                                    <div class="card-body">
                                        <input name="cnic_back_image" type="file" class="dropify" data-height="300" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                            </div>

                            {{--    6th Row     --}}

                            <div class="col-lg-6 mt-5">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">Personal image</h3>
                                    </div>
                                    <div class="card-body">
                                        <input name="personal_image" type="file" class="dropify" data-height="300" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 mt-5">
                                <div class="card shadow">
                                    <div class="card-header">
                                        <h3 class="mb-0 card-title">Business image</h3>
                                    </div>
                                    <div class="card-body">
                                        <input name="business_image" type="file" class="dropify" data-height="300" accept=".jpg, .jpeg, .png">
                                    </div>
                                </div>
                            </div>

                            {{--    7th Row     --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-label">Upload Your CV</div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="cv"
                                               accept=".docx, .pdf, .jpg, .jpeg, .png">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary-light btn-block">Register</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->
@endsection

@section('script')
@endsection
