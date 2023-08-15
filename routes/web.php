<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\LogActivityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('company_login');
});
Route::get('/logout',[UserController::class,'logout'])->name('logout');
Route::get('/test',[UserController::class,'test'])->name('test');



//                          Company Routes
Route::prefix('company')->group(function (){

    // if company OR user both are not login then route can access if one o them then not accessible
    Route::group(['middleware' => 'main.auth'], function () {
        Route::get('/login', [CompanyController::class, 'login_view'])->name('company_login');
        Route::post('/login', [CompanyController::class, 'company_login'])->name('company_login');
        Route::get('/register', [CompanyController::class, 'register_view'])->name('company_register');
        Route::post('/store-company', [CompanyController::class, 'company_store'])->name('company_store');
        Route::get('/forgot-password', [CompanyController::class, 'forgot_password_view'])->name('company_forgot_password');
        Route::post('/forgot-password', [CompanyController::class, 'forgot_password'])->name('company_forgot_password');

    });


    // if company is login then route can access
    Route::group(['middleware' => 'company.auth'], function () {
        Route::get('/dashboard',[CompanyController::class,'company_dashboard'])->name('company_dashboard');
        Route::get('/activities',[CompanyController::class,'company_activities'])->name('company_activities');
        Route::get('/edit-profile/',[CompanyController::class,'company_edit_profile'])->name('company_edit');
        Route::post('/edit-profile',[CompanyController::class,'company_edit_profile_store'])->name('company_edit');

    });



});



//                          User Routes
Route::prefix('/user')->group(function (){

    // if company OR user both are not login then route can access if one o them then not accessible
    Route::group(['middleware' => 'main.auth'], function () {
        Route::get('/login', [UserController::class, 'login_view'])->name('user_login');
        Route::post('/login', [UserController::class, 'user_login'])->name('user_login');
        Route::get('/register', [UserController::class, 'register_view'])->name('user_register');
        Route::post('/store-user', [UserController::class, 'user_store'])->name('user_store');
        Route::get('/forgot-password', [UserController::class, 'forgot_password_view'])->name('user_forgot_password');
        Route::post('/forgot-password', [UserController::class, 'forgot_password'])->name('user_forgot_password');

    });


    // if user person is login then route can access
    Route::group(['middleware' => 'user.auth'], function () {
        Route::get('/dashboard',[UserController::class,'user_dashboard'])->name('user_dashboard');
        Route::get('/activities',[UserController::class,'user_activities'])->name('user_activities');
        Route::get('/edit-profile/',[UserController::class,'user_edit_profile'])->name('user_edit');
        Route::post('/edit-profile',[UserController::class,'user_edit_profile_store'])->name('user_edit');

    });



});

Route::get('{any}', function () {
    return view('pages.error.404'); // Redirect to the 404 page
})->where('any', '.*');


