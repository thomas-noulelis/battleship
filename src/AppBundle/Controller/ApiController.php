<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 *
 * @Route("api")
 */

class ApiController extends Controller
{

    /**
     * @Route("/", name="api")
     */
    public function battleshipAction()
    {
        // replace this example code with whatever you need
        return $this->render('battleship/battleship.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ));
    }


    /**
     * @Route("/country/", name="countries")
     * @Method({"GET"})
     */
    public function listCountriesAction()
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->listCountries();

        return new JsonResponse($response);


    }
    /**
     * @Route("/country/{idcountry}/", name="country")
     * @Method({"GET"})
     */
    public function getCountryAction($idcountry)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getCountry($idcountry);

        return new JsonResponse($response);
    }


    /**
     * @Route("/country/{idcountry}/ship/", name="countryship")
     * @Method({"GET"})
     */
    public function getCountryShipAction($idcountry)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getCountryShip($idcountry);

        return new JsonResponse($response);
    }
    /**
     * @Route("/country/{idcountry}/ship/ext/", name="countryship_ext")
     * @Method({"GET"})
     */
    public function getCountryShipExtAction($idcountry)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getCountryShipExt($idcountry);

        return new JsonResponse($response);
    }



    /**
     * @Route("/ship/", name="ships")
     * @Method({"GET"})
     */
    public function listShipAction()
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apiship')->getAllShips();

        return new JsonResponse($response);
    }
    /**
     * @Route("/ship/{typeofship}/", name="typeofship")
     * @Method({"GET"})
     */
    public function getTypeOfShipAction($typeofship)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apiship')->getTypeOfShip($typeofship);

        return new JsonResponse($response);
    }
    /**
     * @Route("/ship={oneship}/", name="oneship")
     * @Method({"GET"})
     */
    public function getOneShipAction($oneship)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apiship')->getOneShip($oneship);

        return new JsonResponse($response);
    }


    /**
     * @Route("/all", name="all")
     * @Method({"GET"})
     */
    public function getAllAction()
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getAll();

        return new JsonResponse($response);
    }


    /**
     * @Route("/test", name="test")
     * @Method({"GET"})
     */
    public function testAction()
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apiship')->test();

        return new JsonResponse($response);

    }

}
