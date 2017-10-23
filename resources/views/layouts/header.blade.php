<nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0px;" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu"><span
                        class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                        class="icon-bar"></span><span class="icon-bar"></span></button>
            <a class="navbar-brand" href="index.php"><img style="width:160px;margin-top:-5px"
                                                          alt="Facebook Video Downloader"
                                                          src="img/logo-facebook-video-downloader.png"></a>
        </div>
        <div class="collapse navbar-collapse" id="menu">
            <ul class="nav navbar-nav">
                <li style="display:none">
                    <a href="http://fbdown.net">Video Downloader</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="glyphicon glyphicon-question-sign"></span> How to? <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('instructionPublic')}}">How to use Facebook Download?</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('instructionPrivate')}}">How to use Private video Downloader?</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span> More <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('getPrivateVideo')}}"><span
                                        class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Private Video
                                Downloader</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="glyphicon glyphicon-option-vertical"></span> Find ID FB <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('getFindId')}}"><span
                                        class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> Find ID By URL</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                {{-- <li>
                     <a href="#" onclick="chrome.webstore.install()" id="install-button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> <img src="img/chrome.png" style="width:24px;"> Chrome Extension</a>
                 </li>--}}
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="col-md-6 col-md-offset-3" style="margin-top: 10px">
        @if(session('success'))
            <div class="alert alert-success">
                <strong>Success!</strong> {{session('success')}}
            </div>
        @elseif(session('info'))
            <div class="alert alert-info">
                <strong>Info!</strong> {{session('info')}}
            </div>
        @elseif(session('warning'))
            <div class="alert alert-warning">
                <strong>Warning!</strong> {{session('warning')}}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                <strong>Danger!</strong> {{session('error')}}
            </div>
        @endif
    </div>
</div>