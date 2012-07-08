<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['aandelen']) && $config['nl.basvanderploeg']['aandelen']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['aandelen']['data']) && is_array($config['nl.basvanderploeg']['aandelen']['data'])) {
        foreach ($config['nl.basvanderploeg']['aandelen']['data']
        as $data) {
            if ($data['enabled']) {
                ?>
                <li>
                    <div class="box" id="knop-stocks">
                        <div class="stocks-text"><?php echo Helper::makeCachedAPIRequest('http://download.finance.yahoo.com/d/quotes.csv?s=' . $data['beurs'] . '&f=l1'); ?></div>    
                        <div class="stocks-sub"><?php echo Helper::makeCachedAPIRequest('http://download.finance.yahoo.com/d/quotes.csv?s=' . $data['beurs'] . '&f=c1'); ?></div> 
                    </div>
                    <label><?php echo $data['label']; ?></label>
                </li>
                <?php
            }
        }
    }
    ?>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>