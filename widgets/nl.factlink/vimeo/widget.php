<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.factlink']['vimeo']) && $config['nl.factlink']['vimeo']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.factlink']['vimeo']['data']) && is_array($config['nl.factlink']['vimeo']['data'])) {
        foreach ($config['nl.factlink']['vimeo']['data'] as $data) {
            $string = file_get_contents('http://vimeo.com/api/v2/video/39821677.json');
            $json_a = json_decode($string, true);
            ?>
            <li>
                <div class="box" id="knop-dribbble">
                    <div class="vimeo-views"><? echo $json_a['stats_number_of_plays']; ?></div>
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