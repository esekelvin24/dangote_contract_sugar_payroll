<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use DataTables;
use App\Http\Controllers\Controller;
use App\Model\leftSideMenu;
use App\Model\Category_Menu_Header;
use App\Http\Controllers\Utilities;
use DB;
use Auth;

class MenuListController extends Controller 
{
    //
    public function index(Request $request)
    {
        
            if(request()->ajax())
            {
                if(!empty($request->start_date) && !empty($request->end_date))
                {
                     $data = DB::table('menu')
                    ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                    ->get();
                }
                else
                {
                     $data = DB::table('menu')
                    ->get();
                }

                return datatables()->of($data)->make(true);
            }
       
       return view('dashboard/menu_list_page', Utilities::get_menu_array(array()));
    }

    public function deleteAllPermanently($id)
    {
        Utilities::deleteAllPermanently($id,"menu", "menu_id");
        
    } 

    
}
