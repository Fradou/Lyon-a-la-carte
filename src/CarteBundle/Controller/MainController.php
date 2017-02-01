<?php

namespace CarteBundle\Controller;

use CarteBundle\CarteBundle;
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

    public function generatorAction($data)
    {
        $repository = $this->getDoctrine()->getRepository('CarteBundle:Location');

        // Research for general locations based on criter selected
        $locations = $repository->searchloca('PATRIMOINE_CULTUREL');  // replace parameter later

        // Get n locations in those corresponding to criters
        $locakeyselect = array_rand($locations, 4 /* $data['steps'] */);  // replace parameter later
        $circuitgen = [];
        foreach ($locakeyselect as $key => $value) {
            $circuitgen[] = $locations[$value];
        }

        // Research for restaurants if option is selected
        if ( true/*isset($data['meal'])*/) {                            // replace parameter later
            // Restaurant corresponding to search criteria
            $restaurants = $repository->searchloca('RESTAURATION');

            // Random select of one restaurant
            $restkeyselect = array_rand($restaurants, 1);
            $restselect = $restaurants[$restkeyselect];

            // Get half steps of circuit
            $stepsnb = 4 /*$data['steps']*/;                            // replace parameter later
            $restpos = round($stepsnb / 2, 0, PHP_ROUND_HALF_DOWN);

            // Include restaurant at half circuit
            $circuitgen1 = array_slice($circuitgen,0,$restpos);
            $circuitgen2 = array_slice($circuitgen, $restpos);
            $circuitgen1[]=$restselect;
            $circuitgen = array_merge($circuitgen1, $circuitgen2);
        }

        return $this->render('Main/circuitdisplay.html.twig', array(
            'locations' => $circuitgen
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
