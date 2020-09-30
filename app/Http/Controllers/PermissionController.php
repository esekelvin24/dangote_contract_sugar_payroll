<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use Auth;
use DB;
use Alert;
use App\Permission_role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function manage_permissions(Request $request)
    {
          $user = \Auth::user(); //note the user that logs in
          $loggedin_user_id = Auth::user()->id;
          $profile_info = "";

        if($user->hasRole('admin'))
        {
         $permissions = Permission::orderBy('id', 'DSC')->get();

        return view('permissions.manage_permissions', compact('permissions', 'profile_info'))->with('i');
            }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }


    public function create_permission()
    {
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id;
        $profile_info = "";

          if($user->hasRole('admin'))
        {
        return view('permissions.create_permission', compact('profile_info'));
            }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }

    public function store_permission(Request $request)
    {
             $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
     $profile_info = "";

     if($user->hasRole('admin'))
         {
        $this->validate($request, [
            'name'         => 'required|unique:permissions,name',
            'display_name' => 'required',
            'description'  => 'required',
        ]);

        $permission = new Permission();
        $permission->name = $request->input('name');
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect('manage_permissions')->with('success', 'Permission created successfully');
             }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }

    public function view_permission($id)
    {
          $user = \Auth::user(); //note the user that logs in
         $loggedin_user_id = Auth::user()->id;
         $profile_info = "";
 
  if($user->hasRole('admin'))
         {
        $permission = Permission::findOrFail($id);
        $check_permission_role = Permission_role::where('permission_id', $id)->exists();  //check if the role has been assigned to users

        $rolePermissions = Role::join('permission_role', 'permission_role.role_id', '=', 'roles.id')
                                ->where('permission_role.permission_id', $id)
                                ->get();

        return view('permissions.view_permission', compact('permission', 'check_permission_role', 'rolePermissions', 'profile_info'));
             }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }

    public function edit_permission($id)
    {
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id;
        $profile_info = "";
        $permission = Permission::find($id);
  if($user->hasRole('admin'))
         {
        return view('permissions.edit_permission', compact('permission', 'profile_info'));
             }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }

    public function store_updated_permission(Request $request, $id)
    {
        $user = \Auth::user(); //note the user that logs in
         $loggedin_user_id = Auth::user()->id;
         $profile_info = "";

         if($user->hasRole('admin'))
         {
        $this->validate($request, [
            'display_name' => 'required',
            'description'  => 'required',
        ]);

        $permission = Permission::find($id);
        $permission->display_name = $request->input('display_name');
        $permission->description = $request->input('description');
        $permission->save();

        return redirect('view_permission/'.$id)->with('success', 'Permission updated successfully');
               }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }

    public function delete_permission($id)
    {
         $user = \Auth::user(); //note the user that logs in
         $loggedin_user_id = Auth::user()->id;
         $profile_info = "";

         if($user->hasRole('admin'))
         {
         $check_permission_role = Permission_role::where('permission_id', $id)->exists();  
        DB::table('permissions')->where('id', $id)->delete();
        Alert::success('Successfully Deleted')->autoclose(3000);
        return redirect('manage_permissions')->with('success', 'Permission deleted successfully');
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }


  ////////END////////////////////////////////////////////////////////////
}
