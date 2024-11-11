<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;


class PermissionController extends Controller
{
    //This methhod will return all permissions
    public function index(){

    }
 //This method will  show create  permission page
 public function create()
{
    return view('permissions.create');

}

    //This method will insert  permission in DB
    public function store(Request $request){

        $validator =  Validator:: make($request->all(),[
            'name' => 'required|unique:permissions|min:5',
        ]);
        if($validator->passes()){
        }else{
            return redirect()->route('permissions.create')->withErrors($validator)->withInput();
        }
    }
    //This method will show edit permission page
    public function edit(){

    }
    //This method will update a permission
    public function update(){

    }
    //This method will delete  a permission in DB
    public function destroy(){

    }
}

