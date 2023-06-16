<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use App\Models\UserLoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function index()
    {
       
        $agent = Admin::where('type',1)->get();
        return view('admin.agent', compact('agent'));
    }

    public function agentFrom()
    {
        return view('admin.add-agent');
    }

    public function insertAgent(Request $request)
    {
        // echo "<pre>";
        // print_r($request->all()); 
        // die;
        // echo "</pre>";

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|unique:admins',
                'password' => 'required|min:6|max:8',
                'password_confirm' => 'required|same:password',
                // 'image' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            ],
        );

        if ($validator->fails()) {
            return redirect('admin/add-agent')
                ->withErrors($validator)
                ->withInput();
        }

        $agent = new Admin;
        $agent->name = $request->name;
        $agent->email = $request->email;
        $agent->password = Hash::make($request->password);

        if ($request->file('image')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
                ],
            );

            if ($validator->fails()) {
                return redirect('admin/add-agent')
                    ->withErrors($validator)
                    ->withInput();
            }
            $image = time() . '-' . rand(1111, 9999) . '.' . $request->file('image')->extension();
            $request->file('image')->move(public_path() . '/agent_img/', $image);
            // $req->file('aadhar_front')->store('user_documents');
            $agent->image = $image;
        }
         else {
            $agent->image = 'agent.jpg';
        }
        $agent->save();
        return redirect('basic/agent')->with('msg', $request->name . ' Agent Successfully Saved....');
    }

    public function agenteditForm($id){
        $agentData = Admin::find($id);
        $data = compact('agentData');
        return view('admin.edit-agent')->with($data);
    }

    public function editAgent(Request $request){
        $agent = Admin::find($request->id);
        $agent->name = $request->name;
        $agent->email = $request->email;
       
        if ($request->password != '') {
            $agent->password = Hash::make($request->password);
        }

        $agent->update();
        return redirect('basic/agent')->with('msg', $request->name . ' Agent Successfully Updated....');

    }
        public function agentBlock($id)
    {
        $agentBlock = Admin::find($id);
        $agentBlock->status = 0;
        $agentBlock->update();
        return redirect()->route('basic/agent')->with('faild',$agentBlock->name. ' Block Successfully.');
    }
    public function agentActive($id)
    {
        $agentActive = Admin::find($id);
        $agentActive->status = 1;
        $agentActive->update();
        return redirect()->route('basic/agent')->with('msg', $agentActive->name . ' Active Successfully.');
    }


    public function agentdelete($aid){
        $agentdelete = Admin::find($aid)->delete();
        return redirect('basic/agent')->with('deleteMsg',' Agent Successfully Deleted.');
    }

    // public function agentDashboard(){
    //     return view('agent.dashboard');
    // }

    public function assigendLead(){
        // $leads = User::join('admins','admins.id','=','users.agent_id')->join('')->select('users.*','admins.name')->whereNotNull('users.agent_id')->get();
        $leads = User::join('admins','admins.id','=','users.agent_id')->join('user_loans','user_loans.user_id','=','users.id')->join('loan_categories','loan_categories.id','=','user_loans.category_id')->select('users.*','user_loans.amount','user_loans.tenure','user_loans.loan_status','loan_categories.category_name','admins.name')->whereNotNull('users.agent_id')->orderBy('users.updated_at','DESC')->get();
        return view('admin.assigned-lead',compact('leads'));
    }


    public function leadAssign(Request $request){
        $ids = $request->ids;  
        $lead = User::whereIn('id',explode(",",$ids))->update([
            'agent_id'=>$request->agent_id
        ]);
        return response()->json(['success'=>"Lead successfully Assigned."]); 
    }

    public function filterStatus(){
        // $filterstatus = User::join()
        return view('admin.filter-status');
    }
}
