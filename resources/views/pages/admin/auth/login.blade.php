@extends('layouts.auth')
@section('title')<title>Login</title>@endsection
@section('nav-button')<a href="{{route('user_login')}}" class="btn btn-outline-default mt-5 mr-5" style="float: right">User Login</a>
<a href="#" class="btn btn-outline-default mt-5 mr-5 mb-0" style="float: right">Admin Login</a>
@endsection

@section('content')
    <div class="col col-login mx-auto">
        <div class="text-center">
            <img src="../assets/images/brand/logo.png" class="" alt="">
        </div>
    </div>
    <div class="container-1">
        <div class="access-container p-6">
            <form class="login-form validate-form">
							<span class="login-form-title">
								Company Login
							</span>
                <div class="access-input validate-input" data-validate ="Valid email is required: ex@abc.xyz">
                    <input class="login-input" type="text" name="email" placeholder="Email">
                    <span class="input-focus"></span>
                    <span class="input-symbol">
									<i class="zmdi zmdi-email" aria-hidden="true"></i>
								</span>
                </div>
                <div class="access-input validate-input" data-validate = "Password is required">
                    <input class="login-input" type="password" name="pass" placeholder="Password">
                    <span class="input-focus"></span>
                    <span class="input-symbol">
									<i class="zmdi zmdi-lock" aria-hidden="true"></i>
								</span>
                </div>
                <div class="text-right pt-3 pb-3">
                    <p class="mb-0"><a href="{{route('company_forgot_password')}}" class="text-primary ml-1">Forgot Password?</a></p>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary-light btn-block">Login</button>
                </div>
                <div class="text-center pt-3">
                    <p class="mb-0">Not a member?<a href="{{route('company_register')}}" class="text-primary ml-1">Sign UP now</a></p>
                </div>
                <div class=" flex-c-m text-center mt-3">
                    <p>Or</p>
                    <div class="social-icons">
                        <ul>
                            <li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus"></i> Sign up with Google</a></li>
                            <li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook"></i> Sign in with Facebook</a></li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

