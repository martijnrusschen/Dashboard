<!-- HTML / PHP -->
<li>
    <div class="box" id="knop-dribbble">
        <?php
        $string = file_get_contents('http://api.dribbble.com/players/' . $config->dribble['username']);
        $json_a = json_decode($string, true);
        ?>

        <div class="dribbble-followers"><? echo $json_a['followers_count']; ?></div>
        <div class="dribbble-following"><? echo $json_a['following_count']; ?></div>
        <div class="dribbble-shots"><? echo $json_a['shots_count']; ?></div>
    </div>
    <label>Dribbble Volgers</label>
</li>

<!-- CSS -->

<!-- JavaScript -->