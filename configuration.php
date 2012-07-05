<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Configuratiebestand voor je Dashboard
 */

class Configuration {

    /**
     * Algemene instellingen 
     */
    // Title
    public $title = 'Dashboard';
    
    // Meta - Description & Author
    public $description = 'Dashboard';
    public $author = 'Martijn Russchen';
    
    // Google Analytics trackincode (bv. UA-2044578-1)
    public $analytics = 'UA-code';
    
    /**
     * Security 
     */
    // Schakel de beveiliging in
    public $auth = false;
    
    // Array met gebruiker
    // vb. 'username' => 'password'
    public $auth_users = array(
        'username' => 'password'
    );
    
    // Bericht die gegeven word als er geen geldige gebruikersnaam/wachtwoord is gebruikt
    public $auth_wrong_username = 'Geen geldige gebruiker!';
    public $auth_wrong_password = 'Geen geldig wachtwoord!';
    
    /**
     * Widget instellingen 
     */
    // Zet het sorteren van de widgets aan of uit
    // LET OP: Staat AJAX laden van widgets aan dan kan de sortering veranderen
    public $do_sort = true;
    
    // Sorteer de widgets op basis van deze array
    // Sorteren doe je mbv. de volledige widget naam bv. nl.basvanderploeg.temperatuur
    public $sort = array(
        'nl.basvanderploeg.klok_analoog',
        'nl.basvanderploeg.klok_digitaal',
        'nl.basvanderploeg.temperatuur'
    );
    
    /**
     * AJAX
     */
    // Laad widgets a-synchroon bij opstarten (Versneld laadtijd)
    // LET OP: Afbeeldingen kunnen even op zich laten wachten
    public $ajax_load = true;
    
    // Moeten de widgets wachten op het document of kunnen ze gelijk laden?
    public $wait_for_dom = true;
    
    // Laat een spinner zien terwijl de widget laad
    // LET OP: Als deze optie is uitgeschakeld kan het zijn dat de sortering niet 100% klopt
    public $ajax_placeholder = true;
    
    /**
     * Caching 
     */
    // Doorzoek de res map en preload alle images
    public $preload = true;
    
    /**
     * !!! Advanced !!!
     * Verander hier alleen iets als je weet wat je doet!
     */
    public $homepage = 'index.php';
    public $auth_login = 'login.php';
    public $widgets_dir = 'widgets';
    public $widget_file = 'widget.php';
    public $widget_config = 'config.php';
    public $widgets_wrapper = '#widgets';
    public $resource_dir = 'res';
    public $action_dir = 'actions';
    public $action_ext = '.php';
    public $core_img_search =  'nl.basvanderploeg/core/img';
    public $ignore_dirs = array('.svn', '.', '..');
    public $img_regex = '/.*(\.[Jj][Pp][Gg]|\.[Gg][Ii][Ff]|\.[Jj][Pp][Ee][Gg]|\.[Pp][Nn][Gg])$/';
    public $catch = true;
    
}

?>