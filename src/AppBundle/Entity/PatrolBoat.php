<?php

namespace AppBundle\Entity;

/**
 *  PatrolBoat
 */
class PatrolBoat extends Ship
{

    const SPACES = 2;
    const TYPE = "PatrolBoat";

    public function __construct() {
        parent::__construct(self::SPACES, self::TYPE);
    }
}