<?php

    namespace Home\HomeBundle\Controller;

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

        public function showAdvertisementAction ($id_advert)
	  {

		return$this->render('HomeBundle:Advertisement:show.html.twig');
	  }
    }
