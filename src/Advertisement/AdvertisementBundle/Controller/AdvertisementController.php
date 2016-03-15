<?php

namespace Advertisement\AdvertisementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;


/**
 * Class AdvertisementController
 *
 * @package Advertisement\AdvertisementBundle\Controller;
 */
class AdvertisementController extends Controller
{
	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function NewAdvertisementAction()
	{

		$categories    = $this->container->get('home_home.services.datamanagement')->getCategories();
		$Subcategories = $this->container->get('home_home.services.datamanagement')->getSubcategoriesAndCategories();

		return $this->render('AdvertisementBundle:Advertisement:NewAdvertisement.html.twig', [ 'categories' => $categories, 'Subcategories' => $Subcategories]);
	}


	/**
	 *
	 * @param $id
	 * @return JsonResponse
	 * @throws \Exception
	 */
	public function GetSubcategoriesByIdAction($id)
	{
		$Subcategories = $this->container->get('home_home.services.datamanagement')->getSubcategoriesByIdCategory($id);

		foreach ($Subcategories as $subcategory)
		{
			$SubcategoriesArray[$subcategory->getId()] = $subcategory->getName();
		}

		$response = new JsonResponse();
		return $response->setData(['Subcategories' => $SubcategoriesArray]);
	}
}
