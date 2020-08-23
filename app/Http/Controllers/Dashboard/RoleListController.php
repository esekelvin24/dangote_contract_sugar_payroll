<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use DB;
use Auth;

class RoleListController extends Controller
{
    //
    public function index(Request $request)
    {
        
            if(request()->ajax())
            {
                if(!empty($request->start_date) && !empty($request->end_date))
                {
                     $data = DB::table('roles')
                    ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->get();
                }
                else
                {
                     $data = DB::table('roles')
                    ->get();
                }

                return datatables()->of($data)->make(true);
            }
       
       return view('dashboard/role_list_page', Utilities::get_menu_array(array()));
    }



    public function deleteAllPermanently($id)
    {
       $id = rtrim($id,",");
       DB::table("roles")->whereIn('id',explode(",",$id))->delete();
        
    } 
}
