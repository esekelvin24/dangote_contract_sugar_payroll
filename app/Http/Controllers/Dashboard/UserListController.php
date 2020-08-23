<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\leftSideMenu;
use App\Model\Category_Menu_Header;
use App\Model\Staff\DepartmentModel;
use App\Http\Controllers\Utilities;
use DB;
use App\User;
use Auth;
use Hash;
use Alert;
use Session;


class UserListController extends Controller
{
    //
    public function index(Request $request)
    {
        if(request()->ajax())
        {

            
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                 $data = DB::table('users')->where('god_eye','!=','1')
                ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                ->get();
            }
            else
            {
                 $data = DB::table('users')->where('god_eye','!=','1')
                ->get();
            }

            return datatables()->of($data)->make(true);
        }
   
        return view('dashboard/user_list_page',Utilities::get_menu_array(array()));
    }

    public function change_password($user_id)
    {

        $user_list  =  User::where("id","=",$user_id)->get();

        $name = $user_list->first()->name." ".$user_list->first()->othername." ".$user_list->first()->lastname;
        return view('dashboard/change_password_page',Utilities::get_menu_array(array("name"=>$name,"user_id"=>$user_id)));
    }

    public function save_reset_credentials(Request $request, $user_id)
    {   
       $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id;
        // $profile_info =Profile_image::where('user_id', $loggedin_user_id)->first();   
          
          $request_data = $request->All();

           if($loggedin_user_id==$user_id) {
               
            $this->validate($request, [
            'current-password' => 'required',
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',  
            ]);

          $current_password = Auth::User()->password;    
          
         
          
          if(Hash::check($request_data['current-password'], $current_password))
          {  
             
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            
            $obj_user->password = $request_data['password']; 
            $obj_user->passchg_logon = 0;
            $obj_user->save(); 
            Auth::logout();  
            Session::forget('id');
            Session::flush();
            session_unset();
           // Session::flash('message', 'Password Changed Successfully');
            
            return redirect('/login')->with("success","Password Changed Successfully");
          }
          else{
           
           // Alert::error('Please enter correct current password', 'Oops!')->autoclose(4000);
            // dd('$theuser_id');
            // $error = array('current-password' => 'Please enter correct current password');
            return back()->with("error","Please enter correct current password");
            // return response()->json(array('error' => $error), 400);
          }
        }

        $role_arr = Auth::user()->roles;
        $role = $role_arr->pluck('id');
        $role = rtrim($role,"]");
        $role = ltrim($role,"[");
        
    if ($role=="2" || $role=="1") {
          $this->validate($request, [
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',  
            ]);
                      
            $obj_user = User::find($user_id);
            $obj_user->password = $request_data['password'];
            $obj_user->passchg_logon = 0;
            $obj_user->save(); 
          
            //Alert::success('Password Changed Successfully')->autoclose(3000);
            return redirect('/user-list-info/'.$user_id)->with("success","Password Changed Successfully");
          }
          
      }

    public function deleteAllPermanently($id)
    {
       $id = rtrim($id,",");
       DB::table("users")->whereIn('id',explode(",",$id))->delete();
        
    } 

    public function profile()
    {
        $id = Auth::user()->id;
        $user_list  =  User::where("id","=",$id)->get();
       
       $dept_id = $user_list->first()->department_id;

       $department = DB::table('department')->where('department_id', $dept_id)->first()->department_name;

       return view('dashboard.profile_info_page',Utilities::get_menu_array(array("user_list"=> $user_list,"department_name" => $department)));
    }

    public function userlist_info ($id)
    {
       $user_list  =  User::where("id","=",$id)->get();
      
       $role_id = DB::table("role_user")->where("user_id","=",$id)->first()->role_id;
       
       $role = DB::table("roles")->where("id","=",$role_id)->first()->role_name;
       
       $dept_id = $user_list->first()->department_id;
       $login_days = "";

       if($user_list->first()->day_1 == "1")
       {
        $login_days = $login_days."Monday, ";

       }

       if ($user_list->first()->day_2 == "1")
       {
        $login_days = $login_days."Tuesday, ";

       }

       if ($user_list->first()->day_3 == "1")
       {
        $login_days = $login_days."Wednessday, ";

       }

       if ($user_list->first()->day_4 == "1")
       {
        $login_days = $login_days."Thursday, ";

       }

       if ($user_list->first()->day_5 == "1")
       {
        $login_days = $login_days."Friday, ";

       }

       if ($user_list->first()->day_6 == "1")
       {
        $login_days = $login_days."Saturday, ";

       }
       
       if ($user_list->first()->day_7 == "1")
       {

        $login_days = $login_days."Sunday, ";
       }

       $login_days = rtrim($login_days,", ");
       
       $department = DB::table('department')->where('department_id', $dept_id)->first();

       if(isset($department->department_name))
       {
            $department = $department->department_name;
       }
       
       
      
      return view('dashboard.user_list_info_page',Utilities::get_menu_array(array("login_days"=>$login_days,"user_list"=> $user_list,"role_name" => $role,"department_name" => $department)));
    }

    public function profile_update(Request $request)
    {
        $id = Auth::user()->id;
        $user_list  =  User::where("id","=",$id)->get();

        return view('dashboard/edit_profile_page',Utilities::get_menu_array(array("id"=>$id,"user_list"=>$user_list,"code" =>"none", "message"=>"none")));

    }

    public function new_user(Request $request)
    {
        $data = DB::table('roles')
        ->get();

        $dept_arr = DepartmentModel::all();

        if (isset($request->op) && $request->op != "")
        {
            $id = $request->id;
            $user_list  =  User::where("id","=",$id)->get();

            if (count($user_list) > 0)
            {
                return view('dashboard/edit_user_page',Utilities::get_menu_array(array("id"=>$id,"user_list"=>$user_list,"code" =>"none", "message"=>"none","roles" => $data,"dept_array_list" => $dept_arr)));
            }
        }

        
      return view('dashboard/new_user_page',Utilities::get_menu_array(array("code" =>"none", "message"=>"none","roles" => $data,"dept_array_list" => $dept_arr)));
    }

    public function profile_edit_save(Request $request)
    {
        $this->validate(request(), [
            
            'name' => 'required',
            'lastname' => 'required',
            'gender' => 'sometimes',
            'dob' => 'sometimes'
           
        ]);

        $user_id = Auth::user()->id;
        $user = User::where("id","=",$user_id)->update([
                
            'created_by' => Auth::user()->email,
            'name' => request()->name, 
            'lastname' => request()->lastname,
            'othername'  => request()->othername,
            'gender'  => request()->gender,
            'dob' => request()->dob,
            'mobile_phone' => request()->phone
        ]);
        if ($user)
        {
            return redirect('/profile')->with("success","Your profile has been update successfully"); 
        }


    }

    public function store(Request $request)
    {
       

        if ($request->op == "edit")
        {

            $this->validate(request(), [
                'id' => 'required',
                'name' => 'required',
                'lastname' => 'required',
                'gender' => 'sometimes',
                'dob' => 'sometimes',
                'role' => 'required',
                'department_id' => 'required'
    
                
            ]);

            $user_id = $request->id;
            $user = User::where("id","=",$user_id)->update([
                
               'created_by' => Auth::user()->email,
               'name' => request()->name, 
               'lastname' => request()->lastname,
               'othername'  => request()->othername,
               'gender'  => request()->gender,
               'dob' => request()->dob,
               'passchg_logon' => request()->passchg_logon,
               'user_locked' => request()->user_locked,
               'user_disabled' => request()->user_disabled,
               'override_wh' => request()->override_wh,
               'day_1' => request()->day_1,
               'day_2' => request()->day_2,
               'day_3' => request()->day_3,
               'day_4' => request()->day_4,
               'day_5' => request()->day_5,
               'day_6' => request()->day_6,
               'day_7' => request()->day_7,
               'mobile_phone' => request()->phone,
               'department_id' => request()->department_id
           ]);

          
          
            if ($user)
            {
                DB::table("role_user")->where("user_id","=",$user_id)->update(["role_id"=> request()->role]);
                
                $code = "200";
                $message = "User Update was successful"; 
            }else
            {
                $code = "344";
                $message = "User creation failed";
            }

            return redirect('/user-list-info/'.$user_id)->with("success","The user details was updated successfully");

        }else
        {
            $this->validate(request(), [
                'name' => 'required',
                'lastname' => 'required',
                'gender' => 'sometimes',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:6',
                'dob' => 'sometimes',
                'role' => 'required',
                'department_id' => 'required'
    
                
            ]);

            $user = User::create([
                'id' => Utilities::getnextid("user_creation"),
               'created_by' => Auth::user()->email,
               'name' => request()->name, 
               'lastname' => request()->lastname,
               'othername'  => request()->othername,
               'gender'  => request()->gender,
               'email'  => request()->email, 
               'password' => request()->password,
               'dob' => request()->dob,
               'passchg_logon' => request()->passchg_logon,
               'user_locked' => request()->user_locked,
               'user_disabled' => request()->user_disabled,
               'override_wh' => request()->override_wh,
               'day_1' => request()->day_1,
               'day_2' => request()->day_2,
               'day_3' => request()->day_3,
               'day_4' => request()->day_4,
               'day_5' => request()->day_5,
               'day_6' => request()->day_6,
               'day_7' => request()->day_7,
               'mobile_phone' => request()->phone,
               'department_id' => request()->department_id
           ]);

            $user->makeUser(request()->role); //assign the role to the user

            if ($user)
            {
                $code = "200";
                $message = "User creation was successful"; 
            }else
            {
                $code = "344";
                $message = "User creation failed";
            }

            $data = DB::table('roles')
            ->get();
    
            $dept_arr = DepartmentModel::all();
            return view('dashboard/new_user_page',Utilities::get_menu_array(array("code" =>$code, "message"=>$message,"roles" => $data,"dept_array_list" => $dept_arr)));
        }
        
        
        
        
        
        
        //auth()->login($user); 
        
        //return redirect()->to('/user-list');
       
    
    }
    
}
