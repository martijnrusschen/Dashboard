<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.martijnrusschen']['pingdom']) && $config['nl.martijnrusschen']['pingdom']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
 
          // Init cURL
        $curl = curl_init();
          // Set target URL
        curl_setopt($curl, CURLOPT_URL, "https://api.pingdom.com/api/2.0/checks");
          // Set the desired HTTP method (GET is default, see the documentation for each request)
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
          // Set user (email) and password
        curl_setopt($curl, CURLOPT_USERPWD, "johndoe@example.com:password");
          // Add a http header containing the application key (see the Authentication section of this document)
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("App-Key: zoent8w9cbt810rsdkweir23vcxb87zrt5541"));
          // Ask cURL to return the result as a string
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
     
          // Execute the request and decode the json result into an associative array
        $response = json_decode(curl_exec($curl),true);
     
          // Check for errors returned by the API
        if (isset($response['error'])) {
            print "Error: " . $response['error']['errormessage'] . "\n";
            exit;
        }
     
          // Fetch the list of checks from the response
        $checksList = $response['checks'];
          // Print the names and statuses of all checks in the list
        foreach ($checksList as $check) {
            print $check['name'] . " is " . $check['status'] . "\n";
        }
     
    ?>

    <li id="nl-martijnrusschen-pingdom">
        <div class="box">
            <!-- Widget content -->
        </div>
        <label><?php echo $config['nl.martijnrusschen']['pingdom']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>