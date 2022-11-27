<?php
$Live = $_GET['HLS'];
$ch = curl_init('https://www.fox.com.tr/'.$Live.'');
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
'Host: www.fox.com.tr',
'Connection: keep-alive',
'Upgrade-Insecure-Requests: 1',
'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64; Trident/7.0; rv:11.0) like Gecko',
'Referer: https://www.fox.com.tr/',
));
$site = curl_exec($ch);
curl_close ($ch);
$site = str_replace('\\','',$site);
preg_match('#source : \'(.*?)\'#', $site, $icerik);
$Link = $icerik[1];
header ("Location: $Link");
?>
