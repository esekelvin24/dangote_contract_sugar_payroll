<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'lastname', 'othername' , 'gender' , 'email', 'created_by', 'password','mobile_phone', 'dob','passchg_logon','user_disabled','user_locked','override_wh','day_1','day_2','day_3','day_4','day_5','day_6','day_7',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    public function roles()
    {
        return $this->belongsToMany('App\Model\Role');
    }

    

    public function makeUser($role_id)
     {
        $assigned_roles[] = $role_id;
         /*$assigned_roles = array();
         $roles = array_fetch(Role::all()->toArray(), 'name');
 
         switch ($title) {
             case 'super_admin':
                 $assigned_roles[] = $this->getIdInArray($roles, 'edit_customer');
                 $assigned_roles[] = $this->getIdInArray($roles, 'delete_customer');
             case 'admin':
                 $assigned_roles[] = $this->getIdInArray($roles, 'create_customer');
             case 'concierge':
                 $assigned_roles[] = $this->getIdInArray($roles, 'add_points');
                 $assigned_roles[] = $this->getIdInArray($roles, 'redeem_points');
                 break;
             default:
                 throw new \Exception("The employee status entered does not exist");
         }*/
 
         $this->roles()->attach($assigned_roles);
     }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Add a mutator to ensure hashed passwords
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
