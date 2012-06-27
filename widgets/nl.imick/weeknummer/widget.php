<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.imick']['weeknummer']) && $config['nl.imick']['weeknummer']['enabled']) { ?>
<!-- CSS -->
    <style type="text/css" >
        #knop-weeknummer {
            background-image: url('res/nl.imick/weeknummer/img/weeknummer@2x.png');
            background-repeat:no-repeat;
            background-size: 218px 122px; 
        }

@media only screen and (-webkit-min-device-pixel-ratio: 1.5),
only screen and (-o-min-device-pixel-ratio: 3/2),
only screen and (min--moz-device-pixel-ratio: 1.5),
only screen and (min-device-pixel-ratio: 1.5) {
    #knop-weeknummer{
        background-image:url(res/nl.imick/weeknummer/img/weeknummer@2x.png);
    }
}  
     .weeknummer-title {
	        top:5px; 
	        left:0;
	        right:0;
	        position:absolute;
	        color:  #FFF;
	        font-size: 18px;
	        font-weight:normal;
	        text-align:center;
        text-shadow: 0px 0px 1px black; 
} 
     .weeknummer-text {
       top:33px; 
        left:0px;
        right:0px;
        position:absolute;
        color:  black;
        font-size: 62px;
        font-weight:bold;
        text-align:center;
        text-shadow: 0px -1px 0px white; 
        }
    </style>

    <!-- HTML / PHP -->
    <li>
        <div id="knop-weeknummer" class="box"  >
            <!-- Widget content -->
     <div class="weeknummer-title">Week</div>
        <div class="weeknummer-text">    
        <?php echo date('W'); ?>
        </div>          
            
        </div>
        <label><?php echo $config['nl.imick']['weeknummer']['label']; ?></label>
    </li>
    <!-- END -->

        <!-- END -->

    <!-- JavaScript -->
    <!-- END -->
<?php } ?>