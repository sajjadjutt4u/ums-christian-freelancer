<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRegisterRequest;
use App\Http\Requests\LoginCompanyRequest;
use App\Models\Company;
use App\Services\CompanyServices;
use App\Services\LogActivityServices;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $company_services;
    private $log_activity_services;

    public function __construct(CompanyServices $company_services , LogActivityServices $log_activity_services)
    {
        $this->company_services = $company_services;
        $this->log_activity_services = $log_activity_services;
    }

    public function login_view(){
        return view('pages.company.auth.login');
    }

    public function register_view(){
        return view('pages.company.auth.register');
    }

    public function forgot_password_view(){
        return view('pages.company.auth.forgot-password');
    }

    public function company_store(CompanyRegisterRequest $request): \Illuminate\Http\RedirectResponse
    {
        try {
            $this->company_services->add_company($request);
            $this->log_activity_services->add_activity();
            return redirect()->route('company_dashboard')->with('success', 'Your Account Register Successfully');
        }catch (\Exception $e){
            return redirect()->route('company_register')->with('error', $e->getMessage());
        }


    }

    public function company_login(LoginCompanyRequest $request): \Illuminate\Http\RedirectResponse
    {
        $company = Company::where('email',$request['email'])->first();
        session(['login_status' => 'company']);
        session(['company_data' => $company]);
        $this->log_activity_services->add_activity();
        return redirect()->route('company_dashboard')->with('success', 'Your are Login Successfully');
    }

    public function forgot_password(Request $request){
        dd($request->all());
    }

    public function company_dashboard()
    {
        $request = Request::capture();
        $metadata = json_decode($this->company_services->get_metadata($request),true);
        $user_data = session('company_data');
        $this->log_activity_services->add_activity();
        return view('pages.company.dashboard',compact('metadata','user_data'));
    }

    public function company_activities()
    {
        $user_data = session('company_data');
        $activities = $user_data->activities()->get();
        $this->log_activity_services->add_activity();
        return view('pages.company.activities',compact('user_data','activities'));
    }

    public function company_edit_profile(){
        $user_data = session('company_data');

        // Extract the filename from the path
        $filename = pathinfo($user_data['docs'],PATHINFO_BASENAME);

        $docs_path_to_file = public_path('docs/companies/'.$filename);
//        $docs_path_to_file = public_path(str_replace("\\",'/',$user_data['docs'])) ;

//        dd($docs_path_to_file);

        //set the "contecnt-Dispositions" header to force download
        $headers = [
            'Content-Disposition' => 'attachment; filename"'.$filename.'"',
            'Content-Type' => 'application/pdf'
        ];

        $docs = Response::file($docs_path_to_file,$headers);

//        dd($docs);

        return view('pages.company.profile-edit',compact('user_data','docs'));
    }

    public function company_edit_profile_store(Request $request){
        dd($request->all());
    }

    public function update_login_info($company_data,$request){

    }
}
