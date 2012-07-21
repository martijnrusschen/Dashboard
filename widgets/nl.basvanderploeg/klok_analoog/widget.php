<?php if (defined('BAS')) require dirname(__FILE__) . DS . 'config.php'; else die(); ?>
<?php if (isset($config['nl.basvanderploeg']['klok_analoog']) && $config['nl.basvanderploeg']['klok_analoog']['enabled']) { ?>
    <!-- HTML / PHP -->
    <li id="nl-basvanderploeg-klok_analoog">
        <div class="box" id="knop-analoog">

            <div id="clock">	
                <div id="sec"></div>
                <div id="hour"></div>
                <div id="min"></div>
            </div>

        </div>
        <label><?php echo $config['nl.basvanderploeg']['klok_analoog']['label'] ?></label>
    </li>
    <!-- END -->

    <!-- CSS -->
    <style>
        #knop-analoog{
            background-image: url('widgets/nl.basvanderploeg/klok_analoog/img/bg@2x.png');
            background-repeat: no-repeat;
            background-size: 218px 122px;
        }
        #clock {
            position: absolute;
        }
        #sec, #min, #hour {
            position: absolute;
            height: 80px;
            width: 12px;
            top: 22px;
            left: 103px;
            background-size:12px 80px;
        }
        #sec {
            background: url('widgets/nl.basvanderploeg/klok_analoog/img/sechand.png');
            background-size:12px 80px;
            z-index:3;
        }
        #min {
            background: url('widgets/nl.basvanderploeg/klok_analoog/img/minhand.png');
            background-size:12px 80px;
            z-index:2;
        }
        #hour {
            background: url('widgets/nl.basvanderploeg/klok_analoog/img/hourhand.png');
            background-size:12px 80px;
            z-index:1;
        }
    </style>
    <!-- END -->

    <!-- JavaScript -->
    <script type="text/javascript">
        $(document).ready(function() {
            setInterval( function() {
                var seconds = new Date().getSeconds();
                var sdegree = seconds * 6;
                var srotate = "rotate(" + sdegree + "deg)";

                $("#sec").css({"-moz-transform" : srotate, "-webkit-transform" : srotate});

            }, 1000 );

            setInterval( function() {
                var hours = new Date().getHours();
                var mins = new Date().getMinutes();
                var hdegree = hours * 30 + (mins / 2);
                var hrotate = "rotate(" + hdegree + "deg)";

                $("#hour").css({"-moz-transform" : hrotate, "-webkit-transform" : hrotate});

            }, 1000 );

            setInterval( function() {
                var mins = new Date().getMinutes();
                var mdegree = mins * 6;
                var mrotate = "rotate(" + mdegree + "deg)";

                $("#min").css({"-moz-transform" : mrotate, "-webkit-transform" : mrotate});

            }, 1000 );
        }); 
    </script>
    <!-- END -->
<?php } ?>