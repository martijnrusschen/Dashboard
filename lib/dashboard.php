<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Dashboard brein
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */

class Dashboard {
    
    private $ignore_dirs = array('.svn', '.', '..');
    private $configuration;
    private $widgets;
    
    public function __construct() {
        $this->configuration = new Configuration();
        $this->widgets = array();
        
        $base = $this->configuration->widgets_dir;
        $this->_checkDir($base);
        
        if ($this->configuration->do_sort) $this->widgets = $this->_sortArrayByArray($this->widgets, $this->configuration->sort);
    }
    
    public function go() {
        if (count($this->widgets) <= 0) {
            die('Ooops - Geen widgets gevonden');
        } else {
            foreach ($this->widgets as $widget => $path) {
                include $path;
            }
        }
    }
    
    private function _checkDir($path) {
        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                $cur_dir = $path;
                
                if (!in_array($entry, $this->ignore_dirs)) {
                    $cur_dir .= DS . $entry;
                    
                    if (is_dir($cur_dir)) {
                        $this->_checkDir($cur_dir);
                    } else {
                        if (is_file($cur_dir)) {
                            $temp = explode(DS, $cur_dir);
                            
                            if ($temp[count($temp) - 1] == 'widget.php') {
                                $name = explode(DS, $cur_dir);
                                $name = $name[count($name) - 3] . '.' . $name[count($name) - 2];
                                $this->widgets[$name] = $cur_dir;
                            }
                        }
                    }
                }
            }
        }
    }
    
    private function _sortArrayByArray($array, $orderby) {
        $ordered = array();
        
        foreach ($orderby as $order) {
            if (array_key_exists($order, $array)) {
                $ordered[$order] = $array[$order];
                unset($array[$order]);
            }
        }
        
        return $ordered + $array;
    }

}

?>