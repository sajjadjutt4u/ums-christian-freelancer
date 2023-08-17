<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRegisterRequest;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\LoginCompanyRequest;
use App\Models\Company;
use App\Services\CompanyServices;
use App\Services\LogActivityServices;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private CompanyServices $company_services;
    private LogActivityServices $log_activity_services;

    public function __construct(CompanyServices $company_services , LogActivityServices $log_activity_services)
    {
        $this->company_services = $company_services;
        $this->log_activity_services = $log_activity_services;
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function login_view(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.company.auth.login');
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function register_view(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.company.auth.register');
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function forgot_password_view(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        return view('pages.company.auth.forgot-password');
    }


    /**
     * @param CompanyRegisterRequest $request
     * @return RedirectResponse
     */
    public function company_store(CompanyRegisterRequest $request): RedirectResponse
    {
        try {
            $this->company_services->add_company($request);
            $this->log_activity_services->add_activity();
            return redirect()->route('company_dashboard')->with('success', 'Your Account Register Successfully');
        }catch (\Exception $e){
            \Log::info($e->getMessage());
            \Log::info($e->getTraceAsString());
            return redirect()->route('company_register')->with('error', $e->getMessage());
        }


    }


    /**
     * @param LoginCompanyRequest $request
     * @return RedirectResponse
     */
    public function company_login(LoginCompanyRequest $request): RedirectResponse
    {
        $company = Company::where('email',$request['email'])->first();
        session(['login_status' => 'company']);
        session(['company_data' => $company]);
        $this->log_activity_services->add_activity();
        return redirect()->route('company_dashboard')->with('success', 'You are Login Successfully');
    }


    public function forgot_password(Request $request){
        dd($request->all());
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function company_dashboard(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $request = Request::capture();
        $metadata = json_decode($this->company_services->get_metadata($request),true);
        $user_data = session('company_data');
        $this->log_activity_services->add_activity();
        return view('pages.company.dashboard',compact('metadata','user_data'));
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function company_activities(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        $user_data = session('company_data');
        $activities = $user_data->activities()->get();
        $this->log_activity_services->add_activity();
        return view('pages.company.activities',compact('user_data','activities'));
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function company_edit_profile(): \Illuminate\Foundation\Application|View|Factory|Application
    {

        $user_data = session('company_data');
        $this->log_activity_services->add_activity();
        return view('pages.company.profile-edit',compact('user_data'));
    }


    /**
     * @param CompanyUpdateRequest $request
     * @return RedirectResponse
     */
    public function company_edit_profile_store(CompanyUpdateRequest $request): RedirectResponse
    {
        $res = $this->company_services->update_company($request);
        $this->log_activity_services->add_activity();
        if ($res){
            return redirect()->route('company_edit')->with('success', 'Your profile update Successfully');
        }
        return redirect()->route('company_edit')->with('error', 'Your profile Not update please try again after few time');
    }

    public function update_login_info($company_data,$request){

    }
}
