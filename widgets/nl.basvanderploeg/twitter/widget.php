<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['twitter']) && $config['nl.basvanderploeg']['twitter']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['twitter']['data']) && is_array($config['nl.basvanderploeg']['twitter']['data'])) {
        foreach ($config['nl.basvanderploeg']['twitter']['data'] as $data) {
            if ($data['enabled']) {
                ?>
                <li>
                    <div class="box" id="knop-twitter">
                        <?php
                        $xml = simplexml_load_file('https://twitter.com/users/show/' . $data['username']);
                        ?>

                        <div class="twitter-followers"> <?php echo $xml->followers_count; ?> </div>
                        <div class="twitter-following"> <?php echo $xml->friends_count; ?> </div>
                        <div class="twitter-tweets"> <?php echo $xml->statuses_count; ?> </div>
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