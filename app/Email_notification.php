<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $email_notification_id
 * @property boolean $email_notification
 */
class Email_notification extends Model
{
    /**
     * The primary key for the model.
     * 
     * @var string
     */
    protected $primaryKey = 'email_notification_id';

    /**
     * @var array
     */
    protected $fillable = ['email_notification'];

}
