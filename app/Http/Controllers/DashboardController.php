<?php

namespace App\Http\Controllers;
use App\Applications_Documents;
use Illuminate\Support\Facades\DB;
use Auth;
use Illuminate\Support\Str;
use Session;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PDF;

use App\User;
use App\Settings;
use App\Applications;
use App\Title;
use App\Rights;
use App\Designation;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['except'=> ['attempt_login','attempt_register','forgot_password']]);
    }

    public function landing()
	{	
		$id=Auth::user()->id;
		$psw_query= User::select('password', 'chng_password_logon')->where('id',$id)->get();
        $psw=$psw_query[0]->password;
        
	    if($psw_query[0]->chng_password_logon < 1)		
         return view('dashboard')->with('psw','yep!');
		else {

           $user =  DB::table("tbl_users")->get();
           
           $data = [
               "users" => $user,
           ];

            return view('dashboard')->with($data);
        }
    }
	public function first_changepsw(Request $request)
	{
	    $rules = 
		   [
		   'password1'=>'required|min:6',
		   'password2'=>'required|min:6|same:password1'
		   ]; 
		
		$this->validate($request,$rules);
		
		$id=Auth::user()->id;
		//dd($id);
		User::where('id',$id)->update(['password'=>Hash::make($request->password1),"chng_password_logon" => 1]);
	 
	   
	}
	public function application_details(Request $request){
        $user_id=Auth::user()->id;
        $user_rights_id=Auth::user()->rights_id;
        $user_type=Auth::user()->user_type;
        $application_id=$request->application_id;
        $application_collection = DB::table('tbl_applications as a')
            ->leftjoin('tbl_programmes as p', 'p.programme_id', 'a.programme_id')
            ->leftjoin('tbl_program_type as pt', 'pt.program_type_id', 'p.programme_type_id')
            ->leftjoin('tbl_degree_type as dt', 'dt.degree_type_id', 'p.degree_type_id')
            ->leftjoin('tbl_faculty as f', 'f.faculty_id', 'p.faculty_id')
            ->leftjoin('tbl_department as d', 'd.department_id', 'p.department_id')
            ->leftjoin('tbl_session as s', 's.session_id', 'a.session_id')
            ->leftjoin('tbl_users as u', 'u.id', 'a.user_id')
            ->leftjoin('tbl_users as action_1_taker', 'action_1_taker.id', 'a.action_1_by')
            ->leftjoin('tbl_users as action_2_taker', 'action_2_taker.id', 'a.action_2_by')
            ->leftjoin('tbl_users as action_3_taker', 'action_3_taker.id', 'a.action_3_by')
            ->select('application_id','hod','dean', 'entry_type','u.firstname as firstname','u.middlename as middlename','u.lastname as lastname','u.phone as phone','u.email as email','u.dob as dob', 'duration','faculty_name','department_name','action_1_status','action_2_status','action_3_status', 'date_applied', 'session_name', 'name', 'degree_short_name', 'program_type_name',
                'action_1_taker.firstname as action_1_taker_firstname','action_1_taker.lastname as action_1_taker_lastname','action_1_date',
                'action_2_taker.firstname as action_2_taker_firstname','action_2_taker.lastname as action_2_taker_lastname','action_2_date',
                'action_3_taker.firstname as action_3_taker_firstname','action_3_taker.lastname as action_3_taker_lastname','action_3_date'
                )
            ->where('a.application_id', $application_id)
            ->get();
        $application_documents=Applications_Documents::where('application_id',$application_id)->get();
 ?>
        <div class="element-wrapper">
            <div class="invoice-w" style="background-color: ">
                <div class="infos">
                    <div class="info-1">
                        <h3>
                           Applicant Details
                        </h3>
                        <div class="company-address">
                           Full Name:  <?php echo $application_collection[0]->firstname.' '.$application_collection[0]->middlename.' '.$application_collection[0]->lastname ?>
                        </div>
                        <div class="company-address">
                            DOB:  <?php echo date('d, F, Y',strtotime($application_collection[0]->dob)) ?>
                        </div>
                        <div class="company-address">
                            Phone No:  <?php echo $application_collection[0]->phone ?>
                        </div>
                        <div class="company-address">
                            Email:  <?php echo $application_collection[0]->email ?>
                        </div>
                    </div>
                </div>
                <div class="invoice-heading" style="margin: 20px 0 !important;">
                    <h3>
                        Application Details
                    </h3>
                    <div class="invoice-date">
                        Date Applied: <?php echo date('d, F, Y',strtotime($application_collection[0]->date_applied)) ?>
                    </div>
                    <div class="invoice-date">
                        Application No: <?php echo 'IAUE-DLP-'.$application_id ?>
                    </div>
                    <div class="invoice-date">
                        Entry Type: <?php echo $application_collection[0]->entry_type==1?"Regular":"Direct"?>
                    </div>
                    <div class="invoice-date">
                        Programme Name: <?php echo $application_collection[0]->degree_short_name.' , '.$application_collection[0]->name?>
                    </div>
                    <div class="invoice-date">
                        Programme Type: <?php echo $application_collection[0]->program_type_name?>
                    </div>
                    <div class="invoice-date">
                        Faculty/Department: <?php echo $application_collection[0]->faculty_name.' / '.$application_collection[0]->department_name?>
                    </div>
                    <div class="invoice-date">
                        Session: <?php echo $application_collection[0]->session_name?>
                    </div>

                </div>
                <div class="invoice-body" style="">
                    <div class="invoice-desc">
                        <div class="desc-label">
                           <i class="fa fa-anchor"></i> Attached Documents
                        </div>
                    </div>
                    <div class="invoice-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>S/No.</th>
                                <th>Name</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $a=0;
                            foreach($application_documents as $doc_val) {
                                ?>
                                <tr>
                                    <td><?php echo $a+1; ?></td>
                                    <td><a class="badge badge-default-inverted" target="_blank" href="<?php echo asset("applications/$doc_val->document_name") ?>"> <?php echo $doc_val->document_typed_name ?></a></td>
                                </tr>
                                <?php
                                $a++;
                                 }
                                ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>S/No.</th>
                                <th>Name</th>
                            </tr>
                            </tfoot>
                        </table>

                        <div class="col-lg-12 col-xxl-12">
                            <!--START - BALANCES-->
                            <div class="element-balances">
                                <div class="balance">
                                    <div class="balance-title">
                                        Level 1 Status
                                    </div>
                                    <div class="balance-value">
                                        <span class="badge
                                        <?php
                                        if($application_collection[0]->action_1_status==1) echo "badge-primary-inverted";
                                        else if($application_collection[0]->action_1_status==2) echo "badge-success-inverted";
                                        else if($application_collection[0]->action_1_status==3) echo "badge-danger-inverted";
                                        ?>">
                                            <?php
                                            if($application_collection[0]->action_1_status==1) echo "Pending";
                                            else if($application_collection[0]->action_1_status==2) echo "Approved";
                                            else if($application_collection[0]->action_1_status==3) echo "Rejected";
                                            ?>
                                        </span>
                                    </div>
                                    <div class="balance-link">
                                        <?php
                                            if($application_collection[0]->action_1_status!=1) {
                                                ?>
                                                <i class="os-icon os-icon-user-check"></i><span>Action by:</span><br/>
                                                <span style="font-weight: bold; font-size: 15px; text-transform: uppercase"><?php echo $application_collection[0]->action_1_taker_firstname." ".$application_collection[0]->action_1_taker_lastname  ?></span><br/>
                                                <span style="">Date: <span style="font-size: 12px"><?php echo date("d F,Y h:m A",strtotime($application_collection[0]->action_1_date)) ?></span></span><br/>

                                                <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="balance">
                                    <div class="balance-title">
                                        Level 2 Status
                                    </div>
                                    <div class="balance-value">
                                        <span class="badge
                                        <?php
                                        if($application_collection[0]->action_2_status==1) echo "badge-primary-inverted";
                                        else if($application_collection[0]->action_2_status==2) echo "badge-success-inverted";
                                        else if($application_collection[0]->action_2_status==3) echo "badge-danger-inverted";
                                        ?>">
                                            <?php
                                            if($application_collection[0]->action_2_status==1) echo "Pending";
                                            else if($application_collection[0]->action_2_status==2) echo "Approved";
                                            else if($application_collection[0]->action_2_status==3) echo "Rejected";
                                            ?>
                                        </span>
                                    </div>
                                    <div class="balance-link">
                                        <?php
                                        if($application_collection[0]->action_2_status!=1) {
                                            ?>
                                            <i class="os-icon os-icon-user-check"></i><span>Action by:</span><br/>
                                            <span style="font-weight: bold; font-size: 15px; text-transform: uppercase"><?php echo $application_collection[0]->action_2_taker_firstname." ".$application_collection[0]->action_2_taker_lastname  ?></span><br/>
                                            <span style="">Date: <span style="font-size: 12px"><?php echo date("d F,Y h:m A",strtotime($application_collection[0]->action_2_date)) ?></span></span><br/>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="balance">
                                    <div class="balance-title">
                                        Level 3 Status
                                    </div>
                                    <div class="balance-value danger">
                                           <span class="badge
                                            <?php
                                           if($application_collection[0]->action_3_status==1) echo "badge-primary-inverted";
                                           else if($application_collection[0]->action_3_status==2) echo "badge-success-inverted";
                                           else if($application_collection[0]->action_3_status==3) echo "badge-danger-inverted";
                                           ?>">
                                                <?php
                                                if($application_collection[0]->action_3_status==1) echo "Pending";
                                                else if($application_collection[0]->action_3_status==2) echo "Approved";
                                                else if($application_collection[0]->action_3_status==3) echo "Rejected";
                                                ?>
                                            </span>
                                    </div>
                                    <div class="balance-link">
                                        <?php
                                        if($application_collection[0]->action_3_status!=1) {
                                            ?>
                                            <i class="os-icon os-icon-user-check"></i><span>Action by:</span><br/>
                                            <span style="font-weight: bold; font-size: 15px; text-transform: uppercase"><?php echo $application_collection[0]->action_3_taker_firstname." ".$application_collection[0]->action_3_taker_lastname  ?></span><br/>
                                            <span style="">Date: <span style="font-size: 12px"><?php echo date("d F,Y h:m A",strtotime($application_collection[0]->action_3_date)) ?></span></span><br/>

                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <!--END - BALANCES-->

                            <br/>
                            <?php
                            if( ($user_rights_id==2 || $user_rights_id==1) && $user_type==2 && $application_collection[0]->action_1_status==1 && $application_collection[0]->action_2_status==1 && $application_collection[0]->action_3_status==1 ) {
                                ?>
                                <button data-id="<?php echo $application_collection[0]->application_id?>"  data-action="2" class="btn btn-success btn-lg btn-block"><i class="os-icon os-icon-thumbs-up"></i><span>Approve Application (Level 1)</span>
                                </button>
                                <br/>
                                <button data-id="<?php echo $application_collection[0]->application_id?>" data-action="3" class="btn btn-danger btn-lg btn-block"><i class="os-icon os-icon-thumbs-down"></i><span>Reject Application (Level 1)</span>
                                </button>
                                <?php
                            }
                            ?>

                            <?php
                            if( $user_type==2 && $user_rights_id==4 && $user_id==$application_collection[0]->hod &&  $application_collection[0]->action_1_status==2 && $application_collection[0]->action_2_status==1 && $application_collection[0]->action_3_status==1 ) {
                                ?>
                                <button data-id="<?php echo $application_collection[0]->application_id?>"  data-action="2" class="btn btn-success btn-lg btn-block"><i class="os-icon os-icon-thumbs-up"></i><span>Approve Application (Level 2)</span>
                                </button>
                                <br/>
                                <button data-id="<?php echo $application_collection[0]->application_id?>" data-action="3" class="btn btn-danger btn-lg btn-block"><i class="os-icon os-icon-thumbs-down"></i><span>Reject Application (Level 2)</span>
                                </button>
                                <?php
                            }
                            ?>

                            <?php
                            if( $application_collection[0]->action_1_status==2 && $application_collection[0]->action_2_status==2 && $application_collection[0]->action_3_status==1 && $user_type==2 && $user_rights_id==5 && $user_id==$application_collection[0]->dean) {
                                ?>
                                <button data-id="<?php echo $application_collection[0]->application_id?>" data-action="2" class="btn btn-success btn-lg btn-block"><i class="os-icon os-icon-thumbs-up"></i><span>Approve Application (Level 3)</span>
                                </button>
                                <br/>
                                <button data-id="<?php echo $application_collection[0]->application_id?>" data-action="3" class="btn btn-danger btn-lg btn-block"><i class="os-icon os-icon-thumbs-down"></i><span>Reject Application (Level 3)</span>
                                </button>
                                <?php
                            }
                            else if( $application_collection[0]->action_1_status==2 && $application_collection[0]->action_2_status==2 && $application_collection[0]->action_3_status==1 && $user_type==2 && ($user_rights_id==2 || $user_rights_id==1) ) {
                                ?>
                                <button data-id="<?php echo $application_collection[0]->application_id ?>"
                                        data-action="2" class="btn btn-success btn-lg btn-block"><i
                                            class="os-icon os-icon-thumbs-up"></i><span>Approve Application (Level 3)</span>
                                </button>
                                <br/>
                                <button data-id="<?php echo $application_collection[0]->application_id ?>"
                                        data-action="3" class="btn btn-danger btn-lg btn-block"><i
                                            class="os-icon os-icon-thumbs-down"></i><span>Reject Application (Level 3)</span>
                                </button>
                                <?php
                            }
                                ?>

                        </div>

                        <div class="terms">
                            <div class="terms-header">
                                Note:
                            </div>
                            <div class="terms-content">
                                A 3-Level approval must be issued before a candidate can be issued a conditional offer of admission
                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice-footer">
                    <div class="invoice-logo">
                        <img alt="" src="<?php echo asset("_img/fav/favicon-32x32.png") ?>"><span>IAUE University Distance Learning Portal</span>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
    public function application_level_approval(Request $request){
        $application_id=$request->application_id;
        $request_id=$request->action;
        $reason=$request->reason;
        //1. Get current user access level
        //Using application ID, ascertain applicant application status and use it to know what level requires authorization
        $user_id=Auth::user()->id;
        $user_rights_id=Auth::user()->rights_id;
        $user_type=Auth::user()->user_type;
        $application_collection = DB::table('tbl_applications as a')
            ->leftjoin('tbl_programmes as p', 'p.programme_id', 'a.programme_id')
            ->leftjoin('tbl_universities as uni','uni.university_id','p.university_id')
            ->leftjoin('tbl_program_type as pt', 'pt.program_type_id', 'p.programme_type_id')
            ->leftjoin('tbl_degree_type as dt', 'dt.degree_type_id', 'p.degree_type_id')
            ->leftjoin('tbl_faculty as f', 'f.faculty_id', 'p.faculty_id')
            ->leftjoin('tbl_department as d', 'd.department_id', 'p.department_id')
            ->leftjoin('tbl_session as s', 's.session_id', 'a.session_id')
            ->leftjoin('tbl_users as u', 'u.id', 'a.user_id')
            ->select('application_id', 'entry_type','u.firstname as firstname','u.middlename as middlename','u.lastname as lastname','u.email as email',
                'f.faculty_id as faculty_id','d.department_id as department_id',
                'action_1_status','action_2_status','action_3_status','a.programme_id as programme_id',
                'p.university_id as university_id','university',
                'p.programme_type_id as programme_type_id','dt.degree_class as degree_class',
                'session_name', 'name','duration', 'degree_short_name', 'program_type_name','hod','dean')
            ->where('a.application_id', $application_id)
            ->get();
        $application = Applications::find($application_id);
        $email=$application_collection[0]->email;

        //Admins can approve Level 1 and override Level 3
        //The HOD of a programme can approve Level 2
        //The Dean of a Faculty can approve

        if($request_id==2){
            //approve
            if($application_collection[0]->action_1_status==1 && $application_collection[0]->action_2_status==1 && $application_collection[0]->action_3_status==1 ) {
                //Level 1 Action Required
                //Only Admins can approve this
                #Administrator
                if($user_type==2 && ($user_rights_id==2 || $user_rights_id==1)){
                    //Admins
                    $application->action_1_status=2;
                    $application->action_1_date=date("Y-m-d H:i:s");
                    $application->action_1_by=$user_id;
                    $application->save();
                }

            }
            else if($application_collection[0]->action_1_status==2 && $application_collection[0]->action_2_status==1 && $application_collection[0]->action_3_status==1 ) {
                //Level 2 Action Required
                #Head of Department
                if($user_type==2 && $user_rights_id==4 && $user_id==$application_collection[0]->hod){
                    $application->action_2_status=2;
                    $application->action_2_date=date('Y-m-d H:i:s');
                    $application->action_2_by=$user_id;
                    $application->save();
                }
            }
            else if($application_collection[0]->action_1_status==2 && $application_collection[0]->action_2_status==2 && $application_collection[0]->action_3_status==1 )
            {
                //Level 3 Action Required
                //Ensure that User is the Dean of the Faculty or Administrator
                #Administrator
                if($user_type==2 && ($user_rights_id==2 || $user_rights_id==1)){
                    $application->action_3_status=2;
                    $application->action_3_date=date('Y-m-d H:i:s');
                    $application->action_3_by=$user_id;
                    $application->save();
                }
                #Dean of Faculty
                if($user_type==2 && $user_rights_id==5 && $user_id==$application_collection[0]->dean){
                    $application->action_3_status=2;
                    $application->action_3_date=date('Y-m-d H:i:s');
                    $application->action_3_by=$user_id;
                    $application->save();
                }

                //Now send a successful email the moment the 3-Level Approvals have been acquired
                if($application->action_1_status==2 && $application->action_2_status==2 && $application->action_3_status==2)
                {

                    $application_documents = new Applications_Documents;

                    //let's compute approximate programme fees
                    $programme_fee=0;
                    //Get generic fees
                    if($application_collection[0]->programme_type_id==1) {//cross border
                        $fee_collection = DB::table('tbl_fees')
                            ->select('fee_amount')
                            ->where('fee_type', 1)// I need generic
                            ->where('fee_class', 1)//new students
                            ->where('program_type_id', 1)//cross or long distance
                            ->where('university_id', $application_collection[0]->university_id)
                            ->where('degree_class', $application_collection[0]->degree_class)
                            ->get();
                    }elseif($application_collection[0]->programme_type_id==2){
                        $fee_collection = DB::table('tbl_fees')
                            ->select('fee_amount')
                            ->where('fee_type', 1)// I need generic
                            ->where('fee_class', 1)//new students
                            ->where('program_type_id', 2)//cross or long distance
                            ->where('degree_class', $application_collection[0]->degree_class)
                            ->get();
                    }
                    foreach($fee_collection as $fee){
                        $programme_fee+=$fee->fee_amount;
                    }

                    //generate pdf here
                    $data1 = [
                        'full_name'=>$application_collection[0]->firstname." ".$application_collection[0]->lastname,
                        'degree_short_code'=>$application_collection[0]->degree_short_name,
                        'programme_name'=>$application_collection[0]->name,
                        'the_session'=>$application_collection[0]->session_name,
                        'programme_type'=>$application_collection[0]->program_type_name,
                        'entry_type'=>$application_collection[0]->entry_type,
                        'duration'=>$application_collection[0]->duration,
                        'fee'=>$programme_fee,
                        'university'=>$application_collection[0]->university,
                        'university_id'=>$application_collection[0]->university_id,
                    ];

                    $file_name= "Offer_Letter_".$data1["full_name"]."_".$data1["programme_name"].rand(1,9999999).".pdf";
                    $file_name_acceptance= "Acceptance_Letter_".$data1["full_name"]."_".$data1["programme_name"].rand(1,9999999).".pdf";

                    $pdf = PDF::loadView('pdfs.admission_offer', $data1)->setPaper('a4', 'portrait')->save("applications/$file_name");
                    $pdf = PDF::loadView('pdfs.admission_acceptance', $data1)->setPaper('a4', 'portrait')->save("applications/$file_name_acceptance");

                    $application_documents = new Applications_Documents;
                    $application_documents->application_id=$application_id;
                    $application_documents->document_typed_name="Offer Letter";
                    $application_documents->document_name=$file_name;
                    $application_documents->save();

                    $application_documents = new Applications_Documents;
                    $application_documents->application_id=$application_id;
                    $application_documents->document_typed_name="Acceptance Letter";
                    $application_documents->document_name=$file_name_acceptance;
                    $application_documents->save();

                    $data = [
                        'full_name'=>$application_collection[0]->firstname." ".$application_collection[0]->lastname,
                        'degree_short_code'=>$application_collection[0]->degree_short_name,
                        'programme_name'=>$application_collection[0]->name,
                        'the_session'=>$application_collection[0]->session_name,
                        'programme_type'=>$application_collection[0]->program_type_name,
                        'university'=>$application_collection[0]->university,
                        'university_id'=>$application_collection[0]->university_id,
                    ];
                    Mail::send('emails.notify_applicant_success', $data, function($message) use ($data,$email,$file_name,$file_name_acceptance){
                        $message->from("info.iaue.portals@gmail.com", 'IAUE Distance Learning Portal');
                        $message->to($email);
                        $message->bcc("isokenodigie@gmail.com");
                        $message->bcc("mailaustin37@gmail.com");
                        $message->subject('IAUE Provisional Admission Offer');
                        $message->attach("applications/$file_name",[
                            'as' => 'Offer Letter.pdf',
                            'mime' => 'application/pdf',
                        ]);
                        $message->attach("applications/$file_name_acceptance",[
                            'as' => 'Acceptance Letter.pdf',
                            'mime' => 'application/pdf',
                        ]);
                    });

                }
            }

            return "ok";

        }
        else if($request_id==3){
            //reject
            //Send an unsuccessful email the moment any of the level rejects occur
            //This should happen at the end of process
            if($application_collection[0]->action_1_status==1 && $application_collection[0]->action_2_status==1 && $application_collection[0]->action_3_status==1 ) {
                //Level 1 Action Required
                //Only Admins can approve this
                #Administrator
                if($user_type==2 && ($user_rights_id==2 || $user_rights_id==1)){
                    //Admins
                    $application->action_1_status=3;
                    $application->action_1_date=date("Y-m-d H:i:s");
                    $application->action_1_by=$user_id;
                    $application->save();
                }

            }
            else if($application_collection[0]->action_1_status==2 && $application_collection[0]->action_2_status==1 && $application_collection[0]->action_3_status==1 ) {
                //Level 2 Action Required
                #Head of Department
                if($user_type==2 && $user_rights_id==4 && $user_id==$application_collection[0]->hod){
                    $application->action_3_status=3;
                    $application->action_3_date=date('Y-m-d H:i:s');
                    $application->action_3_by=$user_id;
                    $application->save();
                }
            }
            else if($application_collection[0]->action_1_status==2 && $application_collection[0]->action_2_status==2 && $application_collection[0]->action_3_status==1 )
            {
                //Level 3 Action Required
                //Ensure that User is the Dean of the Faculty or Administrator
                #Administrator
                if($user_type==2 && ($user_rights_id==2 || $user_rights_id==1)){
                    //Admins
                    $application->action_3_status=3;
                    $application->action_3_date=date('Y-m-d H:i:s');
                    $application->action_3_by=$user_id;
                    $application->save();
                }
                #Dean of Faculty
                if($user_type==2 && $user_rights_id==5 && $user_id==$application_collection[0]->dean){
                    $application->action_3_status=3;
                    $application->action_3_date=date('Y-m-d H:i:s');
                    $application->action_3_by=$user_id;
                    $application->save();
                }
            }

            //Now send a rejection email to applicant

                $data = [
                    'full_name'=>$application_collection[0]->firstname." ".$application_collection[0]->lastname,
                    'degree_short_code'=>$application_collection[0]->degree_short_name,
                    'programme_name'=>$application_collection[0]->name,
                    'the_session'=>$application_collection[0]->session_name,
                    'programme_type'=>$application_collection[0]->program_type_name,
                    'email'=>$application_collection[0]->program_type_name,
                    'reason'=>$reason,
                ];

                Mail::send('emails.notify_applicant_failure', $data, function($message) use ($data,$email){
                    $message->from("info.iaue.portals@gmail.com", 'IAUE Distance Learning Portal');
                    $message->to($email);
                    /*$message->bcc("isokenodigie@gmail.com");*/
                    $message->bcc("mailaustin37@gmail.com");
                    $message->subject('IAUE Unsuccessful Application Notification');
                });
            return "ok";
        }



    }
    public function submit_offer_letter(Request $request){
        $rules = ['completed_offer_letter'=>'mimes:png,gif,jpg,JPG,jpeg,pdf'];
        //check validation options
        $this->validate($request,$rules);
        $offer_letter_collection=DB::table('tbl_applications as a')
            ->where('user_id',Auth::user()->id)
            ->where('action_1_status',2)
            ->where('action_2_status',2)
            ->where('action_3_status',2)
            ->select('application_id')
            ->orderBy('application_id','desc')
            ->limit(1)
            ->get();

        if($request->hasFile('completed_offer_letter'))
        {
            $fileNameWithExt=$request->file('completed_offer_letter')->getClientOriginalName();
            //Get Extension
            $fileExt=$request->file('completed_offer_letter')->getClientOriginalExtension();
            //new dynamic name
            $fileNameToStore=strtolower(Auth::user()->firstname."_".Auth::user()->lastname."_completed_offer_".rand(1,9999999).".".$fileExt);
            $file_path = 'applications/';
            //upload image
            $request->file('completed_offer_letter')->move($file_path, $fileNameToStore);
            $application_documents = new Applications_Documents;
            $application_documents->application_id = $offer_letter_collection[0]->application_id;
            $application_documents->document_typed_name = "Completed Acceptance Letter";
            $application_documents->document_name = $fileNameToStore;
            $application_documents->save();
        }
    }
    public function submit_profile_pic(Request $request){
        $id=Auth::user()->id;
        $rules = ['pic'=>'mimes:png,gif,jpg,JPG,jpeg'];
        //check validation options
        $this->validate($request,$rules);

        if($request->hasFile('pic'))
        {
            $fileNameWithExt=$request->file('pic')->getClientOriginalName();
            //Get Extension
            $fileExt=$request->file('pic')->getClientOriginalExtension();
            //new dynamic name
            $fileNameToStore=strtolower(Auth::user()->firstname."_".Auth::user()->lastname."_profile_pic_".rand(1,9999999).".".$fileExt);

            $file_path = '_img/users/';
            //upload image
            $request->file('pic')->move($file_path, $fileNameToStore);
            User::where('id',$id)->update(['pics'=>$fileNameToStore]);
        }
    }
    public function profile(Request $request)
    {
        if(isset($request->user_id))
        {
            $id=$request->user_id;
            $title_collection=Title::all();
            $rights_collection=Rights::all();
            $designation_collection=Designation::all();
            $profile_collection=DB::table('tbl_users as u')
                ->leftjoin('tbl_title','tbl_title.title_id','u.title_id')
                ->leftjoin('tbl_designation','tbl_designation.designation_id','u.designation_id')
                ->where('id',$id)
                ->select('title_name','u.title_id as title_id','u.designation_id as designation_id','rights_id','firstname','middlename','lastname','gender','pics','email','phone','dob','designation','status','created_at')
                ->get();
            $data=[
                    'title_collection'=>$title_collection,
                    'profile_collection'=>$profile_collection,
                    'rights_collection'=>$rights_collection,
                    'designation_collection'=>$designation_collection,
                    'user_id'=>$id
            ];
            return view("user.individual_edit")->with($data);

        }else{
            $id=Auth::user()->id;
            $title_collection=Title::all();
            $profile_collection=DB::table('tbl_users as u')
                ->leftjoin('tbl_title','tbl_title.title_id','u.title_id')
                ->leftjoin('tbl_designation','tbl_designation.designation_id','u.designation_id')
                ->where('id',$id)
                ->select('title_name','firstname','middlename','lastname','gender','pics','email','phone','dob','designation','status','created_at')
                ->get();
            ?>
            <div class="user-profile">
                <div class="up-head-w" style="background-image:url(<?php echo asset('_img/profile.png') ?>)">
                    <!--<div class="up-social">
                        <a href="#"><i class="os-icon os-icon-twitter"></i></a><a href="#"><i class="os-icon os-icon-facebook"></i></a>
                    </div>-->
                    <div class="up-main-info">
                        <div class="user-avatar-w">
                            <div class="user-avatar">
                                <img alt="" src="<?php echo asset("_img/users/".$profile_collection[0]->pics )?>">
                            </div>
                            <?php
                            if($profile_collection[0]->pics=="no_pic.jpg") {
                                ?>
                                <form id="pic" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                    <input type="file" name="pic">
                                </form>
                                <button class="btn btn-default btn-sm save_profile_pic">SAVE</button>
                                <br/>
                                <span class="text-white">NOTE: You can only change profile image once! Kindly upload your best image</span>
                                <?php
                            }
                            ?>
                        </div>
                        <h2 class="up-header">
                            <?php echo $profile_collection[0]->title_name." ".$profile_collection[0]->firstname." ".$profile_collection[0]->middlename."".$profile_collection[0]->lastname  ?>
                        </h2>
                        <h5 class="up-sub-header">
                            Designation : <?php echo $profile_collection[0]->designation ?>
                        </h5>
                    </div>
                    <svg class="decor" width="842px" height="219px" viewBox="0 0 842 219" preserveAspectRatio="xMaxYMax meet" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g transform="translate(-381.000000, -362.000000)" fill="#FFFFFF"><path class="decor-path" d="M1223,362 L1223,581 L381,581 C868.912802,575.666667 1149.57947,502.666667 1223,362 Z"></path></g></svg>
                </div>
                <div class="up-controls">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="value-pair">
                                <div class="label">
                                    Status:
                                </div>
                                <?php
                                switch($profile_collection[0]->status){
                                    case 0:
                                        echo '<div class="value badge badge-pill badge-warning">Inactive</div>';
                                        break;
                                    case 1:
                                        echo '<div class="value badge badge-pill badge-success">Active</div>';
                                        break;
                                    case 2:
                                        echo '<div class="value badge badge-pill badge-primary">Graduated</div>';
                                        break;
                                    case 3:
                                        echo '<div class="value badge badge-pill badge-danger">Expelled</div>';
                                        break;
                                }
                                ?>

                            </div>
                            <div class="value-pair">
                                <div class="label">
                                    Gender :
                                </div>
                                <div class="value">
                                    <?php echo $profile_collection[0]->gender==1?"Male":"Female" ?>
                                </div>
                            </div>
                            <div class="value-pair">
                                <div class="label">
                                    Registered Since:
                                </div>
                                <div class="value">
                                    <?php echo date('d F, Y h:m:s A',strtotime($profile_collection[0]->created_at)) ?>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-lg-6 text-right">
                            <a class="btn btn-primary btn-sm" href=""><i class="os-icon os-icon-link-3"></i><span>Add to Friends</span></a><a class="btn btn-secondary btn-sm" href=""><i class="os-icon os-icon-email-forward"></i><span>Send Message</span></a>
                        </div>-->
                    </div>
                </div>
                <div class="up-contents">
                    <h5 class="element-header">
                        Personal Details
                    </h5>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for=""> Email</label><input disabled value="<?php echo $profile_collection[0]->email ?>" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="">Phone No. </label><input disabled value="<?php echo $profile_collection[0]->phone ?>" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!--<div class="os-tabs-w">
                        <div class="os-tabs-controls">
                            <ul class="nav nav-tabs bigger">
                                <li class="nav-item">
                                    <a class="nav-link active show" data-toggle="tab" href="#tab_overview">Activity</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tab_sales">Daily Sales</a>
                                </li>
                            </ul>
                            <ul class="nav nav-pills smaller d-none d-md-flex">
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#">Today</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#">7 Days</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#">14 Days</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#">Last Month</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab_overview">
                                <div class="timed-activities padded">
                                    <div class="timed-activity">
                                        <div class="ta-date">
                                            <span>21st Jan, 2017</span>
                                        </div>
                                        <div class="ta-record-w">
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>11:55</strong> am
                                                </div>
                                                <div class="ta-activity">
                                                    Created a post called <a href="#">Register new symbol</a> in Rogue
                                                </div>
                                            </div>
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>2:34</strong> pm
                                                </div>
                                                <div class="ta-activity">
                                                    Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category
                                                </div>
                                            </div>
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>7:12</strong> pm
                                                </div>
                                                <div class="ta-activity">
                                                    Added <a href="#">John Silver</a> as a friend
                                                </div>
                                            </div>
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>9:39</strong> pm
                                                </div>
                                                <div class="ta-activity">
                                                    Started following user <a href="#">Ben Mosley</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timed-activity">
                                        <div class="ta-date">
                                            <span>3rd Feb, 2017</span>
                                        </div>
                                        <div class="ta-record-w">
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>9:32</strong> pm
                                                </div>
                                                <div class="ta-activity">
                                                    Added <a href="#">John Silver</a> as a friend
                                                </div>
                                            </div>
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>5:14</strong> pm
                                                </div>
                                                <div class="ta-activity">
                                                    Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="timed-activity">
                                        <div class="ta-date">
                                            <span>21st Jan, 2017</span>
                                        </div>
                                        <div class="ta-record-w">
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>11:55</strong> am
                                                </div>
                                                <div class="ta-activity">
                                                    Created a post called <a href="#">Register new symbol</a> in Rogue
                                                </div>
                                            </div>
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>2:34</strong> pm
                                                </div>
                                                <div class="ta-activity">
                                                    Commented on story <a href="#">How to be a leader</a> in <a href="#">Financial</a> category
                                                </div>
                                            </div>
                                            <div class="ta-record">
                                                <div class="ta-timestamp">
                                                    <strong>9:39</strong> pm
                                                </div>
                                                <div class="ta-activity">
                                                    Started following user <a href="#">Ben Mosley</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_sales">
                                <div class="el-tablo">
                                    <div class="label">
                                        Unique Visitors
                                    </div>
                                    <div class="value">
                                        12,537
                                    </div>
                                </div>
                                <div class="el-chart-w"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                    <canvas height="282" id="lineChart" width="1132" style="display: block; height: 188px; width: 755px;" class="chartjs-render-monitor"></canvas>
                                </div>
                            </div>
                            <div class="tab-pane" id="tab_conversion"></div>
                        </div>
                    </div>-->
                </div>
            </div>
            <?php

        }




    }

    public function view_settings()
    {
        $query= Settings::all();
        $data=['setting_collection'=>$query];
        return view('settings.vista')->with($data);
    }
    public function save_edit_setting(Request $request)
    {
        $setting= Settings::find($request->settings_id);
        $setting->value=$request->value;
        $setting->save();
    }
    public function attempt_login(Request $request){

        if(isset($request->from_apply)) {
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return redirect()->route('apply');
            }else{
                $data=[
                    'login_error_apply'=>$request->email
                ];
                return redirect()->route('apply')->with($data);
            }

        }else{
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard')/*->with($data)*/;
            }else{
                $data=[
                    'login_error'=>$request->email
                ];
                return redirect()->route('home')->with($data);
            }

        }



    }
    public function attempt_register(Request $request){
        Session::put('register_error_apply','ok');
        $rules =
            [
                'title_id'=>'required|numeric',
                'gender'=>'required|numeric',
                'firstname'=>'required',
                'middlename'=>'nullable',
                'lastname'=>'required',
                'email'=>'required|email|unique:tbl_users',
                'confirm_email'=>'required|same:email',
                'phone'=>'required|regex:/^(0)[0-9]{10}$/',
                'dob'=>'required|date_format:Y-m-d',
                'password'=>'required',
                'confirm_password'=>'required|same:password',
            ];
        //check validation options
        $this->validate($request,$rules);
        Session::forget('register_error_apply');
        Session::save();
        $user = new User;
        $user->user_type = 1;//student
        $user->designation_id = 6;//student
        $user->rights_id = 3;//student
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->gender = $request->gender;
        $user->title_id = $request->title_id;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->dob = $request->dob;
        $unique_code=Str::random(45);
        $user->remember_token = $unique_code;
        $user->password = Hash::make($request->password);
        $user->save();

        $link = route("activate_account",$unique_code);//verify email link
        $data = array('full_name'=>request()->firstname." ".request()->lastname,'link'=> $link);
        Mail::send('emails.registration', $data, function($message) use ($data){
            $message->from("info.iaue.portals@gmail.com", 'IAUE Distance Learning Portal');
            $message->to(request()->email);
            $message->subject('Welcome to IAUE Distance Learning Portal!');
        });

        $data=[
            'registration_success'=>$request->email
        ];
        return redirect()->route('apply')->with($data);

    }
    public function forgot_password(Request $request){
        Session::put('reset_password_error','ok');
        $rules =
            ['reset_email'=>'required|email'];
        //check validation options
        $this->validate($request,$rules);
        Session::forget('reset_password_error');
        Session::save();

        $user_collection= User::select('firstname','lastname','email')->where('email',$request->reset_email)->get();

        if($user_collection->isEmpty()){
            $data=[
                'reset_email_not_found'=>'yes'
            ];
            return redirect()->route('home')->with($data);

        }else{
            $unique_code=Str::random(55);
            User::where('email',$request->reset_email)->update(['email_reset_token'=>$unique_code]);
            $link = route("reset_account",$unique_code);//verify email link
            $data = array('full_name'=>$user_collection[0]->firstname." ".$user_collection[0]->lastname,'link'=> $link);
            Mail::send('emails.account_reset', $data, function($message) use ($data){
                $message->from("info.iaue.portals@gmail.com", 'IAUE Distance Learning Portal');
                $message->to(request()->reset_email);
                $message->subject('Password reset request');
            });

            $data=[
                'reset_sent'=>'yes'
            ];
            return redirect()->route('home')->with($data);

        }

    }

}
