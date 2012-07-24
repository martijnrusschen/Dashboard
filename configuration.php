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
    
    // Google Analytics trackincode (bv. UA-2044578-1)
    public static $analytics = 'UA-2044578-1';
    
    /**
     * Security 
     */
    // Schakel de beveiliging in
    public static $auth = true;
    
    // Array met gebruiker
    // vb. 'username' => 'password'
    public static $auth_users = array(
        'username' => 'password'
    );
    
    // Bericht die gegeven word als er geen geldige gebruikersnaam/wachtwoord is gebruikt
    public static $auth_wrong_username = 'Geen geldige gebruiker!';
    public static $auth_wrong_password = 'Geen geldig wachtwoord!';
    
    // Login scherm avatar (Default: 'core/img/no-avatar@2x.png')
    // Voor Gravatar vul je mail adres in
    public static $auth_image = 'core/img/no-avatar@2x.png';
    
    // Achtergrond van login scherm
    // Mogelijke waarde: stripe, clean
    public static $auth_background = 'clean'; // Verander in clean voor een achtergrond zonder lijn
    
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
    
    // Schoon de cache elke keer als de pagina word geladen
    public static $clean_cache_onload = false;
    
    /**
     * !!! Advanced !!!
     * Verander hier alleen iets als je weet wat je doet!
     */
    public static $homepage = 'index.php';
    public static $auth_login = 'login.php';
    public static $widget_file = 'widget.php';
    public static $widget_config = 'config.php';
    
    public static $ext_regex = '/.*(\%s)$/';
    public static $img_regex = '/.*(\.[Jj][Pp][Gg]|\.[Gg][Ii][Ff]|\.[Jj][Pp][Ee][Gg]|\.[Pp][Nn][Gg])$/';
    public static $mail_regex = '/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/';
    
    public static $widgets_dir = 'widgets';
    public static $action_dir = 'actions';
    public static $cache_dir = 'cache';
    
    public static $widgets_wrapper = '#widgets';
    
    public static $action_ext = '.php';
    public static $cache_ext = '.cache';
    
    public static $core_img_search =  'nl.basvanderploeg/core/img';
    public static $ignore_dirs = array('.htaccess', 'index.php', '.svn', '.', '..');
    public static $catch = true;
    
    public static $auth_backgrounds = array(
        'stripe' => 'core/img/loginback@2x.png',
        'clean' => 'core/img/loginbackclean@2x.png'
    );
    
}

?>