<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property mixed username
 * @property string password
 * @property mixed name
 * @property mixed permission_id
 * @property string created_at
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public $timestamps = false;

    public function permission()
    {
        return $this->belongsTo(Permission::class,'permission_id');
    }

    public function articleCreated()
    {
        return $this->hasMany(Article::class,'created_by');
    }
    public function articleUpdated()
    {
        return $this->hasMany(Article::class,'updated_by');
    }

    public function autoArticleCreated()
    {
        return $this->hasMany(Article::class,'created_by');
    }
    public function autoArticleUpdated()
    {
        return $this->hasMany(Article::class,'updated_by');
    }

    public function settingCreated()
    {
        return $this->hasMany(Article::class,'created_by');
    }
    public function settingUpdated()
    {
        return $this->hasMany(Article::class,'updated_by');
    }
}
