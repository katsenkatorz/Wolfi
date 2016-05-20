<?php

namespace Advertisement\AdvertisementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


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
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
	 */
	public function RouterFunctionByEntitiesAction(Request $request, $id = null)
	{
		$subcategories = $this->container->get('home_home.services.datamanagement')->getSubcategoriesById($id);
		switch ($subcategories->getUniquename())
		{
			case 'car':
				$this->CarAction($request, $id);
				break;

			default:
		}
	}

	private function CarAction(Request $request, $id = null)
	{

	}


}
