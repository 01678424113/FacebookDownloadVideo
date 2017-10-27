<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property string content
 * @property string keyword
 * @property string description
 * @property string slug
 * @property string created_at
 * @property string created_by
 */
class Article extends Model
{
    protected $table = 'articles';
    public $timestamps = false;
}
