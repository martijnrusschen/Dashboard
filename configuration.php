<?php

class Configuration {

    // Algemene instellingen
    // Google Analytics trackincode (bv. UA-2044578-1)
    public $analytics = 'UA-2044578-1';
    
    // Apple store
    public $applestore = array(
        'enabled' => true, 
        'path' => 'modules/applestore.php'
    );
    
    // BBQ weer
    public $bbq_weer = array(
        'enabled' => true, 
        'path' => 'modules/bbq_weer.php'
    );
    
    // Currency
    public $currency = array(
        'enabled' => true, 
        'path' => 'modules/currency.php',
        'api-key' => ''
    );
    
    // Dribble
    public $dribble = array(
        'enabled' => true, 
        'path' => 'modules/dribble.php',
        'username' => 'basvanderploeg'
    );
    
    // Journaal 24
    public $journaal24 = array(
        'enabled' => true, 
        'path' => 'modules/journaal24.php'
    );
    
    // Klok analoog
    public $klok_analoog = array(
        'enabled' => true, 
        'path' => 'modules/klok_analoog.php'
    );
    
    // Klok digitaal
    public $klok_digitaal = array(
        'enabled' => true, 
        'path' => 'modules/klok_digitaal.php'
    );
    
    // Luchtvochtigheid
    public $luchtvochtigheid = array(
        'enabled' => true, 
        'path' => 'modules/luchtvochtigheid.php',
        'data' => array(
            array(
                'enabled' => true,
                'titel' => 'Amsterdam',
                'plaatscode' => '727232'
            ),
            array(
                'enabled' => false,
                'titel' => 'Zoetermeer',
                'plaatscode' => '735077'
            )
        )
    );
    
    // Radio
    public $radio = array(
        'enabled' => true, 
        'path' => 'modules/radio.php'
    );
    
    // Stocks
    public $stocks = array(
        'enabled' => true, 
        'path' => 'modules/stocks.php',
        'data' => array(
            array(
                'label' => 'AAPL',
                'enabled' => true,
                'url-text' => 'http://download.finance.yahoo.com/d/quotes.csv?s=AAPL&f=l1',
                'url-sub' => 'http://download.finance.yahoo.com/d/quotes.csv?s=AAPL&f=c1'
            ),
            array(
                'label' => 'FB (Facebook)',
                'enabled' => true,
                'url-text' => 'http://download.finance.yahoo.com/d/quotes.csv?s=FB&f=l1',
                'url-sub' => 'http://download.finance.yahoo.com/d/quotes.csv?s=FB&f=c1'
            ),
        )
    );
    
    // Temperatuur
    public $temperatuur = array(
        'enabled' => true,
        'path' => 'modules/temperatuur.php',
        'data' => array(
            array(
                'enabled' => true,
                'titel' => 'Amsterdam',
                'plaatscode' => '727232'
            ),
            array(
                'enabled' => false,
                'titel' => 'Zoetermeer',
                'plaatscode' => '735077'
            )
        )
    );
    
    // Twitter
    public $twitter = array(
        'enabled' => true,
        'path' => 'modules/twitter.php',
        'username' => 'stayallive'
    );
    
    // Wind
    public $wind = array(
        'enabled' => true,
        'path' => 'modules/wind.php'
    );
    
    // Zon
    public $zon = array(
        'enabled' => true,
        'path' => 'modules/zon.php'
    );


    // iOS Downloads
    public $iosdownloads = array(
        'enabled' => true, 
        'path' => 'modules/iosdownloads.php',
        'data' => array(
            array(
                'enabled' => false,
                'label' => 'iOS Downloads',
                'url-iphone' => 'http://basvanderploeg.nl/goodies/count_iculture.txt', 
                'url-ipad' => 'http://basvanderploeg.nl/goodies/count_iculture_ipad.txt',
                'url-ipadretina' => 'http://basvanderploeg.nl/goodies/count_iculture_ipad_retina.txt'
            ),
        )
    );


}