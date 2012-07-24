<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['wind']) && $config['nl.basvanderploeg']['wind']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?
    if (isset($config['nl.basvanderploeg']['wind']['data']) && is_array($config['nl.basvanderploeg']['wind']['data'])) {
        foreach ($config['nl.basvanderploeg']['wind']['data'] as $data) {
            if ($data['enabled']) {
                $api_data = Helper::makeCachedAPIRequest('http://weather.yahooapis.com/forecastrss?u=c&w=' . $data['plaatscode'], TIME_FIVE_MINUTE * 3);
                $xml = simplexml_load_string($api_data);

                $wind = $xml->xpath('//yweather:wind');
                $attributes = $wind[0]->attributes();
                $windkracht = (string) $attributes['speed'];
                $windrichting = (string) $attributes['direction'];
                $gevoelstemp = (string) $attributes['chill'];
                ?>
                <li data-refresh="false" data-id="nl.basvanderploeg.wind" data-timeout="<?php echo TIME_MS_FIVE_MINUTE * 3; ?>">
                    <div class="box" id="knop-wind">
                        <div class="wind-text"><?php echo $windkracht; ?></div>
                        <div class="wind-sub" style="-webkit-transform: rotate(<?php echo $windrichting; ?>deg); -moz-transform: rotate(<?php echo $windrichting; ?>deg); -o-transform: rotate(<?php echo $windrichting; ?>deg);"></div>
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
        #knop-wind{
            background-image: url('widgets/nl.basvanderploeg/wind/img/bg@2x.png');
            background-repeat:no-repeat;
            background-size:218px 122px;
        } 
        .wind-text {
            top:49px; 
            left:0px;
            right:0px;
            position:absolute;
            color:  black;
            font-size: 19px;
            font-weight:bold;
            text-align:center;
            text-shadow: none; 
        } 
        .wind-sub {
            background-image:url('widgets/nl.basvanderploeg/wind/img/arrow.png');
            background-size:6px 30px;
            background-color: none;
            width: 6px;
            height: 30px;
            top:47px; 
            left:47px;
            right:0px;     
            position:absolute;
            color: black;
            font-size: 15px;
            font-weight: bold;
            text-align:center;
            text-shadow:none;
        } 
        .wind-gevoel {
            top:53px; 
            left:165px;
            right:16px;
            position:absolute;
            color:  black;
            font-size: 14px;
            font-weight:bold;
            text-align:center;
            text-shadow: none; 
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>