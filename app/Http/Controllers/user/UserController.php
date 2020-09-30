<?php

namespace App\Http\Controllers\user;



use App\Title;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use App\Settings;
use App\Rights;
use App\User;
use App\Designation;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
	{
        $this->middleware('auth',['except'=> ['flex_reg_path_process_registration']]);
    }

    ###########################
    #CREATE, VIEW & EDIT USERS##
    ###########################
    public function make()
    {
	$id=Auth::user()->id;
	$god_eye=Auth::user()->god_eye;
	## User Roles
	$rights_collection = DB::table('tbl_rights as r')
        ->where('r.rights_id','<>',1)
        ->get();
	$designation_collection = Designation::all();
	$title_collection = Title::all();

	$data=
	[
		'god_eye' => $god_eye,
		'rights_collection' =>$rights_collection,
		'designation_collection' =>$designation_collection,
		'title_collection' =>$title_collection
	];
        
     return view('user.create')->with($data);
    }
    public function save(Request $request)
    {	
	   $rules =
	   [
       'staff_pic'=>'sometimes|mimes:png,gif,jpg,JPG,jpeg|max:300',//size:300 will enforce that the size MUST be exactly 300
	   'firstname'=>'required',
	   'lastname'=>'required',
	   'email'=>'required|email|unique:tbl_users',
	   'designation_id'=>'required|numeric',
	   'title_id'=>'required|numeric',
	   'gender'=>'required|numeric',
	   'rights_id'=>'required|numeric'
      ];

  
	   //check validation options
	   $this->validate($request,$rules/*, $customs_messages*/);
       
	   //handle User Image
	   if($request->hasFile('staff_pic'))
	   {  
		 $fileNameWithExt=$request->file('staff_pic')->getClientOriginalName();
		 //Get Extension
		 $fileExt=$request->file('staff_pic')->getClientOriginalExtension();
		 //new dynamic name
		 $fileNameToStore=strtolower($request->firstname."".$request->lastname."_".rand(1,9999999).".".$fileExt);
         $file_path = '_img/users/';
         //upload image
         $request->file('staff_pic')->move($file_path, $fileNameToStore);
		   
	   }
	   else
	    $fileNameToStore='no_pic.jpg';//or whatever


       
	   //Saving to tbl_staff in order of arrangement in form
	   $user = new User;
	   $user->user_type = 2;
	   $user->pics = $fileNameToStore;
	   $user->firstname = $request->firstname;
	   $user->lastname = $request->lastname;
	   $user->rights_id = $request->rights_id;
	   $user->title_id = $request->title_id;
	   $user->gender = $request->gender;
	   $user->designation_id = $request->designation_id;
	   $user->created_by = Auth::user()->id;
	   $user->created_at = date('Y-m-d');
	   $user->updated_at = NOW();
      
	   if($request->god_eye)
	   		$user->god_eye = 1;

        if(trim($request->email)!="")
            $email = $request->email;
      
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
            // Output: 54esmdr0qf
       
        $plain_password = substr(str_shuffle($permitted_chars), 0, 6);
        $password = Hash::make($plain_password); //All new users have a default password
        $unique_code=Str::random(45);
        $user->status   = 1;
        $user->email = $email;
        $user->email_activated = 0;
        $user->password = $password;
        $user->remember_token = $unique_code;
	    $user->save();
        
	   #Send welcome email to new user
        //$link = url("/login",$unique_code);//verify email link
        $link = url("/login");
        $data = array('full_name'=>request()->firstname." ".request()->lastname,'link'=> $link, 'username' => $email, 'password' => $plain_password);
        Mail::send('emails.registration', $data, function($message) use ($data){
            $message->from("dorc_it@dangoteprojects.com", 'Gas Nomination System');
            $message->to(request()->email);
            $message->subject('Welcome to Dangote Fertilizer Gas Nomination System!');
        });


   }
	public function save_edits(Request $request)
    {	
		   $rules = 
		   [
               'pic'=>'sometimes|mimes:png,gif,jpg,JPG,jpeg|max:1500',//size:300 will enforce that the size MUST be exactly 300
               'firstname'=>'required',
               'lastname'=>'required',
               'gender'=>'required|numeric',
               'designation_id'=>'required|numeric',
               'rights_id'=>'required|numeric'
	       ];
   
	   //check validation options
	   $this->validate($request,$rules);
	   $update_id=$request->user_id;
        $user = User::find($update_id);

        //handle Staff Image
        if($request->hasFile('pic'))
        {
            //get and delete old image
            $old_pic=$user->pics;
            $file_path = '_img/users/';
            File::delete(asset("$file_path$old_pic"));


            $fileNameWithExt=$request->file('pic')->getClientOriginalName();
            //Get Extension
            $fileExt=$request->file('pic')->getClientOriginalExtension();
            //new dynamic name
            $fileNameToStore=strtolower($request->firstname."".$request->lastname."_".rand(1,9999999).".".$fileExt);

            //upload image
            $request->file('pic')->move($file_path, $fileNameToStore);

        }

        if(isset($fileNameToStore))
        $user->pics = $fileNameToStore;

        $user->firstname = $request->firstname;
        $user->title_id = $request->title_id;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->rights_id = $request->rights_id;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->status = $request->status;
        $user->designation_id = $request->designation_id;
        $user->updated_at = now();
	    $user->save();
        $data=[
            'success'=>'Staff edits successfully saved! '
        ];
        return redirect()->route('edit_user')->with($data);

   }
	public function vista()
	{
        $user_collection=DB::table('tbl_users as u')
         ->leftjoin('tbl_rights as z','z.rights_id','u.rights_id')
         ->leftjoin('tbl_title as t','t.title_id','u.title_id')
         ->leftjoin('tbl_designation as d','d.designation_id','u.designation_id')
         ->select('id','firstname','lastname','rights_name','designation','pics','god_eye','title_name')
         ->where('u.rights_id','<>',1)
         ->orderBy('u.created_at','desc')
         ->get();

		$data = ['staff_collection'	=> $user_collection];
			
		return view('user.vista')->with($data);
	}
	public function reset_user_password_by_godeye(Request $request)
	{
		$id=base64_decode($request->id);
		$user= User::find($id);
		$user->password=Hash::make("password");
		$user->save();
	}

}
