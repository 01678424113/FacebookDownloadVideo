<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string title
 * @property mixed description
 * @property mixed keyword
 * @property mixed created_by
 * @property string created_at
 */
class AutoArticle extends Model
{
    protected $table = 'auto_articles';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
