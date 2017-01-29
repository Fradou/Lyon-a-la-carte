<?php

namespace CarteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('CarteBundle:Main:index.html.twig', array(
            // ...
        ));
    }

    public function rankingAction()
    {
        return $this->render('CarteBundle:Main:ranking.html.twig', array(
            // ...
        ));
    }

    public function tourchoiceAction()
    {
        return $this->render('CarteBundle:Main:tourchoice.html.twig', array(
            // ...
        ));
    }

}
