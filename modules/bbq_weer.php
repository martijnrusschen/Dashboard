<!-- HTML / PHP -->
<li>
    <div class="box" id="knop-bbq">
        <div class="bbq-text-nieuw">
            <?php
            $xml = simplexml_load_file('http://api.ishetvandaagbarbecueweer.nl/index.xml');
            echo $xml->ishetvandaagbarbecueweer . '!';
            ?>
        </div>  
    </div>
    <label>Barbecueweer?</label>
</li>

<!-- CSS -->

<!-- JavaScript -->