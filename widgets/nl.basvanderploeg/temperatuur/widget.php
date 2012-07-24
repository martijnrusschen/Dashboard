<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['temperatuur']) && $config['nl.basvanderploeg']['temperatuur']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    $oldWord = array(
        '48', '47', '46', '45', '44', '43', '42', '41', '40', '39', '38', '37', '36', '35', '34', '33', '32', '31', '30', '29', '28', '27', '26', '25', '24', '23', '22', '21', '20', '19', '18', '17', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', '0'
    );
    $newWord = array(
        'Niet beschikbaar',
        'Ge&iuml;soleerde onweersbuien',
        'Sneeuwbuien',
        'Onweersbuien',
        'Gedeeltelijk bewolkt',
        'Hevige sneeuwval',
        'Verspreide sneeuwbuien',
        'Hevige sneeuwval',
        'Verspreide stortbuien',
        'Verspreide onweersbuien',
        'Verspreide onweersbuien',
        'Ge&iuml;soleerde onweersbuien',
        'Heet',
        'Gemengd regen en hagel',
        'Mooi',
        'Zacht',
        'Zonnig',
        'Helder',
        'Gedeeltelijk bewolkt',
        'Gedeeltelijk bewolkt',
        'Overwegend bewolkt',
        'Overwegend bewolkt',
        'Bewolkt',
        'Koud',
        'Winderig',
        'Stormachtig',
        'Smog',
        'Helder',
        'Mistig',
        'Stof',
        'Natte sneeuw',
        'Hagel',
        'Sneeuw',
        'Stuifsneeuw',
        'Lichte sneeuwbuien',
        'Sneeuwvlagen',
        'Stortbuien',
        'Lichte buien',
        'Aanvriezende regen',
        'Motregen',
        'IJzel',
        'Sneeuw en natte sneeuw',
        'Regen en natte sneeuw',
        'Gemengd regen en sneeuw',
        'Onweer',
        'Zware onweersbuien',
        'Orkaan',
        'Tropische storm',
        'Tornado',
    );

    if (isset($config['nl.basvanderploeg']['temperatuur']['data']) && is_array($config['nl.basvanderploeg']['temperatuur']['data'])) {
        foreach ($config['nl.basvanderploeg']['temperatuur']['data'] as $data) {
            if ($data['enabled']) {
                $api_data = Helper::makeCachedAPIRequest('http://weather.yahooapis.com/forecastrss?u=c&w=' . $data['plaatscode'], TIME_FIVE_MINUTE * 3);
                $xml = simplexml_load_string($api_data);

                $condition = $xml->xpath('//yweather:condition');
                $attributes = $condition[0]->attributes();
                $temperatuur = (string) $attributes['temp'];
                $weercode = (string) $attributes['code'];

                $vooruitzicht = $xml->xpath('//yweather:forecast');
                $attributes = $vooruitzicht[0]->attributes();
                $hoogvandaag = (string) $attributes['high'];
                $laagvandaag = (string) $attributes['low'];
                ?>
                <li data-refresh="false" data-id="nl.basvanderploeg.temperatuur" data-timeout="<?php echo TIME_MS_FIVE_MINUTE * 3; ?>">
                    <div class="box" id="knop-temp">
                        <div class="temp-text"><?php echo $temperatuur; ?>&deg;</div>
                        <div class="temp-sub"><?php echo str_replace($oldWord, $newWord, $weercode); ?></div>
                        <div class="temp-sub-hoog"><?php echo $hoogvandaag; ?></div>
                        <div class="temp-sub-laag"><?php echo $laagvandaag; ?></div>
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
    <style>
        #knop-temp{
            background-image: url('widgets/nl.basvanderploeg/temperatuur/img/bg@2x.png');
            background-repeat:no-repeat;
            background-size:218px 122px;
        } 
        .temp-text {
            top:10px; 
            left:10px;
            right:0px;
            position:absolute;
            color:  rgb(216,227,248);
            font-size: 65px;
            font-weight:normal;
            text-align:center;
            text-shadow: 0px -1px 0px white, 0px 2px 2px darkblue; 
        } 
        .temp-sub {
            top:83px; 
            left:0px;
            right:0px;     
            position:absolute;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 2px darkblue; 
        } 
        .temp-image {
            padding-top: 10px;
            color:  rgb(216,227,248);
            font-size: 65px;
            font-weight:normal;
            text-align:center;
            text-shadow: 0px -1px 0px white, 0px 2px 2px darkblue; 
        } 
        .temp-image-sub {
            margin-top: -6px;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 2px darkblue; 
        } 
        .temp-side-image {
            width:50px;
            height:34px;
            margin-top: -68px;
            padding-left: 12px;
            float: left;
        } 
        .temp-sub-hoog {
            top:43px; 
            left:29px;
            right:184px;     
            position:absolute;
            color: rgb(45,97,205);
            font-size: 20px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 0px white; 
        }  
        .temp-sub-laag {
    top:43px; 
    left:184px;
    right:29px;     
    position:absolute;
    color: rgb(45,97,205);
    font-size: 20px;
    font-weight: bold;
    text-align:center;
    text-shadow: 0px 1px 0px white; 
} 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>