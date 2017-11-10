<div class="jumbotron">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                @if(session('source'))
                    <a class="btn btn-default" href="{{route('getPublicVideo')}}">Return download video another.</a>
                @endif
                <center>

                    <h1 style="font-size:24px;margin-top:1%;">
                        <a href="{{route('home')}}">
                            <img src="{{$logo}}" style="max-width: 25px"
                                 alt="Facebook Video Downloader - Online video downloader"
                                 title="Facebook Video Downloader - Facebook Download "></a>
                        {{$h1_index->value_setting}}
                    </h1>
                    <h2 style="margin-top: 0;font-size:26px;">
                        <small>Download Clip - Facebook Download Online</small>
                        <br>
                    </h2>
                    @if(!session('source'))
                        <form action="{{route('postPublicVideo')}}" method="post">
                            {{csrf_field()}}
                            <div class="input-group col-lg-8">
                                <input name="url_video" class="form-control input-lg"
                                       placeholder="https://www.facebook.com/theanh28.page/videos/1666456930066887/"
                                       type="url">
                                <span class="input-group-btn"><button class="btn btn-info input-lg" id="btn-download"
                                                                      type="submit">Download now</button></span>
                            </div>
                        </form>
                        <br>
                        <a href="{{route('getPrivateVideo')}}">Click here! If you want download video private.</a>
                        <p class="hidden-xs" style="font-size: 19.3px;margin-top: 5px">{{$content_index->value_setting}}</p>
                    @endif
                </center>
            </div>
        </div>
        <div class="row">
            @if((session('source')))
                <div class="col-md-4 col-md-offset-4">
                    <div class="fb-video" data-href="https://www.facebook.com/facebook/videos/{{session('video_id')}}/"
                         data-width="400" data-height="250" data-show-text="false">
                        <blockquote cite="https://www.facebook.com/facebook/videos/{{session('video_id')}}/"
                                    class="fb-xfbml-parse-ignore"><a
                                    href="https://www.facebook.com/facebook/videos/{{session('video_id')}}/">Facebook
                                videos downloader software free</a>
                            <p>Facebook private video downloader.</p>Posted by <a
                                    href="{{route('home')}}">Facebook video downloader</a>
                            FB video downloader free download - <a href="{{route('home')}}">FbDownloadVideo.Net</a>
                        </blockquote>
                    </div>
                    <a class="btn btn-success btn-block" style="border-radius: 0 0 2px 2px" href="{{session('source')}}"
                       download="">Download</a>
                </div>
            @endif
        </div>
    </div>
</div>

