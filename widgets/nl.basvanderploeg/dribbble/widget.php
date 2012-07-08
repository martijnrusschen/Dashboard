<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['dribbble']) && $config['nl.basvanderploeg']['dribbble']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['dribbble']['data']) && is_array($config['nl.basvanderploeg']['dribbble']['data'])) {
        foreach ($config['nl.basvanderploeg']['dribbble']['data'] as $data) {
            $api_data = Helper::makeCachedAPIRequest('http://api.dribbble.com/players/' . $data['username']);
            $api_data = json_decode($api_data, true);
            ?>
            <li>
                <div class="box" id="knop-dribbble">
                    <div class="dribbble-followers"><? echo $api_data['followers_count']; ?></div>
                    <div class="dribbble-following"><? echo $api_data['following_count']; ?></div>
                    <div class="dribbble-shots"><? echo $api_data['shots_count']; ?></div>
                </div>
                <label><?php echo $data['label'] ?></label>
            </li>
            <?php
        }
    }
    ?>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>