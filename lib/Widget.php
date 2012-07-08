<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Dashboard widget
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
class Widget {
    
    private $name, $developer, $images;
    
    public function __construct($name, $developer) {
        $this->name = $name;
        $this->developer = $developer;
        $this->images = array();
        
        // Initiate images
        $s = new Search($this->getResourcePath());
        $this->addImagePaths($s->findImages());
    }
    
    public function addImagePaths($image) { if (is_array($image)) { $this->images = array_merge($this->images, $image); } else { $this->images[] = $image; } }
    public function hasImages() { if (count($this->images) > 0) return true; else return false; }
    public function getImagePaths() { return $this->images; }
    
    public function getName() { return $this->name; }
    public function getDeveloper() { return $this->developer; }
    public function getFullName() { return $this->getDeveloper() . '.' . $this->getName(); }
    public function getID() { return str_replace('.', '-', $this->getFullName()); }
    
    public function getWidgetPath() { return Config::$widgets_dir . DS . $this->developer . DS . $this->name; }
    public function getResourcePath() { return Config::$resource_dir . DS . $this->developer . DS . $this->name; }
    public function getActionPath() { return Config::$widgets_dir . DS . $this->developer . DS . $this->name . DS . Config::$action_dir; }
    
    public function getWidgetFile() { return $this->getWidgetPath() . DS . Config::$widget_file; }
    public function getWidgetConfig() { return $this->getWidgetPath() . DS . Config::$widget_config; }
    public function getActionFile($action) { return $this->getActionPath() . DS . $action . Config::$action_ext; }
    
    public function getPlaceholder() {
        return '<li id="' . $this->getID() . '"><div class="box"></div><label>Laden...</label></li>';
    }
    
    public function exists() { return (file_exists($this->getWidgetFile()) && file_exists($this->getWidgetConfig())); }
    
    public function isValidAction($action) { return (file_exists($this->getActionFile($action))); }
    
}

?>