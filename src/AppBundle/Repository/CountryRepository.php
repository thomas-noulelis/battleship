<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class CountryRepository extends EntityRepository
{


    public function listCountries()
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT c FROM AppBundle:Apicountry c');

        return $query->getArrayResult();

    }


   public function getCountry($country)
    {

        $em = $this->getEntityManager();

        $query = $em
            ->createQuery('SELECT c FROM AppBundle:Apicountry c WHERE c.name = :name')
            ->setParameter('name', $country);

        return $query->getArrayResult();

    }

}