<?php

namespace VinC2C\LandingPageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VinC2CLandingPageBundle:Default:index.html.twig', array('name' => $name));
    }
}
