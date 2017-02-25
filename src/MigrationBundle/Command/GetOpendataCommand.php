<?php


namespace MigrationBundle\Command;


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

        // Call service to get all datas from opendatalyon API
        $rdatas = $this->getContainer()->get('app.OpenLyon_getter')->getPlaces();
        $output->writeln("j'ai mes raws");
        $output->writeln($this->varDumpToString($rdatas));

        $sites = $rdatas["features"];

        $output->writeln("j'ai mes raws 2 ");
        $em = $this->getContainer()->get("Doctrine")->getManager();
        foreach ($sites as $site) {
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
            $localisation->setLatitude($site['geometry']['coordinates'][1]);
            $localisation->setLongitude($site['geometry']['coordinates'][0]);

            $em->persist($localisation);
        }
        $em->flush();

    }


    function varDumpToString($var) {
        ob_start();
        var_dump($var);
        $result = ob_get_clean();
        return $result;
    }

}