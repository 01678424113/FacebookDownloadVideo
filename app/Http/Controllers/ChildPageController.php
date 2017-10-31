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
        $settings = Setting::where('setting_page','view')->get();
        view()->share('settings',$settings);
    }

    public function showVideo($title_slug, $video_id)
    {
        $autoArticle = AutoArticle::all();
        $titles = explode(';',$autoArticle[0]->title);
        $descriptions = explode(';',$autoArticle[0]->description);
        $keywords = explode(';',$autoArticle[0]->keyword);

        $rd_title = random_int(0,count($titles));
        $rd_description = random_int(0,count($descriptions));
        $rd_keyword = random_int(0,count($keywords));
        $article_seo_video_title = trim($titles[$rd_title]);
        $article_seo_video_description = trim($descriptions[$rd_description]);
        $article_seo_video_keyword = trim($keywords[$rd_keyword]);
        //$article_seo_video = trim($titles[$rd_title])." ".trim($descriptions[$rd_description])." ".trim($keywords[$rd_keyword]);
        $resource['article_seo_video_title'] = $article_seo_video_title;
        $resource['article_seo_video_description'] = $article_seo_video_description;
        $resource['article_seo_video_keyword'] = $article_seo_video_keyword;

        $hot_videos = HotVideo::where('id','>',0)->orderBy('created_at','DESC')->take(6)->get();
        $resource['hot_videos'] = $hot_videos;

        $url_graph = 'https://graph.facebook.com/' . $video_id . '?fields=source,description,length,picture,created_time,likes.limit(999999999)&access_token=' . env('ACCESS_TOKEN_FULL');
        $find_source = Curl::to($url_graph)->get();
        $find_source = json_decode($find_source);

        /** @var string $source */
        $resource['description'] = $find_source->description;
        $created_time = substr($find_source->created_time, 0, 10);

        $resource['created_time'] = $created_time;

        $resource['source'] = $find_source->source;
        $resource['video_id'] = $video_id;
        $resource['title_slug'] = $title_slug;
        return view('page.single-video', $resource);
    }
}
