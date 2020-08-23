<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\leftSideMenu;
use App\Model\Category_Menu_Header;
use App\Http\Controllers\Utilities;
use Auth;
use DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //


    public function index(Request $request)
    {
        

        $temporary_staff = DB::table("staff")->where("staff_type_id","=","ST01")->where("status","=",1)->count();
        $casual_staff = DB::table("staff")->where("staff_type_id","=","ST02")->where("status","=",1)->count();
        
        $department = DB::table("department")->count();
        $designation = DB::table("designation")->count();
        $job_category = DB::table("job_category")->count();
        $pay_day = DB::table('parameter')->where('parameter_name','pay_day')->first()->parameter_value;
        $start = "";
        $end = "";

        if (isset($request->date))
        {
           // $end = date('Y-m-t 23:59:59',strtotime($request->date));
           // $start = date('Y-m-01 23:59:59',strtotime($request->date));
           $month_of = $request->date;
           $end = date('Y-m-'.$pay_day, strtotime($month_of));
           $start = date("Y-m-d", strtotime("-1 month +1 day", strtotime($end)));

           $payroll_month =  date('Y-m-01', strtotime($request->date));

        }else
        {
           $payroll_month  = date('Y-m-01');
           $month_of = date('Y-m-d');
           $end = date('Y-m-'.$pay_day, strtotime($month_of));
           $start = date("Y-m-d", strtotime("-1 month +1 day", strtotime($end)));
        }
        
        $graph_date = Carbon::parse($end)->format('F Y');
        
       

        $temporary_ot = DB::table('staff_time_sheet_view')->selectRaw("department_id, department_name,SUM(ot) as overtime")
        ->where('staff_type_id','ST01')
        ->where('started_at','>=', $start)
        ->where('expired_at', '<=', $end)
        ->orderBy('department_name','asc')->groupBy("department_id")->get();

        $casual_ot = DB::table('staff_time_sheet_view')->selectRaw("department_id, department_name,SUM(ot) as overtime")
        ->where('staff_type_id','ST02')
        ->where('started_at','>=', $start)
        ->where('expired_at', '<=', $end)
        ->orderBy('department_name','asc')->groupBy("department_id")->get();

        
        $temporary_monthly_net = DB::table('payroll_departmental_view')
        ->where('staff_type_id','ST01')
        ->where("month_of", '>=',  $payroll_month)
        ->orderBy('department_name','asc')->groupBy("department_id")->get();

        $casual_monthly_net = DB::table('payroll_departmental_view')
        ->where('staff_type_id','ST02')
        ->where("month_of", '>=',  $payroll_month)
        ->orderBy('department_name','asc')->groupBy("department_id")->get();




         return view('dashboard/dashboard_page', Utilities::get_menu_array(array("graph_date"=>$graph_date,"casual_monthly_net"=>$casual_monthly_net,"temporary_monthly_net" => $temporary_monthly_net,"casual_ot"=>$casual_ot,"temporary_ot"=>$temporary_ot,"temporary_staff"=>$temporary_staff,"casual_staff"=>$casual_staff,"department"=>$department,"designation"=>$designation,"job_category"=>$job_category)));
    }


   /* public function get_dashboard_barchart(Request $request)
    {
        $new_date = $request->date;
        $date_arr =  explode('-',$new_date);
        $sel_type = $request->sel_type;

        if (count($date_arr)>2)
        {
            $start = $date_arr[0].'-'.$date_arr[1].'-01';
            $end = $date_arr[0].'-'.$date_arr[1].'-31';
        }


        $temporary_ot = DB::table('staff_time_sheet_view')->selectRaw("department_id, department_name,SUM(ot) as overtime")
        ->where('staff_type_id','ST01')
        ->orderBy('department_name','asc')->groupBy("department_id")->get();

        $casual_ot = DB::table('staff_time_sheet_view')->selectRaw("department_id, department_name,SUM(ot) as overtime")
        ->where('staff_type_id','ST02')
        ->orderBy('department_name','asc')->groupBy("department_id")->get();

       /* $start = new Carbon('first day of this month');
        $start->startOfMonth();
        $end = new Carbon('last day of this month');
        $end->endOfMonth();*

        $end = date('Y-m-t 23:59:59',strtotime($new_date));
        $start = date('Y-m-01 23:59:59',strtotime($new_date));
        

        $temporary_monthly_net = DB::table('payroll_departmental_view')
        ->where('staff_type_id','ST01')
        ->where("created_at", '>=', $start)
        ->where("created_at", '<=', $end)
        ->orderBy('department_name','asc')->groupBy("department_id")->get();

        $casual_monthly_net = DB::table('payroll_departmental_view')
        ->where('staff_type_id','ST02')
        ->where("created_at", '>=', $start)
        ->where("created_at", '<=', $end)
        ->orderBy('department_name','asc')->groupBy("department_id")->get();

        

        $html = view('Dashboard.dashboard_ajax_cont', compact('temporary_ot','casual_ot','temporary_monthly_net','casual_monthly_net'))->render();
       
        return $html;
    }*/

    public function notauthorize()
    {

        return view('dashboard\not_authorized',Utilities::get_menu_array(array()));
    }


    public function new_migration()
    {
       $position_result = DB::table("temporary_migration")
       ->distinct()->select('staff_type','position','department','job_category','monthly_rate')->get();
       $insert_position ="";
       $insert_salary = "";

       //Inserting Positions and Position Salary
       foreach ($position_result as $staff)
       {
          $department_id = Utilities::getDepartment_code($staff->department);
          $job_category =  Utilities::getJobCategory($staff->job_category);
          $designation_id = Utilities::getnextid("designation");
          $staff_type = $staff->staff_type;

          $position_data_set[] = [
            'designation_id'     => $designation_id,
            'designation_name'     => Str::title($staff->position),
            'department_id'           => $department_id,
            'category_id'       =>  $job_category,
            'staff_type_id'    => $staff_type,
            'created_at'   => Now(),
            'created_by'   => Auth::user()->email,
          ];

          $salary_data_set[] = [
            'designation_id'     => $designation_id,
            'salary_desc_code'   => 'sd01',
            'monthly_amount'     => $staff->monthly_rate,
            'created_at'   => Now(),
            'created_by'   => Auth::user()->email,

          ];



        }

        echo "<pre>"; 
        print_r($position_data_set);
        echo "</pre>"; 

        

        $insert_position = DB::table("designation")->insert($position_data_set); 

        if ($insert_position)
        {
            $insert_salary = DB::table("designation_salary_package")->insert($salary_data_set);  
        }



       /*
       echo "<pre>";
       var_dump($salary_data_set);
       echo "</pre>";
       */

       
       

       $result = DB::table("temporary_migration")->get();
       $additional_pay_data_set = array();

       //Inserting Staff Records
       foreach ($result as $staff)
       {
          $bank_name = $staff->bank_name;

        
          $bin_code = Utilities::getBankBinCode($bank_name);
          $department_code = Utilities::getDepartment_code($staff->department);
          $job_category =  Utilities::getJobCategory($staff->job_category);

          if ($department_code=="")
          {
             // echo $staff->department;
          }
         
         
          $designation_id = Utilities::get_position_code(Str::title($staff->position));
          $staff_type = $staff->staff_type;
          $staff_id =  Utilities::get_staff_id($department_code, $job_category);
          $salary_desc_code = "sd01"; //it means Additional Pay
          
          $staff_data_set[] = [
            'staff_id'     => $staff_id,
            'first_name'     => $staff->first_name,
            'last_name'           => $staff->surname,
            'other_name'       => $staff->other_name,
            'gender'    => $staff->gender,
            'mobile_phone'    => $staff->phone,
            'email'    => $staff->email,
            'bin_code'    => $bin_code,
            'account_name'    => $staff->first_name." ".$staff->other_name." ".$staff->surname,
            'account_number'    => $staff->account_no,
            'bvn'    => $staff->bvn,
            'section_id'    => $staff->section,
            'designation_id'    => $designation_id,
            'status'    => 1,
            'staff_type_id'    => $staff_type,
            'created_at'   => Now(),
            'created_by'   => Auth::user()->email,
           ];

            if ($staff->additional_pay > 0)
            {
                $additional_pay_data_set[] = [
                    'staff_id'     => $staff_id,
                    'salary_desc_code'     => $salary_desc_code,
                    'monthly_amount'     => $staff->additional_pay,
                ];
            }
       }

       $insert_staff = DB::table("staff")->insert($staff_data_set); 

       if ($insert_staff)
       {
           $insert_staff_additional = DB::table("staff_other_allowances")->insert($additional_pay_data_set);  
       }

       
    } 
}
