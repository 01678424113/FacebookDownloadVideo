<?php

namespace App\Http\Controllers;

use App\AutoArticle;
use App\HotVideo;
use App\Setting;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class ChildPageController extends Controller
{
    /**
     * @param $title_slug
     * @param $video_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function __construct()
    {
        $brand_setting = Setting::where('setting_page','domain')->get();
        $brand_setting = $brand_setting[0]->value_setting;
        view()->share('brand',$brand_setting);
        $logo_setting = Setting::where('setting_page','logo')->get();
        $logo_setting = $logo_setting[0]->value_setting;
        view()->share('logo',$logo_setting);
    }

    public function showVideo($title_slug, $video_id)
    {

        $hot_videos = HotVideo::where('id','>',0)->orderBy('created_at','DESC')->take(6)->get();
        $video_show = HotVideo::where('video_id',$video_id)->first();
        $resource['video_show'] = $video_show;
        $resource['hot_videos'] = $hot_videos;

        $url_graph = 'https://graph.facebook.com/' . $video_id . '?fields=source,description,length,picture,created_time,likes.limit(999999999)&access_token=' . env('ACCESS_TOKEN_FULL');
        $find_source = Curl::to($url_graph)->get();
        $find_source = json_decode($find_source);

        /** @var string $source */
        $created_time = substr($find_source->created_time, 0, 10);
        $resource['created_time'] = $created_time;
        $resource['source'] = $find_source->source;
        $resource['description'] = $find_source->description;
        return view('page.single-video', $resource);
    }
}
