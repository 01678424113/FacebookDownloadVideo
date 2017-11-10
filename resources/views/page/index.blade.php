@extends('layout')
@section('content')
    @include('widget.form-download')
    @include('widget.video-hot')
    <div class="container">
        <hr>
        <h3>Question and Answer</h3>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <div class="QandA">
                    <div class="panel-group" id="accordion">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">How to use
                                        download
                                        video public?</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>You don't install any software or plugins. Only URL facebook, you can download
                                        videos or clip facebook.Copy URL then paste into form above. After few seconds,
                                        you can download it as fast as possible.</p>
                                    <p>Please <a href="{{route('instructionPublic')}}">click here</a> to see the image
                                        guide. Thank you for reading!
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Find facebook
                                        ID by
                                        URL Profile</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>Go to Facebook.com, find facebook user which you want to find. Copy their URL
                                        profile and paste into form <a href="{{route('getFindId')}}">in here</a>>. Click
                                        "Find ID Now" and waiting few seconds. You can see the image guide below form
                                        "Find ID Now". Thank you for reading ! </p>
                                    You can <a href="{{route('getFindId')}}">click here</a>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">How to use
                                        download
                                        video PRIVATE?</a>
                                </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>If you have the URL video private. You can see the image guild
                                        <a href="{{route('instructionPrivate')}}"> in here </a> to load it.
                                    </p>
                                    You can <a href="{{route('instructionPrivate')}}">click here</a>. Thank you for
                                    reading !
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Link is invalid
                                        or not exist !</a>
                                </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>If you encounter this error. Please check the URL and send URL to us into
                                        facebook message <a href="https://www.facebook.com/nguyenlam.dev">click here</a>. We apologize for this and will fix it soon.
                                    </p>
                                    <p>Thank you for reading !</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">How to copy link video on mobile ?</a>
                                </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>You can <a href="{{route('instructionLinkMobile')}}">click here</a> to see the gif guild to copy link on mobile.!</p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Video facebook hot !</a>
                                </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <p>You can see videos hot above. This is videos facebook public. Thank you for reading !</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
