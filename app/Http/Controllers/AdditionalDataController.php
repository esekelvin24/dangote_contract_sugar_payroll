<?php

namespace App\Http\Controllers;
use App\Fees;
use App\Program_Type;
use App\Universities;
use App\Vehicle_Type;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Rights;
use App\Maintab;
use App\Subtab;
use App\Designation;
//use App\Subertab;
use App\Settings;
use App\Faculty;
use App\Department;
use App\Degree_Type;
use App\Programme;
use App\Course;
use App\Cross_Course;
use App\Nomination;

class AdditionalDataController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',['except'=> ['get_departments_for_filter']]);
    }

	public function dynamic_news_edit (Request $request)
	{
	    //To know what the person logged in can change
	   

	    $news_collection = DB::table('tbl_news')->where('news_id',$request->id)->get();

	
		$data=
		[
			'news_collection' => $news_collection,
			'news_id' => $request->id
		];
		
		return view('news.news_edit')->with($data);
	 }

	 public function dynamic_daily_notice(Request $request)
	 {
		
		$queryBulder = Nomination::query();
		$queryBulder->join('tbl_nomination_name','tbl_nomination_name.id','tbl_nomination_transaction.nomination_type')
		->where('tbl_nomination_transaction.group_id',$request->id)
		->join('tbl_users','tbl_users.id','tbl_nomination_transaction.created_by');
        $nomination_collection = $queryBulder->first();
		
		$seller = DB::table('tbl_seller')->where('profile_type',1)->get();
		
        $seller_name = $seller->pluck('seller_name','id');
        $seller_address = $seller->pluck('seller_address','id');

         $transporter = DB::table('tbl_seller')->where('profile_type',2)->get();
         $transporter_name = $transporter->pluck('seller_name','id');
         $transporter_address = $transporter->pluck('seller_address','id');

	    
		return view('nomination.edit_daily_notice',compact('seller','transporter','transporter_name','transporter_address','seller_address','seller_name','nomination_collection'));    
	 }

	 public function dynamic_daily_estimate(Request $request)
	 {

		$queryBulder = Nomination::query();
		//$queryBulder->join('tbl_nomination_name','tbl_nomination_name.id','tbl_nomination_transaction.nomination_type')
		$queryBulder->where('tbl_nomination_transaction.group_id',$request->group_id)
		->orderBy('date_order','asc')
		->join('tbl_users','tbl_users.id','tbl_nomination_transaction.created_by');
		$nomination_collection = $queryBulder->get();

		$nomination = $nomination_collection->toArray();
		
		$seller = DB::table('tbl_seller')->where('profile_type',1)->get();
        $seller_name = $seller->pluck('seller_name','id');
        $seller_address = $seller->pluck('seller_address','id');

        $transporter = DB::table('tbl_seller')->where('profile_type',2)->get();
        $transporter_name = $transporter->pluck('seller_name','id');
        $transporter_address = $transporter->pluck('seller_address','id');
		
		return view('nomination.edit_daily_estimate',compact('seller','transporter','transporter_name','transporter_address','seller_address','seller_name','nomination_collection','nomination'));
	 }

	public function dynamic_weekly_estimate(Request $request)
	{
		$queryBulder = Nomination::query();
		//$queryBulder->join('tbl_nomination_name','tbl_nomination_name.id','tbl_nomination_transaction.nomination_type')
		$queryBulder->where('tbl_nomination_transaction.group_id',$request->group_id)
		->orderBy('date_order','asc')
		->join('tbl_users','tbl_users.id','tbl_nomination_transaction.created_by');

		$nomination_collection = $queryBulder->get();

		$nomination = $nomination_collection->toArray();
		
		$seller = DB::table('tbl_seller')->where('profile_type',1)->get();
        $seller_name = $seller->pluck('seller_name','id');
        $seller_address = $seller->pluck('seller_address','id');

        $transporter = DB::table('tbl_seller')->where('profile_type',2)->get();
        $transporter_name = $transporter->pluck('seller_name','id');
        $transporter_address = $transporter->pluck('seller_address','id');
		
		return view('nomination.edit_weekly_estimate',compact('seller','transporter','transporter_name','transporter_address','seller_address','seller_name','nomination_collection','nomination'));
	 
	}

	public function dynamic_monthly_estimate(Request $request)
	{
		$queryBulder = Nomination::query();
		//$queryBulder->join('tbl_nomination_name','tbl_nomination_name.id','tbl_nomination_transaction.nomination_type')
		$queryBulder->where('tbl_nomination_transaction.group_id',$request->group_id)
		->orderBy('date_order','asc')
		->join('tbl_users','tbl_users.id','tbl_nomination_transaction.created_by');
		
		$nomination_collection = $queryBulder->get();

		$nomination = $nomination_collection->toArray();
		
		$seller = DB::table('tbl_seller')->where('profile_type',1)->get();
        $seller_name = $seller->pluck('seller_name','id');
        $seller_address = $seller->pluck('seller_address','id');

        $transporter = DB::table('tbl_seller')->where('profile_type',2)->get();
        $transporter_name = $transporter->pluck('seller_name','id');
        $transporter_address = $transporter->pluck('seller_address','id');
		
		return view('nomination.edit_monthly_estimate',compact('seller','transporter','transporter_name','transporter_address','seller_address','seller_name','nomination_collection','nomination'));
	 
	}

	

	public function dynamic_event_edit (Request $request)
	{
	    //To know what the person logged in can change
	  

	    $event_collection = DB::table('tbl_event')->where('event_id',$request->id)->get();

	    
		$data=
		[
			'event_collection' => $event_collection,
			'event_id' => $request->id
		];
		
		return view('news.event_edit')->with($data);
	 }


	 public function dynamic_cross_course_edit (Request $request)
	 {
		 $cross_course_collection = Cross_Course::where('cross_course_id',$request->id)->get();
		 $cross_course_id = $request->id;
		 $programme_id = "";
		 $programme_type_id = "";
		 $cross_country_category = "";
         $course_id = "";
		 $course_short_code = "";
		 $course_title = "";
		 foreach ($cross_course_collection as $val)
		 {
			$programme_id = $val->programme_id;
			$cross_country_category = $val->cross_course_category;
		    $course_id = $val->course_id;
		 }

		 $course = Course::where('programme_id','!=',$programme_id)->where('status',1)->get();

		 $sel_course = Course::where('programme_id','!=',$programme_id)->where('course_id',$course_id)->where('status',1)->get();

		 foreach($sel_course as $val)
		 {
			
			$course_short_code = $val->short_code;
		 }
         
		 
		 $programme_collection = Programme::where('programme_id',$programme_id)->get();

		 foreach ($programme_collection as $val)
		 {
		   $programme_type_id = $val->programme_type_id;
		 }

		 $program_type_collection = Program_Type::all();
		
		return view('master_data.cross_course_edit', compact('course_id','course','course_short_code','course_title','programme_collection','cross_course_collection','program_type_collection','programme_type_id'));
	 }


	 public function dynamic_course_edit (Request $request)
	 {
		 $course_collection = Course::where('course_id',$request->id)->get();
		 $cross_course_id = $request->id;
		 $programme_id = "";
		 $programme_type_id = "";
		 $cross_country_category = "";
		 $course_id = "";
		 $course_short_code ="";

		 foreach ($course_collection as $val)
		 {
			$programme_id = $val->programme_id;
			$category = $val->cross_course_category;
			$course_id = $val->course_id;
			$course_short_code = $val->short_code;

		 }

		 
		 
		 $programme_collection = Programme::where('programme_id',$programme_id)->where('status',1)->get();

		 foreach ($programme_collection as $val)
		 {
		   $programme_type_id = $val->programme_type_id;
		 }

		 $program_type_collection = Program_Type::all();
		
		return view('master_data.course_edit', compact('programme_id','course_id','course_short_code','programme_collection','course_collection','program_type_collection','programme_type_id'));
	 }



	

	 



	#USER ADDITIONAL DATA#
	public function dynamic_user_edit(Request $request)
	{
	    //To know what the person logged in can change
	   $god_eye=Auth::user()->god_eye;

        $rights_collection = Rights::all();
        $designation_collection = Designation::all();

	    $user_collection=User::where('id',$request->id)->get();

	
	$data=
	[
        'god_eye' => $god_eye,
        'rights_collection' =>$rights_collection,
        'designation_collection' =>$designation_collection,
        'user_collection' =>$user_collection
	];
		
		return view('user.individual_edit')->with($data);
	 }
	public function dynamic_user_view(Request $request)
	{
		$user_collection=DB::table('tbl_user as s')
					 ->leftjoin('tbl_rightss as z','z.rights_id','=','s.rights_id')
					 ->leftjoin('tbl_branches as b','b.branch_id','=','s.branch_id')
					 ->leftjoin('tbl_regions as r','r.region_id','=','b.region_id')
					 ->leftjoin('tbl_areas as a','a.area_id','=','b.area_id')
					 ->leftjoin('tbl_branch_type as t','t.type_id','=','b.type_id')
					 ->leftjoin('tbl_user_status as p','p.status_id','=','s.status')
					 ->leftjoin('tbl_user_level as l','l.level_id','=','s.level_id')
					 ->leftjoin('tbl_user_resume_type as rt','rt.resume_type_id','=','s.resume_type_id')
					 ->leftjoin('tbl_user_unit as u','u.unit_id','=','s.unit_id')
					 ->leftjoin('tbl_dept as d','d.dept_id','=','s.dept_id')
					 ->leftjoin('tbl_user_bank as bk','bk.bank_id','=','s.bank_id')
					 ->leftjoin('tbl_state as st','st.state_id','=','s.state_id')
					 ->leftjoin('tbl_lga as lga','lga.lga_id','=','s.lga_id')
					 ->leftjoin('tbl_user_nok_types as nok','nok.nok_type_id','=','s.nok_type_id')
					/* ->leftjoin('tbl_user as cb','cb.user_id','=','s.created_by')*/
					->select('user_id','user_no','status_name','level_code','level_docs','resume_type_name as rtn','resume_type_start_time as rtst','unit_name','resume_type_end_time as rtet','first_name','middle_name','last_name','role_name','branch_name','b.address as branch_address','type_name','dept_name','dept_hod','phone','pics','god_eye','gm','mgr','gender','m_status','area_sup','bank_name','account_no','account_type','account_name','email','area_name','region_name','resumption_date','assumption_date','termination_date','dob','state_name','lga_name','residential_address','hometown_address','nok_name','nok_type_name','nok_address','nok_phone','ec_name','ec_phone','ec_address','spouse_name','spouse_phone'/*,'cb.first_name as createdby_first_name','cb.last_name as createdby_last_name','created_on','last_modified'*/)->where('s.user_id',$request->id)->get();
		
		//docs_experience
		$docs_collection = DB::table('tbl_user_docs as d')
					 ->leftjoin('tbl_user_docs_type as t','t.docs_id','=','d.docs_id')
					 ->select('docs_type','docs_name')
			          ->where('d.user_id',$request->id)->get();
			
			
		
		//education
		$education_collection = DB::table('tbl_user_education as e')
							 ->leftjoin('tbl_user_education_class as c','c.education_class_id','=','e.education_class_id')
							 ->leftjoin('tbl_user_education_qual as  q','q.education_qual_id','=','e.education_qual_id')
							 ->leftjoin('tbl_user_education_type as  t','t.education_type_id','=','e.education_type_id')
							 ->select('education_type_name as etn','start_year','end_year','institution_name','course_name','education_qual_name as eqn','education_class_name as ecn')
							  ->where('e.user_id',$request->id)->get();
		
		//work experience
		$work_collection  =  Staff_Work::where('user_id',$request->id)->get();
		
		//guarantors
		$guarantors_collection = Staff_Guarantors::where('user_id',$request->id)->get();
		
		$data = 
		[
		'user_collection'	=> $user_collection,
		'education_collection'	=> $education_collection,	
		'docs_collection'	=> $docs_collection,	
		'guarantors_collection'	=> $guarantors_collection,
		'work_collection'	=> $work_collection
		];
		
		
		return view('user.individual_vista')->with($data);
	}
	public function dynamic_user_query(Request $request)
	{
		$dynamic_where="";
		
		$vals=$request->all();
		
		foreach($vals as $k=>$v )
		{
			//I need to build a dynamic where condition
					
			if($k=="_token")
			continue;
			
			if($k=="first_name" || $k=="last_name" || $k=="email" || $k=="phone" || $k=="user_no")
			{
			$dynamic_where.=" $k LIKE '%$v%' and";
			continue;
			}
				
			if($k=="view_scope")
			{
			$dynamic_where.=" $v=1 and";
			continue;
			}
				
			if($k=="birth_month")
			{
			$v=date("m",strtotime($v));
			$dynamic_where.=" MONTH(dob) = '$v' and";
			continue;
			}
				
			if($k=="resume_year")
			{
			$dynamic_where.=" YEAR(resumption_date) = '$v' and";
			continue;
			}
				

			$dynamic_where.=" s.$k='$v' and";

		}

			$dynamic_where.=" user_id!=0";
		
		

					$user_collection=DB::table('tbl_user as s')
                     ->leftjoin('tbl_user_level as l','l.level_id','=','s.level_id')
					 ->leftjoin('tbl_rightss as z','z.rights_id','=','s.rights_id')
					 ->leftjoin('tbl_branches as b','b.branch_id','=','s.branch_id')
					 ->leftjoin('tbl_regions as r','r.region_id','=','b.region_id')
					 ->leftjoin('tbl_areas as a','a.area_id','=','b.area_id')
					 ->leftjoin('tbl_branch_type as t','t.type_id','=','b.type_id')
					 ->leftjoin('tbl_user_status as p','p.status_id','=','s.status')
				->select('user_id','level_code','user_no','status_name','first_name','middle_name','last_name','role_name','branch_name','status','type_name','phone','pics','god_eye','gm','mgr','area_sup','area_name','region_name','resumption_date','dob')
						->whereRaw($dynamic_where)->get();
		
		
		if(isset($user_collection) && !$user_collection->isEmpty() )
		{
		?>
            <h5 class="over-title" style="margin-top:29px !important">Your search query returned <span class="text-bold badge badge-success "><?php echo $user_collection->count() ?></span> Results</h5>
	        <table id="data_me" class="table table-striped table-bordered table-hover table-full-width sample_1">
				<thead>
					<tr>
						<th></th>
						<th class="center"></th>
						<th>Staff Name | Role </th>
						<th>View Scope</th>
						<th>Level</th>
						<th>Branch</th>
						<th>Status</th>
						<th>Phone</th>
						<th>Resumption Date</th>

					</tr>
				</thead>
				<tbody>
					<?php 
			        foreach($user_collection as $val)
					{
					?>

					<tr>
						<td><i style="cursor: pointer" data-id="<?php echo $val->user_id ?>"
							   
							    
                                <?php
						        if (\Request::is('/user/vista'))
								echo 'class="fa fa-eye"';
						        else
								echo 'class="fa fa-edit"';
								?>
							    
							   
							   ></i></td>
						<td class="center"><img class="img-rounded" height="30" width="30" src='<?php echo asset("storage/user_pics/".$val->pics) ?>'</td>
						<td> <?php echo $val->first_name." ".$val->middle_name." ".$val->last_name." (".$val->user_no.")" ?>   <code>  <?php echo $val->role_name ?>  </code></td>
						<td><span class="label 
						label-<?php
							if($val->god_eye)
							echo 'default';
							elseif($val->gm)
								echo 'success'; 
							elseif($val->mgr)
								echo 'warning' ;
							elseif($val->area_sup)
								echo 'danger' ;
							else
								echo 'info' ;
							?>
							"> 
							<?php if($val->god_eye)
							 	echo 'Managing Director';
							 elseif($val->gm)
								echo 'General Manager';
							 elseif($val->mgr)
								echo $val->type_name.' Manager';
							 elseif($val->area_sup)
								echo 'Area Supervisor';
							 else
								echo 'Regular View'; 
							
							?>
							</span></td>
                        <td><?php echo $val->level_code==""?"---":$val->level_code ?></td>
						<td><?php 
			               echo $val->branch_name;
						   if($val->region_name!="" || !is_null($val->region_name))
							echo $val->region_name;
							//else
							//	echo '[Nil]';
							

							if($val->area_name!="" || !is_null($val->area_name))
							    echo $val->area_name;
							//else
							  // echo '[Nil]';
							
								?>
						</td>
						<td>
							<?php echo $val->status_name ?>

						</td>

						<td><a href="tel:{{ $val->phone }}" class="btn btn-primary btn-o">Call <i class="fa fa-phone-square"></i> <?php echo $val->phone ?></a></td>

						<td>

							<?php

							$now= Carbon::now('Africa/Lagos');
							$resume_date = new Carbon($val->resumption_date);
							$years=$now->diffInYears($resume_date);
							$months=$now->diffInMonths($resume_date);
							if($years>0)
							 $months-=($years * 12);
							echo $resume_date->format('jS F , Y')." | ".$years." years , ".$months." months ago!"
							?>

						</td>

					</tr>

					<?php
					}
								
					?>
				</tbody>
			</table>
			<span class="clearfix"></span>

			<script type="text/javascript">
				$("form#form").slideUp();
			var oTable = $('#data_me').dataTable({
						"aoColumnDefs" : [{
							"aTargets" : [0]
						}],
						"oLanguage" : {
							"sLengthMenu" : "Show _MENU_ Rows",
							"sSearch" : "",
							"oPaginate" : {
								"sPrevious" : "",
								"sNext" : ""
							}
						},
						"aaSorting" : [[1, 'asc']],
						"aLengthMenu" : [[5, 10, 15, 20, -1], [5, 10, 15, 20, "All"] // change per page values here
						],
						// set the initial value
						"iDisplayLength" : 30,
					});
					$('#data_me_wrapper .dataTables_filter input').addClass("form-control input-sm").attr("placeholder", "Search Staff");
					// modify table search input
					$('#data_me_wrapper .dataTables_length select').addClass("m-wrap small");
					// modify table per page dropdown
					$('select').select2();
					// initialzie select2 dropdown
					$('#data_me_column_toggler input[type="checkbox"]').change(function() {
						/* Get the DataTables object again - this is not a recreation, just a get of the object */
						var iCol = parseInt($(this).attr("data-column"));
						var bVis = oTable.fnSettings().aoColumns[iCol].bVisible;
						oTable.fnSetColumnVis(iCol, ( bVis ? false : true));
					});

			</script>


		<?php	
		}
		else
		{
			echo "<br/><h5 class='over-title'>Ooops! Your search query returned <span class='text-bold'>0</span> Result(s)</h5>";
		}
		
		
    
		
	}
	public function dynamic_user_build(Request $request)
	{
		switch($request->id)
		{
			case "branch_id":
			if(DB::table('tbl_branches as b')
			->leftjoin('tbl_branch_type as t','t.type_id','=','b.type_id')
			->leftjoin('tbl_areas as a','a.area_id','=','b.area_id')
			->leftjoin('tbl_regions as r','r.region_id','=','b.region_id')
			->select('branch_id','branch_name as bn','area_name as an','type_name as tn','region_name as rn')->exists())
		   {
			   $branch_collection=DB::table('tbl_branches as b')
				->leftjoin('tbl_branch_type as t','t.type_id','=','b.type_id')
				->leftjoin('tbl_areas as a','a.area_id','=','b.area_id')
				->leftjoin('tbl_regions as r','r.region_id','=','b.region_id')
				->select('branch_id','branch_name as bn','area_name as an','type_name as tn','region_name as rn')->get();
				
		   }
				?>
				<div class="form-group <?php echo $request->id ?>" >
					<label >
						Branch
					</label>
					<select class="form-control dyna" name="branch_id">
						<option selected value="">--Select Branch-</option>
						<?php
						foreach($branch_collection as $val)
						{
						?>
						<option value="<?php echo $val->branch_id ?>"><?php echo $val->bn." | ".$val->tn." | ".$val->an." | ".$val->rn ?></option>
						<?php
						}
						?>
					</select>
				</div>	
				<?php

				break;
				
			case "rights_id":
			$user_rights_collection = Rights::all();
              ?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					User Role
				</label>
				<select class="form-control dyna" name="rights_id">
					<option selected value="">--Select Role-</option>
					<?php
					foreach($user_rights_collection as $val)
					{
					?>
					<option value="<?php echo $val->rights_id ?>"><?php echo $val->role_name  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php

			break;

            case "leave_year":
                ?>
                <div class="form-group <?php echo $request->id ?>" >
                    <label >
                        Leave Year
                    </label>
                    <select class="form-control dyna" name="leave_year">
                        <option selected value="">--Select Year-</option>

                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>

                    </select>
                </div>

                <?php

                break;
				
			case "resume_type_id":
			$user_resume_type = Staff_Resume_Type::all();
              ?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					Staff Resumption Type
				</label>
				<select class="form-control dyna" name="resume_type_id">
					<option selected value="">--Select Resumption Type-</option>
					<?php
					foreach($user_resume_type as $val)
					{
					?>
					<option value="<?php echo $val->resume_type_id ?>"><?php echo $val->resume_type_name." ( ".$val->resume_type_start_time." - ".$val->resume_type_end_time." ) ";  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php

			break;
				
					case "bank_id":
			$user_bank = Staff_Bank::all();
              ?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					Staff Bank
				</label>
				<select class="form-control dyna" name="bank_id">
					<option selected value="">--Select Bank-</option>
					<?php
					foreach($user_bank as $val)
					{
					?>
					<option value="<?php echo $val->bank_id ?>"><?php echo $val->bank_name  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php

			break;
				
				
					case "lga_id":
					$LGA = LGA::all();
              ?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					Staff LGA
				</label>
				<select class="form-control dyna" name="lga_id">
					<option selected value="">--Select LGA-</option>
					<?php
					foreach($LGA as $val)
					{
					?>
					<option value="<?php echo $val->lga_id ?>"><?php echo $val->lga_name ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php

			break;
			
				case "status":
			$status_collection = Staff_Status::all();
              ?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					Staff Status
				</label>
				<select class="form-control dyna" name="status">
					<option selected value="">--Select Status-</option>
					<?php
					foreach($status_collection as $val)
					{
					?>
					<option value="<?php echo $val->status_id ?>"><?php echo $val->status_name  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php
				break;
				
			case "state_id":
				$state_collection = State::all();
              ?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					State
				</label>
				<select class="form-control dyna" name="state_id">
					<option selected value="">--Select State-</option>
					<?php
					foreach($state_collection as $val)
					{
					?>
					<option value="<?php echo $val->state_id ?>"><?php echo $val->state_name  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php

				break;
				
				case "dept_id":
				$dept_collection = Staff_Dept::all();
				 ?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					State
				</label>
				<select class="form-control dyna" name="dept_id">
					<option selected value="">--Select Dept-</option>
					<?php
					foreach($dept_collection as $val)
					{
					?>
					<option value="<?php echo $val->dept_id ?>"><?php echo $val->dept_name  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php
				break;
				
			case "unit_id":
				$unit_collection = Staff_Unit::all();
				
				?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					Unit
				</label>
				<select class="form-control dyna" name="unit_id">
					<option selected value="">--Select Unit-</option>
					<?php
					foreach($unit_collection as $val)
					{
					?>
					<option value="<?php echo $val->unit_id ?>"><?php echo $val->unit_name  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php
				break;
				
				case "level_id":
				$level_collection = Staff_Level::all();
				
				?>
			<div class="form-group <?php echo $request->id ?>" >
				<label >
					Level
				</label>
				<select class="form-control dyna" name="level_id">
					<option selected value="">--Select Level-</option>
					<?php
					foreach($level_collection as $val)
					{
					?>
					<option value="<?php echo $val->level_id ?>"><?php echo $val->level_code  ?></option>
					<?php
					}
					?>
				</select>
			</div>	

           <?php
				break;
				
				case "first_name":
				?>
				<div class="form-group <?php echo $request->id ?>">
					<label >
						First Name
					</label>
					<input autocomplete="off" class="form-control dyna" placeholder="Search Staff by First Name" type="text" name="first_name">
				</div>

					<?php
					break;
		
				case "last_name":
				?>
				<div class="form-group <?php echo $request->id ?>">
					<label >
						Last Name
					</label>
					<input autocomplete="off" class="form-control dyna" placeholder="Search Staff by Last Name" type="text" name="last_name">
				</div>
					<?php
			
				break;
				
				
					case "user_no":
				?>
				<div class="form-group <?php echo $request->id ?>">
					<label >
						Staff Number
					</label>
					<input autocomplete="off" class="form-control dyna" placeholder="Search Staff by Staff Number" type="text" name="user_no">
				</div>
					<?php
			
				break;
				
				
				case "view_scope":
					?>
					<div class="form-group <?php echo $request->id ?>" >
						<label >
							View Scope
						</label>
						<select class="form-control dyna" name="view_scope">
							<option selected value="">--Select View Scope--</option>
							<option value="god_eye">Managing Director</option>
							<option value="gm">General Manager</option>
							<option value="mgr">Manager</option>
							<option value="area_sup">Supervisor</option>
						</select>
					</div>
					<?php
					break;
				
				case "gender":
				?>
				<div class="form-group <?php echo $request->id ?>">
				<label>
					Gender
				</label>
				<select class="form-control dyna" name="gender">
					<option selected value="">--Select Gender--</option>
					<option value="0">Female</option>
					<option value="1">Male</option>
				</select>

				</div>

				<?php
				break;	
					case "m_status":
				?>
				<div class="form-group <?php echo $request->id ?>">
				<label>
					Marital Status
				</label>
				<select class="form-control dyna" name="m_status">
					<option selected value="">--Select Marital Status--</option>
					<option value="0">Single</option>
					<option value="1">Married</option>
					<option value="2">Divorced</option>
				</select>

				</div>
				<?php
				break;
					case "email":
				?>
				<div class="form-group <?php echo $request->id ?>">
					<label >
						Email
					</label>
					<input autocomplete="off" class="form-control dyna" placeholder="Search Staff by Email" type="text" name="email">
				</div>

				<?php
				break;
					case "phone":
				?>
				<div class="form-group <?php echo $request->id ?>">
					<label >
						Phone
					</label>
					<input autocomplete="off" class="form-control dyna" placeholder="Search Staff by Phone Number" type="text" name="phone">
				</div>
				<?php
						exit();
						break;
						case "birth_month":
				?>
				<div class="form-group <?php echo $request->id ?>">
					<label >
						Staff Birth Month
					</label>
					<input autocomplete="off" class="form-control dyna" placeholder="Search Staff by Birth Month e.g January or July" type="text" name="birth_month">
				</div>	
				<?php
				break;
					case "resume_year":
				?>
				<div class="form-group <?php echo $request->id ?>">
					<label >
						Resumption Year
					</label>
					<input autocomplete="off" class="form-control dyna" placeholder="Search Staff by Resumption Year e.g 2009" type="text" name="resume_year">
				</div>	

				<?php
					exit();
						break;
				
		}
		
	}
    public function get_view_user_rights(Request $request)
    {

        $query=Rights::where('rights_id',$request->rights_id)->get();

        $rights_str=$query[0]->rights;
        $rights=explode(',',$rights_str);

        $subrights_str=$query[0]->subrights;
        $subrights=explode(',',$subrights_str);

        /*$suberrights_str=$query[0]->suberrights;
        $suberrights=explode(',',$suberrights_str);*/

        //maintab: actual based on role id and full list
        $query = Maintab::whereIn('main_tab_id',$rights)->get();
        foreach($query as $val)
        {
            $role_main_tab_id[]=$val->main_tab_id;
            $role_main_tab_name[]=$val->main_tab_name;
        }

        $query=Maintab::all();
        foreach($query as $val)
        {
            $full_main_tab_id[]=$val->main_tab_id;
            $full_main_tab_name[]=$val->main_tab_name;
        }

        $query=Subtab::whereIn('sub_tab_id',$subrights)->get();
        foreach($query as $val)
        {

            $role_sub_tab_id[]=$val->sub_tab_id;
            $role_main_sub_tab_id[]=$val->main_tab_id;
            $role_sub_tab_name[]=$val->sub_tab_name;
            $role_sub_tab_url[]=$val->sub_tab_url;
        }


        $query=Subtab::all();
        foreach($query as $val)
        {
            $full_sub_tab_id[]=$val->sub_tab_id;
            $full_main_sub_tab_id[]=$val->main_tab_id;
            $full_sub_tab_name[]=$val->sub_tab_name;
            $full_sub_tab_url[]=$val->sub_tab_url;
        }


        //subertab: actual based on role id and full list
        /*$query=Subertab::whereIn('suber_tab_id',$suberrights)->get();
        foreach($query as $val)
        {
            $role_suber_tab_id[]=$val->suber_tab_id;
            $role_sub_suber_tab_id[]=$val->sub_tab_id;
            $role_suber_tab_name[]=$val->suber_tab_name;
        }


        $query=Subertab::all();
        foreach($query as $val)
        {
            $full_suber_tab_id[]=$val->suber_tab_id;
            $full_sub_suber_tab_id[]=$val->sub_tab_id;
            $full_suber_tab_name[]=$val->suber_tab_name;
        }*/

        ?>
        <script>
            $('input[data-main]').checkboxpicker({
                html: true,
                offLabel: '<span class="icon-close">',
                onLabel: '<span class="icon-check">'
            });
        </script>

        <div class="tabbable tabs-left">

            <ul id="myTab4" class="nav nav-tabs">
                <?php
                for($a=0;$a<count($role_main_tab_id);$a++)
                {
                    ?>
                    <li class="<?php echo $a==0?"new_active":"" ?>">
                        <a href="#a<?php echo $role_main_tab_id[$a] ?>" data-toggle="tab" aria-expanded="<?php echo $a==0?"true":"false" ?>">
                            <?php echo strtoupper($role_main_tab_name[$a]) ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <?php
            $checkbox_colours=array("primary", "success", "warning","danger","info","purple");
            ?>

            <div class="tab-content">
                <?php
                for($a=0;$a<count($role_main_tab_id);$a++)
                {

                    ?>
                    <div class="tab-pane fade <?php echo $a==0?"active in":"" ?>" id="a<?php echo $role_main_tab_id[$a] ?>">

                        <div class="checkbox">
                            <input disabled checked data-main="<?php echo $role_main_tab_id[$a] ?>" name="main[]" value="<?php echo $role_main_tab_id[$a] ?>" type="checkbox"/>
                        </div>

                        <?php
                        for($b=0;$b<count($role_sub_tab_id);$b++)
                        {
                            $color=$checkbox_colours[rand(0,5)];
                            if($role_main_sub_tab_id[$b]==$role_main_tab_id[$a])
                            {
                                ?>
                                <div class="checkbox clip-check check-<?php echo $color ?>">
                                    <input checked data-sub="<?php echo $role_sub_tab_id[$b] ?>" disabled id="c<?php echo $role_sub_tab_id[$b] ?>" name="sub[]" value="<?php echo $role_sub_tab_id[$b] ?>"  type="checkbox">
                                    <label for="c<?php echo $role_sub_tab_id[$b] ?>">

                                        <?php
                                        echo $role_sub_tab_url[$b]=="#"?strtoupper($role_sub_tab_name[$b]):"$role_sub_tab_name[$b]";
                                        ?>
                                    </label>
                                </div>
                                <?php
                                /*if($role_sub_tab_url[$b]=="#")
                                {
                                    for($c=0;$c<count($role_suber_tab_id);$c++)
                                    {
                                        $color=$checkbox_colours[rand(0,5)];
                                        if($role_sub_tab_id[$b]==$role_sub_suber_tab_id[$c])
                                        {
                                            */?><!--
                                            <div style="margin-left: 35px" class="checkbox clip-check check-<?php /*echo $color */?>">
                                                <input checked data-suber="<?php /*echo $role_sub_suber_tab_id[$c] */?>" disabled id="d<?php /*echo $role_suber_tab_id[$c] */?>" name="suber[]" value="<?php /*echo $role_suber_tab_id[$c] */?>"  type="checkbox">
                                                <label for="d<?php /*echo $role_suber_tab_id[$c] */?>">

                                                    <?php
/*                                                    echo $role_suber_tab_name[$c];
                                                    */?>
                                                </label>
                                            </div>
                                            --><?php
/*                                        }
                                    }
                                }*/
                                ?>

                                <?php
                            }
                        }
                        ?>





                    </div>
                    <?php
                }
                ?>


            </div>
        </div>
        <?php
    }
    public function get_edit_user_rights(Request $request)
    {
        $query=Rights::where('rights_id',$request->rights_id)->get();

        $rights_name=$query[0]->rights_name;

        $rights_str=$query[0]->rights;
        $rights=explode(',',$rights_str);

        $subrights_str=$query[0]->subrights;
        $subrights=explode(',',$subrights_str);

        /*$suberrights_str=$query[0]->suberrights;
        $suberrights=explode(',',$suberrights_str);*/

        //maintab: actual based on role id and full list
        $query = Maintab::whereIn('main_tab_id',$rights)->get();
        foreach($query as $val)
        {
            $role_main_tab_id[]=$val->main_tab_id;
            $role_main_tab_name[]=$val->main_tab_name;
        }

        $query=Maintab::all();
        foreach($query as $val)
        {
            $full_main_tab_id[]=$val->main_tab_id;
            $full_main_tab_name[]=$val->main_tab_name;
        }

        $query=Subtab::whereIn('sub_tab_id',$subrights)->get();
        foreach($query as $val)
        {

            $role_sub_tab_id[]=$val->sub_tab_id;
            $role_main_sub_tab_id[]=$val->main_tab_id;
            $role_sub_tab_name[]=$val->sub_tab_name;
            $role_sub_tab_url[]=$val->sub_tab_url;
        }


        $query=Subtab::all();
        foreach($query as $val)
        {
            $full_sub_tab_id[]=$val->sub_tab_id;
            $full_main_sub_tab_id[]=$val->main_tab_id;
            $full_sub_tab_name[]=$val->sub_tab_name;
            $full_sub_tab_url[]=$val->sub_tab_url;
        }


        //subertab: actual based on role id and full list
       /* $query=Subertab::whereIn('suber_tab_id',$suberrights)->get();
        foreach($query as $val)
        {
            $role_suber_tab_id[]=$val->suber_tab_id;
            $role_sub_suber_tab_id[]=$val->sub_tab_id;
            $role_suber_tab_name[]=$val->suber_tab_name;
        }


        $query=Subertab::all();
        foreach($query as $val)
        {
            $full_suber_tab_id[]=$val->suber_tab_id;
            $full_sub_suber_tab_id[]=$val->sub_tab_id;
            $full_suber_tab_name[]=$val->suber_tab_name;
        }*/
        ?>

        <script type="text/javascript">

            jQuery(document).ready(function() {

                $('input[data-main]').checkboxpicker({
                    html: true,
                    offLabel: '<span class="icon-close">',
                    onLabel: '<span class="icon-check">'
                }).on('change', function(e) {

                    if($(this).is(":checked"))
                    {
                        var under="a"+$(this).data('main');
                        $("div#"+under+" input[name^=sub]:disabled").removeAttr("disabled");
                    }
                    else
                    {
                        var under="a"+$(this).data('main');
                        $("div#"+under+" input[name^=sub]").prop("disabled", true).removeAttr("checked");
                    }
                });


                $('input[data-sub]').on('click',function(e)
                {
                    var whr=$(this).data('sub');

                    if($(this).is(":checked")){
                        $("input[data-suber="+whr+"]").prop("checked", true);
                    }else{
                        $("input[data-suber="+whr+"]").removeAttr("checked");
                    }
                });


                /*$('input[data-suber]').click(function(e)
                {
                    var whr=$(this).data('suber');

                    if($(this).is(":checked")){
                        $("input[data-sub="+whr+"]").prop("checked", true);
                    }
                    else
                    {

                        if($("input[data-suber="+whr+"]:checked").length==0)
                        {
                            $("input[data-sub="+whr+"]").removeAttr("checked");
                        }

                    }
                });*/
            });

        </script>

        <div class="form-group" style="margin-top:20px">
            <label for="edit_rights"> <h6>Edit User Right Name</h6></label>
            <input id="edit_rights" value="<?php echo $rights_name ?>" name="rights_name" class="form-control underline"  type="text">
        </div>

        <div class="tabbable tabs-left">

            <ul id="myTab4" class="nav nav-tabs">
                <?php
                for($a=0;$a<count($full_main_tab_id);$a++)
                {
                    ?>
                    <li class="<?php echo $a==0?"new_active":"" ?>">
                        <a href="#a<?php echo $full_main_tab_id[$a] ?>" data-toggle="tab" aria-expanded="<?php echo $a==0?"true":"false" ?>">
                            <?php echo strtoupper($full_main_tab_name[$a]) ?>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
            <?php
            $checkbox_colours=array("primary", "success", "warning","danger","info","purple");
            ?>

            <div class="tab-content">
                <?php
                for($a=0;$a<count($full_main_tab_id);$a++)
                {

                    ?>
                    <div class="tab-pane fade <?php echo $a==0?"active in":"" ?>" id="a<?php echo $full_main_tab_id[$a] ?>">

                        <div class="checkbox">
                            <input <?php echo in_array($full_main_tab_id[$a],$role_main_tab_id)?"checked":"" ?> data-main="<?php echo $full_main_tab_id[$a] ?>" name="main[]" value="<?php echo $full_main_tab_id[$a] ?>" type="checkbox"/>
                        </div>

                        <?php
                        for($b=0;$b<count($full_sub_tab_id);$b++)
                        {
                            $color=$checkbox_colours[rand(0,5)];
                            if($full_main_sub_tab_id[$b]==$full_main_tab_id[$a])
                            {
                                ?>
                                <div class="checkbox clip-check check-<?php echo $color ?>">
                                    <input <?php echo in_array($full_sub_tab_id[$b],$role_sub_tab_id)?"checked":"" ?> data-sub="<?php echo $full_sub_tab_id[$b] ?>"  id="c<?php echo $full_sub_tab_id[$b] ?>" name="sub[]" value="<?php echo $full_sub_tab_id[$b] ?>"  type="checkbox">
                                    <label for="c<?php echo $full_sub_tab_id[$b] ?>">

                                        <?php
                                        echo $full_sub_tab_url[$b]=="#"?strtoupper($full_sub_tab_name[$b]):"$full_sub_tab_name[$b]";
                                        ?>
                                    </label>
                                </div>
                                <?php
                                /*if($full_sub_tab_url[$b]=="#")
                                {
                                    for($c=0;$c<count($full_suber_tab_id);$c++)
                                    {
                                        $color=$checkbox_colours[rand(0,5)];
                                        if($full_sub_tab_id[$b]==$full_sub_suber_tab_id[$c])
                                        {
                                            */?><!--
                                            <div style="margin-left: 35px" class="checkbox clip-check check-<?php /*echo $color */?>">
                                                <input <?php /*echo in_array($full_suber_tab_id[$c],$role_suber_tab_id)?"checked":"" */?> data-suber="<?php /*echo $full_sub_suber_tab_id[$c] */?>" id="d<?php /*echo $full_suber_tab_id[$c] */?>" name="suber[]" value="<?php /*echo $full_suber_tab_id[$c] */?>"  type="checkbox">
                                                <label for="d<?php /*echo $full_suber_tab_id[$c] */?>">

                                                    <?php
/*                                                    echo $full_suber_tab_name[$c];
                                                    */?>
                                                </label>
                                            </div>
                                            --><?php
/*                                        }
                                    }
                                }*/
                                ?>

                                <?php
                            }
                        }
                        ?>





                    </div>
                    <?php
                }
                ?>


            </div>
        </div>
        <button id="submit" type="submit" class="btn btn-success btn-wide btn-scroll btn-scroll-left ti-save" data-placement="bottom" data-toggle="tooltip"  data-original-title="Edit Staff Role">
            <span>Save Edits</span>
        </button>

        <?php

    }
	public function get_user_rights(Request $request)
	{
		$query=Rights::where('rights_id',$request->rights_id)->get();
		
		$rights_name=$query[0]->rights_name;
		$rights_str=$query[0]->rights;
		$rights=explode(',',$rights_str);
		
		$subrights_str=$query[0]->subrights;
		$subrights=explode(',',$subrights_str);
		
		/*$suberrights_str=$query[0]->suberrights;
		$suberrights=explode(',',$suberrights_str);*/
		
		//maintab: actual based on role id and full list
		$query = Maintab::whereIn('main_tab_id',$rights)->get();
		foreach($query as $val)
		{
		 	$role_main_tab_id[]=$val->main_tab_id;
			$role_main_tab_name[]=$val->main_tab_name;
		}
		
		$query=Maintab::all();
		foreach($query as $val)
		{
		 	$full_main_tab_id[]=$val->main_tab_id;
			$full_main_tab_name[]=$val->main_tab_name;
			$full_main_tab_icon[]=$val->main_tab_icon;
		}
		
		$query=Subtab::whereIn('sub_tab_id',$subrights)->get();
		foreach($query as $val)
		{
			
			$role_sub_tab_id[]=$val->sub_tab_id;
			$role_main_sub_tab_id[]=$val->main_tab_id;
			$role_sub_tab_name[]=$val->sub_tab_name;
			$role_sub_tab_url[]=$val->sub_tab_url;
		}
		
		
		$query=Subtab::all();
		foreach($query as $val)
		{
	 		$full_sub_tab_id[]=$val->sub_tab_id;
			$full_main_sub_tab_id[]=$val->main_tab_id;
			$full_sub_tab_name[]=$val->sub_tab_name;
			$full_sub_tab_url[]=$val->sub_tab_url;
		}

		//subertab: actual based on role id and full list
            /*$query = Subertab::whereIn('suber_tab_id', $suberrights)->get();
            foreach ($query as $val) {
                $role_suber_tab_id[] = $val->suber_tab_id;
                $role_sub_suber_tab_id[] = $val->sub_tab_id;
                $role_suber_tab_name[] = $val->suber_tab_name;
            }

		
		$query=Subertab::all();
		foreach($query as $val)
		{
			$full_suber_tab_id[]=$val->suber_tab_id;
			$full_sub_suber_tab_id[]=$val->sub_tab_id;
			$full_suber_tab_name[]=$val->suber_tab_name;
		}*/
?>

<p style="margin-top: -10px">Detailed privileges breakdown for <strong><?php echo $rights_name ?></strong></p>
        <ul id="basic">
            <?php
            foreach($role_main_tab_name as $key=>$val) {
                ?>
                <li data-node-id="<?php echo $key ?>"  > <!--class="simple-tree-closed"-->
                    <span ><?php echo $val ?></span>
                    <?php
                    if(in_array($role_main_tab_id[$key],$role_main_sub_tab_id)) {
                        ?>
                        <ul>
                            <?php
                            foreach($role_sub_tab_name as $key_Sub=>$val_sub) {
                                ?>
                                <li class="badge badge-info" data-node-id="<?php echo $key_Sub ?>" style="color:white">
                                    <span><?php echo $val_sub ?></span>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                        <?php
                    }
                    ?>

                </li>
                <?php
            }
            ?>
        </ul>

        <script type="text/javascript">

            $(document).ready(function() {
                $('#basic').simpleTree();
                /*$('input[data-main]').checkboxpicker({
                      html: true,
                      offLabel: '<span class="fa fa-window-close">',
                      onLabel: '<span class="fa fa-check">'
                    }).on('change', function(e) {

                     if($(this).is(":checked"))
                     {
                         var under="a"+$(this).data('main');
                         $("div#"+under+" input[type=checkbox]:disabled").removeAttr("disabled");
                     }
                    else
                     {
                         var under="a"+$(this).data('main');
                         $("div#"+under+" input[type=checkbox]").removeAttr("checked");
                         $("div#"+under+" input[type=checkbox]:enabled").not(this).prop("disabled", true);
                     }
                    });

                    $('input[data-sub]').on('click',function(e)
                    {
                        var whr=$(this).data('sub');

                        if($(this).is(":checked")){
                        $("input[data-suber="+whr+"]").prop("checked", true);
                        }else{
                        $("input[data-suber="+whr+"]").removeAttr("checked");
                        }
                    });

                    $('input[data-suber]').click(function(e)
                    {
                        var whr=$(this).data('suber');

                        if($(this).is(":checked")){
                        $("input[data-sub="+whr+"]").prop("checked", true);
                        }
                        else
                        {

                            if($("input[data-suber="+whr+"]:checked").length==0)
                            {
                            $("input[data-sub="+whr+"]").removeAttr("checked");
                            }

                        }
                    });*/
            });

        </script>


<?php


	}
    public function username_check(Request $request)
	{
		
		if(User::where('email',$request->email)->exists())
			echo "exists";
		 else
			 echo "available";
		     
    }
    public function get_city_from_state(Request $request)
		{

			$city_collection = City::where('state_id',$request->state_id)->get();
			foreach($city_collection as $val)
			{
			?>
			<option value="<?php echo $val->city_id ?>"><?php echo $val->city_name ?></option>
			<?php
			}


		}
    public function get_edit_vehicle_types(Request $request)
    {
        //To know what the person logged in can change
        $vehicle_type_collection=Vehicle_Type::where('vehicle_type_id',$request->id)->get();


        $data=
            [
                'vehicle_type_collection' =>$vehicle_type_collection
            ];

        return view('master_data.edit_vehicle_type')->with($data);
    }
    public function get_edit_faculty(Request $request)
    {
        $dean_collection = DB::table('tbl_users as u')
            ->select('id','firstname','middlename','lastname')
            ->where('rights_id', 5)//dean rights
            ->get();
        $faculty_collection=Faculty::where('faculty_id',$request->id)->get();

        $data=
            [
                'faculty_collection' =>$faculty_collection,
                'dean_collection' =>$dean_collection
            ];

        return view('master_data.edit_faculty')->with($data);
    }
    public function get_edit_department(Request $request)
    {
        //To know what the person logged in can change
        
        $department_collection=Department::where('department_id',$request->id)->get();
        

        $data=
            [
                'department_collection' =>$department_collection,
            ];

        return view('master_data.edit_department')->with($data);
    }
    public function get_edit_degree_type(Request $request)
    {
        //To know what the person logged in can change
        $degree_collection=Degree_Type::where('degree_type_id',$request->id)->get();

        $data=
            [
                'degree_collection' =>$degree_collection,
            ];

        return view('master_data.edit_degree_type')->with($data);
    }
    public function get_edit_fee(Request $request)
    {
        $fee_collection=DB::table('tbl_fees as f')
            ->leftjoin('tbl_programmes as prog','prog.programme_id','f.programme_id')
            ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','prog.degree_type_id')
            ->select('f.programme_id as programme_id','degree_short_name','fee_id','name','program_type_id','fee_name','fee_class','fee_amount','fee_type','f.degree_class as degree_class')
            ->where('fee_id',$request->id)
            ->get();

        $programme_type_collection=Program_Type::all();

        $data=
            [
                'fee_collection' =>$fee_collection,
                'programme_type_collection' =>$programme_type_collection,
            ];

        return view('fee.edit_fee')->with($data);
    }
    public function get_departments(Request $request)
    {
        $departments=Department::where('faculty_id',$request->id)->get();
        ?>
         <option value="" selected>--Select Department--</option>
        <?php
        foreach($departments as $val){
        ?>
            <option value="<?php echo $val->department_id ?>"><?php echo $val->department_name ?></option>
        <?php
        }
    }
    public function get_departments_for_filter(Request $request)
    {
        $departments=Department::where('faculty_id',$request->id)->get();
        ?>
        <option value="" selected>--All Departments--</option>
        <?php
        foreach($departments as $val){
            ?>
            <option value="<?php echo $val->department_id ?>"><?php echo $val->department_name ?></option>
            <?php
        }
    }
    public function get_edit_programme(Request $request)
    {
        //To know what the person logged in can change
        $programme_collection=Programme::where('programme_id',$request->id)->get();
        $programme_type_collection=Program_Type::all();
        $university_collection=Universities::all();
        $degree_type_collection=Degree_Type::all();
        $faculty_collection=Faculty::all();
        $department_collection=Department::all();

        $data=
            [
                'programme_collection' =>$programme_collection,
                'programme_type_collection'=>$programme_type_collection,
                'university_collection'=>$university_collection,
                'degree_type_collection'=>$degree_type_collection,
                'faculty_collection'=>$faculty_collection,
                'department_collection'=>$department_collection
            ];

        return view('master_data.edit_programme')->with($data);
    }
    public function get_programmes_for_types(Request $request){
        $programme=Programme::where('programme_type_id',$request->id)->where('status',1)
            ->leftJoin('tbl_degree_type','tbl_degree_type.degree_type_id','tbl_programmes.degree_type_id')
            ->leftJoin('tbl_universities','tbl_universities.university_id','tbl_programmes.university_id')
            ->select("programme_id","degree_short_name","name","university")
            ->groupBy('programme_id')
            ->get();
        ?>
        <option value="" selected>--Select Programme--</option>
        <?php
        foreach($programme as $val){
            ?>
            <option value="<?php echo $val->programme_id ?>"><?php echo $val->degree_short_name.' ,'.$val->name ?><?php echo $val->university!=""?" ($val->university)":"" ?></option>
            <?php
        }
	}
    public function get_programmes_for_types_apply(Request $request){
        $programme=Programme::where('programme_type_id',$request->id)
            ->where('status',1)
            ->leftJoin('tbl_degree_type','tbl_degree_type.degree_type_id','tbl_programmes.degree_type_id')
            ->leftJoin('tbl_universities','tbl_universities.university_id','tbl_programmes.university_id')
            ->select("programme_id","degree_short_name","name","university")
            ->groupBy('programme_id')
            ->get();
        ?>
        <option value="" selected>--Select Programme--</option>
        <?php
        foreach($programme as $val){
            ?>
            <option value="<?php echo $val->programme_id ?>"><?php echo $val->degree_short_name.' ,'.$val->name ?><?php echo $val->university!=""?" ($val->university)":"" ?></option>
            <?php
        }
    }
	public function get_course_by_programme(Request $request)
	{
		$course = Course::where('programme_id','!=',$request->id)->where('status',1)
		->groupBy('course_id')
		->get();
		?>
		<option value="" selected>--Select Course--</option>
		<?php
		foreach($course as $val){
			?>
			<option value="<?php echo $val->course_id ?>"><?php echo $val->course_title ?></option>
			<?php
		}
	}
	public function get_selected_course_details(Request $request)
	{

		$coures_collection = Course::where('course_id',$request->id)->get();

		return view('master_data.view_selected_program_details',compact('coures_collection'));
	}

}
