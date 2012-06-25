<!-- HTML / PHP -->
<?php
// The word we want to replace
$oldWord = array(
    '48', '47', '46', '45', '44', '43', '42', '41', '40', '39', '38', '37', '36', '35', '34', '33', '32', '31', '30', '29', '28', '27', '26', '25', '24', '23', '22', '21', '20', '19', '18', '17', '16', '15', '14', '13', '12', '11', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1', '0');

// The new word we want in place of the old one
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
            
if (isset($config->temperatuur['data']) && is_array($config->temperatuur['data'])) {
    foreach ($config->temperatuur['data'] as $data) {
        if ($data['enabled']) {
            $url = 'http://weather.yahooapis.com/forecastrss?u=c&w=' . $data['plaatscode'];
            $xml = simplexml_load_file($url);

            $condition = $xml->xpath('//yweather:condition');
            $attributes = $condition[0]->attributes();
            $temperatuur = (string) $attributes['temp'];
            $beschrijving = (string) $attributes['text'];
            $weercode = (string) $attributes['code'];

            $vooruitzicht = $xml->xpath('//yweather:forecast');
            $attributes = $vooruitzicht[0]->attributes();
            $hoogvandaag = (string) $attributes['high'];
            $laagvandaag = (string) $attributes['low'];

            $atmosfeer = $xml->xpath('//yweather:atmosphere');
            $attributes = $atmosfeer[0]->attributes();
            $vochtigheid = (string) $attributes['humidity'];

            $wind = $xml->xpath('//yweather:wind');
            $attributes = $wind[0]->attributes();
            $windkracht = (string) $attributes['speed'];
            $windrichting = (string) $attributes['direction'];
            $gevoelstemp = (string) $attributes['chill'];
            
            ?>
            <li>
                <div class="box" id="knop-temp">
                    <div class="temp-text"><?php echo $temperatuur; ?>&deg;</div>
                    <div class="temp-sub"><?php echo str_replace($oldWord, $newWord, $weercode); ?></div>
                    <div class="temp-sub-hoog"><?php echo $hoogvandaag; ?></div>
                    <div class="temp-sub-laag"><?php echo $laagvandaag; ?></div>
                </div>
                <label><?php echo $data['titel'] ?></label>
            </li>
            <?php
        }
    }
}
?>

<!-- CSS -->

<!-- JavaScript -->