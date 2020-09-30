<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission_role extends Model
{
	//this is require for the compositekey to work
	use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;

	 public $timestamps = false;
	 // protected $table = 'singular';
	 protected $table = 'permission_role';
    
	// protected $primaryKey = null;
    public $incrementing = false;

    //for compositekey to work
    protected $primaryKey = ['permission_id', 'role_id'];



	  public function role()
	{
		return $this->belongsTo('App\Role','role_id');
	}

	public function permission()
	{
		return $this->belongsTo('App\Permission','permission_id');
	}
}
