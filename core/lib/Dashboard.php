<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Dashboard brein
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
class Dashboard {
    
    private $widgets;
    
    /**
     * Constructor 
     */
    public function __construct() {
        session_start();
        
        $this->widgets = array();
    }
    
    /**
     * Init het Dashboard laad alle widgets 
     */
    public function init() {
        $s = new Search(Config::$widgets_dir);
        $this->widgets = array_merge($this->widgets, $s->findWidgets());

        if (Config::$do_sort) {
            ksort($this->widgets);
            $this->widgets = $this->_sortArrayByArray($this->widgets, Config::$sort); 
        }
    }
    
    /**
     * Authenticatie challenge
     */
    public function auth() {
        if (Config::$auth) {
            if ($_SESSION['loggedin'] == 0) {
                header('Location: ' . Config::$auth_login);
                die();
            }
        }
    }
    
    /**
     * Login a user
     * @param string $username
     * @param string $password 
     */
    public function login($username, $password) {
        if (isset(Config::$auth_users[$username])) {
            if (Config::$auth_users[$username] == $password) {
                unset($_SESSION['login_error']);
                $_SESSION['loggedin'] = 1;
                
                header('Location: ' . Config::$homepage);
                die();
            } else {
                $_SESSION['login_error'] = Config::$auth_wrong_password;
            }
        } else {
            $_SESSION['login_error'] = Config::$auth_wrong_username;
        }
        $_SESSION['loggedin'] = 0;
    }
    
    /**
     * Outputs all the widgets 
     */
    public function go() {
        if (count($this->widgets) <= 0) {
            die('Ooops - Geen widgets gevonden');
        } else {
            $this->_loadWidgets();
        }
    }
    
    /**
     * Catch een request voor een specifieke widget 
     */
    public function catchRequest() {
        if (Config::$catch) {
            $catched = false;
            
            if (isset($_GET['id'])) {
                $id = str_replace('/', '.', $_GET['id']);
                $f = (isset($_GET['f'])) ? true : false;

                
                $tmp = explode('.', $id);
                $name = $tmp[count($tmp) - 1];
                unset($tmp[count($tmp) - 1]);
                $developer = implode('.', $tmp);
                
                $widget = new Widget($name, $developer);
                
                if ($widget->exists()) {
                    if (!isset($_GET['a'])) {
                        $output = $this->_getOutput($widget->getWidgetFile());
                        echo ($f) ? $output : $this->_parseWidget($output); 
                    } else if (isset($_GET['a']) && $widget->isValidAction($_GET['a'])) {
                        $this->_outputJSON(array('success' => 'Execution successful', 'output' => $this->_getOutput($widget->getActionFile($_GET['a']))));
                    } else {
                        $this->_outputJSON(array('error' => 'Invalid Request!', 'code' => 'A-404'));
                    }
                } else {
                    $this->_outputJSON(array('error' => 'Invalid Request!', 'code' => 'W-404'));
                }
                
                $catched = true;
            } else if (isset($_GET['preload'])) {
                $this->_preloadImages();
                $catched = true;
            } else if (isset($_GET['cache'])) {
                switch ($_GET['cache']) {
                    case 'destroy':
                        $this->_outputJSON(array('success' => 'Cache is cleaned! ' . $this->_cleanCache() . ' cache files have been deleted.'));
                        break;
                    case 'clean':
                        $this->_cleanCache();
                        break;
                    default:
                        $this->_outputJSON(array('error' => 'Invalid Request!', 'code' => 'C-404'));
                        break;
                }
            } else {
                if (Config::$clean_cache_onload) {
                    if (!isset($_GET['cache']) && $_GET['cache'] != 'clean') {
                        $this->_redirect('index.php?cache=clean');
                    }
                }
            }
            
            if ($catched) die();
        }
    }
    
    private function _preloadImages() {
        $output = array();

        if (Config::$preload) {
            $this->init();
            
            foreach ($this->widgets as $widget) {
                $output = array_merge($output, $widget->getImagePaths());
            }
            
            $s = new Search(Config::$widgets_dir);
            $output = array_merge($output, $s->findImages());
        }
        
        $this->_outputJSON($output);
    }
    
    private function _loadWidgets() {
        if (Config::$ajax_load) {
            if (Config::$ajax_placeholder) {
                foreach ($this->widgets as $name => $widget) {
                    echo $widget->getPlaceholder();
                }
                
                echo '<script>'; 
                echo (Config::$wait_for_dom) ? '$(document).ready(function() { ' : '';
                
                foreach ($this->widgets as $name => $widget) {
                    echo 'spinme(\'' . $widget->getFullName() . '\');';
                    echo 'loadMe(\'' . $widget->getFullName() . '\');';
                }
                
                echo (Config::$wait_for_dom) ? ' });' : '';
                echo '</script>';
            } else {
                echo '<script>'; 
                echo (Config::$wait_for_dom) ? '$(document).ready(function() { ' : '';
            
                foreach ($this->widgets as $name => $widget) {
                    echo '$.get(\'index.php?id=' . $name . '&f\', function(data) { $(\'#widgets\').append(data); });';
                }
                
                echo (Config::$wait_for_dom) ? ' });' : '';
                echo '</script>';
            }
        } else {
            foreach ($this->widgets as $name => $widget) {
                include $widget->getWidgetFile();
            }
        }
    }
    private function _parseWidget($content) {
        libxml_use_internal_errors(true);
        $output = '';
        
        $doc = new DOMDocument();
        $doc->loadHTML($content . ' ');
        $elements = $doc->getElementsByTagName('li');
        
        foreach($elements as $element) {
            $output .= $doc->saveHTML($element);
        }
        
        return $output;
    }
    
    private function _cleanCache() {
        $search = new Search(Config::$cache_dir);
        $search = $search->findCache();

        foreach ($search as $cache_file) {
            if (file_exists($cache_file)) {
                unlink($cache_file);
            }
        }
        
        return count($search);
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
    private function _outputJSON($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        die();
    }
    private function _redirect($url) {
        header('Location: ' . $url);
        die();
    }
    private function _getOutput($path) {
        ob_start();
        include $path;
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    
}

?>