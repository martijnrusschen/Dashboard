<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.factlink']['vimeo']) && $config['nl.factlink']['vimeo']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    if (isset($config['nl.factlink']['vimeo']['data']) && is_array($config['nl.factlink']['vimeo']['data'])) {
        foreach ($config['nl.factlink']['vimeo']['data'] as $data) {
            if ($data['enabled']) {
                // Totaal views voor een video
                if ($data['mode'] == 'video') :
                    $url = str_replace('{id}', $data['id'], $config['nl.factlink']['vimeo']['video-url']);
                    $output = @file_get_contents($url);
                    $output = json_decode($output, true);
                    
                    $title = $output[0]['title'];
                    $num_views = $output[0]['stats_number_of_plays'];
                    ?>
                        <li id="nl-factlink-vimeo">
                            <div class="box" id="vimeo">
                                <div class="vimeo-title"><?php echo $title; ?></div>
                                <div class="vimeo-views"><?php echo $num_views; ?></div>
                            </div>
                            <label><?php echo $data['label'] ?></label>
                        </li>
                    <?php
                endif;
                
                // Total views voor een user
                if ($data['mode'] == 'total') :
                    $url = str_replace('{id}', $data['id'], $config['nl.factlink']['vimeo']['total-url']);
                    $output = @file_get_contents($url);
                    $output = json_decode($output, true);
                    
                    $username = $output[0]['user_name'];
                    $num_videos = count($output);
                    $num_views = 0;
                    foreach($output as $video) {
                        $num_views += $video['stats_number_of_plays'];
                    }
                    ?>
                        <li id="nl-factlink-vimeo">
                            <div class="box" id="vimeo">
                                <div class="vimeo-user"><?php echo $username; ?></div>
                                <div class="vimeo-num-videos"><?php echo $num_videos; ?></div>
                                <div class="vimeo-views"><?php echo $num_views; ?></div>
                            </div>
                            <label><?php echo $data['label'] ?></label>
                        </li>
                    <?php
                endif;
            }
        }
    }
    ?>
    <!-- END -->

    <!-- CSS -->
    <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>