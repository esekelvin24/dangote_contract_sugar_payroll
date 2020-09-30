<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\User;
use App\LeaveRequest;
use App\Holiday;
use App\Leave_type;
use App\Regularisation;
use App\Daymaster;
use App\vw_user_roleuser_role;
use App\vw_user_details;
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
use  App\vw_regularisations;
use  App\Department;
use  App\perment_office_location;
use App\Email_notification;
use Mail;

class AttendanceRegularisationController extends Controller
{
   
 //////////////////////////////////////////////////////////////////////////////////////////////////
    public function attendance_regularisation($sap_no)
    {
      $sap = $sap_no;
        ////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('sap', $sap)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;
        $leave_array = "";
        $validated_array = "";
        $monthsOfYear = "";
        $regularisation_list_hr_pending = "";
        $leave_request_list_hr_pending = "";

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
       // $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $loggedin_user_sap = Auth::user()->sap; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

        if (($user->can('can-view-all-users')) || ($loggedin_user_sap==$sap) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////FROM HERE/////////////////////////////////////////
$holidays_list = Holiday::pluck('holiday_date','holiday_date')->toArray();

//////////////////////Regularisation(HOD APPRAOVAL)///////////////////////
$regularisation_list = Regularisation::where('sap', $sap)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();

$regularisation_list_hod_pending = Regularisation::where('sap', $sap)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_approved = Regularisation::where('sap', $sap)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_rejected = Regularisation::where('sap', $sap)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();

// $regularisation_list_hr_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_approved = Regularisation::where('sap', $sap)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_rejected = Regularisation::where('sap', $sap)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
////////////////////////////////////////////////////////////

//////////////////////Leave(HOD APPROVAL)///////////////////////
$leave_request_list_hod_pending = LeaveRequest::where('sap', $sap)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_approved = LeaveRequest::where('sap', $sap)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_rejected = LeaveRequest::where('sap', $sap)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('leave_date','leave_date')->toArray();

// $leave_request_list_hr_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_approved = LeaveRequest::where('sap', $sap)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_rejected = LeaveRequest::where('sap', $sap)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('leave_date','leave_date')->toArray();
////////////////////////////////////////////////////////////


       // // dd((\Carbon\Carbon::parse('2018-08-02')->isWeekday()));

       //  $start = new Carbon('first day of this month');
       //  $start->startOfMonth();
       //  $end = new Carbon('last day of this month');
       //  $end->endOfMonth();
       //    $attendances = Attendance::where('user_sap', $sap_no)
       //                                 ->where("attendance_date", '>=', $start)
       //                                 ->where("attendance_date", '<=', $end)
       //                                 ->where(function ($query) {
       //                                  $query->where('start', '=', null)
       //                                        ->orWhere('close', '=', null);
       //                                          })
                                       
       //                                 // ->where("attendance_date", '=', (\Carbon\Carbon::parse("attendance_date")->isWeekday()))
       //                                 ->orderBy('attendance_date', 'desc')->get();


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
$attendances_array = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->pluck('TDate','TDate')->toArray();

      $x=0;

         $get_hod_for_the_user = DB::table('group_hod')
        ->where('group_hod.department_id', $get_user_department)
        ->join('users','users.sap', 'group_hod.hod_sap')
        ->get();

       
        $departments=Department::orderBy('name')->pluck('name','id');
        $office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');

      
        $reason_list = Regularisation::where('sap','=',$sap)->where('date_to_regulate', '>=', $start)->where('date_to_regulate', '<=', $end)->get();
        $reason_arr = array();
        $selected_hod = "";
        foreach($reason_list as $my_reason)
        {
          $reason_arr[$my_reason->date_to_regulate] = $my_reason->reason;
          $selected_hod = $my_reason['hod_approver_id'];
        }
        
        return view('attendance_regularisation.attendance_regularisation', compact('selected_hod','reason_arr','attendances', 'leave_array', 'validated_array', 'monthsOfYear', 'get_user_details', 'holidays_list', 'regularisation_list_hod_pending', 'regularisation_list_hod_approved', 'regularisation_list_hod_rejected', 'regularisation_list_hr_pending', 'regularisation_list_hr_approved', 'regularisation_list_hr_rejected', 'leave_request_list_hod_pending', 'leave_request_list_hod_approved', 'leave_request_list_hod_rejected', 'leave_request_list_hr_pending', 'leave_request_list_hr_approved', 'leave_request_list_hr_rejected', 'regularisation_list', 'x', 'get_hod_for_the_user', 'departments', 'office_locations', 'dates_in_this_month', 'attendances_array'));
   
        }
       else{
         return view('errors.403', compact('profile_info'));
        }
    }

////////////////////////////////////////////////////////////////////////
 public function ajax_get_hod_approver_list()
{

$get_selecte_hod_dep_id = $_GET["get_option"];

$get_hod_for_the_user = DB::table('group_hod')
->where('group_hod.department_id', $get_selecte_hod_dep_id)
->join('users','users.sap', 'group_hod.hod_sap')
->get();





return view('attendance_regularisation.ajax_get_hod_approver_list', compact('get_hod_for_the_user', 'get_selecte_hod_dep_id'));
}




///////////////////////AJAX MONTH attendance CALL/////////////////////////////////////////////////////

public function get_month_attendance_regularisation(Request $request, $sap_no)
{
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

  //////////////////////////info about loggedin user/////////////////////////////////
  $user = \Auth::user(); //note the user that logs in
  $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
  $department_id = Auth::user()->department_id; //get the id of the department that loggedin

  if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
  /////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////FROM HERE/////////////////////////////////////////
$holidays_list = Holiday::pluck('holiday_date','holiday_date')->toArray();

//////////////////////Regularisation(HOD APPRAOVAL)///////////////////////
$regularisation_list = Regularisation::where('user_id', $get_user_id)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();

$regularisation_list_hod_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_approved = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hod_rejected = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();

// $regularisation_list_hr_pending = Regularisation::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_approved = Regularisation::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
$regularisation_list_hr_rejected = Regularisation::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->where('submitted', '=', 1)->pluck('date_to_regulate','date_to_regulate')->toArray();
////////////////////////////////////////////////////////////

//////////////////////Leave(HOD APPROVAL)///////////////////////
$leave_request_list_hod_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_approved = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hod_rejected = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->where('hod_approver_status', '=', 2)->pluck('leave_date','leave_date')->toArray();

// $leave_request_list_hr_pending = LeaveRequest::where('user_id', $get_user_id)->where('hr_status', '=', 0)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_approved = LeaveRequest::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 1)->pluck('leave_date','leave_date')->toArray();
$leave_request_list_hr_rejected = LeaveRequest::where('user_id', $get_user_id)->where('hod_approver_status', '=', 1)->where('hr_status', '=', 2)->pluck('leave_date','leave_date')->toArray();
////////////////////////////////////////////////////////////


 // // dd((\Carbon\Carbon::parse('2018-08-02')->isWeekday()));

 //  $start = new Carbon('first day of this month');
 //  $start->startOfMonth();
 //  $end = new Carbon('last day of this month');
 //  $end->endOfMonth();
 //    $attendances = Attendance::where('user_sap', $sap_no)
 //                                 ->where("attendance_date", '>=', $start)
 //                                 ->where("attendance_date", '<=', $end)
 //                                 ->where(function ($query) {
 //                                  $query->where('start', '=', null)
 //                                        ->orWhere('close', '=', null);
 //                                          })
                                 
 //                                 // ->where("attendance_date", '=', (\Carbon\Carbon::parse("attendance_date")->isWeekday()))
 //                                 ->orderBy('attendance_date', 'desc')->get();


 $attendance_month = $request->month;
        
        if($attendance_month == "all"){
            $attendances = Attendance::where('user_sap', $sap_no)->orderBy('attendance_date', 'desc')->get();
        } else{
         

$startDate = new Carbon('first day of '.$attendance_month);
$start= $startDate->startOfMonth()->format('Ymd');
$endDate = new Carbon('last day of '.$attendance_month);
$end = $endDate->endOfMonth()->format('Ymd');
 
$all_dates = array();
while ($startDate->lte($endDate)){
$all_dates[] = $startDate->toDateString();

$startDate->addDay();
}
$dates_in_this_month =$all_dates;
// dd($dates_in_month);

$attendances = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->orderBy('TDate', 'desc')->get();
$attendances_array = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->pluck('TDate','TDate')->toArray();

}

$x=0;

$get_hod_for_the_user = DB::table('group_hod')
->where('group_hod.department_id', $get_user_department)
->join('users','users.sap', 'group_hod.hod_sap')
->get();

  $departments=Department::orderBy('name')->pluck('name','id');
  $office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');


  $reason_list = Regularisation::where('user_id','=',$get_user_id)->where('date_to_regulate', '>=', $start)->where('date_to_regulate', '<=', $end)->get();
  $reason_arr = array();
  foreach($reason_list as $my_reason)
  {
    $reason_arr[$my_reason->date_to_regulate] = $my_reason->reason;
  }

  $html = view('attendance_regularisation.get_month_attendance_regularisation', compact('reason_arr','attendances', 'leave_array', 'validated_array', 'monthsOfYear', 'holidays_list', 'regularisation_list_hod_pending', 'regularisation_list_hod_approved', 'regularisation_list_hod_rejected', 'regularisation_list_hr_pending', 'regularisation_list_hr_approved', 'regularisation_list_hr_rejected', 'leave_request_list_hod_pending', 'leave_request_list_hod_approved', 'leave_request_list_hod_rejected', 'leave_request_list_hr_pending', 'leave_request_list_hr_approved', 'leave_request_list_hr_rejected', 'regularisation_list', 'x', 'dates_in_this_month', 'attendances_array'))->render();
  return  $html;

}
}
    /*public function get_month_attendance_regularisation(Request $request, $sap_no)
    {

        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $leave_array = array();
        $validated_array = array();
        $monthsOfYear = "";
        $regularisation_list_hr_pending = "";
        $leave_request_list_hr_pending = "";

////////////////////////////////////FROM HERE/////////////////////////////////////////
$holidays_list = Holiday::pluck('holiday_date','holiday_date')->toArray();

//////////////////////Regularisation(HOD APPRAOVAL)///////////////////////
$regularisation_list = Regularisation::where('user_id', $get_user_id)->pluck('date_to_regulate','date_to_regulate')->toArray();

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



        $attendance_month = $request->month;
        
        if($attendance_month == "all"){
            $attendances = Attendance::where('user_sap', $sap_no)->orderBy('attendance_date', 'desc')->get();
        } else{
         

$startDate = new Carbon('first day of '.$attendance_month);
$start= $startDate->startOfMonth()->format('Ymd');
$endDate = new Carbon('last day of '.$attendance_month);
$end = $endDate->endOfMonth()->format('Ymd');

$all_dates = array();
while ($startDate->lte($endDate)){
$all_dates[] = $startDate->toDateString();

$startDate->addDay();
}
$dates_in_this_month =$all_dates;
// dd($dates_in_month);

$attendances = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->orderBy('TDate', 'desc')->get();

$attendances_array = Daymaster::where('e_id', $sap_no)->where('TDate', '>=', $start)->where('TDate', '<=', $end)->pluck('TDate','TDate')->toArray();

        }

        //$reason_list = Regularisation::where('user_id','=',$get_user_id)->where('date_to_regulate', '>=', $start)->where('date_to_regulate', '<=', $end)->get();
       // dd($reason_list);

      $x=0;
        $html = view('attendance_regularisation.get_month_attendance_regularisation', compact('attendances', 'leave_array', 'validated_array', 'monthsOfYear', 'holidays_list', 'regularisation_list_hod_pending', 'regularisation_list_hod_approved', 'regularisation_list_hod_rejected', 'regularisation_list_hr_pending', 'regularisation_list_hr_approved', 'regularisation_list_hr_rejected', 'leave_request_list_hod_pending', 'leave_request_list_hod_approved', 'leave_request_list_hod_rejected', 'leave_request_list_hr_pending', 'leave_request_list_hr_approved', 'leave_request_list_hr_rejected', 'regularisation_list', 'x', 'dates_in_this_month', 'attendances_array'))->render();
        return  $html;
    }*/

 /* public function store_regularisation_reason(Request $request, $sap_no)
  {
    $user = \Auth::user(); //note the user that logs in
    $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
    if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
      /////////////////////////////////////////////////////////////////////////////////
      $get_user_details = User::where('sap', $sap_no)->first();
      $get_user_id = $get_user_details->id;
      $get_user_name = $get_user_details->name;
      $get_user_department = $get_user_details->department_id;
      $location_id = $get_user_details->perment_office_location;
      $department_id = $get_user_details->department_id;
      $hod_approver_id = $request->hod_approver_id;
      

       $this->validate($request, [
          'reason' => 'sometimes',
          'date_to_regulate' => 'required',
          'hod_approver_id' => 'required',
          'department_id' => 'required',
          'location_id' => 'required',
        ]);

        $date_and_time_submited = Carbon::now();
        $check_if_record_exist_in_db = Regularisation::exists();
    
        if ($check_if_record_exist_in_db === true){
        $last_regularisation_grp_no = Regularisation::orderBy('id', 'desc')->first()->regularisation_grp_no;
        $new_regularisation_grp_no = $last_regularisation_grp_no +1;
        }
        else{
        $new_regularisation_grp_no = 1;
        }

        
        $regularisation =  new Regularisation();
        $regularisation->user_id = $get_user_id;
        $regularisation->reg_request_submited_by = $loggedin_user_id;
        $regularisation->hod_approver_id = $request->hod_approver_id;
        $regularisation->department_id = $request->department_id ;
        $regularisation->location_id = $request->location_id;
        $regularisation->reason = $request->reason;
        $regularisation->date_to_regulate = $request->date_to_regulate;
        $regularisation->regularisation_grp_no = $new_regularisation_grp_no;
        $regularisation->date_and_time_submited = $date_and_time_submited;
        $regularisation->full_uniq_reg_id = 'REG_NO_'.$sap_no.'_'.$new_regularisation_grp_no;
        $regularisation->unique_sap_date = $request->date_to_regulate.'_'.$sap_no;
        
        $regularisation->save();


      }
    else{
       return view('errors.403');
     }
  }*/
  public function generate_grp_no()
  {
    return $randnum = rand(111111111,999999999);
  }

  public function store_attendance_regularisation(Request $request, $sap_no)
  {
      $regularisation_grp_no = 0;
      //dd($request->all());
      ////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////

         $this->validate($request, [
              'hod_approver_id' => 'required',
              'date_to_regulate' => 'sometimes',
              'department_id' => 'required',
              'location_id' => 'required',
              'attached_doc' => 'max:10000|mimes:jpeg,png,jpg,pdf,doc,docx',
              'reason' => 'sometimes',
              'button_click' => 'required',
              'clocking_status'  => 'required|Array'
        ]);
         
    


    $date_and_time_submited = Carbon::now();
   
    $count = 0;
    $date_array = array();
    foreach ($request->reason as $reason_obj) {
      $count = $count + 1;
      $date_array[] =  $request["regu_date_".$count];
    }

   //dd($count);
    $check_if_record_exist_in_db = Regularisation::wherein('date_to_regulate',$date_array)->where('user_id','=', $get_user_id)->pluck('user_id','date_to_regulate')->toArray();
    
    //dd(count($check_if_record_exist_in_db));

 if (count($check_if_record_exist_in_db) > 0){
      $last_regularisation_grp_no = Regularisation::wherein('date_to_regulate',$date_array)->where('user_id','=', $get_user_id)->orderBy('id', 'desc')->first()->regularisation_grp_no;
      $new_regularisation_grp_no = $last_regularisation_grp_no ;
    }
    else{
      $new_regularisation_grp_no = $this->generate_grp_no();
      $last_regularisation_grp_no = $new_regularisation_grp_no;

    }

   // dd($last_regularisation_grp_no);

        if ($request->hasFile('attached_doc')) {

            $file = Input::file('attached_doc');
            $extension = Input::file('attached_doc')->getClientOriginalExtension();
            $filename =   'REG_NO_'. $new_regularisation_grp_no .'.' .$extension; // renameing attachement
            $destinationPath = 'uploads/reg_attached_doc';//its refers project/public/uploads/reg_attached_doc directory
            $upload_success = $file->move($destinationPath, $filename);
        }
        else{
           $filename = null;
        }

//dd($new_regularisation_grp_no);

   // $date_to_regulates = $request->date_to_regulate; //get the list of date to regulate
    $reason = $request->reason;
    $count = 0;
   // dd($check_if_record_exist_in_db);

    foreach ($reason as $reason_obj) {
    
    $count = $count + 1;
    
    if ($request["regu_date_".$count] < date('Y-m-d')) //this will stop user from saving future dates
    {
      
          if (isset($check_if_record_exist_in_db[$request["regu_date_".$count]]))
          {
            $update_arr = ["clocking_status" => $request->clocking_status[$request["regu_date_".$count]], "hod_approver_sap"=> $request->hod_approver_id, "department_id" => $request->department_id,"reason" => $reason_obj,"submitted" => ($request->button_click=="2"?"1":"0"), "attached_doc" => $filename ];
            
            if($filename== null)
            {
              unset($update_arr['attached_doc']);
            }
            DB::table('regularisations')->where("user_id","=",$get_user_id)
            ->where("date_to_regulate","=",$request["regu_date_".$count])
            ->where("full_uniq_reg_id","=",'REG_NO_'.$sap_no.'_'.$new_regularisation_grp_no)
            ->update($update_arr);
          
          }else
          {
            $regularisation_grp_no = $new_regularisation_grp_no;
            $regularisation =  new Regularisation();
            $regularisation->user_id = $get_user_id;
            $regularisation->reg_request_submited_by = $loggedin_user_id;
            $regularisation->hod_approver_sap = $request->hod_approver_id;
            $regularisation->department_id = $request->department_id;
            $regularisation->location_id = $request->location_id;
            $regularisation->hod_approver_status = 0;
            $regularisation->hr_status = 0;
            $regularisation->date_to_regulate = $request["regu_date_".$count];
            $regularisation->regularisation_grp_no = $new_regularisation_grp_no;
            $regularisation->date_and_time_submited = $date_and_time_submited;
            $regularisation->full_uniq_reg_id = 'REG_NO_'.$sap_no.'_'.$new_regularisation_grp_no;
            $regularisation->unique_sap_date = $request["regu_date_".$count].'_'.$sap_no;
            if($filename != null)
            {
              $regularisation->attached_doc = $filename;
            }
            
            $regularisation->submitted = $request->button_click=="2"?"1":"0"; //one means submitted
            $regularisation->reason = $reason_obj;
            $regularisation->sap = $sap_no;
            $regularisation->clocking_status =  $request->clocking_status[$request["regu_date_".$count]];
            $regularisation->save();
          }
        }
    
   
    }

    
    
  //The Email notification starts from here       
 $check_if_email_notifications_is_enabled = Email_notification::where('email_notification_id', 1 )->first();
    if (($check_if_email_notifications_is_enabled->email_notification) == 1 && $request->button_click == 2)
    { //only send emails if email notifications is enabled and the form submit button is clicked

            $regularisation_month = Regularisation::where('user_id', $get_user_id)->where('regularisation_grp_no', $new_regularisation_grp_no)->first();

                $hod_email = DB::table('users')->where('sap', $regularisation_month->hod_approver_sap)->first()->email;
                $hod_name=  DB::table('users')->where('sap', $regularisation_month->hod_approver_sap)->first()->name;
                
                $data = array(
                'sap_no' => $sap_no,
                'new_regularisation_grp_no' => $new_regularisation_grp_no,
                'hod_approver_name' => $hod_name,
                'hod_approver_email' => $hod_email,
                //'date_and_time_submited' => \Carbon\Carbon::parse($regularisation_month->date_and_time_submited)->format('d-m-Y H:i:s'),
                'date_and_time_submited' => date("Y-M-d H:m:s", strtotime(date('Y-m-d'))),
                'staff_name' => $regularisation_month->user->name,
                'full_uniq_reg_id' => $regularisation_month->full_uniq_reg_id,
                );

            Mail::send('emails.regularisation_pending_approval_hod', $data, function($message) use ($data, $hod_email, $hod_name){
                  $message->from("dorc_it@dangoteprojects.com", 'Dangote Refinery IT');
                  $message->to($hod_email, $hod_name);
                  $message->subject('ALERT : Pending Attendance Regularisation for '.Auth::user()->first_name);
                });
    }

//End of Email notification /////////////////////////////

       Alert::success('Record Created Successfully')->autoclose(3000);
        return redirect('view_regularisation_details/'.$sap_no.'/'.$last_regularisation_grp_no );
      }
       else{
          return view('errors.403');
        }
}

    public function fix_date_seconds($date)
    {
         
          $start = str_pad($date,  6, "0");  //add Zero if the length is not 6 
          $based = substr($date,4,6);

         // dd($date."<br/>".$based);
          if($based > 60)
          {
            $start = substr($date,0,4)."59";   
          }
          

          if (substr($date,2,3) > 60)
          {
            $start =  substr($start,0,2)."59".substr($start,4,6);
          }

          return $start;
    }

    public function view_attendance_summary(Request $request)
    {

      
      $session_user = \Auth::user(); //note the user that logs in
      $dept_id = (isset($request->d)?$request->d:"33211");
      
     
      //$default_working_seconds = DB::table('parameter')->where('parameter_name','default_working_seconds')->first()->parameter_value;
     
  if ($session_user->can('view-attendance-summary'))
  {
      if (!is_numeric($dept_id))
      {
        $dept_id = "11222";
      }
      $month_of = (isset($request->month)?$request->month:date('Y-m-d'));

      $user_category = isset($request->category)?$request->category:"";

      $user_cat_query =  $user_category=="all"?"": $user_category;
      
      $start = date('Y-m-01', strtotime($month_of));;
      $end =   date('Y-m-t', strtotime($month_of));
    
      
     // dd(date('F, Y', strtotime($start)));

      $cockin_daily_record = array();
      $regularisation = array();
      $my_assigned_staff_sap = array();

      

      if ($session_user->can('view-attendance-summary-all-dept'))
      {
        $users = vw_user_details::where('department_id',$dept_id)
        ->where('staff_category_id' ,'LIKE', "%".$user_cat_query."%")
        ->where('resigned',0)
        ->get(); 
        
        
       
      }else
      {
        
            if ($session_user->hasRole('HOD')) //HOD can only see attendance of his department
            {
            
              $users = vw_user_details::where('department_id',Auth::user()->department_id)
              ->where('staff_category_id' ,'LIKE', "%".$user_cat_query."%")
              ->where('resigned',0)
              ->get();
              

            }else if ($session_user->hasRole('HR'))// this mean one HR can manage multiple dept
            {
             
              //get the group ID which the HR manages
              $hr_group_id = DB::table('group_hrbp_admin')->where('hr_sap', $session_user->sap)->pluck('group_id');
              
              $hr_group_id = count($hr_group_id)>0?$hr_group_id:"";
              //get all the staff ID under that group
              $staff_sap_arr = DB::table('users')->where('mapped_to_groupid',$hr_group_id)->pluck('sap');
              
              
              $builder = vw_user_details::query();

              $builder->whereIn('sap',$staff_sap_arr)
              ->where('staff_category_id' ,'LIKE', "%".$user_cat_query."%")
              ->where('resigned',0);

              if($dept_id !="30221222211")
              $builder->where('department_id',$dept_id);
              
              $users = $builder->get();
              
              //dd(Auth::user()->sap);
            }
       
      }
      






      foreach($users as $user)
      {
        $my_assigned_staff_sap[] = $user->sap;
      }

      

      //getting regularisation
      $user_regularisation = Regularisation::whereIn('sap', $my_assigned_staff_sap)
      ->where('submitted', '=', 1)
      ->where('date_to_regulate', '>=', date('Y-m-d', strtotime($start)))->where('date_to_regulate', '<=', date('Y-m-d', strtotime($end)))
      ->get();
      

      foreach ($user_regularisation as $regu)
      {
        if ($regu->hr_status == 1 && $regu->hod_approver_status == 1)
        {
           $regularisation[$regu->sap][date('Ymd', strtotime($regu->date_to_regulate))] = "approved";
        }else
        {
           $regularisation[$regu->sap][date('Ymd', strtotime($regu->date_to_regulate))] = "rejected";
        }              
      }
        
      //if (array_key_exists($staff_attendance->e_id, $all_staff_regu))
      

      //getting list of attendance for the month of
      $attendances = DB::table('daymaster')->whereIn('e_id', $my_assigned_staff_sap)->where('TDate', '>=', date('Ymd', strtotime($start)))->where('TDate', '<=', date('Ymd', strtotime($end)))->get();
      $show_earlyout = DB::table('parameter')->where('parameter_name','show_earlyout')->first()->parameter_value;
 
     
      foreach ($attendances as $staff_attendance)
      {

        $latein_check = false;
        $earlyout_check = false;
               
          
          if ($staff_attendance->Start !="" && $staff_attendance->Close !="")
          {
             
           /*  $Start = $this->fix_date_seconds($staff_attendance->Start);
             $Close = $this->fix_date_seconds($staff_attendance->Close);

             if ((\Carbon\Carbon::parse($Close)->diffInSeconds($Start)) < $default_working_seconds)
             {
                $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "Early Out";
             }else
             {
                $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "Present";
             }
            */

             if(($staff_attendance->LateIn != "" && $show_earlyout == "true" && $staff_attendance->LateIn > 0 || $staff_attendance->EarlyOut != "" && $show_earlyout == "true" && $staff_attendance->EarlyOut > 0))
             {
              
                  if($staff_attendance->LateIn != "" && $show_earlyout == "true" && $staff_attendance->LateIn > 0)
                  {
                      $latein_check = true;
                      $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "LI";
                  }
        
                  if($staff_attendance->EarlyOut != "" && $show_earlyout == "true" && $staff_attendance->EarlyOut > 0)       
                    {
                      $clocking_stat = 2;
                      $earlyout_check = true; 
                      $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "EO";
                    }                   
                   

                    if($latein_check == true && $earlyout_check == true)
                    {
                      $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "LI-EO";
                    }
                    elseif($latein_check == false && $earlyout_check == false)
                    {
                      $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "P";
                    }

             }else{

              $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "P";
             }






             

          }else
          { 
                $cockin_daily_record[$staff_attendance->e_id][$staff_attendance->TDate] = "A";
          }



      }

      

      $date_list=array();
      $day=array();
      $date_no=array();
     
      $month = date('m', strtotime($month_of));
      $year = date('Y', strtotime($month_of));

      for($d=1; $d<=31; $d++)
      {
          $time=mktime(12, 0, 0, $month, $d, $year);          
          if (date('m', $time)==$month)       
              $date_list[]=date('Y-m-d', $time);
              $date_no[] = date('d', $time);
              $day[] = date('D', $time);
      }

      $department = Department::orderBy('name')->pluck('name','id');
     
      return view('attendance_regularisation.view_attendace_summary_list',compact('request','department','users','date_list','day','date_no','cockin_daily_record','regularisation','user_category'));
    }
    else{
       return view('errors.403');
     }
     
    }

  public function my_attendance_regularisation_list($sap_no)
    {
      ////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;

        $one_person_reg_list="yes";
        
        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        
        $check_hod_view = DB::table('group_hod')->where('hod_sap',$user->sap)->where('department_id',$get_user_details->department_id)->get();
      

        //$loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $loggedin_sap = $user->sap;
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin
//dd($user->can('hod-can-view-regularisation'));
if ($user->can('can-view-all-users') || ($loggedin_sap==$sap_no) ||  ($user->can('hod-can-view-regularization') && count( $check_hod_view) > 0)) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////
  
/*$regularisation_lists =  DB::table('vw_regularisations')
            ->select('regularisation_grp_no', 'reason', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'hod_approver_name', 'hr_approver', 'hod_approver_status', 'hr_status', 'full_uniq_reg_id', 'hod_approver_actual_name')
            ->where('user_id', $get_user_id)
            ->where('submitted', 1)
            ->groupBy('regularisation_grp_no')          
            ->groupBy('regularisation_requester_sap_no')          
            ->groupBy('regularisation_requester_name')          
            ->groupBy('full_uniq_reg_id')          
            ->groupBy('hod_approver_name')          
            ->groupBy('hr_approver')          
            ->groupBy('date_and_time_submited')          
            ->groupBy('reason')          
            ->groupBy('hod_approver_status')          
            ->groupBy('hr_status')    
            ->groupBy('hod_approver_actual_name') 
            ->orderBy('date_and_time_submited', 'desc')      
            ->get();
*/

$regularisation_lists =  DB::table('vw_regularisations')
            ->select('regularisation_grp_no','hod_approver_name', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'full_uniq_reg_id')
            ->where('sap', $sap_no)
            ->where('submitted','=','1')
            ->groupBy('regularisation_grp_no')          
            ->groupBy('regularisation_requester_sap_no') 
            ->groupBy('hod_approver_name')         
            ->groupBy('regularisation_requester_name')  
            ->groupBy('full_uniq_reg_id') 
            ->groupBy('date_and_time_submited')      
            ->orderBy('date_and_time_submited', 'desc')      
            ->get();

  $hod_approvalObj =  DB::table('vw_regularisations')->select('full_uniq_reg_id','regularisation_grp_no','hod_approver_actual_name','regularisation_requester_sap_no')->where('hod_approver_status','!=','0')
                      ->where('submitted','=','1')
                      ->groupBy('regularisation_grp_no')   
                      ->groupBy('hod_approver_actual_name')  
                      ->groupBy('full_uniq_reg_id')         
                      ->groupBy('regularisation_requester_sap_no')->get();

  $hr_approvalObj =  DB::table('vw_regularisations')->select('full_uniq_reg_id','regularisation_grp_no','hr_approver','regularisation_requester_sap_no')->where('hr_status','!=','0')
                      ->where('submitted','=','1')
                      ->groupBy('regularisation_grp_no')   
                      ->groupBy('hr_approver')  
                      ->groupBy('full_uniq_reg_id')         
                      ->groupBy('regularisation_requester_sap_no')->get();
  $hod_arr = array();
  $hr_arr = array();
  
                      foreach ($hod_approvalObj as $obj)
                      {
                          $hod_arr[$obj->full_uniq_reg_id]["hod_approver_name"] = $obj->hod_approver_actual_name;
                      }

                      foreach ($hr_approvalObj as $obj)
                      {
                          $hr_arr[$obj->full_uniq_reg_id]["hr_approver"] = $obj->hr_approver;
                      }

  return view('attendance_regularisation.view_reg_list', compact('hr_arr','hod_arr','regularisation_lists', 'sap_no', 'get_user_name', 'one_person_reg_list'));
      }
       else{
          return view('errors.403');
        }
}


public function role_back_regularisation($request_id, Request $request)
{
         
        $user = Auth::user();
        $rollback_by = $user->first_name." ".$user->name;

        //dd($user->first_name);
         if($user->hasRole('HR') || $user->hasRole('HOD') || $user->can('can-rollback-regularisation-request')) 
         {

           
           
           $check = DB::table('regularisations')->where('submitted',1)->where('full_uniq_reg_id',$request_id)->get();
           
           if(count($check) > 0)
           {


            $staff_details = DB::table('users')->where('sap',$check[0]->sap)->first();

            $reason = $request->reason;
            $staff = $staff_details->email; 

            $hod ="";

           // dd($check[0]->hod_approver_sap);

            if (isset($check[0]->hod_approver_sap))
            $hod = DB::table('users')->where('sap',$check[0]->hod_approver_sap)->first();

            if(isset($hod->email))
            $hod = $hod->email;
           
            $biometric_no = $check[0]->sap;
            $full_name = $staff_details->name." ".$staff_details->first_name;
            $month_of =  date('F Y', strtotime($check[0]->date_to_regulate));

            $data = array(
              'reason' => $reason,
              'rollback_by' => $rollback_by,
              'full_uniq_reg_id' => $request_id,
              'biometric_no' => $biometric_no,
              'full_name' => $full_name,
              'month_of' => $month_of
            );

           
           $update = DB::table('regularisations')->where('full_uniq_reg_id',$request_id)
           ->update(["submitted" => 0, "hod_approver_sap_actual" => NULL, "hr_approver_id" =>NULL, "hod_approver_status"=> NULL, "hod_comments"=>NULL, "hr_comments"=>NULL, "hr_status"=> NULL, "hr_approver_sap"=>NULL ]);

            //Send Email To Staff, HOD 
            
           
            Mail::send('emails.regularisation_rollback', $data, function($message) use ($data, $staff, $hod, $request_id){
              $message->from("dorc_it@dangoteprojects.com", 'Dangote Refinery IT');
              $message->to($staff, $hod);
              $message->subject('ALERT : Regularisation Status For Reg ID: '.$request_id);
            });

            return redirect('/view_other_staff_reg_list')->with('success','Rollback was successful');
           }

         }else
         {
            return redirect('/view_other_staff_reg_list')->with('error','You are not authorized to perform this rollback process');
         }

}


 public function view_other_staff_reg_list(Request $request)
    { 
      
    
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

        $one_person_reg_list="no";

        $user_category = isset($request->category)?$request->category:"";

        $user_cat_query =  $user_category=="all"?"": $user_category;


        $filter = 0;
        $filter_dept = isset($request->department)?$request->department:"";
        if(isset($request->filter))
        {
              if ($request->filter == "approved")
              {
                $filter = 1;
              }else if ($request->filter == "pending")
              {
                $filter = 0;
              }else
              {
                $filter = 2;
              }
        }

        

       // dd($user_cat_query);

       

if ($user->can('can-view-all-users')) { 
//conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
/////////////////////////////////////////////////////////////////////////////////
 
/*$regularisation_lists =  DB::table('vw_regularisations')
            ->select('regularisation_grp_no', 'reason', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'hod_approver_name', 'hr_approver', 'hod_approver_status', 'hr_status', 'full_uniq_reg_id', 'hod_approver_actual_name')
            ->groupBy('regularisation_grp_no')          
            ->groupBy('regularisation_requester_sap_no')          
            ->groupBy('regularisation_requester_name')  
            ->groupBy('full_uniq_reg_id')                  
            ->groupBy('hod_approver_name')          
            ->groupBy('hr_approver')          
            ->groupBy('date_and_time_submited')          
            ->groupBy('reason')          
            ->groupBy('hod_approver_status')          
            ->groupBy('hr_status')    
            ->groupBy('hod_approver_actual_name')    
            ->orderBy('date_and_time_submited', 'desc')      
            ->get();*/
           
           
            $queryBuilder = vw_regularisations::query();
            
            $queryBuilder->select('regularisation_grp_no','hod_approver_name', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'full_uniq_reg_id')
            ->where('submitted','=','1');
            //dd($filter);

            

            
                
            

            if($user_category !="all")
            {
              
              $queryBuilder->where('user_category_id','LIKE',"%".$user_category."%");
            }

            //$regularisation_lists = $queryBuilder->get();
           // dd($regularisation_lists);
           
            if($user->hasRole('HOD'))
            {
              
             
              if ($filter == 1)
              {
                $queryBuilder->where('hod_approver_status','!=',0);
                
              }else if ($filter == 0)
              {
                $queryBuilder->where('hod_approver_status', $filter);
              }

              $queryBuilder->where('hod_approver_sap', $user->sap);
              
            }

            
            
            if($user->hasRole('HR'))
            {
              
              
              if ($filter == 1)
              {
                $queryBuilder->where('hr_status','!=',0);
                
              }else if ($filter == 0)
              {
                $queryBuilder->where('hr_status', $filter);
              }

              
             
              //get the group ID which the HR manages
              $hr_group_id = DB::table('group_hrbp_admin')->where('hr_sap', $user->sap)->pluck('group_id');
              
              //get all the staff ID under that group
              $staff_sap_arr = DB::table('users')->where('mapped_to_groupid',$hr_group_id)->pluck('sap');

            // dd($staff_sap_arr);
              
              $queryBuilder->whereIn('sap', $staff_sap_arr );
                
            }
            


            if(isset($request->department))
            {
              
              $queryBuilder->where('department_id',  $filter_dept);
            }

            
            
            $queryBuilder->groupBy('regularisation_grp_no')          
            ->groupBy('regularisation_requester_sap_no') 
            ->groupBy('hod_approver_name')         
            ->groupBy('regularisation_requester_name')  
            ->groupBy('full_uniq_reg_id') 
            ->groupBy('date_and_time_submited')      
            ->orderBy('date_and_time_submited', 'desc');

            $regularisation_lists = $queryBuilder->get();

            

  $hod_approvalObj =  DB::table('vw_regularisations')->select('full_uniq_reg_id','regularisation_grp_no','hod_approver_actual_name','regularisation_requester_sap_no')->where('hod_approver_status','!=','0')
                      ->where('submitted','=','1')
                     // ->where('hod_approver_id', $loggedin_user_id)
                      ->groupBy('regularisation_grp_no')   
                      ->groupBy('hod_approver_actual_name')  
                      ->groupBy('full_uniq_reg_id')         
                      ->groupBy('regularisation_requester_sap_no')->get();

  $hr_approvalObj =  DB::table('vw_regularisations')->select('full_uniq_reg_id','regularisation_grp_no','hr_approver','regularisation_requester_sap_no')->where('hr_status','!=','0')
                      ->where('submitted','=','1')
                     // ->where('hbp_id', $loggedin_user_id )
                      ->groupBy('regularisation_grp_no')   
                      ->groupBy('hr_approver')  
                      ->groupBy('full_uniq_reg_id')         
                      ->groupBy('regularisation_requester_sap_no')->get();
  $hod_arr = array();
  $hr_arr = array();
  
                      foreach ($hod_approvalObj as $obj)
                      {
                          $hod_arr[$obj->full_uniq_reg_id]["hod_approver_name"] = $obj->hod_approver_actual_name;
                      }

                      foreach ($hr_approvalObj as $obj)
                      {
                          $hr_arr[$obj->full_uniq_reg_id]["hr_approver"] = $obj->hr_approver;
                      }
                      
                      $department_list = DB::table('departments')->get();           
      return view('attendance_regularisation.view_reg_list', compact('filter_dept','filter','department_list','hr_arr','hod_arr','regularisation_lists', 'one_person_reg_list','user_category'));
      }
      elseif ($user->can('can-view-staff')) { 
//conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
/////////////////////////////////////////////////////////////////////////////////
  
$regularisation_lists =  DB::table('vw_regularisations')
->select('regularisation_grp_no','hod_approver_name', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'full_uniq_reg_id')
->where('submitted','=','1')
->groupBy('regularisation_grp_no')          
->groupBy('regularisation_requester_sap_no') 
->groupBy('hod_approver_name')         
->groupBy('regularisation_requester_name')  
->groupBy('full_uniq_reg_id') 
->groupBy('date_and_time_submited')      
->orderBy('date_and_time_submited', 'desc')      
->get();



           $queryBuilder = vw_regularisations::query();
            
            $queryBuilder->select('regularisation_grp_no','hod_approver_name', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'full_uniq_reg_id')
            ->where('submitted','=','1');

            $loggedin_user_sap = $user->sap;

            

            if($user_category !="all")
            {
              $queryBuilder->where('user_category_id','LIKE',"%".$user_category."%");
            }

            if($user->hasRole('HOD'))
            {
                if ($filter == 1)
                {
                  $queryBuilder->where('hod_approver_status','!=',0);
                  
                }else if ($filter == 0)
                {
                  $queryBuilder->where('hod_approver_status', $filter);
                }

              $queryBuilder->where('hod_approver_sap', $loggedin_user_sap);
              
            }
            
            if($user->hasRole('HR'))
            {

                  if ($filter == 1)
                  {
                    $queryBuilder->where('hr_status','!=',0);
                    
                  }else if ($filter == 0)
                  {
                    $queryBuilder->where('hr_status', $filter);
                  }

                 //get the group ID which the HR manages
                  $hr_group_id = DB::table('group_hrbp_admin')->where('hr_sap', $user->sap)->pluck('group_id');

                  //get all the staff ID under that group
                  $staff_sap_arr = DB::table('users')->where('mapped_to_groupid',$hr_group_id)->pluck('sap');

                  $queryBuilder->whereIn('sap',  $staff_sap_arr );
                
            }

            if(isset($request->department))
            {
              $queryBuilder->where('department_id', $filter_dept);
            }
            
            $queryBuilder->groupBy('regularisation_grp_no')          
            ->groupBy('regularisation_requester_sap_no') 
            ->groupBy('hod_approver_name')         
            ->groupBy('regularisation_requester_name')  
            ->groupBy('full_uniq_reg_id') 
            ->groupBy('date_and_time_submited')      
            ->orderBy('date_and_time_submited', 'desc');

            $regularisation_lists = $queryBuilder->get();

/*
//For HOD role
if($user->hasRole('HOD'))
    $regularisation_lists =  DB::table('vw_regularisations')
    ->select('regularisation_grp_no','hod_approver_name', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'full_uniq_reg_id')
    ->where('hod_approver_id', $loggedin_user_id)
    ->where('submitted','=','1')
    ->groupBy('regularisation_grp_no')          
    ->groupBy('regularisation_requester_sap_no') 
    ->groupBy('hod_approver_name')         
    ->groupBy('regularisation_requester_name')  
    ->groupBy('full_uniq_reg_id') 
    ->groupBy('date_and_time_submited')      
    ->orderBy('date_and_time_submited', 'desc')      
    ->get();

 
//for HBP role
if($user->hasRole('HR'))
    $regularisation_lists =  DB::table('vw_regularisations')
    ->select('regularisation_grp_no','hod_approver_name', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'full_uniq_reg_id')
    ->where('submitted','=','1')
    ->where('hbp_id', $user->sap )
    ->groupBy('regularisation_grp_no')          
    ->groupBy('regularisation_requester_sap_no') 
    ->groupBy('hod_approver_name')         
    ->groupBy('regularisation_requester_name')  
    ->groupBy('full_uniq_reg_id') 
    ->groupBy('date_and_time_submited')      
    ->orderBy('date_and_time_submited', 'desc')      
    ->get();*/

$hod_approvalObj =  DB::table('vw_regularisations')->select('full_uniq_reg_id','regularisation_grp_no','hod_approver_actual_name','regularisation_requester_sap_no')->where('hod_approver_status','!=','0')
          //->where('hod_approver_id_actual', $loggedin_user_id)
          ->groupBy('regularisation_grp_no')   
          ->groupBy('hod_approver_actual_name')  
          ->groupBy('full_uniq_reg_id')         
          ->groupBy('regularisation_requester_sap_no')->get();

$hr_approvalObj =  DB::table('vw_regularisations')->select('full_uniq_reg_id','regularisation_grp_no','hr_approver','regularisation_requester_sap_no')->where('hr_status','!=','0')
          //->where('hbp_id', $loggedin_user_id )
          ->groupBy('regularisation_grp_no')   
          ->groupBy('hr_approver')  
          ->groupBy('full_uniq_reg_id')         
          ->groupBy('regularisation_requester_sap_no')->get();
$hod_arr = array();
$hr_arr = array();

          foreach ($hod_approvalObj as $obj)
          {
              $hod_arr[$obj->full_uniq_reg_id]["hod_approver_name"] = $obj->hod_approver_actual_name;
          }

          foreach ($hr_approvalObj as $obj)
          {
              $hr_arr[$obj->full_uniq_reg_id]["hr_approver"] = $obj->hr_approver;
          }
  $department_list = DB::table('departments')->get();

  return view('attendance_regularisation.view_reg_list', compact('user_category','filter_dept','filter','department_list','hr_arr','hod_arr','regularisation_lists', 'one_person_reg_list'));
      }

       else{
          return view('errors.403');
        }
}





  public function view_regularisation_details($sap_no, $reg_grp_no)
    {
      ////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin
        
        //dd($get_user_id);
        //////////get the department in the regularisation// 
        //NOTE: the deparment in the regularisation might be diffrent from the original department of the user due to staff rotation
        $get_dep_in_reg_xxx = Regularisation::where('sap', $sap_no)->where('regularisation_grp_no', $reg_grp_no)->first();
        $get_dep_in_reg = $get_dep_in_reg_xxx->department_id;
       
        $check_hod_view = DB::table('group_hod')->where('hod_sap',$user->sap)->where('department_id',$get_user_details->department_id)->get();
      


if ($user->can('can-view-all-users') || $loggedin_user_id==$get_user_id || ($user->can('can-view-staff') && $get_dep_in_reg_xxx->hod_approver_sap == Auth::user()->sap)  ||  ($user->can('hod-can-view-regularization') && $get_dep_in_reg_xxx->hod_approver_sap == Auth::user()->sap)) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////
        /// 
  
  // dd('hello new page');
$regularisation_lists = Regularisation::where('sap', $sap_no)->where('regularisation_grp_no', $reg_grp_no)->orderBy('date_to_regulate', 'asc')->get();

$hod_approval_proc = Regularisation::where('sap', $sap_no)->where('regularisation_grp_no', $reg_grp_no)->where('hod_approver_status',"!=", 0)->orderBy('date_to_regulate', 'asc')->first();
//$hod_approval_proccess = count($hod_approval_proc);

if (isset($hod_approval_proc->hod_approver_sap_actual))
{
  $hod_approve_details = User::where('sap', $hod_approval_proc->hod_approver_sap_actual)->first();
}else
{
  $hod_approve_details = "";
}



$hr_approval_proc =  Regularisation::where('sap', $sap_no)->where('regularisation_grp_no', $reg_grp_no)->orderBy('date_to_regulate', 'asc')->first();

//dd($hr_approval_proc);

if (isset($hr_approval_proc->hr_approver_sap))
{
  $hr_approve_details = User::where('sap', $hr_approval_proc->hr_approver_sap)->first();
}else
{
  $hr_approve_details = "";
}


//$hr_approval_proccess = count($hr_approval_proc);

$total_no_of_days = count($regularisation_lists);

$regularisation_month = Regularisation::where('sap', $sap_no)->where('regularisation_grp_no', $reg_grp_no)->first();

//To be approve by
if(isset($regularisation_month->hod_approver_sap) && $regularisation_month->hod_approver_sap !="")
{
  $to_be_approve_by = DB::table('users')->where('sap',$regularisation_month->hod_approver_sap)->first();

  $first_name = isset($to_be_approve_by->first_name)?$to_be_approve_by->first_name:"";
  $last_name = isset($to_be_approve_by->name)?$to_be_approve_by->name:"";

  $to_be_approve_by = $first_name." ".$last_name;
}
return view('attendance_regularisation.view_regularisation_details', compact('hr_approve_details','to_be_approve_by','regularisation_lists', 'get_user_details', 'regularisation_month', 'total_no_of_days', 'hod_approve_details', 'hod_approval_proc','hr_approval_proc'));
  }
   else{
      return view('errors.403');
    }
}

public function ajax_get_hod_approval_status(Request $request)
{
   //////////////////////////info about loggedin user/////////////////////////////////
   $user = \Auth::user(); //note the user that logs in
   $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
   $department_id = Auth::user()->department_id; //get the id of the department that loggedin
   $user_id = $_GET["user_id"];

   

$hod_approver_option = $_GET["get_option"];

$regularisation_grp_no = $_GET["regularisation_grp_no"];

////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('id', $user_id)->first();
        $get_user_department = $get_user_details->department_id;


$check_hr_status = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();
//get the HR status of the Regularisation. meaning 
 $get_dep_in_reg = $check_hr_status->department_id; //get the dep on reg req

 $check_hod_view = DB::table('group_hod')->where('hod_sap',$user->sap)->where('department_id',$get_user_details->department_id)->get();
      

if  (($user->can('can-view-all-users')) || (($user->can('can-approve-regularisation-hod')) &&  $check_hr_status->hod_approver_sap == Auth::user()->sap)) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////


        $date = "";
        $comments = "";
        foreach($request->data as $val)
        {
          $date = $val["name"];
      
          $comments = $val["value"];
      
          if ($date == "date_to_regulate" || $date == "allcb")
          {
            
          }else 
          {
            if ($comments == null)
            {
      
            }else
            {
              Regularisation::where('user_id', $user_id)->where('date_to_regulate', $date)->update(["hod_comments" => $comments]);
            }
            
          }
      
         
      
        }

 
if($check_hr_status->hr_status==0 || $check_hr_status->hr_status==1){  //meaning only do this if the HR has not approved
$get_date_to_regulates = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->get();

foreach ($get_date_to_regulates as $get_date_to_regulate) {
  $store_hod_regularisation_status = Regularisation::where('user_id', $user_id)
  ->where('regularisation_grp_no', $regularisation_grp_no)
  ->wherein('date_to_regulate',$request->selected_dates)
  ->update(['hod_approver_status' => $hod_approver_option, 'hod_approver_id_actual' => $loggedin_user_id, 'hod_approver_sap_actual' => $user->sap]);
}
}

$allow_to_approve_hod = "YES";
$regularisation_list = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();




/////////The Email notification starts from here /////////////////////////////////             
 $check_if_email_notifications_is_enabled = Email_notification::where('email_notification_id', 1 )->first();
if (($check_if_email_notifications_is_enabled->email_notification) ==1 ){ //only send emails if email notifications is enabled

$regularisation_month = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();

    $requester_name=  $regularisation_month->user->name;
    $requester_email=  $regularisation_month->user->email;
    $hod_approver_status = $regularisation_month->hod_approver_status;
    $hr_status = $regularisation_month->hr_status;
    $full_uniq_reg_id = $regularisation_month->full_uniq_reg_id;

    $data = array(
    'sap_no' => $regularisation_month->user->sap,
    'regularisation_grp_no' => $regularisation_grp_no,
    'hod_approver_name_actua' => $regularisation_month->user_hod_approver_id_actual->name,
    'hod_approver_email_actua' => $regularisation_month->user_hod_approver_id_actual->email,
    'date_and_time_submited' => \Carbon\Carbon::parse($regularisation_month->date_and_time_submited)->format('d-m-Y H:i:s'),
    'staff_name' => $regularisation_month->user->name,
    'full_uniq_reg_id' => $full_uniq_reg_id,
    'hod_approver_status' => $hod_approver_status,
    'hr_status' => $hr_status,
    );

 
 $staff_group =  DB::table('users')->where('sap',$regularisation_month->user->sap)->first()->mapped_to_groupid;
 $hr_email_add = DB::table('group_hrbp_admin')->where('group_id',$staff_group)->join('users','group_hrbp_admin.hr_sap','users.sap')->first();



 if($hod_approver_status==1){ //if approved send mail to HR and CC the requester

      if (isset($hr_email_add->email))
      {
        Mail::send('emails.regularisation_status_to_whom_concerned', $data, function($message) use ($data,$hr_email_add, $requester_email, $requester_name, $full_uniq_reg_id){
              $message->from("dorc_it@dangoteprojects.com", 'Dangote Refinery IT');
              $message->to($hr_email_add->email, 'HR');
              $message->cc($requester_email, $requester_name);
              $message->subject('ALERT : Regularisation Status For Reg ID: '.$full_uniq_reg_id);
            });
      }

 }

 elseif($hod_approver_status==2){ //if rejected, send mail to only the requester
  if (isset($hr_email_add->email))
  {
   Mail::send('emails.regularisation_status_to_whom_concerned', $data, function($message) use ($data,$hr_email_add, $requester_email, $requester_name, $full_uniq_reg_id){
      $message->from("dorc_it@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to($hr_email_add->email, 'HR');
      $message->cc($requester_email, $requester_name);
      $message->subject('ALERT : Regularisation Status For Reg ID: '.$full_uniq_reg_id);
    });
  }
 }

}
//////End of Email notification /////////////////////////////

  return view('attendance_regularisation.ajax_get_hod_approval_status', compact('regularisation_list', 'allow_to_approve_hod'));

}

else
{
  $allow_to_approve_hod = "NO";
  $regularisation_list = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();
  return view('attendance_regularisation.ajax_get_hod_approval_status', compact('regularisation_list', 'allow_to_approve_hod'));
}

}

public function ajax_get_hr_approval_status(Request $request)
{

  //////////////////////////info about loggedin user/////////////////////////////////
  $user = \Auth::user(); //note the user that logs in
  $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
  $department_id = Auth::user()->department_id; //get the id of the department that loggedin

  $hr_approver_option = $_GET["get_option"];
  $user_id = $_GET["user_id"];
  $regularisation_grp_no = $_GET["regularisation_grp_no"];


  if ($user->can('can-approve-regularisation-hr')) { //conditions to be met are: 1.allow user access for HR that can approve 
  /////////////////////////////////////////////////////////////////////////////////


    
        $date = "";
        $comments = "";
        foreach($request->data as $val)
        {
          $date = $val["name"];

          $comments = $val["value"];

          if ($date == "date_to_regulate" || $date == "allcb")
          {
            
          }else 
          {
            if ($comments == null)
            {

            }else
            {
              Regularisation::where('user_id', $user_id)->where('date_to_regulate', $date)->update(["hr_comments" => $comments]);
            }
            
          }
        }

    $check_hod_status = Regularisation::where('user_id', $user_id)->where('hod_approver_status','!=', 0)->where('regularisation_grp_no', $regularisation_grp_no)->count();
    
    //get the HOD status of the Regularisation

    if($check_hod_status > 0){ //meaning only do this if the HOD has approved
    $get_date_to_regulates = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->get();
     
      foreach ($get_date_to_regulates as $get_date_to_regulate) {
        
        $store_hod_regularisation_status = Regularisation::where('user_id', $user_id)
        ->where('regularisation_grp_no', $regularisation_grp_no)
        ->wherein('date_to_regulate',$request->selected_dates)
        ->update(['hr_status' => $hr_approver_option, 'hr_approver_id' => $loggedin_user_id, 'hr_approver_sap' => $user->sap]);
      }
    }

    $allow_to_approve_hr = "YES";
    $regularisation_list = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();
    
/////////The Email notification starts from here /////////////////////////////////             
 $check_if_email_notifications_is_enabled = Email_notification::where('email_notification_id', 1 )->first();
if (($check_if_email_notifications_is_enabled->email_notification) ==1 ){ //only send emails if email notifications is enabled

$regularisation_month = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();

    $requester_name=  $regularisation_month->user->name;
    $requester_email=  $regularisation_month->user->email;
    $hod_approver_status = $regularisation_month->hod_approver_status;
    $hr_status = $regularisation_month->hr_status;
    $full_uniq_reg_id = $regularisation_month->full_uniq_reg_id;

    $data = array(
    'sap_no' => $regularisation_month->user->sap,
    'regularisation_grp_no' => $regularisation_grp_no,
    'hod_approver_name_actua' => $regularisation_month->user_hod_approver_id_actual->name,
    'hod_approver_email_actua' => $regularisation_month->user_hod_approver_id_actual->email,
    'date_and_time_submited' => \Carbon\Carbon::parse($regularisation_month->date_and_time_submited)->format('d-m-Y H:i:s'),
    'staff_name' => $regularisation_month->user->name,
    'full_uniq_reg_id' => $full_uniq_reg_id,
    'hod_approver_status' => $hod_approver_status,
    'hr_status' => $hr_status,
    );

   Mail::send('emails.regularisation_status_to_whom_concerned', $data, function($message) use ($data, $requester_email, $requester_name, $full_uniq_reg_id){
      $message->from("dorc_it@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to($requester_email, $requester_name);
      $message->subject('ALERT : Regularisation Status For Reg ID: '.$full_uniq_reg_id);
    });
}
//////End of Email notification /////////////////////////////


    return view('attendance_regularisation.ajax_get_hr_approval_status', compact('regularisation_list', 'allow_to_approve_hr'));
    }

    else
    {
    $allow_to_approve_hr = "NO";
    $regularisation_list = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();
    return view('attendance_regularisation.ajax_get_hr_approval_status', compact('regularisation_list', 'allow_to_approve_hr'));
    }

  }



}
