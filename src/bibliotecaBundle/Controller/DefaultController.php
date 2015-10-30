<?php

namespace bibliotecaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('bibliotecaBundle:Default:index.html.twig');
    }
}
