<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $leave_type_id
 * @property int $hr_approver_id
 * @property int $leave_req_submitted_by
 * @property int $hod_approver_id
 * @property int $hod_approver_id_actual
 * @property int $business_unit_id
 * @property int $department_id
 * @property int $office_location
 * @property integer $leave_req_grp_no
 * @property string $leave_date
 * @property boolean $hr_status
 * @property string $note
 * @property string $date_and_time_submitted
 * @property boolean $hod_approver_status
 * @property string $full_uniq_leave_req_id
 * @property string $hod_approved_date
 * @property string $hr_approved_date
 * @property string $attached_doc
 * @property string $leave_start_date
 * @property string $leave_end_date
 * @property string $created_at
 * @property string $updated_at
 * @property string $date_of_employment
 * @property string $job_title
 * @property string $staff_grade_level
 * @property string $contact_address
 * @property string $phone_number
 * @property int $number_of_leave_days_entitled
 * @property BusinessUnit $businessUnit
 * @property Department $department
 * @property User $user
 * @property User $user
 * @property User $user
 * @property User $user
 * @property LeaveType $leaveType
 * @property User $user
 * @property PermentOfficeLocation $permentOfficeLocation
 */
class LeaveRequest extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'leave_type_id', 'hr_approver_id', 'leave_req_submitted_by', 'hod_approver_id', 'hod_approver_id_actual', 'business_unit_id', 'department_id', 'office_location', 'leave_req_grp_no', 'leave_date', 'hr_status', 'note', 'date_and_time_submitted', 'hod_approver_status', 'full_uniq_leave_req_id', 'hod_approved_date', 'hr_approved_date', 'attached_doc', 'leave_start_date', 'leave_end_date', 'created_at', 'updated_at', 'date_of_employment', 'job_title', 'staff_grade_level', 'contact_address', 'phone_number', 'number_of_leave_days_entitled', 'unique_sap_date'];

   
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department_func12()
    {
        return $this->belongsTo('App\Department', 'department_id', 'id');
    }

   /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessunit_func()
    {
        return $this->belongsTo('App\Business_unit', 'business_unit_id', 'bu_id');
    }

  
     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_hr_approver22()
    {
        return $this->belongsTo('App\User', 'hr_approver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_hod_approver22()
    {
        return $this->belongsTo('App\User', 'hod_approver_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function leaveType221()
    {
        return $this->belongsTo('App\Leave_type', 'leave_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user22()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_hod_approver_id_actual22()
    {
        return $this->belongsTo('App\User', 'hod_approver_id_actual');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_leave_req_submitted_by()
    {
        return $this->belongsTo('App\User', 'leave_req_submitted_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function perment_office_location_func()
    {
        return $this->belongsTo('App\perment_office_location', 'office_location', 'perment_office_location_id');
    }


}
