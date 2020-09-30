<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Accomodation_status extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'accomodation_status_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $fillable = ['accomodation_status'];

    
}
