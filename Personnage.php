<?php

// Création de la classe Personnage
class Personnage
{

    // Définition des Propriétés de Personnage : 
    // caractéristiques qui vont caractériser notre objet
    private $vie = 80;
    private $atk = 20;
    private $nom;

    // Lorsqu'on instance notre classe on fait appel à un constructeur (ça appelle une fonction __construct)
    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getNom()
    {
        return $this->nom;
    }
    

    public function getVie()
    {
        return $this->vie;
    }

    public function getAtk()
    {
        return $this->atk;
    }

    public function regenerer($vie = null)
    {
        // Si le nombre de vie est null on lui donne 100 vie
        if (is_null($vie)) {
            $this->vie = 100;
        } else {
            $this->vie += $vie;
        }
    }

    public function mort()
    {
        // Retourne true si vie <= 0
        return $this->vie <= 0;
    }

    private function empecherNegatif()
    {
        if ($this->vie < 0) {
            $this->vie = 0;
        }
    }

    public function attaque($cible)
    {
        // $this // Attaquant
        // $cible // Defenseur
        // defenseur.vie -= attaquant.atk

        $cible->vie -= $this->atk;

        var_dump($cible);
    }
}
