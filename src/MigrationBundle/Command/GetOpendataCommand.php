<?php


namespace CarteBundle\Command;


use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GetOpendataCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('carte-getlyondatas')
            ->setDescription('Get and update datas on locations')
            ->setHelp('Use curl to get datas on locations from LyonOpenData API. No parameter or else needed.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){

    }

}