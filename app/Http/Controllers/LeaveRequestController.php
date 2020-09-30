<?php

namespace App\Http\Controllers;
 
use App\LeaveRequest;
use Auth;
use DB;
use Alert;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Department;
use App\perment_office_location;
use App\vw_user_roleuser_role;
use App\Leave_type;
use App\Business_unit;
use App\Email_notification;
use Carbon\Carbon;
use Mail;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    



  public function my_leave_request_list($sap_no)
    {
      ////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = $get_user_details->id;
        $get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;

        $one_person_leave_list="yes";

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////
  
$leave_request_lists =  DB::table('vw_leave_requests')
           ->select('leave_req_grp_no', 'note', 'leave_requester_sap_no', 'leave_requester_name', 'date_and_time_submitted', 'hod_approver_name', 'hr_approver_name', 'hod_approver_status', 'hr_status', 'full_uniq_leave_req_id', 'leave_type', 'hod_approver_actual_name', 'leave_start_date', 'leave_end_date')
            ->where('user_id', $get_user_id)
            ->groupBy('leave_req_grp_no')          
            ->groupBy('leave_requester_sap_no')          
            ->groupBy('leave_requester_name')  
            ->groupBy('full_uniq_leave_req_id')                  
            ->groupBy('hod_approver_name')          
            ->groupBy('hr_approver_name')          
            ->groupBy('date_and_time_submitted')          
            ->groupBy('note')          
            ->groupBy('hod_approver_status')          
            ->groupBy('hr_status')   
            ->groupBy('leave_type')    
            ->groupBy('hod_approver_actual_name')  
            ->groupBy('leave_start_date')
            ->groupBy('leave_end_date') 
            ->orderBy('date_and_time_submitted', 'desc')      
            ->get();

  return view('leave_request.view_leave_req_list', compact('leave_request_lists', 'sap_no', 'get_user_name', 'one_person_leave_list'));
      }
       else{
          return view('errors.403');
        }
}





 public function view_leave_req_list()
    {
    
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

        $one_person_leave_list="no";

if ($user->can('can-view-all-users')) { 
//conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
/////////////////////////////////////////////////////////////////////////////////
  
$leave_request_lists =  DB::table('vw_leave_requests')
            ->select('leave_req_grp_no', 'note', 'leave_requester_sap_no', 'leave_requester_name', 'date_and_time_submitted', 'hod_approver_name', 'hr_approver_name', 'hod_approver_status', 'hr_status', 'full_uniq_leave_req_id', 'leave_type', 'hod_approver_actual_name', 'leave_start_date', 'leave_end_date')
            ->groupBy('leave_req_grp_no')          
            ->groupBy('leave_requester_sap_no')          
            ->groupBy('leave_requester_name')  
            ->groupBy('full_uniq_leave_req_id')                  
            ->groupBy('hod_approver_name')          
            ->groupBy('hr_approver_name')          
            ->groupBy('date_and_time_submitted')          
            ->groupBy('note')          
            ->groupBy('hod_approver_status')          
            ->groupBy('hr_status')    
            ->groupBy('leave_type')   
            ->groupBy('hod_approver_actual_name')   
            ->groupBy('leave_start_date')
            ->groupBy('leave_end_date')
            ->orderBy('date_and_time_submitted', 'desc')      
            ->get();


            return view('leave_request.view_leave_req_list', compact('leave_request_lists', 'one_person_leave_list'));
      }
 
      elseif ($user->can('can-view-staff')) { 
//conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
/////////////////////////////////////////////////////////////////////////////////
  
$leave_request_lists =  DB::table('vw_leave_requests')
           ->select('leave_req_grp_no', 'note', 'leave_requester_sap_no', 'leave_requester_name', 'date_and_time_submitted', 'hod_approver_name', 'hr_approver_name', 'hod_approver_status', 'hr_status', 'full_uniq_leave_req_id', 'leave_type', 'hod_approver_actual_name', 'leave_start_date', 'leave_end_date')
            ->where('department_id', $department_id)
            ->groupBy('leave_req_grp_no')          
            ->groupBy('leave_requester_sap_no')          
            ->groupBy('leave_requester_name')  
            ->groupBy('full_uniq_leave_req_id')                  
            ->groupBy('hod_approver_name')          
            ->groupBy('hr_approver_name')          
            ->groupBy('date_and_time_submitted')          
            ->groupBy('note')          
            ->groupBy('hod_approver_status')          
            ->groupBy('hr_status')    
            ->groupBy('leave_type')    
            ->groupBy('hod_approver_actual_name')
            ->groupBy('leave_start_date')
            ->groupBy('leave_end_date')
            ->orderBy('date_and_time_submitted', 'desc')      
            ->get();

  return view('leave_request.view_leave_req_list', compact('leave_request_lists', 'one_person_leave_list'));
      }

       else{
          return view('errors.403');
        }
}

 public function view_leave_request_details($sap_no, $leave_grp_no)
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
        $get_dep_in_leave_req_xxx = LeaveRequest::where('user_id', $get_user_id)->where('leave_req_grp_no', $leave_grp_no)->first();
        $get_dep_in_leave_req = $get_dep_in_leave_req_xxx->department_id;

if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && (($department_id==$get_dep_in_leave_req) || ($department_id==$get_user_department)))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department or if someone selected the HOS's department
        /////////////////////////////////////////////////////////////////////////////////
  

  // dd('hello new page');
$leave_request_dates = LeaveRequest::where('user_id', $get_user_id)->where('leave_req_grp_no', $leave_grp_no)->orderBy('leave_date', 'asc')->get();

$total_no_of_days = count($leave_request_dates);

$leave_request_details = LeaveRequest::where('user_id', $get_user_id)->where('leave_req_grp_no', $leave_grp_no)->first();

return view('leave_request.view_leave_request_details', compact('leave_request_dates', 'get_user_details', 'leave_request_details', 'total_no_of_days'));
  }
   else{
      return view('errors.403');
    }
}


public function new_leave_request($sap_no)
{

// dd('hi');

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
       
        $departments=Department::orderBy('name')->pluck('name','id'); //gets all departmants 

        $get_hod_for_the_user = DB::table('group_hod')
        ->where('group_hod.department_id', $get_user_department)
        ->join('users','users.sap', 'group_hod.hod_sap')
        ->get();
        
        $office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');

        $leave_types=Leave_type::orderBy('type')->pluck('type','id');

        $business_units=Business_unit::orderBy('bu_name')->pluck('bu_name','bu_id');

        return view('leave_request.new_leave_request', compact('get_user_details', 'departments', 'office_locations', 'get_hod_for_the_user', 'leave_types', 'business_units', 'get_user_department', 'get_hod_for_the_user'));
        }
        else{
        return view('errors.403', compact('profile_info'));
        }
}

/*
public function get_leave_entitled_days(Request $request)
{
    $leave_id = $request->leave_id;
    $staff_sap = Auth::user()->sap;



}*/


  public function store_leave_request(Request $request, $sap_no)
    {
// dd("hi");
      // dd($request->all());

      ////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('sap', $sap_no)->first();
        $get_user_id = Auth::user()->sap;
        $get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin

if (($user->can('can-view-all-users')) || ($loggedin_user_id==$get_user_id) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
        /////////////////////////////////////////////////////////////////////////////////

           $this->validate($request, [
              'business_unit_id' => 'required',
              'job_title' => 'required',
              'date_of_employment' => 'required|date|before:today|date_format:"Y-m-d"',
              'department_id' => 'required',
              'staff_grade_level' => 'required',
              'leave_type_id' => 'required',
              'number_of_leave_days_entitled' => 'required',
              'leave_start_date' => 'required|date|after:today|date_format:"Y-m-d"',
              'leave_end_date'      => 'required|date|after:leave_start_date|date_format:"Y-m-d"',
              'contact_address' => 'required',
              'phone_number' => 'required',
              'office_location' => 'required',
              'hod_approver_id' => 'required',
              'attached_doc' => 'max:10000|mimes:jpeg,png,jpg,pdf,doc,docx'
        ]);
           
    $date_and_time_submitted = Carbon::now();
    $check_if_record_exist_in_db = LeaveRequest::exists();

    if ($check_if_record_exist_in_db === true){
    $last_leave_req_grp_no = LeaveRequest::orderBy('id', 'desc')->first()->leave_req_grp_no;
    $new_leave_req_grp_no = $last_leave_req_grp_no +1;
    }
    else{
    $new_leave_req_grp_no = 1;
    }


        if ($request->hasFile('attached_doc')) {
            $file = Input::file('attached_doc');
            $extension = Input::file('attached_doc')->getClientOriginalExtension();
            $filename =   'LEAVE_NO'. $new_leave_req_grp_no .'.' .$extension; // renameing attachement
            $destinationPath = 'uploads/leave_attached_doc';//its refers project/public/uploads/leave_attached_doc directory
            $upload_success = $file->move($destinationPath, $filename);
        }
        else{
           $filename = null;
        }


        $leave_start_date_raw = $request->leave_start_date;
        $leave_end_date_raw = $request->leave_end_date;

        // Specify the start date. This date can be any English textual format  
        $leave_start_date = strtotime($leave_start_date_raw); // Convert date to a UNIX timestamp  

        // Specify the end date. This date can be any English textual format  
        $leave_end_date = \Carbon\Carbon::createFromFormat('Y-m-d', $leave_end_date_raw)->subDays(1);
        $leave_end_date = strtotime($leave_end_date); // Convert date to a UNIX timestamp  
        // dd($leave_end_date);


//////////////////////////////////////////////////////////////////////////////////
$getonlyexistdate = array(); //check if the date already exist in the DB
    for ($i=$leave_start_date; $i<=$leave_end_date; $i+=86400) {     
     
       $leave_date = date("Y-m-d", $i);   

       $check_leave_record = LeaveRequest::where('user_id', $get_user_id)->where('leave_date', $leave_date)->exists();
        if ($check_leave_record === true){
           $getonlyexistdate[] = date("d-m-Y", $i);  
        }
}

if(!empty($getonlyexistdate)){ //if it exist it DB? do this ...
   \Session::flash('message', 'Duplicate data error! The following day(s) already exist in your previous leave request: '. (implode(", ",$getonlyexistdate)));
  return back();
}

else{ //if it does not exist in the DB, do this ...
        // Loop from the start date to end date and output all dates inbetween  
        for ($i=$leave_start_date; $i<=$leave_end_date; $i+=86400) {  

        // $getinfoxx[] = date("Y-m-d", $i); 

        $leaverequest =  new LeaveRequest();
        $leaverequest->user_id = $get_user_id;
        $leaverequest->leave_req_submitted_by = $loggedin_user_id;
        $leaverequest->hod_approver_id = $request->hod_approver_id;
        $leaverequest->department_id = $request->department_id;
        $leaverequest->job_title = $request->job_title;
        $leaverequest->office_location = $request->office_location;
        $leaverequest->note = $request->note;
        $leaverequest->leave_start_date = $request->leave_start_date;
        $leaverequest->leave_end_date = $request->leave_end_date;
        $leaverequest->business_unit_id = $request->business_unit_id;
        $leaverequest->date_of_employment = $request->date_of_employment;
        $leaverequest->staff_grade_level = $request->staff_grade_level;
        $leaverequest->contact_address = $request->contact_address;
        $leaverequest->phone_number = $request->phone_number;
        $leaverequest->leave_type_id = $request->leave_type_id;
        $leaverequest->number_of_leave_days_entitled = $request->number_of_leave_days_entitled;
        $leaverequest->leave_date = date("Y-m-d", $i); 
        $leaverequest->leave_req_grp_no = $new_leave_req_grp_no;
        $leaverequest->date_and_time_submitted = $date_and_time_submitted;
        $leaverequest->full_uniq_leave_req_id = 'LEAVE_NO_'.$sap_no.'_'.$new_leave_req_grp_no;
        $leaverequest->unique_sap_date = date("Y-m-d", $i).'_'.$sap_no;
        $leaverequest->attached_doc = $filename;
        $leaverequest->save();
        } 

//The Email notification starts from here       
 $check_if_email_notifications_is_enabled = Email_notification::where('email_notification_id', 1 )->first();
if (($check_if_email_notifications_is_enabled->email_notification) ==1 ){ //only send emails if email notifications is enabled

$leave_request_details = LeaveRequest::where('user_id', $get_user_id)->where('leave_req_grp_no', $new_leave_req_grp_no)->first();

    $hod_email = $leave_request_details->user_hod_approver22->email;
    $hod_name=  $leave_request_details->user_hod_approver22->name;

    $data = array(
    'sap_no' => $sap_no,
    'new_leave_req_grp_no' => $new_leave_req_grp_no,
    'hod_approver_name' => $hod_name,
    'hod_approver_email' => $hod_email,
    'date_and_time_submitted' => \Carbon\Carbon::parse($leave_request_details->date_and_time_submitted)->format('d-m-Y H:i:s'),
    'staff_name' => $leave_request_details->user22->name,
    'type' => $leave_request_details->leaveType221->type,
    'leave_start_date' => $leave_request_details->leave_start_date,
    'leave_end_date' => $leave_request_details->leave_end_date,
    'full_uniq_leave_req_id' => $leave_request_details->full_uniq_leave_req_id,
    );

 Mail::send('emails.leave_request_pending_approval_hod', $data, function($message) use ($data, $hod_email, $hod_name){
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to($hod_email, $hod_name);
      $message->subject('ALERT : Pending Leave Request for your Approval. Please approve to process it.');
    });
}
//End of Email notification /////////////////////////////

        Alert::success('Record Created Successfully')->autoclose(3000);
        return redirect('view_leave_request_details/'.$sap_no.'/'.$new_leave_req_grp_no);
      }       
       
      }
       else{
          return view('errors.403');
        }
    }


public function ajax_get_hod_approval_status_leave()
{

        //////////////////////////info about loggedin user/////////////////////////////////
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
        $department_id = Auth::user()->department_id; //get the id of the department that loggedin


$hod_approver_option = $_GET["get_option"];
$user_id = $_GET["user_id"];
$leave_req_grp_no = $_GET["leave_req_grp_no"];

////////////////////////info about user with sent sap no///////////////////////////
        $get_user_details = User::where('id', $user_id)->first();
        $get_user_department = $get_user_details->department_id;


$check_hr_status = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();
//get the HR status of the Regularisation. meaning 
 $get_dep_in_leave_req = $check_hr_status->department_id; //get the dep on reg req

if (($user->can('can-view-all-users')) || (($user->can('can-approve-leave-hod')) && ($department_id==$get_dep_in_leave_req))) { //conditions to be met are: 1.allow user access for anyone tha can view all users 2. the person that loggedin can see his/her attendance. 3. the HOD can see only the attendance of the satff in his department
/////////////////////////////////////////////////////////////////////////////////


if($check_hr_status->hr_status==0){  //meaning only do this if the HR has not approved
$get_date_to_leave_reqs = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->get();

foreach ($get_date_to_leave_reqs as $get_date_to_leave_req) {
  $store_hod_leave_status = LeaveRequest::where('user_id', $user_id)
  ->where('leave_req_grp_no', $leave_req_grp_no)
  ->update(['hod_approver_status' => $hod_approver_option, 'hod_approver_id_actual' => $loggedin_user_id]);
}
}

$allow_to_approve_hod = "YES";
$leave_list = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();


/////////The Email notification starts from here /////////////////////////////////             
 $check_if_email_notifications_is_enabled = Email_notification::where('email_notification_id', 1 )->first();
if (($check_if_email_notifications_is_enabled->email_notification) ==1 ){ //only send emails if email notifications is enabled

$leave_request_details = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();

    $requester_name=  $leave_request_details->user22->name;
    $requester_email=  $leave_request_details->user22->email;
    $hod_approver_status = $leave_request_details->hod_approver_status;
    $hr_status = $leave_request_details->hr_status;
    $full_uniq_leave_req_id = $leave_request_details->full_uniq_leave_req_id;

    $data = array(
    'sap_no' => $leave_request_details->user22->sap,
    'new_leave_req_grp_no' => $leave_req_grp_no,
    'hod_approver_name_actua' => $leave_request_details->user_hod_approver_id_actual22->name,
    'hod_approver_email_actua' => $leave_request_details->user_hod_approver_id_actual22->email,
    'date_and_time_submitted' => \Carbon\Carbon::parse($leave_request_details->date_and_time_submitted)->format('d-m-Y H:i:s'),
    'staff_name' => $leave_request_details->user22->name,
    'type' => $leave_request_details->leaveType221->type,
    'leave_start_date' => $leave_request_details->leave_start_date,
    'leave_end_date' => $leave_request_details->leave_end_date,
    'full_uniq_leave_req_id' => $full_uniq_leave_req_id,
    'hod_approver_status' => $hod_approver_status,
    'hr_status' => $hr_status,
    );

 if($hod_approver_status==1){ //if approved send mail to HR and CC the requester
 Mail::send('emails.leave_request_status_to_whom_concerned', $data, function($message) use ($data, $requester_email, $requester_name, $full_uniq_leave_req_id){
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to('belloadewalea@yahoo.com', 'TEST HR');
      $message->cc($requester_email, $requester_name);
      $message->subject('ALERT : Leave Request Status For Leave ID: '.$full_uniq_leave_req_id);
    });
 }

 elseif($hod_approver_status==2){ //if rejected, send mail to only the requester
   Mail::send('emails.leave_request_status_to_whom_concerned', $data, function($message) use ($data, $requester_email, $requester_name, $full_uniq_leave_req_id){
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to($requester_email, $requester_name);
      $message->subject('ALERT : Leave Request Status For Leave ID: '.$full_uniq_leave_req_id);
    });
 }

}
//////End of Email notification /////////////////////////////

return view('leave_request.ajax_get_hod_approval_status_leave', compact('leave_list', 'allow_to_approve_hod'));
}

else
{
  $allow_to_approve_hod = "NO";
  $leave_list = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();
  return view('leave_request.ajax_get_hod_approval_status_leave', compact('leave_list', 'allow_to_approve_hod'));
}



}

public function ajax_get_hr_approval_status_leave()
{

  //////////////////////////info about loggedin user/////////////////////////////////
  $user = \Auth::user(); //note the user that logs in
  $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
  $department_id = Auth::user()->department_id; //get the id of the department that loggedin

  $hr_approver_option = $_GET["get_option"];
  $user_id = $_GET["user_id"];
  $leave_req_grp_no = $_GET["leave_req_grp_no"];


  if ($user->can('can-approve-leave-hr')) { //conditions to be met are: 1.allow user access for HR that can approve 
  /////////////////////////////////////////////////////////////////////////////////


    $check_hod_status = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();
    //get the HOD status of the Regularisation

    if($check_hod_status->hod_approver_status==1){ //meaning only do this if the HOD has approved
    $get_date_to_leave_reqs = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->get();

    foreach ($get_date_to_leave_reqs as $get_date_to_leave_req) {
    $store_hr_leave_status = LeaveRequest::where('user_id', $user_id)
    ->where('leave_req_grp_no', $leave_req_grp_no)
    ->update(['hr_status' => $hr_approver_option, 'hr_approver_id' => $loggedin_user_id]);
    }
    }

    $allow_to_approve_hr = "YES";
    $leave_list = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();

/////////The Email notification starts from here /////////////////////////////////             
 $check_if_email_notifications_is_enabled = Email_notification::where('email_notification_id', 1 )->first();
if (($check_if_email_notifications_is_enabled->email_notification) ==1 ){ //only send emails if email notifications is enabled

$leave_request_details = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();

    $requester_name=  $leave_request_details->user22->name;
    $requester_email=  $leave_request_details->user22->email;
    $hod_approver_status = $leave_request_details->hod_approver_status;
    $hr_status = $leave_request_details->hr_status;
    $full_uniq_leave_req_id = $leave_request_details->full_uniq_leave_req_id;

    $data = array(
    'sap_no' => $leave_request_details->user22->sap,
    'new_leave_req_grp_no' => $leave_req_grp_no,
    'hod_approver_name_actua' => $leave_request_details->user_hod_approver_id_actual22->name,
    'hod_approver_email_actua' => $leave_request_details->user_hod_approver_id_actual22->email,
    'date_and_time_submitted' => \Carbon\Carbon::parse($leave_request_details->date_and_time_submitted)->format('d-m-Y H:i:s'),
    'staff_name' => $leave_request_details->user22->name,
    'type' => $leave_request_details->leaveType221->type,
    'leave_start_date' => $leave_request_details->leave_start_date,
    'leave_end_date' => $leave_request_details->leave_end_date,
    'full_uniq_leave_req_id' => $full_uniq_leave_req_id,
    'hod_approver_status' => $hod_approver_status,
    'hr_status' => $hr_status,
    );

 Mail::send('emails.leave_request_status_to_whom_concerned', $data, function($message) use ($data, $requester_email, $requester_name, $full_uniq_leave_req_id){
      $message->from("bello.adewale@dangoteprojects.com", 'Dangote Refinery IT');
      $message->to($requester_email, $requester_name);
      $message->subject('ALERT : Leave Request Status For Leave ID: '.$full_uniq_leave_req_id);
    });

}
//////End of Email notification /////////////////////////////

    return view('leave_request.ajax_get_hr_approval_status_leave', compact('leave_list', 'allow_to_approve_hr'));
    }

    else
    {
    $allow_to_approve_hr = "NO";
    $leave_list = LeaveRequest::where('user_id', $user_id)->where('leave_req_grp_no', $leave_req_grp_no)->first();
    return view('leave_request.ajax_get_hr_approval_status_leave', compact('leave_list', 'allow_to_approve_hr'));
    }

  }


}
