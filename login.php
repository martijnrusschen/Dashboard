<?php

define('BAS', 1);
define('DS', DIRECTORY_SEPARATOR);
define('LIB', 'core' . DS . 'lib');

require 'Configuration.php';
require LIB . DS . 'include.inc.php';

$dash = new Dashboard();

if (!Config::$auth || isset($_SESSION['loggedin'])) { if ($_SESSION['loggedin'] == 1) header('Location: index.php'); }


if (isset($_POST['username'], $_POST['password'])) {
    $dash->login($_POST['username'], $_POST['password']);
}

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
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
        
        <!-- iOS Web App Icon -->
        <link rel="apple-touch-icon" href="core/img/icon-57.png" sizes="57x57" ><!-- iPhone -->
        <link rel="apple-touch-icon" href="core/img/icon-72.png" sizes="72x72" ><!-- iPad -->
        <link rel="apple-touch-icon" href="core/img/icon-114.png" sizes="114x114" ><!-- iPhone (Retina) -->
        <link rel="apple-touch-icon" href="core/img/icon-144.png" sizes="144x144" ><!-- iPad (Retina) -->
        
        <!-- iOS Web App Splash screen -->
        <link rel="apple-touch-startup-image" href="core/img/iphone-landscape.png" media="(device-width: 320px)" ><!-- iPhone -->
        <link rel="apple-touch-startup-image" href="core/img/iphone-landscape@2x.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"><!-- iPhone (Retina) -->
        <link rel="apple-touch-startup-image" href="core/img/ipad-portrait.png" media="(device-width: 768px) and (orientation: portrait)" rel="apple-touch-startup-image"><!-- iPad (portrait) -->
        <link rel="apple-touch-startup-image" href="core/img/ipad-landscape.png" media="(device-width: 768px) and (orientation: landscape)" rel="apple-touch-startup-image"><!-- iPad (landscape) -->
        <link rel="apple-touch-startup-image" href="core/img/ipad-portrait@2x.png" media="(device-width: 1536px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"><!-- iPad (Retina, portrait) -->
        <link rel="apple-touch-startup-image" href="core/img/ipad-landscape@2x.png" media="(device-width: 1536px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"><!-- iPad (Retina, landscape) -->
        
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
            <div id="login-div" style="background-image: url('<?php echo Config::$auth_backgrounds[Config::$auth_background]; ?>');">
                <div id="cirkel">
                    <img src="<?php echo (preg_match(Config::$mail_regex, Config::$auth_image)) ? Helper::getGravatar(Config::$auth_image) : Config::$auth_image; ?>" height="80px" width="80px"/>
                </div>
                <center>
                    <form id="login-form" action="<?php echo Config::$auth_login; ?>" method="post">
                        <?php if (isset($_SESSION['login_error'])) { echo '<h3>' . $_SESSION['login_error'] . '</h3>'; } ?>
                        <input type="text" name="username" id="username" placeholder="Gebruikersnaam" class="textbox" /><br/>
                        <input type="password" name="password" id="password" placeholder="Wachtwoord" class="textbox" /><br/>
                        <input type="submit" name="submit" value="Login" class="loginbutton" />
                    </form>
                </center>   
            </div> 
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