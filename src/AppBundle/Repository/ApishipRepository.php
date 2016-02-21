<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ApishipRepository extends EntityRepository
{

    // get all ships
    public function getAllShips()
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT s FROM AppBundle:Apiship s');

        return $query->getArrayResult();

    }
    // get ship by type
    public function getShip($ship)
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT g FROM AppBundle:Apiship g WHERE g.type = :type')
            ->setParameter('type', $ship);

        return $query->getArrayResult();

    }

}