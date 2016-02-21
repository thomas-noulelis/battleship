<?php

namespace AppBundle\Entity;

/**
 *  Destroyer
 */
class Destroyer extends Ship
{

    const SPACES = 3;
    const TYPE = "Destroyer";

    public function __construct() {
        parent::__construct(self::SPACES, self::TYPE);
    }
}