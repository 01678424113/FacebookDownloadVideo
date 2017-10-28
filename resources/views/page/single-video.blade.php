@extends('layout')
@section('content')
    @include('widget.form-download')
    <div class="container">
        <div class="row">
            <div class="single-video">
                {{--Single video--}}
                <div class="col-md-7">
                    <div class="row">
                        <a class="btn btn-success" style="border-radius: 0 " href="{{$source}}"
                           download="">Click download now</a>
                        <div class="fb-video" data-href="https://www.facebook.com/facebook/videos/{{$video_id}}/"
                             style="max-width:800px" data-height="400" data-show-text="false">
                            <blockquote cite="https://www.facebook.com/facebook/videos/{{$video_id}}/"
                                        class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/facebook/videos/{{$video_id}}/">Baixar videos do facebook</a>
                                <p>Facebook video indir.</p>Posted by <a
                                        href="https://www.facebook.com/facebook/">Facebook video downloader</a>
                                Mp4 video downloader - fbdownloadvideo.net
                            </blockquote>
                        </div>
                        <h3><a href="#">[{{$created_time}}] {{$description}}</a></h3>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="fb-comments" data-href="https://www.facebook.com/facebook/videos/{{$video_id}}/"
                             data-numposts="5" data-width="100%"></div>
                    </div>
                </div>
                {{--End single video--}}
            </div>
            {{--Video suggest--}}
            <div class="col-md-5">
                @include('widget.suggest-video')
            </div>
        </div>
    </div>
@endsection