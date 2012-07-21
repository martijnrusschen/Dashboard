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
            'poster' => 'widgets/nl.basvanderploeg/stream/img/poster/nos-journaal24.png'
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
            'poster' => 'widgets/nl.basvanderploeg/stream/img/poster/nos-politiek24.png'
        ),
        array(
            'enabled' => true,
            'label' => 'Tour de France',
            'streams' => array(
                array(
                    'url' => 'http://108da006e4b9de05dddf161208036ddf.5cbe04d3fb20758953ddc04e685fe4ae.smoote2k.npostreaming.nl/d/live/nos/events/sportzomer2012_01/sportzomer2012_01.isml/sportzomer2012_01.m3u8',
                    'type' => 'video/mp4'
                )
            ),
            'poster' => 'http://s.nos.nl/img/placeholders/studiosport.jpg'
        )
    )
);

?>