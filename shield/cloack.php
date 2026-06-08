<?php

    function geolocationIp($ip) {
        $data = file_get_contents("http://ip-api.com/json/".$ip."?fields=status,message,country,countryCode,region,regionName,city,zip,lat,lon,timezone,isp,org,as,asname,mobile,proxy,hosting,query");
        $obj = json_decode($data, true);
    return $obj;
    }

    function comprobateCountry($countries_allowed, $visitor_country) {
        foreach ($countries_allowed as $country) {
            if( strpos($country, $visitor_country) !== false) return true;
        }
        return false;
    }

    function getIP(){
        if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
            $ip = $_SERVER["HTTP_CF_CONNECTING_IP"];
       }
       elseif(isset($_SERVER["HTTP_CLIENT_IP"])) {
           $ip = $_SERVER["HTTP_CLIENT_IP"];
       }
       elseif(isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
           $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
       }
       elseif(isset($_SERVER["HTTP_X_FORWARDED"])) {
           $ip = $_SERVER["HTTP_X_FORWARDED"];
       }
       elseif(isset($_SERVER["HTTP_FORWARDED_FOR"])) {
           $ip = $_SERVER["HTTP_FORWARDED_FOR"];
       }
       elseif(isset($_SERVER["HTTP_FORWARDED"])) {
           $ip = $_SERVER["HTTP_FORWARDED"];
       }
       else {
           $ip = (isset($_SERVER['REMOTE_ADDR'])) ? $_SERVER['REMOTE_ADDR'] : false;
       }
       if ($ip === '::1') {
           $ip = '127.0.0.1';
       }
       return $ip;
    }
?>