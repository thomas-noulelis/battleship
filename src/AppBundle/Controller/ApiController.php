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
     * @Route("/", name="battleship")
     */
    public function battleshipAction(Request $request)
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
    public function listCountriesAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->listCountries();

        return new JsonResponse($response);


    }
    /**
     * @Route("/country/{idcountry}/", name="country")
     * @Method({"GET"})
     */
    public function getCountryAction(Request $request, $idcountry)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getCountry($idcountry);

        return new JsonResponse($response);
    }


    /**
     * @Route("/country/{idcountry}/ship/", name="countryship")
     * @Method({"GET"})
     */
    public function getCountryShipAction(Request $request, $idcountry)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getCountryShip($idcountry);

        return new JsonResponse($response);
    }
    /**
     * @Route("/country/{idcountry}/ship/ext/", name="countryship_ext")
     * @Method({"GET"})
     */
    public function getCountryShipExtAction(Request $request, $idcountry)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getCountryShipExt($idcountry);

        return new JsonResponse($response);
    }




    /**
     * @Route("/ship/", name="ships")
     * @Method({"GET"})
     */
    public function listShipAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apiship')->getAllShips();

        return new JsonResponse($response);
    }
    /**
     * @Route("/ship/{ship}/", name="ship")
     * @Method({"GET"})
     */
    public function getShipAction(Request $request, $ship)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apiship')->getShip($ship);

        return new JsonResponse($response);
    }




    /**
     * @Route("/all", name="all")
     * @Method({"GET"})
     */
    public function getAllAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();

        $response = $em->getRepository('AppBundle:Apicountry')->getAll();

        return new JsonResponse(dump($response));
    }

}