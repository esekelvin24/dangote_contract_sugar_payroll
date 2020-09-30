<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cross_Course extends Model
{
    //
    protected $table='tbl_cross_courses';
    protected $primaryKey='course_id';
	public $timestamps = false;
}
