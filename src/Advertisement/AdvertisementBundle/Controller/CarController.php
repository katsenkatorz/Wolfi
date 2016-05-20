<?php

namespace Advertisement\AdvertisementBundle\Controller;

use Proxies\__CG__\Administration\AdminBundle\Entity\Subcategory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Advertisement\AdvertisementBundle\Entity\Car;
use Advertisement\AdvertisementBundle\Entity\Advertisement;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


/**
 * Car controller.
 *
 */
class CarController extends Controller
{
	/**
	 * Creates a new Car entity.
	 *
	 * @param Request $request
	 * @return Response
	 * @throws \LogicException
	 * @throws \InvalidArgumentException
	 * @internal param null $id
	 */
	public function newAction(Request $request)
	{
		$advert  = new Advertisement();
		$form = $this->createForm('Advertisement\AdvertisementBundle\Form\AdvertisementType', $advert);
		$form->handleRequest($request);

		//Enregistrement du formulaire
		if ($form->isSubmitted() && $form->isValid())
		{
			$date = new \DateTime();
			$advert->setDateAdd($date);

			$em = $this->getDoctrine()->getManager();
			$em->persist($advert);
			$em->flush();

			$data = ['id' => $advert->getId()];
		}
		else
		{
			//affichage du formulaire
			$data = $this->renderView('AdvertisementBundle:car:new.html.twig', ['advert' => $advert, 'form' => $form->createView()]);
		}

		$json     = json_encode($data);
		$response = new Response($json, 200);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}

}
