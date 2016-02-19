<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apiship
 *
 * @ORM\Table(name="apiShip")
 * @ORM\Entity
 */
class Apiship
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ship", type="string", length=255, nullable=false)
     */
    private $ship;

    /**
     * @var integer
     *
     * @ORM\Column(name="size", type="integer", nullable=false)
     */
    private $size;

    /**
     * @var integer
     *
     * @ORM\Column(name="radius_attack", type="integer", nullable=false)
     */
    private $radiusAttack;

    /**
     * @var integer
     *
     * @ORM\Column(name="country", type="integer", nullable=false)
     */
    private $country;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ship
     *
     * @param string $ship
     *
     * @return Apiship
     */
    public function setShip($ship)
    {
        $this->ship = $ship;

        return $this;
    }

    /**
     * Get ship
     *
     * @return string
     */
    public function getShip()
    {
        return $this->ship;
    }

    /**
     * Set size
     *
     * @param integer $size
     *
     * @return Apiship
     */
    public function setSize($size)
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Get size
     *
     * @return integer
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set radiusAttack
     *
     * @param integer $radiusAttack
     *
     * @return Apiship
     */
    public function setRadiusAttack($radiusAttack)
    {
        $this->radiusAttack = $radiusAttack;

        return $this;
    }

    /**
     * Get radiusAttack
     *
     * @return integer
     */
    public function getRadiusAttack()
    {
        return $this->radiusAttack;
    }

    /**
     * Set country
     *
     * @param integer $country
     *
     * @return Apiship
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return integer
     */
    public function getCountry()
    {
        return $this->country;
    }
}
