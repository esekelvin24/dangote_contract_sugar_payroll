<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use App\Model\Staff\DesignationSalaryModel;
use App\Model\Staff\DepartmentModel;
use DB;
use Auth;

class DesignationSalaryController extends Controller
{
    //
    public function index(Request $request)
    {

        
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                if (!empty($request->staff_type))
                 {
                    $data = DesignationSalaryModel::selectRaw('*, created_at as created')->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->where("staff_type_id","=",$request->staff_type)
                    ->get();
                 }else
                 {
                    $data = DesignationSalaryModel::selectRaw('*, created_at as created')->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->get(); 
                 }
            }
            else
            {
                
               
                     $data = DesignationSalaryModel::selectRaw('*, created_at as created')->where("staff_type_id","LIKE","%".$request->staff_type."%")
                    ->where("department_id","LIKE","%".$request->department_id."%")
                    ->get();  
     
            }
           
            

        $staff_type = DB::table('staff_type')->get();
        $dept_arr = DepartmentModel::all();  

        return view ('staff.designation_salary_list_page', Utilities::get_menu_array(array("data" => $data,"dept_array_list"=>$dept_arr,"staff_type" => $staff_type )));
    }


    public function designation_salary_create($op="",$designation_id="")
    {
       $designation_list ="";
       $options="";
       $salary ="";
       $department_id = "";
        if($op =="update")
        {
           $designation_obj = DB::table('designation_salary_view')->where('designation_id', $designation_id)->first();
           $department_id = isset($designation_obj->department_id)?$designation_obj->department_id:"";
           $salary = isset($designation_obj->monthly_amount)?$designation_obj->monthly_amount:"";
           $category_id = isset($designation_obj->category_id)?$designation_obj->category_id:"";
           $designation_list = DB::table('designation_view')->where('department_id', $department_id)->get();
           
           foreach($designation_list as $desg)
           {
               $selected = $designation_id == $desg->designation_id?'selected':'';
               $options = $options.'<option '.$selected.' value ="'.$desg->designation_id.'" >'.$desg->designation_name.'</option>';
           }
          
           
           

        }

        
        $category = DB::table('job_category')->get();
        
        $dept_arr = DepartmentModel::all(); 
        return view ('staff.create_salary_page', Utilities::get_menu_array(array("category_id"=> $category_id,"cat_array_list"=>$category,"salary" =>$salary,"options" => $options, "op"=>$op,"designation_id"=>$designation_id,"department_id"=>$department_id,"dept_array_list"=>$dept_arr,"message"=>"none","code"=>"none"))); 

    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            'designation_id' => 'required',
            'department_id' => 'required',
            'op' => 'required',
            'designation_salary' => 'required',
            ]);
            $options = '';
            $message = "";
            $code = "";
            $op = $request->op;
            $designation_id = $request->designation_id;

            
            $monthly_amount = $request->designation_salary;
            $department_id = $request->department_id;
            

           $designation_obj = DB::table('designation')->where('designation_id', $designation_id)->first();
           $designation_name = isset($designation_obj->designation_name)?$designation_obj->designation_name:"";

           $designation_list = DB::table('designation_view')->where('department_id', $department_id)->get();
           
           foreach($designation_list as $desg)
           {
               $selected = $designation_id == $desg->designation_id?'selected':'';
               $options = $options.'<option '.$selected.' value="'.$desg->designation_id.'" >'.$desg->designation_name.'</option>';
           }
            
            

            $designation_insert [] =
            [
                'monthly_amount' => $monthly_amount,
                'designation_id' => $designation_id,
                'salary_desc_code' => "sd01",
                'created_by' => Auth::user()->email,
                'created_at' => NOW()
            ];

        

         try
           {
                if ($op == "new")
                {
                    $department_data = DB::table('designation_salary_package')->insert($designation_insert);
                    if($department_data  )
                    {
                        $message = 'salary for '.$designation_name.' position has been created successful ';
                        $code = "success";
                    }
                }else
                {
                    unset($designation_insert[0]["designation_id"]);
                    unset($designation_insert[0]["salary_desc_code"]);
                    unset($designation_insert[0]["created_by"]);
                    unset($designation_insert[0]["created_at"]);

                    //echo $designation_id;

                    

                    $designation_data = DB::table('designation_salary_package')->where('designation_id', $designation_id)->where('salary_desc_code', 'sd01')->update($designation_insert[0]);
                    
                    
                    if($designation_data)
                    {
                                
                        $message = 'Salary for '.$designation_name.' position has been updated successful ';
                        $code = "success";
                    } else
                    {
                        $message = 'Error updating salary for '.$designation_name.' position ';
                        $code = "error";
                    }
                }
                
            }
            catch(\Exception $exception)
            {
               
                
               $message = ' Error updating salary for  '.$designation_name.' position please contact admin'; 
               $code = "error";
            }
            //dd($designation_id);

           
            return redirect('/designation-salary-list/update/'.$designation_id)->with($code,$message);
           //* $category = DB::table('job_category')->get();
           //* $dept_arr = DepartmentModel::all(); 
            //return view ('staff.create_salary_page', Utilities::get_menu_array(array("cat_array_list"=>$category,"salary" =>$monthly_amount,"options" => $options, "op"=>$op,"designation_id"=>$designation_id,"department_id"=>$department_id,"dept_array_list"=>$dept_arr,"message"=>$message,"code"=>$code))); 

    }
    
}
