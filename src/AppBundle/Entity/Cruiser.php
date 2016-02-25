<?php

namespace AppBundle\Entity;

/**
 *  Cruiser
 */
class Cruiser extends Ship
{

    const SPACES = 4;
    const TYPE = "Cruiser";

    public function __construct() {
        parent::__construct(self::SPACES, self::TYPE);
    }
}