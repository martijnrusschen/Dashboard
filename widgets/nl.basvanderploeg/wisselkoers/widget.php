<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['wisselkoers']) && $config['nl.basvanderploeg']['wisselkoers']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="knop-currency"> 
            <div class="currency-text-1">    
                <?php
                $url = 'http://currency-api.appspot.com/api/USD/EUR.json?key=' . $config['nl.basvanderploeg']['wisselkoers']['api-key']; 
                $result = file_get_contents($url);
                $result = json_decode($result);

                if ($result->success) {
                    echo $result->rate;
                }
                ?>   
            </div> 

            <div class="currency-text-2">   
                <?php
                $url = 'http://currency-api.appspot.com/api/EUR/USD.json?key=' . $config['nl.basvanderploeg']['wisselkoers']['api-key']; 
                $result = file_get_contents($url);
                $result = json_decode($result);

                if ($result->success) {
                    echo $result->rate;
                }
                ?>
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