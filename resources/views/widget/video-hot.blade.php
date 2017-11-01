<div class="row-fluid container">
    <h3>Video - Free video downloader on FB</h3>
    <hr>
    @if(count($hot_videos)>0)
        <ul class="list-unstyled video-list-thumbs row">
            @foreach($hot_videos as $hot_video)
                <li class="col-md-4 col-sm-6 col-xs-12">
                    <div class="card card-hot-video">
                        <a target="_blank"
                           href="{{route('showVideo',['title-slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}">
                            <img class="card-img-top" src="{{$hot_video->thumbnails}}" style="max-width: 100%"
                                 alt="Card image cap">
                        </a>
                        <div class="card-block">
                            <a target="_blank"
                               href="{{route('showVideo',['title-slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}"
                               class="card-text">
                                <p>{{str_limit($hot_video->h1_video,50,'...')}}</p>
                            </a>
                            <a target="_blank"
                               href="{{route('showVideo',['title-slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}"
                               class="btn btn-success btn-block" style="border-radius: 0 0 2px 2px">Watching Now</a>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>