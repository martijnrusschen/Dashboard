<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['bbq_weer']) && $config['nl.basvanderploeg']['bbq_weer']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li data-refresh="true" data-id="nl.basvanderploeg.bbq_weer" data-timeout="<?php echo TIME_MS_HOUR; ?>">
        <div class="box" id="knop-bbq">
            <div class="bbq-text-nieuw"><?php echo Helper::makeCachedAPIRequest('http://api.ishetvandaagbarbecueweer.nl', TIME_HOUR) . '!'; ?></div>  
        </div>
        <label><?php echo $config['nl.basvanderploeg']['bbq_weer']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <link href='http://fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <style>
        #knop-bbq {
            background-image: url('widgets/nl.basvanderploeg/bbq_weer/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        }
        .bbq-text {
            padding-top: 41px;
            padding-left: 41px;
            padding-right: 66px;
            font-family: 'Questrial', sans-serif;
            text-transform:uppercase;
            color: #ffffff;
            font-size: 41px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 0px 6px white; 
        } 
        .bbq-sub {
            margin-top: -5px;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 2px black; 
        } 
        .bbq-text-nieuw {
            top:45px; 
            left:95px;
            right:34px;
            position:absolute;
            color:  white;
            font-size: 25px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 1px 3px black; 
            text-transform:uppercase;
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>