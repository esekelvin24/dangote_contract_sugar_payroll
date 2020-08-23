<?php

namespace App\Model\Staff;

use Illuminate\Database\Eloquent\Model;

class StaffTimeSheetModel extends Model
{
    //
    protected $table = 'time_sheet_capture';
    protected $fillable = ['sheet_id','numb_days','ot','absent','staff_id','status','approve_at','created_by']; //<---- Add this line 
    protected $primaryKey = ['sheet_id', 'staff_id'];
    public $incrementing = false;
}
