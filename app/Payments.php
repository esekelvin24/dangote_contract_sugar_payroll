<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    protected $table='tbl_payments';
    protected $primaryKey='payment_id';
	public $timestamps = false;
}
