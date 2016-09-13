<?php

namespace Advertisement\AdvertisementBundle\Controller;

use Administration\AdminBundle\Entity\Subcategory;
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
	 * Return view with all category
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
	 */
	public function ViewAdvertisementAction()
	{
		$categories = $this->container->get('home_home.services.datamanagement')->getCategories();

		return $this->render('AdvertisementBundle:Advertisement:ViewAdvertisement.html.twig', ['categories' => $categories]);
	}

	/**
	 * Method to load subcategories with id category
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
	 * @throws \LogicException
	 * @throws \InvalidArgumentException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
	 */
	public function RouterFunctionByEntitiesAction(Request $request, $id = null)
	{

		$subcategory = $this->container->get('home_home.services.datamanagement')->getSubcategoriesById($id);
		$json          = 0;


		switch ($subcategory->getUniquename())
		{
			case 'car':
				$json = $this->NewAction($request, 'Advertisement\AdvertisementBundle\Form\AdvertisementType', $subcategory);
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
	 * @param $subcategory
	 * @return Response
	 * @throws \LogicException
	 * @internal param null $id
	 */
	private function NewAction(Request $request, $form, $subcategory)
	{
		$advert = new Advertisement();
		$form   = $this->createForm($form, $advert);
		$form->handleRequest($request);

		//Save form if valid and submit
		if ($form->isSubmitted() && $form->isValid())
		{
			$date = new \DateTime('now');
			$advert->setDateAdd($date);
			$advert->setSubcategory($subcategory);
			$em = $this->getDoctrine()->getManager();
			$em->persist($advert);
			$em->flush();

			$data = ['id' => $advert->getId()];
		}
		else //show form
		{
			$data = $this->renderView('AdvertisementBundle:Advertisement:new.html.twig', ['advert' => $advert, 'form' => $form->createView()]);
		}

		return json_encode($data);
	}

}
