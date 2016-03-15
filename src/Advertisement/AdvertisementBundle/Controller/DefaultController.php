<?php

namespace Advertisement\AdvertisementBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdvertisementBundle:Default:index.html.twig');
    }
}
