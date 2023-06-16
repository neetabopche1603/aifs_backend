<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function userprofileUpdate(Request $request)
    {

        $validator = Validator::make(
            $request->all(),

            [
                'avatar' => 'required|image|mimes:jpeg,png,jpg,svg|max:512',
                'first_name' => 'required',
                'last_name' => 'required',
                'gender' => 'required',
                'mobile_number' => 'required|digits:10',
                'dob' => 'required',
            ],
            [
                // 'product_name.required' => 'Please Type Valid Name',
                // 'emp_id.required' => 'Please Type Valid City',
                // 'emp_id.required' => 'Please Type Valid Email Id',
                // 'emp_id.unique' => 'This Email Already Exiest.',
                // 'password.required' => 'Please mix 6 max 8 Charactor'
            ]
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status_code' => 'false']);
        }

        $userprofileUpdate = User::find($request->id);

        if ($request->hasfile('avatar')) {
            $avatar = time() . '-' . rand(1111, 9999) . '.' . $request->file('avatar')->extension();
            $request->file('avatar')->move(public_path() . '/user_images', $avatar);
            // $req->file('aadhar_front')->store('user_documents');
            $userprofileUpdate->avatar = $avatar;
        }

        $userprofileUpdate->first_name = $request->first_name;
        $userprofileUpdate->last_name = $request->last_name;
        $userprofileUpdate->gender = $request->gender;
        $userprofileUpdate->dob = $request->dob;
        // $userotp->aadhar_no = $request->aadhar_no;
        // $userotp->pan_no = $request->pan_no;
        $userprofileUpdate->mobile_number = $request->mobile_number;
        $result = $userprofileUpdate->update();

        if ($result) {
            return response()->json(['result' => 'Profile Uploaded', 'status_code' => 'true']);
        } else {
            return response()->json(['result' => 'Profile Uploadation Faild!', 'status_code' => 'false']);
        }
    }

    public function kycDocument(Request $request){
        $validator = Validator::make(
        $request->all(),

        [
            'aadhar_no'=>'required',
            'pan_no'=>'required',
            'bank_name'=>'required',
            'account_holder_name'=>'required',
            'account_number'=>'required',
            'ifsc_code'=>'required'
        ]);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()->all(), 'status_code' => 'false']);
    }

        $kyc = User::find($request->id);

        $kyc->aadhar_no = $request->aadhar_no;
        $kyc->pan_no = $request->pan_no;
        $kyc->bank_name = $request->bank_name;
        $kyc->account_holder_name = $request->account_holder_name;
        $kyc->account_number = $request->account_number;
        $kyc->ifsc_code = $request->ifsc_code;
       $result = $kyc->update();
       if ($result) {
        return response()->json(['result' => 'KYC Updated', 'status_code' => 'true']);
    } else {
        return response()->json(['result' => 'KYC Updated Faild!', 'status_code' => 'false']);
    }

    }
}
