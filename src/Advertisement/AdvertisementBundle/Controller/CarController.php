<?php

namespace Advertisement\AdvertisementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Advertisement\AdvertisementBundle\Entity\Car;
use Symfony\Component\HttpFoundation\Response;

/**
 * Car controller.
 *
 */
class CarController extends Controller
{


    /**
     * Creates a new Car entity.
     *
     */
    public function newAction(Request $request)
    {
	    $car  = new Car();
	    $form = $this->createForm('Advertisement\AdvertisementBundle\Form\CarType', $car);
	    $form->handleRequest($request);

	    //Enregistrement du formulaire
	    if ($form->isSubmitted() && $form->isValid())
	    {
		    $em = $this->getDoctrine()->getManager();
		    $em->persist($car);
		    $em->flush();

		    $data = ['id' => $car->getId()];
	    }
	    else
	    {
		    //affichage du formulaire
		    $data = $this->renderView('AdvertisementBundle:car:new.html.twig', ['car' => $car, 'form' => $form->createView()]);
	    }

	    $json     = json_encode($data);
	    $response = new Response($json, 200);
	    $response->headers->set('Content-Type', 'application/json');

	    return $response;
    }
}
