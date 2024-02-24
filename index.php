<?php

require 'Personnage.php';

// Création d'un nouveau personnage (nouvelle instance de Personnage)
$merlin = new Personnage("Merlin");
$harry = new Personnage("Harry");

$merlin->attaque($harry);

if ($harry->mort()) {
    echo 'Harry est mort';
} else {
    echo 'Harry a survécu avec ' . $harry->getVie();
}

var_dump($merlin);
var_dump($harry);

echo $merlin->getNom();