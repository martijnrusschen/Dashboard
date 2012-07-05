<?php if (!defined('BAS')) die(); ?>
<?php

/**
 * Dashboard brein
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
class Dashboard {
    
    private $config, $widgets;
    
    /**
     * Constructor 
     */
    public function __construct() {
        session_start();
        
        $this->config = new Configuration();
        $this->widgets = array();
    }
    
    /**
     * Init het Dashboard laad alle widgets 
     */
    public function init() {
        $s = new Search($this->config->widgets_dir);
        $this->widgets = array_merge($this->widgets, $s->findWidgets());
        
        if ($this->config->do_sort) {
            ksort($this->widgets);
            $this->widgets = $this->_sortArrayByArray($this->widgets, $this->config->sort); 
        }
    }
    
    /**
     * Authenticatie challenge
     */
    public function auth() {
        if ($this->config->auth) {
            if ($_SESSION['loggedin'] == 0) {
                header('Location: ' . $this->config->auth_login);
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
        if (isset($this->config->auth_users[$username])) {
            if ($this->config->auth_users[$username] == $password) {
                unset($_SESSION['login_error']);
                $_SESSION['loggedin'] = 1;
                
                header('Location: ' . $this->config->homepage);
                die();
            } else {
                $_SESSION['login_error'] = $this->config->auth_wrong_password;
            }
        } else {
            $_SESSION['login_error'] = $this->config->auth_wrong_username;
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
        if ($this->config->catch) {
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
            }
            
            if ($catched) die();
        }
    }
    
    private function _preloadImages() {
        $output = array();

        if ($this->config->preload) {
            $this->init();
            
            foreach ($this->widgets as $widget) {
                $output = array_merge($output, $widget->getImagePaths());
            }
            
            $s = new Search($this->config->resource_dir . DS . $this->config->core_img_search);
            $output = array_merge($output, $s->findImages());
        }
        
        $this->_outputJSON($output);
    }
    
    private function _loadWidgets() {
        if ($this->config->ajax_load) {
            if ($this->config->ajax_placeholder) {
                foreach ($this->widgets as $name => $widget) {
                    echo $widget->getPlaceholder();
                }
                
                echo '<script>'; 
                echo ($this->config->wait_for_dom) ? '$(document).ready(function() { ' : '';
                
                foreach ($this->widgets as $name => $widget) {
                    echo 'spinme(\'' . $widget->getID() . '\');';
                    echo 'loadMe(\'' . $widget->getFullName() . '\');';
                }
                
                echo ($this->config->wait_for_dom) ? ' });' : '';
                echo '</script>';
            } else {
                echo '<script>'; 
                echo ($this->config->wait_for_dom) ? '$(document).ready(function() { ' : '';
            
                foreach ($this->widgets as $name => $widget) {
                    echo '$.get(\'index.php?id=' . $name . '&f\', function(data) { $(\'#widgets\').append(data); });';
                }
                
                echo ($this->config->wait_for_dom) ? ' });' : '';
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
    private function _getOutput($path) {
        ob_start();
        include $path;
        $output = ob_get_contents();
        ob_end_clean();
        return $output;
    }
    
}

?>