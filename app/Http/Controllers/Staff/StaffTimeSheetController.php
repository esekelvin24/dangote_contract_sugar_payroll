<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
//use DB;
use App\Model\Staff\StaffTimeSheetModel;
use App\Model\Staff\DepartmentModel;
use App\Model\Staff\TimeSheetModel;
use App\Model\Staff\AttendanceModel;
use App\Model\Staff\StaffModel;
use App\Model\Parameter;
use App\Http\Controllers\Staff\PayrollController;
use DB;
use Auth;
use DateTime;

class StaffTimeSheetController extends Controller
{

    public function time_sheet_create()
    {
        $dept_arr = DepartmentModel::all();
        $staff_type = DB::table('staff_type')->get();
        
        $page_array = array("msg" => "", "dept_array_list"=> $dept_arr, "staff_type" => $staff_type);

        return view('staff.print_timesheet_page', Utilities::get_menu_array($page_array));
    }


    public function time_sheet_delete($time_sheet_id)
    {


       
       $result = DB::table('time_sheet')->where('sheet_id', $time_sheet_id)->where('status',1)->delete();

       if($result == 1)
       {
        $result = DB::table('time_sheet_capture')->where('sheet_id', $time_sheet_id)->where('status',1)->delete();
       }
       echo $result;

    }

    public function capture_time_sheet(Request $request)
    {
        
            $builder = TimeSheetModel::query();
            $dept_id = isset($request->department_id)?$request->department_id:"";
            $staff_type_id = isset($request->staff_type)?$request->staff_type:"";
            
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                 $builder->whereBetween('started_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"));
            }

            if (isset($request->department_id) && !empty($request->department_id))
            {
                $builder->where('department_id', $request->department_id);
            } 

            if (isset($request->staff_type) && !empty($request->staff_type))
            {
                $builder->where('staff_type_id', $request->staff_type);
            }

            $timesheet = $builder->get();
        
     

       

        $dept_arr = DepartmentModel::all();
        $staff_type = DB::table('staff_type')->get();
       
        return view ('staff.time_sheet_list_page', Utilities::get_menu_array(array("staff_type_id" => $staff_type_id, "dept_id"=> $dept_id,"request" =>$request,"timesheet"=> $timesheet, "staff_type" => $staff_type, 'dept_id'=>$dept_id, "dept_array_list"=> $dept_arr)));
    }

    
    
    //
    public function index( $dept_id = "", Request $request)
    {
        
       
       
        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                
                 $data = StaffTimeSheetModel::whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                 ->where("department_id", "=" , $request->department)
                 //->where("sheet_id", "LIKE" , "%".$request->sheet_id."%")
                ->get();
            }
            else
            {
                    if(!empty($request->department) )
                    {
                        $data = StaffTimeSheetModel::where("department_id", "=" , $request->department)
                        ->get();

                    }else
                    {
                        $data = StaffTimeSheetModel::where("sheet_id", "LIKE" , "%".$request->sheet_id."%")
                        ->get();
                    }
    
            }

            return datatables()->of($data)->make(true);
        }

        $dept_arr = DepartmentModel::all();
        return view ('staff.staff_time_sheet_list_page', Utilities::get_menu_array(array('dept_id'=>$dept_id, "dept_array_list"=> $dept_arr)));
    }

    public function save_timesheet_record($sheet_id,Request $request)
    {

        
        

        $department_id = "";
        $staff_type = "";
        $section_id = "";
        $sheet_details = TimeSheetModel::where("sheet_id","=",$sheet_id)->get();
        
        $absent = $request->absent;
        $ot = $request->ot;
        $numb_days = $request->numb_days;
        $weekends = $request->weekends;
        $no_of_staff_sent = count($numb_days);

       

        $default_working_days = ((strtotime($sheet_details[0]->expired_at) - strtotime($sheet_details[0]->started_at)) / (60 * 60 * 24)) + 1 ;
        
    
         $weekends_count = (int)$this->getWeekends($sheet_details[0]->started_at, $sheet_details[0]->expired_at);
       
         $weekdays = PayrollController::getWorkdays($sheet_details[0]->started_at, $sheet_details[0]->expired_at, FALSE, NULL);
        

        




        //$default_working_days = Parameter::where('parameter_name', 'work_days')->first()->parameter_value;
        $max_ot = Parameter::where('parameter_name', 'max_ot')->first()->parameter_value;

        if (count($sheet_details) > 0)
        {
            foreach ($sheet_details as $details)
            {
                $department_id = $details->department_id;
                $staff_type = $details->staff_type_id;
                $section_id = $details->section_id=="#"?"":$details->section_id;
               
            }
        }
        

        $staff_list = $this->staff_list_timesheet($sheet_id, $department_id, $section_id, $staff_type);

        $update = "0";
        
       if(count($staff_list) == $no_of_staff_sent)
       { //If Number of staff sent is different from number of staff in the DB throw error

            foreach( $staff_list as $staff ) 
            {

                if ($numb_days[$staff->staff_id] > $weekdays)
                {
                    $numb_days[$staff->staff_id] = $weekdays;
                }

                
                if ($weekends[$staff->staff_id] > $weekends_count)
                {
                    $weekends[$staff->staff_id] = $weekends_count;
                }

                
                
                
                if($ot[$staff->staff_id] > $max_ot)
                {
                    $ot[$staff->staff_id] = $max_ot;
                }

                $absent[$staff->staff_id] = ($weekdays - $numb_days[$staff->staff_id]);  

                $dataSet = [
                    'sheet_id'     => $sheet_id,
                    'staff_id'     => $staff->staff_id,
                    'ot'           => $ot[$staff->staff_id],
                    'absent'       => $absent[$staff->staff_id],
                    'numb_days'    => $numb_days[$staff->staff_id],
                    'weekends'     => $weekends[$staff->staff_id],
                    'created_at'   => Now(),
                    'created_by'   => Auth::user()->email,
                    'status'       => 1,
                ];

                

                try
                {
                    $update = StaffTimeSheetModel::firstOrCreate($dataSet);

                }catch(\Exception $e){

                    
                    unset($dataSet["sheet_id"]); 
                    unset($dataSet["staff_id"]); 

                    $update = StaffTimeSheetModel::where('sheet_id', $sheet_id)
                    ->where('staff_id', $staff->staff_id)
                    ->update($dataSet);
                }
            }

                    if($update) //if insert or updat is successful
                    {
                        $message = "Time sheet record has been saved successfully";
                        return redirect('/time-sheet-list/'.$sheet_id.'/add-timesheet-record')->with('success',$message);
                    }else
                    {
                        $message = "An error occured while trying to save timesheet attendance";
                        return redirect('/time-sheet-list/'.$sheet_id.'/add-timesheet-record')->with('error',$message);
                        
                    }
            }else
            {
             $message = "Invalid Staff Record, Kindly contact the system admin";
             return redirect('/time-sheet-list/'.$sheet_id.'/add-timesheet-record')->with('error',$message);
            
            }

       
       
        
         //return view('Staff.add_timesheet_record_page', Utilities::get_menu_array(array("code" => $code,"message" => $message,"staff_list"=> $staff_list,"sheet_id" => $sheet_id)));
       
        



    }


    public function add_timesheet_record ($timesheet_id)
    {
       
       
        $department_id = "";
        $staff_type = "";
        $section_id = "";
        $status = "";
        $sheet_details = TimeSheetModel::where("sheet_id","=",$timesheet_id)->get();

        


        if (count($sheet_details) > 0)
        {
            foreach ($sheet_details as $details)
            {
                $department_id = $details->department_id;
                $staff_type = $details->staff_type_id;
                $section_id = $details->section_id=="#"?"":$details->section_id;
                $expiration_date = $details->expired_at." 23:59";
                $status = $details->status;
            }
        }
        
       
        if ($status == "2")
        {
            return redirect('/capture-time-sheet')->with("error","The payroll of this timesheet is closed, This can not be modify"); 
        }

        $staff_list = $this->staff_list_timesheet($timesheet_id, $department_id, $section_id, $staff_type);
        //DB::enableQueryLog(); // Enable query log

        $no_of_weekends = (int)$this->getWeekends($sheet_details[0]->started_at, $sheet_details[0]->expired_at);
        $weekdays = PayrollController::getWorkdays($sheet_details[0]->started_at, $sheet_details[0]->expired_at, FALSE, NULL);
        
        return view('Staff.add_timesheet_record_page', Utilities::get_menu_array(array("weekdays" => $weekdays,"no_of_weekends"=> $no_of_weekends,"staff_list"=> $staff_list,"sheet_id" => $timesheet_id, "sheet_details" => $sheet_details)));
    }

    public static function getWeekends ($fromDate, $toDate) {

        $from = strtotime($fromDate);
        $to = strtotime($toDate);
    
        $diff = floor(abs($to-$from)/(60*60*24));    // total days betwixt
    
        $num  = floor($diff/7) * 2;              // number of weeks * 2
    
        $fromNum = date("N", $from);
        $toNum = date("N", $to);
    
        if ($toNum < $fromNum)
           $toNum += 7;
    
        // get range of day numbers
        $dayarr = range($fromNum, $toNum); 
        // check if there are any weekdays in that range 
        $num += count(array_intersect($dayarr, array(6, 7, 13)));
    
        return $num;    
    }   

    public function staff_list_timesheet($timesheet_id, $department_id, $section_id, $staff_type)
    {
        
           if ($section_id =="")
            {
                $staff_list = DB::select( 
                    DB::raw("SELECT staff_view.staff_id,staff_view.staff_type_name, staff_view.first_name, staff_view.last_name, staff_view.other_name,time_sheet_capture.ot, time_sheet_capture.weekends, time_sheet_capture.absent,time_sheet_capture.numb_days, staff_view.department_name
                    FROM staff_view 
                    LEFT JOIN time_sheet_capture 
                    ON time_sheet_capture.staff_id = staff_view.staff_id AND time_sheet_capture.sheet_id = '$timesheet_id'
                    WHERE staff_view.status = '1' AND staff_view.department_id = '$department_id'  AND staff_type_id = '$staff_type'") );
                  
            }else
            {
                $staff_list = DB::select( 
                    DB::raw("SELECT staff_view.staff_id, staff_view.staff_type_name, staff_view.first_name, staff_view.last_name, staff_view.other_name,time_sheet_capture.ot, time_sheet_capture.weekends,time_sheet_capture.absent,time_sheet_capture.numb_days, staff_view.department_name
                    FROM staff_view 
                    LEFT JOIN time_sheet_capture 
                    ON time_sheet_capture.staff_id = staff_view.staff_id AND time_sheet_capture.sheet_id = '$timesheet_id'
                    WHERE staff_view.status = '1' AND staff_view.department_id = '$department_id' AND section_id LIKE '%$section_id%' AND staff_type_id = '$staff_type'") );
                  
            }


            return $staff_list;
    } 

    public function time_sheet_staff_list($sheet_id)
    {
        
        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            { 
                $data = DB::table("staff_time_sheet_view")->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                ->where("sheet_id", "LIKE" , "%".$request->sheet_id."%")
                ->get();
            }
            else
            {    
                $data = DB::table("staff_time_sheet_view")->where("sheet_id", "LIKE" , "%".$sheet_id."%")
                ->get();
            }
            return datatables()->of($data)->make(true);
        }
          
        return view ('staff.staff_time_sheet_list_page', Utilities::get_menu_array(array("sheet_id" => $sheet_id)));
    }


    public function get_day($date)
    {
        $timestamp = strtotime($date);
        $day = date('l', $timestamp);

        return $day;
    }

    public function get_expiration($date, $no_of_days)
    {
        $timestamp = $date;
        $start_date = date($timestamp);

        $expires = strtotime('+'.$no_of_days.' days', strtotime($timestamp));
        //$expires = date($expires);

        $date_diff=($expires-strtotime($timestamp)) / 86400;
        return date('Y-m-d', $expires);
       // return "This time sheet will be valid from ".$timestamp."    To   ".date('Y-m-d', $expires)." you have ".round($date_diff, 0)." days left";
    }

    private function date_to_year_month($dateValue)
    {
        $time=strtotime($dateValue);
        $month=date("F",$time);
        $year=date("Y",$time);

        return $month." ".$year;
    }


    public function time_sheet_create_new($op)
    {
        $dept_arr = DepartmentModel::all();
        $staff_type = DB::table('staff_type')->get();
        
        $page_array = array("msg" => "", "dept_array_list"=> $dept_arr, "staff_type" => $staff_type);

        return view('staff.capture_timesheet_page', Utilities::get_menu_array($page_array));

    }

    public function timesheet_list_save_new(Request $request)
    {

        $this->validate(request(), [
            'department_id' => 'required',
            'start_range' => 'required',
            'staff_type' => 'required'
 
        ]);
       
       
        $dept_arr = DepartmentModel::all();
        $staff_type = DB::table('staff_type')->get();
        
        $page_array = array("msg" => "", "dept_array_list"=> $dept_arr, "staff_type" => $staff_type);

        $sheet_id = Utilities::paddZeros(Utilities::GenUniqID(date("Y-m-d"),date("H:i:s"))."".Utilities::getnextid("timesheet"),20);
        //$expired_at = $this->get_expiration($request->start_range, 6);
        $expiration_date = date('Y-m-d', strtotime('next Sunday', strtotime($request->start_range))); //get the next sunday of that selection
        
        
        $date = $request->start_range;
        $pay_day = DB::table('parameter')->where('parameter_name','pay_day')->first()->parameter_value;
       
        
        $new_end_date =  DateTime::createFromFormat('Y-m-d',$expiration_date);
       
          

        if ($new_end_date->format('Y-m-d') > substr($date,0,8).$pay_day && $date < substr($date,0,8).$pay_day )
        {
            $expiration_date = DateTime::createFromFormat('Y-m-d',(substr($date,0,8).$pay_day));
            $expiration_date = $expiration_date->format('Y-m-d');

            $no_of_days = (strtotime($expiration_date) - strtotime($date)) / (60 * 60 * 24) ;
        }


        $day =  $this->get_day($request->start_range);

        
        /********* if ($day != "Monday")
        {
          $code = "211";
          $message = "Timesheet Start date must fall on mondays";

          $page_array["code"] = $code;
          $page_array["message"] =  $message;
          return view('staff.capture_timesheet_page', Utilities::get_menu_array($page_array));
        } *********/
        
        
        
        $dataSet = [
            'sheet_id'      => $sheet_id,
            'department_id' => $request->department_id,
            'section_id'    => $request->section_id,
            'started_at'    => $request->start_range,
            'expired_at'    => $expiration_date,
            'created_at'    => Now(),
            'created_by'    => Auth::user()->email,
            'staff_type_id' => $request->staff_type,
            'status'        => 1,
        ];
        
        $department_name = DB::table('department')->where('department_id', $request->department_id)->first()->department_name;
        
        //dd($time_sheet_insert);
        
        try{ //removing all staff from a time sheet 
                       
            $time_sheet_insert = DB::table('time_sheet')->insert($dataSet);
            if ($time_sheet_insert)
            {
               //dd("First");
                $message = "Time sheet entry for ".$department_name." department in the month of ".$this->date_to_year_month($request->start_range)." has been created";
                return redirect('/capture-time-sheet-list/create/new')->with('success',$message);
                
            }
           // dd("Second");
          }catch(\Exception $e){

          
           $message = "Duplicate timesheet entry for ".$department_name." department in the month of ".$this->date_to_year_month($request->start_range);
           return redirect('/capture-time-sheet-list/create/new')->with('error',$message);
           
          }
          
    }

public function time_sheet_print()
{
 
    if(request())
    {
        
        $this->validate(request(), [
            'department_id' => 'required',
            'staff_type' => 'required',
           
 
        ]);

        $section_id = "";
        $section_name = "";
        $code = "";
        

        $department_id = isset(request()->department_id)?request()->department_id:"";
        $staff_type = isset(request()->staff_type)?request()->staff_type:"";
        $section_id = isset(request()->section_id)?request()->section_id:"";
        $section_arr = DB::table("section")->where('section_id',  $section_id)->first();

        if (isset($section_arr->section_name))
        {
            $section_name =  $section_arr->section_name;
        }
        
        

        $no_of_days = 7;
        $date = request()->start_range;
        $end_date = request()->end_range;

        $date_arr = explode("-",$date);

       
        
        if (count($date_arr) < 3)
        {
            $code = "113";
            $message = "Invalid start date selection";
        }

        //$expiration_date = date('d/M/y', strtotime('+'.$no_of_days.' day', strtotime($date)));
        $expiration_date = date('Y-m-d', strtotime('next Sunday', strtotime($date))); //get the next sunday of that selection
        

        $pay_day = DB::table('parameter')->where('parameter_name','pay_day')->first()->parameter_value;
       
        
        $new_end_date =  DateTime::createFromFormat('Y-m-d',$expiration_date);
       
        $no_of_days = (strtotime($expiration_date) - strtotime($date)) / (60 * 60 * 24) + 1;
           
         
        if ($date < substr($date,0,8).$pay_day && $new_end_date->format('Y-m-d') > substr($date,0,8).$pay_day )
        {
            $expiration_date = DateTime::createFromFormat('Y-m-d',(substr($date,0,8).$pay_day));
            $expiration_date = $expiration_date->format('Y-m-d');

            $no_of_days = (strtotime($expiration_date) - strtotime($date)) / (60 * 60 * 24) + 1;
        }

        
       // dd($expiration_date);
     
        //get the number of days from now to weekend

        //if expiration days greater than 20th... then exipration day will be 20th
       
        $day_array = array();
        $date_array = array();

        for ($i = 0; $i < $no_of_days; $i++)
        {
            $temp_date = date('Y-m-d', strtotime('+'.$i.' day', strtotime($date)));
            $time = strtotime($temp_date);
            $day_array[] = date("D",$time);
            $date_array[] = date('d/M/y', strtotime('+'.$i.' day', strtotime($date)));
        }

        $section_id = $section_id=="#"?"":$section_id;
        
        if ($section_id =="")
        {
            $staff_list = StaffModel::where("department_id", "=" , $department_id)
            ->where("staff_type_id", "=", $staff_type)
            ->where("status", "=", "1")
            ->get();
        }else
        {
            $staff_list = StaffModel::where("department_id", "=" , $department_id)
            ->where("staff_type_id", "=", $staff_type)
            ->where("status", "=", "1")
            ->where("section_id","LIKE","%".$section_id."%")
            ->get();
        }
        

        

        
        if (count($staff_list) < 1)
        {
            if ($code =="")
            {
                $code = "110";
                $message = "Sorry There is no available staff for this selection";
            }

        }else
        {
            if ($code =="")
            {
                $code = "200";
                $message = "Successful";
            }
        }
        
        $day =  $this->get_day(request()->start_range);

      /******  if ($day != "Monday")
        {
          $code = "211";
          $message = "Timesheet Start date must fall on mondays";

          $page_array["code"] = $code;
          $page_array["message"] =  $message;
          
        }*/

        $department_name = DB::table('department')->where('department_id',$department_id)->first()->department_name;
       
        $page_array = array("department_name" => $department_name,"staff_list" => $staff_list, "day_list" => $day_array, "date_list" => $date_array, "expiration_date" => $expiration_date, "section" => $section_name ,"code"=> $code, "message" => $message );
        return view('staff.time_sheet_template_page',$page_array);
   }
}




   
}
