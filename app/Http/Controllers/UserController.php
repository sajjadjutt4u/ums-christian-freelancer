<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Models\User;
use App\Services\LogActivityServices;
use App\Services\UserServices;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class UserController extends Controller
{
    private $user_services;
    private $log_activity_services;

    public function __construct(UserServices $user_services , LogActivityServices $log_activity_services)
    {
        $this->user_services = $user_services;
        $this->log_activity_services = $log_activity_services;
    }

    public function test(){
        session()->flush();
        dd(session('login_status'));
    }

    public function login_view(){
        return view('pages.user.auth.login');
    }

    public function register_view(){
        return view('pages.user.auth.register');
    }

    public function forgot_password_view(){
        return view('pages.user.auth.forgot-password');
    }

    public function user_store(UserRegisterRequest $request)
    {
        try {
            $this->user_services->add_user($request);
            $this->log_activity_services->add_activity();
            return redirect()->route('user_dashboard')->with('success', 'Your Account Register Successfully');
        }catch (\Exception $e){
            return redirect()->route('user_register')->with('error', $e->getMessage());
        }

    }

    public function user_login(LoginUserRequest $request){
        $user = User::where('email',$request['email'])->first();
        session(['login_status' => 'user']);
        session(['user_data' => $user]);
        $this->log_activity_services->add_activity();
        return redirect()->route('user_dashboard')->with('success', 'Your are Login Successfully');
    }

    public function forgot_password(Request $request){
        dd($request->all());
    }

    public function user_dashboard(){
        $request = Request::capture();
        $metadata = json_decode($this->user_services->get_metadata($request),true);
        $user_data = session('user_data');
        $this->log_activity_services->add_activity();
        return view('pages.user.dashboard',compact('user_data','metadata'));
    }

    public function user_activities(){
        $user_data = session('user_data');
        $activities = $user_data->activities()->get();
        $this->log_activity_services->add_activity();
        return view('pages.user.activities',compact('activities','user_data'));
    }

    public function user_edit_profile(){
        $this->log_activity_services->add_activity();
        return view('pages.user.profile-edit ');
    }

    public function user_edit_profile_store(Request $request){
        dd($request->all());
    }

    public function logout(){
        $this->log_activity_services->add_activity();
        session()->flush();
        return redirect()->route('user_login')->with('success','You logout successfully');
    }

}
