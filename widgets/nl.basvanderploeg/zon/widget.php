<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['zon']) && $config['nl.basvanderploeg']['zon']['enabled']) { ?>
    <!-- HTML / PHP -->
        <?php
        $myTZ = $config['nl.basvanderploeg']['zon']['timezone'];
        $time_format = 'H:i';
        $latitude = $config['nl.basvanderploeg']['zon']['latitude'];
        $longitude = $config['nl.basvanderploeg']['zon']['longitude'];
        $zenith = $config['nl.basvanderploeg']['zon']['zenith'];

        if (!function_exists('date_default_timezone_set')) {
            putenv("TZ=" . $myTZ);
        } else {
            date_default_timezone_set("$myTZ");
        }
        
        $tzoffset = date("Z") / 60 / 60;
        
        // detirmine if it is day/night
        $sunrise_epoch = date_sunrise(time(), SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude, $zenith, $tzoffset);
        $sunset_epoch = date_sunset(time(), SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude, $zenith, $tzoffset);
        $time_epoch = time();

        $dayornight = ($time_epoch >= $sunset_epoch or $time_epoch <= $sunrise_epoch) ? 'nacht' : 'dag';

        // determine sunrise time
        $sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, $latitude, $longitude, $zenith, $tzoffset);
        $sunrise_time = date($time_format, strtotime(date("Y-m-d") . ' ' . $sunrise));

        // determine sunset time
        $sunset = date_sunset(time(), SUNFUNCS_RET_STRING, $latitude, $longitude, $zenith, $tzoffset);
        $sunset_time = date($time_format, strtotime(date("Y-m-d") . ' ' . $sunset));
        ?>
    
        <li data-refresh="true" data-id="nl.basvanderploeg.zon" data-timeout="<?php echo TIME_MS_MINUTE; ?>">
            <div class="box" id="knop-dagnacht">
                <div class="dag-text">
                    <?php echo $sunrise_time; ?>
                </div>

                <div class="nacht-text">
                    <?php echo $sunset_time; ?>
                </div>  
            </div>
            <label><?php echo $config['nl.basvanderploeg']['zon']['label']; ?></label>
        </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css">
        .dag-text {
            top:90px; 
            left:28px;
            right:139px;
            position:absolute;
            color:  white;
            font-size: 16px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 0px 1px black; 
        } 
        .nacht-text {
            top:90px; 
            left:139px;
            right:28px;
            position:absolute;
            color:  white;
            font-size: 16px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 0px 1px black; 
        } 
        #knop-dagnacht{
            background-image: url("widgets/nl.basvanderploeg/zon/img/bg-<?php echo $dayornight; ?>.png");
            background-repeat:no-repeat;
            background-size:218px 122px;
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>