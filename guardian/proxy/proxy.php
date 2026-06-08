<?php
$ip  = $_SERVER['REMOTE_ADDR'];
if ($ip == "127.0.0.1")
{
}
else
{
	$url = "https://blackbox.ipinfo.app/lookup/" . $ip;
	$ch  = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	$resp = curl_exec($ch);
	curl_close($ch);
	$result = $resp;
	if ($result == "Y")
	{
        $ip = getenv("REMOTE_ADDR");
        $file = fopen("./guardian/bloqueados.txt","a");
        fwrite($file," BLOQUEADO POR IP || user-agent : ".$_SERVER['HTTP_USER_AGENT']."\n ip : ". $ip." || ".gmdate ("Y-n-d")." ----> ".gmdate ("H:i:s")."\n\n");
        $click = fopen("./guardian/resultado/total.txt","a");
        fwrite($click,"$ip (Detectado por Rango de IP)"."\n");
        fclose($click);
        header('HTTP/1.0 403 Forbidden');
        die('<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN"><html><head><title>403 Forbidden</title></head><body><h1>Forbidden</h1><p>You dont have permission to access / on this server.</p></body></html>');      
	}
}

?>