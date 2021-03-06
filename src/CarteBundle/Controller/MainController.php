<?php

namespace CarteBundle\Controller;

use CarteBundle\CarteBundle;
use CarteBundle\Entity\Circuit;
use CarteBundle\Entity\Location;
use CarteBundle\Entity\Position;
use CarteBundle\Repository\CircuitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

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

    public function generatorAction(Request $request)
    {
        $session = $request->getSession();
        $data =$session->get('searchParam');

        $repository = $this->getDoctrine()->getRepository('CarteBundle:Location');

        // Research for general locations based on criter selected
        $locations = $repository->searchloca($data['categories'], $data['localisations']);

        // Get n locations in those corresponding to criters
        $locakeyselect = array_rand($locations, $data['steps']);
        $circuitgen = [];
        foreach ($locakeyselect as $key => $value) {
            $circuitgen[] = $locations[$value];
        }

        // Initiate circuit and set number of steps
        $circuit = new Circuit();
        $circuit->setSteps($data['steps']);


        // Research for restaurants if option is selected
        if ( $data['restaurant'] == 1 ) {
            // Restaurant corresponding to search criteria
            $restaurants = $repository->searchloca(['RESTAURATION'], $data['localisations']);

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

            // Also update circuit steps to include restaurant
            $circuit->setSteps($data['steps']+1);
        }

        // Create collection of positions to include in circuittype
        $i=1;
        foreach ($circuitgen as $circuitsteps){
            $pos = new Position();
            $pos->setPos($i);
            $pos->setLocation($circuitsteps);
            $pos->setCircuit($circuit);
            $circuit->getPositions()->add($pos);
            $i++;
        }

        $form = $this->createForm('CarteBundle\Form\CircuitType', $circuit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($circuit);
            $em->flush($circuit);

            return $this->redirectToRoute('circuit_show', array('id' => $circuit->getId()));
        }

        return $this->render('Main/circuitdisplay.html.twig', array(
            'locations' => $circuitgen,
            'form' => $form->createView()
        ));
    }

    public function newGeneratorAction(Request $request)
    {
        // Get list of all postal code in locations and transform it for form format
        $postalcodes = [];
        $postal = $this->getDoctrine()->getRepository("CarteBundle:Location")->getAllPostalCodes();
        foreach ($postal as $value){
            $postalcodes[$value['postalcode']] = $value['postalcode'];
        }

        // Get list of all types of locations and transform it for form format
        $types = [];
        $typ = $this->getDoctrine()->getRepository("CarteBundle:Location")->getAllTypes();
        foreach ($typ as $value){
            $types[$value['type']] = $value['type'];
        }

        $form = $this->createForm('CarteBundle\Form\GeneratorType', null, array('postalcodes'=>$postalcodes, 'types' => $types));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $criterias = $form->getData();
            $data = [];
            foreach ($criterias as $key => $value){
                if(isset($criterias[$key])){
                    $data[$key] = $value;
                }
            }

            $session = $request->getSession();
            $session->set('searchParam', $data);

            return $this->redirectToRoute('generator');
        }

        // Checking if there is already some search parameter registered in session and load it into form if exists
        $session = $request->getSession();
        if($session->get('searchParam')!= null){
            $field = $session->get('searchParam');
            foreach($field as $key=>$value){
            $form->get($key)->setData($field[$key]);
            }
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
