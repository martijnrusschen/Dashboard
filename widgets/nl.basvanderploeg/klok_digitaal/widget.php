<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['klok_digitaal']) && $config['nl.basvanderploeg']['klok_digitaal']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li>
        <div class="box" id="knop-klok">
            <div class="klok-text">
                <div id="clockbox"></div>
            </div>

            <div class="klok-sub">
                <?
                $tijd = date("H:i:s");
                $dag_vd_week = date("w");
                $maand_vh_jaar = date("n") - 1;
                $dedag = date("j");
                $jaar = date("Y");
                $uur = explode(":", $tijd);

                $dagen = array('zondag', 'maandag', 'dinsdag', 'woensdag', 'donderdag', 'vrijdag', 'zaterdag');
                $maanden = array('januari', 'februari', 'maart', 'april', 'mei', 'juni', 'juli', 'augustus', 'september', 'oktober', 'november', 'december');
                $dag = $dagen[$dag_vd_week];
                $maand = $maanden[$maand_vh_jaar];

                echo "" . $dag . " " . $dedag . " " . $maand . "";
                ?>
            </div>
        </div>
        <label><?php echo $config['nl.basvanderploeg']['klok_digitaal']['label'] ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style>
        #knop-klok {
            background-image: url('widgets/nl.basvanderploeg/klok_digitaal/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        } 
        .klok-text {
            top:10px; 
            left:0px;
            right:0px;
            position:absolute;
            color:  white;
            font-size: 65px;
            font-weight:normal;
            text-align:center;
            text-shadow: 0px 2px 2px black; 
        } 
        .klok-sub {
            top:85px; 
            left:0px;
            right:0px;     
            position:absolute;
            color: #ffffff;
            font-size: 15px;
            font-weight: bold;
            text-align:center;
            text-shadow: 0px 1px 2px black; 
        } 
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <script type="text/javascript">
        function getClock(){
            d = new Date();
            nhour = d.getHours();
            nmin = d.getMinutes();
            if(nmin <= 9){ nmin = "0" + nmin}

            document.getElementById('clockbox').innerHTML = "" + nhour + ":" + nmin + "";
            setTimeout("getClock()", 1000);
        }
        $(document).ready(getClock());
    </script>
    <!-- END -->
<?php } ?>