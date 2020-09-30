<?php

namespace App\Http\Controllers;
use App\vw_user_details;
use DB;
use Illuminate\Http\Request;
use App\trainee_schedule;
use App\perment_office_locations;
use App\trainee_departmental_report;
use App\trainee_log;
use Auth;
use App\Department;
use App\user;
use App\Role;
use App\Role_user;
use App\Staff_category;
use App\perment_office_location;
use App\Business_unit;
use App\Accomodation_status;
use App\State;
use App\Lga;
use App\Country;
use App\Qualification;
use App\vw_user_roleuser_role;




class TraineeManagementController extends Controller
{
    //
    public function trainee_schedule($user_category, Request $request)
    {


        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-view-other-rotation'))) 
        {



                $user_category = $user_category;

                $sel_id = isset($request->filter)?$request->filter:"";
                
                $builder = trainee_schedule::query();
                
                $builder->selectRaw("trainee_schedule.sap,  CONCAT(users.name,' ',users.first_name) as staff_name, departments.name as department_name, staff_type.staff_type_name, users.user_category_id, users.email")
                ->join('users','users.sap','trainee_schedule.sap')
                ->leftjoin('staff_type','staff_type.staff_type_id', 'users.staff_type_id')
                ->join('departments', 'departments.id','users.department_id')
                ->groupBy('trainee_schedule.sap', 'users.name', 'users.first_name' , 'departments.name' , 'staff_type.staff_type_name', 'users.user_category_id' , 'users.email');

                if (isset($user_category) && ($user_category > 0 && $user_category <= 4) )
                {
                    $builder->where('users.user_category_id', $user_category);
                }

                if (isset($request))
                {
                    if(isset($request->status))
                    {
                        switch ($request->status)
                        {

                            case "ongoing":
                            $builder->where('users.trainee_status',0);
                            break;

                            case "terminated":
                                $builder->where('users.trainee_status',2);
                            break;

                            case "confirmed":
                                $builder->where('users.trainee_status',1);
                            break;

                            case "voluntary_exit":
                                $builder->where('users.trainee_status',3);
                            break;

                        }
                    }


                    if(isset($request->staff_type))
                    {
                        switch ($request->staff_type)
                        {

                            case "ET":
                            $builder->where('users.staff_type_id',1);
                            break;

                            case "MT":
                                $builder->where('users.staff_type_id',2);
                            break;

                            case "Others":
                                $builder->where('users.staff_type_id',3);
                            break;

                        }
                        
                    }
                }

                $users = $builder->get();

                return view('trainee_management.trainee_schedule', compact('request','users','user_category','sel_id'));

            }
            else{
             return view('errors.403');
            }



    }


    public function trainee_schedule_details($staff_id)
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-view-trainee-log-details'))) 
        {
        
                $staff_id = base64_decode($staff_id);
                $builder = trainee_schedule::query();

                $builder->selectRaw("perment_office_locations.perment_office_location_name, trainee_schedule.sap,  CONCAT(users.name,' ',users.first_name) as staff_name, departments.name as department_name, staff_type.staff_type_name, users.user_category_id, users.email, start_date, end_date")
                ->where('trainee_schedule.sap', $staff_id)
                ->join('users','users.sap','trainee_schedule.sap')
                ->leftjoin('staff_type','staff_type.staff_type_id', 'users.staff_type_id')
                ->join('departments', 'departments.id','trainee_schedule.department_id')
                ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
                ->orderBy('start_date','asc');

                $users = $builder->get();

                return view('trainee_management.trainee_schedule_details',compact('users'));

        }
        else{
        return view('errors.403');
        }
    }


    public function my_rotation($sap)
    {
        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-view-rotation'))) 
        {

                    $sap = base64_decode($sap);

                    $builder = trainee_schedule::query();

                    $builder->selectRaw(" trainee_schedule.schedule_id, trainee_departmental_report.report_url ,perment_office_locations.perment_office_location_name, trainee_schedule.sap,  CONCAT(users.name,' ',users.first_name) as staff_name, departments.name as department_name, staff_type.staff_type_name, users.user_category_id, users.email, start_date, end_date")
                    ->where('trainee_schedule.sap', $sap)
                    ->leftjoin('users','users.sap','trainee_schedule.sap')
                    ->leftjoin('staff_type','staff_type.staff_type_id', 'users.staff_type_id')
                    ->leftjoin('departments', 'departments.id','trainee_schedule.department_id')
                    ->leftjoin('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
                    ->leftjoin('trainee_departmental_report','trainee_departmental_report.schedule_id','trainee_schedule.schedule_id')
                   // ->leftjoin('trainee_log','trainee_log.schedule_id','trainee_schedule.schedule_id')
                    ->orderBy('start_date','asc');
/*
                    $builder->selectRaw("perment_office_locations.perment_office_location_name, trainee_schedule.sap,  CONCAT(users.name,' ',users.first_name) as staff_name, departments.name as department_name, staff_type.staff_type_name, users.user_category_id, users.email, start_date, end_date")
                    ->where('trainee_schedule.sap', $sap)
                    ->join('users','users.sap','trainee_schedule.sap')
                    ->leftjoin('staff_type','staff_type.staff_type_id', 'users.staff_type_id')
                    ->join('departments', 'departments.id','trainee_schedule.department_id')
                    ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
                    ->orderBy('start_date','asc');
*/
                    $users = $builder->get();

                    return view('trainee_management.my_rotation',compact('users'));
        }
        else{
             return view('errors.403');
        }

    }

    public function uploaded_departmental_report()
    {
        
        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-upload-deparmental-report'))) 
        {


                $builder = trainee_departmental_report::query();

                $builder->selectRaw("trainee_schedule.start_date, trainee_schedule.end_date, 
                trainee_departmental_report.schedule_id, trainee_departmental_report.report_url, 
                perment_office_locations.perment_office_location_name,trainee_departmental_report.status, trainee_departmental_report.sap, 
                trainee_departmental_report.created_at, 
                departments.name as department_name, CONCAT(users.name,' ',users.first_name) as staff_name")
                ->join('trainee_schedule','trainee_schedule.schedule_id','trainee_departmental_report.schedule_id')
                ->join('users','users.sap','trainee_schedule.sap')
                ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
                ->join('departments', 'departments.id','trainee_schedule.department_id')
                ->where('trainee_departmental_report.sap',Auth::user()->sap);

                $report_lists = $builder->get();

                
                return view('trainee_management.upload_department_report',compact('report_lists'));


        }
        else{
         return view('errors.403');
        }


    }


    public function uploaded_trainee_log()
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-view-trainee-log-details'))) 
        {

            $builder = trainee_log::query();

            $builder->selectRaw(" trainee_schedule.start_date, trainee_schedule.end_date,
            CONCAT(users.first_name,' ',users.name) as staff_name, trainee_log.sap, trainee_log.created_at,  departments.name as department_name,  
            trainee_log.schedule_id, trainee_log.status, perment_office_locations.perment_office_location_name")
            ->join('trainee_schedule','trainee_schedule.schedule_id','trainee_log.schedule_id')
            ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
            ->join('departments', 'departments.id','trainee_schedule.department_id')
            ->join('users','users.sap','trainee_schedule.sap')
            ->where('trainee_log.sap', Auth::user()->sap)
            ->groupBy('trainee_schedule.start_date')
            ->groupBy('trainee_schedule.end_date')
            ->groupBy('users.name')
            ->groupBy('users.first_name')
            ->groupBy('trainee_log.sap')
            ->groupBy('trainee_log.status')
            ->groupBy('perment_office_locations.perment_office_location_name')
            ->groupBy('departments.name')
            ->groupBy('trainee_log.schedule_id')
            ->groupBy('trainee_log.created_at');

            $report_lists = $builder->get();

            return view('trainee_management.upload_trainee_log',compact('report_lists'));
        }
        else{
         return view('errors.403');
        }



    }

    public function approve_trainee_log(Request $request )
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-approve-trainee-log'))) 
        {
                $builder = trainee_log::query();

                $builder->selectRaw(" trainee_schedule.start_date, trainee_schedule.end_date,
                CONCAT(users.first_name,' ',users.name) as staff_name, trainee_log.sap, trainee_log.created_at,  departments.name as department_name,  
                trainee_log.schedule_id, trainee_log.status, perment_office_locations.perment_office_location_name")
                ->join('trainee_schedule','trainee_schedule.schedule_id','trainee_log.schedule_id')
                ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
                ->join('departments', 'departments.id','trainee_schedule.department_id')
                ->join('users','users.sap','trainee_schedule.sap')
                ->where('trainee_log.sap', Auth::user()->sap)
                ->groupBy('trainee_schedule.start_date')
                ->groupBy('trainee_schedule.end_date')
                ->groupBy('users.name')
                ->groupBy('users.first_name')
                ->groupBy('trainee_log.sap')
                ->groupBy('trainee_log.status')
                ->groupBy('perment_office_locations.perment_office_location_name')
                ->groupBy('departments.name')
                ->groupBy('trainee_log.schedule_id')
                ->groupBy('trainee_log.created_at');

                if(isset($request->filter))
                {
                    switch($request->filter)
                    {
                        case 'approved':
                            $builder->where('trainee_log.status',1);
                        break;
                        case 'pending': 
                            $builder->where('trainee_log.status',0);
                        break;
                        case 'rejected':
                            $builder->where('trainee_log.status',2);
                        break;
                    }

                }else
                {
                    $builder->where('trainee_log.status',0);
                }

                $report_lists = $builder->get();

                return view('trainee_management.approve_trainee_log',compact('report_lists','request'));

        }
        else{
              return view('errors.403');
        }





        
    }

    public function process_departmental_report(Request $request)
    {

        
        $rules = [
            "schedule_id" =>"required",
            "button_click" => "required",
            "note" => 'required'
        ];


        $this->validate($request,$rules);

        
        

            $schedule_id = base64_decode($request->schedule_id);
            $action = base64_decode($request->button_click);

             //check if a document has been uploaded 
             $check = trainee_departmental_report::where('schedule_id',$schedule_id)->first();
             //$file_ext =  $request->report_file->getClientOriginalExtension();
            
             if (isset($check->schedule_id))
             {
                 if ($check->status == 0) //pending or rejected
                 {
                    $update = trainee_departmental_report::where('schedule_id',$schedule_id)->update(["status" => $action, "comment"=> $request->note]);
                    return redirect('/approve_departmental_report')->with('success','Departmental report has been approved');
                 }else
                 {
                    return redirect('/approve_departmental_report')->with('error','This record has been processed');
                 }

             }else
             {
                return redirect('/approve_departmental_report')->with('error','No record found');
             }
    }

    public function approve_departmental_report(Request $request)
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-approve-departmental-report'))) 
        {
        
        $builder = trainee_departmental_report::query();
        $builder->selectRaw("trainee_schedule.start_date, trainee_schedule.end_date, 
        trainee_departmental_report.schedule_id, trainee_departmental_report.report_url, 
        perment_office_locations.perment_office_location_name, trainee_departmental_report.status, trainee_departmental_report.sap, 
        trainee_departmental_report.created_at, 
        departments.name as department_name, CONCAT(users.name,' ',users.first_name) as staff_name")
        ->join('trainee_schedule','trainee_schedule.schedule_id','trainee_departmental_report.schedule_id')
        ->join('users','users.sap','trainee_schedule.sap')
        ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
        ->join('departments', 'departments.id','trainee_schedule.department_id');
        
        if(isset($request->filter))
        {
            switch($request->filter)
            {
                case 'approved':
                    $builder->where('trainee_departmental_report.status',1);
                break;
                case 'pending': 
                     $builder->where('trainee_departmental_report.status',0);
                break;
                case 'rejected':
                     $builder->where('trainee_departmental_report.status',2);
                break;
            }

        }else
        {
            $builder->where('trainee_departmental_report.status',0);
        }
        $report_lists = $builder->get();
        return view('trainee_management.approve_department_report',compact('report_lists','request'));

    }
    else{
        return view('errors.403');
    }



    }

    public function upload_new_trainee_log($schedule_id)
    {
        $schedule_id = base64_decode($schedule_id);

        $rotation_details = trainee_schedule::where('schedule_id',$schedule_id)
        ->join('departments','departments.id','trainee_schedule.department_id')
        ->first();

        
        return view('trainee_management.new_trainee_log',compact('schedule_id','rotation_details'));
    }

    public function ld_edit_user($user_id)
    {
       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;

       
       if (($user->can('can-search-user-list'))) 
       {
         $roles = Role::all()->whereIn('display_name',array('MT','ET'))->pluck('display_name','id');
         $role_user = Role_user::where('user_id', $user_id)->first();
        $departments=Department::orderBy('name')->pluck('name','id');
        $Staff_categories=Staff_category::orderBy('staff_category_name')->pluck('staff_category_name','staff_category_id');
        $perment_office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');
        $business_units=Business_unit::orderBy('bu_name')->pluck('bu_name','bu_id');
        
        $user_details =user::where('id', $user_id)->first();
        
        $accomodation_statu = Accomodation_status::orderBy('accomodation_status')->pluck('accomodation_status','accomodation_status_id');
        $state = State::orderBy('state')->pluck('state','state_id');
        $lga = Lga::orderBy('lga')->pluck('lga','lga_id');
        $country = Country::orderBy('country')->pluck('country','country_id');
        $qualification = Qualification::orderBy('qualification')->pluck('qualification','qualification_id');
        

        $get_user_details = User::where('id', $user_id)->first();
       // $get_user_id = $get_user_details->id;
        //$get_user_name = $get_user_details->name;
        $get_user_department = $get_user_details->department_id;

        $get_hod_for_the_user = vw_user_roleuser_role::where('department_id', $get_user_department)->where('role_id', '=', 4)->pluck('name','user_id');

        
        //dd($user_details->cerpac_no);
         
          // dd($user_details->department_id);
         return view('trainee_management.ld_edit_user_NEW', compact('user_details', 'roles', 'role_user', 'departments', 'perment_office_locations', 'Staff_categories', 'business_units','accomodation_statu','state','lga','country','qualification','get_hod_for_the_user'));
        }
       else{
         return view('errors.403', compact('profile_info'));
        }
    }

    public function user_search_list($user_category, Request $request)
    {



        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id;
        $user_category = $user_category;
        $pagination_btn = 0;
        if ($user_category == "all")
             $user_category="";
           
       if ($user->can('can-search-user-list'))
       {   
 
           $department =   isset($request->department)?$request->department:"";
           $search_by = isset($request->search_by)?$request->search_by:"sap";
           $search = isset($request->search)?$request->search:"";
     
           
           $users = "";
           $department_collections =  Department::get();
 
                 if($user_category == "non"){
                 return view('users.manage_users', compact('pagination_btn','users', 'user_category','department_collections','department','search_by','search'));
                 }
                 else {
 
                   $user_category_info = vw_user_details::where('staff_category_id' ,'LIKE', "%".$user_category."%")->orderBy('department_name', 'ASC')->orderBy('name', 'ASC')->first();
               
 
 
 
                   $per_page = 200;
 
                   if (isset($request->page))
                   {
                       if ($request->page < 0)
                           $request->page = 1;
                   }else
                   {
                       $request->page = 1;
                   }


                  // dd(isset($request->department));

                  $countBuilder = vw_user_details::query();

                  $countBuilder->where($search_by,"LIKE","%".$search."%")->orderBy('department_name', 'ASC')
                  ->orderBy('name', 'ASC');

                  if ($user_category != "")
                  {
                     $countBuilder->where('staff_category_id' ,'=', $user_category);
                  }

                  if (isset($request->department))
                  {
                    $countBuilder->where('department_id',$request->department);
                  }

                  $transaction_count = $countBuilder->count();

                   
                   $pagination_btn = ceil($transaction_count/$per_page);
                   $skip =  $transaction_count - ($request->page * $per_page);
                   $take = $per_page;
 
                   if ($request->page < 2)
                   {
                     $sn_start = 0;
                   }else 
                   {
                     $sn_start = ($per_page * $request->page) - $per_page;
                   }
 
                  
                 //  if($sn_start > $transaction_count)
                    //   $sn_start = $transaction_count - $per_page;
 
                   if($sn_start < 1)
                       $sn_start = 0;
 
                 
 
                   $queryBuilder = vw_user_details::query();
                     
                   if($user_category !="") 
                   { 
                     $queryBuilder->where('staff_category_id' ,'LIKE', "%".$user_category."%");
                   }
 
                   $new_dept = isset($request->department)?$request->department:"";
                   
                   if ($new_dept !="")
                   {
                     $queryBuilder->where('department_id', '=', $new_dept);
                   }
 
                   $queryBuilder->where($search_by,"LIKE","%".$search."%")
                   ->orderBy('name', 'ASC')
                   ->skip($skip)->take($take);
 
                   $users = $queryBuilder->get();
                         
                        
 
                   $btn = array();
 
                   $counter = 0;
 
                   $btn_start  = (int)$request->page;
 
                   $btn_start = ceil($request->page /3);
                 
                 
 
                   for($i = $btn_start; $i < $pagination_btn + 1; $i++)
                   {
                     
                       $counter += 1;
                       $active = $i==$request->page?'active':'';
                       $url =  url('/home?page='.$i.'');
                       $btn[$i] =  '<li class="page-item '.$active.'"><a class="page-link brd-rd2" href="'.$url.'"itemprop="url">'.$i.'</a></li>';
                     
                       if($counter > 10)
                       break;
                     
                   }
                   
                   $page_no = $request->page;
 
                 
                   return view('trainee_management.user_search_list', compact('pagination_btn','transaction_count','user_category_info','department_collections','sn_start','btn','users', 'user_category','search','department','search_by'));
                 }
 
                 
 
       }
        else{
           return view('errors.403');
         }
        /*if($type == "et")
        {
            return view('trainee_management.new_schedule_et');
        }else
        {
            return view('trainee_management.new_schedule');
        }*/
        
    }

    public function ld_register_user()
    {

       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;

     if ($user->can('can-create-new-trainee'))
     {

        $roles = Role::all()->whereIn('display_name', array('MT','ET'))->pluck('display_name','id');
        $departments=Department::orderBy('name')->pluck('name','id');
        $accomodation_statu = Accomodation_status::orderBy('accomodation_status')->pluck('accomodation_status','accomodation_status_id');
        $state = State::orderBy('state')->pluck('state','state_id');
        $lga = Lga::orderBy('lga')->pluck('lga','lga_id');
        $country = Country::orderBy('country')->pluck('country','country_id');
        $qualification = Qualification::orderBy('qualification')->pluck('qualification','qualification_id');
        $Staff_categories=Staff_category::orderBy('staff_category_name')->pluck('staff_category_name','staff_category_id');
        $perment_office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');

         return view('trainee_management.ld_register_user', compact('departments', 'roles', 'perment_office_locations', 'Staff_categories', 'accomodation_statu','state','lga','country','qualification'));
      }
       else{
         return view('errors.403');
        }
    }

    public function store_new_schedule(Request $request)
    {
       //dd($request);

       $rules = [
           "schedule_file" => "required",
           "sap" => "required"
       ];

       $this->validate($request, $rules);
       
        if ($request->hasFile('schedule_file')) {

            
            $my_sentinel = 0;
            $file = $_FILES["schedule_file"]["tmp_name"];
            $file_open = fopen($file, "r");

            
            $date = date('Y-m-d h:i:s');
            $sap = $request->sap;
            
            $insert = array();

            while (($line = fgetcsv($file_open, 10000, ",")) !== false) {
                if ($my_sentinel != 0) {
                    //skip first excel title row
                    $location_code = trim($line[0]);
                    $department_code = trim($line[1]);
                    $start_date = trim($line[2]);
                    $end_date = trim($line[3]);

                    $insert [] = [
                        'sap' => $sap,
                        'start_date' => $start_date,
                        'end_date' => $end_date,
                        'department_id' => $department_code,
                        'perment_office_location_id' => $location_code,
                        'created_by_sap' => Auth::user()->sap,
                        'created_at' => NOW()
                    ];




   

                   
                    /*
                    if($question!="" && $answer!="" && $option1!="" && $option2!="" && $option3!="" && $option4!="")
                    {
                        //Check if the question doesnt't exist
                        $question_collection = DB::table('tbl_questions')
                            ->where('question',$question)
                            ->where('category_type',$category_type)
                            ->get();

                        if($question_collection->isEmpty()) {
                            $question_model = new Questions;
                            $question_model->category_type = $category_type;
                           
                            $question_model->answer = $answer;
                            $question_model->answer = $answer;
                            $question_model->question = $question;
                            $question_model->option_1 = $option1;
                            $question_model->option_2 = $option2;
                            $question_model->option_3 = $option3;
                            $question_model->option_4 = $option4;
                            $question_model->created_date = $date;
                            $question_model->posted_by = Auth::user()->id;
                            $question_model->save();
                            $succeeded[] = "success";
                        }else{
                            $duplicates[]=$question;
                        }
                    }
                    else{
                        $errors[]="new";
                    }*/
                }

                
                $my_sentinel++;
            }

           
            $result = trainee_schedule::insert($insert);
            return redirect('/trainee_schedule/none')->with('success','Trainee Schedule has been created');
        }
    }

    public function new_schedule($sap)
    {
        $sap = base64_decode($sap);
        $check = DB::table('users')->where('sap', $sap)->first();
        $display_form = "yes";
        if(isset($check->sap))
        {

            //check if a schedule has been created for this staff
            $check_schedule =  DB::table('trainee_schedule')->where('sap', $sap)->get();

            if(count($check_schedule) > 0) //trainee schedule has been created
            {
                   $display_form = 'Schedule for <strong>'.$check->name." ".$check->first_name.'</strong> has already been created, <a href="'.url("/trainee_schedule_details/".base64_encode($sap)).'">Here</a> to view';
            }else
            {
                
            }

        }else{ //user is not found

            $display_form = 'This staff is not a valid, kindly contact the admin'; 
        }

        return view('trainee_management.new_schedule',compact('display_form','check'));
    }

    public function edit_schedule($sap)
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-create-schedule'))) 
        {


            $sap = base64_decode($sap);

            $staff_details = DB::table('users')->where('sap', $sap)->first();
            
            //check if schedule exist using the SAP 
            $schedule_check = trainee_schedule::where('sap', $sap)->get()->count();
            $users =  NULL;
            $locations = DB::table('perment_office_locations')->get();
            $departments = DB::table('departments')->get();

            if($schedule_check > 0)
            {
                $builder = trainee_schedule::query();

                $builder->selectRaw("trainee_schedule.schedule_id, perment_office_locations.perment_office_location_name, trainee_schedule.sap,  CONCAT(users.name,' ',users.first_name) as staff_name, departments.name as department_name, staff_type.staff_type_name, users.user_category_id, users.email, start_date, end_date")
                ->where('trainee_schedule.sap', $sap)
                
                ->join('users','users.sap','trainee_schedule.sap')
                ->leftjoin('staff_type','staff_type.staff_type_id', 'users.staff_type_id')
                ->join('departments', 'departments.id','trainee_schedule.department_id')
                ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
                ->orderBy('start_date','asc');

                $users = $builder->get();


                


                return view('trainee_management.trainee_schedule_edit', compact('users','departments','locations','sap','staff_details'));
                
            }else
            {
                return view('trainee_management.trainee_schedule_edit', compact('users','departments','locations','sap','staff_details'));
            }


        }
        else{
         return view('errors.403');
        }   





      
    }

    public function add_new_single_schedule(Request $request)
    {
        
        $rules = [

            'department' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'sap' => 'required'
        ];

        $this->validate($request, $rules);
        $sap =  base64_decode($request->sap);
        
        //check if a is schedule is found for the selected date
        $check = trainee_schedule::where('sap', $sap)
        ->where('end_date','>=', $request->start_date)
        ->count();
        
       if( $check > 0) //there is a current schedule on the selected start date
       {
           return redirect('/edit_schedule/'.base64_encode($sap))->with('error_adding','Kindly choose a start date that is above the last schedule end date of this staff rotation ');
      
        }else
       {
          $insert = [
              'sap' => $sap,
              'start_date' => $request->start_date,
              'end_date' => $request->end_date,
              'department_id' => $request->department,
              'perment_office_location_id' => $request->location,
              'created_by_sap' => Auth::user()->sap,
              'created_at' => NOW()
          ];

          
          trainee_schedule::insert($insert);

          return redirect('/edit_schedule/'.base64_encode($sap))->with('success','Schedule created successfully');

       }


    }

    public function delete_selected_schedule(Request $request)
    {
        $rules = [

            'sap' => 'required',
            'schedule_id' => 'required|array'
        ];

        
        $this->validate($request, $rules);
        
        $sap = base64_decode($request->sap);

        $schedule_arr = array();

        foreach($request->schedule_id as $val)
        {
            $schedule_arr[] = base64_decode($val);
        }
         
        try{

            $result = trainee_schedule::where('sap', $sap)->whereIn('schedule_id',$schedule_arr)->delete();

        }catch(\Illuminate\Database\QueryException $ex)
        {
           return redirect('/edit_schedule/'.$request->sap)->with('error','Document uploads are avaiable in the selected schedule, kindly unselect those schedules and try again');
        }

        return redirect('/edit_schedule/'.$request->sap)->with('success','Schedule has been deleted successfully');


    }

    public function trainee_log_details($log_id)
    {
        $log_id =  base64_decode($log_id);

        $builder = trainee_log::query();

        $builder->selectRaw(" trainee_schedule.start_date, trainee_schedule.end_date, trainee_log.work_done, trainee_log.hod_comment,
         CONCAT(users.first_name,' ',users.name) as staff_name, trainee_log.sap, trainee_log.created_at,  departments.name as department_name,  
         trainee_log.schedule_id, trainee_log.status, perment_office_locations.perment_office_location_name")
        ->join('trainee_schedule','trainee_schedule.schedule_id','trainee_log.schedule_id')
        ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
        ->join('departments', 'departments.id','trainee_schedule.department_id')
        ->join('users','users.sap','trainee_schedule.sap')
       // ->where('trainee_log.status', '!=', 1)
        ->where('trainee_log.sap', Auth::user()->sap)
        ->where('trainee_log.schedule_id',$log_id);

        $report_lists = $builder->get();

        
       

        return view('trainee_management.trainee_log_details',compact('report_lists'));
    }

    public function process_trainee_log(Request $request)
    {
        

         $rules = [
             'button_click' => 'required',
             'schedule_id'  => 'required',
             'note'         => 'required'
         ];

         $this->validate($request, $rules);

       

         $schedule_id = base64_decode($request->schedule_id);
         $action = base64_decode($request->button_click);

          //check if a document has been uploaded 
          $check = DB::table('trainee_log')->where('schedule_id',$schedule_id)->first();
          //$file_ext =  $request->report_file->getClientOriginalExtension();
         
          if (isset($check->schedule_id))
          {
              if ($check->status == 0) //pending or rejected
              {

                 $update = DB::table('trainee_log')->where('schedule_id',$schedule_id)
                 ->update(["status" => $action, "hod_comment"=> $request->note]);
                 
                 return redirect('/approve_trainee_log')->with('success','Trainee Log has been approved');
              }else
              {
                 return redirect('/approve_trainee_log')->with('error','This record has been processed');
              }

          }else
          {
             return redirect('/approve_trainee_log')->with('error','No record found');
          }

    }

    public function departmental_report_details($report_id)
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-view-department-report-details'))) 
        {
            $report_id = base64_decode($report_id);
            $builder =  trainee_departmental_report::query();

            $builder->selectRaw("trainee_schedule.start_date, trainee_schedule.end_date, trainee_departmental_report.comment, trainee_departmental_report.status,
            trainee_departmental_report.schedule_id, trainee_departmental_report.report_url, 
            perment_office_locations.perment_office_location_name,trainee_departmental_report.status, trainee_departmental_report.sap, 
            trainee_departmental_report.created_at, 
            departments.name as department_name, CONCAT(users.name,' ',users.first_name) as staff_name")
            ->join('trainee_schedule','trainee_schedule.schedule_id','trainee_departmental_report.schedule_id')
            ->join('users','users.sap','trainee_schedule.sap')
            ->join('perment_office_locations','perment_office_locations.perment_office_location_id','trainee_schedule.perment_office_location_id')
            ->join('departments', 'departments.id','trainee_schedule.department_id')
            ->where('trainee_departmental_report.schedule_id',$report_id);
            
            $report_details = $builder->first();

            return view('trainee_management.departmental_report_details',compact('report_details'));

        }
        else{
           return view('errors.403');
        }


    }

    public function get_rotation_table(Request $request)
    {
        $count_rotation = $request->rotation;
        return view('trainee_management.rotation_table',compact('count_rotation'));
    }

    public function upload_new_report($schedule_id)
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-upload-trainee-log'))) 
        {

            $schedule_id = base64_decode($schedule_id);

            $rotation_details = trainee_schedule::where('schedule_id',$schedule_id)
            ->join('departments','departments.id','trainee_schedule.department_id')
            ->first();
            
            return view('trainee_management.new_department_report',compact('rotation_details','schedule_id'));

        }
        else{
        return view('errors.403');
        }


    }

    public function store_trainee_log(Request $request)
    {
        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-upload-trainee-log'))) 
        {


                        $rules =
                        [
                            'id'=>'required',
                            'work_done' => 'required|array',
                            
                        ];
                        //check validation options
                        $this->validate($request,$rules);
                        $work_done = $request->work_done;
                        $schedule_id = base64_decode($request->id);

                        $check = trainee_schedule::where('schedule_id',$schedule_id)->first();

                        if (isset($check->schedule_id))
                        {

                                $check = trainee_log::where('schedule_id',$schedule_id)->first();

                                if (isset($check->schedule_id))
                                    {
                                        if ($check->status == 2) // rejected
                                        {
                                            

                                        }else
                                        {
                                            return redirect('my_rotation/'.base64_encode(Auth::user()->sap))->with('error',"Modification can not been made at the moment");
                                        }
                                    }else
                                    {
                                        $insert = array();
                                        $counter = 1;
                                        foreach($work_done as $work)
                                        {
                                            $insert[] = [
                                            'schedule_id' => $schedule_id,
                                            'work_done' => $work,
                                            'created_at' => NOW(),
                                            'week' => $counter,
                                            'sap' => Auth::user()->sap
                                            ];
                                            $counter = $counter + 1;
                                        }

                                    $trainee_log = trainee_log::insert($insert);
                                    return redirect('my_rotation/'.base64_encode(Auth::user()->sap))->with('success',"Your log has been submitted");

                                    }
                        }else
                        {
                            return redirect('my_rotation/'.base64_encode(Auth::user()->sap))->with('error',"Invalid rotation selected");
                        }

                    }
                    else{
                    return view('errors.403');
                    }

    }

    public function store_departmental_report(Request $request)
    {

        $user = \Auth::user(); //note the user that logs in
       
        if (($user->can('can-upload-deparmental-report'))) 
        {

             $rules =
             [
                'id'=>'required',
                "report_file" => "required|mimetypes:application/pdf|max:10000"
             ];

           //check validation options
           $this->validate($request,$rules);
           $file_ext = "";

           $schedule_id = base64_decode($request->id);
            
            //check if the record exist
            $check = trainee_schedule::where('schedule_id',$schedule_id)->first();

            if (isset($check->schedule_id))
            {

                //check if a document has been uploaded 
                $check = trainee_departmental_report::where('schedule_id',$schedule_id)->first();
                //$file_ext =  $request->report_file->getClientOriginalExtension();
               
                if (isset($check->schedule_id))
                {
                    if ($check->status == 0 || $check->status == 2) //pending or rejected
                    {
                            if (file_exists('trainee_departmental_report/'.$check->report_url))
                                   unlink('trainee_departmental_report/'.$check->report_url);

                            $request->report_file->move("trainee_departmental_report", $schedule_id."_".Auth::user()->sap.".pdf");
                            return redirect('my_rotation/'.base64_encode(Auth::user()->sap))->with('success',"Your report has been uploaded successfully and awaiting approval from Learning and Developement department");
                    }else
                    {
                            return redirect('my_rotation/'.base64_encode(Auth::user()->sap))->with('error',"Modification can not be made to this report because it has been approved");
                    }  
                }else //create a new record
                {
                    $insert =  new trainee_departmental_report();

                    $insert->schedule_id = $schedule_id;
                    $insert->sap = Auth::user()->sap;
                    $insert->created_at = NOW();
                    $insert->status = 0;
                    $insert->report_url = $schedule_id."_".Auth::user()->sap.".pdf";
                    $insert->save();

                    $request->report_file->move("trainee_departmental_report", $schedule_id."_".Auth::user()->sap.".pdf");

                    return redirect('my_rotation/'.base64_encode(Auth::user()->sap))->with('success',"Your report has been uploaded successfully and awaiting approval from Learning and Developement department");
                }
                
            }else
            {
                    return redirect('my_rotation/'.base64_encode(Auth::user()->sap))->with('error',"Invalid rotation selected");
            }


        }
        else{
         return view('errors.403');
        }
        
    }


    public function ld_view_user_details($user_id)
    {
       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
       $department_id = Auth::user()->department_id; //get the id of the department that loggedin
       $profile_info = "";

       $get_user_info =user::where('id', $user_id)->first(); //get the info about the user whose id was sent
       $get_user_department = $get_user_info->department_id; //get the id of the user whose id was sent
      

        if (($user->can('can-view-user-search-details')) ) {

         $user_details =vw_user_details::where('id', $user_id)->first();
        // do some checks here
        if (($user->can('can-view-user-search-details'))) { $permit_check = 1; }
        else{ $permit_check = 0; }

        return view('trainee_management.ld_view_user_details', compact('user_details', 'profile_info', 'permit_check'));

      }
       else{
         return view('errors.403', compact('profile_info'));
        }
    } 

    public function training_list()
    {
        return view('trainee_management.training_list');
    }

    public function new_training()
    {
        return view('trainee_management.new_training');
    }


    public function training_list_details($training_id)
    {
         return view('trainee_management.training_details');
    }

    public function new_yearly_training()
    {
        return view('trainee_management.new_yearly_training');
    }


    public function invite_et_mt($training_id, Request $request)
    {
        $user_category = "none";
        $builder = vw_user_details::query();

    
        $builder->where('department_id','12')->take(5);



        $users = $builder->get();
        //dd($users);
        return view('trainee_management.invite_for_training',compact('user_category','users'));
    }
    


}
