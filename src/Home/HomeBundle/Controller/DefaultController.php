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
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function indexAction()
        {
            return $this->render('HomeBundle:Default:index.html.twig');
        }
    }
