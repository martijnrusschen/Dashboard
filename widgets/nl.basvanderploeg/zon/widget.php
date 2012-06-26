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
        
        function day_or_night() {
            // determine if it is 'night' or 'day'
            // returns string: 'night' or 'day'
            global $latitude, $longitude, $tzoffset, $zenith;

            $sunrise_epoch = date_sunrise(time(), SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude, $zenith, $tzoffset);
            $sunset_epoch = date_sunset(time(), SUNFUNCS_RET_TIMESTAMP, $latitude, $longitude, $zenith, $tzoffset);
            $time_epoch = time(); // time now

            if ($time_epoch >= $sunset_epoch or $time_epoch <= $sunrise_epoch) {
                return 'night';
            } else {
                return 'day';
            }
        }

        $dayornight = day_or_night();

        // determine sunrise time
        $sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, $latitude, $longitude, $zenith, $tzoffset);
        $sunrise_time = date($time_format, strtotime(date("Y-m-d") . ' ' . $sunrise));

        // determine sunset time
        $sunset = date_sunset(time(), SUNFUNCS_RET_STRING, $latitude, $longitude, $zenith, $tzoffset);
        $sunset_time = date($time_format, strtotime(date("Y-m-d") . ' ' . $sunset));
        ?>
    
        <li>
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
        #knop-dagnacht{
            background-image: url("res/nl.basvanderploeg/core/img/nu-<?php echo ($dayornight == 'night') ? 'nacht' : 'dag'; ?>.png");
            background-repeat:no-repeat;
        } 

        @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
        only screen and (-o-min-device-pixel-ratio: 3/2),
        only screen and (min--moz-device-pixel-ratio: 1.5),
        only screen and (min-device-pixel-ratio: 1.5) {
            #knop-dagnacht {
                background-image:url("res/nl.basvanderploeg/core/img/nu-<?php echo ($dayornight == 'night') ? 'nacht' : 'dag'; ?>.png");
            }
        }

        #knop-dagnacht{
            background-size:218px 122px;
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>