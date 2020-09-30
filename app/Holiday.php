<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $holiday_id
 * @property string $holiday_name
 * @property string $created_at
 * @property string $updated_at
 */
class Holiday extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'holiday_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['holiday_name', 'created_at', 'updated_at'];

}
