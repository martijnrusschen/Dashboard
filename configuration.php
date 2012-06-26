<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Configuratiebestand voor je Dashboard
 * 
 * @author Bas van der Ploeg 
 * @see http://www.basvanderploeg.nl
 */

class Configuration {

    /**
     * Algemene instellingen 
     */
    // Title
    public $title = 'Dashboard';
    
    // Meta - Description
    public $description = 'Dashboard door Bas van der Ploeg';
    
    // Meta - Author
    public $author = 'Bas van der Ploeg - www.basvanderploeg.nl';
    
    // Google Analytics trackincode (bv. UA-2044578-1)
    public $analytics = 'UA-2044578-1';
    
    /**
     * Widget instellingen 
     */
    // Path naar widgets map (Default: widgets)
    public $widgets_dir = 'widgets';
    
    // Zet het sorteren van de widgets aan of uit
    public $do_sort = true;
    
    // Sorteer de widgets op basis van deze array
    public $sort = array(
        'nl.basvanderploeg.klok_analoog',
        'nl.basvanderploeg.klok_digitaal',
        'nl.basvanderploeg.temperatuur'
    );
    
}

?>