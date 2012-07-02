<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Dashboard search engine
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
class Search {

    private $path, $config;
    
    public function __construct($path) {
        $this->path = $path;
        $this->config = new Configuration();
    }
    
    public function findImages($path = null) {
        $data = array();
        if ($path == null)
            $path = $this->path;

        if (is_dir($this->path)) {
            if ($handle = opendir($path)) {
                while (false !== ($entry = readdir($handle))) {
                    $cur_dir = $path;

                    if (!in_array($entry, $this->config->ignore_dirs)) {
                        $cur_dir .= DS . $entry;

                        if (is_dir($cur_dir)) {
                            $data = array_merge($data, $this->findImages($cur_dir));
                        } else if (is_file($cur_dir) && preg_match($this->config->img_regex, $cur_dir)) {
                            $data[] = str_replace(DS, '/', $cur_dir);
                        }
                    }
                }
            }
        }

        return $data;
    }
    
    public function findWidgets($path = null) {
        $data = array();
        if ($path == null)
            $path = $this->path;

        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                $cur_dir = $path;

                if (!in_array($entry, $this->config->ignore_dirs)) {
                    $cur_dir .= DS . $entry;

                    if (is_dir($cur_dir)) {
                        $data = array_merge($data, $this->findWidgets($cur_dir));
                    } else if (is_file($cur_dir)) {
                        $temp = explode(DS, $cur_dir);

                        if ($temp[count($temp) - 1] == $this->config->widget_file) {
                            $name =         $temp[count($temp) - 2];
                            $developer =    $temp[count($temp) - 3];
                            
                            $data[$developer . '.' . $name] = new Widget($name, $developer);
                        }
                    }
                }
            }
        }
        
        return $data;
    }
    
    public function findConfigs($path = null) {
        $data = array();
        if ($path == null)
            $path = $this->path;

        if ($handle = opendir($path)) {
            while (false !== ($entry = readdir($handle))) {
                $cur_dir = $path;

                if (!in_array($entry, $this->config->ignore_dirs)) {
                    $cur_dir .= DS . $entry;

                    if (is_dir($cur_dir)) {
                        $data = array_merge($data, $this->findConfigs($cur_dir));
                    } else if (is_file($cur_dir)) {
                        $temp = explode(DS, $cur_dir);

                        if ($temp[count($temp) - 1] == $this->config->widget_config) {
                            $this->data[] = $cur_dir;
                        }
                    }
                }
            }
        }
        
        return $data;
    }
    
}

?>