<?php

namespace App\Http\Controllers;


 use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;



class PermissionController extends Controller
{
    //This methhod will return all permissions
    public function index(){
        $permissions = Permission::orderBy('created_at','DESC')->paginate(5);
        return view('permissions.list',[
        'permissions' => $permissions

    ]);

    }
 //This method will  show create  permission page
 public function create()
{
    return view('permissions.create');

}

    //This method will insert  permission in DB
    public function store(Request $request) {

        $validator =  Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:5',
        ]);

        if ($validator->passes()) {
            Permission ::create(['name' => $request->name]);
   return redirect()->route('permissions.index')->with('success','Permission created successfully.');

         } else{
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
    }
    //This method will show edit permission page
    public function edit($id){
        $permission = Permission::findOrFail($id);
        return view('permissions.edit',[
            'permission' => $permission
        ]);

    }
    //This method will update a permission
    public function update($id, Request $request)
    {
        $permission = Permission::findOrFail($id);

        $validator =  Validator::make($request->all(),[
            'name' => 'required|unique:permissions|min:5,name,'.$id,'id'
        ]);

        if ($validator->passes()) {

            $permission->name = $request->name;
            $permission->save();
         return redirect()->route('permissions.index')->with('success','Permission updated successfully.');

         } else{
            return redirect()->route('permissions.edit',$id)->withInput()->withErrors($validator);
        }
    }
    //This method will delete  a permission in DB
    public function destroy(){

    }
}

