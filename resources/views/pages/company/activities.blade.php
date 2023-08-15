@extends('layouts.company')
@section('title')<title>Activities</title>@endsection

@section('profile_image')
    <img src="{{asset('assets/images/faces/company.jpg')}}" alt="profile-user" class="avatar brround cover-image mb-1 ml-0">
@endsection

@section('profile_name')
    <a href="#" class="dropdown-item text-center font-weight-sembold user pt-0" data-toggle="dropdown">{{$user_data['name']}}</a>
    <span class="text-center user-semi-title ">{{$user_data['state']}}</span>
@endsection

@section('content')
    <!-- ROW-1 OPEN -->
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Activities Tables</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="activities" class="table table-striped table-bordered text-nowrap w-100">
                            <thead>
                            <tr>
                                <th class="wd-15p">Sr.No</th>
                                <th class="wd-15p">User</th>
                                <th class="wd-15p">Subject</th>
                                <th class="wd-15p">URL</th>
                                <th class="wd-15p">Method</th>
                                <th class="wd-15p">IP Address</th>
                                <th class="wd-15p">System</th>
                                <th class="wd-10p">Browser</th>
                                <th class="wd-25p">Created IN</th>
                                <th class="wd-10p">More Info</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- TABLE WRAPPER -->
            </div>
            <!-- SECTION WRAPPER -->
        </div>
    </div>
    <!-- ROW-1 CLOSED -->
    <div style="margin-bottom: 24%"></div>
@endsection

@section('script')
    <script>
        var activities = @json($activities);
        var userData = @json($user_data);
    </script>
@endsection
