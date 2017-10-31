<?php

namespace App\Http\Controllers;

use App\AutoArticle;
use App\HotVideo;
use App\Setting;
use Exception;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Sunra\PhpSimple\HtmlDomParser;

class PageController extends Controller
{
    public function __construct()
    {
        $settings = Setting::where('setting_page','index')->get();
        view()->share('settings',$settings);
    }

    public function getPublicVideo()
    {
        $response = [
            'title' => 'Facebook Download Video Public'
        ];
        $hot_videos = HotVideo::where('id','>',0)->orderBy('created_at','DESC')->take(6)->get();
        $response['hot_videos'] = $hot_videos;
        return view('page.index', $response);

    }

    public function postPublicVideo(Request $request)
    {
        $url = $request->url_video;
        $str_condition = '/(video)(.+)(perm)/';
        preg_match($str_condition, $url, $id_video);

        if (empty($id_video)) {
            $str_condition = '/(videos)(.+)/';
            preg_match($str_condition, $url, $id_video);
            if (empty($id_video)) {
                return redirect()->back()->with('error', 'Link is invalid or video not public !');
            }
            $id_video = substr($id_video[2], 1, -1);
        } else {
            $id_video = substr($id_video[0], 7, -6);
        }
        //Kiểm tra đây là link trang cá nhân hay link page. Link page sẽ không có đuôi perm
        $url_graph = 'https://graph.facebook.com/' . $id_video . '?fields=source,description,length,picture,created_time,likes.limit(999999999)&access_token=' . env('ACCESS_TOKEN_FULL');
        try {
            $find_source = Curl::to($url_graph)->get();

            $find_source = json_decode($find_source);
            $description = $find_source->description;
            $source = $find_source->source;
            $video_id = $find_source->id;
            $length = $find_source->length;
            $picture = $find_source->picture;

            $video_hot = HotVideo::where('video_id', $video_id)->first();

            if ($video_hot == null) {
                if (!empty($find_source->likes)) {
                    $likes = $find_source->likes;
                    $likes = count($likes->data);

                    if ($likes > 50) {
                        $hot_video = new HotVideo();
                        $hot_video->video_id = $video_id;
                        $description = substr($description, 0, 70);
                        $hot_video->description = $description;

                        //Create auto h1 video
                        $settings_title= Setting::select(['value_setting'])->where('setting_page','view')->where('key_setting','title_view')->get();
                        $settings_description = Setting::select(['value_setting'])->where('setting_page','view')->where('key_setting','description_view')->get();
                        $settings_h1= Setting::select(['value_setting'])->where('setting_page','view')->where('key_setting','h1_view')->get();
                        $settings_content= Setting::select(['value_setting'])->where('setting_page','view')->where('key_setting','content_view')->get();

                        $settings_title = $settings_title[0]->value_setting;
                        $settings_description = $settings_description[0]->value_setting;
                        $settings_h1 = $settings_h1[0]->value_setting;
                        $settings_content = $settings_content[0]->value_setting;

                        $titles = explode(';',$settings_title);
                        $descriptions = explode(';',$settings_description);
                        $h1s = explode(';',$settings_h1);
                        $contents = explode(';',$settings_content);

                        $rd_number_title = random_int(0,count($titles));
                        $rd_number_description = random_int(0,count($descriptions));
                        $rd_number_h1 = random_int(0,count($h1s));
                        $rd_number_content = random_int(0,count($contents));

                        $rd_title = trim($titles[$rd_number_title]);
                        $rd_description = trim($titles[$rd_number_description]);
                        $rd_h1 = trim($titles[$rd_number_h1]);
                        $rd_content = trim($titles[$rd_number_content]);

                        $hot_video->h1_video = $description." ".$rd_h1;

                        $hot_video->content_video = "<a href='{{route('home')}}' >".$rd_title."</a>"." help you download video \" ".$description." \".".$rd_description.$rd_content.".";


                        $hot_video->title_slug = str_slug($description, "-");
                        $hot_video->picture = $picture;
                        $hot_video->length = $length;
                        $hot_video->likes = $likes;
                        $hot_video->created_at = substr($find_source->created_time, 0, 10);
                        $hot_video->download_at = microtime(true);
                        $hot_video->save();
                        return redirect()->back()->with('source', $source)
                            ->with('video_id', $video_id);
                    }
                } else {
                    $likes = 0;
                }
            }
            return redirect()->back()->with('source', $source)
                ->with('video_id', $video_id);
        } catch (Exception $e) {
            dd($e);
            return redirect()->back()->with('error', 'Link is invalid or video not public !');
        }
    }

    public function getPrivateVideo()
    {
        $response = [
            'title' => 'Facebook Download Video Private'
        ];
        $hot_videos = HotVideo::where('id','>',0)->orderBy('created_at','DESC')->take(6)->get();
        $response['hot_videos'] = $hot_videos;
        return view('page.private-video', $response);

    }

    public function postPrivateVideo(Request $request)
    {
        $html = $request->html_page_video;
        if (preg_match_all("/sd_src\:\"(.*?)\"/", $html, $matches)) {
            $source = $matches[1][0];
            $find_description = HtmlDomParser::str_get_html($html);
            $description = $find_description->find('#pageTitle',0)->text();

            preg_match_all("/<span class=\"fcg\">(\d+) Views<\/span>/",$html,$result);
            if(!empty($result[1][0])){
                $view = $result[1][0];
            }else{
                $view = "...";
            }


            return redirect()->back()->with('source',$source)
                                    ->with('description',$description)
                                    ->with('view',$view);
        }
        return redirect()->back()->with('error', 'Source is invalid!');
    }

    public function getFindId()
    {
        $hot_videos = HotVideo::where('id','>',0)->orderBy('created_at','DESC')->take(6)->get();
        $response = [
            'title'=>'Find ID Facebook By URL'
        ];
        $response['hot_videos'] = $hot_videos;
        return view('page.find-id-facebook',$response);
    }

    public function postFindId(Request $request)
    {
        $url = $request->url_find_id;
        $username = substr($url,25);
        $url_graph = 'https://graph.facebook.com/' . $username . '?access_token='. env('ACCESS_TOKEN_FULL');
        $html = Curl::to($url_graph)->get();
        $html = json_decode($html);
        $facebook_id = $html->id;
        return redirect()->back()->with('facebook_id',$facebook_id);

    }
}
