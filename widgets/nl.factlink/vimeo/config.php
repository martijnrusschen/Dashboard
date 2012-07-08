<?php

/**
 * Vimeo
 * 
 * Het is mogelijk om het aantal views per video te bekijken
 * of het totaal aantal views voor een account.
 * 
 * mode - 'video' voor het aantal views per video
 *      - 'total' voor het totaal aantal views voor de account
 * id   - (Mode: video) -> Video ID
 *      - (Mode: total) -> Username
 * 
 * @author Martijn
 * @see http://www.factlink.nl 
 */

$config['nl.factlink']['vimeo'] = array(
    'enabled' => true,
    'data' => array(
        array(
            'enabled' => true,
            'label' => 'Vimeo - Enkele video',
            'mode' => 'video',
            'id' => '39821677'
        ),
        array(
            'enabled' => true,
            'label' => 'Vimeo - Totaal van gebruiker',
            'mode' => 'total',
            'id' => 'Factlink'
        )
    ),
    'video-url' => 'http://vimeo.com/api/v2/video/{id}.json',
    'total-url' => 'http://vimeo.com/api/v2/{id}/videos.json',
);

?>