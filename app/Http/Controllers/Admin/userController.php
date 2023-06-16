<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){
        return view('admin.users-tbl');
    }

    public function userData(){

        $users = User::join('user_loans','user_loans.user_id','=','users.id')->join('loan_categories','loan_categories.id','=','user_loans.category_id')->select('users.*','user_loans.amount','user_loans.tenure','loan_categories.category_name')->where('users.agent_id',NULL)->get();
        $agents = Admin::where('type',1)->get();
        $data = compact('users','agents');
        return view('admin.users-tbl')->with($data);
    }

    public function userView($id){
        $data['users'] =  $users = User::join('user_loans','user_loans.user_id','=','users.id')->join('loan_categories','loan_categories.id','=','user_loans.category_id')->join('user_documents','user_documents.user_id','=','users.id')->select('users.*','user_loans.*','loan_categories.category_name','user_documents.*')->where('users.id',$id)->get();
        
        return view('admin.user-view',$data);
    }

    public function userdelete($uid){
        $deleteCategory = User::find($uid)->delete();
        return redirect('user')->with('deleteMsg', ' User Successfully Deleted.');
    }



}
