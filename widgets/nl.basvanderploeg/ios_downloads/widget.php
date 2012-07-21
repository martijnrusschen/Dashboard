<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['ios_downloads']) && $config['nl.basvanderploeg']['ios_downloads']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li data-id="nl.basvanderploeg.ios_downloads">
        <div id="downloads_ios" class="box">
            <div class="downloads-count downloads-count-1"> <?php echo Helper::makeCachedAPIRequest($config['nl.basvanderploeg']['ios_downloads']['url-iphone']); ?> </div>
            <div class="downloads-count downloads-count-2"> <?php echo Helper::makeCachedAPIRequest($config['nl.basvanderploeg']['ios_downloads']['url-ipad']); ?> </div>
            <div class="downloads-count downloads-count-3"> <?php echo Helper::makeCachedAPIRequest($config['nl.basvanderploeg']['ios_downloads']['url-ipadretina']); ?> </div>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['ios_downloads']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style>
        #downloads_ios {
            background-image: url('widgets/nl.basvanderploeg/ios_downloads/img/bg@2x.png');
            background-repeat:no-repeat;
            background-size:218px 122px;
        } 
        .downloads-count {
            left:46px;
            right:80px;
            position:absolute;
            color:  #5E6873;
            font-size: 16px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 1px 0px white;
        }
        .downloads-count-1 {
            top:13px; 
        } 
        .downloads-count-2 {
            top:50px; 
        } 
        .downloads-count-3 {
            top:87px; 
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>