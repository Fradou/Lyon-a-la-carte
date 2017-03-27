<?php


namespace MigrationBundle\Command;


use CarteBundle\Entity\Location;
use MigrationBundle\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetOpendataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('opendatas:pull')
            ->setDescription('Get and update datas on locations')
            ->setHelp('Use curl to get datas on locations from LyonOpenData API. No parameter or else needed.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){
        $logger = $this->getContainer()->get('monolog.logger.opendata');
        // Call service to get all datas from opendatalyon API
        $logger->info("Connecting to API");
        $rdatas = $this->getContainer()->get('app.OpenLyon_getter')->getPlaces();

        $sites = $rdatas["features"];
        $logger->info("Got places :".count($sites));
        $sitesid = [];
        foreach($sites as $site){
            $sitesid[] = $site['properties']['id_sitra1'];
        }

        $em = $this->getContainer()->get("Doctrine")->getManager();
        $emplace = $em->getRepository("MigrationBundle:Place");

        $places = $emplace->findAll();
        $placesid = [];
        foreach($places as $place){
            $placesid[] = $place->getIdSitral();
        }

        $newplaces = array_diff($sitesid, $placesid);
        $newplacekeys = [];
        foreach ($newplaces as $newplace){
       //     $newplacekeys = array_search($newplace, )
        }


        foreach ($sites as $site) {
            if($emplace->findBy(array('idopen' => $site['properties']['id']))==null ){
                $localisation = new Place();
                $localisation->setType($site['properties']['type']);
                $localisation->setTypeDetail($site['properties']['type_detail']);
                $localisation->setName($site['properties']['nom']);
                $localisation->setAddress($site['properties']['adresse']);
                $localisation->setPostalcode($site['properties']['codepostal']);
                $localisation->setTown($site['properties']['commune']);
                $localisation->setPhone($site['properties']['telephone']);
                $localisation->setMail($site['properties']['email']);
                $localisation->setWebsite($site['properties']['siteweb']);
                $localisation->setFacebook($site['properties']['facebook']);
                $localisation->setRank($site['properties']['classement']);
                $localisation->setOpenhour($site['properties']['ouverture']);
                $localisation->setRateclear($site['properties']['tarifsenclair']);
                $localisation->setMinrate($site['properties']['tarifsmin']);
                $localisation->setMaxrate($site['properties']['tarifsmax']);
                $localisation->setProducer($site['properties']['producteur']);
                $localisation->setGid($site['properties']['gid']);
                $localisation->setIdopen($site['properties']['id']);
                $localisation->setIdSitra1($site['properties']['id_sitra1']);
                $localisation->setLatitude($site['geometry']['coordinates'][1]);
                $localisation->setLongitude($site['geometry']['coordinates'][0]);

                $type = $localisation->getType();
                if($type == "PATRIMOINE_NATUREL" || $type == "PATRIMOINE_CULTUREL" || $type == "RESTAURATION" || $type== "DEGUSTATION"){
                    $location = new Location();
                    $location->setType($site['properties']['type']);
                    $location->setTypeDetail($site['properties']['type_detail']);
                    $location->setName($site['properties']['nom']);
                    $location->setAddress($site['properties']['adresse']);
                    $location->setPostalcode($site['properties']['codepostal']);
                    $location->setTown($site['properties']['commune']);
                    $location->setPhone($site['properties']['telephone']);
                    $location->setMail($site['properties']['email']);
                    $location->setWebsite($site['properties']['siteweb']);
                    $location->setFacebook($site['properties']['facebook']);
                    $location->setRank($site['properties']['classement']);
                    $location->setOpenhour($site['properties']['ouverture']);
                    $location->setRateclear($site['properties']['tarifsenclair']);
                    $location->setMinrate($site['properties']['tarifsmin']);
                    $location->setMaxrate($site['properties']['tarifsmax']);
                    $location->setProducer($site['properties']['producteur']);
                    $location->setLatitude($site['geometry']['coordinates'][1]);
                    $location->setLongitude($site['geometry']['coordinates'][0]);

                    $em->persist($location);
                }

                else if ($type == "EQUIPEMENT"){

                }

                $em->persist($localisation);
            }
        }
        $em->flush();
    }
}