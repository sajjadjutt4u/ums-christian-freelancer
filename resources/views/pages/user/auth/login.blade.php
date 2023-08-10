@extends('layouts.auth')
@section('title')<title>Login</title>@endsection
@section('nav-button')<a href="{{route('company_login')}}" class="btn btn-outline-default mt-5 mr-5" style="float: right">Company Login</a>@endsection

@section('content')
    <div class="col col-login mx-auto">
        <div class="text-center">
            <img src="{{asset('assets/images/brand/logo.png')}}" class="" alt="">
        </div>
    </div>
    <div class="container-1">
        <div class="access-container p-6">
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
            <form class="login-form validate-form" method="post" action="{{route('user_login')}}">
                @csrf
							<span class="login-form-title">
								User Login
							</span>
                <div class="access-input validate-input" data-validate ="Valid email is required: ex@abc.xyz">
                    <input class="login-input" type="text" name="email" placeholder="Email">
                    <span class="input-focus"></span>
                    <span class="input-symbol">
									<i class="zmdi zmdi-email" aria-hidden="true"></i>
								</span>
                </div>
                <div class="access-input validate-input" data-validate = "Password is required">
                    <input class="login-input" type="password" name="password" placeholder="Password">
                    <span class="input-focus"></span>
                    <span class="input-symbol">
									<i class="zmdi zmdi-lock" aria-hidden="true"></i>
								</span>
                </div>
                <div class="text-right pt-3 pb-3">
                    <p class="mb-0"><a href="{{route('user_forgot_password')}}" class="text-primary ml-1">Forgot Password?</a></p>
                </div>
                <div class="">
                    <button type="submit" class="btn btn-primary-light btn-block">Login</button>
                </div>
                <div class="text-center pt-3">
                    <p class="mb-0">Not a member?<a href="{{route('user_register')}}" class="text-primary ml-1">Sign UP now</a></p>
                </div>

{{--                <div class=" flex-c-m text-center mt-3">--}}
{{--                    <p>Or</p>--}}
{{--                    <div class="social-icons">--}}
{{--                        <ul>--}}
{{--                            <li><a class="btn  btn-social btn-block"><i class="fa fa-google-plus"></i> Sign up with Google</a></li>--}}
{{--                            <li><a class="btn  btn-social btn-block mt-2"><i class="fa fa-facebook"></i> Sign in with Facebook</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </form>
        </div>
    </div>
@endsection

