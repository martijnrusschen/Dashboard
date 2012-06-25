<?php
require 'configuration.php';
include 'lib/sunrise-sunset.php';

$config = new Configuration();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Dashboard</title>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv='cleartype' content='on'/>
        
        <meta name='description' content='Dashboard door Bas van der Ploeg' />
        <meta name="author" content="Bas van der Ploeg - www.basvanderploeg.nl" />
        
        <meta name='HandheldFriendly' content='True'/>
        <meta name='MobileOptimized' content='320'/>
        <meta name='format-detection' content='telephone=no'/>
        <meta name='viewport' content='width=device-width, minimum-scale=1.0, maximum-scale=1.0'/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />  
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/icon-144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/icon-144.png" />

        <!-- iPhone (Retina) SPLASHSCREEN-->
        <link href="http://basvanderploeg.nl/dashboard/img/iphone-landscape@2x.png" media="(device-width: 320px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>

        <!-- iPad (Retina, portrait) SPLASHSCREEN-->
        <link href="http://basvanderploeg.nl/dashboard/img/ipad-portrait@2x.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: portrait) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>

        <!-- iPad (Retina, landscape) SPLASHSCREEN-->
        <link href="http://basvanderploeg.nl/dashboard/img/ipad-landscape@2x.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image"/>

        <link rel="stylesheet" href="style.css" media="screen" />
        <link rel="stylesheet" href="css/lightbox.css" />
        <?php include 'modules/modules.php'; ?>

        <!--[if !IE]>-->
        <link media="only screen and (max-device-width: 480px)" href="iphone.css" type="text/css" rel="stylesheet" />
        <!--<![endif]-->

        <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css' />
        <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css' />

        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/lightbox.js"></script>
    </head>
    <body>
        <div class="wrap">

            <!-- Start widgets -->
            <ul id="widgets">

                <!-- ===============================================  
                                      TEMPERATUUR 
                     =============================================== -->
                <?php
                if ($config->temperatuur['enabled']) {
                    include $config->temperatuur['path'];
                }
                ?>
                <!-- ===============================================  
                                        STOCKS
                     =============================================== -->
                <?php
                if ($config->stocks['enabled']) {
                    include $config->stocks['path'];
                }
                ?>
                <!-- ===============================================  
                                         KLOK DIGITAAL
                     =============================================== -->
                <?php
                if ($config->klok_digitaal['enabled']) {
                    include $config->klok_digitaal['path'];
                }
                ?>
                <!-- ===============================================  
                                      FOLLOWERS TWITTER 
                     =============================================== -->
                <?php
                if ($config->twitter['enabled']) {
                    include $config->twitter['path'];
                }
                ?>
                <!-- ===============================================  
                                         LUCHTVOCHTIGHEID
                     =============================================== -->
                <?php
                if ($config->luchtvochtigheid['enabled']) {
                    include $config->luchtvochtigheid['path'];
                }
                ?>
                <!-- ===============================================  
                                   APPLE STORE DOWN?
                     =============================================== -->
                <?php
                if ($config->applestore['enabled']) {
                    include $config->applestore['path'];
                }
                ?>
                <!-- ===============================================  
                                         RADIO
                     =============================================== -->
                <?php
                if ($config->radio['enabled']) {
                    include $config->radio['path'];
                }
                ?>
                <!-- ===============================================  
                                   DRIBBBLE FOLLOWERS
                     =============================================== -->
                <?php
                if ($config->dribbble['enabled']) {
                    include $config->dribble['path'];
                }
                ?>
                <!-- ===============================================  
                                    ZONSOP- EN ONDERGANG
                     =============================================== -->
                <?php
                if ($config->zon['enabled']) {
                    include $config->zon['path'];
                }
                ?>
                <!-- ===============================================  
                                    TV JOURNAAL 24
                     =============================================== -->
                <?php
                if ($config->journaal24['enabled']) {
                    include $config->journaal24['path'];
                }
                ?>
                <!-- ===============================================  
                                    KLOK ANALOOG
                     =============================================== -->
                <?php
                if ($config->klok_analoog['enabled']) {
                    include $config->klok_analoog['path'];
                }
                ?>
                <!-- ===============================================  
                                 IS HET VANDAAG BBQWEER?
                     =============================================== -->
                <?php
                if ($config->bbq_weer['enabled']) {
                    include $config->bbq_weer['path'];
                }
                ?>
                <!-- ===============================================  
                                     CURRENCY
                     =============================================== -->
                <?php
                if ($config->currency['enabled']) {
                    include $config->currency['path'];
                }
                ?>
                <!-- ===============================================  
                                      WIND 
                     =============================================== -->
                <?php
                if ($config->wind['enabled']) {
                    include $config->wind['path'];
                }
                ?>
                <!-- ===============================================  
                                  iOS DOWNLOADS 
                     =============================================== -->
                <?php
                if ($config->wind['enabled']) {
                    include $config->iosdownloads['path'];
                }
                ?>
                
            </ul>        
        </div>
        <!--EINDE LIST-->

        <!-- DIT IS DE HEADER -->
        <div id="top-info">
            <div class="top-text">
                <a href="javascript:location.reload(true)">Dashboard</a>
            </div>  
        </div>

        <!-- DIT IS DE FOOTER -->
        <div id="bottom-info"></div>

        <!-- ANALYTICS -->
        <script type="text/javascript">
            var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
            document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
        </script>
        <script type="text/javascript">
            var pageTracker = _gat._getTracker("<?php echo $config->analytics ?>");
            pageTracker._trackPageview();
        </script>

    </body>
</html>