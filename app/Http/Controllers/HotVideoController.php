<?php

namespace App\Http\Controllers;

use App\HotVideo;
use Exception;
use Illuminate\Http\Request;
use Session;

class HotVideoController extends Controller
{
    public function listHotVideo(Request $request)
    {
        $response = [
            'title' => 'Hot video'
        ];
        $hotVideos_query = HotVideo::select([
            'video_id',
            'title_video',
            'thumbnails',
            'title_slug',
            'download_at'
        ])->orderBy('download_at', 'DESC');
        if ($request->has('video_id_search') && $request->input('video_id_search') != "") {
            $hotVideos_query->where('video_id', 'LIKE', '%' . $request->input('video_id_search') . '%');
        }

        $response['hotVideos'] = $hotVideos_query->paginate(20);
        return view('admin.hotvideo.list', $response);
    }

    public function getAddHotVideo()
    {
        $response = [
            'title' => 'Add HotVideo'
        ];
        return view('admin.hotvideo.add', $response);
    }

    public function postAddHotVideo(Request $request)
    {
        $hotVideo = new HotVideo();
        $hotVideo->title = $request->txt_title;
        $hotVideo->slug = $request->txt_slug;
        $hotVideo->description = $request->txt_description;
        $hotVideo->content = $request->txt_content;
        $hotVideo->keyword = $request->txt_keyword;

        $hotVideo->created_by = Session::get('user_id');
        $hotVideo->created_at = round(microtime(true));
        try {
            $hotVideo->save();
            return redirect()->route('listHotVideo')->with('success', 'You have successfully added HotVideo !');
        } catch (Exception $e) {
            return redirect()->route('listHotVideo')->with('error', 'Error ! Database');
        }
    }

    public function getEditHotVideo($hotVideo_id)
    {
        $hotVideo = HotVideo::find($hotVideo_id);
        if (!isset($hotVideo)) {
            return redirect()->back()->with('error', 'HotVideo is not exist !');
        }
        $response = [
            'title' => 'Edit HotVideo ' . $hotVideo->title
        ];
        $response['hotVideo'] = $hotVideo;
        return view('admin.hotvideo.edit', $response);
    }


    public function postEditHotVideo(Request $request, $hotVideo_id)
    {
        $hotVideo = HotVideo::find($hotVideo_id);
        $hotVideo->title = $request->txt_title;
        $hotVideo->description = $request->txt_description;
        $hotVideo->content = $request->txt_content;
        $hotVideo->keyword = $request->txt_keyword;

        $hotVideo->updated_by = Session::get('user_id');
        $hotVideo->updated_at = round(microtime(true));
        try {
            $hotVideo->save();
            return redirect()->back()->with('success', 'You have successfully fixed HotVideo !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ! Database');
        }

    }

    public function deleteHotVideo($hot_video_id)
    {
        $hotVideo = HotVideo::where('video_id',$hot_video_id);
        if (!isset($hotVideo)) {
            return redirect()->back()->with('error', 'HotVideo is not exist !');
        }
        try {
            $hotVideo->delete();
            return redirect()->back()->with('success', 'You have successfully deleted HotVideo !');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error ! Database');
        }
    }
}
