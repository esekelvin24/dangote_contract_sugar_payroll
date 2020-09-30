<?php

namespace App\Http\Controllers\master_data;


use App\Program_Type;
use App\Universities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Rights;
use App\Maintab;
use App\Subtab;
use App\Faculty;
use App\Department;
use App\Degree_Type;
use App\Session as School_Session;
use App\Programme;
use App\Course;
use App\Cross_Course;


class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	####User Rights
    public function new_user_rights()
    {
		$query=Maintab::all();
		foreach($query as $val)
		{
		 	$rights_main_tab_id[]=$val->main_tab_id;
			$rights_main_tab_name[]=$val->main_tab_name;
		}		
		
		$query=Subtab::all();
		foreach($query as $val)
		{
			
			$rights_sub_tab_id[]=$val->sub_tab_id;
			$rights_main_sub_tab_id[]=$val->main_tab_id;
			$rights_sub_tab_name[]=$val->sub_tab_name;
			$rights_sub_tab_url[]=$val->sub_tab_url;
		}
		
		/*$query=Subertab::all();
		foreach($query as $val)
		{
			$rights_suber_tab_id[]=$val->suber_tab_id;
			$rights_sub_suber_tab_id[]=$val->sub_tab_id;
			$rights_suber_tab_name[]=$val->suber_tab_name;
		}*/
		
		$data=[
			'rights_main_tab_id'=>$rights_main_tab_id,
			'rights_main_tab_name'=>$rights_main_tab_name,
			'rights_sub_tab_id'=>$rights_sub_tab_id,
			'rights_main_sub_tab_id'=>$rights_main_sub_tab_id,
			'rights_sub_tab_name'=>$rights_sub_tab_name,
			'rights_sub_tab_url'=>$rights_sub_tab_url
			/*'rights_suber_tab_id'=>$rights_suber_tab_id,
			'rights_sub_suber_tab_id'=>$rights_sub_suber_tab_id,
			'rights_suber_tab_name'=>$rights_suber_tab_name*/
			
		];
		return view('master_data.new_user_rights')->with($data);
	}
	public function view_user_rights()
    {
        $rights_collection=DB::table('tbl_rights as r')
        ->where('r.rights_id','<>',1)
        ->get();
        return view('master_data.view_user_rights')->with('rights_collection',$rights_collection);

	}
	public function save_user_rights(Request $request)
    { 
	    $rules 				= 	['rights_name'=>'required' ];
		//$customs_messages 	=	['docs_type.required'=>'Document Type is required'];
		$this->validate($request,$rules);
		
		$user_rights = new Rights;
		$user_rights->rights_name=$request->rights_name;
		$user_rights->rights=implode(",",$request->main);
		
		if(isset($request->sub[0]))
		{
		$user_rights->subrights=implode(",",$request->sub);
		}
		
		/*if(isset($request->suber[0]))
		{
		$user_rights->suberrights=implode(",",$request->suber);
		}*/
		
		$user_rights->save();
		
	}
	public function save_edit_user_rights(Request $request)
	{
	 $user_rights=Rights::find($request->rights_id);
	 $user_rights->rights_name=$request->rights_name;
	
	 $user_rights->rights=implode(",",$request->main);
		
		if(isset($request->sub[0]))
		$user_rights->subrights=implode(",",$request->sub);
		
		
		/*if(isset($request->suber[0]))
		$user_rights->suberrights=implode(",",$request->suber);*/
		
		
	 $user_rights->save();
		
	}

    ####FACULTIES
    public function create_faculty()
    {
        //Get all users with dean rights
        $dean_collection = DB::table('tbl_users as u')
            ->select('id','firstname','middlename','lastname')
            ->where('rights_id', 5)//dean rights
            ->get();
        $data=[
          "dean_collection"=>$dean_collection
        ];
        return view('master_data.new_faculty')->with($data);
    }
    
    public function view_faculty()
    {
        $faculty_collection = DB::table('tbl_faculty as f')
            ->leftjoin('tbl_users as u', 'u.id', 'f.dean')
            ->select('faculty_id', 'faculty_name','firstname','middlename','lastname','dean')
            ->get();
        return view('master_data.view_faculty')->with('faculty_collection',$faculty_collection);

    }
    public function save_edit_faculty(Request $request)
    {
        $faculty=Faculty::find($request->faculty_id);
        $faculty->faculty_name=$request->faculty_name;
        if($request->dean)
            $faculty->dean=$request->dean;
        else
            $faculty->dean=NULL ;
        $faculty->save();

    }

    ####DEPARTMENTS
    public function create_department()
    {
       
        return view('master_data.new_department');
    }
    public function save_department(Request $request)
    {
        $rules =
            [
                
                'department_name'=>'required',
               
            ];
        //check validation options
        $this->validate($request,$rules);

        $department = new Department;
        $department->department_name = $request->department_name;
        $department->created_by=Auth::user()->id;
        $department->creation_date=date('Y-m-d H:i:s');
        $department->save();
        $data=[
            'dept_success'=>'yes'
        ];
        return redirect()->route('create_department')->with($data);
    }
    public function view_department()
    {
        $department_collection=DB::table('tbl_department as d')
            ->select('department_id','department_name')
            ->get();

        return view('master_data.view_department')->with('department_collection',$department_collection);

    }
    public function save_edit_department(Request $request)
    {
        $rules =
            [
                'department_id'=>'required|numeric',
                
                'department_name'=>'required'
            ];
        //check validation options
        $this->validate($request,$rules);
        $department=Department::find($request->department_id);
        $department->department_name=$request->department_name;
        $department->save();
        $data=[
            'edit_success'=>'yes'
        ];
        return redirect()->route('edit_department')->with($data);

    }

    ####DEGREE TYPE
    public function create_degree_type()
    {
        return view('master_data.new_degree_type');
    }
    public function save_degree_type(Request $request)
    {
        $rules =
            [
                'degree_class'=>'required|numeric',
                'degree_name'=>'required',
                'degree_short_name'=>'required'
            ];
        //check validation options
        $this->validate($request,$rules);

        $degree = new Degree_Type;
        $degree->degree_class = $request->degree_class;
        $degree->degree_name = $request->degree_name;
        $degree->degree_short_name = $request->degree_short_name;
        $degree->created_by=Auth::user()->id;
        $degree->creation_date=date('Y-m-d H:i:s');
        $degree->save();
        $data=[
            'success'=>'Degree Type created successfully! '
        ];
        return redirect()->route('create_degree_type')->with($data);
    }
    public function view_degree_type()
    {
        $degree_type_collection=Degree_Type::all();
        return view('master_data.view_degree_type')->with('degree_type_collection',$degree_type_collection);
    }
    public function save_edit_degree_type(Request $request)
    {
        $rules =
            [
                'degree_type_id'=>'required|numeric',
                'degree_class'=>'required|numeric',
                'degree_name'=>'required',
                'degree_short_name'=>'required'
            ];
        //check validation options
        $this->validate($request,$rules);
        $degree=Degree_Type::find($request->degree_type_id);
        $degree->degree_class=$request->degree_class;
        $degree->degree_name=$request->degree_name;
        $degree->degree_short_name=$request->degree_short_name;
        $degree->save();
        $data=[
            'success'=>'Degree Type Edits were saved successfully'
        ];
        return redirect()->route('edit_degree_type')->with($data);

    }

    ####SESSION
    public function create_session()
    {
        return view('master_data.new_session');
    }
    public function save_session(Request $request)
    {
        $rules =
            [
                'session_name'=>'required',
            ];
        //check validation options
        $this->validate($request,$rules);

        //update all previous sessions to inactive
        School_Session::query()->update(['session_status'=>0]);

        $session = new School_Session;
        $session->session_name = $request->session_name;
        $session->session_status = 1;
        $session->created_by=Auth::user()->id;
        $session->creation_date=date('Y-m-d H:i:s');
        $session->save();
        $data=[
            'success'=>'New Session created successfully! '
        ];
        return redirect()->route('create_session')->with($data);
    }


    ####PROGRAMME
    public function create_programme()
    {
        $programme_type_collection=Program_Type::all();
        $degree_type_collection=Degree_Type::all();
        $degree_type_collection=Degree_Type::all();
        $faculty_collection=Faculty::all();
        $university_collection=Universities::all();
        $data=[
            'programme_type_collection'=>$programme_type_collection,
            'degree_type_collection'=>$degree_type_collection,
            'faculty_collection'=>$faculty_collection,
            'university_collection'=>$university_collection
        ];
        return view('master_data.new_programme')->with($data);
    }
    public function save_programme(Request $request)
    {
        $rules =
            [
                'name'=>'required',
                'programme_type_id'=>'required|numeric',
                'university_id'=>'required_if:programme_type_id,1',
                'degree_type_id'=>'required|numeric',
                'faculty_id'=>'required|numeric',
                'department_id'=>'required|numeric',
                'department_id'=>'required|numeric',
                'duration'=>'required|numeric',
                'description'=>'required',
                'min_first_sem'=>'required|numeric',
                'min_second_sem'=>'required|numeric',
                'max_session_unit'=>'required|numeric',
                'max_prog_unit'=>'required|numeric'
            ];
        //check validation options
        $this->validate($request,$rules);

        $programme = new programme;
        if($request->accepts_direct_entry)
            $programme->accepts_direct_entry  = 1;
        $programme->name = $request->name;
        $programme->programme_type_id = $request->programme_type_id;
        if(isset($request->university_id))
            $programme->university_id = $request->university_id;
        $programme->degree_type_id = $request->degree_type_id;
        $programme->faculty_id = $request->faculty_id;
        $programme->department_id = $request->department_id;
        $programme->duration = $request->duration;
        $programme->min_first_sem = $request->min_first_sem;
        $programme->min_second_sem = $request->min_second_sem;
        $programme->max_session_unit = $request->max_session_unit;
        $programme->max_prog_unit = $request->max_prog_unit;
        $programme->description = $request->description;
        $programme->normal_entry_requirement = $request->normal_entry_requirement;
        $programme->direct_entry_requirement = $request->direct_entry_requirement;
        $programme->created_by=Auth::user()->id;
        $programme->creation_date=date('Y-m-d H:i:s');
        $programme->save();
        $data=[
            'success'=>'Programme created successfully! '
        ];
        return redirect()->route('create_programme')->with($data);
    }
    public function view_programme()
    {
        $programme_collection=DB::table('tbl_programmes as p')
            ->leftjoin('tbl_faculty as f','f.faculty_id','p.faculty_id')
            ->leftjoin('tbl_department as d','d.faculty_id','p.faculty_id')
            ->leftjoin('tbl_universities as u','u.university_id','p.university_id')
            ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','p.degree_type_id')
            ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','p.programme_type_id')
            ->select('programme_id','status','programme_type_id','university','name','program_type_name','faculty_name','department_name','degree_short_name','duration',"accepts_direct_entry","normal_entry_requirement","direct_entry_requirement")
            ->groupBy('programme_id')
            ->get();

        return view('master_data.view_programme')->with('programme_collection',$programme_collection);
    }
    public function save_edit_programme(Request $request)
    {
        $rules =
            [
                'name'=>'required',
                'programme_type_id'=>'required|numeric',
                'university_id'=>'required_if:programme_type_id,1',
                'status'=>'required|numeric',
                'degree_type_id'=>'required|numeric',
                'faculty_id'=>'required|numeric',
                'department_id'=>'required|numeric',
                'duration'=>'required|numeric',
                'min_first_sem'=>'required|numeric',
                'min_second_sem'=>'required|numeric',
                'max_session_unit'=>'required|numeric',
                'max_prog_unit'=>'required|numeric',
                'description'=>'required'
            ];
        //check validation options
        $this->validate($request,$rules);
        $programme=Programme::find($request->programme_id);
        $programme->name = $request->name;
        if($request->accepts_direct_entry)
            $programme->accepts_direct_entry  = 1;
        $programme->programme_type_id = $request->programme_type_id;
        if(isset($request->university_id))
            $programme->university_id = $request->university_id;
        $programme->status = $request->status;
        $programme->degree_type_id = $request->degree_type_id;
        $programme->faculty_id = $request->faculty_id;
        $programme->department_id = $request->department_id;
        $programme->duration = $request->duration;
        $programme->min_first_sem = $request->min_first_sem;
        $programme->min_second_sem = $request->min_second_sem;
        $programme->max_session_unit = $request->max_session_unit;
        $programme->max_prog_unit = $request->max_prog_unit;
        $programme->description = $request->description;
        $programme->normal_entry_requirement = $request->normal_entry_requirement;
        $programme->direct_entry_requirement = $request->direct_entry_requirement;
        $programme->save();
        $data=[
            'success'=>'Edits were saved successfully'
        ];
        return redirect()->route('edit_programme')->with($data);

    }

}
