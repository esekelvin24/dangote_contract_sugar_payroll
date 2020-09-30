<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nomination extends Model
{
    //
    protected $table='tbl_nomination_transaction';
    protected $primaryKey='id';
	public $timestamps = false;
}
