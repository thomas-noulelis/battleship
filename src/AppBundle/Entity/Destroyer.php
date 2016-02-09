<?php

namespace AppBundle\Entity;

/**
 *  Destroyer
 */
class Destroyer extends Ship
{

    const SPACES = 4;
    const NAME = "Destroyer";

    public function __construct() {
        parent::__construct(self::SPACES, self::NAME);
    }
}