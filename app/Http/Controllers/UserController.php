<?php 

namespace App\Http\Controllers;
use Mail;
use App\User;
use App\Role;
use App\Permission;
use App\Role_user;
use App\Permission_role;
use DB;
use Auth;
use Alert;
use Session;
use Storage;
use Hash;
use App\Filetable;
use Redirect;
use Illuminate\Support\Facades\Input;
use Validator;
use App\vw_user_role_company;
use App\vw_user_profile_image;
use App\company;
use App\vw_user_roleuser_role;
use App\Address;
use App\Company_address;
use App\company_rep;
use Carbon\Carbon;
use App\vw_person_company;
use App\Fileupload;
use App\vw_file_user_company_details;
use App\Profile_image;
use App\Department;
use App\Uploads;
use App\User_company;
use App\vw_user_details;
use App\perment_office_location;
use App\Staff_category;
use App\Business_unit;
use App\Accomodation_status;
use App\AccountEmailCreationHistory;
use App\State;
use App\Lga;
use App\Country;
use App\Qualification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use CountryState;

class UserController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth',['except'=>['first_time_register','store_first_time_user']]);
    }



///////////////////////////////6.ADMIN///////////////////////////////////////////
  public function manage_users($user_category, Request $request)
   {
       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;
       $user_category = $user_category;
       $pagination_btn = 0;
       if ($user_category == "all")
            $user_category="";
          
      if ($user->can('can-view-all-users'))
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

                
                  return view('users.manage_users', compact('pagination_btn','transaction_count','user_category_info','department_collections','sn_start','btn','users', 'user_category','search','department','search_by'));
                }

                

      }
       else{
          return view('errors.403');
        }
    }

    public function hr_manage_users($user_category, Request $request)
    {
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->sap;
 
           $user_category = $user_category;

           $sel_id = isset($request->filter)?$request->filter:"";
  
      if ($user->can('hr_business_partners'))
      {  
 
                 if($user_category == "non"){
                 return view('users.hr_manage_users', compact('users', 'user_category'));
                 }
 
                 else
                 {

                  //get the group ID which the HR manages
                  $hr_group_id = DB::table('group_hrbp_admin')->where('hr_sap', $user->sap)->pluck('group_id');
                  $hr_group_id = count($hr_group_id)>0?$hr_group_id:"";
                  //get all the staff ID under that group
                  $staff_sap_arr = DB::table('users')->where('mapped_to_groupid',$hr_group_id)->pluck('sap');
                    

                  $queryBuilder = vw_user_details::query();

                  
                  $queryBuilder->whereIn('sap' , $staff_sap_arr)->orderBy('department_name', 'ASC')->orderBy('name', 'ASC');
                  
                  if ($user_category !="all")
                  {
                    $queryBuilder->where('staff_category_id' ,'=', $user_category);
                  }

                  if ($sel_id !="")
                  {
                    $queryBuilder->where('department_id' ,'=', $sel_id);
                  }
                       

                  $users = $queryBuilder->get();

 
                 $dept_arr = vw_user_details::selectRaw('distinct(department_id), department_name')->whereIn('sap' , $staff_sap_arr)->pluck('department_name','department_id');
                
                 $queryBuilder = vw_user_details::query();
                 $queryBuilder->orderBy('department_name', 'ASC')->orderBy('name', 'ASC');
                  
                 if ($user_category !="all")
                     $queryBuilder->where('staff_category_id' ,'=', $user_category);

                 $user_category_info = $queryBuilder->first();
                
                  return view('users.hr_manage_users', compact('sel_id','dept_arr','users', 'user_category', 'user_category_info'));
                 }
                 
       }
        else{
           return view('errors.403');
         }
     }
 

public function map_users( Request $request)
{
        
      $user = Auth::user();
      
      if ($user->can('can-map-user-to-any-hrb-group') || $user->can('can-map-user-to-hrb-group'))
      {    
        $display_form = "yes";

        $group_id_obj = DB::table('group_hrbp_admin')->where('hr_sap', Auth::user()->sap)->first();
              
         if(!isset($group_id_obj->group_id) && !$user->can('can-map-user-to-any-hrb-group'))
         {
           $display_form = "A staff HR business partner group has not been created for you, Kindly contact I.T";
         }

        $hr_groups = DB::table('group_hrbp')->get();
        return view('users.new_map',compact('display_form','hr_groups'));

      } 
      else{
           return view('errors.403');
      }
}


    public function my_staff($user_category)
    {
      $users = "";
      $user = \Auth::user(); //note the user that logs in
      $loggedin_user_id = Auth::user()->id;
      //$department_id = Auth::user()->department_id;
      $user_category = $user_category;
      //dd(Auth::user()->sap);

      $department_arr = DB::table('group_hod')->where('hod_sap', Auth::user()->sap)->pluck('department_id');
      

    if ($user->can('can-view-staff'))
     {
               
                if($user_category == "non"){
                return view('users.my_staff', compact('users', 'user_category'));
                }

                elseif ($user_category == "all") {
                $users = vw_user_details::whereIn('department_id', $department_arr )->where('resigned',0)->join('role_user','role_user.user_id','vw_user_details.id')->where('role_user.role_id','!=',4)->orderBy('name', 'ASC')->get();
                 return view('users.my_staff', compact('users', 'user_category'));
                }

                else{
                $users = vw_user_details::whereIn('department_id', $department_arr )->where('resigned',0)->join('role_user','role_user.user_id','vw_user_details.id')->where('role_user.role_id','!=',4)->where('staff_category_id' ,'=', $user_category)->orderBy('name', 'ASC')->get();

                 $user_category_info = vw_user_details::where('staff_category_id' ,'=', $user_category)->orderBy('department_name', 'ASC')->orderBy('name', 'ASC')->first();
                return view('users.my_staff', compact('users', 'user_category', 'user_category_info'));
                }

    }
    else{
     return view('errors.403');
    }
}
  public function view_user_details($user_id)
    {
       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id; //get the id of the user that loggedin
       $department_id = Auth::user()->department_id; //get the id of the department that loggedin
       $profile_info = "";

       $get_user_info =user::where('id', $user_id)->first(); //get the info about the user whose id was sent
       $get_user_department = $get_user_info->department_id; //get the id of the user whose id was sent
      

        if (($user->can('can-view-all-users')) || ($loggedin_user_id==$user_id) || (($user->can('can-view-staff')) && ($department_id==$get_user_department))) {

         $user_details =vw_user_details::where('id', $user_id)->first();
        // do some checks here
        if (($user->can('can-view-all-users')) || ($loggedin_user_id==$user_id)) { $permit_check = 1; }
        else{ $permit_check = 0; }

        return view('users.view_user_details', compact('user_details', 'profile_info', 'permit_check'));

      }
       else{
         return view('errors.403', compact('profile_info'));
        }
    }    

  public function register_user()
    {

       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;

       if ($user->can('can-register-users'))
     {

        $roles = Role::all()->pluck('display_name','id');
        $departments=Department::orderBy('name')->pluck('name','id');
        $accomodation_statu = Accomodation_status::orderBy('accomodation_status')->pluck('accomodation_status','accomodation_status_id');
        $state = State::orderBy('state')->pluck('state','state_id');
        $lga = Lga::orderBy('lga')->pluck('lga','lga_id');
        $country = Country::orderBy('country')->pluck('country','country_id');
        $qualification = Qualification::orderBy('qualification')->pluck('qualification','qualification_id');
        $Staff_categories=Staff_category::orderBy('staff_category_name')->pluck('staff_category_name','staff_category_id');
        $perment_office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');

         return view('users.register_user', compact('departments', 'roles', 'perment_office_locations', 'Staff_categories', 'accomodation_statu','state','lga','country','qualification'));
      }
       else{
         return view('errors.403');
        }
    }

    public function first_time_register(Request $request)
    {
         
      
     // dd('am here');
     

        $departments=Department::orderBy('name')->pluck('name','id');
        $accomodation_statu = Accomodation_status::orderBy('accomodation_status')->pluck('accomodation_status','accomodation_status_id');
        $Staff_categories=Staff_category::orderBy('staff_category_name')->pluck('staff_category_name','staff_category_id');
        $perment_office_locations=perment_office_location::orderBy('perment_office_location_name')->pluck('perment_office_location_name','perment_office_location_id');
        $state = State::orderBy('state')->pluck('state','state_id');
        $lga = Lga::orderBy('lga')->pluck('lga','lga_id');
        $country = Country::orderBy('country')->pluck('country','country_id');
        $qualification = Qualification::orderBy('qualification')->pluck('qualification','qualification_id');
         
        return view('users.first_time_register', compact('departments', 'perment_office_locations', 'Staff_categories', 'accomodation_statu','state','lga','country','qualification'));
        //return redirect('view_user_details/'.$LastInsertId);
      //}
       //else{
         // return view('errors.403');
        //}
    }

    //submits first time user data to database
    public function store_first_time_user(Request $request){
      //   $user = \Auth::user(); //note the user that logs in
      
      // if ($user->can('can-register-users'))
      //  {

          // dd($request->all());
           $this->validate($request, [
              'name' => 'required',
              'personal_email_id'=>'required',
              'first_name'=>'required',
              'date_of_birth'=> 'required|date',
              'sap' => 'required|numeric|unique:users',
              'department_id' => 'required', 
              'staff_category_id'=> 'required',
             'pe_number'=> 'sometimes',
             'cerpac_no'=> 'sometimes',

             
              'email' => 'required|email|unique:users',   
              // 'role_id'=> 'required',
              'designation'=> 'required',
              'password' => 'required|min:6|confirmed',
              'years_of_experience_prior'=> 'required',
              'date_of_joining_in_refinery'=> 'required|date',
              'years_of_experience_prior'=>'required',
              'accommodation_status_id'=>'required',
              'state_id'=>'sometimes',
              'lga_id'=>'sometimes',
              'home_country_phone_no'=>'sometimes',
              'emergency_contact_no'=>'required',
              'home_town'=>'required',
              'phone'=>'required',
              'estate_name'=>'required',
              'qualification_id'=>'required',
              'qualification_year'=>'required',


        ]);
        $password = $request->password;
        
        

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->department_id = $request->department_id;
        $user->perment_office_location = $request->perment_office_location;
        $user->sap = $request->sap;
        $user->designation = $request->designation;
        $user->user_category_id = $request->staff_category_id;
        $user->password = bcrypt($password);

        $user->pe_number = $request->pe_number;
        $user->cerpac_no = $request->cerpac_no;
        
        $user->date_of_birth = $request->date_of_birth; 
        $user->date_of_joining_in_refinery = $request->date_of_joining_in_refinery; 
        $user->years_of_experience_prior = $request->years_of_experience_prior;

        $user->accommodation_status_id = $request->accommodation_status_id;
        $user->state_id = $request->state_id;
        $user->lga_id=$request->lga_id;
        $user->home_country_phone_no = $request->home_country_phone_no;
        $user->emergency_contact_no = $request->emergency_contact_no;
        $user->personal_email_id = $request->personal_email_id;
       
        $user->home_town = $request->home_town;
        $user->phone = $request->phone;
        $user->estate_name = $request->estate_name;
        $user->first_name = $request->first_name;
        $user->qualification_id = $request->qualification_id;
        $user->qualification_year = $request->qualification_year;
        
        $user->save();

        $LastInsertId = $user->id;

       $role_usernew = new role_user();
       $role_usernew->user_id = $LastInsertId;
       $role_usernew->role_id = 2;
      //  $request->role_id;
       $role_usernew->user_type = "App\User";
       $role_usernew->save(); 

       return View('auth/login')->with('status','successful');
      
    }

  public function store_user(Request $request)
    {
         
        $user = \Auth::user(); //note the user that logs in
      
      if ($user->can('can-register-users') || $user->can('can-create-new-trainee'))
        {

          
           $this->validate($request, [
              'name' => 'required',
              'personal_email_id'=>'sometimes',
              'first_name'=>'required',
             //* 'date_of_birth'=> 'required|date|date_format:Y-m-d',
              'sap' => 'required|numeric|unique:users',
              'department_id' => 'required', 
              'staff_category_id'=> 'required',
              
              'pe_number'=> 'sometimes',
              'cerpac_no'=> 'sometimes',

              //* 'email' => 'required|email|unique:users',   
              'role_id'=> 'required',
              'designation'=> 'required',
              'password' => 'required|min:6|confirmed',
              //*'years_of_experience_prior'=> 'required',
              //*'date_of_joining_in_refinery'=> 'required|date|date_format:Y-m-d',
              'years_of_experience_prior'=>'sometimes',
              'accommodation_status_id'=>'sometimes',
              'state_id'=>'sometimes',
              'lga_id'=>'sometimes',
              'home_country_phone_no'=>'sometimes',
              'emergency_contact_no'=>'sometimes',
              'home_town'=>'sometimes',
              'phone'=>'sometimes',
              'estate_name'=>'sometimes',
              'qualification_id'=>'sometimes',
              'qualification_year'=>'sometimes'
              


        ]);
        $password = $request->password;



       $role_name = DB::table('roles')->where('id',$request->role_id)->first()->name;

        
        

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->department_id = $request->department_id;
        $user->perment_office_location = $request->perment_office_location;
        $user->sap = $request->sap;
        $user->designation = $request->designation;
        $user->user_category_id = $request->staff_category_id;
        $user->password = bcrypt($password);

        $user->pe_number = $request->pe_number;
        $user->cerpac_no = $request->cerpac_no;

        switch($role_name)
        {
          case "MT":
            $user->staff_type_id = 2;
          break;
          case "ET":
            $user->staff_type_id = 1;
          break;
          default:
            $user->staff_type_id = 3;
          
        };

        $user->date_of_birth = $request->date_of_birth; 
        $user->date_of_joining_in_refinery = $request->date_of_joining_in_refinery; 
        $user->years_of_experience_prior = $request->years_of_experience_prior;

        $user->accommodation_status_id = $request->accommodation_status_id;
        $user->state_id = $request->state_id;
        $user->lga_id=$request->lga_id;
        $user->home_country_phone_no = $request->home_country_phone_no;
        $user->emergency_contact_no = $request->emergency_contact_no;
        $user->personal_email_id = $request->personal_email_id;
       
        $user->home_town = $request->home_town;
        $user->phone = $request->phone;
        $user->estate_name = $request->estate_name;
        $user->first_name = $request->first_name;
        $user->qualification_id = $request->qualification_id;
        $user->qualification_year = $request->qualification_year;

        $user->save();

        $LastInsertId = $user->id;

       $role_usernew = new role_user();
       $role_usernew->user_id = $LastInsertId;
       $role_usernew->role_id = $request->role_id;
       $role_usernew->user_type = "App\User";
       $role_usernew->save(); 

       Alert::success('Record Created Successfully')->autoclose(3000);

       $pos = strpos(url()->previous(), 'ld_register_user');//check if route is from Learning and Development profile

       // Note our use of ===.  Simply == would not work as expected
       
       if ($pos === false) {
            return redirect('view_user_details/'.$LastInsertId);
       } else {
            return redirect('ld_view_user_details/'.$LastInsertId);
       }

        
      }
       else{
          return view('errors.403');
        }
    }

  public function edit_user($user_id)
    {
       $user = \Auth::user(); //note the user that logs in
       $loggedin_user_id = Auth::user()->id;

       
        if (($user->can('can-edit-all-users')) || ($loggedin_user_id==$user_id)) 
       {
         $roles = Role::all()->pluck('display_name','id');
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
         return view('users.edit_user_NEW', compact('user_details', 'roles', 'role_user', 'departments', 'perment_office_locations', 'Staff_categories', 'business_units','accomodation_statu','state','lga','country','qualification','get_hod_for_the_user'));
        }
       else{
         return view('errors.403', compact('profile_info'));
        }
    }

   
  public function save_updated_user_record(Request $request, $user_id)
    {  
          $user = \Auth::user(); //note the user that logs in
           $loggedin_user_id = Auth::user()->id;
           
          if ($user->can('can-edit-all-users') || $user->can('can-edit-user-search-details'))
          {
            
            $this->validate($request, [
              'name' => 'required',
             // 'email' => 'required|email|unique:users,email,'.$user_id,
              'email' => 'required|email',
               'department_id' => 'required',   
              'role_id'=> 'required',
              'staff_category_id'=> 'required',
               'designation'=> 'required',
              'sap'=> 'required|unique:users,sap,'.$user_id,
               'personal_email_id'=>'sometimes',
              'first_name'=>'required',
              //*'date_of_birth'=> 'sometimes|date|date_format:Y-m-d',
              //'sap' => 'required|unique:users|numeric',
              'pe_number'=> 'sometimes',
              'cerpac_no'=> 'sometimes',
              //'email' => 'required|email|unique:users',   
              //'password' => 'required|min:6|confirmed',
               'years_of_experience_prior'=> 'sometimes',
             //*  'date_of_joining_in_refinery'=> 'required|date|date_format:Y-m-d',
              //'years_of_experience_prior'=>'required',
               'accommodation_status_id'=>'sometimes',
               'state_id'=>'sometimes',
               'lga_id'=>'sometimes',
               'home_country_phone_no'=>'sometimes',
               'emergency_contact_no'=>'sometimes',
               'home_town'=>'sometimes',
               'phone'=>'sometimes',
               'estate_name'=>'sometimes',
              'qualification_id'=>'sometimes',
               'qualification_year'=>'sometimes'
            ]);

        $user = User::findorfail($user_id); 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->department_id = $request->department_id;
        $user->perment_office_location = $request->perment_office_location;
        $user->sap = $request->sap;
        $user->designation = $request->designation;
        $user->user_category_id = $request->staff_category_id;
        $user->business_unit_id = $request->business_unit_id;
        $user->job_title = $request->job_title;
        $user->date_of_employment = $request->date_of_employment;
        $user->staff_grade_level = $request->staff_grade_level;
        $user->phone = $request->phone;
        $user->contact_address = $request->contact_address;





        $role_name = DB::table('roles')->where('id',$request->role_id)->first()->name;

        
        switch($role_name)
        {
          case "MT":
            $user->staff_type_id = 2;
          break;
          case "ET":
            $user->staff_type_id = 1;
          break;
          default:
            $user->staff_type_id = 3;
          
        };

        //--------new
       
        //$user->password = bcrypt($password);
        $user->pe_number = $request->pe_number;
        $user->cerpac_no = $request->cerpac_no;
        $user->date_of_birth = $request->date_of_birth; 
        $user->date_of_joining_in_refinery = $request->date_of_joining_in_refinery; 
        $user->years_of_experience_prior = $request->years_of_experience_prior;
        $user->accommodation_status_id = $request->accommodation_status_id;
        $user->state_id = $request->state_id;
        $user->lga_id=$request->lga_id;
        $user->home_country_phone_no = $request->home_country_phone_no;
        $user->emergency_contact_no = $request->emergency_contact_no;
        $user->personal_email_id = $request->personal_email_id;
        $user->home_town = $request->home_town;
        $user->phone = $request->phone;
        $user->estate_name = $request->estate_name;
        $user->first_name = $request->first_name;
        $user->qualification_id = $request->qualification_id;
        $user->qualification_year = $request->qualification_year;
        //---------end new 

        $user->save();

       $input = $request->all();
       $old_role_id = $request->old_role_id;
       $role_user=Role_user::where('user_id' ,'=', $user_id)->where('role_id','=', $old_role_id)->first();
       $role_user->delete();

       $role_usernew = new role_user();
       $role_usernew->user_id = $user_id;
       $role_usernew->role_id = $request->role_id;
       $role_usernew->user_type = "App\User";
       $role_usernew->save(); 

      Alert::success('Record Updated Successfully')->autoclose(3000);

      $pos = strpos(url()->previous(), 'ld_edit_user');//check if route is from Learning and Development profile

          // Note our use of ===.  Simply == would not work as expected
          
          if ($pos === false) {
               return redirect('view_user_details/'.$user_id);
          } else {
               return redirect('ld_view_user_details/'.$user_id);
          }
      
      } 
      elseif ($loggedin_user_id==$user_id)
          {

            $this->validate($request, [
              'name' => 'required', 
              'department_id' => 'required', 
             // 'email' => 'required|email|unique:users,email,'.$user_id, 
             'email' => 'required|email|',
              'staff_category_id'=> 'required',
              'designation'=> 'required',

              //delete this codes after Update Profile campaign
              //==============================================
              'name' => 'required',
              'email' => 'required|email|unique:users,email,'.$user_id,
              'department_id' => 'required',   
              //'role_id'=> 'required',
              'staff_category_id'=> 'required',
             // 'designation'=> 'required',
             // 'sap'=> 'required|unique:users,sap,'.$user_id,
             // 'personal_email_id'=>'required',
              'first_name'=>'required',
              //'date_of_birth'=> 'required|date',
              //'sap' => 'required|unique:users|numeric',
             // 'pe_number'=> 'sometimes',
              //'cerpac_no'=> 'sometimes',
              //'email' => 'required|email|unique:users',   
              //'password' => 'required|min:6|confirmed',
              //'years_of_experience_prior'=> 'required',
              //'date_of_joining_in_refinery'=> 'required|date',
              //'years_of_experience_prior'=>'required',
              //'accommodation_status_id'=>'required',
              //'state_id'=>'sometimes',
              //'lga_id'=>'sometimes',
              //'home_country_phone_no'=>'sometimes',
              //'emergency_contact_no'=>'required',
              //'home_town'=>'required',
              //'phone'=>'required',
              //'estate_name'=>'required',
              //'qualification_id'=>'required',
              //'qualification_year'=>'required'

              //==================END===========================
            ]);


            $user = User::findorfail($user_id);
            //delete this codes after Update Profile campaign
            //==============================================
            //$user = User::findorfail($user_id); 

            //dd($request->all());
            $user->name = $request->name;
            $user->email = $request->email;
            $user->department_id = $request->department_id;
            $user->perment_office_location = $request->perment_office_location;
           // $user->sap = $request->sap;
            $user->designation = $request->designation;
            $user->user_category_id = $request->staff_category_id;
            $user->business_unit_id = $request->business_unit_id;
            $user->job_title = $request->job_title;
            $user->date_of_employment = $request->date_of_employment;
            $user->staff_grade_level = $request->staff_grade_level;
            $user->phone = $request->phone;
            $user->contact_address = $request->contact_address;

            //--------new
          
            //$user->password = bcrypt($password);
            $user->pe_number = $request->pe_number;
            $user->cerpac_no = $request->cerpac_no;
            $user->date_of_birth = $request->date_of_birth; 
            $user->date_of_joining_in_refinery = $request->date_of_joining_in_refinery; 
            $user->years_of_experience_prior = $request->years_of_experience_prior;
            $user->accommodation_status_id = $request->accommodation_status_id;
            $user->state_id = $request->state_id;
            $user->lga_id=$request->lga_id;
            $user->home_country_phone_no = $request->home_country_phone_no;
            $user->emergency_contact_no = $request->emergency_contact_no;
            $user->personal_email_id = $request->personal_email_id;
            $user->home_town = $request->home_town;
            $user->phone = $request->phone;
            $user->estate_name = $request->estate_name;
            $user->first_name = $request->first_name;
            $user->qualification_id = $request->qualification_id;
            $user->qualification_year = $request->qualification_year;
            


            //==================END===========================

            $input = $request->all();
            $user->update($input); 

          Alert::success('Record Updated Successfully')->autoclose(3000);

          $pos = strpos(url()->previous(), 'ld_edit_user');//check if route is from Learning and Development profile

          // Note our use of ===.  Simply == would not work as expected
          
          if ($pos === false) {
               return redirect('view_user_details/'.$user_id);
          } else {
               return redirect('ld_view_user_details/'.$user_id);
          }


          
          }
          else{
            return view('errors.403', compact('profile_info'));
          }
}

public function save_user_mapping(Request $request){
  // dd($request->all());
  $this->validate($request, [
    'hr_user_id' => 'required|numeric',
    'staff_id.*' => 'required|numeric'
  ]);
  for($a=0; $a<count($request->staff_id);$a++){
        $user = User::findorfail($request->staff_id[$a]); 
        $user->mapped_to_userid = $request->hr_user_id;
        $user->save();
        

        
  }

  Alert::success('User mapping was Successful')->autoclose(3000);
  return redirect('map_users?hbp_id='.$request->hr_user_id.'&category='.$request->user_category."&dept=".$request->department_id); 
}

////////////////////////////10.USER PROFILE IMAGE///////////////////////////////
  public function update_user_profile_image($user_id)
    {  
        $loggedin_user_id = Auth::user()->id;
        $profile_info =Profile_image::where('user_id', $loggedin_user_id)->first();
        $profile_image =vw_user_profile_image::where('user_end_record','=', 0)->where('user_id', $user_id)->first();
        return view('users.update_user_profile_image', compact('profile_image', 'profile_info'));
    }


  public function save_updated_user_profile_image(Request $request, $user_id)
    {  
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; 
        $profile_info =Profile_image::where('user_id', $loggedin_user_id)->first();

        if(($user->hasRole('admin_role')) || ($loggedin_user_id==$user_id)) {

          $this->validate($request, [
             'filenam' => 'required|max:10000|mimes:jpeg,png,jpg,pdf'
          ]);

          //  Updating profile image

          $profile_image =Profile_image::where('user_id', $user_id)->first();

          $input = $request->all();

          $file= Input::file('filenam');
          $extension = Input::file('filenam')->getClientOriginalExtension();
         // $filename = rand(11111,99999).'.'.$extension; // renameing image
          $filename = $user_id.'.'.$extension; // renameing image
          $destinationPath = 'user_profile_image';//its refers proj/public/user_profile_image directry

          $input['photo']=$filename;
          $profile_image->update($input);

          $upload_success = $file->move($destinationPath, $filename);
          return back();
        }
        else{
          return view('errors.403', compact('profile_info'));
        }
  }


  public function remove_user_profile_image($user_id)
    {  
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; 
        $profile_info =Profile_image::where('user_id', $loggedin_user_id)->first();

        if(($user->hasRole('admin_role')) || ($loggedin_user_id==$user_id)) {

            $profile_image =Profile_image::where('user_id', $user_id)->first();
            $photo='userlogo.jpg';
            $profile_image->photo = ($photo);
            $profile_image->update();

            return back();
        }
        else{
            return view('errors.403', compact('profile_info'));
        }
    }

////////////////////////////11.LOGIN CREDENTIALS///////////////////////////////
  public function reset_credentials($user_id)
    {
       $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id;
        $profile_info = "";
        // $profile_info =Profile_image::where('user_id', $loggedin_user_id)->first(); 

    if (($user->can('can-reset-password')) || ($loggedin_user_id==$user_id)) {
      $user_details =User::where('id', $user_id)->first();

            return view('users.user_password_reset', compact('user_details', 'profile_info'));
        }
        else{
            return view('errors.403', compact('profile_info'));
        }
    }

  public function save_reset_credentials(Request $request, $user_id)
    {   
       $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id;
        // $profile_info =Profile_image::where('user_id', $loggedin_user_id)->first();   

          $request_data = $request->All();
           if($loggedin_user_id==$user_id) {
            $this->validate($request, [
            'current-password' => 'required',
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',  
            ]);

          $current_password = Auth::User()->password;           
          if(Hash::check($request_data['current-password'], $current_password))
          {           
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save(); 
            Auth::logout();  
            Session::forget('id');
            Session::flush();
            session_unset();
            \Session::flash('message', 'Password Changed Successfully');
            Alert::success('Password Changed Successfully')->autoclose(3000);
            return redirect('/login');
          }
          else{
            Alert::error('Please enter correct current password', 'Oops!')->autoclose(4000);
            // dd('$theuser_id');
            // $error = array('current-password' => 'Please enter correct current password');
            return back();
            // return response()->json(array('error' => $error), 400);
          }
        }
          
    if ($user->can('can-reset-password')) {
          $this->validate($request, [
            'password' => 'required|same:password|min:6',
            'password_confirmation' => 'required|same:password|min:6',  
            ]);
                      
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->save(); 
          
            Alert::success('Password Changed Successfully')->autoclose(3000);
             return redirect('view_user_details/'.$user_id);
          }
          
      }
      



  public function delete_user($user_id)
    {  
        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id; 
        $profile_info =Profile_image::where('user_id', $loggedin_user_id)->first();

        if($user->hasRole('admin_role')) {    
          $get_user =User::where('end_record','=', 0)->where('id', $user_id)->first();
             // dd( $get_user);
                  if (!empty($get_user)){
                  $user_delete = User::find($user_id);
                  $end_record= 1;
                  $user_delete->end_record = ($end_record);
                  $user_delete->update();
                  Alert::success('User Deleded Successfully')->autoclose(3000);
                  return redirect('manage_users');
                    }
                    else{
                      return view('errors.403', compact('profile_info'));
                  }
        }
        else{
            return view('errors.403', compact('profile_info'));
        }
    }

    public function account_creation_email_history_details($batch_id)
    {
         $builder = AccountEmailCreationHistory::query();
         $user = Auth::user();
         $batch_id = base64_decode($batch_id);
         $hr_groups = DB::table('group_hrbp')->get();
         $builder->where('account_creation_email.batch_id',$batch_id);
        
         $batch_record = $builder->get();
         return view('send_account_creation_email.account_email_history_details', compact('batch_record','hr_groups'));
    }

    public function store_individual_email_account_creation(Request $request)
    {
        $rules = [
              'batch_id' => 'sometimes',
              'email'    => 'required',
              'phone'    => 'required',
              'sap'      => 'required',
              'name'     => 'required',
              'group_id' => 'sometimes'
        ];

        if (!isset($request->batch_id))
        {
          $batch_id = $this->generateRandomString();
        }else
        {
          $batch_id = $request->batch_id;
        }


        if (isset($request->group_id) && $request->group_id !="")
        {
          $group_id = $request->group_id;

        }else
        {
          $group_id_obj = DB::table('group_hrbp_admin')->where('hr_sap', Auth::user()->sap)->first();
          
          if(!isset($group_id_obj->group_id) )
          {
            return redirect(url()->previous())->with('error','A staff group has not been created for you, Kindly contact I.T');
          }else
          {
            $group_id = $group_id_obj->group_id;
          }
        }


        $this->validate($request, $rules);
        
        $insert = [
          'sap_no' => $request->sap,
          'email' => $request->email,
          'name' => $request->name,
          'phone' => $request->phone,
          'batch_id' => $batch_id,
          'sent' => 0,
          'created_by_sap' => Auth::user()->sap,
          'created_at' => NOW()
         ];
          
          try
            {
              $result = DB::table('account_creation_email')->insert($insert);
            }catch(\Exception $ex)
            {
              $result = DB::table('account_creation_email')->where('sap_no', $request->sap)->delete();
              $result = DB::table('account_creation_email')->insert($insert);
            }
          
            $error_sending = false;
            try
            {
                $udpate_data = [
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'sent_recovery_link' => 2,
                    'mapped_to_groupid'  => $group_id
                  ];
          
                $update = DB::table('users')->where('sap', $request->sap)->update($udpate_data);
                $user_email = $request->email;
                
                
                $data = array(
                        'full_name' => $request->name
                    );

                Mail::send('emails.2020_notification_for_password_rest', $data, function($message) use ($data,  $user_email){
                    $message->from("dorc_it@dangoteprojects.com", 'Dangote Refinery IT');
                    $message->to($user_email);
                    $message->subject('Daily attendance system account creation');
                });

                //updating sent emails
                $update = DB::table('account_creation_email')->where('sap_no', $request->sap)->update(["sent"=> 1]);

                

         }catch(\Exception $ex)
          {
              $error_sending = true;
          }
        

          if ($error_sending == true)
          {
            return '<div align="center"><br/><br/><br/><img height="100" width="100" src="'.asset('img/warning.png').'"   ><br/> An error occur when sending account creation email, <a href="'.url('/account_creation_email_history_details/'.base64_encode($batch_id)).'">click</a> here to view the record(s) </div>';
          }else{
            return redirect(url()->previous())->with('success','Staff email creation sent successfully');
          }

    }

    public function account_creation_email_history(Request $request)
    {
         $builder = AccountEmailCreationHistory::query();
         $user = Auth::user();
         $builder->selectRaw("batch_id,  CONCAT(users.first_name,' ',users.name) as fullname")
         ->join('users','users.sap','account_creation_email.created_by_sap');

         if (isset($request->filter_by) && $request->filter_by !="")
         {
            $builder->where('account_creation_email.batch_id','LIKE','%'.$request->value.'%');
         }

         if (!$user->can('can-view-all-account-email-creation'))
         {
             $builder->where('created_by_sap', Auth::user()->sap);
         }
         $builder->groupBy('account_creation_email.batch_id');
        
         $builder->groupBy('users.name');
         $builder->groupBy('users.first_name');
      
         $batch_record = $builder->get();

         return view('send_account_creation_email.account_email_history', compact('request','batch_record'));
    }   

    public function individual_sending()
    {
         $display_form = "yes";

         $group_id_obj = DB::table('group_hrbp_admin')->where('hr_sap', Auth::user()->sap)->first();
        
         $user = Auth::user();
         if(!isset($group_id_obj->group_id) &&  !$user->can('new-user-email-with-map-user-in-group') )
         {
           $display_form = "A staff HR business partner group has not been created for you, Kindly contact I.T";
         }

         $hr_groups = DB::table('group_hrbp')->get();
         return view('send_account_creation_email.new_individual_sending',compact('display_form','hr_groups'));
    }  
    

    public function batch_sending()
    {
      $display_form = "yes";

      $group_id_obj = DB::table('group_hrbp_admin')->where('hr_sap', Auth::user()->sap)->first();
              
      $user = Auth::user();
      if(!isset($group_id_obj->group_id) &&  !$user->can('new-user-email-with-map-user-in-group') )
      {
        $display_form = "A staff HR business partner group has not been created for you, Kindly contact I.T";
      }


      $hr_groups = DB::table('group_hrbp')->get();
      return view('send_account_creation_email.new_batch_sending',compact('display_form','hr_groups'));
    }   

    function generateRandomString($length = 10) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $charactersLength = strlen($characters);
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
          $randomString .= $characters[rand(0, $charactersLength - 1)];
      }
      return $randomString;
     }

    public function store_new_map_user(Request $request)
    {
            $rules = [
                "batch_file" => "required"
            ];
            $this->validate($request, $rules);
            //check if this user logged in has been mapped

            if (isset($request->group_id) && $request->group_id !="")
            {
              $group_id = $request->group_id;
              
            }else
            {
              $group_id_obj = DB::table('group_hrbp_admin')->where('hr_sap', Auth::user()->sap)->first();
              
              if(!isset($group_id_obj->group_id) )
              {
                return redirect(url()->previous())->with('error','A staff group has not been created for you, Kindly contact I.T');
              }else
              {
                $group_id = $group_id_obj->group_id;
              }
            }

            if ($request->hasFile('batch_file')) {
                  
                    $my_sentinel = 0;
                    $file = $_FILES["batch_file"]["tmp_name"];
                    $file_open = fopen($file, "r");                    

                    $staff_sap_arr = array();
        
                    while (($line = fgetcsv($file_open, 10000, ",")) !== false) {

                      if ($my_sentinel != 0) {
                          //skip first excel title row
                          $sap = $this->clean(trim($line[0]));
                          $full_name = $this->clean(trim($line[1]));
                          $staff_sap_arr[] = $sap;
                       }

                       $my_sentinel++;

                    }//end of while loop

                    $request =  DB::table('users')->whereIn('sap', $staff_sap_arr)->update(['mapped_to_groupid' => $group_id ]);
                    
                    return redirect('/map_users')->with('success','Staff email creation sent successfully');
            }else
            {
              return redirect('/map_users')->with('error','Batch File is missing');
            }
            //end of if batch file
    }

    public function clean($string) {
      $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
      $string = preg_replace('/[^A-Za-z0-9\-_.,]@/', '', $string); // Removes special chars.
      
      $string = preg_replace('/[\x00-\x1F\x7F-\xFF]/', '', $string);
      return preg_replace('/-+/', ' ', $string); // Replaces multiple hyphens with single one.
    }
    
    public function store_new_batch_email_account_creation(Request $request)
    {
       
        $rules = [
            "batch_file" => "required"
        ];
        $this->validate($request, $rules);
        //check if this user logged in has been mapped

        if (isset($request->group_id) && $request->group_id !="")
        {
          $group_id = $request->group_id;
          
        }else
        {
          $group_id_obj = DB::table('group_hrbp_admin')->where('hr_sap', Auth::user()->sap)->first();
          
          if(!isset($group_id_obj->group_id) )
          {
            return redirect(url()->previous())->with('error','A staff group has not been created for you, Kindly contact I.T');
          }else
          {
            $group_id = $group_id_obj->group_id;
          }
        }

       
        
        
        if ($request->hasFile('batch_file')) {

            
            $my_sentinel = 0;
            $file = $_FILES["batch_file"]["tmp_name"];
            $file_open = fopen($file, "r");

            
            $date = date('Y-m-d h:i:s');
            
            
            $insert = array();
            $batch_id = $this->generateRandomString();
            $created = NOW();

            while (($line = fgetcsv($file_open, 10000, ",")) !== false) {
                
                  if ($my_sentinel != 0) {
                        //skip first excel title row
                        $sap = $this->clean(trim($line[0]));
                        $email = $this->clean(trim($line[1]));
                        $full_name = $this->clean(trim($line[2]));
                        $phone_number = $this->clean(trim($line[3]));

                        
                        

                        $insert  = [
                            'sap_no' => $sap,
                            'email' => $email,
                            'name' => $full_name,
                            'phone' => $phone_number,
                            'batch_id' => $batch_id,
                            'sent' => 0,
                            'created_by_sap' => Auth::user()->sap,
                            'created_at' => $created
                        ];

                        
                     
                        try
                        {
                          $result = DB::table('account_creation_email')->insert($insert);
                        }
                        catch(\Exception $ex)
                        {
                          $result = DB::table('account_creation_email')->where('sap_no', $sap)->delete();
                          $result = DB::table('account_creation_email')->insert($insert);
                        }
                    }
                  
                    $my_sentinel++;
               
            }

            $users_collections = DB::table('account_creation_email')->where('sent', 0)->get();
            
            $error_sending = false;
           
             

            foreach($users_collections as $users)
            {
                
                try
                {
                    $udpate_data = [
                        'email' => $users->email,
                        'phone' => $users->phone,
                        'sent_recovery_link' => 2,
                        'mapped_to_groupid'  => $group_id
                      ];
              
                    $update = DB::table('users')->where('sap', $users->sap_no)->update($udpate_data);
                    $user_email = $users->email;
                    
                    
                    $data = array(
                            'full_name' => $users->name
                        );

                    Mail::send('emails.2020_notification_for_password_rest', $data, function($message) use ($data,  $user_email){
                        $message->from("dorc_it@dangoteprojects.com", 'Dangote Refinery IT');
                        $message->to($user_email);
                        $message->subject('Daily attendance system account creation');
                    });
                  
                    //updating sent emails
                    $update = DB::table('account_creation_email')->where('sap_no', $users->sap_no)->update(["sent"=> 1]);

                    

                }catch(\Exception $ex)
                {
                  $error_sending = true;
                }
            }

            if ($error_sending == true)
            {
              return '<div align="center"><br/><br/><br/><img height="100" width="100" src="'.asset('img/warning.png').'"   ><br/> An error occur when sending account creation email, <a href="'.url('/account_creation_email_history?batch_id='.$batch_id).'">click</a> here to view the record(s) </div>';
            }else{
              return redirect('/batch_sending')->with('success','Staff email creation sent successfully');
            }

           // return redirect('/trainee_schedule/none')->with('success','Trainee Schedule has been created');
        }


      }
        


//END OF TAG
}