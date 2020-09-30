<?php

namespace App\Http\Controllers;

use App\Permission;
use App\Role;
use DB;
use Alert;
use Auth;
use App\Permission_role;
use App\Role_user;
use App\Permission_user;
use App\User;
use App\vw_user_details;
use Illuminate\Http\Request;

class RoleController extends Controller
{


public function manage_roles(Request $request)
    {
     $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;

  if($user->hasRole('admin'))
        {
          $profile_info = "";
//        $roles = Role::orderBy('id', 'DESC')->paginate(100);
        $roles = Role::orderBy('id', 'DSC')->get();
        return view('roles.manage_roles', compact('roles', 'profile_info'))->with('i');
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }




    public function create_role()
    {
     $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
$profile_info = "";
    if($user->hasRole('admin'))
      {
        $permission = Permission::get();

        return view('roles.create_role', compact('permission', 'profile_info'));
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }



    public function store_role(Request $request)
    {
        
       $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
   $profile_info ="";
     if($user->hasRole('admin'))
         {
         //  dd($request->all());
        $this->validate($request, [
            'name'         => 'required|unique:roles,name',
            'display_name' => 'required',
            'description'  => 'required',
            'permission'   => 'required',
        ]);

        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect('manage_roles')->with('success', 'Role created successfully');
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }



    public function view_role($id)
         {
           $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
   

  if($user->hasRole('admin'))
     {
$profile_info = "";
        $role = Role::find($id);
        $rolePermissions = Permission::join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
            ->where('permission_role.role_id', $id)
            ->get();
     $check_role_user = Role_user::where('role_id', $id)->exists();  //check if the role has been assigned to users

        return view('roles.view_role', compact('role', 'rolePermissions', 'check_role_user', 'profile_info'));
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }



    public function edit_role($id)
        {
$profile_info = "";
    $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
    
        $role = Role::find($id);

    if(($user->hasRole('admin')) && ($role->default_role==0))
        {
        $permission = Permission::get();
        $rolePermissions = DB::table('permission_role')->where('permission_role.role_id', $id)
            ->pluck('permission_role.permission_id', 'permission_role.permission_id')->toArray();

        return view('roles.edit_role', compact('role', 'permission', 'rolePermissions','profile_info'));
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }



    public function store_updated_role(Request $request, $id)
            {
$profile_info = "";
     $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
    
        $this->validate($request, [
            'name'         => 'required',
            'display_name' => 'required',
            'description'  => 'required',
            'permission'   => 'required',
        ]);

        $role = Role::find($id);
    if(($user->hasRole('admin')) && ($role->default_role==0))
        {
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();

        DB::table('permission_role')->where('permission_role.role_id', $id)
            ->delete();

        foreach ($request->input('permission') as $key => $value) {
            $role->attachPermission($value);
        }

        return redirect('view_role/'.$id)->with('success', 'Role updated successfully');
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }


    public function delete_role($id)
    {
      $profile_info= "";
     $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
   
    $role = Role::find($id);

  $check_role_user = Role_user::where('role_id', $id)->exists();  //check if the role has been assigned to users

     if(($user->hasRole('admin')) && ($role->default_role==0) &&  ($check_role_user === false))
        {
        DB::table('permission_role')->where('permission_role.role_id', $id)
            ->delete();
        DB::table('roles')->where('id', $id)->delete();
        
        Alert::success('Successfully Deleted')->autoclose(3000);
        return redirect('manage_roles')->with('success', 'Role deleted successfully');
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }


///////////////////////////////GIVING SOME USERS SPECIAL PERMISSIONS///////////////////////////////////////////////////////
 public function assign_permissions_to_user($id)
        {
$profile_info = "";
    $user = \Auth::user(); //note the user that logs in
    $loggedin_user_id = Auth::user()->id;
    $profile_info = "";

    if($user->hasRole('admin')) 
              {  
        $user_details =vw_user_details::where('id', $id)->first();

        $main_role_id= $user_details->main_role_id;

        $role = Role::find($main_role_id);

        $rolePermissions = Permission::join('permission_role', 'permission_role.permission_id', '=', 'permissions.id')
        ->where('permission_role.role_id', $main_role_id)
        ->get();

        $userPermissions = Permission::join('permission_user', 'permission_user.permission_id', '=', 'permissions.id')
        ->where('permission_user.user_id', $id)
        ->get();


        $permission = Permission::get();
        $PermissionsUser = DB::table('permission_user')->where('permission_user.user_id', $id)
            ->pluck('permission_user.permission_id', 'permission_user.permission_id')->toArray();

        return view('roles.assign_permissions_to_user', compact('user_details', 'permission', 'PermissionsUser', 'role', 'rolePermissions', 'userPermissions', 'profile_info'));
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }



    public function store_assign_permissions_to_user(Request $request, $id)
            {
     $user = \Auth::user(); //note the user that logs in
     $loggedin_user_id = Auth::user()->id;
$profile_info = "";
    if($user->hasRole('admin'))
      {
      
    DB::table('permission_user')->where('permission_user.user_id', $id)
    ->delete();

if ($request->has('permission')){ //check if any permission checkbox is checked
        $get_permissions = $request->permission; //get all the newly assigned permissions
        foreach ($get_permissions as $get_permission) {
        $assign_permissions_to_user =  new Permission_user();
        $assign_permissions_to_user->user_id = $id;
        $assign_permissions_to_user->permission_id = $get_permission;
        $assign_permissions_to_user->team_id = 1;
        $assign_permissions_to_user->user_type = 'App\User';
        $assign_permissions_to_user->save();
        }
    }
        return redirect('assign_permissions_to_user/'.$id)->with('success', 'User Permissions updated successfully');
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }


 public function users_with_special_permissions()
        {
$profile_info = "";
    $user = \Auth::user(); //note the user that logs in
    $loggedin_user_id = Auth::user()->id;
    $profile_info ="";
    if($user->hasRole('admin')) 
              {  
        $users =  DB::table('vw_permission_user')
           ->select('id', 'sap', 'name', 'email')
            ->groupBy('id')          
            ->groupBy('sap')          
            ->groupBy('name')                        
            ->groupBy('email')                
            ->orderBy('name', 'asc')      
            ->get();

        return view('users.users_with_special_permissions', compact('users', 'profile_info'));
         }
       else{
          return view('errors.403', compact('profile_info'));
        }
    }

//////////////////////////////////////////////////////////////////////////////////////



//////END//////////////////////////////////////////////////
}
