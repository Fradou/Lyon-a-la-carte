<?php

namespace CarteBundle\Controller;

use CarteBundle\Repository\CircuitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        return $this->render('Main/index.html.twig', array(
            // ...
        ));
    }

    public function rankingAction()
    {
        return $this->render('Main/ranking.html.twig', array(
            // ...
        ));
    }

    public function tourchoiceAction()
    {
        $data = [];
      //  $data['category'] = "ALL";
        $data['postalcode'] = ['69001', '69003', '69002'];
     //   $data['notation'] = 1;


        /**
         * @var $repository CircuitRepository
         */
        $repository = $this->getDoctrine()->getRepository('CarteBundle:Circuit');
        $circuitchosen = $repository->circuitSearching($data);

        return $this->render('Main/tourchoice.html.twig', array(
            'circuits' => $circuitchosen
            // ...
        ));
    }

    public function circuitDisplayAction($idc)
    {
        $circuit = $this->getDoctrine()->getManager()->getRepository("CarteBundle:Circuit")->find($idc);
        $locations = $circuit->getLocations();

        return $this->render('Main/circuitdisplay.html.twig', array(
            'locations' => $locations,
        ));

    }

}
