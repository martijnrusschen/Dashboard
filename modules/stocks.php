<!-- HTML / PHP -->
<?php
if (isset($config->stocks['data']) && is_array($config->stocks['data'])) {
    foreach ($config->stocks['data'] as $data) {
        if ($data['enabled']) {
            ?>
            <li>
                <div class="box" id="knop-stocks">
                    <div class="stocks-text"><?php $hit_count = @file_get_contents($data['url-text']); echo $hit_count; ?></div>    
                    <div class="stocks-sub"><?php $hit_count = @file_get_contents($data['url-sub']); echo $hit_count; ?></div> 
                </div>
                <label><?php echo $data['label']; ?></label>
            </li>
            <?php
        }
    }
}
?>

<!-- CSS -->

<!-- JavaScript -->