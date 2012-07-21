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
                        <div class="inhoud-video-top"></div>
                        <div class="videoscreen"> 
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
    <style>
        #knop-tv{
            background-image: url('widgets/nl.basvanderploeg/stream/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        } 
        .videoscreen {
            width: 196px;
            height: 100px;
            color: #5E6873;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            text-shadow: 0px 1px 0px white;
            overflow: hidden;
            display: block;
            padding-left: 11px;
        }
        .inhoud-video-top{
            width: 160px;
            height: 11px;
            overflow: hidden;
            padding-top: 0px;
            border: solid 0px black;
        }
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>