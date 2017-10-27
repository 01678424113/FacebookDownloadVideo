<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property  int video_id
 * @property  string description
 * @property string title_slug
 * @property string picture
 * @property string length
 * @property int likes
 * @property bool|string created_at
 * @property bool|string download_at
 */
class HotVideo extends Model
{
    protected $table = 'hot_videos';
    public $timestamps = false;

}
