<!doctype html>
<html lang="en">
<head>
    <title>{{env('TITLE_WEBSITE')}}</title>
    <meta name="description" content="">
    <meta name="keywords" content="facebook video downloader,download facebook videos,facebook online downloader, grab facebook online, free facebook video downloader,baixar vídeos do Facebook,baixar facebook,video downloader extension chrome">
    <meta name="google-site-verification" content="2aqAGGG-5Szz5PEYO9RNg48ycVxJEj1YffdjRGKASKw" />
    <meta name="google-site-verification" content="hKDmSuXEvM5ZUELvEpu4DsksfXbrX98W5P3inIVeVMQ" />
    <meta name="alexaVerifyID" content="_6878lGgoQzBKMSMI_kFSAYMJXw" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
@include('layouts.header')
@yield('content')

@include('layouts.footer')
@yield('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.10&appId=163828407520632";
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