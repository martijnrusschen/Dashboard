<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['luchtvochtigheid']) && $config['nl.basvanderploeg']['luchtvochtigheid']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['luchtvochtigheid']['data']) && is_array($config['nl.basvanderploeg']['luchtvochtigheid']['data'])) {
        foreach ($config['nl.basvanderploeg']['luchtvochtigheid']['data'] as $data) {
            if ($data['enabled']) {
                $api_data = Helper::makeCachedAPIRequest('http://weather.yahooapis.com/forecastrss?u=c&w=' . $data['plaatscode']);
                $xml = simplexml_load_string($api_data);

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
                            <div data-arrow-for="rot" class="arrow"><img src="widgets/nl.basvanderploeg/luchtvochtigheid/img/hand.png" alt="Meter" height="88" width="16" style="vertical-align: 0;"/></div>
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
    <style>
        #knop-meter {
            background-image: url('widgets/nl.basvanderploeg/luchtvochtigheid/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        } 
        .meter-sub {
            margin-top: -78px;
            margin-left: 0px;
            margin-right: 0px;
            color: grey;
            font-size: 13px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px -1px 0px black; 
            opacity:0.4;
            filter:alpha(opacity=40); /* For IE8 and earlier */
        } 
        
        progress strong {
            display: none;	
        }
        progress.example_r + .arrow {
            position: absolute;
            font-size: 100px;
            margin-top: -132px;
            margin-left: 101px;
            background-color:none;

            /* Dimensions */
            width: 16px;
            height: 116px;
            text-align: center;
            -webkit-transform-origin: 50% 100%;
            -moz-transform-origin: 50% 100%;
            -ms-transform-origin: 50% 100%;
            -o-transform-origin: 50% 100%;

            transition: transform 500ms;	
        }
        progress.example_r + .arrow.noTransition {
            -moz-transition: none;
            -webkit-transition: none;
            -o-transition: none;
            -ms-transition: none;
            -o-transition: none;
            transition: none;
        } 

        /*
        * Example R: Possible Rotation
        */
        /* All HTML5 progress enabled browsers */
        progress.example_r {
            /* gets rid of default border in Firefox and Opera. */ 
            border: solid 0px black;
            display: inline-block;
            border-radius: 218px 218px 0 0;
            background-color: transparent;

            /* Dimensions */
            width: 218px;
            height: 116px;
            padding: 0;
        }

        /* Polyfill */
        progress.example_r[role]:after {
            background-image: none; /* removes default background from polyfill */
        }
        progress.example_r { }

        /* Rotation Parts */
        progress.example_r[value="0"] + .arrow {
            -moz-transform: rotate(270deg);
            -webkit-transform: rotate(270deg);-o-transform: rotate(270deg);-ms-transform: rotate(270deg);
        }	
        progress.example_r[value^="1"]:not([value="1"]):not([value="100"]) + .arrow {
            -moz-transform: rotate(288deg);
            -webkit-transform: rotate(288deg);-o-transform: rotate(288deg);-ms-transform: rotate(288deg);
        }
        progress.example_r[value^="2"]:not([value="2"]) + .arrow {
            -moz-transform: rotate(306deg);
            -webkit-transform: rotate(306deg);-o-transform: rotate(306deg);-ms-transform: rotate(306deg);
        }
        progress.example_r[value^="3"]:not([value="3"]) + .arrow {
            -moz-transform: rotate(324deg);
            -webkit-transform: rotate(324deg);-o-transform: rotate(324deg);-ms-transform: rotate(324deg);
        }
        progress.example_r[value^="4"]:not([value="4"]) + .arrow {
            -moz-transform: rotate(342deg);
            -webkit-transform: rotate(342deg);-o-transform: rotate(342deg);-ms-transform: rotate(342deg);
        }
        progress.example_r[value^="5"]:not([value="5"]) + .arrow {
            -moz-transform: rotate(360deg);
            -webkit-transform: rotate(360deg);-o-transform: rotate(360deg);-ms-transform: rotate(360deg);
        }
        progress.example_r[value^="6"]:not([value="6"]) + .arrow {
            -moz-transform: rotate(378deg);
            -webkit-transform: rotate(378deg);-o-transform: rotate(378deg);-ms-transform: rotate(378deg);
        }
        progress.example_r[value^="7"]:not([value="7"]) + .arrow {
            -moz-transform: rotate(396deg);
            -webkit-transform: rotate(396deg);-o-transform: rotate(396deg);-ms-transform: rotate(396deg);
        }
        progress.example_r[value^="8"]:not([value="8"]) + .arrow {
            -moz-transform: rotate(414deg);
            -webkit-transform: rotate(414deg);-o-transform: rotate(414deg);-ms-transform: rotate(414deg);
        }
        progress.example_r[value^="9"]:not([value="9"]) + .arrow {
            -moz-transform: rotate(432deg);
            -webkit-transform: rotate(432deg);-o-transform: rotate(432deg);-ms-transform: rotate(432deg);
        }
        progress.example_r[value="100"] + .arrow {
            -moz-transform: rotate(450deg);
            -webkit-transform: rotate(450deg);-o-transform: rotate(450deg);-ms-transform: rotate(450deg);
        }

        /*
        * Background of the progress bar value 
        */
        /* Firefox */
        progress.example_r::-moz-progress-bar { 
            background: transparent;	
        }
        /* Chrome */
        progress.example_r::-webkit-progress-value {
            background: transparent;
        }
        /* Polyfill */
        progress.example_r[aria-valuenow]:before  {
            background: transparent;
        }
        /* Arrow */
        progress.example_r + .arrow img {
            float: none;
            border: none;
            margin: 35px 0px 0 0;
        }
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>