<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string name
 * @property string created_by
 * @property string created_at
 */
class Permission extends Model
{
    protected $table = 'permissions';
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
