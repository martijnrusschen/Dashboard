<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['aandelen']) && $config['nl.basvanderploeg']['aandelen']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['aandelen']['data']) && is_array($config['nl.basvanderploeg']['aandelen']['data'])) {
        foreach ($config['nl.basvanderploeg']['aandelen']['data']
        as $data) {
            if ($data['enabled']) {
                ?>
                <li>
                    <div class="box" id="knop-stocks">
                        <div class="stocks-text"><?php echo Helper::makeCachedAPIRequest('http://download.finance.yahoo.com/d/quotes.csv?s=' . $data['beurs'] . '&f=l1'); ?></div>    
                        <div class="stocks-sub"><?php echo Helper::makeCachedAPIRequest('http://download.finance.yahoo.com/d/quotes.csv?s=' . $data['beurs'] . '&f=c1'); ?></div> 
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
    <style>
        #knop-stocks {
            background-image: url('widgets/nl.basvanderploeg/aandelen/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        } 
        .stocks-text {
            padding-top: 11px;
            padding-left: 10px;
            padding-right: 95px;
            color: rgb(45,97,205);
            font-size: 25px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 0px white; 
        } 
        .stocks-sub {
            margin-top: -35px;
            margin-left: 130px;
            margin-right: 10px;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            text-align:right;
            text-shadow: 0px 1px 2px darkblue; 
        }
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>