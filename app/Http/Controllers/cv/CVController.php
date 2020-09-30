<?php

namespace App\Http\Controllers\cv;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CVController extends Controller
{
    //
    public function uploaded_cv(Request $request)
    {
        $cv_collection = DB::table('tbl_cv_upload as upload')
        ->join('tbl_designation','upload.designation_id','tbl_designation.designation_id')
        ->get();




        return view('cv.cv', compact('cv_collection'));
    }


}
