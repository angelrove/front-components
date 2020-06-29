<?php
use angelrove\front_components\Console\Console;

//------------------------------
$console_id = 'my_console';

Console::_init($console_id);

Console::echo('Starting process...<br>');
Console::echo('Step 2<br>');
sleep(1);
Console::echo('Step 3<br>');
sleep(1);
Console::echo('Step 4<br>');
sleep(1);
sleep(1);
Console::echo('End process');
