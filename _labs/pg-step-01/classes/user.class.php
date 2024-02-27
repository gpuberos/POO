<?php

// Classe mère
class User
{
    // Déclaration des propriétés de notre classe Utilisateur
    // Private : propriétés accessible uniquement depuis l'intérieur de la classe
    protected $user_name;
    protected $user_pass;

    public function __construct($n, $p)
    {
        $this->user_name = $n;
        $this->user_pass = $p;
    }

    public function __destruct()
    {
        //Du code à exécuter
    }

    // Méthode getters : récupérer des valeurs
    public function getName()
    {
        // $this (pseudo-variable) qui sert à faire référence à l'objet intancié
        return $this->user_name;
    }

}
