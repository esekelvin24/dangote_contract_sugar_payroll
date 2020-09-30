<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assessement extends Model
{
    //
    protected $table='tbl_assessement_creation';
    protected $primaryKey='id';
	public $timestamps = false;
}
