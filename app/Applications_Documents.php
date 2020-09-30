<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications_Documents extends Model
{
    protected $table='tbl_applications_documents';
    protected $primaryKey='id';
	public $timestamps = false;
}
