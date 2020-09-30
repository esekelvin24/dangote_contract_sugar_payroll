<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use App\Model\Staff\DepartmentModel;
use App\Model\Staff\DesignationSalaryModel;
use App\Model\Staff\StaffModel;
use App\Model\Staff\StaffOtherAllowanceModel;
use App\Model\Staff\AttendanceModel;
use App\Model\Parameter;
use App\Model\Staff\PayrollModel;
use App\Model\Staff\PayrollHistoryLogModel;
use App\Http\Controllers\Staff\StaffTimeSheetController;
use Auth;
use DB;
use Exception;
use App\Model\Staff\PayrollViewModel;

class PayrollController extends Controller
{
    //
    public function create()
    {
       // $dept_arr = DepartmentModel::all();
       $staff_type = DB::table('staff_type')->get();
        return view('staff.generate_payroll_page', Utilities::get_menu_array(array("staff_type_list"=> $staff_type,"message"=>"none","code"=>"none")));
    }

    public function avail_dept(Request $request)
    {
        $new_date = $request->sel_date;
        $date_arr =  explode('-',$new_date);
        $sel_type = $request->sel_type;

        if (count($date_arr)>2)
        {
            $date = $date_arr[0].'-'.$date_arr[1].'-01';
        }

        

        $dept_of_month = PayrollHistoryLogModel::distinct('department_id')
        ->where('month_of','=',$date)
        ->where('staff_type_id','=',$sel_type)
        ->get();

        $dept_arr_iist = array();
        foreach ($dept_of_month as $dept)
        {
            $dept_arr_iist[] = $dept->department_id;
        }
        
        $list_of_dept = DepartmentModel::whereNotIn('department_id',$dept_arr_iist)
        ->get(['department_id','department_name']);

        $option = '<option value="#">Choose a Department</option>';
        foreach($list_of_dept as $dept)
        {
          $option = $option.'<option value="'.$dept->department_id.'">'.$dept->department_name.'</option>';
        }

        return $option;
        
    }

    

    public function create_monthly_payroll(Request $request)
    {
        $this->validate(request(), [
            'department_id' => 'required',
            'staff_type' => 'required',
            'new_date' => 'required',
            'staff_type' => 'required'
            
            
        ]);

      $data ="";
      $payroll_hist_data ="";
      $message = "";
      $code = "";
      $staff_type = DB::table('staff_type')->get();
      $pay_day = DB::table('parameter')->where('parameter_name','pay_day')->first()->parameter_value;
      

      $dept_id = $request->department_id;

      if ($dept_id=="#" || $dept_id =="") 
     {
        $message = 'Please select a department'; 
       // $code = "290";
        return redirect('/payroll-generation/create')->with('error',$message);
       // return view('staff.generate_payroll_page', Utilities::get_menu_array(array("staff_type_list"=> $staff_type,"code"=>$code,"message"=>$message)));
     }
      
      $date = $request->new_date;
      $date_arr = explode('-',$date);
                    //Year        -   Month        -   Day
      $month_of = $date_arr[0]."-".$date_arr[1]."-"."01";
     // $end_date = $date_arr[0]."-".$date_arr[1]."-"."31";
      
      $password = $request->pswd;
      
      $payroll_id = Utilities::paddZeros(Utilities::GenUniqID(date("Y-m-d"),date("H:i:s"))."".Utilities::getnextid("payroll"),20);
      
      $department = DepartmentModel::where('department_id', $dept_id)->first()->department_name;
     
      //dd($department);

      //checking if Payroll ID already Exist
      $payroll_check = DB::table('payroll_creation')->where('payroll_id', $payroll_id)->get();
      $rows = $payroll_check->toArray();

     if (count($rows) < 0) 
     {
        $message = 'Creating payroll, please try again later'; 
        $code = "215";
        return view('staff.generate_payroll_page', Utilities::get_menu_array(array("message"=>$message)));
     }    
            
            //inserting the payroll generation history
            $history_arr [] =
            [
                    'payroll_id' => $payroll_id,
                    'department_id' => $dept_id,
                    'created_by' => Auth::user()->email,
                    'created_at' => NOW(),
                    'month_of' => $month_of,
                    'staff_type_id' => $request->staff_type,
                    'pay_day' => $pay_day,
                    'status' => 0
            ];

            
            try
            {
                $payroll_hist_data = PayrollHistoryLogModel::insert($history_arr);
                if($payroll_hist_data )
                {
                            
                    $message = ' The payroll creation for '.$department.' department in the month of '.$this->date_to_year_month($month_of).' was successful ';
                           // $code = "200";
                     return redirect('/payroll-generation/create')->with('success',$message);
                }
            }
            catch(\Exception $exception)
            {
               
                
               $message = ' Duplicate payroll Creation for '.$department.' department in the month of '.$this->date_to_year_month($month_of).''; 
               // $code = "213";
               return redirect('/payroll-generation/create')->with('error',$message);
            }


       // return view('staff.generate_payroll_page', Utilities::get_menu_array(array("staff_type_list"=> $staff_type,"message"=>$message,"code"=>$code)));
    }
    

    private function date_to_year_month($dateValue)
    {
        $time=strtotime($dateValue);
        $month=date("F",$time);
        $year=date("Y",$time);

        return $month." ".$year;
    }

    public function cal_overtime($overtime_hrs = 0, $desg_salary = 0, $default_working_days = 0, $work_daily_hrs = 0)
    {
        $overtime = 0;
        if ($overtime_hrs > 0)
        {
            $overtime = (($desg_salary/$default_working_days) / $work_daily_hrs) * $overtime_hrs * 1.5 ;

        }
        return ($overtime);
    }
 
    
    public function update_payroll ($payroll_id) 
    {
     // echo $payroll_id;


      $payroll_details = DB::table('payroll_departmental_view')->where("payroll_id","=",$payroll_id)->get();
      $payroll_month = "";
     

        if (count($payroll_details) > 0)
        {
            foreach ($payroll_details as $payroll)
            {
                $department_id = $payroll->department_id;
                $payroll_month = $payroll->month_of;
                $staff_type = $payroll->staff_type_id;
                //$section_id = $payroll->section_id;
                $pay_day = $payroll->pay_day;
            }
        }

        
        $check_date = date("Y-m-t", strtotime($payroll_month));
        


       if ($payroll_details[0]->status == 1)
        {
            return redirect('/departmental-payroll-list')->with("error","This payroll has been closed and can not be updated, Kindly contact admin"); 
        }
       
    

      $staff_list = $this->staff_list_payroll($payroll_id, $department_id, $staff_type,$payroll_month);
    
      $end = date('Y-m-'.$pay_day, strtotime($payroll_month));
      $start = date("Y-m-d", strtotime("-1 month +1 day", strtotime($end)));
     
      $temp_date = strtotime($start);
      $start = date('Y-m-d H:i:s', $temp_date);

      $temp_date = strtotime($end. " 23:59");
      $end = date('Y-m-d H:i:s', $temp_date);

      $default_working_days = Parameter::where('parameter_name', 'monthly_work_days')->first()->parameter_value;
      
      $working_days_in_selected_month = $this->getWorkdays($start, $end, FALSE,  NULL) ; //plus means the current day was also counted
      $weekends = (int)StaffTimeSheetController::getWeekends($start, $end);
      
     

      $time_sheet = DB::table('staff_time_sheet_view')->where("department_id","=",$department_id)->where("staff_type_id","=",$staff_type)
      
      ->selectRaw('staff_id, SUM(ot) as total_ot, SUM(numb_days) as total_numb_days, (SUM(weekends)) as total_weekends, (SUM(absent)) as total_absent')
     // ->whereBetween("started_at", array($start, $end))
       ->where('started_at','>=', $start)
       ->where('expired_at', '<=', $end)
      ->groupBy('staff_id')
      ->get();


      if (count($time_sheet) < 1)
      {
        return redirect()->back()->with('error', 'No time sheet has been captured for this department and staff type');;
      }

      $absent = array();
      $present = array();
      $ot = array();
      $weekends_count = array();

     

      if(count($time_sheet) >0)// if time sheet has been captured get all the Overtime, Absents and present
      {
          foreach($time_sheet as $sheet)
          {
            $ot[$sheet->staff_id] = $sheet->total_ot;
            $absent[$sheet->staff_id]  = $sheet->total_absent; 
            $present[$sheet->staff_id]  = $sheet->total_numb_days;
            $weekends_count[$sheet->staff_id] = $sheet->total_weekends;
          }
      }
       
      
        return view('Staff.add_payroll_record_page', Utilities::get_menu_array(array("weekends_count" => $weekends_count,"weekends"=> $weekends ,"payroll_month"=> $payroll_month,"working_days"=>$working_days_in_selected_month, "present" => $present,"absent"=> $absent,"ot" => $ot,"time_sheet" => $time_sheet,"staff_list" => $staff_list,"sheet_id" => $payroll_id)));
      
    }


    public static function getWorkdays($date1, $date2, $workSat = FALSE, $patron = NULL) {
        if (!defined('SATURDAY')) define('SATURDAY', 6);
        if (!defined('SUNDAY')) define('SUNDAY', 0);
      
        // Array of all public festivities
        $publicHolidays = array('01-01', '01-06', '04-25', '05-01', '06-02', '08-15', '11-01', '12-08', '12-25', '12-26');
        // The Patron day (if any) is added to public festivities
        if ($patron) {
          $publicHolidays[] = $patron;
        }
      
        /*
         * Array of all Easter Mondays in the given interval
         */
        $yearStart = date('Y', strtotime($date1));
        $yearEnd   = date('Y', strtotime($date2));
      
        for ($i = $yearStart; $i <= $yearEnd; $i++) {
          $easter = date('Y-m-d', easter_date($i));
          list($y, $m, $g) = explode("-", $easter);
          $monday = mktime(0,0,0, date($m), date($g)+1, date($y));
          $easterMondays[] = $monday;
        }
      
        $start = strtotime($date1);
        $end   = strtotime($date2);
        $workdays = 0;
        for ($i = $start; $i <= $end; $i = strtotime("+1 day", $i)) {
          $day = date("w", $i);  // 0=sun, 1=mon, ..., 6=sat
          $mmgg = date('m-d', $i);
          if ($day != SUNDAY &&
            !in_array($mmgg, $publicHolidays) &&
            !in_array($i, $easterMondays) &&
            !($day == SATURDAY && $workSat == FALSE)) {
              $workdays++;
          }
        }
      
        return intval($workdays);
      }


    public function staff_list_payroll($payroll_id, $department_id, $staff_type,$payroll_month)
    {

        


        $pay_day = DB::table('payroll_creation')->where('payroll_id',$payroll_id)->first()->pay_day; //get pay day which is 25th of every month
      


        //$start = substr($payroll_month,0,8)."01";
        $end = date('Y-m-'.$pay_day, strtotime($payroll_month));
        $start = date("Y-m-d", strtotime("-1 month", strtotime($end)));

       

        $default_working_days = Parameter::where('parameter_name', 'monthly_work_days')->first()->parameter_value;

        $staff_array = DB::table('staff_time_sheet_view')->where("department_id","=",$department_id)->where("staff_type_id","=",$staff_type)
        //->selectRaw('staff_id, SUM(ot) as total_ot, SUM(numb_days) as total_numb_days, SUM(absent) as total_absent')
        ->selectRaw('staff_id')
        ->whereBetween("started_at", array($start, $end))
        ->groupBy('staff_id')
        ->get();

        $list = ""; //

        

        foreach ($staff_array as $va)
        {
              $list = $list."'".$va->staff_id."',";
        }
        $list = rtrim( $list,",");

        
        if ($list !="")
        {
            $staff_list = DB::select( 
                DB::raw("SELECT staff_view.staff_id,staff_view.staff_type_id,staff_view.staff_type_name, staff_view.first_name, staff_view.last_name,staff_view.designation_id, staff_view.other_name,staff_view.department_name, payroll_staff_record.payroll_id,  payroll_staff_record.arrears, payroll_staff_record.advance
                FROM staff_view 
                LEFT JOIN payroll_staff_record 
                ON payroll_staff_record.staff_id = staff_view.staff_id AND payroll_staff_record.payroll_id = '$payroll_id'  
                WHERE staff_view.staff_id IN ($list) AND staff_view.status = '1' AND staff_view.staff_type_id = '$staff_type' AND staff_view.department_id = '$department_id' GROUP BY staff_view.staff_id, staff_view.first_name, staff_view.last_name, staff_view.designation_id, staff_view.other_name,staff_view.department_name, payroll_staff_record.payroll_id, payroll_staff_record.arrears, payroll_staff_record.advance") );
                
        }else
        {
            $staff_list = DB::select( 
                DB::raw("SELECT staff_view.staff_id,staff_view.staff_type_id,staff_view.staff_type_name, staff_view.first_name, staff_view.last_name,staff_view.designation_id, staff_view.other_name,staff_view.department_name, payroll_staff_record.payroll_id,  payroll_staff_record.arrears, payroll_staff_record.advance
                FROM staff_view 
                LEFT JOIN payroll_staff_record 
                ON payroll_staff_record.staff_id = staff_view.staff_id AND payroll_staff_record.payroll_id = '$payroll_id'  
                WHERE staff_view.staff_id IN ('not_needed') AND staff_view.status = '1' AND staff_view.staff_type_id = '$staff_type' AND staff_view.department_id = '$department_id' GROUP BY staff_view.staff_id, staff_view.first_name, staff_view.last_name, staff_view.designation_id, staff_view.other_name,staff_view.department_name, payroll_staff_record.payroll_id, payroll_staff_record.arrears, payroll_staff_record.advance") );
         
        }
        //dd($staff_list);
           // dd($staff_list);
            return $staff_list;

            
    }

    
    
    public function save_payroll_staff_record($payroll_id, Request $request)
    {

        PayrollModel::where('payroll_id',$payroll_id)->delete();//delete record relating to this payroll and do a fresh insert since there are serveral corrections

        $payroll_details = PayrollHistoryLogModel::where("payroll_id","=",$payroll_id)->get(); //GET payroll details
        $department_id = "";

       

        $default_working_days = Parameter::where('parameter_name', 'monthly_work_days')->first()->parameter_value;
        $work_daily_hrs = Parameter::where('parameter_name', 'work_daily_hrs')->first()->parameter_value;
        $department = "";
         
        $advance = $request->advance;
        $arrears = $request->arrears;

        


        if (count($payroll_details) > 0)
        {
            foreach ($payroll_details as $details)
            {
                $department_id = $details->department_id;
                $payroll_month = $details->month_of;
                $staff_type = $details->staff_type_id;
                $pay_day = $details->pay_day;
            }
        }
         

        $staff_list = $this->staff_list_payroll($payroll_id, $department_id, $staff_type,$payroll_month);

        
        $end = date('Y-m-'.$pay_day, strtotime($payroll_month));
        $start = date("Y-m-d", strtotime("-1 month +1 day", strtotime($end)));

        $temp_date = strtotime($start);
        $start = date('Y-m-d H:i:s', $temp_date);

        $temp_date = strtotime($end. " 23:59");
        $end = date('Y-m-d H:i:s', $temp_date);


        $weekdays = $this->getWorkdays($start, $end, FALSE,  NULL) ; //plus means the current day was also counted
        $weekends_count = (int)StaffTimeSheetController::getWeekends($start, $end);
        
        $time_sheet = DB::table('staff_time_sheet_view')->where("department_id","=",$department_id)->where("staff_type_id","=",$staff_type)
      ->selectRaw('staff_id, SUM(ot) as total_ot, SUM(numb_days) as total_numb_days, (SUM(weekends)) as total_weekends, (SUM(absent)) as total_absent')
     // ->whereBetween("started_at", array($start, $end))
       ->where('started_at','>=', $start)
       ->where('expired_at', '<=', $end)
      ->groupBy('staff_id')
      ->get();

        

        $absent = array(); //store all the absent year for all staff using staff_id as the primary key
        $present = array(); //store all the present year for all staff using staff_id as the primary key
        $ot = array(); //store all the overtime year for all staff using staff_id as the primary key
        $weekends = array();

        //dd($time_sheet);

        if(count($time_sheet) > 0) 
        {
            foreach($time_sheet as $sheet)
            {
                //storing overtime, absents and present into the array
                $ot[$sheet->staff_id] = $sheet->total_ot;
              //  $absent[$sheet->staff_id]  = $default_working_days - ($sheet->total_numb_days + 2);
              //  $present[$sheet->staff_id]  = $sheet->total_numb_days + 2; // add 2 days to make it 26 because the default number of working days is 26 and not 24
              $absent[$sheet->staff_id]  =  $weekdays - ($sheet->total_numb_days );
              $present[$sheet->staff_id]  = $sheet->total_numb_days;
              $weekends[$sheet->staff_id] = $sheet->total_weekends;
            }
        }

        
        
        $insertion_arr = array();
         
        //getting the designations and salaries under selected department
        $salary_list = DB::table('designation_salary_view')->where('department_id', '=', $department_id) 
        ->get();

        $designation_id_list = array();
        
        foreach ($salary_list as $salary) 
        {
            $designation_id_list[] = $salary->designation_id;
        }
        
        //getting the list other staff allowance for expirence hire staff under the department
        $staff_other_allowance_list = StaffOtherAllowanceModel::groupBy('staff_id') 
        ->selectRaw('staff_id, sum(monthly_amount) as other_allowance')
        ->wherein('designation_id',$designation_id_list) 
        ->get();
        
        foreach ($staff_list as $staff) 
            {
               
           
                    $staff_id = $staff->staff_id;
                    $desg_id = $staff->designation_id;
                    $department = $staff->department_name;
                    $desg_salary = 0;
                    $payee = 0;
                    $absent_days = 0;
                    $staff_other_allw = 0;
                    $overtime_hrs = 0;
                    $present_days = 0;
                    $payee_after_ded = 0;
                    $cat_grp_id = Utilities::paddZeros(date('His').Utilities::getnextid("payroll_cat_id"),10);


                    //getting the gross salary for that designation which the select staff holds
                    foreach ($salary_list as $salary) 
                    {
                        if ($salary->designation_id == $desg_id)
                        {
                            $desg_salary = $salary->monthly_amount;
                        }
                    }
                    
                    

                    //checking and retriving staff other allowances if the staff is profiled as experience hire with addition allowances 
                    foreach ($staff_other_allowance_list as $other_allowance) 
                    {
                        if ($other_allowance->staff_id == $staff_id)
                        {
                            $staff_other_allw = $other_allowance->other_allowance;
                        }
                    }


                    
                    $overtime_hrs = $ot[$staff->staff_id];
                    $present_days = $present[$staff->staff_id];
                    $week_ends = $weekends[$staff->staff_id];

                    
                    // $saturdays_in_month = 4;
                    
                    $absent_days =  ($weekdays - ($present[$staff->staff_id] )); 

                   
                    $estimated_workday_gap = $default_working_days - $weekdays; //gap betwween default working days and weekdays in the duration
                  


                   
                    $overtime = $this->cal_overtime($overtime_hrs, ($desg_salary + $staff_other_allw), $default_working_days, $work_daily_hrs);
                    $overtime = round($overtime,2);

                    $payee_after_ded = $this->cal_payee(($desg_salary + $staff_other_allw + $overtime + $arrears[$staff_id])) * -1;                     
                    $payee_after_ded = round($payee_after_ded,2);
                   
                    
                    $net_salary = ($desg_salary + $staff_other_allw) - ($payee_after_ded * -1); //Net salary after removing payee

                    $daily_net_salary = ($net_salary / ($weekdays + $estimated_workday_gap)) * -1; //Daily Net salary
                    $daily_net_salary = round($daily_net_salary,2);
                   
                    $staff_type = $payroll_details[0]->staff_type_id;

                    if ($absent_days == $weekdays) //if the staff never came to work through out this month
                    {
                        $absent_deduction = round($daily_net_salary * ($absent_days + $estimated_workday_gap),2) ;
                    }else
                    {
                        $absent_deduction = round($daily_net_salary * ($absent_days),2); //for temporary staff deduct only the absent days from the net salary
                    }
                    
                    $daily_net_salary = $daily_net_salary * -1;

                    if($staff_type == "ST02") //casual staff
                    {
                        $absent_deduction = 0;
                        //$absent_deduction = round($daily_net_salary * ($absent_days),2);

                        $present_days = $present_days +  $week_ends;
                        
                        $casual_payment = $daily_net_salary * $present_days;
                        

                        $insertion_arr[] = [
                            'payroll_id' => $payroll_id,
                            'staff_id' => $staff_id,
                            'payment_type' => 'Addition',
                            'payment_description' => $present_days.' Days Wages',
                            'cat_group_id' => $cat_grp_id,
                            'amount' => strval($casual_payment),
                            'created_at' => NOW(),
                            'created_by' => Auth::user()->email,
                            'absence_from_work' => $absent_days,
                            'days_worked' => $present_days,
                            'month_of' => $payroll_month,
                            'advance' => strval($advance[$staff_id]),
                            'arrears' => strval($arrears[$staff_id]),
                            'overtime_hrs' => $overtime_hrs,
                            'overtime_pay' => strval($overtime),
                            'entry_order' => 1,
                            'payee' => strval($payee_after_ded), 
                            'gross_salary' => strval($desg_salary + $staff_other_allw),
                            'default_working_days' => $default_working_days,
                            'absent_deduction' => strval($absent_deduction),
                            'daily_net_salary' => strval($daily_net_salary)
            
                        ];


                    }

                    
                    if($staff_type == "ST01") //Temporary staff
                    {
                   
                    $insertion_arr[] = [
                            'payroll_id' => $payroll_id,
                            'staff_id' => $staff_id,
                            'payment_type' => 'Addition',
                            'payment_description' => 'Gross Salary',
                            'cat_group_id' => $cat_grp_id,
                            'amount' => strval($desg_salary),
                            'created_at' => NOW(),
                            'created_by' => Auth::user()->email,
                            'absence_from_work' => $absent_days,
                            'days_worked' => $present_days,
                            'month_of' => $payroll_month,
                            'advance' => strval($advance[$staff_id]),
                            'arrears' => strval($arrears[$staff_id]),
                            'overtime_hrs' => $overtime_hrs,
                            'overtime_pay' => strval($overtime),
                            'entry_order' => 1,
                            'payee' => strval($payee_after_ded), 
                            'gross_salary' => strval($desg_salary + $staff_other_allw),
                            'default_working_days' => $default_working_days,
                            'absent_deduction' => strval($absent_deduction),
                            'daily_net_salary' => strval($daily_net_salary)
            
                        ];

                    }

                    if($staff_type == "ST01") //Temporary staff
                    {
                        $insertion_arr[] = [
                            'payroll_id' => $payroll_id,
                            'staff_id' => $staff_id,
                            'payment_type' => 'Deduction',
                            'cat_group_id' => $cat_grp_id,
                            'payment_description' => 'Payee',
                            'amount' => strval($payee_after_ded),
                            'created_at' => NOW(),
                            'created_by' => Auth::user()->email,
                            'absence_from_work' => $absent_days,
                            'days_worked' => $present_days,
                            'advance' => strval($advance[$staff_id]),
                            'arrears' => strval($arrears[$staff_id]),
                            'month_of' => strval($payroll_month),
                            'overtime_hrs' => $overtime_hrs,
                            'overtime_pay' => strval($overtime),
                            'entry_order' => 3, 
                            'payee' => strval($payee_after_ded), 
                            'gross_salary' => strval($desg_salary + $staff_other_allw),
                            'default_working_days' => $default_working_days,
                            'absent_deduction' => strval($absent_deduction),
                            'daily_net_salary' => strval($daily_net_salary)
            
                        ];
                    }

                        if ($staff_other_allw > 0)
                        {
                            $insertion_arr[] = [
                                'payroll_id' => $payroll_id,
                                'staff_id' => $staff_id,
                                'payment_type' => 'Addition',
                                'cat_group_id' => $cat_grp_id,
                                'payment_description' => 'Additional Pay',
                                'amount' => strval($staff_other_allw),
                                'created_at' => NOW(),
                                'created_by' => Auth::user()->email,
                                'absence_from_work' => $absent_days,
                                'days_worked' => $present_days,
                                'advance' => strval($advance[$staff_id]),
                                'arrears' => strval($arrears[$staff_id]),
                                'month_of' => $payroll_month,
                                'overtime_hrs' => $overtime_hrs,
                                'overtime_pay' => strval($overtime),
                                'entry_order' => 5, 
                                'payee' => strval($payee_after_ded), 
                                'gross_salary' => strval($desg_salary + $staff_other_allw),
                                'default_working_days' => $default_working_days,
                                'absent_deduction' => strval($absent_deduction),
                                'daily_net_salary' => strval($daily_net_salary)
                
                            ];
                        }
                        
                    if ($overtime > 0)
                    {
                        $insertion_arr[] = [
                            'payroll_id' => $payroll_id,
                            'staff_id' => $staff_id,
                            'payment_type' => 'Addition',
                            'cat_group_id' => $cat_grp_id,
                            'payment_description' => 'Overtime',
                            'amount' => strval($overtime),
                            'created_at' => NOW(),
                            'created_by' => Auth::user()->email,
                            'absence_from_work' => $absent_days,
                            'days_worked' => $present_days,
                            'advance' => $advance[$staff_id],
                            'arrears' => $arrears[$staff_id],
                            'month_of' => $payroll_month,
                            'overtime_hrs' => $overtime_hrs,
                            'overtime_pay' => strval($overtime),
                            'entry_order' => 4, 
                            'payee' => strval($payee_after_ded), 
                            'gross_salary' => $desg_salary + $staff_other_allw,
                            'default_working_days' => $default_working_days,
                            'absent_deduction' => $absent_deduction,
                            'daily_net_salary' => strval($daily_net_salary)
            
                        ];
                    }
                        
                    


                        if ($advance[$staff_id] > 0)
                        {
                            $ad_amount =  $advance[$staff_id] * -1;
                            $ad_amount = round($ad_amount,2);
                            $insertion_arr[] = [
                                'payroll_id' => $payroll_id,
                                'staff_id' => $staff_id,
                                'payment_type' => 'Deduction',
                                'cat_group_id' => $cat_grp_id,
                                'payment_description' => 'Salary Advance',
                                'amount' => strval($ad_amount),
                                'created_at' => NOW(),
                                'created_by' => Auth::user()->email,
                                'absence_from_work' => $absent_days,
                                'days_worked' => $present_days,
                                'advance' => strval($advance[$staff_id]),
                                'arrears' => strval($arrears[$staff_id]),
                                'month_of' => $payroll_month,
                                'overtime_hrs' => $overtime_hrs,
                                'overtime_pay' => strval($overtime),
                                'entry_order' => 6, 
                                'payee' => strval($payee_after_ded), 
                                'gross_salary' => strval($desg_salary + $staff_other_allw),
                                'default_working_days' => $default_working_days,
                                'absent_deduction' => strval($absent_deduction),
                                'daily_net_salary' => strval($daily_net_salary)
                
                            ];

                        }else //remove thie Addition
                        {
                            PayrollModel::where("payroll_id","=",$payroll_id)
                            ->where("staff_id","=",$staff_id)
                            ->where("payment_description","=","Salary Advance")->delete(); 
                        }

                        if ($arrears[$staff_id] > 0 )
                        {
                            $ar_money = $arrears[$staff_id] * 1;
                            $ar_money = round($ar_money,2);
                            $insertion_arr[] = [
                                'payroll_id' => $payroll_id,
                                'staff_id' => $staff_id,
                                'payment_type' => 'Addition',
                                'cat_group_id' => $cat_grp_id,
                                'payment_description' => 'Salary Arrears',
                                'amount' => strval($ar_money),
                                'created_at' => NOW(),
                                'created_by' => Auth::user()->email,
                                'absence_from_work' => $absent_days,
                                'days_worked' => $present_days,
                                'advance' => strval($advance[$staff_id]),
                                'arrears' => strval($arrears[$staff_id]),
                                'month_of' => $payroll_month,
                                'overtime_hrs' => $overtime_hrs,
                                'overtime_pay' => strval($overtime),
                                'entry_order' => 7, 
                                'payee' => strval($payee_after_ded), 
                                'gross_salary' => strval($desg_salary + $staff_other_allw),
                                'default_working_days' => $default_working_days,
                                'absent_deduction' => strval($absent_deduction),
                                'daily_net_salary' => strval($daily_net_salary)
                
                            ]; 
                        }else //remove thie Addition
                        {
                            PayrollModel::where("payroll_id","=",$payroll_id)
                            ->where("staff_id","=",$staff_id)
                            ->where("payment_description","=","Salary Arrears")->delete();
                        }

 
                        if ($absent_days > 0)
                        {
                           
                            

                           // dd($absent_deduction);
                            $insertion_arr[] = [
                                'payroll_id' => $payroll_id,
                                'staff_id' => $staff_id,
                                'payment_type' => 'Deduction',
                                'cat_group_id' => $cat_grp_id,
                                'payment_description' => 'Absent From Work',
                                'amount' => strval($absent_deduction),
                                'created_at' => NOW(),
                                'created_by' => Auth::user()->email,
                                'absence_from_work' => $absent_days,
                                'days_worked' => $present_days,
                                'advance' => strval($advance[$staff_id]),
                                'arrears' => strval($arrears[$staff_id]),
                                'month_of' => $payroll_month,
                                'overtime_hrs' => $overtime_hrs,
                                'overtime_pay' => strval($overtime),
                                'entry_order' => 2, 
                                'payee' => strval($payee_after_ded), 
                                'gross_salary' => strval($desg_salary + $staff_other_allw),
                                'default_working_days' => $default_working_days,
                                'absent_deduction' => strval($absent_deduction),
                                'daily_net_salary' => strval($daily_net_salary)
                
                            ];
                        }
                        
                         
               
                
                for ($i = 0; $i < count($insertion_arr); $i++)
                {  
                

                           $data = PayrollModel::insert($insertion_arr[$i]); 

                  
                    
                   
                }    
                $insertion_arr = null;

            }


      $payroll_details = DB::table('payroll_departmental_view')->where("payroll_id","=",$payroll_id)->get();
      $payroll_month = "";

        if (count($payroll_details) > 0)
        {
            foreach ($payroll_details as $payroll)
            {
                $department_id = $payroll->department_id;
                $payroll_month = $payroll->month_of;
                $staff_type = $payroll->staff_type_id;
               // $section_id = $payroll->section_id;
            }
        }

      
     //******************** */ $staff_list = $this->staff_list_payroll($payroll_id, $department_id, $staff_type);
      
     

      //get list of absenties for the month

      $start = substr($payroll_month,0,8)."01";
      $end = substr($payroll_month,0,8)."31";

      $temp_date = strtotime($start);
      $start = date('Y-m-d H:i:s', $temp_date);

      $temp_date = strtotime($end. " 23:59");
      $end = date('Y-m-d H:i:s', $temp_date);
      
      /*$time_sheet = DB::table('staff_time_sheet_view')->where("department_id","=",$department_id)
      ->selectRaw('staff_id,SUM(ot) as total_ot, SUM(numb_days) as total_numb_days, SUM(absent) as total_absent')
      ->whereBetween("started_at", array($start , $end ))
      ->groupBy('staff_id')
      ->get();

      $absent = array();
      $present = array();
      $ot = array();

      //dd($time_sheet);

      if(count($time_sheet) >0) 
      {
          foreach($time_sheet as $sheet)
          {
            $ot[$sheet->staff_id] = $sheet->total_ot;
            $absent[$sheet->staff_id]  = $sheet->total_absent;
            $present[$sheet->staff_id]  = $sheet->total_numb_days;
          }
      }*/
       // $message = "Payroll Update has been done successfully";
       // $code = "200";

        //return view('Staff.add_payroll_record_page', Utilities::get_menu_array(array("message" => $message, "code" => $code, "present" => $present,"absent"=> $absent,"ot" => $ot,"time_sheet" => $time_sheet,"staff_list" => $staff_list,"sheet_id" => $payroll_id)));
      
        return redirect('/payroll-list/'.$payroll_id.'/update')->with('success','Payroll Update has been done successfully');
        

    }

    public function cal_payee($monthly_growths = 0)
    {
        $payee = 0;
        
        //calculating relief
        $monthly_growths = $monthly_growths - (0.2 * $monthly_growths + 16666.67);
        
        
        //end of calculating relief
        
        if ($monthly_growths <= 25000)
        {
            $payee = $monthly_growths * 7 / 100;
        }
        else if ($monthly_growths > 25000 && $monthly_growths <=50000)
        {
           $payee = 1750 + (($monthly_growths - 25000) * 11 / 100);
        }
        else if ($monthly_growths > 50000 && $monthly_growths <=91666)
        {
           $payee = 4500 + (($monthly_growths - 50000) *15/100);
        }
        else if ($monthly_growths > 91666 && $monthly_growths <=133332)
        {
          $payee = 10749.9 + (($monthly_growths - 91666) *19/100);
        }
        else if ($monthly_growths > 133332 && $monthly_growths <=266665)
        {
          $payee = 18666.44 + (($monthly_growths - 133332) * 21/100);
        }else
        {
           $payee = 46666.37 + (($monthly_growths - 266665) * 24/100);
        }
       
       
        return $payee;
    }

    public function approve_payroll(Request $request)
    {
    
       $rules = [
           "payroll_id" => "required"
       ];

       $this->validate($request, $rules);
       
      $payroll_details = DB::table('payroll_creation')->where('payroll_id', $request->payroll_id)->get();

      if(count($payroll_details) > 0)
      {

       $month_of = $payroll_details[0]->month_of;
       $department_id = $payroll_details[0]->department_id;
       $staff_type = $payroll_details[0]->staff_type_id;
       $pay_day = DB::table('parameter')->where('parameter_name','pay_day')->first()->parameter_value;
      
       $end = date('Y-m-'.$pay_day, strtotime($month_of));
       $start = date("Y-m-d", strtotime("-1 month +1 day", strtotime($end)));

       $time_sheet = DB::table('time_sheet')->where("department_id","=",$department_id)->where("staff_type_id","=",$staff_type)
        ->where('started_at','>=', $start)
        ->where('expired_at', '<=', $end)
       ->update(["status" => 2]);

        $status =  DB::table('payroll_creation')
        ->where('payroll_id', $request->payroll_id)
        ->update(["status"=> 1]);
      }
     

      echo $request->payroll_id;


    }

    public function approve_monthly_payroll($dept_id = "", Request $request)
    {

      
        $role_arr = Auth::user()->roles;
        $role = $role_arr->pluck('id');

        
        if($role[0] == 2 || $role[0] == 1)
        {
              
        }else
        {
            return redirect('/not-authorized');
        }



        if ($request->date_filter == "created")
        {
            $date = "created_at";
        }else
        {
            $date = "month_of";
        }

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                if(!empty($request->department) )
                {
                    $data = DB::table("payroll_departmental_view")->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                        ->where("department_id", "=" , $request->department)
                        ->where("status", "LIKE" , "%".$request->status."%")
                        ->selectRaw('monthly_net, month_of,payroll_id, department_id,staff_type_name,  created_by, created_at, department_name, status')
                        ->get();

                   
               }else
               {

                   $data = DB::table("payroll_departmental_view")->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                        ->where("status", "LIKE" , "%".$request->status."%")
                        ->selectRaw('monthly_net, month_of,payroll_id, department_id,staff_type_name,  created_by, created_at, department_name, status')
                        ->get();

               }
            }
            else
            {
                if(!empty($request->department) )
                {
                    $data = DB::table("payroll_departmental_view")->where("department_id", "=" , $request->department)
                        ->where("status", "LIKE" , "%".$request->status."%")
                        ->selectRaw('monthly_net, month_of, payroll_id, department_id,staff_type_name, created_by, created_at, department_name, status')
                        ->get();

                   
               }else
               {
                    $data =DB::table("payroll_departmental_view")->distinct('month_of')
                    ->where("status", "LIKE" , "%".$request->status."%")
                    ->selectRaw('monthly_net, month_of,payroll_id, department_id,staff_type_name, created_by, created_at, department_name, status')
                    
                    ->get();
               }
                        

                        
                    
    
            }

            return datatables()->of($data)->make(true);
        }
        $dept_arr = DepartmentModel::all();
        return view('staff.approve_payroll_list_page', Utilities::get_menu_array(array('dept_id'=>$dept_id, "dept_array_list"=> $dept_arr)));
  }


    public function departmental_payroll_list($dept_id = "", Request $request)
    {
        if ($request->date_filter == "created")
        {
            $date = "created_at";
        }else
        {
            $date = "month_of";
        }

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                if(!empty($request->department) )
                {
                    $data = DB::table("payroll_departmental_view")->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                        ->where("department_id", "=" , $request->department)
                        ->where("status", "LIKE" , "%".$request->status."%")
                        ->selectRaw('monthly_net, month_of,payroll_id, department_id,staff_type_name,  created_by, created_at, department_name, status')
                        ->get();

                   
               }else
               {

                   $data = DB::table("payroll_departmental_view")->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                        ->where("status", "LIKE" , "%".$request->status."%")
                        ->selectRaw('monthly_net, month_of,payroll_id, department_id,staff_type_name,  created_by, created_at, department_name, status')
                        ->get();

               }
            }
            else
            {
                if(!empty($request->department) )
                {
                    $data = DB::table("payroll_departmental_view")->where("department_id", "=" , $request->department)
                        ->where("status", "LIKE" , "%".$request->status."%")
                        ->selectRaw('monthly_net, month_of, payroll_id, department_id,staff_type_name, created_by, created_at, department_name, status')
                        ->get();

                   
               }else
               {
                    $data =DB::table("payroll_departmental_view")->distinct('month_of')
                    ->where("status", "LIKE" , "%".$request->status."%")
                    ->selectRaw('monthly_net, month_of,payroll_id, department_id,staff_type_name, created_by, created_at, department_name, status')
                    
                    ->get();
               }
                        

                        
                    
    
            }

            return datatables()->of($data)->make(true);
        }
        $dept_arr = DepartmentModel::all();
        return view('staff.payroll_list_page', Utilities::get_menu_array(array('dept_id'=>$dept_id, "dept_array_list"=> $dept_arr)));
    }


    public function payroll_list_casual_by_payroll_id($payroll_id, Request $request)
    {
        if ($request->date_filter == "created")
        {
            $date = "created_at";
        }else
        {
            $date = "month_of";
        }

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                    $data = DB::table("payroll_view")->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->where("payroll_id", "=" , $payroll_id)
                    ->get();
            }
            else
            {
                        $data = DB::table("payroll_view")->where("payroll_id", "=" , $payroll_id)
                       
                       ->get();

                    
    
            }

            return datatables()->of($data)->make(true);
        }
        $dept_arr = DepartmentModel::all();
        $dep = PayrollViewModel::where('payroll_id', $payroll_id);
        $department_name = isset($dep->first()->department_name)?$dep->first()->department_name:""; 
       
        return view('staff.payroll_list_casual_staff_page', Utilities::get_menu_array(array("payroll_id" => $payroll_id,"dept_array_list"=> $dept_arr, "department_name" => $department_name)));  
    }


    public function payroll_list_by_payroll_id($payroll_id, Request $request)
    {
       

       
        $check =  PayrollHistoryLogModel::where('payroll_id', $payroll_id)->get();
        if($check[0]->staff_type_id == 'ST02') //check of payroll staff type is casual
        {
           return  redirect ('/payroll-list-casual/payroll-id/'.$payroll_id);
        }

        if ($request->date_filter == "created")
        {
            $date = "created_at";
        }else
        {
            $date = "month_of";
        }

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                    $data = DB::table("payroll_view")->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->where("payroll_id", "=" , $payroll_id)
                    ->get();
            }
            else
            {
                        $data = DB::table("payroll_view")->where("payroll_id", "=" , $payroll_id)
                       
                       ->get();

                    
    
            }

            return datatables()->of($data)->make(true);
        }

        $dept_arr = DepartmentModel::all();
        $dep = PayrollViewModel::where('payroll_id', $payroll_id);

       
        $department_name = isset($dep->first()->department_name)?$dep->first()->department_name:""; 
       
        return view('staff.payroll_list_staff_page', Utilities::get_menu_array(array("payroll_id" => $payroll_id,"dept_array_list"=> $dept_arr, "department_name" => $department_name)));
    }


    public function payroll_list_by_payroll_id_staff_id($payroll_id = "", $staff_payroll_cat_id = "", Request $request)
    {

        
        $staff_details = PayrollViewModel::where('payroll_id', $payroll_id)->where('cat_group_id', $staff_payroll_cat_id)->first();
      
        $pay_day = $staff_details->pay_day;
        $department_name =  $staff_details->first()->department_name; 
        $month_of =  $staff_details->first()->month_of; 
        $designation_name =  $staff_details->first()->designation_name; 
        $dept_arr = DepartmentModel::all();

        $firstname = $staff_details->first()->first_name; 
        $lastname = $staff_details->first()->last_name; 
        $othername = $staff_details->first()->other_name; 
        $full_name = $firstname ." ".$othername." ".$lastname;

       // dd($staff_details->first()->other_name);
        $end = date('Y-m-'.$pay_day, strtotime($month_of));
        $start = date("Y-m-d", strtotime("-1 month +1 day", strtotime($end)));
       
        $temp_date = strtotime($start);
        $start = date('Y-m-d H:i:s', $temp_date);
  
        $temp_date = strtotime($end. " 23:59");
        $end = date('Y-m-d H:i:s', $temp_date);
  
        $default_working_days = $this->getWorkdays($start, $end, FALSE,  NULL) ; //plus means the current day was also counted
        

        $data = PayrollModel::where("cat_group_id", "=" , $staff_payroll_cat_id)
                ->orderby("entry_order","asc")
                ->get();

           
        
        $upper_form = array("default_working_days"=>$default_working_days, 
        "full_name" => $full_name, 
        "designation_name" =>$designation_name, 
        "month_of" => $month_of, 
        "department_name"=>$department_name,
        "payroll_id" => $payroll_id, 
        "staff_cat_id" => $staff_payroll_cat_id,
        "dept_array_list"=> $dept_arr,
        "staff_type_id" => $staff_details->staff_type_id,
        "data" =>$data);

                
        
       return view('staff.payroll_staff_details_page', Utilities::get_menu_array($upper_form));
    
    }



    public function payroll_approval_list($dept_id = "", Request $request)
    {
        if ($request->date_filter == "created")
        {
            $date = "created_at";
        }else
        {
            $date = "month_of";
        }

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                if(!empty($request->department) )
                {
                    $data = PayrollViewModel::groupBy('payroll_id') 
                        ->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                        ->where("department_id", "=" , $request->department)
                        ->distinct('month_of')
                        ->selectRaw('month_of,payroll_id, department_id, SUM(monthly_net) as total_amt, created_by, created_at, department_name, status')
                        ->get();

                   
               }else
               {

                   $data = PayrollViewModel::groupBy('payroll_id') 
                        ->whereBetween($date, array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                        ->distinct('month_of')
                        ->selectRaw('month_of,payroll_id, department_id, SUM(monthly_net) as total_amt, created_by, created_at, department_name, status')
                        ->get();

               }
            }
            else
            {
                if(!empty($request->department) )
                {
                    $data = PayrollViewModel::groupBy('payroll_id') 
                        ->where("department_id", "=" , $request->department)
                        ->distinct('month_of')
                        ->selectRaw('month_of, payroll_id, department_id, SUM(monthly_net) as total_amt, created_by, created_at, department_name, status')
                        ->get();

                   
               }else
               {
                    $data = PayrollViewModel::groupBy('payroll_id') 
                    ->distinct('month_of')
                    ->selectRaw('month_of,payroll_id, department_id, SUM(monthly_net) as total_amt, created_by, created_at, department_name, status')
                    ->get();
               }
                        

                        
                    
    
            }

            return datatables()->of($data)->make(true);
        }
        $dept_arr = DepartmentModel::all();
        return view('staff.payroll_approve_list_page', Utilities::get_menu_array(array('dept_id'=>$dept_id, "dept_array_list"=> $dept_arr)));
    }

    public function payroll_action($op, $payroll_id)
    {
        $update_by = Auth::user()->email;
        
        $status = "";

        if($op == "approve")
        {
          $status = "1";
        }else if($op == "cancel")
        {
          $status = "2";

        }else
        {
          return -1; 
        }
        
        $payroll_status = PayrollModel::where('payroll_id', $payroll_id)->first()->status;
     

        try
        {
            $payroll_status = PayrollModel::where('payroll_id', $payroll_id)->first()->status;

            if ($payroll_status == 0)
            {
               // $res = PayrollModel::where('payroll_id', $payroll_id)
               // ->update(['status' => $status, "updated_by" => $update_by ]);

               $res =  $payroll_id = rtrim($payroll_id,",");
                PayrollModel::whereIn('payroll_id',explode(",",$payroll_id))->update(['status' => $status, "updated_by" => $update_by ]);

                
            }
            else
            {
                
                return -2; //request can not be cancelled bcos it has already been cancelled
                
            }

        }
        catch(\Exception $exception)
        {
            return -3;
            //Invalid payroll ID
        }
        return $res;
        
    }

    
}
