<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Staff\StaffModel;
use App\Model\Staff\DepartmentModel;
use App\Model\Staff\StaffCreateModel;
use App\Model\Parameter;
use App\Http\Controllers\Utilities;
use DB;
use Auth;


class StaffController extends Controller
{

    public function approve_staff_list(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                 if (!empty($request->staff_type))
                 {

                    $data = DB::table('staff_view')
                    ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->where("staff_type_id","=",$request->staff_type)
                    ->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=","0")
                    ->get();

                 }else
                 {
                    $data = DB::table('staff_view')
                    ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=","0")
                    ->get();
                 }
                 
            }
            else
            {
                if (!empty($request->staff_type))
                 {
                    $data = DB::table('staff_view')
                    ->where("staff_type_id","=",$request->staff_type)
                    ->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=","0")
                    ->get();
                 }else
                 {
                    $data = DB::table('staff_view')->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=","0")
                    ->get();
                 }
                 
    
            }

            return datatables()->of($data)->make(true);
        }
        
        $dept_arr = DepartmentModel::all();
        $staff_type = DB::table('staff_type')->get();
        return view ('staff.approve_staff_list_page', Utilities::get_menu_array(array("staff_type" => $staff_type, "dept_array_list" => $dept_arr )));
    }

    public function index(Request $request)
    {

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                 if (!empty($request->staff_type))
                 {

                    $data = DB::table('staff_view')
                    ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->where("staff_type_id","=",$request->staff_type)
                    ->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=",$request->status)
                    ->get();

                 }else
                 {
                    $data = DB::table('staff_view')
                    ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=",$request->status)
                    ->get();
                 }
                 
            }
            else
            {
                if (!empty($request->staff_type))
                 {
                    $data = DB::table('staff_view')
                    ->where("staff_type_id","=",$request->staff_type)
                    ->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=",$request->status)
                    ->get();
                 }else
                 {
                    $data = DB::table('staff_view')->where("gender","like","%".$request->gender."%")
                    ->where("department_id","like","%".$request->department_id."%")
                    ->where("status","=",$request->status)
                    ->get();
                 }
                 
    
            }

            return datatables()->of($data)->make(true);
        }
        $dept_arr = DepartmentModel::all();
        $staff_type = DB::table('staff_type')->get();

        
        return view ('staff.staff_list_page', Utilities::get_menu_array(array("staff_type" => $staff_type, "dept_array_list" => $dept_arr )));
    }

    public function get_lga_list($state_id)
    {
         $res ="";
         $data = DB::table("lga")->where("stateid", "=", $state_id)->get();
      
         $res = $res. '<option value="#">Select a LGA</option>';

         if (count($data) > 0)
         {
            foreach($data as $state)
            {
            $res = $res. '<option value="'.$state->lgaid.'">'.$state->lga.'</option>';
            }
         }
       
         return $res;

    }

    public function edit_staff($staff_id)
    {

      $staff_details = DB::table("staff_view")->where("staff_id","=",$staff_id)->get();

      $bank_arr = DB::table('bank_bincodes')->get();
      $state_list = DB::table('lga')->select("stateid","State")->groupBy('stateid','state')->get();

      $staff_id = DB::table('staff_view')->where("staff_id","=",$staff_id)->get();

      $dept_arr = DepartmentModel::all();
      $cat_array_list = DB::table('job_category')->get();
      $staff_type = DB::table('staff_type')->get();
      return view('staff/edit_staff_page',Utilities::get_menu_array(array("staff_details" => $staff_details, "cat_array_list"=>$cat_array_list,"dept_array_list" => $dept_arr, "staff_type" => $staff_type, "bank_list" => $bank_arr, "state_list" => $state_list,"code"=>"none","message"=>"none")));
    
    }

    public function enable_staff($staff_id)
    {
        $staff_details = DB::table('staff_view')->where('staff_id',$staff_id)->get();

        
        if($staff_details[0]->status == 1)
        {
            $status = DB::table('staff')->where('staff_id',$staff_id)->update(["status" => 2]);

            if( $status)
            {
                return redirect('/staff-list-info/'.$staff_id)->with('success','This staff has been disabled and will not be included on staff time sheet/Payroll');
            }

        }else if($staff_details[0]->status == 2)
        {
            $status = DB::table('staff')->where('staff_id',$staff_id)->update(["status" => 1]);

            if( $status)
            {
                return redirect('/staff-list-info/'.$staff_id)->with('success','This staff has been enabled');
            }
        }else if($staff_details[0]->status == 2)
        {
            return redirect('/staff-list-info/'.$staff_id)->with('error','This staff needs to be approve by a supervisor, Kindly contact a supervisor for approval');
        }

        return redirect('/staff-list-info/'.$staff_id);

    }

    public function new_staff()
    {

      $bank_arr = DB::table('bank_bincodes')->get();

      $state_list = DB::table('lga')->select("stateid","State")->groupBy('stateid','state')->get();

      $dept_arr = DepartmentModel::all();
      $cat_array_list = DB::table('job_category')->get();
      $staff_type = DB::table('staff_type')->get();
      return view('staff/new_staff_page',Utilities::get_menu_array(array("cat_array_list"=>$cat_array_list,"dept_array_list" => $dept_arr, "staff_type" => $staff_type, "bank_list" => $bank_arr, "state_list" => $state_list,"code"=>"none","message"=>"none")));
    
    }
    
    public function get_staff_id(Request $req)
    {

    }

    public function change_staff_status(Request $request, $staff_id)
    {
        if($request->status == 1 || $request->status == 2)
        {
          $id = rtrim($staff_id,",");
          DB::table("staff")->whereIn("staff_id",explode(",",$id))->update(["status"=> $request->status]);
        }
    }

    public function approve_staff($staff_id)
    {
        
        $id = $staff_id;
        $id = rtrim($id,",");
        $result = DB::table("staff")->whereIn("staff_id",explode(",",$id))->update(['status' => "1", "updated_by" => Auth::user()->email]);

        return redirect('/staff-list-info/'.$staff_id);
    }

    public function staff_list_info($staff_id)
    {
         $staff_details = DB::table("staff_view")->where("staff_id","=",$staff_id)->get();
         $additional_pay = "0";
         $salary = "0";
         foreach ($staff_details as $staff)
         {
            $salary = DB::table("designation_salary_view")->where('designation_id', $staff->designation_id)->first()->monthly_amount;
            $pay = DB::table("staff_other_allowance_view")->where('staff_id', $staff->staff_id)->first();
            $additional_pay = isset($pay->monthly_amount)?$pay->monthly_amount:"0";
            
         }
         

         //dd($staff_details);
         return view('staff.staff_list_info_page',Utilities::get_menu_array(array("staff_details"=>$staff_details,"salary" => $salary,"additional_pay" => $additional_pay)));
    }

    public function store_edit(Request $request, $staff_id)
    {
           
           $this->validate(request(), [
            'engagement_date' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'othername' => 'sometimes',
            'gender' => 'required',
            'email' => 'sometimes',
            'marital_status' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'lga_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'bank_id' => 'required',
            'account_no' => 'required',
            'account_name' => 'required',
            'staff_type' => 'required',
            'department_id' => 'required',
            'section_id' => 'sometimes',
            'designation_id' => 'required',
            'additional_bonus' => 'sometimes',
            'category_id' => 'required',
            'bvn'        => 'sometimes'
        ]);

        $array = [
            'engagement_date'=> request()->engagement_date,
            'created_by' => Auth::user()->email,
            'staff_id' => $staff_id, 
            'first_name' => request()->first_name, 
            'last_name' => request()->last_name,
            'other_name'  => request()->othername,
            'gender'  => request()->gender,
            'lgaid'  => request()->lga_id,
            'email'  => request()->email, 
            'marital_status' => request()->marital_status,
            'dob' => request()->dob,
            'address' => request()->address,
            'mobile_phone' => request()->phone,
            'bin_code' => request()->bank_id,
            'account_name' => request()->account_name,
            'account_number' => request()->account_no,
            'staff_type_id' => request()->staff_type,
            'designation_id' => request()->designation_id,
            'section_id' => request()->section_id,
            'bvn'  =>  request()->bvn,
            'category_id'  =>  request()->category_id,
            'status'  => 0,
           ];

        if (request()->section_id =="#")
        {
         unset($array["section_id"]); 
        }
       

        

       

        try
        {
            
            $user = StaffCreateModel::where("staff_id","=",$staff_id)->update($array);
           
            if($user)
            {
                $insert = ["staff_id"=> $staff_id, "monthly_amount" => request()->additional_bonus, "salary_desc_code" => "sd01"];
                $check = DB::table("staff_other_allowances")->where("staff_id","=",$staff_id)->first();
                $sal_count = DB::table("staff_other_allowances")->where("staff_id","=",$staff_id)->count();
              //  dd("l");
                

                if($sal_count < 1)
                {
                   
                    if (request()->additional_bonus > 0 )
                    {
                       
                        DB::table("staff_other_allowances")->insert($insert);
                    }
                }else
                {
                   
                    if (request()->additional_bonus > 0)
                    {
                        unset($insert["staff_id"]);
                        DB::table("staff_other_allowances")->where("staff_id","=",$staff_id)->update($insert);
                    }else
                    {
                        DB::table("staff_other_allowances")->where("staff_id","=",$staff_id)->delete();
                    }
                   
                }

                return redirect('/staff-list-info/'.$staff_id)->with("success","Staff details has been update successfully"); 
            }
           // return view('staff/new_staff_page',Utilities::get_menu_array(array("cat_array_list"=>$cat_array_list,"dept_array_list" => $dept_arr, "staff_type" => $staff_type, "bank_list" => $bank_arr, "state_list" => $state_list,"code"=>$code,"message"=>$message)));
            
        }
        catch(\Exception $exception)
        {
            //dd($exception);
                return redirect('/staff-list-info/'.$staff_id)->with("error","Staff update was not successful"); 
             
        }

        //dd($request);
    }

    public function  new_staff_save(Request $request)
    {

       $this->validate(request(), [
            'engagement_date' => 'required',
            'staff_id' => 'sometimes',
            'first_name' => 'required',
            'last_name' => 'required',
            'othername' => 'sometimes',
            'gender' => 'required',
            'email' => 'sometimes',
            'marital_status' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'state' => 'required',
            'lga_id' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'bank_id' => 'required',
            'account_no' => 'required',
            'account_name' => 'required',
            'staff_type' => 'required',
            'department_id' => 'required',
            'section_id' => 'sometimes',
            'designation_id' => 'required',
            'additional_bonus' => 'sometimes',
            'creation_type' => 'required',
            'category_id' => 'required',
            'bvn'        => 'sometimes'
        ]);



      $bank_arr = DB::table('bank_bincodes')->get();

      $state_list = DB::table('lga')->select("stateid","State")->groupBy('stateid','state')->get();

      $dept_arr = DepartmentModel::all();
      $cat_array_list = DB::table('job_category')->get();
      $staff_type = DB::table('staff_type')->get();

        $staff_id = request()->staff_id;

        if (request()->creation_type == "new")
        {
            $staff_id =   Utilities::get_staff_id(request()->department_id, request()->category_id);
        }


        $array = [
         'engagement_date'=> request()->engagement_date,
         'created_by' => Auth::user()->email,
         'staff_id' => $staff_id, 
         'first_name' => request()->first_name, 
         'last_name' => request()->last_name,
         'othername'  => request()->othername,
         'gender'  => request()->gender,
         'email'  => request()->email, 
         'address' => request()->address,
         'lgaid'  => request()->lga_id,
         'marital_status' => request()->marital_status,
         'dob' => request()->dob,
         'mobile_phone' => request()->phone,
         'bin_code' => request()->bank_id,
         'account_name' => request()->account_name,
         'account_number' => request()->account_no,
         'staff_type_id' => request()->staff_type,
         'designation_id' => request()->designation_id,
         'section_id' => request()->section_id,
         'bvn'  =>  request()->bvn,
         'category_id'  =>  request()->category_id,
         'status'  => 0,
        ];


       

        if (request()->section_id =="#")
        {
         unset($array["section_id"]); 
        }

       
        try
        {
            $user = StaffCreateModel::create($array);
            
            if($user)
            {
                $insert = ["staff_id"=> $staff_id, "monthly_amount" => request()->additional_bonus, "salary_desc_code" => "sd01"];
                $check = DB::table("staff_other_allowances")->where("staff_id","=",$staff_id)->first();
                

                if(!isset($check->monthly_amount))
                {
                    DB::table("staff_other_allowances")->insert($insert);
                }else
                {
                    unset($insert["staff_id"]);
                    DB::table("staff_other_allowances")->where("staff_id","=",$staff_id)->update($insert);
                }
                
                return redirect('/staff-list-info/'.$staff_id)->with("success","Staff details has been created successfully"); 
            }
        }
        catch(\Exception $exception)
        {
            return redirect('/staff-list-info/'.$staff_id)->with("error","Staff creation was not successful"); 
        }
          
    }
}
