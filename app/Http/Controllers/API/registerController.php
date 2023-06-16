<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\LoanCategory;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\UserLoan;
use App\Models\UserOtp;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class registerController extends Controller
{
    public function register(Request $req)
    {
        $validator = Validator::make(
            $req->all(),

            [
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
        $checkmobile = UserOtp::where('mobile_number',$req->mobile_number)->first();
        

        if($checkmobile){
            $otp_count_increment = $checkmobile->otp_count + 1;
            $checkmobile->otp = 123456;
            $checkmobile->otp_count = $otp_count_increment;
            $checkmobile->update();

        }else{

            $userotp = new UserOtp;
            $userotp->first_name = $req->first_name;
            $userotp->last_name = $req->last_name;
            $userotp->gender = $req->gender;
            $userotp->dob = $req->dob;
            // $userotp->aadhar_no = $req->aadhar_no;
            // $userotp->pan_no = $req->pan_no;
            $userotp->mobile_number = $req->mobile_number;
            $userotp->otp = 123456;
            // rand(1111,9999)
            $userotp->otp_count = 0;
            $userotp->save();
        }
      
        return response()->json(['result' => $req->mobile_number . ' OTP Successfully Send', 'status_code' => 'true']);
    }

    public function verify_otp(Request $req)
    {
        // $find_user = UserOtp::find($req->mobile_number);
        $otp = $req->otp1.''.$req->otp2.''.$req->otp3.''.$req->otp4.''.$req->otp5.''.$req->otp6;
        $verify_otp = UserOtp::where('otp', $otp)->where('mobile_number', $req->mobile_number)->first();
        if ($verify_otp) {
            $user = new User;
            $user->first_name = $verify_otp->first_name;
            $user->last_name = $verify_otp->last_name;
            $user->gender = $verify_otp->gender;
            $user->dob = $verify_otp->dob;
            $user->mobile_number = $verify_otp->mobile_number;
            $user->mobile_verified_at = Carbon::now();
            $user->save();
            $verify_otp->delete();
            return response()->json(['result' => $req->mobile_number . ' OTP Successfully verify', 'user_id' => $user->id, 'status_code' => 'true']);
        } else {
            return response()->json(['result' => $req->mobile_number . ' OTP verification Faild!', 'status_code' => 'false']);
        }
    }

    public function loan_categories()
    {
        $loan_category = LoanCategory::select('id', 'category_name')->get();

        if (count($loan_category) != 0) {
            return response()->json(['result' => $loan_category, 'status_code' => 'true']);
        } else {
            return response()->json(['result' => 'No Category Found!', 'status_code' => 'false']);
        }
    }

    public function loan_data(Request $req)
    {

        $loan_data = new UserLoan;
        $loan_data->user_id = $req->user_id;
        $loan_data->category_id = $req->category_id;
        $loan_data->tenure = $req->tenure;
        $loan_data->amount = $req->amount;
        $loan_data->payment_mode = $req->payment_mode;
        $result = $loan_data->save();


        if ($result) {
            return response()->json(['result' => 'Loan Data Successfully...', 'status_code' => 'true']);
        } else {
            return response()->json(['result' => 'Loan Data Not Saved!', 'status_code' => 'false']);
        }
    }

    public function aadhar_upload(Request $req)
    {

        $validator = Validator::make(
            $req->all(),

            [
                'aadhar_front' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'aadhar_back' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'aadhar_no' => 'required|min:12|max:12',
            ],
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status_code' => 'false']);
        }

        $aadhar_no = User::find($req->user_id);
        $aadhar_doc = new UserDocument;
        $aadhar_doc->user_id = $req->user_id;
        

        if ($req->hasfile('aadhar_front')) {
            $aadhar_front = time() . '-' . rand(1111, 9999) . '.' . $req->file('aadhar_front')->extension();
            $req->file('aadhar_front')->move(public_path() . '/user_documents/', $aadhar_front);
            // $req->file('aadhar_front')->store('user_documents');
            $aadhar_doc->aadhar_front = $aadhar_front;
        }
        if ($req->hasfile('aadhar_back')) {
            $aadhar_back = time() . '-' . rand(1111, 9999) . '.' . $req->file('aadhar_back')->extension();
            $req->file('aadhar_back')->move(public_path() . '/user_documents/', $aadhar_back);
            // $req->file('aadhar_back')->store('user_documents');
            $aadhar_doc->aadhar_back = $aadhar_back;
        }

        // $aadhar_no = User::find($req->user_id);
        $aadhar_no->avatar = 'avatar.jpg';
        $aadhar_no->aadhar_no = $req->aadhar_no;
        $aadhar_no->update();
        $result =  $aadhar_doc->save();
        if ($result) {
            return response()->json(['result' => 'Aadhar Card Uploaded', 'status_code' => 'true']);
        } else {
            return response()->json(['result' => 'Addhar Uploadation Faild!', 'status_code' => 'false']);
        }
    }

    public function pan_upload(Request $req)
    {

        $validator = Validator::make(
            $req->all(),

            [
                'pan_card' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
                'pan_no' => 'required|min:10|max:10',
            ],
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status_code' => 'false']);
        }

        $pan_doc = UserDocument::where('user_id', $req->user_id)->first();

        if ($req->hasfile('pan_card')) {
            $pan_card = time() . '-' . rand(1111, 9999) . '.' . $req->file('pan_card')->extension();
            $req->file('pan_card')->move(public_path() . '/user_documents/', $pan_card);
            // $req->file('aadhar_front')->store('user_documents');
            $pan_doc->pan_card = $pan_card;
        }
        $pan_no = User::find($req->user_id);
        $pan_no->pan_no = $req->pan_no;
        $pan_no->update();

        $result =  $pan_doc->update();
        if ($result) {
            return response()->json(['result' => 'Pan Card Saved', 'status_code' => 'true']);
        } else {
            return response()->json(['result' => 'Pan Not Card Saved!', 'status_code' => 'false']);
        }
    }

    public function back_details(Request $req)
    {

        $validator = Validator::make(
            $req->all(),

            [
                'bank_name' => 'required',
                'account_holder_name' => 'required',
                'account_number' => 'required',
                'confirm_account_number' => 'required|same:account_number',
                'ifsc_code' => 'required',
            ],
        );

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all(), 'status_code' => 'false']);
        }

        $bank_data = User::find($req->user_id);
        $bank_data->bank_name = $req->bank_name;
        $bank_data->account_holder_name = $req->account_holder_name;
        $bank_data->account_number = $req->account_number;
        $bank_data->ifsc_code = $req->ifsc_code;
        $result = $bank_data->update();

        if ($result) {
            return response()->json(['result' => 'Bank Details Saved', 'status_code' => 'true']);
        } else {
            return response()->json(['result' => 'Bank Not Details Saved!', 'status_code' => 'false']);
        }
    }
}
