<style>
#console_out {
    height: <?=$height?>px;
    background: black; color:#eee; font-family: monospace; padding: 6px; width: 100%; border-width:0; text-align: left; overflow: scroll;
}
#Console>#onResize,
#Console>#onResizeSmall {
    float: right;
    position: relative;
    left: -27px;
    top: 24px;
}
</style>

<div id="Console">
    <button id="onResize" class=""><i class="fas fa-expand"></i></button>
    <button id="onResizeSmall" class=""><i class="fas fa-compress"></i></button>

    <div id="console_out">
        <?php
        if ($getFlush) {
            echo self::getFlush();
        }
        ?>
    </div>
</div>
