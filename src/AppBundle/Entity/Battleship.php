<?php

namespace AppBundle\Entity;

/**
 *  Battleship
 */
class Battleship extends Ship
{
    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=2)
     */
    const SPACES = 5;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20)
     */
    const NAME = "Battleship";

    public function __construct() {
        parent::__construct(self::SPACES, self::NAME);
    }
}