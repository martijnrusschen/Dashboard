<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.imick']['sabnzbd']) && $config['nl.imick']['sabnzbd']['enabled']) { ?>
    <!-- HTML / PHP -->
    <?php
    $result = @file_get_contents('http://' . $config['nl.imick']['sabnzbd']['ip-adres'] . ':' . $config['nl.imick']['sabnzbd']['poort'] . '/sabnzbd/api?mode=qstatus&output=json&apikey=' . $config['nl.imick']['sabnzbd']['api-key']);
    $result = json_decode($result);
    ?>   

    <li id="nl-imick-sabnzbd" onclick="$.ajax('index.php?id=nl.imick.sabnzbd&a=<?php echo (!$result->paused) ? 'pause' : 'resume'; ?>').done(function () { refreshMe('nl.imick.sabnzbd'); });">
        <div id="knop-sabnzbd" class="box"  >
            <?php if ($result != null) { ?>
                <!-- Widget content -->
                <div class="sabnzbd-timeleft">    
                    <?php echo (!$result->paused) ? $result->timeleft : 'PAUZE'; ?>   
                </div>

                <!-- ONDER --> 
                <div class="sabnzbd-kbpersec" title="Download Snelheid">    
                    <?php echo round($result->kbpersec); ?> kb/s
                </div>    

                <div class="sabnzbd-mbleft" title="Resterend aantal MB's">    
                    <?php echo round($result->mbleft); ?> MB left
                </div> 


                <!-- BOVEN -->
                <div class="sabnzbd-diskspace" title="Vrije schijfruimte" >    
                    <?php echo round($result->diskspace1); ?> GB
                </div>   
                <div class="sabnzbd-number" title="Aantal downloads in wachtrij">    
                    <?php echo $result->noofslots; ?>
                </div> 
                <?php
            } else {
                echo '<div class="sabnzbd-timeleft">ERROR</div>';
            }
            ?>
        </div>
        <label><?php echo $config['nl.imick']['sabnzbd']['label']; ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style type="text/css" >
        #knop-sabnzbd {
            background-image: url('res/nl.imick/sabnzbd/img/sabnzbd@2x.png');
            background-repeat:no-repeat;
            background-size: 218px 122px;
            cursor: pointer;
        }

        @media only screen and (-webkit-min-device-pixel-ratio: 1.5),
        only screen and (-o-min-device-pixel-ratio: 3/2),
        only screen and (min--moz-device-pixel-ratio: 1.5),
        only screen and (min-device-pixel-ratio: 1.5) {
            #knop-sabnzbd{
                background-image:url(res/nl.imick/sabnzbd/img/sabnzbd@2x.png);
            }
        }  
        .sabnzbd-timeleft {
            top:30px; 
            left:0;
            right:0;
            position:absolute;
            color:  grey;
            font-size: 50px;
            font-weight:bold;
            text-align:center;
            text-shadow: 0px 1px 2px grey; 
        } 
   
        .sabnzbd-mbleft {
            top:102px; 
            left:45px;
            position:absolute;
            color:  black;
            font-size: 10px;
            text-align:left;
            text-shadow: 0px 1px 2px grey; 
        } 

        .sabnzbd-diskspace {
            top:10px; 
            left:45px;
            position:absolute;
            color:  black;
            font-size: 10px;
            text-align:left;
            text-shadow: 0px 1px 2px grey; 
        } 

        .sabnzbd-number {
            top:10px; 
            right:45px;          
            position:absolute;
            color:  black;
            font-size: 10px;
            text-align:right;
            text-shadow: 0px 1px 2px grey; 
        } 
        .sabnzbd-kbpersec {
            top:102px; 
            right:45px;
            position:absolute;
            color:  black;
            font-size: 10px;
            text-align:right;
            text-shadow: 0px 1px 2px grey; 
        } 

    </style>
    <!-- END -->

    <!-- JavaScript -->
    <script type="text/javascript">
        $(document).ready(function() {
            autoRefreshMe('nl.imick.sabnzbd', 500);
        });
    </script>
    <!-- END -->
<?php } ?>