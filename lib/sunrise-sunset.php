<?php

/*
  Sunrise - Sunset PHP Script by Mike Challis
  Free PHP Scripts - www.642weather.com/weather/scripts.php
  Download         - www.642weather.com/weather/scripts/sunrise-sunset.zip
  Live Example     - www.642weather.com/weather/sunrise-sunset.php
  Contact Mike     - www.642weather.com/weather/contact_us.php
  Donate: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=2319642

  Version: 1.06 - 18-Jul-2009  see changelog.txt for changes

 * *Requires PHP 5**
  (PHP version 5.1.3 or higher is recommended due to date_sunset bugs in prior versions)

  Support thread at weather-watch forum:
  http://www.weather-watch.com/smf/index.php/topic,32040.0.html

  You are free to use and modify the code

  This php code provided "as is", and Long Beach Weather (Michael Challis)
  disclaims any and all warranties, whether express or implied, including
  (without limitation) any implied warranties of merchantability or
  fitness for a particular purpose.

 */

// phpinfo();
###############
# begin settings
###############
// Set the timezone for your location, because some servers are in different timezone than your location
// http://saratoga-weather.org/timezone.txt  has the list of timezone names
// uncomment one myTZ setting: NOTE: this *MUST* be set correctly
//$myTZ = 'America/New_York'; // Eastern Time
//$myTZ = 'America/Chicago';  // Central Time
//$myTZ = 'America/Denver';   // Mountain Time
//$myTZ = 'America/Phoenix';  // Mountain Standard Time - Arizona
//$myTZ = 'America/Los_Angeles';  // Pacific Time
$myTZ = 'Europe/Amsterdam'; // Nederland

$time_format = 'H:i'; // 08:53 PM PDT
// Set the latitude and longitude for your location
$latitude = 52.374004; //North
$longitude = 4.890359; //West
// uncomment one zenith setting: http://en.wikipedia.org/wiki/Twilight
$zenith = 90 + (50 / 60); // True sunrise/sunset
//$zenith = 96;          // Civilian Twilight - Conventionally used to signify twilight
//$zenith = 102;         // Nautical Twilight - the point at which the horizon stops being visible at sea.
//$zenith = 108;         // Astronomical Twilight - the point when Sun stops being a source of any illumination.

$verbose = false; // print debugging info, settings and variables for testing
###############
# end settings
###############
// Set timezone in PHP5/PHP4 manner
if (!function_exists('date_default_timezone_set')) {
    putenv("TZ=" . $myTZ);
} else {
    date_default_timezone_set("$myTZ");
}

// find time offset in hours
$tzoffset = date("Z") / 60 / 60;

// determine if it is 'night' or 'day'
$dayornight = day_or_night();

// determine sunrise time
$sunrise = date_sunrise(time(), SUNFUNCS_RET_STRING, $latitude, $longitude, $zenith, $tzoffset);
$sunrise_time = date($time_format, strtotime(date("Y-m-d") . ' ' . $sunrise));

// determine sunset time
$sunset = date_sunset(time(), SUNFUNCS_RET_STRING, $latitude, $longitude, $zenith, $tzoffset);
$sunset_time = date($time_format, strtotime(date("Y-m-d") . ' ' . $sunset));

// this prints the program output, you can modify to fit your needs
//if($dayornight == 'night') {
// it is night
//      echo 'Good night<br />';
//      echo "Sunrise: $sunrise_time<br />";
//      echo "Sunset: $sunset_time<br />";
//}else{
// it is day
//      echo 'Good day<br />';
//      echo "Sunrise: $sunrise_time<br />";
//      echo "Sunset: $sunset_time<br />";
//}
// print debugging info, settings and variables for testing
if ($verbose) {
    echo '<h3>Settings and Variables:</h3><pre>';

    echo 'Current PHP version: ' . phpversion() . "\n";
    echo date("M d Y h:i:s A T") . " (server time)\n";
    echo gmdate("M d Y h:i:s A T") . " (GMT time)\n\n";

    echo 'myTZ = ' . $myTZ . "\n";
    echo 'tzoffset = ' . $tzoffset . "\n";
    echo 'lat = ' . $latitude . "\n";
    echo 'long = ' . $longitude . "\n";
    echo 'Zenith = ' . $zenith . "\n\n";

    echo 'Day or Night: ' . $dayornight . "\n";
    echo 'Sunrise will occur at ' . $sunrise_time . "\n";
    echo 'Sunset will occur at ' . $sunset_time . "\n";
    echo '</pre>';
}

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

?>