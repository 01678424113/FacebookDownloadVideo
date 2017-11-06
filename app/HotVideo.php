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
 * @property string h1_video
 * @property  string thumbnails
 * @property mixed title_video
 * @property mixed content_top_video
 * @property mixed content_bot_video
 * @property bool|string meta_title
 * @property mixed alt
 */
class HotVideo extends Model
{
    protected $table = 'hot_videos';
    public $timestamps = false;

}
