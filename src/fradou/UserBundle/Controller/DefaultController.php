<?php

namespace fradou\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('fradouUserBundle:Default:index.html.twig');
    }
}
