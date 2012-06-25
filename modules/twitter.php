<!-- HTML / PHP -->
<li>
    <div class="box" id="knop-twitter">
        <?php
        $xml = simplexml_load_file('https://twitter.com/users/show/' . $config->twitter['username']);
        ?>

        <div class="twitter-followers"> <?php echo $xml->followers_count; ?> </div>
        <div class="twitter-following"> <?php echo $xml->friends_count; ?> </div>
        <div class="twitter-tweets"> <?php echo $xml->statuses_count; ?> </div>
    </div>
    <label>Twitter</label>
</li>

<!-- CSS -->

<!-- JavaScript -->