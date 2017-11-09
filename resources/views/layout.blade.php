<!doctype html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="{{$logo}}" />
    <title>{{$settings[0]->value_setting}}</title>
    <meta name="description" content="{{$settings[1]->value_setting}}">
    <meta name="keywords" content="{{$settings[2]->value_setting}}">
    <meta charset="utf-8">
    <base href="{{asset('')}}">

    <meta itemprop="url" content="{{route('home')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 days">
    <link rel="canonical" href="{{route('home')}}" />
    <meta property="og:locale" content="id_ID" />
    <meta property="og:image" content="images/logo/image-header.png" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{$settings[0]->value_setting}}" />
    <meta property="og:description" content="{{$settings[1]->value_setting}}" />
    <meta property="og:url" content="{{route('home')}}" />
    <meta property="og:site_name" content="Facebook Video Downloader 2017" />
    <meta name="DC.title" content="{{$settings[0]->value_setting}}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <meta name="google-site-verification" content="V1AYqLy68tH-AGCmjUTcHcWivg3xaeRnJITrbgsO8gA" />
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