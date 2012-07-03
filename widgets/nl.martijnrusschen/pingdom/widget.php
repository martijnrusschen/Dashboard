<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.martijnrusschen']['pingdom']) && $config['nl.martijnrusschen']['pingdom']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li id="nl-example-example">
        <div class="box">
            <!-- Widget content -->
        </div>
        <label><?php echo $config['nl.example']['example']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>