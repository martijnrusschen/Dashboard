<?php

/**
 * sabnzbd
 * 
 * Om deze widget te gebruiken moet sabnzbd geïnstalleerd zijn en de poort openstaan in de router / firewall.
 * ip-adres: Je EXTERN ip adres, kijk bijv. op http://watismijnip.nl/
 * poort: de poort die ingesteld staat in sabnzbd en je router, meestal 9090!
 * api-key: de API key uit SABnzbd.
 *
 * @author Mick Vleeshouwer & Alex Bouma
 */
 
$config['nl.imick']['sabnzbd'] = array(
    'enabled' => true,
    'label' => 'SABnzbd',
    'api-key' => 'API-KEY',
    'ip-adres' => 'IP-ADRES',
    'poort' => '9090'

);

?>