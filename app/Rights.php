<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rights extends Model
{
    protected $table='tbl_rights';
    protected $primaryKey='rights_id';
	public $timestamps = false;

/*public function user(){ return $this->hasOne(Staff::class,'staff_id');}*/
	
   
}
