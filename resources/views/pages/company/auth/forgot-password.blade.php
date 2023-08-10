@extends('layouts.auth')
@section('title')<title>Forgot-Password</title>@endsection
@section('nav-button')<a href="{{route('user_login')}}" class="btn btn-outline-default mt-5 mr-5" style="float: right">User Login</a>@endsection

@section('content')

    <div class="col col-login mx-auto">
        <div class="text-center">
            <img src="../assets/images/brand/logo.png" class="" alt="">
        </div>
    </div>
    <!-- CONTAINER OPEN -->
    <div class="container-1">
        <div class="row">
            <div class="col col-login mx-auto">
                <form class="card" method="post">
                    <div class="card-body p-6">
                        <div class="card-body">
                            <div class="text-center text-muted">
                                Don't have account yet? <a href="{{route('company_register')}}">Sign up</a>
                            </div>
                            <form class="form-control" method="post" action="{{route('company_forgot_password')}}">
                                @csrf
                                <div class="mt-4">
                                    <div class="card-title">Forgot password</div>
                                    <p class="text-muted">Enter your email address and your password will be reset and emailed to you.</p>
                                    <div class="form-group">
                                        <label class="form-label" for="user_email">Email address</label>
                                        <input name="email" type="email" class="form-control" id="user_email" placeholder="Enter email" required>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary-light btn-block">Send me new password</button>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center text-muted mt-3 ">
                                Forget it, <a href="{{route('company_login')}}">send me back</a> to the sign in screen.
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->

@endsection

