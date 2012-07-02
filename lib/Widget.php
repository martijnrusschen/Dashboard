<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Dashboard widget
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
class Widget {
    
    private $name, $developer, $config, $images;
    
    public function __construct($name, $developer) {
        $this->name = $name;
        $this->developer = $developer;
        $this->images = array();
        $this->config = new Configuration();
        
        // Initiate images
        $s = new Search($this->getResourcePath());
        $this->addImagePaths($s->findImages());
    }
    
    public function addImagePaths($image) { if (is_array($image)) { $this->images = array_merge($this->images, $image); } else { $this->images[] = $image; } }
    public function hasImages() { if (count($this->images) > 0) return true; else return false; }
    public function getImagePaths() { return $this->images; }
    
    public function getName() { return $this->name; }
    public function getDeveloper() { return $this->developer; }
    
    public function getWidgetPath() { return $this->config->widgets_dir . DS . $this->developer . DS . $this->name; }
    public function getResourcePath() { return $this->config->resource_dir . DS . $this->developer . DS . $this->name; }
    public function getActionPath() { return $this->config->widgets_dir . DS . $this->developer . DS . $this->name . DS . $this->config->action_dir; }
    
    public function getWidgetFile() { return $this->getWidgetPath() . DS . $this->config->widget_file; }
    public function getWidgetConfig() { return $this->getWidgetPath() . DS . $this->config->widget_config; }
    public function getActionFile($action) { return $this->getActionPath() . DS . $action . $this->config->action_ext; }
    
    public function exists() { return (file_exists($this->getWidgetFile()) && file_exists($this->getWidgetConfig())); }
    
    public function isValidAction($action) { return (file_exists($this->getActionFile($action))); }
    
}

?>