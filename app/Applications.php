<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    protected $table='tbl_applications';
    protected $primaryKey='application_id';
	public $timestamps = false;
}
