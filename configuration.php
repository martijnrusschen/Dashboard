<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Configuratiebestand voor je Dashboard
 * 
 * @author Bas van der Ploeg 
 * @see http://www.basvanderploeg.nl
 */

class Config {

    /**
     * Algemene instellingen 
     */
    // Title
    public static $title = 'Dashboard';
    
    // Tekst aan de bovenkant van de pagina
    public static $top_text = 'Dashboard';
    
    // Meta - Description & Author
    public static $description = 'Dashboard door Bas van der Ploeg';
    public static $author = 'Bas van der Ploeg - www.basvanderploeg.nl';
    
    // Google Analytics trackincode (bv. UA-2044578-1)
    public static $analytics = 'UA-2044578-1';
    
    /**
     * Security 
     */
    // Schakel de beveiliging in
    public static $auth = false;
    
    // Array met gebruiker
    // vb. 'username' => 'password'
    public static $auth_users = array(
        'username' => 'password'
    );
    
    // Bericht die gegeven word als er geen geldige gebruikersnaam/wachtwoord is gebruikt
    public static $auth_wrong_username = 'Geen geldige gebruiker!';
    public static $auth_wrong_password = 'Geen geldig wachtwoord!';
    
    /**
     * Widget instellingen 
     */
    // Zet het sorteren van de widgets aan of uit
    // LET OP: Staat AJAX laden van widgets aan dan kan de sortering veranderen
    public static $do_sort = true;
    
    // Sorteer de widgets op basis van deze array
    // Sorteren doe je mbv. de volledige widget naam bv. nl.basvanderploeg.temperatuur
    public static $sort = array(
        'nl.basvanderploeg.klok_analoog',
        'nl.basvanderploeg.klok_digitaal',
        'nl.basvanderploeg.temperatuur'
    );
    
    /**
     * AJAX
     */
    // Laad widgets a-synchroon bij opstarten (Versneld laadtijd)
    // LET OP: Afbeeldingen kunnen even op zich laten wachten
    public static $ajax_load = true;
    
    // Moeten de widgets wachten op het document of kunnen ze gelijk laden?
    public static $wait_for_dom = true;
    
    // Laat een spinner zien terwijl de widget laad
    // LET OP: Als deze optie is uitgeschakeld kan het zijn dat de sortering niet 100% klopt
    public static $ajax_placeholder = true;
    
    /**
     * Caching 
     */
    // Doorzoek de res map en preload alle images
    public static $preload = true;
    
    /**
     * !!! Advanced !!!
     * Verander hier alleen iets als je weet wat je doet!
     */
    public static $homepage = 'index.php';
    public static $auth_login = 'login.php';
    public static $widget_file = 'widget.php';
    public static $widget_config = 'config.php';
    
    public static $widgets_dir = 'widgets';
    public static $resource_dir = 'res';
    public static $action_dir = 'actions';
    public static $cache_dir = 'cache';
    
    public static $widgets_wrapper = '#widgets';
    
    public static $action_ext = '.php';
    public static $cache_ext = '.cache';
    
    public static $core_img_search =  'nl.basvanderploeg/core/img';
    public static $ignore_dirs = array('.htaccess', 'index.php', '.svn', '.', '..');
    public static $img_regex = '/.*(\.[Jj][Pp][Gg]|\.[Gg][Ii][Ff]|\.[Jj][Pp][Ee][Gg]|\.[Pp][Nn][Gg])$/';
    public static $catch = true;
    
}

?>