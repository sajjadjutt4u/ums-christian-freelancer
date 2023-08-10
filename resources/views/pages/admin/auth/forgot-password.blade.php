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
                        <h3 class="text-center card-title">Forgot password</h3>
                        <div class="access-input validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                            <input class="login-input" type="text" name="email" placeholder="Email">
                            <span class="input-focus"></span>
                            <span class="input-symbol">
												<i class="zmdi zmdi-email" aria-hidden="true"></i>
											</span>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary-light btn-block">Send</button>
                        </div>
                        <div class="text-center text-muted mt-3 ">
                            Forget it, <a href="{{route('company_login')}}">send me back</a> to the sign in screen.
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- CONTAINER CLOSED -->

@endsection

