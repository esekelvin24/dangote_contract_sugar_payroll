<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program_Type extends Model
{
    protected $table='tbl_program_type';
    protected $primaryKey='program_type_id';
	public $timestamps = false;
}
