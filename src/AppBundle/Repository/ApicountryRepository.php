<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ApicountryRepository extends EntityRepository
{
    //list all countries+ships
    public function getAll()
     {

         $em = $this->getEntityManager();

         $query = $em
             ->createQuery('SELECT c,s FROM AppBundle:apiCountry c, AppBundle:Apiship s WHERE s.idcountry = c.id');

         return $query->getArrayResult();

     }

    //list all countries
    public function listCountries()
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT c FROM AppBundle:Apicountry c');

        return $query->getArrayResult();

    }

    //get selected country
    public function getCountry($idcountry)
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT c FROM AppBundle:Apicountry c WHERE c.id = :id')
            ->setParameter('id', $idcountry);

        return $query->getArrayResult();

    }

    //list ships of selected country
    public function getCountryShip($idcountry)
     {

         $em = $this->getEntityManager();

         $query = $em
             ->createQuery("SELECT s FROM AppBundle:Apiship s WHERE s.idcountry = :id")
             ->setParameter('id', $idcountry);

         return $query->getArrayResult();

     }

    //list ships of selected country+country
    public function getCountryShipExt($idcountry)
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery("SELECT c,s FROM AppBundle:apiCountry c, AppBundle:Apiship s WHERE s.idcountry = c.id AND c.id = :id")
            ->setParameter('id', $idcountry);

        return $query->getArrayResult();

    }

}