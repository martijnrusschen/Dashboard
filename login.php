<?php
define('BAS', 1);
define('DS', DIRECTORY_SEPARATOR);

require 'Configuration.php';
require 'lib' . DS . 'include.inc.php';

Cache::set('test.dit.maar=];)', array('apizza'));

$dash = new Dashboard();

if (!Config::$auth) { header('Location: index.php'); }

if (isset($_POST['username'], $_POST['password'])) {
    $dash->login($_POST['username'], $_POST['password']);
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Config::$title; ?></title>
        <meta name='description' content='<?php echo Config::$description; ?>' />
        <meta name="author" content="<?php echo Config::$author; ?>" />

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv='cleartype' content='on'/>
        
        <meta name='HandheldFriendly' content='True'/>
        <meta name='MobileOptimized' content='320'/>
        <meta name='format-detection' content='telephone=no'/>
        <meta name='viewport' content='width=device-width, minimum-scale=1.0, maximum-scale=1.0'/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />  
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icon-144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/icon-144.png" />

        <link href="res/nl.basvanderploeg/core/img/iphone-landscape@2x.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>
        <link href="res/nl.basvanderploeg/core/img/ipad-portrait@2x.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>
        <link href="res/nl.basvanderploeg/core/img/ipad-landscape@2x.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>

        <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css' />
        
        <link rel="stylesheet" href="res/nl.basvanderploeg/core/css/style.css" media="screen" />

        <!--[if !IE]>-->
        <link rel="stylesheet" href="res/nl.basvanderploeg/core/css/iphone.css" media="only screen and (max-device-width: 480px)" type="text/css" />
        <!--<![endif]-->
        
        <script type="text/javascript" src="res/nl.basvanderploeg/core/js/jquery.js"></script>
    </head>
    <body>
        <div class="wrap">
            <div id="login-container" >
                <form id="login-form" action="<?php echo Config::$auth_login; ?>" method="post">
                    <?php if(isset($_SESSION['login_error'])) { echo '<h3>' . $_SESSION['login_error'] . '</h3>'; } ?>
                    <input type="text" name="username" id="username" placeholder="Gebruikersnaam" /><br/>
                    <input type="password" name="password" id="password" placeholder="Wachtwoord" /><br/>
                    <input type="submit" name="submit" value="Login" />
                </form>
            </div>       
        </div>

        <div id="top-info">
            <div class="top-text">
                <a href="javascript:location.reload(true)">Dashboard</a>
            </div>  
        </div>

        <script type="text/javascript">
            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', '<?php echo Config::$analytics; ?>']);
            _gaq.push(['_trackPageview']);
            
            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        </script>
    </body>
</html>