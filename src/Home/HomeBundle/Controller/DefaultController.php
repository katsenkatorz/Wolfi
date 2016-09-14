<?php

namespace Home\HomeBundle\Controller;



use Home\HomeBundle\Form\SearchFormType;
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

		$form = $this->createForm(new SearchFormType());

		return $this->render('HomeBundle:Default:index.html.twig', ['adverts' => $adverts, 'form' => $form->createView()]);
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

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
	 */
	public function searchAction()
	{
		$form = $this->createForm(new SearchFormType());
		if ($this->get('request')->getMethod() === 'POST')
		{
			$form->bind($this->get('request'));
			$queryFromClient = $form['search']->getData();
			$adverts = $this->container->get('home_home.services.datamanagement')->getAdvertsWithWhere($queryFromClient);
		}
		else
		{
			throw $this->createNotFoundException('La page n\'existe pas.');
		}


		return $this->render('HomeBundle:Default:index.html.twig', ['adverts' => $adverts, 'form' => $form->createView()]);
	}
}
