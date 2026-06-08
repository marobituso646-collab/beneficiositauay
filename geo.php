<?php
function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } elseif (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        return $_SERVER['HTTP_CF_CONNECTING_IP'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function getGeoData($ip, $apiKey) {
    $url = "https://api.ipregistry.co/{$ip}?key={$apiKey}";
    $response = file_get_contents($url);
    if ($response === FALSE) {
        exit("No se pudo obtener datos de geolocalización.");
    }
    return json_decode($response, true);
}

function isAllowedCountry($geoData, $allowedCountries) {
    return in_array($geoData['location']['country']['code'], $allowedCountries);
}

function isVpnOrProxyOrAbusive($geoData) {
    return $geoData['security']['is_vpn'] || $geoData['security']['is_proxy'] || $geoData['security']['is_abuser'];
}

// Función para registrar información en archivos de texto
function logToFile($filename, $ip, $geoData) {
    $logEntry = "IP: {$ip}\n";
    $logEntry .= "Host: " . ($geoData['connection']['organization'] ?? 'Desconocido') . "\n";
    $logEntry .= "País: " . ($geoData['location']['country']['name'] ?? 'Desconocido') . "\n";
    $logEntry .= "Ciudad: " . ($geoData['location']['city'] ?? 'Desconocido') . "\n";
    $logEntry .= "Provincia: " . ($geoData['location']['region']['name'] ?? 'Desconocido') . "\n";
    $logEntry .= "ISP: " . ($geoData['company']['name'] ?? 'Desconocido') . "\n";
    $logEntry .= "-------------------------------------\n";
    file_put_contents($filename, $logEntry, FILE_APPEND);
}

$apiKey = 'ira_eg962tvWi7tkKHGI3qGXhfLiTiqWMz3s0GBz'; // Tu clave API de Ipregistry
$allowedCountries = ['UY', 'AR']; // Lista de códigos de pas permitidos
$allowAllCountries = false; // Cambiar a false para aplicar restricciones de país
$detectVpnOrProxyOrAbusive = true; // Cambiar a false para deshabilitar la detección de VPN/proxy/abuso

$ip = getUserIP();
$geoData = getGeoData($ip, $apiKey);

if (!$allowAllCountries && !isAllowedCountry($geoData, $allowedCountries)) {
    logToFile('blocked_ips.txt', $ip, $geoData);
    header('HTTP/1.1 403 Forbidden');
    exit("Servicio no disponible.");
}

if ($detectVpnOrProxyOrAbusive && isVpnOrProxyOrAbusive($geoData)) {
    logToFile('vpn_ips.txt', $ip, $geoData);
    header('HTTP/1.1 403 Forbidden');
    exit("Acceso bloqueado: uso de VPN o IP abusiva detectado.");
}

// Guardar datos geográficos para el uso en alerta.php
session_start();
$_SESSION['geoData'] = $geoData;
$_SESSION['user_ip'] = $ip;
?>