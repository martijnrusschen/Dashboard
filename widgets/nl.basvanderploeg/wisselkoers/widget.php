<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['wisselkoers']) && $config['nl.basvanderploeg']['wisselkoers']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="knop-currency"> 
            <div class="currency-text-1">    
                <?php echo @file_get_contents('http://download.finance.yahoo.com/d/quotes.csv?s=EURUSD=X&f=l1'); ?>  
            </div> 

            <div class="currency-text-2">   
                <?php echo @file_get_contents('http://download.finance.yahoo.com/d/quotes.csv?s=USDEUR=X&f=l1'); ?>
            </div>

            <div class="currency-text-3">1.00</div>
            <div class="currency-text-4">1.00</div>

        </div>
        <label><?php echo $config['nl.basvanderploeg']['wisselkoers']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>