<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LoanCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index(){
        $categories = LoanCategory::all();
        return view('admin.category',compact('categories'));
    }

    public function addCategoryFrom(){
        return view('admin.add-category');
    }

    public function saveCategory(Request $request){

        $validator = Validator::make(
            $request->all(),
            [
                'category_name' => 'required',
            ],
            [
                'category_name.required' => 'Please Type Valid Category',
            ]
        );

        if ($validator->fails()) {
            return redirect('admin/add-category')
                ->withErrors($validator)
                ->withInput();
        }


        $category = new LoanCategory;
        $category->category_name = strtoupper($request->category_name);
        $category->save();
        return redirect('admin/category')->with('msg',$request->category_name.' Successfully Saved.');
    }

    public function editcategoryFrom($id){
        $category = LoanCategory::find($id);
        $data = compact('category');
        return view('admin.edit-category')->with($data);
    }

    public function editCategory(Request $request){
        $categories = LoanCategory::find($request->id);
        $categories->category_name =strtoupper($request->category_name);
        $categories->update();
        return redirect('admin/category')->with('msg', $request->category_name . '  Update Successfully Saved.');

    }

    public function deleteCategory($cid){
        $deleteCategory = LoanCategory::find($cid)->delete();
        return redirect('admin/category')->with('deleteMsg', ' Category Successfully Deleted.');
    }


}
