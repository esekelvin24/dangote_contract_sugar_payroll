<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $permissions
 * @property string $created_at
 * @property string $updated_at
 * @property RoleUser[] $roleUsers
 */
class rolls extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'roles';

    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'permissions', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roleUsers()
    {
        return $this->hasMany('App\RoleUser');
    }
}
