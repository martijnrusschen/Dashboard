<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['journaal24']) && $config['nl.basvanderploeg']['journaal24']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="knop-tv">
            <div id="inhoud-video-top"></div>
            <div id="videoscreen"> 
                <video width="196" height="100" controls="none" poster="res/nl.basvanderploeg/core/img/nos.png">
                    <source src="http://download.omroep.nl/nos/iphone-live-streaming/j24/j24_iphone.m3u8" type="video/mp4" />
                    Journaal 24
                </video> 
            </div>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['journaal24']['label'] ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>