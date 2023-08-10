@extends('layouts.auth')
@section('content')
    <div class="page">
        <!-- PAGE-CONTENT OPEN -->
        <div class="page-content error-page">
            <div class="container text-center">
                <div class="error-template">
                    <h1 class="display-1 floating text-white mb-2">404</h1>
                    <h5 class="error-details text-white">
                        Sorry, an error has occured, Requested page not found!
                    </h5>
                    <div class="text-center">
                        <a class="btn btn-primary-light mt-5 mb-5" href="{{url()->previous()}}"> <i class="fa fa-long-arrow-left"></i> Go Back </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- PAGE-CONTENT OPEN CLOSED -->
    </div>
@endsection

