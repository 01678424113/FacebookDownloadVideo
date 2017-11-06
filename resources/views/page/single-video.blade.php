@extends('layout_child')
@section('content')
    @include('widget.form-download')
    <div class="container">
        <div class="row">
            <div class="single-video">
                {{--Single video--}}
                <div class="col-md-7">
                    <hr>
                    <div class="row">
                        <div style="float: right;margin-bottom: 5px;" class="fb-like"
                             data-href="http://fbdownloadvideo.net" data-layout="button_count"
                             data-action="like" data-size="large" data-show-faces="false" data-share="true"></div>
                        <div class="fb-video"
                             data-href="https://www.facebook.com/facebook/videos/{{$video_show->video_id}}/"
                             style="max-width:800px" data-height="400" data-show-text="false">
                            <blockquote cite="https://www.facebook.com/facebook/videos/{{$video_show->video_id}}/"
                                        class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/facebook/videos/{{$video_show->video_id}}/">Baixar
                                    videos do facebook</a>
                                <p>Facebook video indir.</p>Posted by <a
                                        href="{{route('home')}}">Facebook video downloader</a>
                                Mp4 video downloader - <a href="{{route('home')}}">fbdownloadvideo.net</a>
                            </blockquote>
                        </div>
                        <div style="display: flex;justify-content: center;margin-top: 10px;">
                            <a class="btn btn-info" style="border-radius: 0;font-size: 20px;" href="{{$source}}"
                               download="">Click Download Now</a>
                        </div>

                        <h2><a href="#">[{{$created_time}}] {!! str_limit($video_show->h1_video,100,'...') !!}</a>
                        </h2>
                        <div class="col-md-12">
                            Post by <a href="{{route('home')}}">Admin</a>
                            <hr>
                        </div>
                        <p>Description :</p>
                        <div class="col-md-12">
                            <p>{!! $video_show->content_top_video  !!}</p>
                            <p>{!! $video_show->content_bot_video  !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="fb-comments"
                             data-href="https://www.facebook.com/facebook/videos/{{$video_show->video_id}}/"
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