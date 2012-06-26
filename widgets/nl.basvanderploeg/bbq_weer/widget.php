<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['bbq_weer']) && $config['nl.basvanderploeg']['bbq_weer']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="knop-bbq">
            <div class="bbq-text-nieuw">
                <?php
                $xml = simplexml_load_file('http://api.ishetvandaagbarbecueweer.nl/index.xml');
                echo $xml->ishetvandaagbarbecueweer . '!';
                ?>
            </div>  
        </div>
        <label><?php echo $config['nl.basvanderploeg']['bbq_weer']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>