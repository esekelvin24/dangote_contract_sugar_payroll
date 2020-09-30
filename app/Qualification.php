<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Qualification extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'qualification_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $fillable = ['qualifications'];

    
}
