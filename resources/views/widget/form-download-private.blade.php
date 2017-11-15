<div class="jumbotron">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                {{--   @if(session('source'))
                       <a class="btn btn-default" href="{{route('getPrivateVideo')}}">Return download video another.</a>
                   @endif--}}
                <center>
                    <h1 style="font-size:24px;margin-top:1%;">
                        <a href="{{route('home')}}">
                            <img src="{{$logo}}" style="max-width: 50px"
                                 alt="Facebook Video Downloader - Online video downloader"
                                 title="Facebook Video Downloader - Facebook Download "></a>
                        {{$h1_index->value_setting}}
                    </h1>
                    <h2 style="margin-top: 0;font-size:26px;">
                        <small>Facebook Private Video Downloader</small>
                    </h2>
                    <div></div>
                    <form action="{{route('postPrivateVideo')}}" method="post">
                        {{csrf_field()}}
                        <div class="input-group col-lg-6">
                                <textarea style="border-color: #3498DB;" name="html_page_video" class="form-control"
                                          id="" cols="20"
                                          rows="5"></textarea>
                            <button class="btn btn-info input-lg" id="btn-download"
                                    style="height: 50px;margin-top: 10px"
                                    type="submit">Download now
                            </button>
                        </div>
                    </form>
                    <br>
                    <b class="hidden-xs" style="font-size: 17.3px;margin-top: 5px">{{$content_index->value_setting}}</b>
                </center>
            </div>
        </div>
        <div class="row">
            @if((session('source')))
                <div class="col-md-4 col-md-offset-4">
                    <div class="card">
                        <img class="card-img-top" src="{{--{{session('picture')}}--}}" style="width: 100%;height: 200px"
                             alt="Facebook Video Private Downloader - Download Video ">
                        <div class="card-block">
                            <p class="card-text">{{session('description')}} - {{session('view')}} Views</p>
                            <a href="{{session('source')}}" class="btn btn-success btn-block" download="">Download
                                Now</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>