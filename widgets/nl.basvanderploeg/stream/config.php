<?php

/**
 * Journaal 24
 * 
 * URL      - Url van de stream
 * Type     - Het type stream (Zie: http://en.wikipedia.org/wiki/HTML5_video)
 * Poster   - De standaard afbeelding die word weergegeven als er niks word afgespeeld
 * Streams  - HTML5 ondersteund het toevoegen van meerdere sources. De eerst beschikbare zal worden afgespeeld (Zie: http://en.wikipedia.org/wiki/HTML5_video)
 * 
 * @author Bas van der Ploeg
 * @see http://www.basvanderploeg.nl 
 */

$config['nl.basvanderploeg']['stream'] = array(
    'enabled' => true,
    'data' => array(
        array(
            'enabled' => true,
            'label' => 'Journaal 24',
            'streams' => array(
                array(
                    'url' => 'http://download.omroep.nl/nos/iphone-live-streaming/j24/j24_iphone.m3u8',
                    'type' => 'video/mp4'
                )
            ),
            'poster' => 'res/nl.basvanderploeg/core/img/nos-journaal24.png'
        ),
        array(
            'enabled' => true,
            'label' => 'Politiek 24',
            'streams' => array(
                array(
                    'url' => 'http://download.omroep.nl/nos/iphone-live-streaming/p24/p24_iphone.m3u8',
                    'type' => 'video/mp4'
                )
            ),
            'poster' => 'res/nl.basvanderploeg/core/img/nos-politiek24.png'
        )
    )
);

?>