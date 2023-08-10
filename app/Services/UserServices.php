<?php
 namespace App\Services;


use App\Models\User;
use Carbon\Carbon;
use Jenssegers\Agent\Agent;
use Mockery\Exception;
use Illuminate\Support\Facades\Storage;

class UserServices{

    public function add_user($request){
        $data = $request->all();

        $state = $this->verify_state($data);
        $user = User::create([
            'name'                      => $data['name'],
            'email'                     => $data['email'],
            'password'                  => $data['password'],
            'address'                   => $data['address'],
            'state'                     => $state,
            'phone'                     =>array_key_exists('phone',$data) ? $data['phone'] : null,
            'description'               =>array_key_exists('description',$data) ? $data['description'] : null,
            'personal_image'            =>array_key_exists('personal_image',$data) ? $this->get_image_path($data['personal_image']) : null,
            'business_image'            =>array_key_exists('business_image',$data) ? $this->get_image_path($data['business_image']) : null,
            'cnic_front_image'          =>array_key_exists('cnic_front_image',$data) ? $this->get_image_path($data['cnic_front_image']) : null,
            'cnic_back_image'           =>array_key_exists('cnic_back_image',$data) ? $this->get_image_path($data['cnic_back_image']) : null,
            'cv'                        =>array_key_exists('cv',$data) ? $this->get_cv_docs_path($data['cv']) : null,
            'last_login_ip'             =>$request->ip(),
            'last_login_time'           =>Carbon::now(),
            'last_login_metadata'       =>$this->get_metadata($request),
        ]);

        session(['login_status' => 'user']);
        session(['user_data' => $user]);

        return true;
    }

    public function verify_state($data){
        $state = 'guest';

        if (isset($data['personal_image'] , $data['personal_image'] , $data['cnic_front_image'] , $data['cnic_back_image'] , $data['cv'])){
            $state = 'unverified';
        }

        return $state;
    }

    public function get_image_path($image_detail){
        $upload_path = '/images/users';
        $num = rand(1,50);
        $extension = $image_detail->getClientOriginalExtension();
        $file_name = time().$num.'.'.$extension;
        $image_detail->move(public_path($upload_path),$file_name);
        $final_path_name = $upload_path.'/'.$file_name;

        return $final_path_name;
    }

    public function get_cv_docs_path($cv_detail){
        $upload_path = 'docs/users';
        $num = rand(1,50);
        $extension = $cv_detail->getClientOriginalExtension();
        $file_name = time().$num.'.'.$extension;
        $cv_detail->move(public_path($upload_path),$file_name);
        $final_path_name = $upload_path.'/'.$file_name;

        return $final_path_name;
    }

    public function get_metadata($request){
        $agent = new Agent();

        $user_agent_data = [
            'browser' => $agent->browser(),
            'platform' => $agent->platform(),
            'device' => $agent->device(),
            'ip' => $request->ip(),
        ];

        return json_encode($user_agent_data);
    }

    public function get_system_name(): bool|string
    {
        $agent = new Agent();
        return $agent->device();
    }
}
