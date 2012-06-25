<!-- HTML / PHP -->
<li>
    <div class="box" id="knop-radio">
        <div class="radio-text"><a class="link-block" href="javascript:window.location.href='http://pilot.livecontent.omroep.nl/live/npo/visualradio/3fm_vsr_nf.isml/3fm_vsr_nf.m3u8'">3FM</a>
        </div>

        <div class="radio-sub">
            <marquee  direction="left" scrollamount="3" loop="90" width="89%">
                <?php
                $xml = simplexml_load_file('http://www.3fm.nl/data/dalet/dalet.xml');
                echo '&#9658; ' . $xml->artist . ' - ' . $xml->title;
                ?>
            </marquee>
        </div>

    </div>
    <label><a href="http://colo1.seeas.omroep.nl:8000/3fmh.aac">Radio</a></label>
</li>

<!-- CSS -->

<!-- JavaScript -->