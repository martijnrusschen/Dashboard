<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['weerkaart_nos']) && $config['nl.basvanderploeg']['weerkaart_nos']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="knop-weerkaart-nos" >
            <a class="link-block" href="<?php echo $config['nl.basvanderploeg']['weerkaart_nos']['imageURL']; ?>" target="_blank"></a>
            <a href="<?php echo $config['nl.basvanderploeg']['weerkaart_nos']['imageURL']; ?>" target="_blank" class="sprite-nos"></a>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['weerkaart_nos']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css" >
        #knop-weerkaart-nos {
            background-image: url('<?php echo $config['nl.basvanderploeg']['weerkaart_nos']['imageURL']; ?>');
            background-size: 218px auto;
            background-position: 46% 54%;
        }
        .sprite-nos{ 
            top:15px; 
            left:14px;    
            position:absolute;
            background-image: url('<?php echo $config['nl.basvanderploeg']['weerkaart_nos']['imageURL']; ?>');
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