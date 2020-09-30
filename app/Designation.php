<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table='tbl_designation';
    protected $primaryKey='designation_id';
	public $timestamps = false;

}
