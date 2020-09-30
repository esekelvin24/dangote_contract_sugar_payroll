<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universities extends Model
{
    protected $table='tbl_universities';
    protected $primaryKey='university_id';
	public $timestamps = false;
}
