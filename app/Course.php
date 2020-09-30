<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    protected $table='tbl_courses';
    protected $primaryKey='course_id';
	public $timestamps = false;
}
