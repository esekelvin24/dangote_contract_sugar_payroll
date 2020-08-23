<?php

namespace App\Http\Controllers\Staff;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Utilities;
use DB;
use Auth;

class CategoryController extends Controller
{
    //
   

    public function index(Request $request)
    {

        if(request()->ajax())
        {
            if(!empty($request->start_date) && !empty($request->end_date))
            {
                 $data = DB::table('job_category')
                ->whereBetween('created_at', array($request->start_date . " 00:00", $request->end_date . " 23:59"))
                ->get();
            }
            else
            {
                 $data = DB::table('job_category')
                ->get();
            }

            return datatables()->of($data)->make(true);
        }

        return view ('staff.category_list_page', Utilities::get_menu_array(array()));
    }

   


    public function create_new($op="",$cat_id="")
    {
        $category_name ="";
        
        if ($op =="update")
        {
           $category_obj = DB::table('job_category')->where('category_id', $cat_id)->first();
           $category_name = isset($category_obj->category_name)?$category_obj->category_name:"";
          
        }
        
        
        return view ('staff.create_category_page', Utilities::get_menu_array(array("op"=>$op,"cat_id"=>$cat_id,"category_name"=> $category_name ,"message"=>"none","code"=>"none")));
    }

    public function deleteAllPermanently($id)
    {
        Utilities::deleteAllPermanently($id,"job_category", "category_id");
        
    } 

    public function save(Request $request)
    {
        $this->validate(request(), [
            'category_name' => 'required',
            'op' => 'required',
            'cat_id' => 'required',
            ]);

            $message = "";
            $op = $request->op;
            $cat_id = $request->cat_id;

            if($request->op == "new")
            {
                $category_id = "cat".Utilities::paddZeros(Utilities::getnextid("category"),0);
            }else
            {
                $category_id = $request->cat_id;
            }

            
            $category_name = $request->category_name;
            

            $category_insert [] =
            [
                'category_id' => $category_id,
                'category_name' => $category_name,
                'created_by' => Auth::user()->email,
                'created_at' => NOW()
            ];

          try
           {
                if ($op == "new")
                {
                    $category_data = DB::table('job_category')->insert($category_insert);
                    if($category_data  )
                    {
                                
                        $message = ''.$category_name.' category has been created successfully ';
                        $code = "200";
                    }
                }else
                {
                    unset($category_insert[0]["category_id"]);
                    unset($category_insert[0]["created_by"]);
                    unset($category_insert[0]["created_at"]);

                    $category_data = DB::table('job_category')->where('category_id', $cat_id)->update($category_insert[0]);
                    
                    if($category_data  )
                    {
                                
                        $message = ''.$category_name.' category has been updated successful ';
                        $code = "200";
                    } 
                }
                
            }
            catch(\Exception $exception)
            {
               
                
               $message = ' Error creating '.$category_name.' category please contact admin'; 
               $code = "213";
            }

            return view ('staff.create_category_page', Utilities::get_menu_array(array("op"=>$op,"cat_id"=>$cat_id, 'category_name' => $category_name,"message"=>$message,"code"=>$code)));

    }
}
