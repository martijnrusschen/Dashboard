<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['dribble']) && $config['nl.basvanderploeg']['dribble']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['dribble']['data']) && is_array($config['nl.basvanderploeg']['dribble']['data'])) {
        foreach ($config['nl.basvanderploeg']['dribble']['data'] as $data) {
            ?>
            <li>
                <div class="box" id="knop-dribbble">
                    <?php
                    $string = file_get_contents('http://api.dribbble.com/players/' . $data['username']);
                    $json_a = json_decode($string, true);
                    ?>

                    <div class="dribbble-followers"><? echo $json_a['followers_count']; ?></div>
                    <div class="dribbble-following"><? echo $json_a['following_count']; ?></div>
                    <div class="dribbble-shots"><? echo $json_a['shots_count']; ?></div>
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