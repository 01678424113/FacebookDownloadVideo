<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string content
 * @property string keyword
 * @property string create_at
 */
class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = false;
}
