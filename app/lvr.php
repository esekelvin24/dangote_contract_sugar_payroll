<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $validation_id
 * @property int $attendance_id
 * @property string $created_at
 * @property string $updated_at
 * @property Attendance $attendance
 * @property Validation $validation
 */
class lvr extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'attendance_date_validations';

    /**
     * @var array
     */
    protected $fillable = ['validation_id', 'attendance_id', 'created_at', 'updated_at'];

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
