<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserLoan;
use Illuminate\Http\Request;

class AgentDataConroller extends Controller
{

    public function agentDashboard(){
        return view('agent.dashboard');
    }

    public function index(){
        $data['users'] = User::join('user_loans','user_loans.user_id','=','users.id')->join('loan_categories','loan_categories.id','=','user_loans.category_id')->join('user_documents','user_documents.user_id','=','users.id')->select('users.*','user_loans.user_id','user_loans.category_id','user_loans.tenure','user_loans.amount','user_loans.payment_mode','user_loans.loan_status','loan_categories.category_name','user_documents.aadhar_front','user_documents.aadhar_back','user_documents.pan_card')->where('users.agent_id',session()->get('agent_id'))->get();

        return view('agent.users',$data);
    }

    public function viewUser($id){
        $data['users']  = User::join('user_loans','user_loans.user_id','=','users.id')->join('loan_categories','loan_categories.id','=','user_loans.category_id')->join('user_documents','user_documents.user_id','=','users.id')->select('users.*','user_loans.*','loan_categories.category_name','user_documents.*')->where('users.id',$id)->get();
        
        return view('agent.user-view',$data);
    }

    public function statusUpdate(Request $request){
        $statusUpdate = UserLoan::where('user_id',$request->id)->first();
        $statusUpdate->loan_status = $request->status;
        $statusUpdate->update();
        return redirect()->route('users')->with('msg', $statusUpdate->status . ' Status have been Successfully.');
    }
}
