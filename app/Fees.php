<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fees extends Model
{
    protected $table='tbl_fees';
    protected $primaryKey='fee_id';
	public $timestamps = false;
}
