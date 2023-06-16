<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentLoginController extends Controller
{
    public function index(){
        return view('agentAuth.login');
    }

    // public function agentDashboard(){
    //     return view('agent.dashboard');
    // }

    public function agentLogin(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // die;
        $check = Admin::where('email',$request->email)->where('type',1)->first();
        if ($check && Hash::check($request->password, $check->password)) {
            $request->session()->put('agent_id', $check->id);
             $request->session()->put('agent', $check->email);
            // Session::put('user_name', $check->email);
            return redirect()->route('agent.dashboard')->with('msg','You have Successfully Login...');

        } else {
            return redirect()->route('agent.login')->with('msg','Oppes! You have entered invalid credentials');
        }
    }
}
