<?php $applestore_online = @file_get_contents('http://istheapplestoredown.de/api/status'); ?>
<style type="text/css">
    /* SWITCH WIDGET */
    #knop-applestore{
        background-image: url('img/applestore@2x-<?php echo $applestore_online; ?>.png');
        background-repeat:no-repeat;
    } 

    @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
    only screen and (-o-min-device-pixel-ratio: 3/2),
    only screen and (min--moz-device-pixel-ratio: 1.5),
    only screen and (min-device-pixel-ratio: 1.5) {
        #knop-applestore {
            background-image:url("img/applestore@2x-<?php echo $applestore_online; ?>.png"); 
        }
    }

    #knop-applestore{background-size:218px 122px;} 

    #knop-dagnacht{
        background-image: url("img/nu-<?php echo ($dayornight == 'night') ? 'nacht' : 'dag'; ?>.png");
        background-repeat:no-repeat;
    } 

    @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
    only screen and (-o-min-device-pixel-ratio: 3/2),
    only screen and (min--moz-device-pixel-ratio: 1.5),
    only screen and (min-device-pixel-ratio: 1.5) {
        #knop-dagnacht {
            background-image:url("img/nu-<?php echo ($dayornight == 'night') ? 'nacht' : 'dag'; ?>.png");
        }
    }

    #knop-dagnacht{
        background-size:218px 122px;
    } 
</style>