<?php
namespace App\Services;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Jenssegers\Agent\Agent;

class LogActivityServices{

    /**
     * @return bool
     */
    public function add_activity(): bool
    {
        $request = Request::capture();
        $route = Route::current();
        $routeName = $route->getName();
        $login_status = session('login_status');

        try {
            if ($login_status === 'user'){
                $user_data = session('user_data');
            }else{
                $user_data = session('company_data');
            }

            $user_data->activities()->create([
                'subject' => $routeName,
                'request_url' => $request->url(),
                'request_method' => $request->method(),
                'ip' => $request->ip(),
                'metadata' => $this->get_metadata($request),
                'User_Agent' => $request->userAgent(),
            ]);

            return true;
        }catch (\Exception $e){
            return false;
        }
    }


    /**
     * @param $request
     * @return false|string
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
