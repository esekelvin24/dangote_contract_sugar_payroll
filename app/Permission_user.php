<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $permission_id
 * @property integer $team_id
 * @property integer $user_id
 * @property string $user_type
 * @property Permission $permission
 * @property Team $team
 */
class Permission_user extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
     public $timestamps = false;
     // protected $table = 'singular';
    protected $table = 'permission_user';

    /**
     * @var array
     */
    protected $fillable = ['permission_id', 'team_id', 'user_id', 'user_type'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function permission()
    {
        return $this->belongsTo('App\Permission');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function team()
    {
        return $this->belongsTo('App\Team');
    }
}
