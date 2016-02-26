<?php
namespace AppBundle\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Fleet;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Intl\Intl;




/**
 *
 * @Route("api")
 */

class FormController extends Controller
{

    /**
     * @Route("/form", name="form")
     *
     */
    public function newAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $fleet = new Fleet();
        $fleet->setCname('Country Name');
        $countries = Intl::getRegionBundle()->getCountryNames();

        $form = $this->createFormBuilder($fleet)
       
            ->add('cname', 'text', array('label' => ' '))
            ->add('save', 'submit', array('label' => 'Create Fleet'))
            ->getForm();



        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            // SAVING the Fleet in the database
            echo "Saving Fleet To DataBase : <b style='color:#17a21a;'>SUCCESS</b>";


            return $this->render('battleship/success.html.twig', array(
                'form' => $form->createView()));
        }
        else    {
           // echo "Saving Fleet To DataBase : <b style='color:red;'>FAIL</b>, please try again and fill out all the fields of the form.";
            return $this->render('battleship/fleet.html.twig', array(
                'form' => $form->createView(),
            ));

        }





    }
}


