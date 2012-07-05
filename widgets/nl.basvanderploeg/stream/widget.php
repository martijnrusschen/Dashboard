<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['stream']) && $config['nl.basvanderploeg']['stream']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['stream']['data']) && is_array($config['nl.basvanderploeg']['stream']['data'])) {
        foreach ($config['nl.basvanderploeg']['stream']['data'] as $data) {
            if ($data['enabled']) {
                ?>
                <li>
                    <div class="box" id="knop-tv">
                        <div id="inhoud-video-top"></div>
                        <div id="videoscreen"> 
                            <video width="196" height="100" controls="none" poster="<?php echo $data['poster'] ?>">
                                <?php foreach ($data['streams'] as $stream) { ?>
                                    <source src="<?php echo $stream['url'] ?>" type="<?php echo $stream['type'] ?>" />
                                <?php } ?>
                                <?php echo $data['label'] ?>
                            </video> 
                        </div>
                    </div>
                    <label><?php echo $data['label'] ?></label>
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