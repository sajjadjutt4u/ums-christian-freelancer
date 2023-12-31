<?php

namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Mockery\Exception;

class CompanyServices{


    /**
     * @param $request
     * @return bool
     */
    public function add_company($request): bool
    {
        $data = $request->all();

        $state = $this->verify_state($data);
        $company = company::create([
            'name'                      => $data['name'],
            'owner_name'                => $data['owner_name'],
            'email'                     => $data['email'],
            'password'                  => $data['password'],
            'address'                   => $data['address'],
            'city'                      => $data['city'],
            'country'                   => $data['country'],
            'industry'                  => $data['industry'],
            'state'                     => $state,
            'phone'                     =>array_key_exists('phone',$data) ? $data['phone'] : null,
            'description'               =>array_key_exists('description',$data) ? $data['description'] : null,
            'website_url'               =>array_key_exists('website_url',$data) ? $data['website_url'] : null,
            'docs'                      =>array_key_exists('docs',$data) ? $this->get_docs_path($data['docs']) : null,
            'last_login_ip'             =>$request->ip(),
            'last_login_time'           =>Carbon::now(),
            'last_login_metadata'       =>$this->get_metadata($request),
        ]);

        session(['login_status' => 'company']);
        session(['company_data' => $company]);

        return true;
    }


    /**
     * @param $request
     * @return false
     */
    public function update_company($request): bool
    {
        try {
            $data = $request->all();
            $user_data = session('company_data');
            $state = 'guest';
            if ($data['website_url'] != null && $user_data['docs']){
                $state = 'unverified';
            }
            $res = $user_data->update([
                'name'                      => $data['name'],
                'owner_name'                => $data['owner_name'],
                'email'                     => $data['email'],
                'password'                  => $data['password'] ?? $user_data['password'],
                'address'                   => $data['address'],
                'city'                      => $data['city'],
                'country'                   => $data['country'],
                'industry'                  => $data['industry'],
                'state'                     => $state,
                'phone'                     =>array_key_exists('phone',$data) ? $data['phone'] : null,
                'description'               =>array_key_exists('description',$data) ? $data['description'] : null,
                'website_url'               =>array_key_exists('website_url',$data) ? $data['website_url'] : null,
            ]);

            if ($res){
                $company = Company::where('id',$user_data['id'])->first();
                session(['company_data' => $company]);
            }

            return $res;
        }catch (Exception $e){
                return false;
        }
    }


    /**
     * @param $data
     * @return string
     */
    public function verify_state($data): string
    {
        $state = 'guest';

        if (isset($data['docs'] , $data['website_url'])){
            $state = 'unverified';
        }

        return $state;
    }


    /**
     * @param $cv_detail
     * @return string
     */
    public function get_docs_path($cv_detail): string
    {
        $upload_path = 'docs/companies';
        $num = rand(1,50);
        $extension = $cv_detail->getClientOriginalExtension();
        $file_name = time().$num.'.'.$extension;
        $cv_detail->move(public_path($upload_path),$file_name);
        return $upload_path.'/'.$file_name;
    }


    /**
     * @param $request
     * @return bool|string
     */
    public function get_metadata($request): bool|string
    {
        $agent = new Agent();

        $user_agent_data = [
            'browser' => $agent->browser(),
            'platform' => $agent->platform(),
            'device' => $agent->device(),
            'ip' => $request->ip(),
        ];

        return json_encode($user_agent_data);
    }
}
