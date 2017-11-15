<div class="row-fluid container">
    <h2>Download Video Facebook Hot | Video Facebook Downloader Fastest</h2>
    <hr>
    @if(count($hot_videos)>0)
        <ul class="list-unstyled video-list-thumbs row">
            @foreach($hot_videos as $hot_video)
                <li class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 15px">
                    <div class="card card-hot-video">
                        <a
                                href="{{route('showVideo',['video_id'=>$hot_video->video_id,'title_slug'=>$hot_video->title_slug.".html"])}}">
                            <img class="card-img-top" src="{{$hot_video->picture}}"
                                 style="width: 100%;height: 210px;"
                                 alt="{{strip_tags($hot_video->alt)}}">
                        </a>
                        <div class="card-block">
                            <h3>
                                <a href="{{route('showVideo',['video_id'=>$hot_video->video_id,'title_slug'=>$hot_video->title_slug.".html"])}}"
                                   class="card-text">{{str_limit($hot_video->h1_video,50,'...')}}
                                </a>
                            </h3>
                            <a
                                    href="{{route('showVideo',['video_id'=>$hot_video->video_id,'title_slug'=>$hot_video->title_slug.".html"])}}"
                                    class="btn btn-info btn-block" style="border-radius: 0 0 2px 2px">Download Now</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>

        {{$hot_videos->links()}}

    @endif
</div>