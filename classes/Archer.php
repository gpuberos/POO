<?php

class Archer extends Character
{
    public $life = 40;

    public function __construct($name)
    {
        $this->life = $this->life / 2;
        parent::__construct($name);
    }

    public function attack($target)
    {
        $target->life -= $this->atk;
        parent::attack($target);
    }
}
