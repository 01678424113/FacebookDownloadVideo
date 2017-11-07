@extends('layout')
@section('content')
    @include('widget.form-find-id')
    <div class="container">
        <div class="col-md-7">
            <div class="instruction">
                <div class="row">
                    <h2 style="font-size: 30px">Instruction Find ID Facebook by URL</h2>
                    <hr>
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Step 1:</h3>
                    <ul>
                        <li>Go to profile user you want take ID</li>
                        <li>Copy link URL same picture below</li>
                    </ul>
                    <img src="images/instruction/facebook-video-downloader-step1-find-id.png" width="90%" alt="Instruction Facebook Find ID - Facebook Video Downloader">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Step 2:</h3>
                    <ul>
                        <li>Paste URL into form "Find ID NOW".</li>
                        <li>Click button "Find ID NOW"</li>
                    </ul>
                    <img src="images/instruction/facebook-video-downloader-step2-find-id.png" width="90%" alt="Instruction Facebook Find ID - Facebook Video Downloader">
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Step 3:</h3>
                    <ul>
                        <li>This is ID you want take.</li>
                    </ul>
                    <img src="images/instruction/facebook-video-downloader-step3-find-id.png" width="90%" alt="Instruction Facebook Find ID - Facebook Video Downloader">
                </div>
            </div>
        </div>
        <div class="col-md-5">
           @include('widget.suggest-video')
        </div>
    </div>
@endsection