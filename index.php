<html>
    <head>
    <!-- try to detect the device by using https://github.com/hicTech/navJs -->
        <script type="text/javascript" src="navjs/js/navigatorJS.min.js"></script>
        <script type="text/javascript" src="navjs/js/vendors/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="navjs/js/vendors/underscore.js"></script>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width,minimum-scale=1.0, maximum-scale=1.0" />
        <title>Site Name</title>
        <style>@media screen and (max-device-width:480px){body{-webkit-text-size-adjust:none}}</style>

        <!-- implement javascript on web page that first first tries to open the deep link
            1. if user has app installed, then they would be redirected to open the app to specified screen
            2. if user doesn't have app installed, then their browser wouldn't recognize the URL scheme
            and app wouldn't open since it's not installed. In 1 second (1000 milliseconds) user is redirected
            to download app from app store.
        -->
        <script>
            jQuery(document).ready(function () {
                if (navJS.isAndroid()) {
                    alert('Android');
                } else if (navJS.isIOS()) {
                    alert('Ios');
                } else {
                    alert('Unknown');
                }
            });
        </script>
        <!-- EO try to detect the device by using https://github.com/hicTech/navJs -->

    </head>
    <?php
    $link_redirect = [
        'https://localhost/deeplink/bu/r1' => 'R1',
        'https://localhost/deeplink/bu/r2' => 'R2',
        'https://localhost/deeplink/bu/r3' => 'R3',
        'https://localhost/deeplink/bu/r4' => 'R4'
    ];
    ?>
    <body>
        <?php
        echo '<pre>';
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        echo $url;
        echo "\n";
        if (!empty($link_redirect[$url])) {
            echo 'Redirect catre ' . $link_redirect[$url];
        } else {
            echo 'URL Not in the list of $link_redirect';
        }
        ?>
    </body>
</html>
<script>
    //alert('<?php echo $link_redirect[$url] ?>');
 // Redirect to deeplink
            window.onload = function () {
                  // myappname://book/book_id.book_chapter
                window.location = 'myappname://link/to/source';

                 // Redirect to appstore if app is not installed
                setTimeout("window.location = 'https://apps.apple.com/ro/app/app-name/idxxxxxx';", 1000);
            }

  // EO Redirect to deeplink
</script>
