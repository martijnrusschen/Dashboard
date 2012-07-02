<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['weerkaart']) && $config['nl.basvanderploeg']['weerkaart']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="nl-basvanderploeg-weerkaart" >
            <a class="link-block" href="http://nos.weatheronyoursite.com/nos_internet/nos_radar.gif" target="_blank"></a>
            <a href="http://nos.weatheronyoursite.com/nos_internet/nos_radar.gif" class="sprite-nos"></a>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['weerkaart']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css" >
        #nl-basvanderploeg-weerkaart {
            background-image: url('http://nos.weatheronyoursite.com/nos_internet/nos_radar.gif');
            background-size:218px auto;
            background-position: 46% 54%;
        }
        .sprite-nos{ 
            top:15px; 
            left:14px;    
            position:absolute;
            background-image: url('http://nos.weatheronyoursite.com/nos_internet/nos_radar.gif');
            background-size: 270px auto;
            background-position: 0 -15px; 
            width: 71px; 
            height: 16px; 
            display: block;
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>