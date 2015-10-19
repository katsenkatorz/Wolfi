<?php

namespace User\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


/**
 * Class DefaultController
 *
 * @package User\UserBundle\Controller
 */
class DefaultController extends Controller
{
    /**
     * @param $name
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction($name)
    {
        return $this->render('UserBundle:Default:index.html.twig', array('name' => $name));
    }
}
