<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\leftSideMenu;
use App\Model\Category_Menu_Header;
use Auth;
use DB;
use Illuminate\Support\Str;


class Utilities
{
    //
    public static function get_menu_array($array)
     {
         /*$user = Auth::user();
        print($user->id);
        print($user->name);
        print($user->email);*/
        
        $role_arr = Auth::user()->roles;
        $role = $role_arr->pluck('id');

        $menu_header = Category_Menu_Header::select('menu_category_header.name','menu_category_header.id')
        ->distinct('menu_category_header.id')
        ->join('menu', 'menu.category_header', '=', 'menu_category_header.id')
        ->join('menugroup', 'menugroup.menu_id', '=', 'menu.menu_id')
        ->where('menugroup.role_id', $role)
        ->where('menu.status', 1)
        ->get();

        $parent = leftSideMenu::select('menu.menu_id','menu.menu_level','menu.parent_id','menu.sub_menu','menu.menu_url','menu.menu_name','menu.menu_url','menu.category_header','menu.icon_class')
        ->join('menugroup', 'menugroup.menu_id', '=', 'menu.menu_id')
        ->where('menugroup.role_id', $role)
        ->where('menu.status', 1)
        ->orderBy('menu_order')
        ->get();
         
        $array["menu_header"] = $menu_header;
        $array["parent"] = $parent;
        
        return $array;
        //return ["menu_header"=> $menu_header,"parent" => $parent];
     }

     
     public static function getnextid($tablename)
     {
        $id = 0;
        
        $numrows = DB::table('gendata')
            ->where('table_name', $tablename)
            ->increment('table_id');

        if($numrows==0){

            $table_val [] =
            [
                    'table_name' => $tablename,
                    'table_id' => '1'  
            ];

            DB::table('gendata')->insert($table_val);
        }

        $id = DB::table('gendata')->where('table_name', $tablename)->first()->table_id;

        //result count when it reaches 
        if($id > 999998){

            $numrows = DB::table('gendata')
            ->where('table_name', $tablename)
            ->increment('table_id');
        }
    
        return $id;
     }

     public static function getnext_staff_id($tablename)
     {
        $id = 0;
        
        $numrows = DB::table('gendata')
            ->where('table_name', $tablename)
            ->increment('table_id');

        if($numrows==0){

            $table_val [] =
            [
                    'table_name' => $tablename,
                    'table_id' => '1'  
            ];

            DB::table('gendata')->insert($table_val);
        }

        $id = DB::table('gendata')->where('table_name', $tablename)->first()->table_id;

        //Stop giving out ID when it above a 1000 for a specific department and job category
        if($id > 1000){

            $id = "";
        }
    
        return $id;
     }



    public static function GenUniqID($c,$d)
    {
        $myclass = new Utilities; 
        ///Explode Date and Time 2Get 14 digits  e.g  HHMMSS+YYYYMMDD
        list($GPIregYear,$GPIregMonth,$GPIregDay) = explode("-",$c);
        list($GPIregTime0,$GPIregTime1,$GPIregTime2) = explode(':',$d);
        //Put the 14 digits 2gether
        $GPItokenT = $GPIregTime0.''.$GPIregTime1.''.$GPIregTime2;
        /////////////////////////////////////////////////////////
        $GPItokenD = $GPIregYear.''.$GPIregMonth.''.$GPIregDay;
        //$dbobject = new dbobject();
        $GPItokenD2 = $myclass->getuniqueid4($GPIregYear,$GPIregMonth,$GPIregDay);
        ///add the 14 digits + the 12 digits ==> 25 digits
        $GPItoken = $GPItokenD2.''.$GPItokenT;
            return $GPItoken;
        //return $GPItokenT;
    }

    public static function paddZeros($id, $length)
	{
		$data = "";
		$zeros = "";
		$rem_len = $length - strlen($id);
		if($rem_len > 0)
		{
			for($i=0; $i<$rem_len; $i++)
			{
				$zeros.="0";
			}
			$data = $zeros.$id;
		}
		else
		{
			$data = $id;
		}
		return $data;
	}


    public function getuniqueid4($y, $m, $d)
    {

    $month_year = array ('01' => '890',
        '02' => '8459',
        '03' => '7638',
        '04' => '7906',
        '05' => '5427',
        '06' => '3565',
        '07' => '1384',
        '08' => '3403',
        '09' => '4314',
        '10' => '4686',
        '11' => '4692',
        '12' => '2025');
    $year = array('2009' => '2488',
        '2010' => '4577',
        '2011' => '7777',
        '2012' => '8733',
        '2013' => '4300',
        '2014' => '3333',
        '2015' => '0000',
        '2016' => '6666',
        '2017' => '9999',
        '2018' => '1233',
        '2019' => '3211',
        '2020' => '4311',
        '2021' => '5211',
        '2022' => '1466',
        '2023' => '2466',
        '2024' => '3579',
        '2025' => '7688',
        '2026' => '5555',
        '2027' => '7707',
        '2028' => '7733',
        '2029' => '4444',
        '2030' => '9622',
        '2031' => '9099',
        '2032' => '8303',
        '2033' => '3498',
        '2034' => '2222',
        '2035' => '1111');

    $day = array('01' => '250',
        '02' => '231',
        '03' => '723',
        '04' => '128',
        '05' => '454',
        '06' => '657',
        '07' => '875',
        '08' => '908',
        '09' => '119',
        '10' => '343',
        '11' => '228',
        '12' => '388',
        '13' => '882',
        '14' => '787',
        '15' => '334',
        '16' => '545',
        '17' => '675',
        '18' => '775',
        '19' => '298',
        '20' => '590',
        '21' => '179',
        '22' => '324',
        '23' => '446',
        '24' => '669',
        '25' => '000',
        '26' => '048',
        '27' => '059',
        '28' => '036',
        '29' => '087',
        '30' => '203',
        '31' => '454');

    $unique_id4 = $year[$y].$month_year[$m].$day[$d];
    return $unique_id4;
    }

    public static function deleteAllPermanently($id,$table_name, $table_id)
    {
       $id = rtrim($id,",");
       DB::table($table_name)->whereIn($table_id,explode(",",$id))->delete();
        
    } 

    public static function getDepartment_code($dept_name)
    {
        $dept_name = substr($dept_name,0,4);
        $dept_id ="";
        $codes = DB::table("department")
        ->where("department_name","LIKE","%$dept_name%")
        ->get();
        
        foreach($codes as $dep)
        {
           $dept_id = $dep->department_id; 
        }
        
        return $dept_id;
    }

    public static function get_staff_id($department_code, $job_category)
    {
       
      $res = DB::table("position_codes")->where("department_id","=",$department_code)->where("category_id","=",$job_category)->get();
      $prefix = "";
      $suffix = "";
      $count = 0;
      foreach($res as $code)
        {
           $prefix = $code->prefix; 
           $suffix = $code->suffix;
        }

        $id = $prefix.$suffix;

        if ($id=="")
        {
           // echo $department_code." ". $job_category;
        }

        $count = Utilities::getnext_staff_id($id);
        $staff_id = $prefix.((int)$count + (int)$suffix);
        return $staff_id;

    }
    public static function get_position_code($position_name)
    {
        $position_name = Str::title($position_name);
        $des_id ="";
        $codes = DB::table("designation")
        ->where("designation_name","=","$position_name")
        ->get();
        
        foreach($codes as $des)
        {
           $des_id = $des->designation_id; 
        }
        return $des_id;
    }
     
    public static function getJobCategory($category_name)
    {
        $category_name = Str::title($category_name);
        $cat_id ="";
        $codes = DB::table("job_category")
        ->where("category_name","=","$category_name")
        ->get();
        
        foreach($codes as $cat)
        {
           $cat_id = $cat->category_id; 
        }
        
        return $cat_id;
    }


    public static function getBankBinCode($bank_name)
    {
       //$bank = substr($bank_name,0,2);

       $filtered_bank = array("Eco Bank", "FCMB","Unity Bank","First Bank","First City Monument Bank","UBA","HERITAGE BANK","SKYE BANK","UNITY BANK","IBTC","STANBIC","KEYSTONE","ECO BANK","ACCESS");
       $found = in_array($bank_name, $filtered_bank);
       
       if ($found)
       {
           if ($bank_name=="FCMB")
           {
            $bank_name = "First City Monument Bank";
           }
           else if ($bank_name=="Eco Bank" || $bank_name =="ECO BANK")
           {
            $bank_name = "Ecobank";
           }
           else if ($bank_name=="UBA")
           {
            $bank_name = "United Bank for Africa";
           }
           else if ($bank_name=="First Bank")
           {
            $bank_name = "First Bank of Nigeria";
           }
           else if ($bank_name=="Heritage Bank" || $bank_name=="HERITAGE BANK")
           {
            $bank_name = "Heritage";
           }
           else if ($bank_name=="SKYE BANK")
           {
            $bank_name = "Skye Bank";
           }
           else if ($bank_name=="UNITY BANK")
           {
            $bank_name = "Unity Bank";
           }
           else if ($bank_name=="KEYSTONE")
           {
            $bank_name = "Keystone Bank";
           }
           else if ($bank_name=="ACCESS")
           {
            $bank_name = "Access Bank";
           }
           else if ($bank_name=="IBTC" || $bank_name=="STANBIC")
           {
            $bank_name = "Stanbic IBTC Bank";
           }else
           {
            return;
           }
            
           
       }

       $codes = DB::table("bank_bincodes")->get();
       $bin_code = "";
       $arr = array();

       foreach($codes as $bin)
       {
         $bin_code = $bin->bin_code;
         similar_text($bank_name, $bin->bank, $percent);

         if ($percent > 40)
         {
            $arr[$bin_code] = $percent;
         }
       }

       asort($arr);
       end($arr);
       return $key = key($arr); 
         

    }
}
