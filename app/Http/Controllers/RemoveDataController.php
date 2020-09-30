<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\LGA;
use App\User;
use App\_Role;
use App\Maintab;
use App\Subtab;
use App\Subertab;
use App\State;
use App\Staff_Dept;
use App\Staff_Unit;
use App\Staff_Level;
use App\Staff_Status;
use App\Staff_Resume_Type;
use App\Staff_Bank;
use App\Staff_Work;
use App\Staff_Education;
use App\Staff_Guarantors;
use App\Staff_Docs;
use App\Staff_Docs_Type;
use App\Staff;
use App\Staff_NOK_Type;
use App\Staff_Education_Type;
use App\Staff_Education_Qual;
use App\Staff_Education_Class;



class RemoveDataController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	public function remove_branch_pic(Request $request )
	{

		$the_doc="/public/branch_images/".$request->image_name;	
		Storage::delete($the_doc);
		
	}
	
	public function remove_staff_docs(Request $request )
	{

		$the_doc="/public/staff_docs/".$request->docs_name;	
		Staff_Docs::find($request->docs_id)->delete();
		Storage::delete($the_doc);
		
	}
	
}
