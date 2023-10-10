<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function save(Request $request){

        $validator = Validator::make($request->all(),[
            'cname' => 'required',
        ]);

        if($validator->fails()){
            return back()->with('status', 'Someting went wrong!');
        }else {
            Category::create([
                'user_id'=> auth()->user()->id,
                'cname' => $request->cname
            ]);
        }

        return redirect(route('category.all'))->with('status', 'Category Created Successfully');
    }

    public function create(){
        return view('categories.create');
    }

    public function allCategories(){

        $category = Category::where('user_id', Auth::user()->id)->get();
        return view('categories.all', compact('category'));
    }


    public function edit($categoryID){
        $category = Category::findOrFail($categoryID);
        return view('categories.edit', compact('category'));
    }

    public function update($categoryID, Request $request){
        Category::findOrFail($categoryID)->update($request->all());

        return redirect(route('category.all'))->with('status', 'Category Updated Successfully');
    }


    public function delete($categoryID){
        Category::findOrFail($categoryID)->delete();
        return redirect(route('category.all'));

    }


}
