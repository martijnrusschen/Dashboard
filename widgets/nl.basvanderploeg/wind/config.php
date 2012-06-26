<?php

/**
 * Wind
 * 
 * Plaatscode:  To get the location code you should search for your location on Yahoo! weather and then area code from the resultant URL. 
 *              For example the url: http://weather.yahoo.com/forecast/UKXX0085.html would give you the code UKXX0085 
 *              (which is actually the code for London, England).
 * Label:       Tekst onder de widget
 * 
 * @author Bas van der Ploeg
 * @see http://www.basvanderploeg.nl 
 */

$config['nl.basvanderploeg']['wind'] = array(
    'enabled' => true,
    'data' => array(
        array(
            'enabled' => true,
            'label' => 'Wind - Amsterdam',
            'plaatscode' => '727232'
        ),
        array(
            'enabled' => true,
            'label' => 'Wind - Zoetermeer',
            'plaatscode' => '735077'
        )
    )
);

?>