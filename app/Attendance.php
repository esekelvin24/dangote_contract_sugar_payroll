<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_sap
 * @property string $attendance_date
 * @property string $start
 * @property string $close
 * @property int $uploaded_by
 * @property string $created_at
 * @property string $updated_at
 */
class Attendance extends Model
{
    /**
     * @var array
     */
    protected $table = 'attendances';
      /**
     * @var array
     */
    protected $fillable = ['user_sap', 'attendance_date', 'start', 'close', 'uploaded_by', 'created_at', 'updated_at'];

}
