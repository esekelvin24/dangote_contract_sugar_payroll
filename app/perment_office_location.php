<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $perment_office_location_id
 * @property string $perment_office_location_name
 * @property string $perment_office_location_address
 * @property string $created_at
 * @property string $updated_at
 * @property User[] $users
 */
class perment_office_location extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'perment_office_location_id';

    /**
     * @var array
     */
    protected $fillable = ['perment_office_location_name', 'perment_office_location_address', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany('App\User', 'perment_office_location', 'perment_office_location_id');
    }
}
