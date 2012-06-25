<!-- HTML / PHP -->
<li>
    <div class="box" id="knop-currency"> 
        <div class="currency-text-1">    
            <!--1 USD is worth ... EUR-->
            <?php
            $url = 'http://currency-api.appspot.com/api/USD/EUR.json?key=' . $config->currency['api-key']; // Vraag een api key aan op http://currency-api.appspot.com/ 
            $result = file_get_contents($url);
            $result = json_decode($result);

            if ($result->success) {
                echo $result->rate;
            }
            ?>   
        </div> 

        <div class="currency-text-2">   
            <!--1 EUR is worth ... USD-->
            <?php
            $url = 'http://currency-api.appspot.com/api/EUR/USD.json?key=' . $config->currency['api-key']; // Vraag een api key aan op http://currency-api.appspot.com/ 
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
    <label>Wisselkoers</label>
</li>

<!-- CSS -->

<!-- JavaScript -->