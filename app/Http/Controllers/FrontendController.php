<?php
namespace App\Http\Controllers;

use App\Fees;
use App\Universities;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Auth;


use App\User;
use App\Settings;
use App\Programme;
use App\Program_Type;
use App\Degree_Type;
use App\Department;
use App\Title;
use App\Faculty;
use App\Applications;
use App\Applications_Documents;
use App\Session as School_Session;
use Illuminate\Support\Str;

class FrontendController extends Controller
{

    public function __construct()
    {
        session_start();
        //$this->middleware('auth');
    }

    public function home()
	{
        
        return redirect('/login');
        //return view('frontend.home')->with($data);
    }

    
    public function team()
	{
       
      
        return view('frontend.team');
    }

    public function cv_upload()
    {
        $designation = DB::table('tbl_designation')->get();
        
        $data = [
            'designation_collection' => $designation,
        ];

        return view('frontend.cv_upload')->with($data);
    }

    public function cv_upload_save(Request $request)
    {
        $rules =
        [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'designation_id'=>'required',
            'cv_file'=>'required|mimes:pdf|max:100000',
        ];

        //check validation options
        $this->validate($request,$rules);
       
        //dd($request);
        $rand_one = rand(1,9999999);
        $rand_two = rand(1,9999999);
        $rand = $rand_one.$rand_two;

        $file_ext = $request->cv_file->getClientOriginalExtension();
           
        $insert = [

            //'news_id'    => $news_id,
            'name'   => $request->name,
            'email' => $request->email,
            'created_at' => NOW(),
            'phone'    => $request->phone,
            'designation_id'       => $request->designation_id,
            'cv_path'   => $rand.".".$file_ext
            
        ];

        $result = DB::table('tbl_cv_upload')->insert($insert);
        $request->cv_file->move("file_upload/cv", $rand.".".$file_ext);

        $data=[
            'upload_success'=>'yes'
        ];
        return redirect()->route('cv_upload')->with($data);




    }

    public function events()
	  {
       
      $event_collection =  DB::table('tbl_event')->where('status',1)->OrderBy('event_date','asc')->paginate(10);

        

        $data=[
            
            'event_collection' => $event_collection
        ];
        return view('frontend.event')->with($data);
    }
    public function event_details($event_id)
	  {
       
      $event_id= base64_decode($event_id);
      $event_collection =  DB::table('tbl_event')->where('event_id',$event_id)->where('status',1)->get();

        $data=[
            
            'event_collection' => $event_collection
        ];
        return view('frontend.event_details')->with($data);
    }
    public function news()
	  {
       
      $news_collection =  DB::table('tbl_news')->where('status', 1)->OrderBy('created_at','desc')->paginate(10);

        

        $data=[
            
            'news_collection' => $news_collection
        ];
        return view('frontend.news')->with($data);
    }
    public function news_details($news_id)
	  {
       
      $news_id= base64_decode($news_id);
      $news_collection =  DB::table('tbl_news')->where('news_id',$news_id)->where('status',1)->get();
      $news_side_collection =  DB::table('tbl_news')->OrderBy('created_at','desc')->where('status',1)->take(8)->get();;

        $data=[
            
            'news_collection' => $news_collection,
            'news_side_collection' => $news_side_collection
        ];
        return view('frontend.news_details')->with($data);
    }
    public function programmes(){
        $programme_collection=DB::table('tbl_programmes as p')
            ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
            ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
            ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
            ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
            ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
            ->select('programme_id','status','name','p.university_id as university_id','university','program_type_name','faculty_name','department_name','degree_short_name')
            ->where('status',1)
            ->groupBy('programme_id')
            ->orderBy('programme_id','desc')
            ->paginate(10);
        $degree_type_collection=Degree_Type::all();
        $faculty_collection=Faculty::all();
        $programme_type_collection=Program_Type::all();
        $data=[
            'programme_collection'=>$programme_collection,
            'programme_type_collection'=>$programme_type_collection,
            'degree_type_collection'=>$degree_type_collection,
            'faculty_collection'=>$faculty_collection
        ];
        return view('frontend.programmes')->with($data);
    }
    public function programme_filter(Request $request){
        if(isset($request->programme_type_id) && isset($request->faculty_id) && isset($request->department_id)  )
        {
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
                ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','status','name','p.university_id as university_id','university','program_type_name','faculty_name','department_name','degree_short_name')
                ->where('p.programme_type_id',$request->programme_type_id)
                ->where('p.faculty_id',$request->faculty_id)
                ->where('p.department_id',$request->department_id)
                ->where('p.status',1)
                ->groupBy('programme_id')
                ->orderBy('programme_id','desc')
                ->paginate(10);
            $degree_type_collection=Degree_Type::all();
            $faculty_collection=Faculty::all();
            $programme_type_collection=Program_Type::all();
            $data=[
                'programme_collection'=>$programme_collection,
                'programme_type_collection'=>$programme_type_collection,
                'degree_type_collection'=>$degree_type_collection,
                'faculty_collection'=>$faculty_collection,
                'search'=>'yes'
            ];
            return view('frontend.programmes')->with($data);
        }
        else if(isset($request->programme_type_id) && isset($request->faculty_id) && !isset($request->department_id)  )
        {
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
                ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
                ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','status','name','p.university_id as university_id','university','program_type_name','faculty_name','department_name','degree_short_name')
                ->where('p.programme_type_id',$request->programme_type_id)
                ->where('p.faculty_id',$request->faculty_id)
                ->where('p.status',1)
                ->groupBy('programme_id')
                ->orderBy('programme_id','desc')
                ->paginate(10);
            $degree_type_collection=Degree_Type::all();
            $faculty_collection=Faculty::all();
            $programme_type_collection=Program_Type::all();
            $data=[
                'programme_collection'=>$programme_collection,
                'programme_type_collection'=>$programme_type_collection,
                'degree_type_collection'=>$degree_type_collection,
                'faculty_collection'=>$faculty_collection,
                'search'=>'yes'
            ];
            return view('frontend.programmes')->with($data);
        }
        else if(isset($request->programme_type_id) && !isset($request->faculty_id) && !isset($request->department_id)  )
        {
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
                ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','status','name','p.university_id as university_id','university','program_type_name','faculty_name','department_name','degree_short_name')
                ->where('p.programme_type_id',$request->programme_type_id)
                ->where('p.status',1)
                ->groupBy('programme_id')
                ->orderBy('programme_id','desc')
                ->paginate(10);
            $degree_type_collection=Degree_Type::all();
            $faculty_collection=Faculty::all();
            $programme_type_collection=Program_Type::all();
            $data=[
                'programme_collection'=>$programme_collection,
                'programme_type_collection'=>$programme_type_collection,
                'degree_type_collection'=>$degree_type_collection,
                'faculty_collection'=>$faculty_collection,
                'search'=>'yes'
            ];
            return view('frontend.programmes')->with($data);
        }
        else if(!isset($request->programme_type_id) && isset($request->faculty_id) && !isset($request->department_id)  )
        {
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
                ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','status','name','p.university_id as university_id','university','program_type_name','faculty_name','department_name','degree_short_name')
                ->where('p.faculty_id',$request->faculty_id)
                ->where('p.status',1)
                ->groupBy('programme_id')
                ->orderBy('programme_id','desc')
                ->paginate(10);
            $degree_type_collection=Degree_Type::all();
            $faculty_collection=Faculty::all();
            $programme_type_collection=Program_Type::all();
            $data=[
                'programme_collection'=>$programme_collection,
                'programme_type_collection'=>$programme_type_collection,
                'degree_type_collection'=>$degree_type_collection,
                'faculty_collection'=>$faculty_collection,
                'search'=>'yes'
            ];
            return view('frontend.programmes')->with($data);
        }
        else if(!isset($request->programme_type_id) && isset($request->faculty_id) && isset($request->department_id)  )
        {
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
                ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','status','name','p.university_id as university_id','university','program_type_name','faculty_name','department_name','degree_short_name')
                ->where('p.faculty_id',$request->faculty_id)
                ->where('p.department_id',$request->department_id)
                ->where('status',1)
                ->groupBy('programme_id')
                ->orderBy('programme_id','desc')
                ->paginate(10);
            $degree_type_collection=Degree_Type::all();
            $faculty_collection=Faculty::all();
            $programme_type_collection=Program_Type::all();
            $data=[
                'programme_collection'=>$programme_collection,
                'programme_type_collection'=>$programme_type_collection,
                'degree_type_collection'=>$degree_type_collection,
                'faculty_collection'=>$faculty_collection,
                'search'=>'yes'
            ];
            return view('frontend.programmes')->with($data);
        }
        else if(!isset($request->programme_type_id) && !isset($request->faculty_id) && isset($request->department_id)  )
        {
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
                ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','status','name','p.university_id as university_id','university','program_type_name','faculty_name','department_name','degree_short_name')
                ->where('p.department_id',$request->department_id)
                ->where('p.status',1)
                ->groupBy('programme_id')
                ->orderBy('programme_id','desc')
                ->paginate(10);
            $degree_type_collection=Degree_Type::all();
            $faculty_collection=Faculty::all();
            $programme_type_collection=Program_Type::all();
            $data=[
                'programme_collection'=>$programme_collection,
                'programme_type_collection'=>$programme_type_collection,
                'degree_type_collection'=>$degree_type_collection,
                'faculty_collection'=>$faculty_collection,
                'search'=>'yes'
            ];
            return view('frontend.programmes')->with($data);
        }

    }
    public function programme_details(Request $request){
        if(isset($request->id)) {
            $id=base64_decode($request->id);
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
                ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','degree_class','status','name','program_type_name',
                    'accepts_direct_entry','normal_entry_requirement','direct_entry_requirement',
                    'faculty_name','department_name','degree_name','p.university_id as university_id','university','degree_short_name','duration','description')
                ->where('status',1)
                ->where('programme_id',$id)
                ->groupBy('programme_id')
                ->get();

            $courses = DB::
            table('tbl_courses')
            ->where('programme_id',$id)
            ->get();

            $cross_courses = DB::table('tbl_cross_courses')
            ->join('tbl_courses','tbl_cross_courses.course_id','tbl_courses.course_id')
            ->where('tbl_cross_courses.programme_id',$id)
            ->get();


            $distinct_year_collection = DB::
            table('tbl_courses')
            ->Distinct('year')
            ->where('programme_id',$id)
            ->orderBy('year','desc')
            ->limit(1)
            ->get();

            $cross_distinct_collection = DB::
            table('tbl_cross_courses')
                ->Distinct('cross_course_year')
                ->where('programme_id',$id)
                ->orderBy('cross_course_year','desc')
                ->limit(1)
                ->get();

            $year="";

           

            if($distinct_year_collection->isNotEmpty() && $cross_distinct_collection->isNotEmpty() ) {
                $year = $distinct_year_collection[0]->year > $cross_distinct_collection[0]->cross_course_year ? $distinct_year_collection[0]->year : $cross_distinct_collection[0]->cross_course_year;
            }else if ($distinct_year_collection->isNotEmpty())
            {
                $year = $distinct_year_collection[0]->year ; 
            }

            if(!$programme_collection->isEmpty()) {
                $data = [
                    'programme_collection' => $programme_collection,
                    'courses_collection' => $courses,
                    'cross_courses_collection' => $cross_courses,
                    'year'                    => $year
                ];
                return view("frontend.programme_details")->with($data);
            }else
                return-redirect()->route("programmes");
        }else
            return-redirect()->route("programmes");

    }
    public function apply(Request $request){
        if(Auth::check()){
           //check if user has any uncancelled applications
            $open_application_check_collection = DB::table('tbl_applications as a')
                ->select('application_id')
                ->where('user_id', Auth::user()->id)
                ->where('action_1_status', '<>',3)
                ->where('action_2_status', '<>',3)
                ->where('action_3_status', '<>',3)
                ->get();
        }else
            $open_application_check_collection='';
        $title_collection=Title::all();

        if(isset($request->programme_id))
        {
        $programme_id=base64_decode($request->programme_id);
            $programme_collection=DB::table('tbl_programmes as p')
                ->join('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->join('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
                ->select('programme_id','name','p.university_id as university_id','university','programme_type_id','program_type_name','degree_short_name')
                ->where('programme_id',$programme_id)
                ->get();
            $programme_type_collection=Program_Type::all();
            $data=[
                    'programme_collection'=>$programme_collection,
                    'programme_type_collection'=>$programme_type_collection,
                     'open_application_check_collection'=>$open_application_check_collection,
                     'title_collection'=>$title_collection
            ];
            return view("frontend.apply")->with($data);
        }
        else{
            $programme_type_collection=Program_Type::all();
            $data=[
                    'programme_type_collection'=>$programme_type_collection,
                    'open_application_check_collection'=>$open_application_check_collection,
                    'title_collection'=>$title_collection
            ];
            return view("frontend.apply")->with($data);
        }

    }
    public function apply_submit(Request $request){
        $rules =
            [
                'program_type_id'=>'required',
                'programme_id'=>'required'
            ];
        //check validation options
        $this->validate($request,$rules/*, $customs_messages*/);

        //Get current session
        $session_name_collection=School_Session::select('session_id')->where('session_status',1)->get();
        if(!$session_name_collection->isEmpty())
        {
            //Get certain parameters to notify Admin with
            $programme_collection=DB::table('tbl_programmes as p')
                ->leftjoin('tbl_program_type as pt', 'pt.program_type_id','p.programme_type_id')
                ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
                ->leftjoin('tbl_degree_type as dt', 'dt.degree_type_id','p.degree_type_id')
                ->select('name', 'degree_short_name', 'program_type_name','p.university_id as university_id','university')
                ->where('p.programme_id', $request->programme_id)
                ->get();
            $programme_name=$programme_collection[0]->name;
            $degree_short_name=$programme_collection[0]->degree_short_name;
            $programme_type_name=$programme_collection[0]->program_type_name;
            $university_id=$programme_collection[0]->university_id;
            $university=$programme_collection[0]->university;

            $session_id=$session_name_collection[0]->session_id;
            $applications = new Applications;
            $applications->session_id = $session_id;
            $applications->programme_id = $request->programme_id;
            $applications->user_id = Auth::user()->id;
            $applications->entry_type = $request->entry_type;
            $applications->date_applied = date('Y-m-d H:i:s');
            $applications->save();

            $new_applicaton_id=$applications->application_id;

            if($request->hasFile('birth_certificate'))
            {
                $fileNameWithExt=$request->file('birth_certificate')->getClientOriginalName();
                //Get Extension
                $fileExt=$request->file('birth_certificate')->getClientOriginalExtension();
                //new dynamic name
                $fileNameToStore=strtolower(Auth::user()->firstname."_".Auth::user()->lastname."_birth_cert_".rand(1,9999999).".".$fileExt);
                $file_path = 'applications/';
                //upload image
                $request->file('birth_certificate')->move($file_path, $fileNameToStore);
                $application_documents = new Applications_Documents;
                $application_documents->application_id = $new_applicaton_id;
                $application_documents->document_typed_name = "Birth Certificate";
                $application_documents->document_name = $fileNameToStore;
                $application_documents->save();
            }

            if($request->hasFile('international_passport'))
            {
                $fileNameWithExt=$request->file('international_passport')->getClientOriginalName();
                //Get Extension
                $fileExt=$request->file('international_passport')->getClientOriginalExtension();
                //new dynamic name
                $fileNameToStore=strtolower(Auth::user()->firstname."_".Auth::user()->lastname."_int_passport_".rand(1,9999999).".".$fileExt);
                $file_path = 'applications/';
                //upload image
                $request->file('international_passport')->move($file_path, $fileNameToStore);
                $application_documents = new Applications_Documents;
                $application_documents->application_id = $new_applicaton_id;
                $application_documents->document_typed_name = "International Passport";
                $application_documents->document_name = $fileNameToStore;
                $application_documents->save();
            }

            if($request->hasFile('national_id'))
            {
                $fileNameWithExt=$request->file('national_id')->getClientOriginalName();
                //Get Extension
                $fileExt=$request->file('national_id')->getClientOriginalExtension();
                //new dynamic name
                $fileNameToStore=strtolower(Auth::user()->firstname."_".Auth::user()->lastname."_national_id_".rand(1,9999999).".".$fileExt);
                $file_path = 'applications/';
                //upload image
                $request->file('national_id')->move($file_path, $fileNameToStore);
                $application_documents = new Applications_Documents;
                $application_documents->application_id = $new_applicaton_id;
                $application_documents->document_typed_name = "National ID";
                $application_documents->document_name = $fileNameToStore;
                $application_documents->save();
            }

            if($request->hasFile('jamb'))
            {
                $fileNameWithExt=$request->file('jamb')->getClientOriginalName();
                //Get Extension
                $fileExt=$request->file('jamb')->getClientOriginalExtension();
                //new dynamic name
                $fileNameToStore=strtolower(Auth::user()->firstname."_".Auth::user()->lastname."_jamb_".rand(1,9999999).".".$fileExt);
                $file_path = 'applications/';
                //upload image
                $request->file('jamb')->move($file_path, $fileNameToStore);
                $application_documents = new Applications_Documents;
                $application_documents->application_id = $new_applicaton_id;
                $application_documents->document_typed_name = "JAMB";
                $application_documents->document_name = $fileNameToStore;
                $application_documents->save();
            }

            if($request->hasFile('waec'))
            {
                $fileNameWithExt=$request->file('waec')->getClientOriginalName();
                //Get Extension
                $fileExt=$request->file('waec')->getClientOriginalExtension();
                //new dynamic name
                $fileNameToStore=strtolower(Auth::user()->firstname."_".Auth::user()->lastname."_jamb_".rand(1,9999999).".".$fileExt);
                $file_path = 'applications/';
                //upload image
                $request->file('waec')->move($file_path, $fileNameToStore);
                $application_documents = new Applications_Documents;
                $application_documents->application_id = $new_applicaton_id;
                $application_documents->document_typed_name = "WAEC";
                $application_documents->document_name = $fileNameToStore;
                $application_documents->save();
            }

            $link = "";
            $data = array('full_name'=>Auth::user()->firstname." ".Auth::user()->lastname,'link'=> $link);
            Mail::send('emails.application', $data, function($message) use ($data){
                $message->from("info.iaue.portals@gmail.com", 'IAUE Distance Learning Portal');
                $message->to(Auth::user()->email);
                $message->subject('IAUE Application Sent!');
            });

            //Send Admin a notification also
            $data = array('full_name'=>"Administrator","university_id"=>$university_id,"university"=>$university,"programme_name"=>$programme_name,'degree_short_code'=>$degree_short_name,'programme_type'=>$programme_type_name
            ,'student_name'=>Auth::user()->firstname." ".Auth::user()->lastname);
            Mail::send('emails.notify_admin', $data, function($message) use ($data){
                $message->from("info.iaue.portals@gmail.com", 'IAUE Distance Learning Portal');
                $message->to("isokenodigie@gmail.com");
                $message->to("mailaustin37@gmail.com");
                $message->subject('New Student Application');
            });


            $data=[
                'application_success'=>"yes!"
            ];
            return redirect()->route('home')->with($data);
        }
        else {
            dd("No Active Session. Applications are only possible when an active session is specified");
        }

    }
    public function activate_account(Request $request){
        $path=explode("/",$request->path());
        if(isset($path) && isset($path[2]))
        {
            $unique_id=$path[2];
            $psw_collection= User::select('remember_token','email','firstname')->where('remember_token',$unique_id)->get();
            if(!$psw_collection->isEmpty()) {
                $stored_unique_id = $psw_collection[0]->remember_token;
                $firstname = $psw_collection[0]->firstname;
                $email = $psw_collection[0]->email;
                if ($unique_id == $stored_unique_id) {
                    //update account and send mail
                    User::where('remember_token', $unique_id)->update(['remember_token' =>'', 'email_activated'=> 1]);
                    $link = route("home");
                    $data = array('full_name' => $firstname, 'link' => $link);
                    Mail::send('emails.activated', $data, function ($message) use ($data,$email) {
                        $message->from("dorc_it@dangoteprojects.com", 'IAUE Distance Learning Portal');
                        $message->to($email);
                        $message->subject('IAUE Portal account successfully activated!');
                    });

                    $data = [
                        'activation_success' => 'Yas!'
                    ];
                    return redirect()->route('home')->with($data);

                } else
                    return view("errors.warning");
            }
            else{
                return view("errors.warning");
            }

        }else{
            return view("errors.warning");
        }
    }

    
    public function fee_breakdown(){
        $programme_type_collection=Program_Type::all();
        $fee_collection=Fees::all();
        $university_collection=Universities::all();


        $data=[
            'fee_collection'=>$fee_collection,
            'programme_type_collection'=>$programme_type_collection,
            'university_collection'=>$university_collection
        ];
        return view("frontend.fee_breakdown")->with($data);
    }
    public function reset_account(Request $request){
        $path=explode("/",$request->path());
        if(isset($path) && isset($path[2]))
        {
            $unique_id=$path[2];
            $psw_collection= User::select('email','firstname','email_reset_token')->where('email_reset_token',$unique_id)->get();
            if(!$psw_collection->isEmpty()) {
                $stored_unique_id = $psw_collection[0]->email_reset_token;
                $firstname = $psw_collection[0]->firstname;
                $email = $psw_collection[0]->email;
                if ($unique_id == $stored_unique_id) {
                    //update account
                    $new_unique_code=Str::random(55);
                    User::where('email_reset_token', $unique_id)->update(['email_reset_token' =>$new_unique_code]);
                    $data = [
                        'final_reset_code' => $new_unique_code
                    ];
                    return redirect()->route('home')->with($data);

                } else {
                    $data = [
                        'reset_error_2' => 'yes'
                    ];
                    return redirect()->route('home')->with($data);
                }
            }
            else{
                $data = [
                    'reset_error_2' => 'yes'
                ];
                return redirect()->route('home')->with($data);
            }

        }else{
            $data = [
                'reset_error_2' => 'yes'
            ];
            return redirect()->route('home')->with($data);
        }
    }

    public function final_reset_account(Request $request){
        if(isset($request->final_reset_code)) {
            $final_code = $request->final_reset_code;
            //Check if code is valid
            $user_collection= User::select('firstname','lastname','email','password')->where('email_reset_token',$final_code)->get();
            if($user_collection->isEmpty()){
                $data = [
                    'reset_error_2' => 'yes'
                ];
                return redirect()->route('home')->with($data);

            }else{
                    $new_password_1 = $request->new_password_reset;
                    User::where('email_reset_token',$final_code)->update(['password'=>Hash::make($new_password_1)]);
                    $data = array('full_name'=>$user_collection[0]->firstname,'email'=>$user_collection[0]->email);
                    Mail::send('emails.account_reset_successful', $data, function($message) use ($data){
                        $message->from("info.iaue.portals@gmail.com", 'IAUE Distance Learning Portal');
                        $message->to($data['email']);
                        $message->subject('Password successfully changed!');
                    });

                    $data = [
                        'reset_password_successful' => 'yes'
                    ];
                    return redirect()->route('home')->with($data);
            }
        }else{
            return view('errors.warning');
        }
    }





    public function details(Request $request)
    {
        $product_collection = Products::select('*')
            ->where('product_id',$request->product_id)
            ->get();
        $cat_id=$product_collection[0]->cat_id;
        $sub_cat_id=$product_collection[0]->sub_cat_id;
        if($sub_cat_id==NULL){
            $related_products_collection = Products::select('*')
                ->where('product_id','<>', $request->product_id)
                ->where('cat_id', $cat_id)
                ->limit(6)
                ->get();
        }
        else{
            $related_products_collection = Products::select('*')
                ->where('product_id','<>', $request->product_id)
                ->where('cat_id', $cat_id)
                ->orWhere('sub_cat_id', $sub_cat_id)
                ->limit(6)
                ->get();
        }

        $data=['product_collection'=>$product_collection,'related_products_collection'=>$related_products_collection];
        return view('frontend.details')->with($data);
    }
    public function shop(Request $request){
        if(isset($request->cat_id) && !isset($request->sub_cat_id)){
            $count=Products::select('*')
                ->where('out_of_stock',0)
                ->where('cat_id',$request->cat_id)->get();
            $products_collection = Products::select('*')
                ->where('out_of_stock',0)
                ->where('cat_id',$request->cat_id)
                ->orderBy('amount','asc')->paginate(20);
            $data=[
                'products_collection'=>$products_collection,
                'all'=>$count->count(),
                'from_cat'=>'yas!'
            ];
            return view('frontend.shop')->with($data);
        }
        else if(isset($request->cat_id) && isset($request->sub_cat_id)){
            $count=Products::select('*')
                ->where('out_of_stock',0)
                ->where('sub_cat_id',$request->sub_cat_id)->get();
            $products_collection = Products::select('*')
                ->where('out_of_stock',0)
                ->where('sub_cat_id',$request->sub_cat_id)
                ->orderBy('amount','asc')->paginate(20);
            $data=[
                'products_collection'=>$products_collection,
                'all'=>$count->count(),
                'from_cat'=>'yas!'
            ];
            return view('frontend.shop')->with($data);
        }
        else if(!isset($request->cat_id) && !isset($request->sub_cat_id)){
            $count=Products::get();
            $products_collection = Products::select('*')
                ->where('out_of_stock',0)
                ->orderBy('amount','asc')->paginate(20);
            $data=[
                'products_collection'=>$products_collection,
                'all'=>$count->count(),
                'from_cat'=>'yas!'
            ];
            return view('frontend.shop')->with($data);
        }

    }
    public function shop_filter_price(Request $request){
        if(isset($request->min_price) && isset($request->max_price))
        {
            $count=Products::select('*')
                ->where('out_of_stock',0)
                ->where('cat_id',$request->cat_id)
                ->get();
            $products_collection = Products::select('*')
                ->where('out_of_stock',0)
                ->where('amount','>=',$request->min_price)
                ->where('amount','<=',$request->max_price)
                ->orderBy('amount','desc')
                ->paginate(20);
            $data=[
                'all'=>$count->count(),
                'products_collection'=>$products_collection,
                'from_price'=>"yas!"
            ];
            return view('frontend.shop')->with($data);
        }
        else{
                $count=Products::select('*')
                    ->where('out_of_stock',0)
                    ->where('cat_id',$request->cat_id)->get();
                $products_collection = Products::select('*')
                    ->where('out_of_stock',0)
                    ->orderBy('amount','asc')
                    ->paginate(20);
            $cat_collection = Category::all();
            $sub_cat_collection = SubCategory::all();
            $data=[
                'products_collection'=>$products_collection,
                'cat_collection'=>$cat_collection,
                'sub_cat_collection'=>$sub_cat_collection,
                'all'=>$count->count()
            ];
            return view('frontend.shop')->with($data);
        }

    }
    public function shop_filter_price_order(Request $request){
        if(isset($request->type)){
            $count=Products::select('*')
                ->where('out_of_stock',0)
                ->get();
            $products_collection = Products::select('*')
                ->where('out_of_stock',0)
                ->orderBy('amount',$request->type)
                ->paginate(20);
            $data=[
                'products_collection'=>$products_collection,
                'all'=>$count->count(),
                'type'=>$request->type
            ];
            return view('frontend.shop')->with($data);
        }
    }
    public function addItem(Request $request){
        if(!isset($_SESSION['cart']))
            $_SESSION['cart'] = [];

        if(array_key_exists($request->product_id,$_SESSION['cart']))
            $_SESSION['cart'][$request->product_id] += $request->qty;
        else
            $_SESSION['cart'][$request->product_id] = $request->qty;

        return count($_SESSION['cart']);

    }
    public function cart(Request $request){
        if(isset($_SESSION['cart']) && count($_SESSION['cart'])>0)
        {
            $findArray=[];
            foreach($_SESSION['cart'] as $key=>$value){
                $findArray[]=$key;
            }
            $product_collection=DB::table('tbl_products as p')
                ->select('product_id','description','sale_amount','amount','on_sale','product_name','c.cat_name as cat_name','s.sub_cat_name as sub_cat_name','main_image')
                ->leftjoin('tbl_categories as c','c.cat_id','p.cat_id')
                ->leftjoin('tbl_sub_categories as s','s.sub_cat_id','p.sub_cat_id')
                ->whereIn('product_id',$findArray)
                ->get();

            $vat_collection = DB::table('tbl_settings as s')
                ->where('settings_id',2)
                ->orWhere('settings_id',3)
                ->get();

            $state_collection=DB::table('tbl_state')->select('state_id','state_name')->get();
            $country_collection=DB::table('tbl_countries')->select('country_id','country_name')->get();
            $data=['vat_collection'=>$vat_collection,'product_Collection'=>$product_collection, 'state_collection'=>$state_collection, 'country_collection'=>$country_collection];
        }else{
            $data=[
                'empty'=>'',
            ];
        }

        return view('frontend.cart')->with($data);
    }
    public function about()
    {
        return view('frontend.about');
    }
    public function contact()
    {
        return view('frontend.contact');
    }


    public function contact_send(Request $request)
    {
      
        $rules =
        [
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'company'=>'sometimes',
            'message'=>'required',
        ];

        //check validation options
        $this->validate($request,$rules);
       

        $contact_email = Settings::where('name','contact_us_email')->first()->value;
        $user_email = $request->email;
        
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'user_message' => $request->message,
            );

        Mail::send('emails.contact_us', $data, function($message) use ($data, $contact_email, $user_email){
            $message->from($contact_email, 'oarsandwind.com');
            $message->to($contact_email);
            $message->subject('ALERT : New message from oarsandwind contact form ('.$user_email.')');
          });


          $data=[
            'contact_success'=>'yes'
        ];
        return redirect()->route('contact')->with($data);

       
    }


    public function ourservices()
    {

    }

    public function recruitment()
    {

    }
    public function outsourcing()
    {

    }
    public function training_services()
    {

    }
    public function license()
    {

    }

    public function clients()
    {
        
    }




    public function remove(Request $request){
        unset($_SESSION['cart'][$request->product_id]);
        return;
    }
    public function checkout(Request $request){

        $rules =
            [
                'name'=>'required',
                'email'=>'required|email',
                'phone'=>'required',
                'address'=>'required',
                'country'=>'required',
                'state'=>'required_if:country,162',
            ];

        //Let's hold these shipping variables
        if(!isset($_SESSION['shipping_details'])) {
            $_SESSION['shipping_details'] = [];
            $_SESSION['shipping_details']['name'] = $request->name;
            $_SESSION['shipping_details']['email'] = $request->email;
            $_SESSION['shipping_details']['phone'] = $request->phone;
            $_SESSION['shipping_details']['address'] = $request->address;
            $_SESSION['shipping_details']['country'] = $request->country;
            $_SESSION['shipping_details']['state'] = $request->state;
        }
        else {
            $_SESSION['shipping_details']['name'] = $request->name;
            $_SESSION['shipping_details']['email'] = $request->email;
            $_SESSION['shipping_details']['phone'] = $request->phone;
            $_SESSION['shipping_details']['address'] = $request->address;
            $_SESSION['shipping_details']['country'] = $request->country;
            $_SESSION['shipping_details']['state'] = $request->state;
        }

        //check validation options
        $total_sum=0;

        $this->validate($request,$rules);
        // I need to sum all orders and also provide a url for payment

        //Get Delivery fee based on state
        if($request->country!=162) {
            $country = Country::find($request->country);
            $total_sum += $country->delivery_fee;
        }
        else {
            $state = State::find($request->state);
            $total_sum += $state->delivery_fee;
        }

        $findArray=[];
        foreach($_SESSION['cart'] as $key=>$value){
            $findArray[]=$key;
        }
        $product_collection=DB::table('tbl_products as p')
            ->select('product_id','sale_amount','amount','on_sale','product_name','c.cat_name as cat_name','s.sub_cat_name as sub_cat_name','main_image')
            ->leftjoin('tbl_categories as c','c.cat_id','p.cat_id')
            ->leftjoin('tbl_sub_categories as s','s.sub_cat_id','p.sub_cat_id')
            ->whereIn('product_id',$findArray)
            ->get();

        $order_code=date('Ymd').'_'.rand(0,99999);


        foreach($product_collection as $product) {
                $amt=$product->on_sale?$product->sale_amount:$product->amount;
                $total_sum+=$amt * $_SESSION['cart'][$product->product_id];
        }

        $vat_collection = DB::table('tbl_settings as s')
            ->where('settings_id',2)
            ->orWhere('settings_id',3)
            ->get();
        //Add VAT here
        if($vat_collection[0]->value==1)
            $total_sum=$total_sum * (1+$vat_collection[1]->value/100);

        $total_sum=$total_sum*100;
        $the_place=route('verifyTransaction');
        $the_final=route('cart',['success']);


        return ("
        <script>
        function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_live_2a571ec345125fc770fba9459464aaa501560422',
      email: '$request->email',
      amount: '$total_sum',
      currency: 'NGN',
      ref: '$order_code', // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: '$request->name',
      lastname: '',
      // label: 'Optional string that replaces customer email'
      metadata: {
         custom_fields: [
            {
                display_name: 'mobile_number',
                variable_name: 'mobile_number',
                value: 'mobile_number'
            }
         ]
      },
      callback: function(response){
          if(response.status=='success')
          {
          $.ajax(
                   {
                    type: 'POST',
                    data:{
                      _token:'$request->_token',
                      ref:''+response.reference,
                      name:'$request->name',
                      email:'$request->email',
                      phone:'$request->phone',
                      address:'$request->address',
                      order_no:'$order_code' ,   
                      state:'$request->state' ,   
                      country:'$request->country' ,   
                      other_country_state:'$request->other_country_state'   
                    },
                    url: '$the_place',
                    cache: false,
                    beforeSend: function () {
                    },
                    error:function(){
                        swal('Oops','An error occurred. Please try again','error');
                    },
                    success: function (r) {
                     if(r=='success'){
                        window.location.replace('$the_final'); 
                     }else{
                        swal('Oops','Transaction was completed, please try again','error'); 
                     }
                    }
                  }  
                );
          }
          else
            swal('Oops','Transaction was not successful','error');  
          
      },
      onClose: function(){
      }
    });
    handler.openIframe();
  }
  </script>
  ");


    }
    public function verifyTransaction(Request $request){
        $reference = $request->ref;
        $url = 'https://api.paystack.co/transaction/verify/'.$reference;
        //open connection
        $ch = curl_init();//set request parameters
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt_array($ch, array(
            CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . rawurlencode($reference),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                "accept: application/json",
                "authorization: Bearer sk_live_486377e4f74fa8d6f19c34812989668930974bef",
                "cache-control: no-cache"
            ],
        ));

        //send request
        $request_data = curl_exec($ch);//close connection
        $err = curl_error($ch);
        //curl_close($ch);//declare an array that will contain the result
        $result = array();
        if($request_data){
            $result = json_decode($request_data, true);
        }
        if (array_key_exists('data', $result) && array_key_exists('status', $result['data']) && ($result['data']['status'] === 'success'))
        {
            //Perform necessary action
            $total_sum=0;
            //Get Delivery fee based on Country or state
            $country = Country::find($request->country);
            if($request->country!=162)//Not Nigeria
                $total_sum+=$country->delivery_fee;
            else {
                $state = State::find($request->state);
                $total_sum += $state->delivery_fee;
            }

            $findArray=[];
            foreach($_SESSION['cart'] as $key=>$value){
                $findArray[]=$key;
            }
            $product_collection=DB::table('tbl_products as p')
                ->select('product_id','sale_amount','amount','on_sale','product_name','c.cat_name as cat_name','s.sub_cat_name as sub_cat_name','main_image')
                ->leftjoin('tbl_categories as c','c.cat_id','p.cat_id')
                ->leftjoin('tbl_sub_categories as s','s.sub_cat_id','p.sub_cat_id')
                ->whereIn('product_id',$findArray)
                ->get();

            foreach($product_collection as $product) {
                $amt=$product->on_sale?$product->sale_amount:$product->amount;
                $total_sum+=$amt * $_SESSION['cart'][$product->product_id];
            }

            foreach($product_collection as $product)
            {
                $order=new Orders();
                $order->order_code=$request->order_no;
                $order->product_id=$product->product_id;
                $order->customer_name=$request->name;
                $order->customer_email=$request->email;
                $order->customer_phone=$request->phone;
                $order->customer_address=$request->address;
                $order->country_id=$request->country;
                $order->other_country_state=$request->other_country_state;
                $order->state_id=$request->state;
                $order->qty=$_SESSION['cart'][$product->product_id];
                $order->order_status=0;
                $order->amount_sold=$product->on_sale?$product->sale_amount:$product->amount;

                if($request->country!=162)//Not Nigeria
                     $order->delivery_amount=$country->delivery_fee;
                else
                    $order->delivery_amount=$state->delivery_fee;

                $vat_collection = DB::table('tbl_settings as s')
                    ->where('settings_id',2)
                    ->orWhere('settings_id',3)
                    ->get();

                if($vat_collection[0]->value==1)
                 $order->vat=$vat_collection[1]->value;
                else
                 $order->vat=0;

                $order->date_placed=date('Y-m-d H:i:s');
                $order->ref=$reference;
                $order->save();
             }

            //place first order status
            $order_status=new Order_Status;
            $order_status->order_no=$request->order_no;
            $order_status->status="Order successfully placed. Currently being processed";
            $order_status->date=date("Y-m-d H:i:s");
            $order_status->save();

            $to = $request->email;

            $subject = 'We have received your order!';

            $headers = "From: " . "info@jennysglowng.com". "\r\n";
            $headers .= "Reply-To: ". "info@jennysglowng.com" . "\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
            $message = <<<EOD
                    <!doctype html>
                    <html>
                      <head>
                        <meta name="viewport" content="width=device-width" />
                        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                        <title>We have received your order!</title>
                        <style>
                          /* -------------------------------------
                              GLOBAL RESETS
                          ------------------------------------- */
                          img {
                            border: none;
                            -ms-interpolation-mode: bicubic;
                            max-width: 100%; }
                          body {
                            background-color: #f6f6f6;
                            font-family: sans-serif;
                            -webkit-font-smoothing: antialiased;
                            font-size: 14px;
                            line-height: 1.4;
                            margin: 0;
                            padding: 0;
                            -ms-text-size-adjust: 100%;
                            -webkit-text-size-adjust: 100%; }
                          table {
                            border-collapse: separate;
                            mso-table-lspace: 0pt;
                            mso-table-rspace: 0pt;
                            width: 100%; }
                            table td {
                              font-family: sans-serif;
                              font-size: 14px;
                              vertical-align: top; }
                          /* -------------------------------------
                              BODY & CONTAINER
                          ------------------------------------- */
                          .body {
                            background-color: #f6f6f6;
                            width: 100%; }
                          /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                          .container {
                            display: block;
                            Margin: 0 auto !important;
                            /* makes it centered */
                            max-width: 580px;
                            padding: 10px;
                            width: 580px; }
                          /* This should also be a block element, so that it will fill 100% of the .container */
                          .content {
                            box-sizing: border-box;
                            display: block;
                            Margin: 0 auto;
                            max-width: 580px;
                            padding: 10px; }
                          /* -------------------------------------
                              HEADER, FOOTER, MAIN
                          ------------------------------------- */
                          .main {
                            background: #fff;
                            border-radius: 3px;
                            width: 100%; }
                          .wrapper {
                            box-sizing: border-box;
                            padding: 20px; }
                          .footer {
                            clear: both;
                            padding-top: 10px;
                            text-align: center;
                            width: 100%; }
                            .footer td,
                            .footer p,
                            .footer span,
                            .footer a {
                              color: #999999;
                              font-size: 12px;
                              text-align: center; }
                          /* -------------------------------------
                              TYPOGRAPHY
                          ------------------------------------- */
                          h1,
                          h2,
                          h3,
                          h4 {
                            color: #000000;
                            font-family: sans-serif;
                            font-weight: 400;
                            line-height: 1.4;
                            margin: 0;
                            Margin-bottom: 30px; }
                          h1 {
                            font-size: 35px;
                            font-weight: 300;
                            text-align: center;
                            text-transform: capitalize; }
                          p,
                          ul,
                          ol {
                            font-family: sans-serif;
                            font-size: 14px;
                            font-weight: normal;
                            margin: 0;
                            Margin-bottom: 15px; }
                            p li,
                            ul li,
                            ol li {
                              list-style-position: inside;
                              margin-left: 5px; }
                          a {
                            color: #3498db;
                            text-decoration: underline; }
                          /* -------------------------------------
                              BUTTONS
                          ------------------------------------- */
                          .btn {
                            box-sizing: border-box;
                            width: 100%; }
                            .btn > tbody > tr > td {
                              padding-bottom: 15px; }
                            .btn table {
                              width: auto; }
                            .btn table td {
                              background-color: #ffffff;
                              border-radius: 5px;
                              text-align: center; }
                            .btn a {
                              background-color: #ffffff;
                              border: solid 1px #3498db;
                              border-radius: 5px;
                              box-sizing: border-box;
                              color: #3498db;
                              cursor: pointer;
                              display: inline-block;
                              font-size: 14px;
                              font-weight: bold;
                              margin: 0;
                              padding: 12px 25px;
                              text-decoration: none;
                              text-transform: capitalize; }
                          .btn-primary table td {
                            background-color: #3498db; }
                          .btn-primary a {
                            background-color: #3498db;
                            border-color: #3498db;
                            color: #ffffff; }
                          /* -------------------------------------
                              OTHER STYLES THAT MIGHT BE USEFUL
                          ------------------------------------- */
                          .last {
                            margin-bottom: 0; }
                          .first {
                            margin-top: 0; }
                          .align-center {
                            text-align: center; }
                          .align-right {
                            text-align: right; }
                          .align-left {
                            text-align: left; }
                          .clear {
                            clear: both; }
                          .mt0 {
                            margin-top: 0; }
                          .mb0 {
                            margin-bottom: 0; }
                          .preheader {
                            color: transparent;
                            display: none;
                            height: 0;
                            max-height: 0;
                            max-width: 0;
                            opacity: 0;
                            overflow: hidden;
                            mso-hide: all;
                            visibility: hidden;
                            width: 0; }
                          .powered-by a {
                            text-decoration: none; }
                          hr {
                            border: 0;
                            border-bottom: 1px solid #f6f6f6;
                            Margin: 20px 0; }
                          /* -------------------------------------
                              RESPONSIVE AND MOBILE FRIENDLY STYLES
                          ------------------------------------- */
                          @media only screen and (max-width: 620px) {
                            table[class=body] h1 {
                              font-size: 28px !important;
                              margin-bottom: 10px !important; }
                            table[class=body] p,
                            table[class=body] ul,
                            table[class=body] ol,
                            table[class=body] td,
                            table[class=body] span,
                            table[class=body] a {
                              font-size: 16px !important; }
                            table[class=body] .wrapper,
                            table[class=body] .article {
                              padding: 10px !important; }
                            table[class=body] .content {
                              padding: 0 !important; }
                            table[class=body] .container {
                              padding: 0 !important;
                              width: 100% !important; }
                            table[class=body] .main {
                              border-left-width: 0 !important;
                              border-radius: 0 !important;
                              border-right-width: 0 !important; }
                            table[class=body] .btn table {
                              width: 100% !important; }
                            table[class=body] .btn a {
                              width: 100% !important; }
                            table[class=body] .img-responsive {
                              height: auto !important;
                              max-width: 100% !important;
                              width: auto !important; }}
                          /* -------------------------------------
                              PRESERVE THESE STYLES IN THE HEAD
                          ------------------------------------- */
                          @media all {
                            .ExternalClass {
                              width: 100%; }
                            .ExternalClass,
                            .ExternalClass p,
                            .ExternalClass span,
                            .ExternalClass font,
                            .ExternalClass td,
                            .ExternalClass div {
                              line-height: 100%; }
                            .apple-link a {
                              color: inherit !important;
                              font-family: inherit !important;
                              font-size: inherit !important;
                              font-weight: inherit !important;
                              line-height: inherit !important;
                              text-decoration: none !important; }
                            .btn-primary table td:hover {
                              background-color: #34495e !important; }
                            .btn-primary a:hover {
                              background-color: #34495e !important;
                              border-color: #34495e !important; } }
                        </style>
                      </head>
                      <body class="">
                        <table border="0" cellpadding="0" cellspacing="0" class="body">
                          <tr>
                            <td>&nbsp;</td>
                            <td class="container">
                              <div class="content">

                                <!-- START CENTERED WHITE CONTAINER -->
                                <span class="preheader">Your Order No. is $request->order_no</span>
                                <table class="main">

                                  <!-- START MAIN CONTENT AREA -->
                                  <tr>
                                    <td class="wrapper">
                                      <table border="0" cellpadding="0" cellspacing="0">
                                        <tr>
                                          <td>
                                            <p>Hi $request->name,</p>
                                           <p>Your order with number $request->order_no has been placed successfully.</p>
                                           <p>You can track the status of your order on our website at anytime.</p>
                                           <p>Thank you for shopping with us.</p>


                                <!-- START FOOTER -->
                                <div class="footer">
                                  <table border="0" cellpadding="0" cellspacing="0">

                                    <tr>
                                      <td class="content-block powered-by">
                                        Powered by <a href="#">Jenny's Glow Nigeria</a>.
                                      </td>
                                    </tr>
                                  </table>
                                </div>

                                <!-- END FOOTER -->

                    <!-- END CENTERED WHITE CONTAINER --></div>
                            </td>
                            <td>&nbsp;</td>
                          </tr>
                        </table>
                      </body>
                    </html>
EOD;
            if(mail($to, $subject, $message, $headers)){
                session_destroy();
                return "success";
            }else{
                session_destroy();
                return "success";

            }

            //send mail to user


        }
        else{
            return "failed";
        }
    }
    public function add_testimonial(Request $request){
        $rules =
            [
                'name'=>'required',
                'testimonial'=>'required',
            ];

        //handle Staff Image
        if($request->hasFile('photo'))
        {
            $fileNameWithExt=$request->file('photo')->getClientOriginalName();
            //Get Extension
            $fileExt=$request->file('photo')->getClientOriginalExtension();
            //new dynamic name
            $fileNameToStore=strtolower("user_".$request->name."_".rand(1,9999999).".".$fileExt);
            $file_path = 'testimonials/';
            //upload image
            $request->file('photo')->move($file_path, $fileNameToStore);

        }
        else
            $fileNameToStore='no_pic.jpg';//or whatever

        //check validation options
        $this->validate($request,$rules);
        $testimonial = new Testimonials;
        $testimonial->name = $request->name;
        $testimonial->testimonial = $request->testimonial;
        $testimonial->location = $request->location;
        $testimonial->photo = $fileNameToStore;
        $testimonial->user_posted_date = date('Y-m-d H:i:s');
        $testimonial->save();
    }
    public function get_order_info(Request $request){
        $rules =
            [
                'order_no'=>'required',
            ];
        $this->validate($request,$rules);
        $orders_collection = DB::select(DB::raw("SELECT SUM(amount_sold*qty) total FROM tbl_orders where order_code='$request->order_no'"));
        $products_collection=DB::table('tbl_orders as o')
            ->leftjoin('tbl_products as p','p.product_id','=','o.product_id')
            ->leftjoin('tbl_categories as c','c.cat_id','=','p.cat_id')
            ->leftjoin('tbl_sub_categories as s','s.sub_cat_id','=','p.sub_cat_id')
            ->select('o.product_id as product_id','product_name','cat_name','sub_cat_name',
                'order_code','order_id','order_status','customer_name','qty','amount_sold','delivery_amount','date_placed',
                'main_image','images','sale_amount','amount',
                'on_sale')
            ->where('order_code',$request->order_no)
            ->get();
        $order_tracking_collection=DB::table('tbl_order_status as o')
         ->where('order_no',$request->order_no)
         ->orderBy('id','asc')
         ->get();

        //let's get order details
        ?>

        <div class="col-lg-12 col-md-12">
        <br>
        <h5>Order status for Order No.: <code><?php echo $request->order_no ?></code></h5><br>
        <h5>Customer Name:&nbsp;<?php echo $products_collection[0]->customer_name ?></h5><br>
        <h5>Date Placed:&nbsp;<?php echo $products_collection[0]->date_placed ?></h5><br>
        <h5 style="display: inline-block">Order Value:&nbsp;<?php echo  "N ".number_format($orders_collection[0]->total,2)?></h5>&nbsp;&nbsp;&nbsp;<h5 style="display: inline-block">Shipping Fee:&nbsp;<?php echo "N ".number_format($products_collection[0]->delivery_amount,2) ?></h5><br><br/>
        <table class="table table-striped table-bordered table-hover table-full-width order_details">
        <thead>
        <tr>
            <th class="center">Product Name</th>
            <th class="center">Category</th>
            <th class="center">Sub Category</th>
            <th class="center">Amount Sold</th>
        </tr>
        </thead>
        <tbody>
                <?php
                    foreach($products_collection as $key=>$val) {
                        ?>
                        <tr>
                            <td class="center"><img src="<?php echo asset("uploads/$val->main_image") ?>" width="70"
                                                    height="70"/>&nbsp;&nbsp;<?php echo $val->product_name ?></td>
                            <td class="center"><?php echo $val->cat_name ?></td>
                            <td class="center"><?php echo $val->sub_cat_name ? $val->sub_cat_name : '---' ?></td>
                            <td class="center"><?php echo $val->amount_sold ?></td>
                        </tr>
                        <?php
                    }
                ?>
        </tbody>
        </table>
        <!-- Timeline -->
        <div class="col-lg-12 col-md-12">
            <div class="timeline">

                <!-- Line component -->
                <div class="line text-danger"></div>

                <!-- Panel -->
            <?php
            foreach($order_tracking_collection as $key=>$val) {
                ?>
                <article class="panel panel-success panel-outline">

                    <!-- Icon -->
                    <div class="panel-heading icon">
                        <i class="fa  <?php echo $val->status=="Order has been successfully completed"?"fa-gift":"fa-info-circle" ?>"></i>
                    </div>
                    <!-- /Icon -->

                    <!-- Body -->
                    <div class="panel-body">
                        <strong><code><?php echo $val->date ?></code></strong>
                        <?php echo $val->status ?>
                    </div>
                    <!-- /Body -->

                </article>
            <?php
            }
            ?>
                <!-- /Panel -->

            </div>
        </div>
        </div>
        <!-- /Timeline -->

        <?php

    }
    public function newsletter_subscribe(Request $request){
        $rules =
            [
                'newsletter_email'=>'required|email|unique:tbl_newsletters,email',
            ];

        //check validation options
        $this->validate($request,$rules);
        $newsletter= new Newsletters;
        $newsletter->email = $request->newsletter_email;
        $newsletter->save();
    }
    public function get_order_details(Request $request){
        $rules = ['order_code'=>'required'];
        $this->validate($request,$rules);
        $orders_collection=DB::table('tbl_orders as o')
            ->leftjoin('tbl_products as p','p.product_id','=','o.product_id')
            ->leftjoin('tbl_categories as c','c.cat_id','=','p.cat_id')
            ->leftjoin('tbl_sub_categories as s','s.sub_cat_id','=','p.sub_cat_id')
            ->leftjoin('tbl_staff as st','st.staff_id','=','o.action_by')
            ->select('o.product_id as product_id','product_name','cat_name','sub_cat_name',
                'order_code','order_id','order_status','customer_name','customer_phone','customer_email','customer_address','qty','amount_sold','delivery_amount','date_placed',
                'main_image','images','sale_amount','amount','other_country_state',
                'on_sale','first_name','last_name','date')
            ->where('order_code',$request->order_code)
            ->get();
        ?>
        <table class="table table-striped table-bordered table-hover table-full-width order_details">
            <thead>
            <tr>
                <th class="center">Product Name</th>
                <th class="center">Category</th>
                <th class="center">Sub Category</th>
                <th class="center">Amount Sold</th>
            </tr>
            </thead>
            <tbody>
<?php
        foreach($orders_collection as $key=>$val)
        {
 ?>
            <tr>
            <td class="center"><img src="<?php echo asset("uploads/$val->main_image") ?>" width="70" height="70"/>&nbsp;&nbsp;<?php echo $val->product_name?></td>
            <td class="center"><?php echo $val->cat_name ?></td>
            <td class="center"><?php echo $val->sub_cat_name?$val->sub_cat_name:'---' ?></td>
            <td class="center"><?php echo $val->amount_sold?></td>
            </tr>
<?php
        }
        ?>
            </tbody>
        </table>

<?php
        if(!$val->order_status) {
            ?>
            <textarea class="form-control" name="" id="tracking_info" cols="5" rows="3"
                      style="border-radius: 10px"></textarea>
            <br>
            <button data-code="<?php echo $request->order_code ?>" class="btn btn-primary add_tracking_info">Add
                Tracking Update
            </button>
            <?php
        }
    }



}
