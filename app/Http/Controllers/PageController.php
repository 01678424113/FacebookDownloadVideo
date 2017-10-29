<?php

namespace App\Http\Controllers;

use App\HotVideo;
use Exception;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Sunra\PhpSimple\HtmlDomParser;

class PageController extends Controller
{
    //
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

                    if ($likes > 300) {
                        $hot_video = new HotVideo();
                        $hot_video->video_id = $video_id;
                        $hot_video->description = substr($description,0,70);
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

    public function showVideo($title_slug, $video_id)
    {
        $hot_videos = HotVideo::where('id','>',0)->orderBy('create_at','DESC')->take(6)->get();
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
