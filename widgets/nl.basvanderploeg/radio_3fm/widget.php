<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['radio_3fm']) && $config['nl.basvanderploeg']['radio_3fm']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li data-id="nl.basvanderploeg.radio_3fm" data-refresh="true" data-timeout="<?php echo TIME_FIVE_MINUTE; ?>" >
        <div class="box" id="knop-radio3fm">
            <div class="radio3fm-text"><a class="link-block" href="javascript:window.location.href='http://pilot.livecontent.omroep.nl/live/npo/visualradio/3fm_vsr_nf.isml/3fm_vsr_nf.m3u8'">3FM</a>
            </div>

            <div class="radio3fm-sub">
                <marquee  direction="left" scrollamount="3" loop="90" width="89%">
                    <?php
                    $api_data = Helper::makeCachedAPIRequest('http://www.3fm.nl/data/dalet/dalet.xml');
                    $xml = simplexml_load_string($api_data);
                    echo '&#9658; ' . $xml->artist . ' - ' . $xml->title;
                    ?>
                </marquee>
            </div>

        </div>
        <label><a href="http://colo1.seeas.omroep.nl:8000/3fmh.aac"><?php echo $config['nl.basvanderploeg']['radio_3fm']['label'] ?></a></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <link href='http://fonts.googleapis.com/css?family=Oleo+Script' rel='stylesheet' type='text/css'>
    <style>
        #knop-radio3fm {
            background-image: url('widgets/nl.basvanderploeg/radio_3fm/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        }
        .radio3fm-sub {
            top:88px; 
            left:15px;
            right:14px;
            position:absolute;
            color: #ffffff;
            font-size: 12px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 2px black; 
        } 
        .radio3fm-text {
            top:23px; 
            left:90px;
            right:16px;
            position:absolute;
            font-family: 'Oleo Script', cursive;
            font-color:  grey;
            font-size: 30px;
            font-weight:normal;
            text-align:center;
            text-shadow: 0px 2px 2px black; 
        } 
        .radio3fm-text a {        
            color: white; 
            text-decoration:none; 
        }
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>