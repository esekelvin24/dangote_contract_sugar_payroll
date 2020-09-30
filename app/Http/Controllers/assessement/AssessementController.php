<?php

namespace App\Http\Controllers\assessement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;

class AssessementController extends Controller
{
    //

    public function set_assessement_weight()
    {

        return view('assessement.new_assessement_weight');
    }


    public function save_assessement_weight(Request $request)
    {
        $rules =
        [
            'ca_grade'=>'required|array',
            'assessement_type'=>'required|numeric',
            'exam_grade'=>'required|numeric',
            
        ];
    
        //check validation options
        $this->validate($request,$rules);

        if ($request->assessement_type == 2)
        {
            count($request->assessement_grade);
        }



    }




}
