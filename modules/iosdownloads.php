<!-- HTML / PHP -->
<?php
if (isset($config->iosdownloads['data']) && is_array($config->iosdownloads['data'])) {
    foreach ($config->iosdownloads['data'] as $data) {
        if ($data['enabled']) {
            ?>
            <li>
                <div class="box" id="knop-downloads-ios">
                    
                    <div class="downloads-count-1"> <?php $hit_count = @file_get_contents($data['url-iphone']); echo $hit_count;?> </div>
                    <div class="downloads-count-2"> <?php $hit_count = @file_get_contents($data['url-ipad']); echo $hit_count;?> </div>
                    <div class="downloads-count-3"> <?php $hit_count = @file_get_contents($data['url-ipadretina']); echo $hit_count;?> </div>
  
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