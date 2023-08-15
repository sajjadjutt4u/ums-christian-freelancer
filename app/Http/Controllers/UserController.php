<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\LogActivityServices;
use App\Services\UserServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class UserController extends Controller
{
    private UserServices $user_services;
    private LogActivityServices $log_activity_services;

    public function __construct(UserServices $user_services , LogActivityServices $log_activity_services)
    {
        $this->user_services = $user_services;
        $this->log_activity_services = $log_activity_services;
    }

    public function test(){
        session()->flush();
        dd(session('login_status'));
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function login_view(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.user.auth.login');
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function register_view(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.user.auth.register');
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function forgot_password_view(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.user.auth.forgot-password');
    }


    /**
     * @param UserRegisterRequest $request
     * @return RedirectResponse
     */
    public function user_store(UserRegisterRequest $request): RedirectResponse
    {
        try {
            $this->user_services->add_user($request);
            $this->log_activity_services->add_activity();
            return redirect()->route('user_dashboard')->with('success', 'Your Account Register Successfully');
        }catch (\Exception $e){
            return redirect()->route('user_register')->with('error', $e->getMessage());
        }

    }

    /**
     * @param LoginUserRequest $request
     * @return RedirectResponse
     */
    public function user_login(LoginUserRequest $request): RedirectResponse
    {
        $user = User::where('email',$request['email'])->first();
        session(['login_status' => 'user']);
        session(['user_data' => $user]);
        $this->log_activity_services->add_activity();
        return redirect()->route('user_dashboard')->with('success', 'Your are Login Successfully');
    }

    public function forgot_password(Request $request){
        dd($request->all());
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function user_dashboard(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $request = Request::capture();
        $metadata = json_decode($this->user_services->get_metadata($request),true);
        $user_data = session('user_data');
        $this->log_activity_services->add_activity();
        return view('pages.user.dashboard',compact('user_data','metadata'));
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function user_activities(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $user_data = session('user_data');
        $activities = $user_data->activities()->get();
        $this->log_activity_services->add_activity();
        return view('pages.user.activities',compact('activities','user_data'));
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function user_edit_profile(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $this->log_activity_services->add_activity();
        $user_data = session('user_data');
        return view('pages.user.profile-edit ',compact('user_data'));
    }



    /**
     * @param UserUpdateRequest $request
     * @return RedirectResponse
     */
    public function user_edit_profile_store(UserUpdateRequest $request): RedirectResponse
    {
        $res = $this->user_services->update_user($request);
        $this->log_activity_services->add_activity();
        if($res){
            return redirect()->route('user_edit')->with('success', 'Your profile update Successfully');
        }
        return redirect()->route('user_edit')->with('error', 'Your profile Not update please try again after few time');
    }



    public function logout(){
        $this->log_activity_services->add_activity();
        session()->flush();
        return redirect()->route('user_login')->with('success','You logout successfully');
    }

}
