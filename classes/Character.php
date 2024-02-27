<?php

// Création de la classe Character
class Character
{

    protected static $maxLife = 120;
    // Définition des Propriétés de Character : 
    // caractéristiques qui vont caractériser notre objet
    protected $life = 80;
    protected $atk = 20;
    protected $name;

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

    protected function preventNegative()
    {
        if ($this->life < 0) {
            $this->life = 0;
        }
    }

    public function attack($target)
    {
        $target->life -= $this->atk;
        $target->preventNegative();
    }
}
