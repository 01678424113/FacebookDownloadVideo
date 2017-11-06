<div class="jumbotron">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                @if(session('source'))
                    <a class="btn btn-default" href="{{route('getPrivateVideo')}}">Return download video another.</a>
                @endif
                <center>
                    <a href="{{route('home')}}"><img class="img-responsive" src="images/logo/logo.ico" alt="Facebook Video Private Downloader - Download Video "
                                             title="Facebook Video Downloader - Facebook Download " width="70px"></a>
                    <h1 style="font-size:24px;margin-top:1%;">
                        Facebook Video Downloader - Video Downloader
                    </h1>
                    <h2 style="margin-top: 0;font-size:26px;">
                        <small>Download Video - Facebook Download Online</small>
                    </h2>
                    <br/><br/>
                    @if(!session('source'))
                        <div></div>
                        <form action="{{route('postPrivateVideo')}}" method="post">
                            {{csrf_field()}}
                            <div class="input-group col-lg-6">
                                <textarea name="html_page_video" class="form-control" id="" cols="20"
                                          rows="5"></textarea>
                                <button class="btn btn-primary input-lg" id="btn-download" style="height: 50px;margin-top: 10px"
                                        type="submit">Download now
                                </button>
                            </div>
                        </form>
                        <br>
                    @endif
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