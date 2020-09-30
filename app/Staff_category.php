<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $staff_category_id
 * @property string $staff_category_name
 * @property string $staff_category_descrition
 * @property int $end_record
 * @property string $created_at
 * @property string $updated_at
 * @property User[] $users
 */
class Staff_category extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'staff_category_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['staff_category_name', 'staff_category_descrition', 'end_record', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'user_category_id', 'staff_category_id');
    }
}
