<?php

define('TIME_HALF_MINUTE', 30);
define('TIME_MINUTE', TIME_HALF_MINUTE * 2);
define('TIME_FIVE_MINUTE', TIME_MINUTE * 5);
define('TIME_HALF_HOUR', TIME_FIVE_MINUTE * 6);

/**
 * Simple file-based cache
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
class Cache {
    
    private $key, $error;
    
    public function __construct($key) {
        if (!$key) {
            $this->error[] = "Invalid key";
        } else {
            $this->key = $this->_filename($key);
        }
        
        $this->error = array();
    }
    
    public function set($data = false, $ttl = 300) {
        if (!$this->key) {
            $this->error[] = "Invalid key";
            return false;
        }else if (!$data) {
            $this->error[] = "Invalid data";
            return false;
        }
        
        $store = array(
            'data' => $data,
            'ttl' => time() + $ttl,
        );
        $status = false;
        
        try {
            $fh = fopen($this->key, "w+");
            if (flock($fh, LOCK_EX)) {
                ftruncate($fh, 0);
                fwrite($fh, json_encode($store));
                flock($fh, LOCK_UN);
                $status = true;
            }
            fclose($fh);
        } catch (Exception $e) {
            $this->error[] = "Exception caught: " . $e->getMessage();
            return false;
        }
        return $status;
    }
    
    public function setURL($url = false, $ttl = 300, $options = null) {
        if (!$this->key) {
            $this->error[] = "Invalid key";
            return false;
        } else if (!$url) {
            $this->error[] = "Invalid URL";
            return false;
        }
        
        $this->set(Helper::getDataFromURL($url, $options), $ttl);
    }
    
    public function get() {
        $file_content = null;
        
        if (!file_exists($this->key)) { return false; }

        try {
            $fh = fopen($this->key, "r");
            if (flock($fh, LOCK_SH)) {
                $file_content = fread($fh, filesize($this->key));
            }
            fclose($fh);
        } catch (Exception $e) {
            $this->error[] = "Exception caught: " . $e->getMessage();
            return false;
        }

        if ($file_content) {
            $store = json_decode($file_content, true);
            if ($store['ttl'] < time()) {
                unlink($this->key); // remove the file
                $this->error[] = "Data expired";
                return false;
            }
        }
        return $store['data'];
    }
    
    public function hasError() { return (count($this->error) > 0); }
    public function getError() { 
        return ($this->hasError()) ? $this->error[count($this->error) - 1] : null; 
    }
    
    private function _filename($key) {
        return Config::$cache_dir . DS . md5($key) . Config::$cache_ext;
    }
    
}

?>