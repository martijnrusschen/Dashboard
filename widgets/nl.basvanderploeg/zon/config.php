<?php

/**
 * Zonsop- en ondergang
 * 
 * Timezone:                PHP timezone zie: http://php.net/manual/en/timezones.php
 * Latitude & Longtitude:   Latitude & Longtitude van huidige locatie
 * Zenith:                  zie: http://en.wikipedia.org/wiki/Twilight
 * 
 * @author Bas van der Ploeg
 */

$config['nl.basvanderploeg']['zon'] = array(
    'enabled' => true,
    'label' => 'Zonsop- en ondergang',
    'timezone' => 'Europe/Amsterdam',
    'latitude' => 52.374004,
    'longitude' => 4.890359,
    'zenith' => 90 + (50 / 60)
);

?>