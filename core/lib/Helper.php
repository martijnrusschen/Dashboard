<?php

class Helper {
    
    /**
     * Return the data from a URL.
     * 
     * @param String $url The URL to call.
     * @param Array $options CURL options
     * @return Mixed Returns the requested data or null if none.
     */
    public static function getDataFromURL($url, array $options = null) {
        $data = null;
        
        if (function_exists('curl_init')) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            
            if (is_array($options)) {
                foreach ($options as $option => $value) {
                    curl_setopt($curl, $option, $value);
                }
            }
            
            $data = curl_exec($curl);
            curl_close($curl);
        } else {
            $data = @file_get_contents($url);
        }
        
        return $data;
    }
    
    /**
     * Make a automatic cached request.
     * 
     * @param String $url The URL to call.
     * @param Integer $ttl The time to live in seconds.
     * @param Array $options CURL options
     * @return mixed The retrieved data. 
     */
    public static function makeCachedAPIRequest($url, $ttl = 300, array $options = null) {
        $c = new Cache($url);
        
        $cache = $c->get();
        if (!$cache) {
            $c->setURL($url, $ttl, $options);
        }
        
        return $c->get();
    }
    
}

?>