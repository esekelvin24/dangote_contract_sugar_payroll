<?php

namespace App\Http\Controllers;

use App\Validation;
use Auth;
use DB;
use Gate;
use Alert;
use Illuminate\Support\Collection;
use App\Leave;
use App\AttendanceDateValidation;
use App\LeaveRequest;
use App\User;
use Carbon\Carbon;
use App\Attendance;
use Illuminate\Http\Request;

class ValidationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = \Auth::user(); //note the user that logs in
        $loggedin_user_id = Auth::user()->id;

        function generateDateRange(Carbon $start_date, Carbon $end_date)
        {
            $dates = array();

            for($date = $start_date; $date->lte($end_date); $date->addDay()) {
                $dates[] = $date->format('Y-m-d');
            }

            return $dates;
        }
        $dates = array();
        $leavedays = LeaveRequest::where('user_id', Auth::user()->id)->where('hod_approver_status', 1)->orderBy('id', 'asc')->get();
        foreach ($leavedays as $key => $leaveday) {
                 $start_date = $leaveday->start_date;
                 $end_date = $leaveday->end_date;
                 $dates[] = generateDateRange(Carbon::parse($start_date), Carbon::parse($end_date));
                
            }
            $leave_array = array_collapse($dates);


        
        if ($user->can('can-validate-attendance'))
            {
        $myHods = User::where('id', $loggedin_user_id)->pluck('name','id');
         }
        else{
        $myHods = User::all()->pluck('name','id');
         }

        $leaveTypes=Leave::orderBy('type')->pluck('type','id');
        $validations = Validation::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $start = new Carbon('first day of last month');
        $start->startOfMonth();
        $end = new Carbon('last day of last month');
        $end->endOfMonth();
        //return($end);
        $attendances = Attendance::where("user_sap", Auth::user()->sap)->where("attendance_date", '>=', $start)->where("attendance_date", '<=', $end)
                    ->whereNotIn('id', function($q){
                        $q->select('attendance_id')->from('attendance_date_validations');
                    })
                    ->whereIn('id', function($q){
                        $q->select('id')->from('attendances')

                        ->where(function($q)
                            {
                                $q->where("start", '=', '')
                                  ->orWhere("start", '=', NULL)
                                  ->orWhere("close", '=', '')
                                  ->orWhere("close", '=', NULL);

                            });
                        

                    })->select('attendance_date', 'id', 'start', 'close')->get();

                   // return $leave_array;
        $i = 0;
        $datesForValidation = array();
        foreach ($attendances as $key => $value) {
           if(in_array($value->attendance_date,$leave_array)){
                //$datesForValidation[]
           } else {
                if(\Carbon\Carbon::parse($value->attendance_date)->isWeekday()){
                    $datesForValidation[$i]['attendance_date'] =  $value->attendance_date;
                    $datesForValidation[$i]['attendance_date_id'] =  $value->id;
                }
           }
           $i++;
        }
        $datesForValidationCollection =  Collection::make($datesForValidation)->pluck('attendance_date','attendance_date_id');
        $staffvalidationrequests = Validation::where('hod_approver', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        //return($datesForValidationCollection);
        return view('pages.my_validation', compact('validations', 'myHods', 'datesForValidationCollection', 'staffvalidationrequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Validation;
        $this->validate($request,[
                'dates_validating'=>'required',
                'reason'=>'required',
                'hod'=>'required',
            ]);
        $dates_validating = $request->dates_validating;
        
        $data->user_id = Auth::user()->id;
        $data->reason = $request->reason;
        $data->hod_approver = $request->hod;
        $data->save();
        $validation_id = $data->id;
        foreach ($dates_validating as $date){
            $insert[] = ['validation_id' => $validation_id, 'attendance_id' => $date, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()];
        }
        if(!empty($insert)){

                    DB::table('attendance_date_validations')->insert($insert);

                    return back()->with('success', 'Validation Request Submitted successfully.');

                }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function show(Validation $validation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function edit(Validation $validation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Validation $validation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Validation  $validation
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $data = Validation::find($id);
        $response = $data->delete();
        if ($response) {
            echo "Record Deleted successfully.";
        } else {
            echo "There was a problem. Please try again later.";
        }
    }

    public function approve(Request $request)
    {
        $id = $request->id;
        $data = Validation::find($id);
        $data->hod_approver_status = 1;
        $response = $data->save();
        if ($response) {
            echo "Validation Approved.";
        } else {
            echo "There was a problem. Please try again later.";
        }
    }

    public function reject(Request $request)
    {
        $id = $request->id;
        $data = Validation::find($id);
        $data->hod_approver_status = 2;
        $response = $data->save();
        if ($response) {
            echo "Validation Rejected.";
        } else {
            echo "There was a problem. Please try again later.";
        }
    }
}
