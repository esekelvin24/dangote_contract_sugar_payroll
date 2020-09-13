<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use App\Model\Staff\DesignationModel;
use App\Model\Staff\DepartmentModel;
use DB;
use Auth;

class DesignationController extends Controller
{
    //
    public function index(Request $request)
    {
          
        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                
                 $data = DB::table('designation_view')
                ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                ->get();
            }
            else
            {

               
                 $data = DB::table('designation_view')->where("department_id","LIKE","%".$request->department_id."%")
                 ->where("category_id","LIKE","%".$request->category_id."%")
                 ->get();
            }

            return datatables()->of($data)->make(true);
        }
        $category = DB::table('job_category')->get();
        
        $dept_arr = DepartmentModel::all();  
        return view ('staff.designation_list_page', Utilities::get_menu_array(array("cat_array_list"=>$category,"dept_array_list"=>$dept_arr)));
    }

    public function create_new($op="",$designation_id="")
    {
        $designation_name ="";
        $department_id = "";
        $category_id = "";
        if ($op =="update")
        {
           $designation_obj = DB::table('designation')->where('designation_id', $designation_id)->first();

          // dd($designation_obj);
           $designation_name = isset($designation_obj->designation_name)?$designation_obj->designation_name:"";
           $department_id = isset($designation_obj->department_id)?$designation_obj->department_id:"";
           $category_id = isset($designation_obj->category_id)?$designation_obj->category_id:"";
        }
        $category = DB::table('job_category')->get();
        
        $dept_arr = DepartmentModel::all();   
        return view ('staff.create_designation_page', Utilities::get_menu_array(array('designation_id' => $designation_id ,"department_id"=> $department_id,"category_id" => $category_id,"op" => $op,"designation_name" =>$designation_name,"cat_array_list"=>$category,"dept_array_list"=>$dept_arr,"message"=>"none","code"=>"none")));
    }

    public function deleteAllPermanently($id)
    {
        Utilities::deleteAllPermanently($id,"designation", "designation_id");
        
    }


    public function save(Request $request)
    {
        $this->validate(request(), [
            'designation_name' => 'required',
            'category_id' => 'required',
            'department_id' => 'required',
            'op' => 'required',
            
            ]);

            $message = "";
            $op = $request->op;
            $department_id = $request->department_id;
            $category_id = $request->category_id;
            $designation_id = "";

            if($request->op == "new")
            {
                $designation_id = "d".Utilities::paddZeros(Utilities::getnextid("designation"),0);
            }else
            {
                $designation_id = $request->designation_id;
            }

            
            $designation_name = $request->designation_name;
            

            $designation_insert [] =
            [
                'department_id' => $department_id,
                'designation_name' => $designation_name,
                'designation_id' => $designation_id,
                'category_id' => $category_id,
                'created_by' => Auth::user()->email,
                'created_at' => NOW()
            ];

            try
              {
                if ($op == "new")
                {
                    $designation_data = DB::table('designation')->insert($designation_insert);
                    if($designation_data  )
                    {
                                
                        $message = ''.$designation_name.' position has been created successfully ';
                        $code = "200";
                    }
                }else
                {
                    unset($designation_insert[0]["designation_id"]);
                    unset($designation_insert[0]["created_by"]);
                    unset($designation_insert[0]["created_at"]);

                    $designation_data = DB::table('designation')->where('designation_id', $designation_id)->update($designation_insert[0]);
                    
                    if($designation_data  )
                    {
                                
                        $message = ''.$designation_name.' position has been updated successful ';
                        $code = "200";
                    } 
                }

             }
            catch(\Exception $exception)
            {
               
                
               $message = ' Error creating '.$designation_name.' position please contact admin'; 
               $code = "213";
            }
                
            $category = DB::table('job_category')->get();
            $dept_arr = DepartmentModel::all(); 

            return view ('staff.create_designation_page', Utilities::get_menu_array(array("department_id"=> $department_id, "cat_array_list"=>$category,"dept_array_list"=>$dept_arr,"op"=>$op, "category_id" => $category_id, 'designation_id' => $designation_id, 'designation_name' => $designation_name, "message"=>$message,"code"=>$code)));

    }

    
}
