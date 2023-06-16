<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mobile_number' => 'required|digits:10',
            ],
        );
        $user = User::where('mobile_number', $request->mobile_number)->first();
        if ($user) {
            $user->login_otp = 123456;
            $user->update();
            return response()->json(['result' => $request->mobile_number . ' OTP Successfully Send', 'status_code' => 'true']);
        } else {
            return response()->json(['result' => $request->mobile_number . ' Not Registered', 'status_code' => 'false']);
        }
    }

    public function verify_otp(Request $request){
        $otp = $request->otp1.''.$request->otp2.''.$request->otp3.''.$request->otp4.''.$request->otp5.''.$request->otp6;
        $user = User::where('mobile_number', $request->mobile_number)->first();
        $user = User::where('mobile_number', $request->mobile_number)->first();
        if ($user) {
            if($user['login_otp'] == $otp){
                $user->login_otp = NULL;
                $user->update();
                return response()->json(['result' => 'Successfully Login', 'response'=>$user, 'status_code' => 'true']);
            }else{
                return response()->json(['result' => 'OTP Wrong', 'status_code' => 'false']);
            }
           
        } else {
            return response()->json(['result' => $request->mobile_number . ' Not Registered', 'status_code' => 'false']);
        }
    }
}
