<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'department_id', 'role', 'sap'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function bloodgroup()
    {
        return $this->belongsTo('App\BloodGroup');
    }

    // public function roles()
    // {
    //     return $this->belongsToMany(Role::class,'role_users');
    // }

    // public function hasAccess(array $permissions)
    // {
    //     foreach($this->roles as $role){
    //         if($role->hasAccess($permissions)){
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    // public function inRole($roleSlug)
    // {
    //     return $this->roles->where('slug',$roleSlug)->count()==1;
    // }
}
