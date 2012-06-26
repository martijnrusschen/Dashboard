<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['luchtvochtigheid']) && $config['nl.basvanderploeg']['luchtvochtigheid']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['luchtvochtigheid']['data']) && is_array($config['nl.basvanderploeg']['luchtvochtigheid']['data'])) {
        foreach ($config['nl.basvanderploeg']['luchtvochtigheid']['data'] as $data) {
            if ($data['enabled']) {
                $url = 'http://weather.yahooapis.com/forecastrss?u=c&w=' . $data['plaatscode'];
                $xml = simplexml_load_file($url);

                $atmosfeer = $xml->xpath('//yweather:atmosphere');
                $attributes = $atmosfeer[0]->attributes();
                $vochtigheid = (string) $attributes['humidity'];
                ?>
                <li>
                    <div class="box" id="knop-meter">

                        <div id="progressContainer">
                            <?php
                            $url = 'http://weather.yahooapis.com/forecastrss?u=c&w=' . $data['plaatscode'];
                            $xml = simplexml_load_file($url);
                            ?>
                            <progress id="rot" class="example_r" min="0" max="100" value="<?php echo $vochtigheid; ?>"></progress>
                            <div data-arrow-for="rot" class="arrow"><img src="res/nl.basvanderploeg/core/img/hand.png" alt="Meter" height="88" width="16"/></div>
                        </div>

                        <div class="meter-sub"><?php echo $vochtigheid; ?></div> 

                    </div>
                    <label><?php echo $data['label']; ?></label>
                </li>
                <?php
            }
        }
    }
    ?>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>