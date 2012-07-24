<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['apple_store']) && $config['nl.basvanderploeg']['apple_store']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li data-refresh="true" data-id="nl.basvanderploeg.apple_store">
        <div class="box" id="knop-applestore" data-href="http://store.apple.com/nl" style="background-image: url('widgets/nl.basvanderploeg/apple_store/img/bg@2x-<?php echo Helper::makeCachedAPIRequest('http://istheapplestoredown.de/api/status'); ?>.png');"></div>
        <label><?php echo $config['nl.basvanderploeg']['apple_store']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css">
        #knop-applestore{
            background-repeat: no-repeat;
            background-size: 218px 122px;
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>