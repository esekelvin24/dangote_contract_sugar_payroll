<?php

namespace App\Http\Controllers\excel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\excel\XLSXWriter;
use DB;

class ExcelGenerateController extends Controller
{
    //
    public function download_excel($id)
    {

            $id = base64_decode($id);
            $array = DB::table('tbl_nomination_transaction')->where('group_id',$id)->get();
            
            $arr = array();
            foreach ($array as $val)
            {
            $arr[] = array(substr($val->nomination_date,0,10), $val->daily_estimate_mmscf, $val->daily_estimate_mmbtu);
            } 

            $nomination_type = "nomination";
            
            if(isset($array[0]->nomination_type))
            {
                $nomination_type = DB::table('tbl_nomination_name')->where('id',$array[0]->nomination_type)->first()->nomination_name;
                $nomination_type = $nomination_type." for ".date('jS F Y', strtotime($array[0]->nomination_date));
            }

            if (count($array) < 1)
            {
                exit;
            }
            
            


            header("Content-Disposition: attachment; filename=\"".$nomination_type.".xls\"");
            header("Content-Type: application/vnd.ms-excel;");
            header("Pragma: no-cache");
            header("Expires: 0");
            $out = fopen("php://output", 'w');

            fputcsv($out, array("Nomination Date","MMSCF","MMBtu"),"\t");

            foreach ($arr as $data)
            {
                fputcsv($out, $data,"\t");
            }
               fclose($out);
            }



}
