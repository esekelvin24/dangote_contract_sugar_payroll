<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table='tbl_faculty';
    protected $primaryKey='faculty_id';
	public $timestamps = false;
}
