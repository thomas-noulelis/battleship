<?php

namespace AppBundle\Entity;

/**
 *  Destroyer
 */
class Destroyer extends Ship
{
<<<<<<< HEAD

    const SPACES = 3;
    const TYPE = "Destroyer";
=======
    /**
     * @var int
     *
     * @ORM\Column(type="integer", length=2)
     */
    const SPACES = 4;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=20)
     */
    const NAME = "Destroyer";
>>>>>>> refs/remotes/origin/PHPUnit

    public function __construct() {
        parent::__construct(self::SPACES, self::TYPE);
    }
}