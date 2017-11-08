<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{$logo}}" />
    <title>{{$video_show->title_video}}</title>
    <meta name="description" content="{{$video_show->description}}">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{--<meta name="google-site-verification" content="V1AYqLy68tH-AGCmjUTcHcWivg3xaeRnJITrbgsO8gA" />--}}
    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-109332460-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-109332460-1');
    </script>

</head>
<body>
@include('layouts.header')
@yield('content')

@include('layouts.footer')
@yield('script')
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=874373596059321";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<script>
    $("#ext").click(function()
        {   event.preventDefault();
            $('html, body').animate({
                scrollTop: $("#extension").offset().top
            }, 2000);
        }
    );
    $("#ext2").click(function()
        {   event.preventDefault();
            $('html, body').animate({
                scrollTop: $("#extension").offset().top
            }, 2000);
        }
    );
</script>
</body>
</html>