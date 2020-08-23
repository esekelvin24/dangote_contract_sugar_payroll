<?php

namespace App\Model\Staff;

use Illuminate\Database\Eloquent\Model;

class StaffCreateModel extends Model
{
    //
    protected $table = 'staff';

    protected $fillable = ['staff_id','first_name','last_name','other_name','marital_status','dob','gender','address','lgaid','mobile_phone','email','created_by','created_at','bin_code','account_name','account_number','bvn','designation_id','status','staff_type_id','section_id','updated_at','engagement_date'];
   
    public $incrementing = false;
    
    
}
