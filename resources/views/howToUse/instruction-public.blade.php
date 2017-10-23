@extends('layout')
@section('content')
    @include('widget.form-download')
    <div class="container">
        <div class="col-md-8">
            <div class="instruction">
                <div class="row">
                    <h2 style="font-size: 30px">{{$title}}</h2>
                    <hr>
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Bước 1:</h3>
                    <ul>
                        <li>Play video on facebook.</li>
                        <li>Click right mouse into video and select "Show video URL".</li>
                        <li>Copy URL display and continued step 2.</li>
                    </ul>
                    <img src="images/instruction/step1.png" width="100%" alt="">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Bước 2:</h3>
                    <ul>
                        <li>Paste URL into form "Download".</li>
                        <li>Click button "Download"</li>
                    </ul>
                    <img src="images/instruction/step2.png" width="100%" alt="">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Bước 3:</h3>
                    <ul>
                        <li>Click button "Download Now below video."</li>
                    </ul>
                    <img src="images/instruction/step3.png" width="100%" alt="">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Bước 4:</h3>
                    <ul>
                        <li>Waiting and watch result.</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            @include('widget.suggest-video')
        </div>
    </div>
@endsection