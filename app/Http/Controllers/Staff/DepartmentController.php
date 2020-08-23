<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use DB;
use Auth;

class DepartmentController extends Controller
{
    //

    public function index(Request $request)
    {

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                 $data = DB::table('department')
                ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                ->get();
            }
            else
            {
                 $data = DB::table('department')
                ->get();
            }

            return datatables()->of($data)->make(true);
            
        }

        return view ('staff.department_list_page', Utilities::get_menu_array(array()));
    }

    public function create_new($op="",$dep_id="")
    {
        $department_name ="";
        
        if ($op =="update")
        {
           $department_obj = DB::table('department')->where('department_id', $dep_id)->first();
           $department_name = isset($department_obj->department_name)?$department_obj->department_name:"";
        }
        
        
        return view ('staff.create_department_page', Utilities::get_menu_array(array("op"=>$op,"dep_id"=>$dep_id,"department_name"=> $department_name ,"message"=>"none","code"=>"none")));
    }


    public function deleteAllPermanently($id)
    {
        Utilities::deleteAllPermanently($id,"department", "department_id");
        
    } 

    public function save(Request $request)
    {
        $this->validate(request(), [
            'department_name' => 'required',
            'op' => 'required',
            'dep_id' => 'required',
            ]);

            $message = "";
            $op = $request->op;
            $dep_id = $request->dep_id;

            if($request->op == "new")
            {
                $department_id = "dep".Utilities::paddZeros(Utilities::getnextid("department"),0);
            }else
            {
                $department_id = $request->dep_id;
            }

            
            $department_name = $request->department_name;
            

            $department_insert [] =
            [
                'department_id' => $department_id,
                'department_name' => $department_name,
                'created_by' => Auth::user()->email,
                'created_at' => NOW()
            ];

          try
           {
                if ($op == "new")
                {
                    $department_data = DB::table('department')->insert($department_insert);
                    if($department_data  )
                    {
                                
                        $message = ''.$department_name.' department has been created successful ';
                        $code = "200";
                    }
                }else
                {
                    unset($department_insert[0]["department_id"]);
                    unset($department_insert[0]["created_by"]);
                    unset($department_insert[0]["created_at"]);

                    $department_data = DB::table('department')->where('department_id', $dep_id)->update($department_insert[0]);
                    
                    if($department_data  )
                    {
                                
                        $message = ''.$department_name.' department has been updated successful ';
                        $code = "200";
                    } 
                }
                
            }
            catch(\Exception $exception)
            {
               
                
               $message = ' Error creating '.$department_name.' department please contact admin'; 
               $code = "213";
            }

            return view ('staff.create_department_page', Utilities::get_menu_array(array("op"=>$op,"dep_id"=>$dep_id, 'department_name' => $department_name,"message"=>$message,"code"=>$code)));

    }

    public function section_list($department_id)
    {
       $res ="";
       $data = DB::table("section")->where("department_id", "=", $department_id)->get();
      
       $res = $res. '<option value="#">Select a section</option>';

       if (count($data) > 0)
       {
           foreach($data as $section)
           {
            $res = $res. '<option value="'.$section->section_id.'">'.$section->section_name.'</option>';
           }
       }
       


       return $res;
    }


    public function  department_designation_list($category_id, $department_id)
    {
        $res ="";
        $data = DB::table("designation")->where("category_id", "=", $category_id)->where("department_id", "=", $department_id)->get();
       
        $res = $res. '<option value="#">Select a Designation</option>';
 
        if (count($data) > 0)
        {
            foreach($data as $section)
            {
             $res = $res. '<option value="'.$section->designation_id.'">'.$section->designation_name.'</option>';
            }
        }
        
 
 
        return $res;
    }

    public function   department_salary_designation_list($department_id)
    {
        $res ="";
        $data = DB::table("designation")
        ->where("department_id", "=", $department_id)->get();
        
       
        $res = $res. '<option value="#">Select a Designation</option>';
 
        if (count($data) > 0)
        {
            foreach($data as $section)
            {
             $res = $res. '<option value="'.$section->designation_id.'">'.$section->designation_name.'</option>';
            }
        }
        
 
 
        return $res;
    }

    public function  get_desig_salary($designation_id, $category_id)
    {

       
        $res ="";
        $data = DB::table("designation_salary_view")->where("designation_id", "=", $designation_id)->where("category_id", "=", $category_id)->get();
       
        $res = '';

        //echo count($data);
 
        if (count($data) > 0)
        {
            foreach($data as $section)
            {
               $res = $section->monthly_amount;
            }
        }
        
 
 
        return $res;
    }

}
