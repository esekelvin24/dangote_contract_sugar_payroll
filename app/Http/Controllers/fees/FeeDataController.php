<?php

namespace App\Http\Controllers\fees;


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
use App\Fees;



class FeeDataController extends Controller
{
    ####FEE
    public function create_fee()
    {
        $programme_type_collection=Program_Type::all();
        $university_collection=Universities::all();
        $data=[
            'programme_type_collection'=>$programme_type_collection,
            'university_collection'=>$university_collection
        ];
        return view('fee.new_fee')->with($data);
    }
    public function save_fee(Request $request)
    {
        $rules =
            [
                'fee_type'=>'required|numeric',
                'program_type_id'=>'required',
                'programme_id'=>'sometimes|nullable|required_if:fee_type,2',
                'degree_class'=>'sometimes|nullable|required_if:fee_type,1',
                'fee_name'=>'required',
                'fee_amount'=>'required',
                'fee_class'=>'required|numeric',
            ];
        //check validation options
        $this->validate($request,$rules);


        $fee = new Fees;
        $fee->fee_type = $request->fee_type;
        $fee->program_type_id = $request->program_type_id;
        $fee->programme_id = $request->programme_id;
        if($request->degree_class)
            $fee->degree_class = $request->degree_class;
        if($request->fee_type==1 && $request->program_type_id && trim($request->university_id)!="")
            $fee->university_id = $request->university_id;
        $fee->fee_name = $request->fee_name;
        $fee->fee_amount = str_replace(",","",$request->fee_amount);
        $fee->fee_class = $request->fee_class;
        $fee->created_by=Auth::user()->id;
        $fee->creation_date=date('Y-m-d H:i:s');
        $fee->save();
        $data=[
            'success'=>'New Fee created successfully!'
        ];
        return redirect()->route('create_fee')->with($data);
    }
    public function view_fee()
    {
        $fee_collection=DB::table('tbl_fees as f')
            ->leftjoin('tbl_program_type as prog_type','prog_type.program_type_id','f.program_type_id')
            ->leftjoin('tbl_programmes as prog','prog.programme_id','f.programme_id')
            ->leftjoin('tbl_degree_type as deg_type','deg_type.degree_type_id','prog.degree_type_id')
            ->select('prog.programme_id as programme_id','degree_short_name','fee_id','name','program_type_name','fee_name','fee_class','fee_amount','fee_type','duration','f.degree_class as degree_class')
            ->get();
        return view('fee.view_fee')->with('fee_collection',$fee_collection);
    }
    public function save_edit_fee(Request $request)
    {
        $rules =
            [
                'fee_type'=>'required|numeric',
                'program_type_id'=>'required',
                'programme_id'=>'sometimes|nullable|required_if:fee_type,2',
                'degree_class'=>'sometimes|nullable|required_if:fee_type,1',
                'fee_name'=>'required',
                'fee_amount'=>'required',
                'fee_class'=>'required|numeric',
            ];
        //check validation options
        $this->validate($request,$rules);
        $fee=Fees::find($request->fee_id);
        $fee->fee_type = $request->fee_type;
        $fee->program_type_id = $request->program_type_id;
        $fee->programme_id = $request->programme_id;
        if($request->degree_class)
            $fee->degree_class = $request->degree_class;
        $fee->fee_name = $request->fee_name;
        $fee->fee_amount = str_replace(",","",$request->fee_amount);
        $fee->fee_class = $request->fee_class;
        $fee->save();
        $data=[
            'success'=>'Edits were saved successfully'
        ];
        return redirect()->route('edit_fee')->with($data);

    }

}
