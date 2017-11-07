<?php

namespace App\Http\Controllers;

use App\AutoArticle;
use App\HotVideo;
use App\Setting;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

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
    }
    public function index()
    {

        $hot_videos = HotVideo::where('id','>',0)->orderBy('download_at','DESC')->paginate(12);
        return view('page.index',['hot_videos'=>$hot_videos]);
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
        $hot_videos = HotVideo::all();
        $response['hot_videos'] = $hot_videos;
        return view('howToUse.instruction-public',$response);
    }

    public function instructionPrivate()
    {
        $response = [
          'title'=>'Instruction Private'
        ];
        $hot_videos = HotVideo::all();
        $response['hot_videos'] = $hot_videos;
        return view('howToUse.instruction-private',$response);
    }

     public function test(Request $request)
    {
        /*$url = $request->test;
        $response = Curl::to($url)
            ->withOption('USERAGENT', 'Mozilla/5.0 (iPhone; CPU iPhone OS 6_0 like Mac OS X) AppleWebKit/536.26 (KHTML, like Gecko) Version/6.0 Mobile/10A5376e Safari/8536.25')
            ->get();
        echo $response;*/
        $link = 'https://www.youtube.com/watch?v=tt2k8PGm-TI&list=RDMMtt2k8PGm-TI';
        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $link, $id);
        if (!empty($id)) {
            return $id = $id[0];
        }
        return $link;


    }
}
