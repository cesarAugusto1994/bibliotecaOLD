<?php

namespace bibliotecaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('bibliotecaBundle:Default:index.html.twig', array('name' => $name));
    }
}
