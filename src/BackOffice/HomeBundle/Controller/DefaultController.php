<?php

namespace BackOffice\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        var_dump($_SESSION);
        return $this->render('HomeBundle:Default:index.html.twig');
    }
}
