<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function sign_in(){
        return view('auth.login');
    }

    public function adminLogin(Request $request){
        $check = Admin::where('email',$request->email)->where('type',0)->first();
        if ($check && Hash::check($request->password, $check->password)) {
             $request->session()->put('user_name', $check->email);
            // Session::put('user_name', $check->email);
            return redirect()->route('admin.dashboard')->with('msg','You have Successfully Login...');

        } else {
            return redirect()->route('login')->with('msg','Oppes! You have entered invalid credentials');
        }
    }
}
