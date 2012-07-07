<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.factlink']['vimeo']) && $config['nl.factlink']['vimeo']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
        $jsonvm_fl = "http://vimeo.com/api/v2/video/39821677.json";

        // initialise the session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $jsonvm_fl);

        // Return the output from the cURL session rather than displaying in the browser.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Execute the session, returning the results to $curlout, and close.
        $curlout = curl_exec($ch);
        curl_close($ch);

        $respvm_fl = json_decode($curlout, true);

        // initialise the session
        $ch = curl_init();

        // Set the URL
        curl_setopt($ch, CURLOPT_URL, $jsonvm_is);

        // Return the output from the cURL session rather than displaying in the browser.
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //Execute the session, returning the results to $curlout, and close.
        $curlout = curl_exec($ch);
        curl_close($ch);

        $respvm_is = json_decode($curlout, true);

        // echo "<pre>";
        // print_r($respvm_is);
        // echo "</pre>";

        $fl_vm = $respvm_fl[0]['stats_number_of_plays'];  
    ?>

       <li>
            <div class="box" id="vimeo">
                <div class="vimeo-views"><? echo $fl_vm ?></div>
            </div>
            <label><?php echo $data['label'] ?></label>
        </li>

    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>