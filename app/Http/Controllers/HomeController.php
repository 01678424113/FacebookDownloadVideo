<?php

namespace App\Http\Controllers;

use App\AutoArticle;
use App\HotVideo;
use App\Setting;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Spatie\GoogleSearch\GoogleSearch;

class HomeController extends Controller
{
    public function __construct()
    {
        $brand_setting = Setting::where('setting_page','domain')->get();
        $brand_setting = $brand_setting[0]->value_setting;
        view()->share('brand',$brand_setting);

        $logo_setting = Setting::where('setting_page','logo')->get();
        $logo_setting = $logo_setting[0]->value_setting;
        view()->share('logo',$logo_setting);

        $settings = Setting::where('setting_page','index')->get();
        view()->share('settings',$settings);

        $title_index = $settings[0]->value_setting;
        if(!empty($_GET['page'])){
            $title_index = str_replace('%page%', "page ".$_GET['page'], $title_index);
        }else{
            $title_index = str_replace('%page%', "", $title_index);
        }
        view()->share('title_index',$title_index);

        $h1_index = Setting::where('key_setting','h1_index')->first();
        view()->share('h1_index',$h1_index);
    }
    public function index()
    {

        $content_index = Setting::select('value_setting')->where('key_setting','content_index')->first();
        $response['content_index'] = $content_index->value_setting;
        $hot_videos = HotVideo::where('id','>',0)->orderBy('download_at','DESC')->paginate(12);
        $response['hot_videos'] = $hot_videos;
        return view('page.index',$response);
    }
    public function error404()
    {

        $hot_videos = HotVideo::where('id','>',0)->orderBy('download_at','DESC')->paginate(12);
        return view('page.404',['hot_videos'=>$hot_videos]);
    }
    public function instructionPublic()
    {
        $response = [
            'title'=>'Instruction Public'
        ];
        $content_index = Setting::select('value_setting')->where('key_setting','content_index')->first();
        $response['content_index'] = $content_index->value_setting;
        $hot_videos = HotVideo::all();
        $response['hot_videos'] = $hot_videos;
        return view('howToUse.instruction-public',$response);
    }

    public function instructionPrivate()
    {
        $response = [
          'title'=>'Instruction Private'
        ];
        $content_index = Setting::select('value_setting')->where('key_setting','content_index')->first();
        $response['content_index'] = $content_index->value_setting;
        $hot_videos = HotVideo::all();
        $response['hot_videos'] = $hot_videos;
        return view('howToUse.instruction-private',$response);
    }

    public function instructionLinkMobile()
    {
        $response = [
            'title'=>'Instruction copy link video on mobile'
        ];
        $content_index = Setting::select('value_setting')->where('key_setting','content_index')->first();
        $response['content_index'] = $content_index->value_setting;
        $hot_videos = HotVideo::all();
        $response['hot_videos'] = $hot_videos;
        return view('howToUse.instruction-link-mobile',$response);
    }

     public function test()
    {
        /*$url = $request->test;
        $response = Curl::to($url)
            ->withOption('USERAGENT', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25')
            ->get();
        echo $response;*/

        $search = GoogleSearch::getResults('a');
        dd($search);




    }
}
