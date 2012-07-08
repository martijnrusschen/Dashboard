<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['wind']) && $config['nl.basvanderploeg']['wind']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?
    if (isset($config['nl.basvanderploeg']['wind']['data']) && is_array($config['nl.basvanderploeg']['wind']['data'])) {
        foreach ($config['nl.basvanderploeg']['wind']['data'] as $data) {
            if ($data['enabled']) {
                $api_data = Helper::makeCachedAPIRequest('http://weather.yahooapis.com/forecastrss?u=c&w=' . $data['plaatscode']);
                $xml = simplexml_load_string($api_data);

                $wind = $xml->xpath('//yweather:wind');
                $attributes = $wind[0]->attributes();
                $windkracht = (string) $attributes['speed'];
                $windrichting = (string) $attributes['direction'];
                $gevoelstemp = (string) $attributes['chill'];
                ?>
                <li>
                    <div class="box" id="knop-wind">
                        <div class="wind-text"><?php echo $windkracht; ?></div>
                        <div class="wind-sub"></div>
                        <div class="wind-gevoel"><?php echo $gevoelstemp; ?>&deg;</div>
                    </div>
                    <label><?php echo $data['label'] ?></label>
                </li>
                <?php
            }
        }
    }
    ?>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css">
        .wind-sub{
            -webkit-transform: rotate(<?php echo $windrichting; ?>deg);
            -moz-transform: rotate(<?php echo $windrichting; ?>deg);
            -o-transform: rotate(<?php echo $windrichting; ?>deg);
        }     
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>