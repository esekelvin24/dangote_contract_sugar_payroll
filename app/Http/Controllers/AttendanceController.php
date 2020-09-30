<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use App\LeaveRequest;
use App\Holiday;
use App\Leave_type;
use App\Regularisation;
use App\Daymaster;
use Illuminate\Support\Facades\Input;
use DB;
use DateTime;
use DatePeriod;
use DateInterval;
use Carbon\Carbon;
use Excel;
use Auth;
use Alert;
use PDF;
use App\AttendanceDateValidation;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use Session;

class AttendanceController extends Controller
{
   
 //////////////////////////////////////////////////////////////////////////////////////////////////
    public function user_attendance($sap_no)
    {
        // dd('hi');
        ////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;
        $leave_array = "";
        $validated_array = "";
        $monthsOfYear = "";
        $regularisation_list_hr_pending = "";
        $leave_request_list_hr_pending = "";
        $profile_info = "";

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

$today = Carbon::today()->format('Ymd');
// dd($today);

        if (($user->can('can-view-all-users')) || ($user->sap==$sap_no) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////FROM HERE/////////////////////////////////////////
$holidays_list = Holiday::pluck('holiday_date','holiday_date')->toArray();


//////////////////////Regularisation(HOD APPRAOVAL)///////////////////////
//$regularisation_list_hod_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
//$regularisation_list_hod_approved = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
//$regularisation_list_hod_rejected = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();

$regularisation_list_hod_pending = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_approved = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_rejected = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();



// $regularisation_list_hr_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
//$regularisation_list_hr_approved = Regularisation::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
//$regularisation_list_hr_rejected = Regularisation::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_approved = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hr_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_rejected = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hr_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();
////////////////////////////////////////////////////////////

//////////////////////Leave(HOD APPROVAL)///////////////////////
$leave_request_list_hod_pending = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_approved = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_rejected = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('leave_date','leave_date')->toArray();

// $leave_request_list_hr_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_approved = LeaveRequest::where('sap', $sap_no)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_rejected = LeaveRequest::where('sap', $sap_no)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('leave_date','leave_date')->toArray();
////////////////////////////////////////////////////////////



      // dd($leave_request_list_hod_pending);

        $startDate = new Carbon('first day of this month');
        $start= $startDate->startOfMonth()->format('Ymd');
        $endDate = new Carbon('last day of this month');
        $end = $endDate->endOfMonth()->format('Ymd');
       
$all_dates = array();
while ($startDate->lte($endDate)){
  $all_dates[] = $startDate->toDateString();

  $startDate->addDay();
}
$dates_in_this_month =$all_dates;
// dd($dates_in_month);

$attendances = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->orderBy('TDate', 'desc')->get();


$first_clockin_in_office_check = Daymaster::where('e_id', $sap_no)->orderBy('TDate', 'asc')->get();

if($first_clockin_in_office_check->isNotEmpty()){
    $first_clockin_in_office = $first_clockin_in_office_check->first()->TDate;
}else
$first_clockin_in_office=null;

//dd($first_clockin_in_office);


$attendances_array = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->pluck('TDate','TDate')->toArray();

    
        return view('attendance.my_attendance', compact('attendances', 'leave_array', 'validated_array', 'monthsOfYear', 'get_user_details', 'holidays_list', 'regularisation_list_hod_pending', 'regularisation_list_hod_approved', 'regularisation_list_hod_rejected', 'regularisation_list_hr_pending', 'regularisation_list_hr_approved', 'regularisation_list_hr_rejected', 'leave_request_list_hod_pending', 'leave_request_list_hod_approved', 'leave_request_list_hod_rejected', 'leave_request_list_hr_pending', 'leave_request_list_hr_approved', 'leave_request_list_hr_rejected', 'dates_in_this_month', 'attendances_array', 'today', 'first_clockin_in_office'));
   
        }
       else{
           
         return view('errors.403', compact('profile_info'));
        }
    }

    


///////////////////////AJAX MONTH attendance CALL/////////////////////////////////////////////////////
    public function month_attendance(Request $request, $sap_no)
    {

        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $leave_array = "";
        $validated_array = "";
        $monthsOfYear = "";
        $regularisation_list_hr_pending = "";
        $leave_request_list_hr_pending = "";

$today = Carbon::today()->format('Ymd');
////////////////////////////////////FROM HERE/////////////////////////////////////////
$holidays_list = Holiday::pluck('holiday_date','holiday_date')->toArray();

//////////////////////Regularisation(HOD APPRAOVAL)///////////////////////
$regularisation_list_hod_pending = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_approved = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_rejected = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();

// $regularisation_list_hr_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_approved = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hr_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_rejected = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hr_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();
////////////////////////////////////////////////////////////

//////////////////////Leave(HOD APPROVAL)///////////////////////
$leave_request_list_hod_pending = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_approved = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_rejected = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('leave_date','leave_date')->toArray();

// $leave_request_list_hr_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_approved = LeaveRequest::where('sap', $sap_no)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_rejected = LeaveRequest::where('sap', $sap_no)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('leave_date','leave_date')->toArray();
////////////////////////////////////////////////////////////


$attendance_month = $request->month;

if($attendance_month == "all"){

$now = Carbon::now();
$startDate = $now->startOfYear();
$start=  $now->startOfYear()->format('Ymd');

$endDate = Carbon::today()->format('Y-m-d');
$endDate = new Carbon($endDate);
$end = Carbon::today()->format('Ymd');

} else{

$startDate = new Carbon('first day of '.$attendance_month);
$start= $startDate->startOfMonth()->format('Ymd');
$endDate = new Carbon('last day of '.$attendance_month);
$end = $endDate->endOfMonth()->format('Ymd');
}

$all_dates = array();
while ($startDate->lte($endDate)){
$all_dates[] = $startDate->toDateString();

$startDate->addDay();
}
$dates_in_this_month =$all_dates;
 // dd($dates_in_this_month);

$attendances = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->orderBy('TDate', 'desc')->get();

$first_clockin_in_office = Daymaster::where('e_id', $sap_no)->orderBy('TDate', 'asc')->first()->TDate;

$attendances_array = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->pluck('TDate','TDate')->toArray();
        
        
      
        $html = view('attendance.my_attendance_month_view', compact('attendances', 'leave_array', 'validated_array', 'monthsOfYear', 'holidays_list', 'regularisation_list_hod_pending', 'regularisation_list_hod_approved', 'regularisation_list_hod_rejected', 'regularisation_list_hr_pending', 'regularisation_list_hr_approved', 'regularisation_list_hr_rejected', 'leave_request_list_hod_pending', 'leave_request_list_hod_approved', 'leave_request_list_hod_rejected', 'leave_request_list_hr_pending', 'leave_request_list_hr_approved', 'leave_request_list_hr_rejected', 'dates_in_this_month', 'attendances_array', 'today', 'first_clockin_in_office'))->render();
        return  $html;
    }


///////////////////////////////////////ATTENDANCE UPLOAD PAGE/////////////////////////////////////////////
    public function attendance_upload()
    {
        $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;

        if ($user->can('can-upload-attendance'))
        {
       
        return view('attendance.attendance_upload');
        }
       else{
         return view('errors.403');
        }
    }
 //////////////////////////ATTENDANCE UPLOAD EXECEL///////////////////////////////////////////////////////////
    public function store_attendance_upload()

    {
       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;
       
        if ($user->can('can-upload-attendance'))
        {

        if(Input::hasFile('attendance_upload')){

            $path = Input::file('attendance_upload')->getRealPath();

            $original_filename = Input::file('attendance_upload')->getClientOriginalName(); //get the file name
            // dd($original_filename);


            $data = Excel::load($path, function($reader) {

            })->get();

            if(!empty($data) && $data->count()){

                foreach ($data as $key => $value) {
       
                         if($value->id != null){
                            $raw_date=$value->date;

                               // dd($raw_date); //use this dd before uploading

                            if (is_string($raw_date))
                                {
                            $trimTheDateString = trim($raw_date);
                            $attendance_datestring = DateTime::createFromFormat('d/m/Y', $trimTheDateString)->format('Y-m-d');
                            $attendance_totime   = strtotime($attendance_datestring);
                            $attendance_date = date('Y-m-d',$attendance_totime);
                            // $attendance_date = Carbon::parse($attendance_dateformat);

                                } else {
                                 //$attendance_dateformat = Carbon::createFromFormat('Y-d-m H:i:s', $raw_date)->format('Y-m-d'); //enable this for Y-D-M
                                 $attendance_date = Carbon::createFromFormat('Y-m-d H:i:s', $raw_date)->format('Y-m-d'); //enable this for Y-M-D
                                 // $attendance_date = Carbon::parse($attendance_dateformat);

                                }

                        //$attendance_date = $attendance_date->format('l jS \\of F Y h:i:s A');
                        //return($attendance_date);

                                $updated_at = Carbon::now()->format('Y-m-d H:i:s');
                                $created_at = Carbon::now()->format('Y-m-d H:i:s');

                        if($value->start != null){
                            $start_time_str = $value->start;

                            // $start_time = Carbon::parse($start_time_str);
                            $start_time =  date('H:i:s', strtotime($start_time_str)); 

                            // $start_time = $start_time_str->toTimeString();
                        } else {
                            $start_time = null;
                        }
                        if($value->close != null){
                            $close_time_str = $value->close;
                            $close_time =  date('H:i:s', strtotime($close_time_str)); 

                            // $close_time = Carbon::parse($close_time_str);
                            // $close_time = $close_time_str->toTimeString();
                        } else {
                            $close_time = null;
                        }

                      // dd($updated_at);
                       
                        // $xyz = gettype($updated_at);
                        // dd($xyz);

                        $attendance = Attendance::where('user_sap', $value->id)->where('attendance_date', $attendance_date)->get();
                        $attendance_count = $attendance->count();

                        if($attendance_count > 0){
                            $attendance = Attendance::where('user_sap', $value->id)->where('attendance_date', $attendance_date)->update(['start' => $start_time, 'close' => $close_time, 'updated_at' => $updated_at, 'uploaded_by' => Auth::user()->id]);

                            // $attendance =  Attendance::where('user_sap', $value->id)->where('attendance_date', $attendance_date)->first();
                            // $attendance->user_sap = $value->id;
                            // $attendance->attendance_date = $attendance_date;
                            // $attendance->start = $start_time;
                            // $attendance->close = $close_time;
                            // $attendance->uploaded_by = $loggedin_user_id;
                            // $attendance->update();
                        } 

                        else {
                            $attendance = new Attendance();
                            $attendance->user_sap = $value->id;
                            $attendance->attendance_date = $attendance_date;
                            $attendance->start = $start_time;
                            $attendance->close = $close_time;
                            $attendance->uploaded_by = Auth::user()->id;
                            $attendance->save();
                        }
                        
                    }
                }

            }

        }


        \Session::flash('message', 'Record Uploaded successfully!!! File Name: '.$original_filename);
        return redirect('/attendance_upload');
        }
       else{
         return view('errors.403');
        }
    }




///////////////////////////////////////PDF////////////////////////////////////////////////////////
public function pdfview(Request $request, $sap_no)
    {
         $get_user_details = User::where('sap', $sap_no)->first();
          $get_user_id = $get_user_details->id;
          $get_user_name = $get_user_details->name;

          $today = Carbon::today()->format('Ymd');
////////////////////////////////////FROM HERE/////////////////////////////////////////
$holidays_list = Holiday::pluck('holiday_date','holiday_date')->toArray();

//////////////////////Regularisation(HOD APPRAOVAL)///////////////////////
$regularisation_list_hod_pending  = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_approved = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_rejected = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hod_approver_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();

$regularisation_list_hr_pending  = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hr_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_approved = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hr_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_rejected = Regularisation::where('submitted',1)->where('sap', $sap_no)->where('hr_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();
////////////////////////////////////////////////////////////

//////////////////////Leave(HOD APPROVAL)///////////////////////
$leave_request_list_hod_pending  = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_approved = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_rejected = LeaveRequest::where('sap', $sap_no)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('leave_date','leave_date')->toArray();

// $leave_request_list_hr_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_approved = LeaveRequest::where('sap', $sap_no)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_rejected = LeaveRequest::where('sap', $sap_no)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('leave_date','leave_date')->toArray();
////////////////////////////////////////////////////////////

        $attendance_month = $request->month_download;
        if($request->month_download == ''){
            $date = Carbon::now();
            $attendance_month = $date->format("F Y");
        }
        $rfilename = $sap_no.'_'.$get_user_name.'_'.$attendance_month.'.pdf';

if($attendance_month == "all"){

$now = Carbon::now();
$startDate = $now->startOfYear();
$start=  $now->startOfYear()->format('Ymd');

$endDate = Carbon::today()->format('Y-m-d');
$endDate = new Carbon($endDate);
$end = Carbon::today()->format('Ymd');

} else{

$startDate = new Carbon('first day of '.$attendance_month);
$start= $startDate->startOfMonth()->format('Ymd');
$endDate = new Carbon('last day of '.$attendance_month);
$end = $endDate->endOfMonth()->format('Ymd');
}

$all_dates = array();
while ($startDate->lte($endDate)){
$all_dates[] = $startDate->toDateString();

$startDate->addDay();
}
$dates_in_this_month =$all_dates;
 // dd($dates_in_this_month);

$attendances = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->orderBy('TDate', 'desc')->get();

$first_clockin_in_office = Daymaster::where('e_id', $sap_no)->orderBy('TDate', 'asc')->first()->TDate;

$attendances_array = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->pluck('TDate','TDate')->toArray();
       
        $data = array(
            'attendances' => $attendances,
            'attendances_array' => $attendances_array,
            'dates_in_this_month' => $dates_in_this_month,
            'staff_sap' => $sap_no,
            'staff_name' => $get_user_name,
            'report_period' => $attendance_month,
            'holidays_list' => $holidays_list,
            'regularisation_list_hod_pending' => $regularisation_list_hod_pending,
            'regularisation_list_hod_approved' => $regularisation_list_hod_approved,
            'regularisation_list_hod_rejected' => $regularisation_list_hod_rejected,

            'regularisation_list_hr_pending' => $regularisation_list_hr_pending,
            'regularisation_list_hr_approved' => $regularisation_list_hr_approved,
            'regularisation_list_hr_rejected' => $regularisation_list_hr_rejected,

            'leave_request_list_hod_pending' => $leave_request_list_hod_pending,
            'leave_request_list_hod_approved' => $leave_request_list_hod_approved,
            'leave_request_list_hod_rejected' => $leave_request_list_hod_rejected,
            // 'leave_request_list_hr_pending' => $leave_request_list_hr_pending,

            'leave_request_list_hr_approved' => $leave_request_list_hr_approved,
            'leave_request_list_hr_rejected' => $leave_request_list_hr_rejected, 
            'today' => $today,  
            'first_clockin_in_office' => $first_clockin_in_office,
        );
        

       // return view('attendance.pdfattendanceA', $data);

        $pdf = PDF::loadView('attendance.pdfattendanceA', $data);
        return $pdf->download($rfilename);

        // if($request->has('download')){
        //     $pdf = PDF::loadView('attendance.pdfview');
        //     return $pdf->download('pdfview.pdf');
        // }


        return view('pdfview');
    }
















///////////////////////////////////////PDF////////////////////////////////////////////////////////
public function pdfview_old(Request $request, $sap_no)
    {
         $get_user_details = User::where('sap', $sap_no)->first();
          $get_user_id = $get_user_details->id;
          $get_user_name = $get_user_details->name;

          $today = Carbon::today()->format('Ymd');

////////////////////////////////////FROM HERE/////////////////////////////////////////
$holidays_list = Holiday::pluck('holiday_date','holiday_date')->toArray();

//////////////////////Regularisation(HOD APPRAOVAL)///////////////////////
$regularisation_list_hod_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_approved = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_rejected = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();

// $regularisation_list_hr_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_approved = Regularisation::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_rejected = Regularisation::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('date_to_regulate','date_to_regulate')->toArray();
////////////////////////////////////////////////////////////

//////////////////////Leave(HOD APPROVAL)///////////////////////
$leave_request_list_hod_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_approved = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_rejected = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('leave_date','leave_date')->toArray();

// $leave_request_list_hr_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_approved = LeaveRequest::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_rejected = LeaveRequest::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('leave_date','leave_date')->toArray();
////////////////////////////////////////////////////////////

        $attendance_month = $request->month_download;
        if($request->month_download == ''){
            $date = Carbon::now();
            $attendance_month = $date->format("F Y");
        }
        $rfilename = $sap_no.'_'.$get_user_name.'_'.$attendance_month.'.pdf';

if($attendance_month == "all"){

$now = Carbon::now();
$startDate = $now->startOfYear();
$start=  $now->startOfYear()->format('Ymd');

$endDate = Carbon::today()->format('Y-m-d');
$endDate = new Carbon($endDate);
$end = Carbon::today()->format('Ymd');

} else{

$startDate = new Carbon('first day of '.$attendance_month);
$start= $startDate->startOfMonth()->format('Ymd');
$endDate = new Carbon('last day of '.$attendance_month);
$end = $endDate->endOfMonth()->format('Ymd');
}

$all_dates = array();
while ($startDate->lte($endDate)){
$all_dates[] = $startDate->toDateString();

$startDate->addDay();
}
$dates_in_this_month =$all_dates;
 // dd($dates_in_this_month);

$attendances = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->orderBy('TDate', 'desc')->get();

$first_clockin_in_office = Daymaster::where('e_id', $sap_no)->orderBy('TDate', 'asc')->first()->TDate;

$attendances_array = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->pluck('TDate','TDate')->toArray();
       
        $data = array(
            'attendances' => $attendances,
            'attendances_array' => $attendances_array,
            'dates_in_this_month' => $dates_in_this_month,
            'staff_sap' => $sap_no,
            'staff_name' => $get_user_name,
            'report_period' => $attendance_month,
            'holidays_list' => $holidays_list,
            'regularisation_list_hod_pending' => $regularisation_list_hod_pending,
            'regularisation_list_hod_approved' => $regularisation_list_hod_approved,
            'regularisation_list_hod_rejected' => $regularisation_list_hod_rejected,

            // 'regularisation_list_hr_pending' => $regularisation_list_hr_pending,
            'regularisation_list_hr_approved' => $regularisation_list_hr_approved,
            'regularisation_list_hr_rejected' => $regularisation_list_hr_rejected,

            'leave_request_list_hod_pending' => $leave_request_list_hod_pending,
            'leave_request_list_hod_approved' => $leave_request_list_hod_approved,
            'leave_request_list_hod_rejected' => $leave_request_list_hod_rejected,
            // 'leave_request_list_hr_pending' => $leave_request_list_hr_pending,

            'leave_request_list_hr_approved' => $leave_request_list_hr_approved,
            'leave_request_list_hr_rejected' => $leave_request_list_hr_rejected, 
            'today' => $today,  
            'first_clockin_in_office' => $first_clockin_in_office,
        );
        

        return view('attendance.pdfattendanceA', $data);

        $pdf = PDF::loadView('attendance.pdfattendanceA', $data);
        return $pdf->download($rfilename);

        // if($request->has('download')){
        //     $pdf = PDF::loadView('attendance.pdfview');
        //     return $pdf->download('pdfview.pdf');
        // }


        return view('pdfview');
    }

    

}
