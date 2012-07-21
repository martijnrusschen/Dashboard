<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['apple_store']) && $config['nl.basvanderploeg']['apple_store']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php $applestore_online = @file_get_contents('http://istheapplestoredown.de/api/status'); ?>

    <li>
        <div class="box" id="knop-applestore">
            <a class="link-block" target="_blank" href="http://store.apple.com/nl"></a>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['apple_store']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css">
        #knop-applestore{
            background-image: url('widgets/nl.basvanderploeg/apple_store/img/bg@2x-<?php echo $applestore_online; ?>.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>