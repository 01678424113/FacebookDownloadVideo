<script>
    function progressShow()
    {
        $("#progress").width('67%');

        setTimeout(
            function()
            {
                document.getElementById('progressbar').style.width = "48%";
            }, 250);

        var i = 2;
        var num = 48;
        interval = setInterval(
            function()
            {

                num = num + (48/i);
                var n = num.toString() + '%';
                i = i*2;
                console.log(n);
                document.getElementById('progressbar').style.width = n ;
                if (num > 95.90625)
                {
                    document.getElementById('progressbar').style.width = '98.5%' ;
                    clearInterval(interval);
                }

            }, 600);

    }
</script>

<div id="extension" class="row-fluid container">
    <div class="well col-md-12">
        <center>
            <strong>Facebook Video Downloader Online </strong> <br /> <a href="privacy.php">Privacy Policy</a> | <a href="contact.php">Contact us</a> | <a href="about.php">About</a><br />
            More from FBDOWN.net >>: <a href="http://twdown.net/index.php"><strong>Twitter Video Downloader</strong></a>
        </center>
    </div>
</div>