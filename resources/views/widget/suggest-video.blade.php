<div class="suggest-video">

        <h2 style="font-size: 30px;">Suggest video</h2>
        <hr>
        @foreach($hot_videos as $hot_video)
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    <div class="fb-video"
                         data-href="https://www.facebook.com/facebook/videos/{{$hot_video->video_id}}/"
                         data-width="500" data-height="300" data-show-text="false">
                        <blockquote
                                cite="https://www.facebook.com/facebook/videos/{{$hot_video->video_id}}/"
                                class="fb-xfbml-parse-ignore"><a
                                    href="{{route('showVideo',['title_slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}">Baixar videos do facebook</a>
                            <p>Facebook video indir.</p>Posted by <a
                                    href="https://www.facebook.com/facebook/">Facebook video downloader</a>
                            Mp4 video downloader - fbdownloadvideo.net
                        </blockquote>
                    </div>
                    <hr>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h5>
                        <a href="{{route('showVideo',['title_slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}">{{$hot_video->description}}</a>
                    </h5>
                    <small>{{$hot_video->create_at}}</small>
                    <small>{!! DateAgo::handle($hot_video->download_at) !!}</small>
                </div>
            </div>
        @endforeach
</div>
{{--End Video suggest--}}
