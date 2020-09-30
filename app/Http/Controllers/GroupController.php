<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\vw_user_details;
use App\Department;

class GroupController extends Controller
{
    //


    public function manage_groups()
    {

        
       if (Auth::user()->can('can_map_users_to_hbp'))
       {
        $profile_info = "";
        $groups = DB::table('group_hrbp')->orderBy('created_at', 'desc')->get();

        return view('groups.manage_groups', compact('groups', 'profile_info'))->with('i');
       }
        else{
            return view('errors.403', compact('profile_info'));
           }
    }

    public function create_group()
    {
        if (Auth::user()->can('can_map_users_to_hbp'))
        {
         
         $profile_info = "";
         return view('groups.create_group', compact( 'profile_info'))->with('i');
        }
         else{
             return view('errors.403', compact('profile_info'));
            }

    }

    public function store_group(Request $request)
    {
        if (Auth::user()->can('can_map_users_to_hbp'))
        {
         
            $rules = array(
                'group_description' => 'required',
                'group_name' => 'required',
            );
            
            $this->validate($request,$rules);

            $data = [
               "group_name" => $request->group_name,
               "description" => $request->group_description,
               "created_at" => NOW(),
               "user_id" => Auth::user()->id
            ];

            DB::table('group_hrbp')->insert($data);
            return redirect('/manage_groups');

        }
         else{
             return view('errors.403', compact('profile_info'));
            }
    }

    public function store_edit_group(Request $request)
    {
        if (Auth::user()->can('can_map_users_to_hbp'))
        {
         
            $rules = array(
                'group_description' => 'required',
                'group_id' => 'required',
                'group_name' => 'required',
            );
            
            $this->validate($request,$rules);

            $data = [
               "group_name" => $request->group_name,
               "description" => $request->group_description,
               "created_at" => NOW(),
               "user_id" => Auth::user()->id
            ];

            DB::table('group_hrbp')->where('group_id',$request->group_id)->update($data);
            return redirect('/manage_groups');

        }
         else{
             return view('errors.403', compact('profile_info'));
            }
    }


    

    public function view_group ($group_id)
    {
        $profile_info = "";
        

        if (Auth::user()->can('can_map_users_to_hbp'))
        {
          $collections =  DB::table('group_hrbp')->where('group_id',$group_id)->first();
            return view('groups.view_group',compact('collections'));

        }
         else{
             return view('errors.403', compact('profile_info'));
            };
    }

    public function edit_group($group_id)
    {
        $profile_info = "";
        

        if (Auth::user()->can('can_map_users_to_hbp'))
        {
          $collections =  DB::table('group_hrbp')->where('group_id',$group_id)->first();
            return view('groups.edit_group',compact('collections'));

        }
         else{
             return view('errors.403', compact('profile_info'));
            };
    }

    public function store_group_admin (Request $request)
    {
        if (Auth::user()->can('can_map_users_to_hbp'))
        {

            $rules = array(
               // 'staff_id' => 'array|required',
                'group_id' => 'required'
            );
            
            $this->validate($request,$rules);
            
            $data = array();
            $sap_arr = $request->staff_id;
            DB::table('group_hrbp_admin')->where('group_id',$request->group_id)->delete();

            if ($sap_arr != null)
            {
                foreach($sap_arr as $val)
                {
                    $data[] = [
                         "group_id" => $request->group_id,
                         "hr_sap" => $val,
                         "created_at" => NOW()
    
                    ];
                }
                DB::table('group_hrbp_admin')->insert($data);
            }
           

            

            

            return redirect('/add_group_admin/'.$request->group_id)->with('success','Changes has been successfully saved');
           
        } else{
            return view('errors.403', compact('profile_info'));
           };
    }

    public function add_group_admin($group_id, Request $request)
    {

       
        if (Auth::user()->can('can_map_users_to_hbp'))
        {
            $group_collection =  DB::table('group_hrbp')->where('group_id',$group_id)->first();

            if (!isset($group_collection->group_name))
            {
                   return redirect('/manage_groups');
            }

            $group_name =  $group_collection->group_name;
            $users = vw_user_details::where('department_name','HR')->get();   
            $already_added_arr =  DB::table('group_hrbp_admin')->where('group_id',$group_id)->pluck('hr_sap')->toArray();
            $user_category = $request->category;

            $dept_id = isset($request->dept)?$request->dept:"";

            if($dept_id=="select")
            $dept_id ="123456";

            $department = Department::orderBy('name')->pluck('name','id');
            
            
            $users_collection = vw_user_details::where('resigned',0)->where('department_id','=',$dept_id)->orderBy('department_name', 'ASC')->orderBy('name', 'ASC')->get();

            return view('groups.add_group_admin',compact('already_added_arr','group_id','group_name','users','users_collection'));

        }
         else{
             return view('errors.403', compact('profile_info'));
            };

    }

}
