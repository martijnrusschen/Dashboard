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
    <style>
        #knop-twitter {
            background-image: url('widgets/nl.basvanderploeg/twitter/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        }
        .twitter-followers {
            top:26px; 
            left:15px;
            right:115px;
            color:  rgb(62,155,185);
            font-size: 30px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 1px 0px white;
            position:absolute; 
        } 
        .twitter-following {
            top:26px; 
            left:115px;
            right:15px;
            color:  rgb(62,155,185);
            font-size: 30px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 1px 0px white;
            position:absolute;
        } 
        .twitter-tweets {
            top:77px; 
            left:0px;
            right:0px;
            position:absolute;
            color:  rgb(62,155,185);
            font-size: 16px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 1px 0px white; 
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>