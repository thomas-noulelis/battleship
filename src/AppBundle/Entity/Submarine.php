<?php

namespace AppBundle\Entity;

/**
 *  Submarine
 */
class Submarine extends Ship
{

    const SPACES = 3;
    const TYPE = "Submarine";

    public function __construct() {
        parent::__construct(self::SPACES, self::TYPE);
    }
}