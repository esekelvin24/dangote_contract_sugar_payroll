<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Lga extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'lga_id';

    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    protected $fillable = ['lgas'];

    
}
