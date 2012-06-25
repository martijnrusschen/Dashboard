<!-- HTML / PHP -->
<li>
    <div class="box" id="knop-wind">
        <div class="wind-text"><?php echo $windkracht; ?></div>
        <div class="wind-sub"></div>
        <div class="wind-gevoel"><?php echo $gevoelstemp; ?>&deg;</div>
    </div>
    <label>Wind</label>
</li>

<!-- CSS -->
<style type="text/css">
    .wind-sub{
        -webkit-transform: rotate(<?= $windrichting; ?>deg);
        -moz-transform: rotate(<?= $windrichting; ?>deg);
        -o-transform: rotate(<?= $windrichting; ?>deg);
    }     
</style>

<!-- JavaScript -->