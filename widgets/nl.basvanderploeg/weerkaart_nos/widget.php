<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['weerkaart_nos']) && $config['nl.basvanderploeg']['weerkaart_nos']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php $url = $config['nl.basvanderploeg']['weerkaart_nos']['imageURL']; ?>
    <li data-refresh="true" data-id="nl.basvanderploeg.weerkaart_nos" data-timeout="<?php echo TIME_MS_FIVE_MINUTE * 3; ?>">
        <div class="box" id="knop-weerkaart-nos" data-href="<?php echo $url; ?>" style="background-image: url('<?php echo $url; ?>');">
            <div class="sprite-nos" style="background-image: url('<?php echo $url; ?>');"></div>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['weerkaart_nos']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css" >
        #knop-weerkaart-nos {
            background-size: 218px auto;
            background-position: 46% 54%;
        }
        .sprite-nos{ 
            top:15px; 
            left:14px;    
            position:absolute;
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