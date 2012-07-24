<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['wisselkoers']) && $config['nl.basvanderploeg']['wisselkoers']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li data-id="nl.basvanderploeg.wisselkoers" data-refresh="true" data-timeout="<?php echo TIME_MS_FIVE_MINUTE * 3; ?>">
        <div class="box" id="knop-currency"> 
            <div class="currency-text currency-text-1"><?php echo Helper::makeCachedAPIRequest('http://download.finance.yahoo.com/d/quotes.csv?s=EURUSD=X&f=l1', TIME_FIVE_MINUTE * 3) ?></div>
            <div class="currency-text currency-text-2"><?php echo Helper::makeCachedAPIRequest('http://download.finance.yahoo.com/d/quotes.csv?s=USDEUR=X&f=l1', TIME_FIVE_MINUTE * 3) ?></div>
            <div class="currency-text currency-text-3">1.00</div>
            <div class="currency-text currency-text-4">1.00</div>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['wisselkoers']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style>
        #knop-currency {
            background-image: url('widgets/nl.basvanderploeg/wisselkoers/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        }
        .currency-text {
            position: absolute;
            color: white;
            font-size: 13px;
            font-weight: bold;
            text-align: center;
            text-shadow: 0px 1px 3px black;
        }
        .currency-text-1 {
            top:29px; 
            left:118px;
            right:48px;
        } 
        .currency-text-2 {
            top:78px; 
            left:118px;
            right:48px;
        } 
        .currency-text-3 {
            top:29px; 
            left:48px;
            right:118px;
        } 
        .currency-text-4 {
            top:78px; 
            left:48px;
            right:118px;
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>