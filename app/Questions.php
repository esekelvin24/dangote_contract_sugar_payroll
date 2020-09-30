<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table='tbl_questions';
    protected $primaryKey='question_id';
	public $timestamps = false;
}
