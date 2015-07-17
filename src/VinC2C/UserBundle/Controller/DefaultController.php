<?php

namespace VinC2C\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VinC2CUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
