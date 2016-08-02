<?php

namespace Advertisement\AdvertisementBundle\Controller;

use Advertisement\AdvertisementBundle\Entity\Advertisement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


/**
 * Class AdvertisementController
 *
 * @package Advertisement\AdvertisementBundle\Controller;
 */
class AdvertisementController extends Controller
{
	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
	 */
	public function ViewAdvertisementAction()
	{
		$categories = $this->container->get('home_home.services.datamanagement')->getCategories();

		//$Subcategories = $this->container->get('home_home.services.datamanagement')->getSubcategoriesAndCategories();

		return $this->render('AdvertisementBundle:Advertisement:ViewAdvertisement.html.twig', ['categories' => $categories]);
	}

	/**
	 *
	 * @param $id
	 * @return JsonResponse
	 * @throws \Exception
	 */
	public function GetSubcategoriesByIdAction($id)
	{
		$Subcategories      = $this->container->get('home_home.services.datamanagement')->getSubcategoriesByIdCategory($id);
		$SubcategoriesArray = [];

		foreach ($Subcategories as $subcategory)
		{
			$SubcategoriesArray[$subcategory->getId()] = $subcategory->getName();
		}

		$response = new JsonResponse();

		return $response->setData(['Subcategories' => $SubcategoriesArray]);
	}

	/**
	 * Method redirect to function entities selected
	 *
	 * @param Request $request
	 * @param null $id
	 * @return string|Response
	 * @throws \InvalidArgumentException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
	 */
	public function RouterFunctionByEntitiesAction(Request $request, $id = null)
	{

		$subcategories = $this->container->get('home_home.services.datamanagement')->getSubcategoriesById($id);
		$json = 0;

		switch ($subcategories->getUniquename())
		{
			case 'car':
				$json = $this->NewAction($request, 'Advertisement\AdvertisementBundle\Form\AdvertisementType');
				break;

			default:
		}

		$response = new Response($json, 200);
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}

	/**
	 * Creates a new advert entity.
	 *
	 * @param Request $request
	 * @param $form
	 * @return Response
	 * @throws \InvalidArgumentException
	 * @internal param null $id
	 */
	private function NewAction(Request $request, $form)
	{
		$advert  = new Advertisement();
		$form = $this->createForm($form, $advert);
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
		else //affichage du formulaire
		{
			$data = $this->renderView('AdvertisementBundle:Advertisement:new.html.twig', ['advert' => $advert, 'form' => $form->createView()]);
		}

		return json_encode($data);
	}

}
