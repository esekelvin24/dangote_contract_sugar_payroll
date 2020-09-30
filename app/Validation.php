<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Validation extends Model
{
    public function hod()
    {
        return $this->belongsTo('App\User', 'hod_approver');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendanceDateValidations()
    {
        return $this->hasMany('App\AttendanceDateValidation');
    }
}
