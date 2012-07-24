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
    
    /**
     * Get either a Gravatar URL or complete image tag for a specified email address.
     *
     * @param string $email The email address
     * @param string $s Size in pixels, defaults to 80px [ 1 - 512 ]
     * @param string $d Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
     * @param string $r Maximum rating (inclusive) [ g | pg | r | x ]
     * @param boole $img True to return a complete IMG tag False for just the URL
     * @param array $atts Optional, additional key/value attributes to include in the IMG tag
     * @return String containing either just a URL or a complete image tag
     */
    public static function getGravatar($email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array()) {
        $url = 'http://www.gravatar.com/avatar/';
        $url .= md5(strtolower(trim($email)));
        $url .= "?s=$s&d=$d&r=$r";
        if ($img) {
            $url = '<img src="' . $url . '"';
            foreach ($atts as $key => $val)
                $url .= ' ' . $key . '="' . $val . '"';
            $url .= ' />';
        }
        return $url;
    }
    
}

?>