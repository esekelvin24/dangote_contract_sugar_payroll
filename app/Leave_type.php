<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $type
 * @property int $max_days_allowed
 * @property string $created_at
 * @property string $updated_at
 * @property LeaveRequest[] $leaveRequests
 */
class Leave_type extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['type', 'max_days_allowed', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function leaveRequests()
    {
        return $this->hasMany('App\LeaveRequest');
    }
}
