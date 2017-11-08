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
                                <div class="panel-body">You can <a href="{{route('instructionPublic')}}">click here</a></div>
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
                                <div class="panel-body">You can <a href="{{route('instructionPrivate')}}">click here</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
