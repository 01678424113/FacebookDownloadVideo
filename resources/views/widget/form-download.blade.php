<div class="jumbotron">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                @if(session('source'))
                <a class="btn btn-default" href="{{route('getPublicVideo')}}">Return download video another.</a>
                @endif
                <center>
                    <a href="index.php"><img class="img-responsive" src="img/fbdown.png" alt="Download Facebook Videos"
                                             title="Facebook Video Downloader Online" width="300px"></a>
                    <h1 style="font-size:24px;margin-top:1%;">
                        Facebook Video Downloader
                    </h1>
                    <h2 style="margin-top: 0;font-size:26px;">
                        <small>Download Facebook Videos Online</small>
                    </h2>
                    <br/><br/>
                    @if(!session('source'))
                        <form action="{{route('postPublicVideo')}}" method="post">
                            {{csrf_field()}}
                            <div class="input-group col-lg-8">
                                <input name="url_video" class="form-control input-lg"
                                       placeholder="Enter Facebook Video URL ..." type="url">
                                <span class="input-group-btn"><button class="btn btn-primary input-lg" id="btn-download"
                                                                      type="submit">Download now</button></span>
                            </div>
                        </form>
                        <br>
                        <p style="font-size: 20.3px;">Example: https://www.facebook.com/theanh28.page/videos/1666456930066887/</p>
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
                                    href="https://www.facebook.com/facebook/videos/{{session('video_id')}}/">How to
                                Share With Just
                                Friends</a>
                            <p>How to share with just friends.</p>Posted by <a
                                    href="https://www.facebook.com/facebook/">Facebook</a>
                            on Friday, 5 December 2014
                        </blockquote>
                    </div>
                    <a class="btn btn-success btn-block" style="border-radius: 0 0 2px 2px" href="{{session('source')}}"
                       download="">Download</a>
                </div>
            @endif
        </div>
    </div>
</div>

