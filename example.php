<?php

namespace Tutorial;

require __DIR__ . '/classes/Autoloader.php';

use \Tutorial\Autoloader;

// require __DIR__ . '/classes/Character.php';
// require __DIR__ . '/classes/Archer.php';

Autoloader::register();

$merlin = new Character('Merlin');
$harry = new Character('Harry');
$degolas = new Archer('Degolas');

$degolas->attack($harry);

var_dump($merlin, $harry, $degolas);

new \DateTime();

// $merlin = new Character('Merlin');
// $merlin->regenerate();

// var_dump($merlin);