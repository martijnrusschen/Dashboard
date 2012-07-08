<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.example']['example']) && $config['nl.example']['example']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="nl-example-example" >
            <!-- Widget content -->
        </div>
        <label><?php echo $config['nl.example']['example']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css" >
        #nl-example-example {
            background-image: url("res/nl.example/example/img/example.png");
            background-color: white;
        }
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>