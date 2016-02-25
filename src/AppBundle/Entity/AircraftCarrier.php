<?php

namespace AppBundle\Entity;

/**
 *  AircraftCarrier
 */
class AircraftCarrier extends Ship
{

    const SPACES = 5;
    const TYPE = "AircraftCarrier";

    public function __construct() {
        parent::__construct(self::SPACES, self::TYPE);
    }
}