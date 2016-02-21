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
    public function getTypeOfShip($ship)
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT g FROM AppBundle:Apiship g WHERE g.type = :type')
            ->setParameter('type', $ship);

        return $query->getArrayResult();

    }

    // get one ship
    public function getOneShip($oneship)
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT o FROM AppBundle:Apiship o WHERE o.name = :name')
            ->setParameter('name', $oneship);

        return $query->getArrayResult();

    }

    // test
    public function test()
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery("SELECT s.name FROM AppBundle:Apiship s WHERE s.type = 'destroyer'");

        return $query->getArrayResult();

    }

}