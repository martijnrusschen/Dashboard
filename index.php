<?php

define('BAS', 1);
define('DS', DIRECTORY_SEPARATOR);
define('LIB', 'core' . DS . 'lib');

require 'Configuration.php';
require LIB . DS . 'include.inc.php';

$dash = new Dashboard();
$dash->auth();
$dash->catchRequest();
$dash->init();

?>
<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="nl"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

        <title><?php echo Config::$title; ?></title>
        <link type="text/plain" rel="author" href="humans.txt" />

        <!-- iOS Web App Settings -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        
        <!-- iOS Web App Icon -->
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="core/img/icon-114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="core/img/icon-144.png" />
        
        <!-- iOS Web App Splash screen -->
        <link href="core/img/iphone-landscape@2x.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>
        <link href="core/img/ipad-portrait@2x.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>
        <link href="core/img/ipad-landscape@2x.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>
        <link href="core/img/iphone-landscape.png" media="(device-width: 320px)" rel="apple-touch-startup-image"/>
        <link href="core/img/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: portrait)" rel="apple-touch-startup-image"/>
        <link href="core/img/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: landscape)" rel="apple-touch-startup-image"/>

        <!-- FAVICON -->
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
        
        <!-- STYLE -->
        <link rel="stylesheet" href="core/css/style.css">

        <!-- SCRIPTS -->
        <script src="core/js/libs/jquery-1.7.2.min.js"></script>
        <script src="core/js/plugins.js"></script>
        <script src="core/js/script.js"></script>
    </head>
    <body>
        <div role="main" >
            <ul id="widgets">
                <?php $dash->go(); ?>
            </ul>        
        </div>
        
        <header>
            <div id="top-info">
                <div class="top-text">
                    <a href="javascript:location.reload(true);" ><?php echo Config::$top_text; ?></a>
                </div>  
            </div>
        </header>

        <!-- ANALYTICS -->
        <script>
            var _gaq=[['_setAccount','<?php Config::$analytics; ?>'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
                g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
                s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
        <!-- ANALYTICS -->

    </body>
</html>
