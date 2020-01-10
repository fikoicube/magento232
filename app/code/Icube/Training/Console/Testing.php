<?php

namespace Icube\Training\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Testing extends Command
{
    private $tableTrainingFactory;

    public function __construct(
        \Icube\Training\Model\TableTrainingFactory $tableTrainingFactory,
        string $name = null
    ) {
        $this->tableTrainingFactory = $tableTrainingFactory;
        parent::__construct($name);
    }

    protected function configure()
    {
        $this->setName('icube:training');
        $this->setDescription('This is my console command');

        parent::configure();
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $data = $this->tableTrainingFactory->create()->getCollection()->getData();
        print_r(is_object($data)? get_class_methods($data) : $data);
        $output->writeln('<info>Success Message.</info>');
        $output->writeln('<error>Error Message.</error>');
    }
}