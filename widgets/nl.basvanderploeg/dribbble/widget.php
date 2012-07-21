<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['dribbble']) && $config['nl.basvanderploeg']['dribbble']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.basvanderploeg']['dribbble']['data']) && is_array($config['nl.basvanderploeg']['dribbble']['data'])) {
        foreach ($config['nl.basvanderploeg']['dribbble']['data'] as $data) {
            $api_data = Helper::makeCachedAPIRequest('http://api.dribbble.com/players/' . $data['username']);
            $api_data = json_decode($api_data, true);
            ?>
            <li>
                <div class="box" id="knop-dribbble">
                    <div class="dribbble-followers"><? echo $api_data['followers_count']; ?></div>
                    <div class="dribbble-following"><? echo $api_data['following_count']; ?></div>
                    <div class="dribbble-shots"><? echo $api_data['shots_count']; ?></div>
                </div>
                <label><?php echo $data['label'] ?></label>
            </li>
            <?php
        }
    }
    ?>
    <!-- END -->

    <!-- CSS -->
    <style>
        #knop-dribbble {
            background-image: url('widgets/nl.basvanderploeg/dribbble/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        }
        .dribbble-followers {	
            top:48px; 
            left:0px;
            right:0px;
            position:absolute;
            color: grey;
            font-size: 20px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 1px 0px white;
        } 
        .dribbble-following {
            top:52px; 
            left:25px;
            right:163px;     
            position:absolute;
            color: grey;
            font-size: 14px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 0px white; 
        }  
        .dribbble-shots {
            top:52px; 
            left:162px;
            right:25px;     
            position:absolute;
            color: grey;
            font-size: 14px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 0px white; 
        }
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>