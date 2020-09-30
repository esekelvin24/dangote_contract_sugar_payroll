<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $role_id
 * @property int $team_id
 * @property int $user_id
 * @property string $user_type
 * @property Role $role
 * @property Team $team
 */
class Role_user extends Model
{
    //this is require for the compositekey to work
    use \LaravelTreats\Model\Traits\HasCompositePrimaryKey;
    public $timestamps = false;

    // protected $primaryKey = null;
    public $incrementing = false;

    //for compositekey to work
    protected $primaryKey = ['user_id', 'role_id']; 


     // protected $table = 'singular'; //this is used when your table name is singular
     protected $table = 'role_user'; //this is used when your table name is singular
    /**
     * @var array
     */
    protected $fillable = ['role_id', 'team_id', 'user_id', 'user_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
