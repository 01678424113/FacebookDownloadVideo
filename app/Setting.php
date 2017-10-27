<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string key_setting
 * @property string value_setting
 * @property int created_by
 * @property string created_at
 * @property string setting_page
 */
class Setting extends Model
{
    protected $table = 'settings';
    public $timestamps = false;
}
