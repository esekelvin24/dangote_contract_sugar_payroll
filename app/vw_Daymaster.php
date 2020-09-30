<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $DayMasterID
 * @property int $e_id
 * @property int $TDate
 * @property string $Entry
 * @property string $Start
 * @property string $BreakOut
 * @property string $BreakIn
 * @property string $Close
 * @property string $Exit
 * @property int $p_flag
 * @property int $group_id
 * @property string $Flag
 * @property int $Work
 */
class vw_Daymaster extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'vw_Daymaster';

    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'DayMasterID';

    /**
     * @var array
     */
    protected $fillable = ['e_id', 'TDate', 'Entry', 'Start', 'BreakOut', 'BreakIn', 'Close', 'Exit', 'p_flag', 'group_id', 'Flag', 'Work'];

}
