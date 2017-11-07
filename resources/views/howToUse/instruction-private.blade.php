@extends('layout')
@section('content')
    @include('widget.form-download-private')
    <div class="container">
        <div class="col-md-7">
            <div class="instruction">
                <div class="row">
                    <h2 style="font-size: 30px">{{$title}}</h2>
                    <hr>
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Step 1:</h3>
                    <ul>
                        <li>Play video on facebook.</li>
                        <li><strong>Crtl + U</strong> or click right mouse and select "View page source".</li>
                    </ul>
                    <img src="images/instruction/facebook-video-downloader-step1-private" width="100%" alt="">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Step 2:</h3>
                    <ul>
                        <li><strong>Ctrl + A</strong> then <strong>Ctrl + C</strong>.</li>
                    </ul>
                    <img src="images/instruction/facebook-video-downloader-step2-private.png" width="100%" alt="">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Step 3:</h3>
                    <ul>
                        <li>Go to Facebook Download Video Private.</li>
                        <li><strong>Ctrl + V </strong> or paste into form download.</li>
                    </ul>
                    <img src="images/instruction/facebook-video-downloader-step3-private.png" width="100%" alt="">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Step 4:</h3>
                    <ul>
                        <li>Click button "Download".</li>
                    </ul>
                    <img src="images/instruction/facebook-video-downloader-step4-private.png" width="100%" alt="">
                </div>
            </div>
        </div>
        <div class="col-md-5">
            @include('widget.suggest-video')
        </div>
    </div>
@endsection