<?php

namespace App\Model\Staff;

use Illuminate\Database\Eloquent\Model;

class PayrollModel extends Model
{
    //
    protected $table = "payroll_staff_record";
    protected $fillable = ['payroll_id','staff_id','payment_type','payment_description','amount','absense_from_work','days_worked','overtime_hrs','month_of','cat_group_id','status','advance','arrears','created_by']; //<---- Add this line 
    protected $primaryKey = ['payroll_id', 'staff_id','payment_description','month_of'];
    public $incrementing = false;

    
}
