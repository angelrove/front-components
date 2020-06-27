<?php
use angelrove\front_components\Console\EchoFlush;

//------------------------------
EchoFlush::_init('my_console');

EchoFlush::echo('Starting process...<br>');
EchoFlush::echo('Step 2<br>');
sleep(1);
EchoFlush::echo('Step 3<br>');
sleep(1);
EchoFlush::echo('Step 4<br>');
sleep(1);
sleep(1);
EchoFlush::echo('End process');
