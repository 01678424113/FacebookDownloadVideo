<div class="suggest-video">

        <h2 style="font-size: 30px;">Suggest video</h2>
        <hr>
        @foreach($hot_videos as $hot_video)
            <div class="row">
                <div class="col-md-6 col-sm-6 list-video-suggest">
                    <a target="_blank" href="{{route('showVideo',['title-slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}">
                        <img class="card-img-top" src="{{$hot_video->thumbnails}}" style="max-width: 100%" alt="{{strip_tags($hot_video->alt)}}">
                        <div class="btn-play">
                            <i class="fa fa-play-circle-o" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h5>
                        <a href="{{route('showVideo',['title_slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}">{{$hot_video->meta_title}}</a>
                    </h5>
                    <small>{{$hot_video->created_at}}</small>
                    <br>
                    <small>{!! DateAgo::handle($hot_video->download_at) !!}</small>
                    <p><a href="{{route('showVideo',['title_slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}">View and Download now!</a></p>
                </div>
            </div>
        <hr>
        @endforeach
</div>
{{--End Video suggest--}}
