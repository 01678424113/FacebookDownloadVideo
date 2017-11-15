<div class="suggest-video">
        <h2 style="font-size: 30px;">Video FB Download More</h2>
        <hr>
        @foreach($hot_videos as $hot_video)
        <div class="row">
            <div class="col-md-6 col-sm-6 list-video-suggest" style="max-height: 142px; overflow: hidden;">
                <a href="{{route('showVideo',['video_id'=>$hot_video->video_id,'title_slug'=>$hot_video->title_slug.".html"])}}">
                    <img class="card-img-top" src="{{$hot_video->picture}}" style="max-width: 100%" alt="{{strip_tags($hot_video->alt)}}">
                    <div class="btn-play">
                        <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-6 col-sm-6">
                <h3 style="font-size: 18px;margin-top: 5px;">
                    <a href="{{route('showVideo',['video_id'=>$hot_video->video_id,'title_slug'=>$hot_video->title_slug.".html"])}}">{{$hot_video->meta_title}}</a>
                </h3>
                <small>{{$hot_video->created_at}}</small>
                <br>
                <small>{!! DateAgo::handle($hot_video->download_at) !!}</small>
                <p><a href="{{route('showVideo',['video_id'=>$hot_video->video_id,'title_slug'=>$hot_video->title_slug.".html"])}}">View and Download now!</a></p>
            </div>
        </div>
        <hr>
    @endforeach
</div>
{{--End Video suggest--}}
