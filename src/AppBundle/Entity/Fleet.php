<?php

// src/AppBundle/Entity/Fleet.php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
/**
 *  Fleet
 */

class Fleet
{
    /**
     * @Assert\NotBlank()
     */
    protected $cname;


    public function getCname()
    {
        return $this->cname;
    }

    public function setCname($cname)
    {
        $this->cname = $cname;
    }



}