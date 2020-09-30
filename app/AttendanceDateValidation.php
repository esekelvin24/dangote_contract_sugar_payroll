<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceDateValidation extends Model
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attendance()
    {
        return $this->belongsTo('App\Attendance');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function validation()
    {
        return $this->belongsTo('App\Validation');
    }
}
