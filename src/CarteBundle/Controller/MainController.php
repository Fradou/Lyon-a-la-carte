<?php

namespace CarteBundle\Controller;

use CarteBundle\CarteBundle;
use CarteBundle\Repository\CircuitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MainController extends Controller{
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
        $data = unserialize($data);

        $repository = $this->getDoctrine()->getRepository('CarteBundle:Location');

        // Research for general locations based on criter selected
        $locations = $repository->searchloca($data['category']);

        // Get n locations in those corresponding to criters
        $locakeyselect = array_rand($locations, $data['steps']);
        $circuitgen = [];
        foreach ($locakeyselect as $key => $value) {
            $circuitgen[] = $locations[$value];
        }

        // Research for restaurants if option is selected
        if ( $data['restaurant'] == 1 ) {
            // Restaurant corresponding to search criteria
            $restaurants = $repository->searchloca('RESTAURATION');

            // Random select of one restaurant
            $restkeyselect = array_rand($restaurants, 1);
            $restselect = $restaurants[$restkeyselect];

            // Get half steps of circuit
            $stepsnb = $data['steps'];
            $restpos = round($stepsnb / 2, 0, PHP_ROUND_HALF_DOWN);

            // Include restaurant at half circuit
            $circuitgen1 = array_slice($circuitgen,0,$restpos);
            $circuitgen2 = array_slice($circuitgen, $restpos);
            $circuitgen1[]=$restselect;
            $circuitgen = array_merge($circuitgen1, $circuitgen2);
        }

        return $this->render('Main/circuitdisplay.html.twig', array(
            'locations' => $circuitgen
        ));
    }

    public function newGeneratorAction(Request $request){

        $defaultdata = array('message' => 'Type your message here');
        $form = $this->createForm('CarteBundle\Form\GeneratorType', $defaultdata);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $criterias = $form->getData();
            $data = [];
            foreach ($criterias as $key => $value){
                if(isset($criterias[$key])){
                    $data[$key] = $value;
                }
            }

            $data = serialize($data);

            return $this->redirectToRoute('generator', array('data' => $data));
        }

        return $this->render('Main/newgenerator.html.twig', array(
            'form' => $form->createView(),
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
