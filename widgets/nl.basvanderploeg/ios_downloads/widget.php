<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['ios_downloads']) && $config['nl.basvanderploeg']['ios_downloads']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="knop-downloads-ios">
            <div class="downloads-count-1"> <?php echo @file_get_contents($config['nl.basvanderploeg']['ios_downloads']['url-iphone']); ?> </div>
            <div class="downloads-count-2"> <?php echo @file_get_contents($config['nl.basvanderploeg']['ios_downloads']['url-ipad']); ?> </div>
            <div class="downloads-count-3"> <?php echo @file_get_contents($config['nl.basvanderploeg']['ios_downloads']['url-ipadretina']); ?> </div>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['ios_downloads']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>