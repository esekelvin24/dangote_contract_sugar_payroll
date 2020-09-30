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

      $get_hod_for_the_user = vw_user_roleuser_role::where('department_id', $get_user_department)->where('role_id', '=', 4)->pluck('name','user_id');

        $departments=Department::orderBy('name')->pluck('name','id');
        $office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');

      // dd($get_hod_for_the_user);
    
        return view('attendance_regularisation.attendance_regularisation', compact('attendances', 'leave_array', 'validated_array', 'monthsOfYear', 'get_user_details', 'holidays_list', 'regularisation_list_hod_pending', 'regularisation_list_hod_approved', 'regularisation_list_hod_rejected', 'regularisation_list_hr_pending', 'regularisation_list_hr_approved', 'regularisation_list_hr_rejected', 'leave_request_list_hod_pending', 'leave_request_list_hod_approved', 'leave_request_list_hod_rejected', 'leave_request_list_hr_pending', 'leave_request_list_hr_approved', 'leave_request_list_hr_rejected', 'regularisation_list', 'x', 'get_hod_for_the_user', 'departments', 'office_locations', 'dates_in_this_month', 'attendances_array'));
   
        }
       else{
         return view('errors.403', compact('profile_info'));
        }
    }

////////////////////////////////////////////////////////////////////////
 public function ajax_get_hod_approver_list()
{

$get_selecte_hod_dep_id = $_GET["get_option"];

$get_hod_for_the_user = vw_user_roleuser_role::where('department_id', $get_selecte_hod_dep_id)->where('role_id', '=', 4)->pluck('name','user_id');

return view('attendance_regularisation.ajax_get_hod_approver_list', compact('get_hod_for_the_user', 'get_selecte_hod_dep_id'));
}




///////////////////////AJAX MONTH attendance CALL/////////////////////////////////////////////////////
    public function get_month_attendance_regularisation(Request $request, $sap_no)
    {

        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;

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
        
      $x=0;
        $html = view('attendance_regularisation.get_month_attendance_regularisation', compact('attendances', 'leave_array', 'validated_array', 'monthsOfYear', 'holidays_list', 'regularisation_list_hod_pending', 'regularisation_list_hod_approved', 'regularisation_list_hod_rejected', 'regularisation_list_hr_pending', 'regularisation_list_hr_approved', 'regularisation_list_hr_rejected', 'leave_request_list_hod_pending', 'leave_request_list_hod_approved', 'leave_request_list_hod_rejected', 'leave_request_list_hr_pending', 'leave_request_list_hr_approved', 'leave_request_list_hr_rejected', 'regularisation_list', 'x', 'dates_in_this_month', 'attendances_array'))->render();
        return  $html;
    }


  public function store_attendance_regularisation(Request $request, $sap_no)
    {

      // dd($request->all());
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
              'reason' => 'required',
              'date_to_regulate' => 'required',
              'department_id' => 'required',
              'location_id' => 'required',
              'attached_doc' => 'max:10000|mimes:jpeg,png,jpg,pdf,doc,docx'
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



    $date_to_regulates = $request->date_to_regulate; //get the list of date to regulate
    foreach ($date_to_regulates as $date_to_regulate) {

    $regularisation =  new Regularisation();
    $regularisation->user_id = $get_user_id;
    $regularisation->reg_request_submited_by = $loggedin_user_id;
    $regularisation->hod_approver_id = $request->hod_approver_id;
    $regularisation->department_id = $request->department_id;
    $regularisation->location_id = $request->location_id;
    $regularisation->reason = $request->reason;
    $regularisation->date_to_regulate = $date_to_regulate;
    $regularisation->regularisation_grp_no = $new_regularisation_grp_no;
    $regularisation->date_and_time_submited = $date_and_time_submited;
    $regularisation->full_uniq_reg_id = 'REG_NO_'.$sap_no.'_'.$new_regularisation_grp_no;
    $regularisation->unique_sap_date = $date_to_regulate.'_'.$sap_no;
    $regularisation->attached_doc = $filename;
    $regularisation->save();

    }

    //The Email notification starts from here       
 $check_if_email_notifications_is_enabled = Email_notification::where('email_notification_id', 1 )->first();
if (($check_if_email_notifications_is_enabled->email_notification) ==1 ){ //only send emails if email notifications is enabled

$regularisation_month = Regularisation::where('user_id', $get_user_id)->where('regularisation_grp_no', $new_regularisation_grp_no)->first();


    $hod_email = $regularisation_month->user_hod_approver->email;
    $hod_name=  $regularisation_month->user_hod_approver->name;

    $data = array(
    'sap_no' => $sap_no,
    'new_regularisation_grp_no' => $new_regularisation_grp_no,
    'hod_approver_name' => $hod_name,
    'hod_approver_email' => $hod_email,
    'date_and_time_submited' => \Carbon\Carbon::parse($regularisation_month->date_and_time_submited)->format('d-m-Y H:i:s'),
    'staff_name' => $regularisation_month->user->name,
    'full_uniq_reg_id' => $regularisation_month->full_uniq_reg_id,
    );

 Mail::send('emails.regularisation_pending_approval_hod', $data, function($message) use ($data, $hod_email, $hod_name){
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to($hod_email, $hod_name);
      $message->subject('ALERT : Pending Attendance Regularisation for your Approval. Please approve to process it.');
    });
}
//End of Email notification /////////////////////////////

       Alert::success('Record Created Successfully')->autoclose(3000);
        return redirect('view_regularisation_details/'.$sap_no.'/'.$new_regularisation_grp_no);
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
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////
  
$regularisation_lists =  DB::table('vw_regularisations')
            ->select('regularisation_grp_no', 'reason', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'hod_approver_name', 'hr_approver', 'hod_approver_status', 'hr_status', 'full_uniq_reg_id', 'hod_approver_actual_name')
            ->where('user_id', $get_user_id)
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


  return view('attendance_regularisation.view_reg_list', compact('regularisation_lists', 'sap_no', 'get_user_name', 'one_person_reg_list'));
      }
       else{
          return view('errors.403');
        }
}



 public function view_other_staff_reg_list()
    {
    
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

        $one_person_reg_list="no";

if ($user->can('can-view-all-users')) { 
//conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
/////////////////////////////////////////////////////////////////////////////////
  
$regularisation_lists =  DB::table('vw_regularisations')
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
            ->get();


  return view('attendance_regularisation.view_reg_list', compact('regularisation_lists', 'one_person_reg_list'));
      }

      elseif ($user->can('can-view-staff')) { 
//conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
/////////////////////////////////////////////////////////////////////////////////
  
$regularisation_lists =  DB::table('vw_regularisations')
            ->select('regularisation_grp_no', 'reason', 'regularisation_requester_sap_no', 'regularisation_requester_name', 'date_and_time_submited', 'hod_approver_name', 'hr_approver', 'hod_approver_status', 'hr_status', 'full_uniq_reg_id', 'hod_approver_actual_name')
            ->where('department_id', $department_id)
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

  return view('attendance_regularisation.view_reg_list', compact('regularisation_lists', 'one_person_reg_list'));
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

        //////////get the department in the regularisation// 
        //NOTE: the deparment in the regularisation might be diffrent from the original department of the user due to staff rotation
        $get_dep_in_reg_xxx = Regularisation::where('user_id', $get_user_id)->where('regularisation_grp_no', $reg_grp_no)->first();
        $get_dep_in_reg = $get_dep_in_reg_xxx->department_id;


if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && (($department_id==$get_dep_in_reg) || ($department_id==$get_user_department)))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////
        /// 
  
  // dd('hello new page');
$regularisation_lists = Regularisation::where('user_id', $get_user_id)->where('regularisation_grp_no', $reg_grp_no)->orderBy('date_to_regulate', 'asc')->get();

$total_no_of_days = count($regularisation_lists);

$regularisation_month = Regularisation::where('user_id', $get_user_id)->where('regularisation_grp_no', $reg_grp_no)->first();

return view('attendance_regularisation.view_regularisation_details', compact('regularisation_lists', 'get_user_details', 'regularisation_month', 'total_no_of_days'));
  }
   else{
      return view('errors.403');
    }
}

public function ajax_get_hod_approval_status()
{

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin


$hod_approver_option = $_GET["get_option"];
$user_id = $_GET["user_id"];
$regularisation_grp_no = $_GET["regularisation_grp_no"];

////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('id', $user_id)->first();
        $get_user_department = $get_user_details->department_id;


$check_hr_status = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();
//get the HR status of the Regularisation. meaning 
 $get_dep_in_reg = $check_hr_status->department_id; //get the dep on reg req

if (($user->can('can-view-all-users')) || (($user->can('can-approve-regularisation-hod')) && ($department_id==$get_dep_in_reg))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////

 
if($check_hr_status->hr_status==0){  //meaning only do this if the HR has not approved
$get_date_to_regulates = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->get();

foreach ($get_date_to_regulates as $get_date_to_regulate) {
  $store_hod_regularisation_status = Regularisation::where('user_id', $user_id)
  ->where('regularisation_grp_no', $regularisation_grp_no)
  ->update(['hod_approver_status' => $hod_approver_option, 'hod_approver_id_actual' => $loggedin_user_id]);
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

 if($hod_approver_status==1){ //if approved send mail to HR and CC the requester
 Mail::send('emails.regularisation_status_to_whom_concerned', $data, function($message) use ($data, $requester_email, $requester_name, $full_uniq_reg_id){
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to('belloadewalea@yahoo.com', 'TEST HR');
      $message->cc($requester_email, $requester_name);
      $message->subject('ALERT : Regularisation Status For Reg ID: '.$full_uniq_reg_id);
    });
 }

 elseif($hod_approver_status==2){ //if rejected, send mail to only the requester
   Mail::send('emails.regularisation_status_to_whom_concerned', $data, function($message) use ($data, $requester_email, $requester_name, $full_uniq_reg_id){
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to($requester_email, $requester_name);
      $message->subject('ALERT : Regularisation Status For Reg ID: '.$full_uniq_reg_id);
    });
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

public function ajax_get_hr_approval_status()
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


    $check_hod_status = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->first();
    //get the HOD status of the Regularisation

    if($check_hod_status->hod_approver_status==1){ //meaning only do this if the HOD has approved
    $get_date_to_regulates = Regularisation::where('user_id', $user_id)->where('regularisation_grp_no', $regularisation_grp_no)->get();

    foreach ($get_date_to_regulates as $get_date_to_regulate) {
    $store_hod_regularisation_status = Regularisation::where('user_id', $user_id)
    ->where('regularisation_grp_no', $regularisation_grp_no)
    ->update(['hr_status' => $hr_approver_option, 'hr_approver_id' => $loggedin_user_id]);
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
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
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
