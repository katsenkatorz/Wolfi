<?php

namespace Home\HomeBundle\Controller;

use Advertisement\AdvertisementBundle\Entity\ObjectToSell;
use Proxies\__CG__\Advertisement\AdvertisementBundle\Entity\Advertisement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class DefaultController
 *
 * @package Home\HomeBundle\Controller
 */
class DefaultController extends Controller
{
	/**
	 * Method of load the home site with all adverts
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
	 */
	public function indexAction()
	{
		$adverts = $this->container->get('home_home.services.datamanagement')->getAdverts();

		return $this->render('HomeBundle:Default:index.html.twig', ['adverts' => $adverts]);
	}

	/**
	 * @param $id_advert
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException
	 * @throws \Symfony\Component\DependencyInjection\Exception\ServiceCircularReferenceException
	 */
	public function showAdvertisementAction($id_advert)
	{
		$advert = $this->container->get('home_home.services.datamanagement')->getAdvertById($id_advert)[0];
		$uniqueName = $advert->getSubcategory()->getUniqueName();

		return $this->render('HomeBundle:Advertisement:show_' . $uniqueName . '.html.twig', ['advert' => $advert]);
	}
}
