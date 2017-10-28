<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="images/logo/logo.ico" />
    <title>facebook video downloader - fbdownloadvideo.net/</title>
    <meta name="description" content="Facebook video downloader, downloader video facebook download online. You can download video and save them anywhere.In addition, we also support find your id by URL profile. Facebook downloader video and facebook search id will help you all with facebook !">
    <meta name="keywords" content="facebook video downloader,fb video downloader,online video downloader,hd video downloader,baixar videos do facebook,mp4 video downloader,facebook video,download video facebook,bajar videos facebook,url video downloader">
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