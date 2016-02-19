<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ApishipRepository extends EntityRepository
{


    public function getAllShips()
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT s FROM AppBundle:Apiship s');

        return $query->getArrayResult();

    }

    public function getShip($ship)
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT g FROM AppBundle:Apiship g WHERE g.ship = :genre')
            ->setParameter('genre', $ship);

        return $query->getArrayResult();

    }

}