<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['twitter']) && $config['nl.basvanderploeg']['twitter']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['twitter']['data']) && is_array($config['nl.basvanderploeg']['twitter']['data'])) {
        foreach ($config['nl.basvanderploeg']['twitter']['data'] as $data) {
            if ($data['enabled']) {
                $api_data = Helper::makeCachedAPIRequest('http://twitter.com/users/show/' . $data['username'] . '.json');
                $api_data = json_decode($api_data, true);
                ?>
                <li>
                    <div class="box" id="knop-twitter">
                        <div class="twitter-followers"> <?php echo $api_data['followers_count']; ?> </div>
                        <div class="twitter-following"> <?php echo $api_data['friends_count']; ?> </div>
                        <div class="twitter-tweets"> <?php echo $api_data['statuses_count']; ?> </div>
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