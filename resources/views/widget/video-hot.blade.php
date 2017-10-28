<div class="row-fluid container">
    <h3>Video - Free video downloader on FB</h3>
    <hr>
    @if(count($hot_videos)>0)
        <ul class="list-unstyled video-list-thumbs row">
            @foreach($hot_videos as $hot_video)
                <li class="col-md-4 col-sm-6 col-xs-12">
                    <div class="fb-video" data-href="https://www.facebook.com/facebook/videos/{{$hot_video->video_id}}/"
                         data-width="500" data-height="400" data-show-text="false" data-show-captions="true">
                        <blockquote cite="https://www.facebook.com/facebook/videos/{{$hot_video->video_id}}/"
                                    class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/facebook/videos/{{$hot_video->video_id}}/">Video downloader</a>
                            <p>Facebook video downloader online</p>Posted by <a
                                    href="https://www.facebook.com/facebook/">Facebook video downloader :</a>
                            Mp4 video downloader - fbdownloadvideo.net
                        </blockquote>
                    </div>
                    <a target="_blank"
                       href="{{route('showVideo',['title-slug'=>$hot_video->title_slug,'video_id'=>$hot_video->video_id])}}"
                       class="btn btn-success btn-block" style="border-radius: 0 0 2px 2px">Watching Now</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>