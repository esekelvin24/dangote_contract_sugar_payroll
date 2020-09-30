<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree_Type extends Model
{
    protected $table='tbl_degree_type';
    protected $primaryKey='degree_type_id';
	public $timestamps = false;
}
