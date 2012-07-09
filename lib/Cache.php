<?php

define('TIME_SECOND', 1);
define('TIME_HALF_MINUTE', 30);
define('TIME_MINUTE', 60);
define('TIME_FIVE_MINUTE', 300);
define('TIME_HALF_HOUR', 1800);
define('TIME_HOUR', 3600);
define('TIME_DAY', 86400);
define('TIME_WEEK', 604800);
define('TIME_MONTH', 2592000);
define('TIME_YEAR', 31536000);

/**
 * Simple file-based cache
 * 
 * @author Alex Bouma
 * @see http://www.alexbouma.me
 */
class Cache {
    
    private $key, $error;
    
    /**
     * Constructor
     * Heeft een $key nodig om de data op te vragen en op te slaan.
     * 
     * @param string $key Naam van de cache 
     */
    public function __construct($key) {
        if (!$key) {
            $this->error[] = "Invalid key";
        } else {
            $this->key = $this->_filename($key);
        }
        
        $this->error = array();
    }
    
    /**
     * Sla data op in de cache
     * bestaande data word overschreven.
     * 
     * @param mixed $data De data (Kan alles zijn!)
     * @param integer $ttl De Time to Live in seconden (Als niet ingegeven = 300 seconden = 5 minuten)
     * @return boolean True als data is opgeslagen, false als er een fout is opgetreden
     */
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
    
    /**
     * Sla data op in de cache die word opgehaald van een URL
     * bestaande data word overschreven.
     * 
     * @param string $url De URL waar de data van gedownload moet worden
     * @param integer $ttl De Time to Live in seconden (Als niet ingegeven = 300 seconden = 5 minuten)
     * @param array $options Options voor CURL (Niet verplicht)
     * @return boolean 
     */
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
    
    /**
     * Haal de data op uit de cache.
     * 
     * @return mixed False als er geen data beschikbaar is of de data is verlopen
     */
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