<?php

// Création de la classe Character
class Character
{

    private static $maxLife = 120;
    // Définition des Propriétés de Character : 
    // caractéristiques qui vont caractériser notre objet
    private $life = 20;
    private $atk = 20;
    private $name;

    // Lorsqu'on instance notre classe on fait appel à un constructeur (ça appelle une fonction __construct)
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
    

    public function getLife()
    {
        return $this->life;
    }

    public function getAtk()
    {
        return $this->atk;
    }

    public function regenerate($life = null)
    {
        // Si le nombre de life est null on lui donne 100 life
        if (is_null($life)) {
            $this->life = self::$maxLife;
        } else {
            $this->life += $life;
        }
    }

    public function dead()
    {
        // Retourne true si life <= 0
        return $this->life <= 0;
    }

    private function empecherNegatif()
    {
        if ($this->life < 0) {
            $this->life = 0;
        }
    }

    public function attack($target)
    {
        // $this // Attaquant
        // $cible // Defenseur
        // defenseur.life -= attaquant.atk

        $target->life -= $this->atk;

        var_dump($target);
    }
}
