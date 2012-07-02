<?php if (defined('BAS')) require dirname(__FILE__) . DS . '..' . DS . 'config.php'; else die(); ?>
<?
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'http://' . $config['nl.imick']['sabnzbd']['ip-adres'] . ':' . $config['nl.imick']['sabnzbd']['poort'] . '/sabnzbd/api?mode=pause&apikey=' . $config['nl.imick']['sabnzbd']['api-key']);

curl_exec($ch);
curl_close($ch);

?>