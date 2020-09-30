<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $bu_id
 * @property string $bu_name
 * @property string $bu_desc
 * @property string $created_at
 * @property string $updated_at
 * @property boolean $end_record
 * @property User[] $users
 */
class Business_unit extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'business_unit';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'bu_id';

    /**
     * @var array
     */
    protected $fillable = ['bu_name', 'bu_desc', 'created_at', 'updated_at', 'end_record'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', null, 'bu_id');
    }
}
