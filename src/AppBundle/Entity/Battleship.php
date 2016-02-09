<?php

namespace AppBundle\Entity;

/**
 *  Battleship
 */
class Battleship extends Ship
{

    const SPACES = 5;
    const NAME = "Battleship";

    public function __construct() {
        parent::__construct(self::SPACES, self::NAME);
    }
}