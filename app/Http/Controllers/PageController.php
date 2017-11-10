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
        $brand_setting = Setting::where('setting_page', 'domain')->get();
        $brand_setting = $brand_setting[0]->value_setting;
        view()->share('brand', $brand_setting);

        $logo_setting = Setting::where('setting_page', 'logo')->get();
        $logo_setting = $logo_setting[0]->value_setting;
        view()->share('logo', $logo_setting);

        $settings = Setting::where('setting_page', 'index')->get();
        view()->share('settings', $settings);

        $h1_index = Setting::where('key_setting','h1_index')->first();
        $content_index = Setting::select('value_setting')->where('key_setting','content_index')->first();
        view()->share('h1_index',$h1_index);
        view()->share('content_index',$content_index);

    }

    public function getPublicVideo()
    {
        $response = [
            'title' => 'Facebook Download Video Public'
        ];
        $hot_videos = HotVideo::where('id', '>', 0)->orderBy('created_at', 'DESC')->paginate(12);
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
        $url_graph = 'https://graph.facebook.com/' . $id_video . '?fields=source,description,length,picture,thumbnails,created_time,likes.limit(999999999)&access_token=' . env('ACCESS_TOKEN_FULL');
        try {
            $find_source = Curl::to($url_graph)->get();

            $find_source = json_decode($find_source);
            $description = $find_source->description;
            $source = $find_source->source;
            $video_id = $find_source->id;
            $length = $find_source->length;
            $picture = $find_source->picture;
            $thumbnails = $find_source->thumbnails;
            $video_hot = HotVideo::where('video_id', $video_id)->first();

            if ($video_hot == null) {
                if (!empty($find_source->likes)) {
                    $likes = $find_source->likes;
                    $likes = count($likes->data);
                    if ($likes > 50) {
                        $hot_video = new HotVideo();
                        $hot_video->video_id = $video_id;
                        /*if (strlen($description) > 70) {
                            if(strpos($description, '.' )){
                                $description = explode('.', $description);
                                if (strlen($description[0]) > 70){
                                    $description = explode(' ', $description[0]);
                                    $description = $description[0]." ".$description[1]." ".$description[2]." ".$description[3]." ".$description[4]." ".$description[5]." ".$description[6];
                                }else{
                                    $description = $description[0]." ".$description[1];
                                }
                            }elseif(strpos($description, ',' )){
                                $description = explode(',', $description);
                                if (strlen($description[0]) > 70){
                                    $description = $description[0];
                                }else{
                                    $description = $description[0]." ".$description[1];
                                }
                            }elseif (strpos($description, ':' )){
                                $description = explode(':', $description);
                                if (strlen($description[0]) > 70){
                                    $description = $description[0];
                                }else{
                                    $description = $description[0]." ".$description[1];
                                }
                            }elseif (strpos($description, '#' )){
                                $description = explode('#', $description);
                                $description = $description[0];
                            } else{
                                $description = explode(' ', $description);
                                $description = $description[0]." ".$description[1]." ".$description[2]." ".$description[3]." ".$description[4]." ".$description[5]." ".$description[6];
                            }
                        }*/
                        if (str_word_count($description) > 10) {
                            $description = explode(" ", $description);
                            $description = $description[0] . " " . $description[1] . " " . $description[2] . " " . $description[3] . " " . $description[4] . " " . $description[5] . " " . $description[6] . " " . $description[7] . " " . $description[8] . " " . $description[9] . " ...";
                        }
                        if (strpos($description, '#')) {
                            $description = explode('#', $description);
                            $description = $description[0];
                        }

                        $hot_video->meta_title = html_entity_decode($description);
                        $hot_video->title_slug = str_slug($description, "-");


                        //Create auto title and content video
                        //Get value form database
                        $settings_title = Setting::select(['value_setting'])->where('setting_page', 'view')->where('key_setting', 'title_view')->get();
                        $settings_h1 = Setting::select(['value_setting'])->where('setting_page', 'view')->where('key_setting', 'h1_view')->get();
                        $settings_content_top = Setting::select(['value_setting'])->where('setting_page', 'view')->where('key_setting', 'content_view_top')->get();
                        $settings_content_bot = Setting::select(['value_setting'])->where('setting_page', 'view')->where('key_setting', 'content_view_bot')->get();
                        $settings_description = Setting::select(['value_setting'])->where('setting_page', 'view')->where('key_setting', 'description_view')->get();
                        $settings_alt = Setting::select(['value_setting'])->where('setting_page', 'view')->where('key_setting', 'alt')->get();

                        $settings_domain = Setting::select(['value_setting'])->where('setting_page', 'domain')->where('key_setting', 'domain')->get();
                        $settings_keyword_1 = Setting::select(['value_setting'])->where('key_setting', 'keyword_1')->get();
                        $settings_keyword_2 = Setting::select(['value_setting'])->where('key_setting', 'keyword_2')->get();
                        $settings_keyword_link = Setting::select(['value_setting'])->where('key_setting', 'keyword_link')->get();

                        $settings_title = $settings_title[0]->value_setting;
                        $settings_h1 = $settings_h1[0]->value_setting;
                        $settings_content_top = $settings_content_top[0]->value_setting;
                        $settings_content_bot = $settings_content_bot[0]->value_setting;
                        $settings_description = $settings_description[0]->value_setting;
                        $settings_alt = $settings_alt[0]->value_setting;

                        $settings_domain = $settings_domain[0]->value_setting;
                        $settings_keyword_1 = $settings_keyword_1[0]->value_setting;
                        $settings_keyword_2 = $settings_keyword_2[0]->value_setting;
                        $settings_keyword_link = $settings_keyword_link[0]->value_setting;

                        //Split data form text to array
                        $titles = explode(';', $settings_title);
                        $h1s = explode(';', $settings_h1);
                        $contents_top = explode(';', $settings_content_top);
                        $contents_bot = explode(';', $settings_content_bot);
                        $descriptions = explode(';', $settings_description);
                        $alts = explode(';', $settings_alt);

                        $domains = explode(';', $settings_domain);
                        $keyword_1s = explode(';', $settings_keyword_1);
                        $keyword_2s = explode(';', $settings_keyword_2);
                        $keyword_links = explode(';', $settings_keyword_link);


                        //Random numerical order in array
                        $rd_number_title = random_int(0, count($titles) - 2);
                        $rd_number_h1 = random_int(0, count($h1s) - 1);
                        $rd_number_content_top = random_int(0, count($contents_top) - 2);
                        $rd_number_content_bot = random_int(0, count($contents_bot) - 2);
                        $rd_number_description = random_int(0, count($descriptions) - 2);
                        $rd_number_alt = random_int(0, count($alts) - 2);

                        //Take element in array
                        $rd_title = trim($titles[$rd_number_title]);
                        $rd_h1 = trim($h1s[$rd_number_h1]);
                        $rd_content_top = trim($contents_top[$rd_number_content_top]);
                        $rd_content_bot = trim($contents_bot[$rd_number_content_bot]);
                        $rd_description = trim($descriptions[$rd_number_description]);
                        $rd_alt = trim($alts[$rd_number_alt]);

                        //Auto create title
                        $rd_number_domain = random_int(0, count($domains) - 1);
                        $rd_number_keyword_1 = random_int(0, count($keyword_1s) - 2);
                        $rd_number_keyword_2 = random_int(0, count($keyword_2s) - 2);
                        $rd_number_keyword_link = random_int(0, count($keyword_links) - 2);


                        $rd_domain = trim($domains[$rd_number_domain]);
                        $rd_keyword_1 = trim($keyword_1s[$rd_number_keyword_1]);
                        $rd_keyword_2 = trim($keyword_2s[$rd_number_keyword_2]);
                        $rd_keyword_link = trim($keyword_links[$rd_number_keyword_link]);

                        $title_rp_name = str_replace('%name%', $description, $rd_title);
                        $title_rp_domain = str_replace('%domainname%', $rd_domain, $title_rp_name);
                        $title_rp_keyword_1 = str_replace('%kw1%', $rd_keyword_1, $title_rp_domain);
                        $title_rp_keyword_2 = str_replace('%kw2%', $rd_keyword_2, $title_rp_keyword_1);
                        $title = str_replace('%link%', "<a href='http://fbdownloadvideo.net' target='_blank'>" . $rd_keyword_link . "</a>", $title_rp_keyword_2);

                        //Auto create h1
                        $rd_number_domain = random_int(0, count($domains) - 1);
                        $rd_number_keyword_1 = random_int(0, count($keyword_1s) - 2);
                        $rd_number_keyword_2 = random_int(0, count($keyword_2s) - 2);
                        $rd_number_keyword_link = random_int(0, count($keyword_links) - 2);

                        $rd_domain = trim($domains[$rd_number_domain]);
                        $rd_keyword_1 = trim($keyword_1s[$rd_number_keyword_1]);
                        $rd_keyword_2 = trim($keyword_2s[$rd_number_keyword_2]);
                        $rd_keyword_link = trim($keyword_links[$rd_number_keyword_link]);

                        $h1_rp_name = str_replace('%name%', $description, $rd_h1);
                        $h1_rp_domain = str_replace('%domainname%', $rd_domain, $h1_rp_name);
                        $h1_rp_keyword_1 = str_replace('%kw1%', $rd_keyword_1, $h1_rp_domain);
                        $h1_rp_keyword_2 = str_replace('%kw2%', $rd_keyword_2, $h1_rp_keyword_1);
                        $h1 = str_replace('%link%', "<a href='http://fbdownloadvideo.net' target='_blank'>" . $rd_keyword_link . "</a>", $h1_rp_keyword_2);

                        //Auto create content top
                        $rd_number_domain = random_int(0, count($domains) - 1);
                        $rd_number_keyword_1 = random_int(0, count($keyword_1s) - 2);
                        $rd_number_keyword_2 = random_int(0, count($keyword_2s) - 2);
                        $rd_number_keyword_link = random_int(0, count($keyword_links) - 2);

                        $rd_domain = trim($domains[$rd_number_domain]);
                        $rd_keyword_1 = trim($keyword_1s[$rd_number_keyword_1]);
                        $rd_keyword_2 = trim($keyword_2s[$rd_number_keyword_2]);
                        $rd_keyword_link = trim($keyword_links[$rd_number_keyword_link]);
                        $rd_keyword_link = ucfirst($rd_keyword_link);


                        $content_top_rp_name = str_replace('%name%', $find_source->description, $rd_content_top);
                        $content_top_rp_domain = str_replace('%domainname%', $rd_domain, $content_top_rp_name);
                        $content_top_rp_keyword_1 = str_replace('%kw1%', $rd_keyword_1, $content_top_rp_domain);
                        $content_top_rp_keyword_2 = str_replace('%kw2%', $rd_keyword_2, $content_top_rp_keyword_1);
                        $content_top = str_replace('%link%', "<a href='http://fbdownloadvideo.net' target='_blank'>" . $rd_keyword_link . "</a>", $content_top_rp_keyword_2);

                        //Auto create content bot
                        $rd_number_domain = random_int(0, count($domains) - 1);
                        $rd_number_keyword_1 = random_int(0, count($keyword_1s) - 2);
                        $rd_number_keyword_2 = random_int(0, count($keyword_2s) - 2);
                        $rd_number_keyword_link = random_int(0, count($keyword_links) - 2);

                        $rd_domain = trim($domains[$rd_number_domain]);
                        $rd_keyword_1 = trim($keyword_1s[$rd_number_keyword_1]);
                        $rd_keyword_2 = trim($keyword_2s[$rd_number_keyword_2]);
                        $rd_keyword_link = trim($keyword_links[$rd_number_keyword_link]);

                        $content_bot_rp_name = str_replace('%name%', $description, $rd_content_bot);
                        $content_bot_rp_domain = str_replace('%domainname%', $rd_domain, $content_bot_rp_name);
                        $content_bot_rp_keyword_1 = str_replace('%kw1%', $rd_keyword_1, $content_bot_rp_domain);
                        $content_bot_rp_keyword_2 = str_replace('%kw2%', $rd_keyword_2, $content_bot_rp_keyword_1);
                        $content_bot = str_replace('%link%', "<a href='http://fbdownloadvideo.net' target='_blank'>" . $rd_keyword_link . "</a>", $content_bot_rp_keyword_2);

                        //Auto create description
                        $rd_number_domain = random_int(0, count($domains) - 1);
                        $rd_number_keyword_1 = random_int(0, count($keyword_1s) - 2);
                        $rd_number_keyword_2 = random_int(0, count($keyword_2s) - 2);
                        $rd_number_keyword_link = random_int(0, count($keyword_links) - 2);

                        $rd_domain = trim($domains[$rd_number_domain]);
                        $rd_keyword_1 = trim($keyword_1s[$rd_number_keyword_1]);
                        $rd_keyword_2 = trim($keyword_2s[$rd_number_keyword_2]);
                        $rd_keyword_link = trim($keyword_links[$rd_number_keyword_link]);

                        $description_rp_name = str_replace('%name%', $description, $rd_description);
                        $description_rp_domain = str_replace('%domainname%', $rd_domain, $description_rp_name);
                        $description_rp_keyword_1 = str_replace('%kw1%', $rd_keyword_1, $description_rp_domain);
                        $description_rp_keyword_2 = str_replace('%kw2%', $rd_keyword_2, $description_rp_keyword_1);
                        $description = str_replace('%link%', "<a href='http://fbdownloadvideo.net' target='_blank'>" . $rd_keyword_link . "</a>", $description_rp_keyword_2);

                        //Auto create description
                        $rd_number_domain = random_int(0, count($domains) - 1);
                        $rd_number_keyword_1 = random_int(0, count($keyword_1s) - 2);
                        $rd_number_keyword_2 = random_int(0, count($keyword_2s) - 2);
                        $rd_number_keyword_link = random_int(0, count($keyword_links) - 2);

                        $rd_domain = trim($domains[$rd_number_domain]);
                        $rd_keyword_1 = trim($keyword_1s[$rd_number_keyword_1]);
                        $rd_keyword_2 = trim($keyword_2s[$rd_number_keyword_2]);
                        $rd_keyword_link = trim($keyword_links[$rd_number_keyword_link]);

                        $alt_rp_name = str_replace('%name%', $description, $rd_alt);
                        //$alt_rp_domain = str_replace('%domainname%', $rd_domain, $alt_rp_name);
                        $alt_rp_keyword_1 = str_replace('%kw1%', $rd_keyword_1, $alt_rp_name);
                        $alt_rp_keyword_2 = str_replace('%kw2%', $rd_keyword_2, $alt_rp_keyword_1);
                        //$alt = str_replace('%link%', "<a href='http://fbdownloadvideo.net' target='_blank'>" . $rd_keyword_link . "</a>", $alt_rp_keyword_2);
                        $alt = $alt_rp_keyword_2;
                        $hot_video->title_video = $title;
                        $hot_video->h1_video = $h1;
                        $hot_video->content_top_video = $content_top;
                        $hot_video->content_bot_video = $content_bot;
                        $hot_video->description = $description;
                        $hot_video->alt = $alt;
                        $hot_video->picture = $picture;
                        $hot_video->thumbnails = $thumbnails->data[0]->uri;
                        $hot_video->length = $length;
                        $hot_video->likes = $likes;
                        $hot_video->created_at = substr($find_source->created_time, 0, 10);
                        $hot_video->download_at = microtime(true);
                        try {
                            $hot_video->save();
                            return redirect()->back()->with('source', $source)
                                ->with('video_id', $video_id);
                            //return redirect()->route('showVideo',['title_slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id]);
                        } catch (Exception $e) {

                        }
                    }
                } else {
                    $likes = 0;
                }
            }
            return redirect()->back()->with('source', $source)
                ->with('video_id', $video_id);
        } catch (Exception $e) {

            return redirect()->back()->with('error', 'Link is invalid or video not public !');
        }
    }

    public function getPrivateVideo()
    {
        $response = [
            'title' => 'Facebook Download Video Private'
        ];
        $hot_videos = HotVideo::where('id', '>', 0)->orderBy('created_at', 'DESC')->paginate(12);
        $response['hot_videos'] = $hot_videos;
        return view('page.private-video', $response);

    }

    public
    function postPrivateVideo(Request $request)
    {
        $html = $request->html_page_video;
        if (preg_match_all("/sd_src\:\"(.*?)\"/", $html, $matches)) {
            $source = $matches[1][0];
            $find_description = HtmlDomParser::str_get_html($html);
            $description = $find_description->find('#pageTitle', 0)->text();

            preg_match_all("/<span class=\"fcg\">(\d+) Views<\/span>/", $html, $result);
            if (!empty($result[1][0])) {
                $view = $result[1][0];
            } else {
                $view = "...";
            }


            return redirect()->back()->with('source', $source)
                ->with('description', $description)
                ->with('view', $view);
        }
        return redirect()->back()->with('error', 'Source is invalid!');
    }

    public
    function getFindId()
    {
        $hot_videos = HotVideo::where('id', '>', 0)->orderBy('created_at', 'DESC')->take(6)->get();
        $response = [
            'title' => 'Find ID Facebook By URL'
        ];
        $response['hot_videos'] = $hot_videos;
        return view('page.find-id-facebook', $response);
    }

    public
    function postFindId(Request $request)
    {
        $url = $request->url_find_id;
        $username = substr($url, 25);
        $url_graph = 'https://graph.facebook.com/' . $username . '?access_token=' . env('ACCESS_TOKEN_FULL');
        $html = Curl::to($url_graph)->get();
        $html = json_decode($html);
        if (!empty($html->id)) {
            $facebook_id = $html->id;
            return redirect()->back()->with('facebook_id', $facebook_id);
        }
        return redirect()->back()->with('error', 'Link error!');

    }
}
