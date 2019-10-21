<?php

use Bpstr\Components\Bootstrap\Component\Alert;
use Bpstr\Components\Bootstrap\Component\Badge;
use Bpstr\Components\Bootstrap\Contextual;

require_once "vendor/autoload.php";

echo Contextual::warning();

//echo new Alert('A simple primary alert—check it out!');

echo Badge::primary('Primary')->href('#');
