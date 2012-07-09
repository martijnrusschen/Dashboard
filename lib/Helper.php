<?php

class Helper {
    
    /**
     * Return the data from a URL.
     * 
     * @param String $url The URL to call.
     * @param Array $options CURL options
     * @return Mixed Returns the requested data or null if none.
     */
    public static function getDataFromURL($url, $options = null) {
        $data = null;
        
        if (function_exists('curl_init')) {
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            
            if (isset($options['conn_timeout']) && is_numeric($options['conn_timeout'])) {
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $options['conn_timeout']);
            } else {
                curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 1);
            }
            if (isset($options['request_type'])) {
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $options['request_type']);
            } else {
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            }
            if (isset($options['user'], $options['pass'])) {
                curl_setopt($curl, CURLOPT_USERPWD, $options['user'] . ':' . $options['pass']);
            }
            if (isset($options['cust_header'])) {
                if (is_array($options['cust_header'])) {
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $options['cust_header']);
                } else {
                    $cust_header = array($options['cust_header']);
                    curl_setopt($curl, CURLOPT_HTTPHEADER, $cust_header);
                }
            }
            if (isset($options['ssl_verifypeer']) && is_numeric($options['ssl_verifypeer'])) {
                curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, $options['ssl_verifypeer']);
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
    public static function makeCachedAPIRequest($url, $ttl = 300, $options = null) {
        $c = new Cache($url);
        
        $cache = $c->get();
        if (!$cache) {
            $c->setURL($url, $ttl, $options);
        }
        
        return $c->get();
    }
    
}

?>