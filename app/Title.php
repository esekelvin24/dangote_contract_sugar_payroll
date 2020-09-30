<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    protected $table='tbl_title';
    protected $primaryKey='title_id';
	public $timestamps = false;
}
