<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $hod_approver_id
 * @property int $hr_approver_id
 * @property int $reg_request_submited_by
 * @property int $hod_approver_id_actual
 * @property int $hr_approver_id_actual
 * @property string $reason
 * @property string $date_to_regulate
 * @property int $regularisation_grp_no
 * @property boolean $hod_approver_status
 * @property boolean $hr_status
 * @property string $created_at
 * @property string $updated_at
 * @property string $date_and_time_submited
 * @property User $user
 * @property User $user
 * @property User $user
 * @property User $user
 * @property User $user
 * @property User $user
 * @property AttendanceDateValidation[] $attendanceDateValidations
 */
class Regularisation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['sap','user_id', 'hod_approver_id', 'hr_approver_id', 'reg_request_submited_by', 'hod_approver_id_actual', 'department_id', 'location_id', 'reason', 'date_to_regulate', 'regularisation_grp_no', 'hod_approver_status', 'hr_status', 'created_at', 'updated_at', 'date_and_time_submited', 'full_uniq_reg_id', 'attached_doc', 'unique_sap_date'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_hod_approver_id_actual()
    {
        return $this->belongsTo('App\User', 'hod_approver_id_actual');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_hr_approver_id_actual()
    {
        return $this->belongsTo('App\User', 'hr_approver_id_actual');
    }

/**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_hr_approver()
    {
        return $this->belongsTo('App\User', 'hr_approver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_hod_approver()
    {
        return $this->belongsTo('App\User', 'hod_approver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_reg_request_submited_by()
    {
        return $this->belongsTo('App\User', 'reg_request_submited_by');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attendanceDateValidations()
    {
        return $this->hasMany('App\AttendanceDateValidation', 'validation_id');
    }


 /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perment_office_location_func()
    {
        return $this->belongsTo('App\perment_office_location', 'location_id', 'perment_office_location_id');
    }

  /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department_func()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }

}
