<?php

require __DIR__ . '/classes/Character.php';
require __DIR__ . '/classes/Archer.php';

$merlin = new Character('Merlin');
$harry = new Character('Harry');
$degolas = new Archer('Degolas');

$degolas->attack($harry);

var_dump($merlin, $harry, $degolas);

// $merlin = new Character('Merlin');
// $merlin->regenerate();

// var_dump($merlin);