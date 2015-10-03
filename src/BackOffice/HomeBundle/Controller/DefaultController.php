<?php

    namespace BackOffice\HomeBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;


    /**
     * Class DefaultController
     *
     * @package BackOffice\HomeBundle\Controller
     */
    class DefaultController extends Controller
    {
        /**
         * @return \Symfony\Component\HttpFoundation\Response
         */
        public function indexAction()
        {

            $user = $this->getUser();
            var_dump($user);

            return $this->render('HomeBundle:Default:index.html.twig');
        }
    }
