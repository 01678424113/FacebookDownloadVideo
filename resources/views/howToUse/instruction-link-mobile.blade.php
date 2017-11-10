@extends('layout')
@section('content')
    @include('widget.form-download')
    <div class="container">
        <div class="col-md-7">
            <div class="instruction">
                <div class="row">
                    <h2 style="font-size: 30px">{{$title}}</h2>
                    <hr>
                </div>
                <div class="row">
                    <h3 style="margin-top: 20px">Smart phone IOS :</h3>
                    <ul>
                        <li>You can see gif below.</li>
                    </ul>
                    <img src="images/instruction/instruction-link-mobile.gif" width="95%" alt="">
                </div>

                <div class="row">
                    <h3 style="margin-top: 20px">Smart phone Android :</h3>
                    <ul>
                        <li>You can see gif below.</li>
                    </ul>
                    <img src="images/instruction/instruction-link-mobile-android.gif" width="95%" alt="">
                </div>

            </div>
        </div>
        <div class="col-md-5">
            @include('widget.suggest-video')
        </div>
    </div>
@endsection